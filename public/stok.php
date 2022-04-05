<?php $id = $_GET['id']; ?>
<?php   $koneksi = mysqli_connect('localhost','root','','ganding');
                        $query =  mysqli_query($koneksi, "select * from part where id = $id ");
                        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC); ?>
                        <?php $hitung = mysqli_num_rows($query); ?>
    <?php   ?>
   
<?php if($id < 1 ){ ?>

    <div class="alert alert-info" role="alert">
  <?= "Pilih Part"; ?>
</div>

<?php }else{ ?>

    <?php $unit = $hasil[0]['unit_material'];
          $code = $hasil[0]['kode_part']; 
          $spot = $hasil[0]['spot'];
          $pcssheet = (float) $hasil[0]['pcs_sheet'];
          $kgpcs = (float) $hasil[0]['kg_pcs'];
          $pcslembar = (float) $hasil[0]['pcs_lembar']; ?>


    <?php if($unit == 'lembar' || $unit == 'sheet' ){
        $querywh =  mysqli_query($koneksi, "select * from warehouse where unit = 'lembar' and kodepart = '$code' ");
        $hasilwh = mysqli_fetch_all($querywh, MYSQLI_ASSOC);
        $hitungwh = mysqli_num_rows($querywh);
        if ($hitungwh > 0) {
            $qtylembar = (float) $hasilwh[0]['total_qty'];
            $qtylbr = $qtylembar * $pcslembar;
        } else {
            $qtylbr = (float) 0;
        }

        $querywh1 =  mysqli_query($koneksi, "select * from warehouse where unit = 'sheet' and kodepart = '$code' ");
        $hasilwh1 = mysqli_fetch_all($querywh1, MYSQLI_ASSOC);
        $hitungwh1 = mysqli_num_rows($querywh1);
        if ($hitungwh1 > 0 ) {
            $qtysheet = (float) $hasilwh1[0]['total_qty'];
            $qtysht = $qtysheet * $pcssheet ;
        }else {
            $qtysht = (float) 0;
        }

        $stoktotal = floor($qtylbr + $qtysht);

    }elseif ($unit == 'coil' ) {
        $querywh2 =  mysqli_query($koneksi, "select * from warehouse where unit = 'coil' and kodepart = '$code' ");
        $hasilwh2 = mysqli_fetch_all($querywh2, MYSQLI_ASSOC);
        $hitungwh2 = mysqli_num_rows($querywh2);
        if ($hitungwh2 > 0) {
            $stokcoil = (float) $hasilwh2[0]['total_qty'];
            $stoktotal = floor($stokcoil / $kgpcs); 
        }else {
            $stoktotal = 0;
        }

    }elseif ($unit =='pcs') {
        $querywh3 =  mysqli_query($koneksi, "select * from warehouse where unit = 'pcs' and kodepart = '$code' ");
        $hasilwh3 = mysqli_fetch_all($querywh3, MYSQLI_ASSOC);
        $hitungwh3 = mysqli_num_rows($querywh3);
        if ($hitungwh3 > 0) {
            $stoktotal = (int) $hasilwh3[0]['total_qty'];
          
        }else {
            $stoktotal = 0;
        }
    }elseif ($unit == 'tube') { 
        $querywhtube =  mysqli_query($koneksi, "select * from warehouse where unit = 'tube' and kodepart = '$code' ");
        $hasilwhtube = mysqli_fetch_all($querywhtube, MYSQLI_ASSOC);
        $hitungwhtube = mysqli_num_rows($querywhtube);
        if ($hitungwhtube > 0) {
            $stoktotal = (int) $hasilwhtube[0]['total_qty'];
          
        }else {
            $stoktotal = 0;
        }
    } ?>


    <form method="" action="" class="mt-5">
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="nama_customer">Stok Material (pcs)</label>
       <input type="text" class="form-control" name="nama_customer" value="<?= $stoktotal; ?>" readonly>
       </div>

       <?php 
       $proses = (int) $hasil[0]['proses'];
       $nem = 1;
       $nim = 1;
       $nam = 0; ?>
<?php $queryprs =  mysqli_query($koneksi, "select * from proses where id_part = $id ");
        $hasilprs = mysqli_fetch_all($queryprs, MYSQLI_ASSOC);
        $hitungprs = mysqli_num_rows($queryprs);
        if ($hitungprs > 0) {
            $awal = (int) $hasilprs[0]['qty_in'];
            $akhir = (int) $hasilprs[0]['qty_out'];
            
            if ($awal > $akhir) {
                $stokwip = $awal - $akhir;
            }else {
                $stokwip = 0;
            }

        }else {
            $stokwip = 0;
        }
        ?>

<?php
              $nomoer = 1;
              $numbers = 1;
              $nombersz = 1; 
              for ($k=0; $k < $proses ; $k++) { 
                $prsz = 'proses'.$numbers++;
                $planzs = 'plan'.$nombersz++; 

                $querystok =  mysqli_query($koneksi, "select * from $prsz where id_part = $id ");
                        $hasilstok = mysqli_fetch_all($querystok, MYSQLI_ASSOC);
                        $hitungstoktotal = mysqli_num_rows($querystok);
                            $raystok[] = $hasilstok[0][$planzs]; 
              }
              $querystokspot =  mysqli_query($koneksi, "select * from spot where id_part = $id ");
                        $hasilstokspot = mysqli_fetch_all($querystokspot, MYSQLI_ASSOC);
                        $hitungstoktotalspot = mysqli_num_rows($querystokspot);

                        if ($hitungstoktotalspot > 0) {
                            $raystok[] = $hasilstokspot[0]['qty_in'];
                        }

              
              if ($proses > 0) {
                  
                  $semuastok = array_Sum($raystok);
            } else {
                $semuastok = 0 ;
            }
              ?>


       <div class="form-group col-md-2">
           <label for="nama_part">Stok Wip</label>
           <input type="text" class="form-control" name="nama_part" id="namapart" value="<?= $semuastok; ?>" readonly>
        </div>
        <?php $queryfg =  mysqli_query($koneksi, "select * from warehousefg where id_part = $id ");
        $hasilfg = mysqli_fetch_all($queryfg, MYSQLI_ASSOC);
        $hitungfg = mysqli_num_rows($queryfg);
        if ($hitungfg > 0) {
            $stokfg = $hasilfg[0]['qty'];
        }else {
            $stokfg = 0;
        }
        ?>

        <?php  $querydeliv =  mysqli_query($koneksi, "select * from po where id_part = $id and status = 'belum close' ");
                      $hasildeliv = mysqli_fetch_all($querydeliv, MYSQLI_ASSOC);
                      $hitungdeliv = mysqli_num_rows($querydeliv);?>

<?php if($hitungdeliv > 0 ){
    $idpooo = $hasildeliv[0]['id'];
}else {
    $idpooo = 0;
} ?>

<?php $querywelding =  mysqli_query($koneksi, "select * from finishgood where id_part = $id ");
                      $hasilwelding = mysqli_fetch_all($querywelding, MYSQLI_ASSOC);
                      $hitungwelding = mysqli_num_rows($querywelding); ?>

<?php $queryschedule =  mysqli_query($koneksi, "select * from scheduledelivery where id_po = $idpooo and status = 'belum close' ");
                      $hasilschedule = mysqli_fetch_all($queryschedule, MYSQLI_ASSOC);
                      $hitungschedule = mysqli_num_rows($queryschedule); ?>
<?php if ($hitungschedule > 0) {
     $stoek = (int) $hasilschedule[0]['qty'];
     $safety = $stoek * 3;
}else {
    $safety = 0;
} ?>
        <div class="form-group col-md-2">
            <label for="kode_part">Stok FG</label>
            <input type="text" class="form-control" name="kode_part" id="kode_part" value="<?= $stokfg; ?>"  readonly>
        </div>

        <div class="form-group col-md-2">
            <label for="kode_part">Safety Stok</label>
            <input type="text" class="form-control" name="kode_part" id="kode_part" value="<?= $safety; ?>"  readonly>
        </div>
<?php if($hitungwelding > 0){ ?>
    <?php $idfgsz = $hasilwelding[0]['id_fg'];
    $qtyneed = (int) $hasilwelding[0]['qty_need']; ?>
    <?php $queryfgsz =  mysqli_query($koneksi, "select * from welding where id = $idfgsz ");
                      $hasilfgsz = mysqli_fetch_all($queryfgsz, MYSQLI_ASSOC);
                      $stokfgsz = (int) $hasilfgsz[0]['qty'];
                      $stoktotalwelding = $qtyneed * $stokfgsz; ?>
                    
        <div class="form-group col-md-2">
            <label for="kode_part">Di Assy Welding</label>
            <input type="text" class="form-control" name="kode_part" id="kode_part" value="<?= $stoktotalwelding; ?>"  readonly>
        </div>
<?php }else {?>


    <?php } ?>
    </div>

    <div class="form-row">
        <?php
              $nomor = 1;
              $num = 1;
              $nom = 1;   ?>



        <?php  for($i=0; $i<$proses; $i++){ ?>
            <?php $prs = 'proses'.$num++;
                  $plan = 'plan'.$nom++;   ?>

<?php $queryprs =  mysqli_query($koneksi, "select * from $prs where id_part = $id ");
                        $hasilprs = mysqli_fetch_all($queryprs, MYSQLI_ASSOC); ?>

    <div class="form-group col-md-2 tes">
            <label for="kode_part">Proses <?= $nomor++; ?></label>
            <input type="text" class="form-control" name="kode_part" id="kode_part" value="<?= $hasilprs[0]['nama_proses']; ?>"  readonly>
                <?php $nilai = (int)$hasilprs[0][$plan]; ?>
            <input type="text" class="form-control mt-3 tus" name="kode_part" id="kode_part" value="<?= $nilai; ?>"  readonly>
        </div>
        <?php } ?> 
    </div>
<?php if($spot == 'spot'){ ?>
 <?php $queryspotz =  mysqli_query($koneksi, "select * from spot where id_part = $id ");
                      $hasilspotz = mysqli_fetch_all($queryspotz, MYSQLI_ASSOC);
                      ?>

            <div class="form-row">
            <div class="form-group col-md-2 tes">
            <label for="kode_part"><?= $hasilspotz[0]['nama_proses']; ?></label>
            <input type="text" class="form-control" name="kode_part" id="kode_part" value="<?= $hasilspotz[0]['nama_proses']; ?>"  readonly>
                <?php $nilaispot = (int)$hasilspotz[0]['qty_in']; ?>
            <input type="text" class="form-control mt-3 tus" name="kode_part" id="kode_part" value="<?= $nilaispot; ?>"  readonly>
        </div>
            </div>
<?php }elseif($spot == '2spot'){ ?>

<?php $queryspotz =  mysqli_query($koneksi, "select * from spot where id_part = $id and keterangan = 'spot1' ");
                      $hasilspotz = mysqli_fetch_all($queryspotz, MYSQLI_ASSOC);
                      ?>
<?php $queryspotz2 =  mysqli_query($koneksi, "select * from spot where id_part = $id and keterangan = 'spot2' ");
                      $hasilspotz2 = mysqli_fetch_all($queryspotz2, MYSQLI_ASSOC);
                      ?>

            <div class="form-row">
                
            <div class="form-group col-md-2 tes">
            <label for="kode_part"><?= $hasilspotz[0]['nama_proses']; ?></label>
            <input type="text" class="form-control" name="kode_part" id="kode_part" value="<?= $hasilspotz[0]['nama_proses']; ?>"  readonly>
                <?php $nilaispot = (int)$hasilspotz[0]['qty_in']; ?>
            <input type="text" class="form-control mt-3 tus" name="kode_part" id="kode_part" value="<?= $nilaispot; ?>"  readonly>
        </div>
        
        <div class="form-group col-md-2 tes">
            <label for="kode_part"><?= $hasilspotz2[0]['nama_proses']; ?></label>
            <input type="text" class="form-control" name="kode_part" id="kode_part" value="<?= $hasilspotz2[0]['nama_proses']; ?>"  readonly>
                <?php $nilaispot2 = (int)$hasilspotz2[0]['qty_in']; ?>
            <input type="text" class="form-control mt-3 tus" name="kode_part" id="kode_part" value="<?= $nilaispot2; ?>"  readonly>
        </div>
        
            </div>

<?php } ?>
</form>



<?php } ?>