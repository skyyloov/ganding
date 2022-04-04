<?php $idedit = $_GET['idedit'];
    $idpart = $_GET['idpart']; 
    $koneksi =mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
    $queryspot =  mysqli_query($koneksi, "select * from part where id = $idpart ");
    $partspot = mysqli_fetch_all($queryspot, MYSQLI_ASSOC);
    
    $queryspotz2 =  mysqli_query($koneksi, "select * from spot where id_part = $idpart ");
                        $partspotz2 = mysqli_fetch_all($queryspotz2, MYSQLI_ASSOC); 
    
    ?>


<?php if($idedit == "spot"){ ?>
<div class="form-group col-md-3">
<label for="namaspot">Nama Proses SPOT</label>
                        <input type="text" class="form-control" name="namaspot" id="namaspot" value="<?= $partspotz2[0]['nama_proses'] ?>" autocomplete="off" placeholder="Contoh : SPOT COLLAR / SPOT NUT" required>
<label for="nut">Qty Need Untuk 1 Part</label>
                        <input type="text" class="form-control" name="nut" id="nut" value="<?= $partspot[0]['nut']; ?>" required>
</div>
                        
<?php }elseif($idedit == "2spot"){ ?>
    
    <?php  $queryspotz =  mysqli_query($koneksi, "select * from spot where id_part = $idpart ");
    $partspotz = mysqli_fetch_all($queryspotz, MYSQLI_ASSOC); ?>
    
        <div class="form-group col-md-3">
    <label for="namaspot">Nama Proses SPOT</label>
                        <input type="text" class="form-control" name="namaspot" id="namaspot" value="<?= $partspotz2[0]['nama_proses'] ?>" autocomplete="off" placeholder="Contoh : SPOT COLLAR / SPOT NUT" required>
    <label for="nut">Qty Need Untuk 1 Part</label>
                        <input type="text" class="form-control" name="nut" id="nut" value="<?= $partspot[0]['nut']; ?>" required>
    
</div>

<div class="form-group col-md-3">
    <label for="namaspot2">Nama Proses SPOT</label>
                        <input type="text" class="form-control" name="namaspot2" id="namaspot2" value="<?= $partspotz2[1]['nama_proses'] ?>" autocomplete="off" placeholder="Contoh : SPOT COLLAR / SPOT NUT" required>
    <label for="nut2">Qty Need Untuk 1 Part</label>
                        <input type="text" class="form-control" name="nut2" id="nut" value="<?= $partspot[0]['nut2']; ?>" required>
    
</div>

    <?php } ?>

    