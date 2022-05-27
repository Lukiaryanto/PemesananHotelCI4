<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TipeKamar;

class Fasilitaskamar extends BaseController
{
    public function index()
    {
        $dataTipe_kamar = new TipeKamar();
        $data['ListFasilitaskamar'] = $dataTipe_kamar->findAll();
        return view('Fasilitaskamar/tampil', $data);
    }

    ############ TAMBAH ###########
    public function tambahFasilitaskamar()
    {
        return view('fasilitaskamar/tambah');
    }


    ################# SIMPAN ###########
    public function simpanFasilitaskamar()
    {
        helper(['form']);
        $upload = $this->request->getfile('foto');
        $upload->move(WRITEPATH . '../public/gambar/');
        $dataTipe_kamar = new TipeKamar;
        $datanya = [
            'tipe_kamar' => $this->request->getPost('tipe'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga'),
            'foto' => $upload->getName('foto')
        ];
        $dataTipe_kamar->save($datanya);
        session()->setFlashdata('pesan', 'Data berhasil ditambah.');
        return redirect()->to('/Fasilitaskamar');
    }


    // HAPUS
    public function hapusFASILITASKAMAR($idTipeKamar)
    {
        $dataTipeKamar = new TipeKamar;
        $dataTipeKamar->where('id_tipe_kamar', $idTipeKamar)->delete();
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/fasilitaskamar');
    }

    // EDIT
    public function editFASILITASKAMAR($idTipeKamar)
    {
        $dataTipeKamar = new TipeKamar;
        $data['tipe_kamar'] = $dataTipeKamar->find($idTipeKamar);

        return view('fasilitaskamar/edit', $data);
    }

    //UPDATE
    public function updateFASILITASKAMAR($idTipeKamar)
    {

        $DataTipeKamar = new TipeKamar;
        helper(['form']);
        $upload = $this->request->getfile('foto');
        $upload->move(WRITEPATH . '../public/gambar/');
        $data = [
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga'),
            'foto' => $upload->getName('foto'),

        ];

        $DataTipeKamar->update($idTipeKamar, $data);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/fasilitaskamar');
    }
}
