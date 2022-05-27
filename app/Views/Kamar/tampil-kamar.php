<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Data Kamar</h2>
<p>Berikut ini daftar Kamar pengelola aplikasi Hotel yang
    sudah terdaftar dalam database.</p>
<p>
    <a href="/kamar/tambah" class="btn btn-primary
btn-sm">Tambah Kamar</a>
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
            <th>No kamar</th>
            <th>Tipe</th>
            <th>Status kamar</th>
            <th>Aksi</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $htmlData = null;
        $nomor = null;
        foreach ($Listkamar as $row) {
            $nomor++;
            $htmlData = '<tr>';
            $htmlData .= '<td class="text-center">' . $nomor . '</td>';
            $htmlData .= '<td class="text-center">' . $row['no_kamar'] . '</td>';
            $htmlData .= '<td class="text-center">' . $row['tipe_kamar'] . '</td>';
            // $htmlData .= '<td class="text-center">Rp.' . $row['harga'] . '</td>';
            $htmlData .= '<td class="text-center">' . $row['status'] . '</td>';
            // $htmlData .= '<td class="text-center">' . '<img src="' . base_url("/gambar/" . $row['foto']) . '" width="80">' . '</td>';
            $htmlData .= '<td class="text-center">';
            $htmlData .= '<a href="/kamar/edit/' . $row['id_kamar'] . '" class="btn btn-info btn-sm mr-1">edit</a>';
            $htmlData .= '<a href="/kamar/hapus/' . $row['id_kamar'] . '" class="btn btn-danger btn-sm">hapus</a>';
            $htmlData .= '</td>';
            $htmlData .= '</tr>';
            echo $htmlData;
        }
        ?>
    </tbody>
</table>
<?= $this->endsection('content') ?>