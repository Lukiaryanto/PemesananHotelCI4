<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Status Kamar</h2>
<p>Silahkan gunakan form dibawah ini untuk merubah status kamar.</p>

<form method="POST" action="/Reservasi/status/<?= $ListReservasi['id_reservasi'] ?>">
    <div class="form-group">
        <label class="font-weight-bold">Status Kamar</label>
        <select name="status" class="form-control">
            <option>Cek-In</option>
            <option>Cek-Out</option>
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Update Kamar</button>
    </div>
</form>
<?= $this->endSection() ?>