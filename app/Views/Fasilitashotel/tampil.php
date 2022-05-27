<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Daftar Fasilitas Hotel</h2>
<p>Berikut ini daftar Fasilitas Hotel yang sudah terdaftar dalam
    database.</p>
<p>
    <a href="/fasilitashotel/tambah" class="btn btn-primary btn-sm">Tambah Fasilitas Hotel</a>
</p>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan');  ?>
    </div>
<?php endif; ?>
<table class="table table-sm table-hovered">
    <thead class="bg-light text-center">
        <tr>
            <th>No</th>
            <th>Nama Fasilitas</th>
            <th>Keterangan</th>
            <th>Image</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $htmlData = null;
        $nomor = null;
        if (isset($ListTarifFASILITASHOTEL)) {
            foreach ($ListTarifFASILITASHOTEL as $row) {
                $nomor++;
                $htmlData = '<tr>';
                $htmlData .= '<td class="text-center">' . $nomor . '</td>';
                $htmlData .= '<td class="text-center">' . $row['nama_fasilitas'] . '</td>';
                $htmlData .= '<td class="text-center">' . $row['deskripsi_fasilitas'] . '</td>';
                $htmlData .= '<td class="text-center">' . '<img src="' . base_url("/gambar/" . $row['foto_fasilitas']) . '" width="50">' . '</td>';
                $htmlData .= '<td class="text-center">';
                $htmlData .= '<a href="/fasilitashotel/edit/' . $row['id_fasilitas'] . '"class="btn btn-info btn-sm mr-1">Edit</a>';
                $htmlData .= '<a href="/fasilitashotel/hapus/' . $row['id_fasilitas'] . '"class="btn btn-danger btn-sm">Hapus</a>';
                $htmlData .= '</td>';
                $htmlData .= '</tr>';
                echo $htmlData;
            }
        }
        ?>
    </tbody>
</table>
<?= $this->endSection() ?>