<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Perubahan Data Kamar</h2>
<p>Silahkan gunakan form dibawah ini untuk merubah data kamar.</p>

<form method="POST" action="/kamar/update/<?= $Listkamar['id_kamar'] ?>">
    <div class="form-group">
        <label class="font-weight-bold">No Kamar</label>
        <input type="text" name="txtInputnokamar" class="form-control" placeholder="Perbaiki kesalahan data" autocomplete="off" value="<?= $Listkamar['no_kamar']; ?>" auto require>
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
        <label class="font-weight-bold">Tipe</label>
        <select name="status" class="form-control">
            <option>Dalam perbaikan</option>
            <option>Sudah dipesan</option>
            <option>Free</option>
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Update Kamar</button>
    </div>
</form>
<?= $this->endSection() ?>