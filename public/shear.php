
<?php $id=$_GET["id"];?>

<?php $koneksi =mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
                        $query =  mysqli_query($koneksi, "select * from warehouse where id = '$id' ");
                        $hitung = mysqli_num_rows($query); ?>

<?php if($hitung > 0 ){ ?>
    <?php $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC); ?>
<div class="form-group col-md-8">

    <label for="spec">Spek</label>
    <input type="text" class="form-control" name="spec" value="<?= $hasil[0]['spec']; ?>" id="spec" readonly>
    
</div>
<div class="form-group col-md-3">

    <label for="total_qty">Stok</label>
    <input type="text" class="form-control" name="total_qty" value="<?= $hasil[0]['total_qty']; ?>" id="total_qty" readonly>
    <input type="hidden" class="form-control" name="kodepart" value="<?= $hasil[0]['kodepart']; ?>" id="kodepart" readonly>
</div>
<?php }else{  ?>

    <div class="alert alert-warning" role="alert">
 <?= "Tidak Ada Data"; ?>
</div>

    <?php } ?>