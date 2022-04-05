<?php $id = $_GET["idpart"]; ?>

<?php $koneksi = mysqli_connect('localhost','root','','ganding');
                        $query =  mysqli_query($koneksi, "select * from part where id = $id ");
                        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                        $hitung = mysqli_num_rows($query); ?>
<?php if($hitung > 0){
    $spot = $hasil[0]['spot'];
    $jmlhproses = (int) $hasil[0]['proses'];
    $code = $hasil[0]['kode_part'];
    $unit = $hasil[0]['unit_material'];
    $shtlbr = (float) $hasil[0]['sheet_lembar'];
    $pcssht = (float) $hasil[0]['pcs_sheet'];
    $pcslbr = (float) $hasil[0]['pcs_lembar'];
    $kgpcs = (float) $hasil[0]['kg_pcs'];


    if ($unit == 'lembar' || $unit == 'sheet') {
   
      $querylbr =  mysqli_query($koneksi, "select * from warehouse where kodepart = '$code' and unit = 'lembar' ");
      $hasillbr = mysqli_fetch_all($querylbr, MYSQLI_ASSOC); 
  $hitunglbr = mysqli_num_rows($querylbr);

      $querysht =  mysqli_query($koneksi, "select * from warehouse where kodepart = '$code' and unit = 'sheet' ");
      $hasilsht = mysqli_fetch_all($querysht, MYSQLI_ASSOC); 
  $hitungsht = mysqli_num_rows($querysht);

  if ($hitungsht > 0 && $hitunglbr > 0) {
      
      $materialsht = (float) $hasilsht[0]['total_qty'];
      $stoksheet = floor($materialsht * $pcssht) ;
      $materiallbr = (float) $hasillbr[0]['total_qty'];
      $stoklbr = floor($materiallbr * $pcslbr);

      $stoktotal = $stoksheet + $stoklbr;

  }elseif ($hitunglbr > 0 && $hitungsht < 1) {
      
    $materiallbr = (float) $hasillbr[0]['total_qty'];
      $stoktotal = floor($materiallbr * $pcslbr);

  }elseif ($hitungsht > 0 && $hitunglbr < 1) {
    
    $materialsht = (float) $hasilsht[0]['total_qty'];
      $stoktotal = floor($materialsht * $pcssht) ;
      
  }elseif ($hitunglbr < 1 && $hitungsht < 1 ) {
    
    $stoktotal = 0;    
  }

}elseif ($unit == 'coil') {
  $querycoil =  mysqli_query($koneksi, "select * from warehouse where kodepart = '$code' and unit = 'lembar' ");
      $hasilcoil = mysqli_fetch_all($querycoil, MYSQLI_ASSOC); 
  $hitungcoil = mysqli_num_rows($querycoil);

  if ($hitungcoil > 0) {
      $materialcoil = (float)$hasilcoil[0]['total_qty'];
      $stoktotal = floor($materialcoil / $kgpcs);
      
  }elseif ($hitungcoil < 1) {
      $stoktotal = 0 ;
  }

}elseif ($unit == 'pcs') {
  $querypcs =  mysqli_query($koneksi, "select * from warehouse where kodepart = '$code' and unit = 'pcs' ");
  $hasilpcs = mysqli_fetch_all($querypcs, MYSQLI_ASSOC); 
$hitungpcs = mysqli_num_rows($querypcs);

  if ($hitungpcs > 0) {
      $stoktotal = $hasilpcs[0]['total_qty'];

  }elseif ($hitungpcs < 1) {
    $stoktotal = 0;
  }

}

} ?>

<div class="modal-dialog modal-fullscreen-sm-down">
    <div class="modal-content">
        <div class="modal-header">
        <i class="fa fa-tasks fa-2x"></i> <span style="font-size:20px;">Choose Schedule</span>
        </div>

        <div class="modal-body">
        <span style="font-size:15px;" >Stok Yang Tersedia DiWarehouse RM  <?= $stoktotal; ?> Pieces</span>
