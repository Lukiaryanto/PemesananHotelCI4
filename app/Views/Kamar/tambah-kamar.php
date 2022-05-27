<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Data Kamar</h2>
<p>Silahkan gunakan form dibawah ini untuk mendata kamar
    baru.</p>
<form method="POST" action="/kamar/simpan" enctype="multipart/form-data">
    <div class="form-group">

        <label class="font-weight-bold">No Kamar</label>
        <input type="text" name="txtInputnokamar" class="form-control" placeholder="Masukan No Kamar" autocomplete="off" autofocus>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Tipe</label>
        <select name="txtInputtipe" class="form-control">
            <?php if (isset($List_tipe_kamar)) : ?>
                <?php foreach ($List_tipe_kamar as $row) : ?>
                    <option value="<?= $row['id_tipe_kamar'] ?>"><?= $row['tipe_kamar'] ?></option>
                <?php endforeach ?>
            <?php endif ?>
        </select>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Status</label>
        <select name="status" class="form-control">
            <option>Dalam perbaikan</option>
            <option>Sudah dipesan</option>
            <option>Free</option>
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Simpan Kamar</button>
    </div>
</form>
<?= $this->endSection() ?>