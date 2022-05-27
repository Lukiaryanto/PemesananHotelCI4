<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelfasilitashotel;

class Fasilitashotel extends BaseController
{
    // TAMPIL
    public function index()
    {
        $dataFASILITASHOTEL = new Modelfasilitashotel;
        $data['ListTarifFASILITASHOTEL'] =
            $dataFASILITASHOTEL->orderBy('nama_fasilitas', 'deskripsi_fasilitas', 'foto_fasilitas')->findAll();
        return view('Fasilitashotel/tampil', $data);
    }

    // TAMBAH
    public function tambahFasilitashotel()
    {
        return view('Fasilitashotel/tambah');
    }

    // SIMPAN
    public function simpanFasilitashotel()
    {
        $dataFASILITASHOTEL = new Modelfasilitashotel;
        $datanya = [
            'nama_fasilitas' => $this->request->getPost('txtNamaFasilitas'),
            'deskripsi_fasilitas' => $this->request->getPost('txtInputDeskripsiFasilitas'),
            'foto_fasilitas' => $this->request->getPost('txtInputFotoFasilitas')
        ];
        $dataFASILITASHOTEL->save($datanya);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/fasilitashotel');
    }

    // HAPUS
    public function hapusFASILITASHOTEL($idFASILITASHOTEL)
    {
        $dataFASILITASHOTEL = new Modelfasilitashotel;
        $dataFASILITASHOTEL->where('id_fasilitas', $idFASILITASHOTEL)->delete();
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/fasilitashotel');
    }

    // EDIT
    public function editFASILITASHOTEL($idFASILITASHOTEL)
    {
        $dataFASILITASHOTEL = new Modelfasilitashotel;
        $data['detailkamar'] = $dataFASILITASHOTEL->find($idFASILITASHOTEL);
        return view('fasilitashotel/edit', $data);
    }

    //UPDATE
    public function updateFASILITASHOTEL($idFASILITASHOTEL)
    {
        $DataFASILITASHOTEL = new Modelfasilitashotel;
        helper(['form']);
        $upload = $this->request->getfile('FotoFasilitas');
        $upload->move(WRITEPATH . '../public/gambar/');
        $data = [
            'nama_fasilitas' => $this->request->getPost('txtNamaFasilitas'),
            'deskripsi_fasilitas' => $this->request->getPost('txtInputDeskripsiFasilitas'),
            'foto_fasilitas' => $upload->getName('FotoFasilitas'),
        ];

        $DataFASILITASHOTEL->update($idFASILITASHOTEL, $data);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/fasilitashotel');
    }
}
