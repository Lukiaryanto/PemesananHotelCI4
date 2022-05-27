<?= $this->extend('layout_user/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <hr>
            <h1>Form Pemesanan</h1>
            <hr>
            
            <form class="row g-3" method="post" action="/User/daftar" enctype="multipart/form-data" autocomplete="off">
                <div class="col-md-4">
                    <label for="inputCekIn" class="form-label">
                        <h6>Tanggal Cek In </h6>
                    </label>
                    <input type="date" class="form-control" id="inputCekIn" name="inputCekIn">
                </div>
                <div class="col-md-4">
                    <label for="inputCekOut" class="form-label">
                        <h6>Tanggal Cek Out</h6>
                    </label>
                    <input type="date" class="form-control" id="inputCekOut" name="inputCekOut">
                </div>
                <div class="col-md-4">
                    <label for="inputJumlahKamar" class="form-label">
                        <h6>Jumlah Kamar</h6>
                    </label>
                    <input type="text" class="form-control" id="inputJumlahKamar" name="inputJumlahKamar" autocomplete="off">
                </div>
                <div class="col-3">
                    <label for="inputNik" class="form-label">
                        <h6>Nik</h6>
                    </label>
                    <input type="text" class="form-control" id="inputNik" name="inputNik" autocomplete="off">
                </div>
                <div class="col-3">
                    <label for="inputNmPemesan" class="form-label">
                        <h6>Nama Pemesan</h6>
                    </label>
                    <input type="text" class="form-control" id="inputNmPemesan" name="inputNmPemesan" autocomplete="off">
                </div>
                <div class="col-3">
                    <label for="inputEmail" class="form-label">
                        <h6>Email</h6>
                    </label>
                    <input type="email" class="form-control" id="inputEmail" name="inputEmail" autocomplete="off">
                </div>

                <div class="col-12">
                    <label for="inputAlamat" class="form-label">
                        <h6>Alamat</h6>
                    </label>
                    <input type="text" class="form-control" id="inputAlamat" name="inputAlamat" placeholder="Desa, Kecamatan, Kabupaten, Provinsi, Negara" autocomplete="off">
                </div>
                <div class="col-md-6">
                    <label for="inputTipeKamar" class="form-label">
                        <h6>Tipe Kamar </h6>
                    </label>
                    <select id="inputTipeKamar" class="form-select" name="inputTipeKamar">
                        <?php if (isset($List_tipe_kamar)) : ?>
                            <?php foreach ($List_tipe_kamar as $row) : ?>
                                <option value="<?= $row['id_tipe_kamar'] ?>"><?= $row['tipe_kamar'] ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="inputNoHp" class="form-label">
                        <h6>No Handphone</h6>
                    </label>
                    <input type="text" class="form-control" id="inputNoHp" name="inputNoHp" autocomplete="off">
                </div>
                <div class="col-12">
                    <button class="btn btn-primary">
                        <h6>Pesan</h6>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>