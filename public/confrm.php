<?php $idd=$_GET["idd"]; ?>
<?php
                      $koneksi = mysqli_connect('localhost','root','','ganding');
                        $query =  mysqli_query($koneksi, "select * from purchasing where id = '$idd' ");
                $hitung = mysqli_num_rows($query);
                $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                ?>
<?php foreach($hasil as $a){
$statuspertama = $a['statuspertama'];
$statuskedua = $a['statuskedua'];
$statuz = $a['status'];
$konfirmasi1 = $a['konfirmasi'];
$konfirmasi2 = $a['konfirmasi1'];
$qty = $a['qty_act'];
$qty1 = $a['qty_dtg1'];
$qty2 = $a['qty_dtg2'];
}?>

<div class="form-row">
    <?php if($konfirmasi1 == 'belum dikonfirmasi' && $konfirmasi2 == 'belum dikonfirmasi' ){ ?>
        <div class="form-group col-md-4">
                        <label for="qty_dtg1">Kedatangan Pertama</label>
                        <input type="text" autocomplete="off" class="form-control" name="qty_dtg1" id="qty_dtg1" placeholder="<?= $qty1; ?>" required>
                    </div>
        <div class="form-group col-md-4">
        <label for="qty_dtg2">Kedatangan Kedua</label>
             <input type="text" autocomplete="off" class="form-control" name="qty_dtg2" id="qty_dtg2" placeholder="<?= $qty2; ?>" required>
         </div>
    <?php  } elseif ($konfirmasi1 == 'belum dikonfirmasi' && $konfirmasi2 !== 'belum dikonfirmasi') { ?>
        <div class="form-group col-md-4">
                        <label for="qty_dtg1">Kedatangan Pertama</label>
                        <input type="text" autocomplete="off" class="form-control" name="qty_dtg1" id="qty_dtg1" placeholder="<?= $qty1; ?>" required>
                    </div>
        <?php }elseif ($konfirmasi1 !=='belum dikonfirmasi' && $konfirmasi2 == 'belum dikonfirmasi') {?>
            <div class="form-group col-md-4">
        <label for="qty_dtg2">Kedatangan Kedua</label>
             <input type="text" class="form-control" autocomplete="off" name="qty_dtg2" id="qty_dtg2" placeholder="<?= $qty2; ?>" required>
         </div>
            <?php } ?>
</div>