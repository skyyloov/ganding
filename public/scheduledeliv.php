<?php $id = $_GET["id"]; ?>
<input type="hidden" value="<?= $id; ?>" id="nilai">
<?php $koneksi =mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
                      $querydeliv =  mysqli_query($koneksi, "select * from scheduledelivery where id_po = $id and status = 'belum close' ");
                      $hasildeliv = mysqli_fetch_all($querydeliv, MYSQLI_ASSOC);
                      $hitungdeliv = mysqli_num_rows($querydeliv); ?>
                      <?php if($hitungdeliv > 0){ ?>
<input type="button" class="btn btn-xs btn-info disabled" value="Buat Schedule Delivery" id="scheduledeliv" >
                        <?php }else{ ?>
<input type="button" class="btn btn-xs btn-info" value="Buat Schedule Delivery" id="scheduledeliv" >
                          <?php } ?>
<br>
<br>


 <?php $querypo =  mysqli_query($koneksi, "select * from po where id = $id ");
                      $hasilpo = mysqli_fetch_all($querypo, MYSQLI_ASSOC);
                      $hitungpo = mysqli_num_rows($querypo);  ?>

<?php if($hitungdeliv < 1){ ?>
  <a><span style="font-size:16px;">Schedule Delivery <?= $hasilpo[0]['nama_customer']; ?></span></a>
    <div class="alert alert-warning" role="alert">
  <?= "No Data,, Segeralah Buat Schedule Delivery"; ?>
</div>

<?php }elseif($hitungdeliv > 0){ ?>
<a><span style="font-size:16px;">Schedule Delivery <?= $hasilpo[0]['nama_customer']; ?></span></a>
  <div class="list-group">
 <?php foreach($hasildeliv as $a){ ?>
<?php if($a['keterangan']=='tuntas'){ ?>
  <a  onmouseover="this.style.cursor='pointer';"  class="list-group-item list-group-item-action jadwal" id="jadwal"><?= $a['date'].'  '.' | '.'  '.$a['qty'].'  '.'Pieces'; ?><i class="fas fa-check green_color fa-2x"></i></a> 
  <?php }else{ ?>
    <a  onmouseover="this.style.cursor='pointer';"  class="list-group-item list-group-item-action jadwal" id="jadwal"><?= $a['date'].'  '.' | '.'  '.$a['qty'].'  '.'Pieces'; ?></a>
    <?php } ?>
 <?php } ?>
</div>

<?php } ?>

<script type="text/javascript">
$(document).ready(function(){
   $('#scheduledeliv').on( 'click', function () {
	        var data = $('#nilai').val();
    $('.modal').load('https://scmganding.site/public/scheduled.php?nilai=' + data);  
    $("#viewModal").modal("toggle");
   });
   
});
</script> 