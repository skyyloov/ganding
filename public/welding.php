<?php $id = $_GET["id"]; ?>

<?php $koneksi = mysqli_connect('localhost','root','','ganding');
                      $query =  mysqli_query($koneksi, "select * from finishgood where id_fg = $id ");
                      $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC); 
                      $hitung = mysqli_num_rows($query); ?>
        <?php  $quer =  mysqli_query($koneksi, "select * from welding where id = $id ");
                      $hasils = mysqli_fetch_all($quer, MYSQLI_ASSOC); ?>

<?php if($hitung < 1){ ?>
    <div class="alert alert-info" role="alert">
  <?= "Tidak Ada Part Assy Welding Tersebut"; ?>
</div>
<?php }else {?>

    <form action="">
        
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="sheet_lembar">Stock</label>
                <input type="text" class="form-control" name="sheet_lembar" value="<?= $hasils[0]['qty']; ?>" id="sheet_lembar"  readonly>
            </div>
        </div>
        
        <?php foreach($hasil as $a): ?>
    <div class="form-row">
        <?php $idpart = $a['id_part'];
         $querypart =  mysqli_query($koneksi, "select * from part where id = $idpart ");
         $hasilpart = mysqli_fetch_all($querypart, MYSQLI_ASSOC);
            $proses = $hasilpart[0]['proses'];
            $code   = $hasilpart[0]['kode_part']; ?>
    <?php if($proses > 0){ ?>
            <?php  $queryfg =  mysqli_query($koneksi, "select * from warehousefg where id_part = $idpart ");
         $hasilfg = mysqli_fetch_all($queryfg, MYSQLI_ASSOC);
         $hitungfg = mysqli_num_rows($queryfg); ?>
                <div class="form-group col-md-6">
                       <label for="pcs_lembar">Nama Part</label>
                       <input type="text" class="form-control" id="pcs_lembar" value="<?= $hasilpart[0]['nama_part']; ?>" name="pcs_lembar" readonly>
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="sheet_lembar">Qty Need</label>
                        <input type="text" class="form-control" name="sheet_lembar" value="<?= $a['qty_need']; ?>" id="sheet_lembar"  readonly>
                    </div>
                    <?php if($hitungfg > 0 ){ ?>
                        <div class="form-group col-md-3">
                        <label for="sheet_lembar">Qty Stock</label>
                        <input type="text" class="form-control" name="sheet_lembar" value="<?= $hasilfg[0]['qty']; ?>" id="sheet_lembar"  readonly>
                    </div>
                    
                        <?php }else {?>
                            
                            <?php } ?>
                </div>
        <?php }elseif($proses == '' | $proses == 0){ ?>

            <?php  $querywh =  mysqli_query($koneksi, "select * from warehouse where kodepart = '$code' ");
         $hasilwh = mysqli_fetch_all($querywh, MYSQLI_ASSOC);
         $hitungwh = mysqli_num_rows($querywh); ?>
                <div class="form-group col-md-6">
                       <label for="pcs_lembar">Nama Part</label>
                       <input type="text" class="form-control" id="pcs_lembar" value="<?= $hasilpart[0]['nama_part']; ?>" name="pcs_lembar" readonly>
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="sheet_lembar">Qty Need</label>
                        <input type="text" class="form-control" name="sheet_lembar" value="<?= $a['qty_need']; ?>" id="sheet_lembar"  readonly>
                    </div>
                    <?php if($hitungwh > 0 ){ ?>
                        <div class="form-group col-md-3">
                        <label for="sheet_lembar">Qty Stock</label>
                        <input type="text" class="form-control" name="sheet_lembar" value="<?= $hasilwh[0]['total_qty']; ?>" id="sheet_lembar"  readonly>
                    </div>
                    
                        <?php }else {?>
                            
                            <?php } ?>
                </div>

        <?php } ?>

                <?php endforeach; ?>
    </form>                  

<?php } ?>

