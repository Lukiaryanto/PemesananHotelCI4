<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Fasilitas Hotel</h2>
<p>Silahkan gunakan form dibawah ini untuk menambah Fasilitas Kamar.</p>
<form method="POST" action="/fasilitashotel/simpan">
    <div class="form-group">
        <label class="font-weight-bold">Nama Fasilitas</label>
        <input type="text" name="txtNamaFasilitas" class="form-control" placeholder="Masukan Fasilitas,
misal : Wifi" autocomplete="off" autofocus>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Keterangan</label>
        <input type="text" name="txtInputDeskripsiFasilitas" class="form-control" placeholder="Masukan keterangan,
misal: kapasitas  10mbps" autocomplete="off">
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Image</label>
        <input type="file" name="txtInputFotoFasilitas" class="form-control" placeholder="Masukan Foto" autocomplete="off">
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Simpan</button>
    </div>
</form>
<?= $this->endSection() ?>