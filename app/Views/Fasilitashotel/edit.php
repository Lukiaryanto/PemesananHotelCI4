<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penrubahan Fasilitas Hotel</h2>
<p>Silahkan gunakan form dibawah ini untuk mengedit Fasilitas hotel.</p>
<form method="POST" action="/fasilitashotel/update/<?= $detailkamar['id_fasilitas'] ?>" enctype="multipart/form-data">
    <div class="form-group">
        <label class="font-weight-bold">Nama Fasilitas</label>
        <input type="text" name="txtNamaFasilitas" class="form-control" placeholder="perbaiki kesalahan data" autocomplete="off" value="<?= $detailkamar['nama_fasilitas'] ?>" auto require>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Keterangan</label>
        <input type="text" name="txtInputDeskripsiFasilitas" class="form-control" placeholder="perbaiki kesalahan data" autocomplete="off" value="<?= $detailkamar['deskripsi_fasilitas'] ?>" auto require>
    </div>
    <div class="form-group">
        <div class="form-group">
            <label class="font-weight-bold">Foto</label>
            <input type="file" name="FotoFasilitas" class="form-control-file" id="FotoFasilitas" placeholder="Masukan foto" value="<?= $detailkamar['foto_fasilitas'] ?>">
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Simpan</button>
    </div>
</form>
<?= $this->endSection() ?>