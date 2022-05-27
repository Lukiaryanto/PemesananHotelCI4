<?= $this->extend('layout_user/template'); ?>
<?= $this->section('css'); ?>
<style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

    /** RTL **/
    .invoice-box.rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .invoice-box.rtl table {
        text-align: right;
    }

    .invoice-box.rtl table tr td:nth-child(2) {
        text-align: left;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan');  ?>
    </div>
<?php endif; ?>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="2">

                <table>
                    <tr>
                        <td class="title">
                            <img src="/gambar/logo.png" style="width: 100%; max-width: 300px" />
                        </td>

                        <td>
                            No Id Reservasi #: <?= $data_reservasi['id_reservasi'] ?><br />

                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            Alamat : <?= $data_reservasi['alamat_pemesan'] ?> <br />
                            email : <?= $data_reservasi['email_pemesan'] ?>
                        </td>

                        <td>

                            Nama : <?= $data_reservasi['nama_pemesan'] ?><br />
                            Nik : <?= $data_reservasi['nik_pemesan'] ?><br />
                            No Telp : <?= $data_reservasi['no_telp_pemesan'] ?><br />

                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>Tipe Kamar</td>

            <td>Jumlah Kamar Dipesan</td>
        </tr>

        <tr class="details">
            <td><?= $data_reservasi['tipe_kamar'] ?></td>

            <td><?= $data_reservasi['jumlah_kamar_dipesan'] ?></td>
        </tr>

        <tr class="heading">
            <td>Tanggal Cek In</td>

            <td>Tanggal Cek Out</td>
        </tr>

        <tr class="item">
            <td><?= $data_reservasi['tgl_cek_in'] ?></td>

            <td><?= $data_reservasi['tgl_cek_out'] ?></td>
        </tr>



        <tr class="total">
            <td></td>

            <td>Total bayar: Rp.<?= number_format($data_reservasi['harga'], 2, ',', '.') ?> </td>
        </tr>
    </table>
</div>
<?= $this->endSection(); ?>