<?php if(isset($_GET["id"])){ ?>
<?php $id=$_GET["id"];?>
<?= $id; ?>

<?php
                      $koneksi = mysqli_connect('localhost','root','','ganding');
                        $query =  mysqli_query($koneksi, "select * from purchasing where id = '$id' and status = 'belum' ");
                $hitung = mysqli_num_rows($query);
                $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                ?>

<div class=" form-group col">
<?php if($datangdua == '0000-00-00'){ ?>
   <div class="form-check form-check-inline cekbok">
                  <input class="form-check-input" name="cekbox1[]" type="checkbox" id="checkbox" value="<?= $a['id']; ?>">
                  <label class="form-check-label" for="inlineCheckbox1">Kedatangan Pertama</label>
               </div>
<?php } elseif($datangdua !== '0000-00-00' && $status1 =='belum' && $status2 =='belum' ){ ?>
   <div class="form-check form-check-inline cekbok">
                  <input class="form-check-input" name="cekbox1[]" type="checkbox" id="checkbox" value="<?= $a['id']; ?>">
                  <label class="form-check-label" for="inlineCheckbox1">Kedatangan Pertama</label>
               </div>
               <div class="form-check form-check-inline cekbok">
      <?php $lbr = $a['spec'].' '.' '.$a['qty_po'].' '.' '.$a['unit']; ?>
                  <input class="form-check-input" name="cekbox2[]" type="checkbox" id="checkbox" value="<?= $a['id']; ?>">
                  <label class="form-check-label" for="inlineCheckbox1">Kedatangan Kedua</label>
               </div>

   <?php } elseif ($datangdua !== '0000-00-00' && $status2 == 'belum' && $status1 !=='belum' ) { ?>
      <div class="form-check form-check-inline cekbok">
      <?php $lbr = $a['spec'].' '.' '.$a['qty_po'].' '.' '.$a['unit']; ?>
                  <input class="form-check-input" name="cekbox2[]" type="checkbox" id="checkbox" value="<?= $a['id']; ?>">
                  <label class="form-check-label" for="inlineCheckbox1">Kedatangan Kedua</label>
               </div>

      <?php } elseif ($datangdua !== '0000-00-00' && $status1 == 'belum' && $status2 !=='belum' ) {?>
         <div class="form-check form-check-inline cekbok">
         <input class="form-check-input" name="cekbox1[]" type="checkbox" id="checkbox" value="<?= $a['id']; ?>">
         <label class="form-check-label" for="inlineCheckbox1">Kedatangan Pertama</label>
      </div>
       <?php } ?>
</div>

<?php }elseif(isset($_GET["idcek"])){ ?>
   <div class="form-group-col">
                    <label for="ng">Quantity Not Good</label>
                        <input type="text" autocomplete="off" required class="form-control qty" id="ng" name="ng" placeholder="Masukkan Angka">
                        <span id="pesannn"></span>
<br>
                        <label for="ketng">Keterangan</label>
                        <input type="text" autocomplete="off" required class="form-control qty" id="ketng" name="ketng" placeholder="Tuliskan Keterangan Not Good">
                        <br>
                    </div>
   <?php }elseif(isset($_GET["idcek2"])){ ?>

      <?php } ?>

      <script type="text/javascript">
$(document).ready(function(){

    
    $("#ng").keypress(function(data){
      if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57))
      {
        $("#pesannn").html("isikan angka").show().fadeOut("slow");
        return false;
      }
    });

});
</script> 