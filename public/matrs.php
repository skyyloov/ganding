<?php $no_po_supplier=$_GET["no_po_supplier"];?>

<?php
                      $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
                        $querybism =  mysqli_query($koneksi, "select * from purchasing where no_po_supplier = '$no_po_supplier' and status = 'belum' ");
                $hitung = mysqli_num_rows($querybism);
                $hasil = mysqli_fetch_all($querybism, MYSQLI_ASSOC);
                ?>
    <div class="form-row">
       <div class="form-group col-md-6">
          <a>Material Yang Sudah Datang :</a>
         </div>
      </div>
            
      <?php foreach($hasil as $a): ?>
      <div class="form-row">

            <div class="form-group col-md-4">
   <?php $um = $a['unit'];
         $kodepart = $a['no_po'];
         $datangdua = $a['tgl_dtg2'];
         $status1 = $a['statuspertama'];
         $status2 = $a['statuskedua'];
   ?>

   <div class="form-check form-check-inline cekbok">
      <?php $lbr = $a['spec'].' '.' '.$a['qty_po'].' '.' '.$a['unit']; ?>
                  <label class="form-check-label" for="inlineCheckbox1"><?= $lbr; ?></label>
               </div>
</div>

   <div class="form-group col-md-6">
   
<?php if($datangdua == '0000-00-00'){ ?>
   <div class="form-check form-check-inline cekbok">
                  <input class="form-check-input child" name="cekbox1[]" type="checkbox" id="checkbox" value="<?= $a['id']; ?>">
                  <label class="form-check-label" for="inlineCheckbox1">Kedatangan Pertama  <?= $a['qty_dtg1']; ?>  <?= $a['unit']; ?></label>
               </div>
<?php } elseif($datangdua !== '0000-00-00' && $status1 =='belum' && $status2 =='belum' ){ ?>
   <div class="form-check form-check-inline cekbok">
                  <input class="form-check-input child" name="cekbox1[]" type="checkbox" id="checkbox" value="<?= $a['id']; ?>">
                  <label class="form-check-label" for="inlineCheckbox1">Kedatangan Pertama  <?= $a['qty_dtg1']; ?>  <?= $a['unit']; ?></label>
               </div>
               <div class="form-check form-check-inline cekbok">
      <?php $lbr = $a['spec'].' '.' '.$a['qty_po'].' '.' '.$a['unit']; ?>
                  <input class="form-check-input child" name="cekbox2[]" type="checkbox" id="checkbox" value="<?= $a['id']; ?>">
                  <label class="form-check-label" for="inlineCheckbox1">Kedatangan Kedua  <?= $a['qty_dtg2']; ?>  <?= $a['unit']; ?></label>
               </div>

   <?php } elseif ($datangdua !== '0000-00-00' && $status2 == 'belum' && $status1 !=='belum' ) { ?>
      <div class="form-check form-check-inline cekbok">
      <?php $lbr = $a['spec'].' '.' '.$a['qty_po'].' '.' '.$a['unit']; ?>
                  <input class="form-check-input child" name="cekbox2[]" type="checkbox" id="checkbox" value="<?= $a['id']; ?>">
                  <label class="form-check-label" for="inlineCheckbox1">Kedatangan Kedua  <?= $a['qty_dtg2']; ?>  <?= $a['unit']; ?></label>
               </div>

      <?php } elseif ($datangdua !== '0000-00-00' && $status1 == 'belum' && $status2 !=='belum' ) {?>
         <div class="form-check form-check-inline cekbok">
         <input class="form-check-input child" name="cekbox1[]" type="checkbox" id="checkbox" value="<?= $a['id']; ?>">
         <label class="form-check-label" for="inlineCheckbox1">Kedatangan Pertama  <?= $a['qty_dtg1']; ?> <?= $a['unit']; ?></label>
      </div>
       <?php } ?>

   </div>

</div>
<?php endforeach; ?>
 
<div class="form-row">
<div class="form-group col-md-3">
                        <label for="nosurjal">Nomor Surat Jalan</label>
                        <input type="text" class="form-control" autocomplete="off" name="nosurjal" id="nosurjal" placeholder="input nomor surat jalan" required>
 </div>
</div>
