<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Data Pemesan</h2>
<p>Berikut ini daftar Pemesan yang
    sudah terdaftar dalam database.</p>





<form action="/Reservasi/index" method="POST">
    <input type="text" name="cari-nama" placeholder="Cari Nama">
    <button type="submit">Cari</button>
</form>
<br>
<form action="/Reservasi/index" method="POST">
    <input type="date" name="cari-tanggal">
    <button type="submit">Cari</button>
</form>
<br>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan');  ?>
    </div>
<?php endif; ?>
<table class="table table-sm table-hovered">
    <thead class="bg-light text-center">
        <tr>

            <th>Nik</th>
            <th>Nama</th>
            <th>Tipe kamar</th>
            <th>Cek in</th>
            <th>Cek out</th>
            <th>Jumlah kamar</th>
            <!-- <th>Email</th> -->
            <!-- <th>Alamat</th> -->
            <th>No Telp</th>
            <th>Status Kamar</th>
            <th>Aksi</th>

        </tr>

    </thead>
    <tbody>


        <?php
        $htmlData = null;
        $nomor = null;
        foreach ($ListReservasi as $row) {
            $htmlData = '<tr>';
            $htmlData .= '<td class="text-center">' . $row['nik_pemesan'] . '</td>';
            $htmlData .= '<td class="text-center">' . $row['nama_pemesan'] . '</td>';
            $htmlData .= '<td class="text-center">' . $row['tipe_kamar'] . '</td>';
            $htmlData .= '<td class="text-center">' . $row['tgl_cek_in'] . '</td>';
            $htmlData .= '<td class="text-center">' . $row['tgl_cek_out'] . '</td>';
            $htmlData .= '<td class="text-center">' . $row['jumlah_kamar_dipesan'] . '</td>';
            // $htmlData .= '<td class="text-center">' . $row['email_pemesan'] . '</td>';
            // $htmlData .= '<td class="text-center">' . $row['alamat_pemesan'] . '</td>';
            $htmlData .= '<td class="text-center">' . $row['no_telp_pemesan'] . '</td>';
            $htmlData .= '<td class="text-center">' . $row['status_kamar'] . '</td>';
            $htmlData .= '<td class="text-center">';
            $htmlData .= '<a href="/Reservasi/cetak-bukti/' . $row['id_reservasi'] . '" class="btn btn-info btn-sm mr-1">Cetak Bukti</a>';
            $htmlData .= '<a href="/Reservasi/edit/' . $row['id_reservasi'] . '" class="btn btn-info btn-sm mr-1">status</a>';
            $htmlData .= '<a href="/Reservasi/hapus/' . $row['id_reservasi'] . '" class="btn btn-danger btn-sm">hapus</a>';
            $htmlData .= '</td>';
            $htmlData .= '</tr>';
            echo $htmlData;
        }
        ?>

    </tbody>
</table>

<?= $this->endsection('content') ?>