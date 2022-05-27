<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Fasilitas Kamar</h2>
<p>Silahkan gunakan form dibawah ini untuk menambah Fasilitas Kamar.</p>
<form method="POST" action="/fasilitaskamar/simpan" enctype="multipart/form-data">

    <div class="form-group">
        <label class="font-weight-bold">Tipe</label>
        <input type="text" name="tipe" class="form-control" placeholder="Masukan tipe" autocomplete="off" auto require>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Nama Fasilitas</label>
        <input type="text" name="deskripsi" class="form-control" placeholder="Masukan nama Fasilitas" autocomplete="off">
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Harga</label>
        <input type="text" name="harga" class="form-control" placeholder="Masukan jumlah harga" autocomplete="off">
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Foto</label>
        <input type="file" name="foto" class="form-control-file" id="foto" placeholder="Masukan foto">
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Simpan</button>
    </div>
</form>
<?= $this->endSection() ?>