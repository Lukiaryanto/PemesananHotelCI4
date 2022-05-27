<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Daftar Fasilitas Kamar</h2>
<p>Berikut ini daftar Fasilitas kamar per tipe kamar sudah terdaftar dalam
    database.</p>
<p>
    <a href="/fasilitaskamar/tambah" class="btn btn-primary btn-sm">Tambah
        Tipe Kamar</a>
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
            <th>Tipe Kamar</th>
            <th>Fasilitas</th>
            <th>Harga</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $htmlData = null;
        $nomor = null;
        if (isset($ListFasilitaskamar)) {
            foreach ($ListFasilitaskamar as $row) {
                $nomor++;
                $htmlData = '<tr>';
                $htmlData .= '<td class="text-center">' . $nomor . '</td>';
                $htmlData .= '<td class="text-center">' . $row['tipe_kamar'] . '</td>';
                $htmlData .= '<td class="text-center">' . $row['deskripsi'] . '</td>';
                $htmlData .= '<td class="text-center">Rp' . number_format($row['harga'], 2, ',', '.') . '</td>';
                $htmlData .= '<td class="text-center">' . '<img src="' . base_url("/gambar/" . $row['foto']) . '" width="80">' . '</td>';
                $htmlData .= '<td class="text-center">';
                $htmlData .= '<a href="/fasilitaskamar/edit/' . $row['id_tipe_kamar'] . '"class="btn btn-info btn-sm mr-1">Edit</a>';
                $htmlData .= '<a href="/fasilitaskamar/hapus/' . $row['id_tipe_kamar'] . '"class="btn btn-danger btn-sm">Hapus</a>';
                $htmlData .= '</td>';
                $htmlData .= '</tr>';
                echo $htmlData;
            }
        }
        ?>
    </tbody>
</table>
<?= $this->endSection() ?>