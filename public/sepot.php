
<?php if(isset($_GET['idedit']) && isset($_GET['idpart']) ){
    $idedit = $_GET['idedit'];
    $idpart = $_GET['idpart']; 
    $koneksi = mysqli_connect('localhost','root','','ganding');
                        $queryspot =  mysqli_query($koneksi, "select * from part where id = $idpart ");
                        $partspot = mysqli_fetch_all($queryspot, MYSQLI_ASSOC); 
                        
                        $queryspotz =  mysqli_query($koneksi, "select * from spot where id_part = $idpart ");
                        $partspotz = mysqli_fetch_all($queryspotz, MYSQLI_ASSOC); 
                        
                        ?>
<?php if($idedit == "spot"){ ?>

<div class="form-group col-md-3">
    <label for="spot1">Nama Proses SPOT</label>
                        <input type="text" class="form-control" name="namaspot" id="spot1" autocomplete="off" placeholder="Contoh : SPOT COLLAR / SPOT NUT" value="<?= $partspotz[0]['nama_proses']; ?>" required>
    <label for="nut">Qty Need Untuk 1 Part</label>
                        <input type="text" class="form-control" name="nut" id="nut" autocomplete="off" value="<?= $partspot[0]['nut']; ?>" required>
    
</div>


<?php }elseif($idedit == '2spot'){ ?>
        <div class="form-group col-md-3">
    <label for="spot1">Nama Proses SPOT</label>
                        <input type="text" class="form-control" name="namaspot" id="spot1" autocomplete="off" placeholder="Contoh : SPOT COLLAR / SPOT NUT" value="<?= $partspotz[0]['nama_proses']; ?>" required>
    <label for="nut">Qty Need Untuk 1 Part</label>
                        <input type="text" class="form-control" name="nut" id="nut" autocomplete="off" value="<?= $partspot[0]['nut']; ?>" required>
    
</div>

<div class="form-group col-md-3">
    <label for="spot2">Nama Proses SPOT</label>
                        <input type="text" class="form-control" name="namaspot2" id="spot2" autocomplete="off" placeholder="Contoh : SPOT COLLAR / SPOT NUT" value="<?= $partspotz[1]['nama_proses']; ?>" required>
    <label for="nut">Qty Need Untuk 1 Part</label>
                        <input type="text" class="form-control" name="nut2" id="nut" autocomplete="off" value="<?= $partspot[0]['nut2']; ?>" required>
    
</div>
    <?php } ?>

    <?php }elseif (isset($_GET['id'])) {
      $id = $_GET["id"];   ?>

<?php if($id == "spot"){ ?>
<div class="form-group col-md-3">
    <label for="namaspot">Nama Proses SPOT</label>
                        <input type="text" class="form-control" name="namaspot" id="namaspot" autocomplete="off" placeholder="Contoh : SPOT COLLAR / SPOT NUT" required>
    <label for="nut">Qty Need Untuk 1 Part</label>
                        <input type="text" class="form-control" name="nut" id="nut" autocomplete="off" placeholder="Contoh : 1" required>
    
</div>
<?php }elseif($id == "2spot") {?>
    
    <div class="form-group col-md-3">
    <label for="namaspot">Nama Proses SPOT</label>
                        <input type="text" class="form-control" name="namaspot" id="namaspot" autocomplete="off" placeholder="Contoh : SPOT COLLAR / SPOT NUT" required>
    <label for="nut">Qty Need Untuk 1 Part</label>
                        <input type="text" class="form-control" name="nut" id="nut" autocomplete="off" placeholder="Contoh : 1" required>
    
</div>

<div class="form-group col-md-3">
    <label for="namaspot2">Nama Proses SPOT</label>
                        <input type="text" class="form-control" name="namaspot2" id="namaspot2" autocomplete="off" placeholder="Contoh : SPOT COLLAR / SPOT NUT" required>
    <label for="nut2">Qty Need Untuk 1 Part</label>
                        <input type="text" class="form-control" name="nut2" id="nut2" autocomplete="off" placeholder="Contoh : 1" required>
    
</div>
    
 <?php } ?>   

 <?php }