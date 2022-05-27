<?= $this->extend('layout_user/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <?php foreach ($ListTarifFASILITASHOTEL as $row) { ?>
            <div class="col">
                <div class="row row-cols-1 row-cols-md-1 g-1">
                    <div class="col">
                        <div style="background-color: #6c757d" class="card">
                            <img src="<?= base_url("/gambar/" . $row['foto_fasilitas']); ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row['nama_fasilitas']; ?></h5>
                                <h6 class="card-text"> <?= $row['deskripsi_fasilitas']; ?></h6>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</div>
</div>
</div>
<?= $this->endSection('content'); ?>