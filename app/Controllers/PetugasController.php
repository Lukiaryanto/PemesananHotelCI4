<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Petugas;
use App\Models\Kamar;
use App\Models\TipeKamar;



class PetugasController extends BaseController
{
    public function index()
    {
        return view('v_login');
    }
    public function login()
    {
        $username = $this->request->getPost('txtUsername');
        $password = md5($this->request->getPost('txtPassword'));

        $Datapetugas = new Petugas;
        $Userpetugas = $Datapetugas->where([
            'username' => $username,
            'password' => $password
        ])->find();

        if (count($Userpetugas) == 1) {
            $session_data = [
                'username' => $Userpetugas[0]['username'],
                'id_user' => $Userpetugas[0]['id_user'],
                'level' => $Userpetugas[0]['level'],
                'sudahkahLogin' => TRUE
            ];
            session()->set($session_data);
            return redirect()->to('/petugas/dashboard');
        } else {
            session()->setFlashdata('pesan', 'Username atau Password salah');
            return redirect()->to('/petugas');
        }
    }






    public function logout()
    {
        session()->destroy();
        return redirect()->to('/petugas');
    }

    // ##########################################3





    // ##########################################3
    // TAMPIL KAMAR
    public function tampilKamar()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $Datakamar = new kamar;
        $Datakamar->join('tipe_kamar', 'tipe_kamar.id_tipe_kamar=kamar.id_tipe_kamar');
        $data['Listkamar'] =
            $Datakamar->findAll();
        return view('kamar/tampil-kamar', $data);
    }



    // ##########################################3
    // TAMBAH KAMAR
    public function tambahKamar()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/kamar');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/kamar/dashboard');
            exit;
        }
        $tipe_kamar = new TipeKamar;
        $data['List_tipe_kamar'] = $tipe_kamar->findAll();

        return view('kamar/tambah-kamar', $data);
    }
    // ##########################################
    // SIMPAN KAMAR
    public function simpanKamar()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }

        $Datakamar = new Kamar;
        $datanya = [

            'no_kamar' => $this->request->getPost('txtInputnokamar'),
            'id_tipe_kamar' => $this->request->getPost('txtInputtipe'),
            'status' => $this->request->getPost('status'),

        ];
        $Datakamar->insert($datanya);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/kamar/tampil');
    }

    // ##########################################
    // EDIT KAMAR    
    public function editKamar($id_kamar)
    {
        // cek apakah sudah login ?
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }


        $Datakamar = new Kamar;
        $Datakamar->join('tipe_kamar', 'tipe_kamar.id_tipe_kamar=kamar.id_tipe_kamar');
        $data['Listkamar'] = $Datakamar
            ->find($id_kamar);
        // ->where('id_kamar', $id_kamar)
        // ->findAll();

        $tipe_kamar = new TipeKamar;
        $data['List_tipe_kamar'] = $tipe_kamar->findAll();

        // dd($data);
        return view('Kamar/edit-kamar', $data);
    }
    // ##########################################
    // UPDATE KAMAR    
    public function updatekamar($id_kamar)
    {
        // cek apakah sudah login
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $Datakamar = new Kamar;
        helper(['form']);
        $data = [
            'no_kamar' => $this->request->getPost('txtInputnokamar'),
            'id_tipe_kamar' => $this->request->getPost('txtInputtipe'),
            'status' => $this->request->getPost('status'),
        ];

        $Datakamar->update($id_kamar, $data);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/kamar/tampil');
    }
    // ##########################################
    // HAPUS KAMAR 
    public function hapusKamar($id_kamar)
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $kamar = new Kamar;
        $syarat = ['id_kamar' => $id_kamar];
        $infoFile = $kamar->where($syarat)->find();
        // unlink('gambar/' . $infoFile[0]['foto']);
        $kamar->where('id_kamar', $id_kamar)->delete();
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/kamar/tampil');
    }
}
