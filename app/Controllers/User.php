<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kamar;
use App\Models\Modelfasilitashotel;

use App\Models\MReservasi;
use App\Models\TipeKamar;

class User extends BaseController
{
    public function index()
    {

        $data = [
            'title' => 'Home | hotel luki'
        ];

        return view('User/home', $data);
    }

    public function tampilTipeKamar()
    {
        $data = [
            'title' => 'hotel luki'
        ];

        $tipe_kamar = new TipeKamar;
        $data['List_tipe_kamar'] = $tipe_kamar->findAll();
        return view('User/tipe-kamar', $data);
    }

    public function daftar()
    {
        $data = [
            'title' => 'hotel daftar'
        ];
        // $Datakamar = [
        //     'Superior Room',
        //     'Deluxe Room',
        //     'Standar Room',
        //     'Presidentiel Room'
        // ];
        // $data['tipekamar'] = $Datakamar;
        // $DataPemesan = new MPemesan;
        // $DataPemesan->join('reservasi', 'reservasi.nik_pemesan=pemesan.nik_pemesan');
        // $DataPemesan->join('kamar', 'kamar.id_kamar=pemesan.id_kamar');
        // $data['detailkamar'] = $DataPemesan->findAll();
        $tipe_kamar = new TipeKamar;
        $data['List_tipe_kamar'] = $tipe_kamar->findAll();

        return view('User/daftar', $data);
    }
    #tampil Fasilitas hotel
    public function fasilitas()
    {
        $data = [
            'title' => 'hotel fasilitas'
        ];
        $DataFASILITASHOTEL = new Modelfasilitashotel;
        $data['ListTarifFASILITASHOTEL'] = $DataFASILITASHOTEL->findAll();
        return view('User/fasilitas', $data);
    }
    #tampil kamar
    public function tampilKamar()
    {
        $data = [
            'title' => 'hotel kamar'
        ];
        $Datakamar = new kamar();
        $Datakamar->join('detail_kamar', 'detail_kamar.id_kamar=kamar.id_kamar');
        $data['Listkamar'] =
            $Datakamar->findAll();
        return view('User/kamar', $data);
    }



    public function simpanDaftar()
    {
        // ambil id tipe kamar dari form
        $id_tipe_kamar = $this->request->getPost('inputTipeKamar');

        // Ambil data tipe kamar berdasarkan $id_tipe_kamar
        $tipe_kamar = $this->tipe_kamar->find($id_tipe_kamar);
        // Ambil harga tipe kamar dari $tipe_kamar
        $harga_kamar = $tipe_kamar['harga'];
        // Ambil jumlah kamar dari form
        $jml_kamar = $this->request->getPost('inputJumlahKamar');
        // ambil check in checkout dari form
        $check_in = $this->request->getPost('inputCekIn');
        $check_out = $this->request->getPost('inputCekOut');
        // Ubah format tanggal menjadi detik pakai strtotoime()
        $dci = strtotime($check_in);
        $dco = strtotime($check_out);
        // hitung selisih detik
        $dsel = $dco - $dci;

        // Ubah selisih deting menjadi hari (lama menginap)
        $lama_menginap = $dsel / 60 / 60 / 24;
        // Hitung harga berdasarkan rumus
        $harga = $harga_kamar * $jml_kamar * $lama_menginap;
        // dd($harga, $this->request->getPost());

        $dataPemesan = new MReservasi();
        $datanya = [
            'tgl_cek_in' => $check_in,
            'tgl_cek_out' => $check_out,
            'jumlah_kamar_dipesan' => $jml_kamar,
            'nik_pemesan' => $this->request->getPost('inputNik'),
            'nama_pemesan' => $this->request->getPost('inputNmPemesan'),
            'email_pemesan' => $this->request->getPost('inputEmail'),
            'harga' => $harga,
            'alamat_pemesan' => $this->request->getPost('inputAlamat'),
            'no_telp_pemesan' => $this->request->getPost('inputNoHp'),
            'id_tipe_kamar' => $id_tipe_kamar
        ];
        $dataPemesan->save($datanya);
        $id_reservasi = $dataPemesan->db->insertID();
        // 90
        session()->setFlashdata('pesan', 'Proses Pesan anda sudah berhasil silahkan ScreenShot atau print kemudian serahkan ke resepsionis.');
        return redirect()->to('/User/cetak/' . $id_reservasi);
        // /User/cetak/90
    }

    public function cetakDaftar($id_reservasi)
    {
        $data = [
            'title' => 'hotel Luki'
        ];

        $data_reservasi = new MReservasi;
        $data_reservasi->join('tipe_kamar', 'tipe_kamar.id_tipe_kamar=reservasi.id_tipe_kamar');
        $data['data_reservasi'] =
            $data_reservasi->find($id_reservasi);

        return view('User/cetak', $data);
    }
}
