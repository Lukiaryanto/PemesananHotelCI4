<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Fasilitas Kamar</h2>
<p>Silahkan gunakan form dibawah ini untuk menambah Fasilitas Kamar.</p>
<form method="POST" action="/fasilitaskamar/update/<?= $tipe_kamar['id_tipe_kamar'] ?>" enctype="multipart/form-data">


    <div class="form-group">
        <label class="font-weight-bold">Nama Fasilitas</label>
        <input type="text" value="<?= $tipe_kamar['deskripsi'] ?>" name="deskripsi" class="form-control" placeholder="Masukan nama Fasilitas" autocomplete="off" auto require>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Harga</label>
        <input type="text" value="<?= $tipe_kamar['harga'] ?>" name="harga" class="form-control" placeholder="Masukan jumlah harga" autocomplete="off">
    </div>
    <div class="form-group">
        <div class="form-group">
            <label class="font-weight-bold">Foto</label>
            <input type="file" name="foto" class="form-control-file" id="foto" placeholder="Masukan foto">
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Simpan</button>
    </div>
</form>
<?= $this->endSection() ?>