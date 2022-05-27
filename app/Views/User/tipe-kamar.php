 <?= $this->extend('layout_user/template'); ?>
 <?= $this->section('content'); ?>

 <div style="background-color: #6c757d" class="container">
     <div style="background-color: white" class="row">
         <?php foreach ($List_tipe_kamar as $row) { ?>
             <div class="col">
                 <div class="row row-cols-1 row-cols-md-1 g-1">
                     <div class="col">
                         <div style="background-color: #6c757d" class="card">
                             <img src="<?= base_url("/gambar/" . $row['foto']); ?>" class="card-img-top" alt="...">
                             <div class="card-body">
                                 <h5 class="card-title"><?= $row['tipe_kamar']; ?></h5>
                                 <p class="card-text"> <?= $row['deskripsi']; ?></p>
                                 <h6 class="card-text">Harga/Malam Rp. <?= number_format($row['harga'], 2, ',', '.') ?></h6>

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