<form action="<?= base_url('production/savescheduleproduksi'); ?>" class="mt-2" method="POST">
  
    <?php
              $nomor = 1;
              $num = 1;
              $nom = 1;
              $menghitung = 1;   ?>
 <?php  for($i=0; $i<$jmlhproses; $i++){ ?>
    <?php $prs = 'proses'.$num++;
                  $plan = 'plan'.$nom++;   ?>

<?php $queryprs =  mysqli_query($koneksi, "select * from $prs where id_part = $id ");
                        $hasilprs = mysqli_fetch_all($queryprs, MYSQLI_ASSOC); ?>
    
    <label for="kode_part">Proses <?= $nomor++; ?></label>
    <?php $nilai = (int)$hasilprs[0][$plan]; ?>
    <div class="input-group mb-3">
        <?php if($nilai > 0 ){ ?>
  <div class="input-group-text mx-1">
    <input class="form-check-input mx-0" type="checkbox" name="<?= $menghitung++; ?>" value="<?= $hasilprs[0]['id']; ?>"aria-label="Checkbox for following text input">
  </div>
  <?php }elseif ($nilai < 1) {?>
    <div class="input-group-text mx-1">
    <input class="form-check-input mx-0" type="checkbox" name="<?= $menghitung++; ?>" disabled="disabled" value="<?= $hasilprs[0]['id']; ?>"aria-label="Checkbox for following text input">
  </div>
    
    <?php } ?>

    <?php if ($prs == 'proses1'){ ?>
  <input type="text" class="form-control" readonly value="<?= $hasilprs[0]['nama_proses']; ?>" aria-label="Text input with checkbox">
  <input type="text" class="form-control" id="qty1"  value="" name="qty1" placeholder="Input Rencana Pertama" aria-label="Text input with checkbox">
  <input type="hidden" id="stoktotal" name="stoktotal" value="<?= $stoktotal; ?>">
  <input type="hidden" name="idpart1" value="<?= $id; ?>">
</div>
<span id="pesan"></span>
<?php }elseif ($prs !== 'proses1') { ?>
  <input type="text" class="form-control" readonly value="<?= $hasilprs[0]['nama_proses']; ?>" aria-label="Text input with checkbox">
  <input type="text" class="form-control " readonly value="<?= $nilai; ?>" aria-label="Text input with checkbox">
  </div>
<?php } ?>

    <?php } ?>    
    <?php if($spot == 'spot'){ ?>
      <?php $queryspot =  mysqli_query($koneksi, "select * from spot where id_part = $id ");
                        $hasilspot = mysqli_fetch_all($queryspot, MYSQLI_ASSOC); ?>

      <?php if($hasilspot[0]['qty_in'] > 0 ){ ?>
        <div class="input-group mb-3">
        <div class="input-group-text mx-1">
    <input class="form-check-input mx-0" type="checkbox" name="8" value="<?= $id; ?>"aria-label="Checkbox for following text input">
    </div>
    <input type="text" class="form-control" readonly value="<?= $hasilspot[0]['nama_proses']; ?>" aria-label="Text input with checkbox">
  <input type="text" class="form-control" readonly value="<?= $hasilspot[0]['qty_in']; ?>" aria-label="Text input with checkbox">
  </div>

      <?php }elseif ($hasilspot[0]['qty_in'] < 1 ) { ?>
        <div class="input-group mb-3">
        <div class="input-group-text mx-1">
    <input class="form-check-input mx-0" type="checkbox" disabled="disabled" name="8" value="<?= $id; ?>"aria-label="Checkbox for following text input">
  </div>
  <input type="text" class="form-control" readonly value="<?= $hasilspot[0]['qty_in']; ?>" aria-label="Text input with checkbox">
  </div>
        <?php } ?>

      <?php } ?>

      
    <button type="submit" class="btn btn-sm btn-success" name="submit">Submit Schedule</button>
</form>
</div>

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function(){

    
    $("#qty1").keypress(function(data){
      if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57))
      {
        $("#pesan").html("isikan angka").show().fadeOut("slow");
        return false;
      }
    });
   
});
</script> 