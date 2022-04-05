<?php $tgl = (int) $_GET["id"]; ?>
<?php $idpo = $_GET["date"]; ?>
<?php  $koneksi = mysqli_connect('localhost','root','','ganding');
                      $query =  mysqli_query($koneksi, "select * from po where id = $idpo ");
                      $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                      $qty = (int) $hasil[0]['qty_pcs']; ?>

<?php if($tgl !== 0 && $idpo != 0 ){
    $hitungs = ceil($qty/$tgl);
    $nomer = 1; 
}else {
    $hitungs = 0;
} ?>

<?php for ($j=0; $j < $hitungs ; $j++) {  ?>
    <label>Pilih Tanggal Pengiriman <?= $nomer++; ?></label>
              <input type="date" id="quantity" name="tanggalkirim[]" class="form-control">
    <?php } ?>

   