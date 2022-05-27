<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MReservasi;



class Reservasi extends BaseController
{
    public function index()
    {
        $cari_nama = $this->request->getPost('cari-nama');
        $cari_tanggal = $this->request->getPost('cari-tanggal');


        $data_reservasi = new MReservasi;
        $data_reservasi->join('tipe_kamar', 'tipe_kamar.id_tipe_kamar=reservasi.id_tipe_kamar');

        if ($cari_nama) {
            $data_reservasi->like('reservasi.nama_pemesan', $cari_nama);
            // or_like
        } elseif ($cari_tanggal) {
            $data_reservasi->where('reservasi.tgl_cek_in', $cari_tanggal);
        }

        $data['ListReservasi'] = $data_reservasi->findAll();
        return view('/Reservasi/tampil-pemesan', $data);
    }

    public function CetakBukti($id_reservasi)
    {
        $data = [
            'title' => 'hotel Luki'
        ];

        $data_reservasi = new MReservasi;
        $data_reservasi->join('tipe_kamar', 'tipe_kamar.id_tipe_kamar=reservasi.id_tipe_kamar');
        $data['data_reservasi'] =
            $data_reservasi->find($id_reservasi);

        return view('Reservasi/cetak-bukti', $data);
    }

    public function hapusBukti($id_reservasi)
    {
        $data_reservasi = new MReservasi;
        $data_reservasi->where('id_reservasi', $id_reservasi)->delete();
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/Reservasi');
    }


    public function editKamar($id_reservasi)
    {
        $data_reservasi = new MReservasi;
        $data['ListReservasi'] = $data_reservasi->find($id_reservasi);
        return view('Reservasi/status-kamar', $data);
    }


    //UPDATE STATUS KAMAR 
    public function statusKamar($id_reservasi)
    {
        $data_reservasi = new MReservasi;
        helper(['form']);
        $data = [
            'status_kamar' => $this->request->getPost('status'),
        ];
        $data_reservasi->update($id_reservasi, $data);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/Reservasi');
    }
}
