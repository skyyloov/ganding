<?= $this->extend('layout/templatecetak'); ?>
<?= $this->Section('templatecetak'); ?>

<?php date_default_timezone_set('Asia/Jakarta');
 $date =date('Y-m-d'); ?> 

<?php if($idsurjal == 0 || $idsurjal == null ){ ?>
    <div class="alert alert-info" role="alert">
  <?= "Tidak Ada Data"; ?>
</div>
<?php } else {?>

<?php  $koneksi = mysqli_connect('localhost','root','','ganding');
                        $query =  mysqli_query($koneksi, "select * from surjal where nomor_surjal = '$idsurjal' ");
                        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                        $hitung = mysqli_num_rows($query);
                         ?>

                    <?php $querysupplier =  mysqli_query($koneksi, "select * from supplier where id = $idsup ");
                        $hasilsupplier = mysqli_fetch_all($querysupplier, MYSQLI_ASSOC);
                        $hitungsupplier = mysqli_num_rows($querysupplier);
                        if ($hitungsupplier > 0) {
                          $namasupplier = "Rekap Surat Jalan"." "."Supplier"."  ".$hasilsupplier[0]['nama_supplier'];
                        }else {
                          $namasupplier = "No Data Supplier";
                        } ?>

<div class="media mb-3 mt-5">
<img src="<?= base_url('/img/gandingrbg.png'); ?>" width="100px" height="75px" class="mr-3" alt="...">
  <div class="media-body">
    <h5 class="mt-0" style="font-size:23px;">PT. GANDING TOOLSINDO</h5>
    <ul class="list-group list-group-horizontal">
  <li class="list-group-item"> <label style="font-size:16px;">
    Jl. Raya Serang Cibarusah No. 17 Cikarang Kabupaten Bekasi
    No. Tlp (021)89956347
  </label>
  <span style="float:right; font-size:17px;"><?= $idsurjal; ?></span>
      </li>
  <li class="list-group-item"><strong style="font-size:17px;">
      <span style="text-align:center; font-size:17px;"><?= $namasupplier; ?></span>
      </strong> | <?= 'Dicetak Pada'.'  '.$date; ?> </li>
  <li class="list-group-item">
    <span style="font-size:17px;">Insterted At <?= $hasil[0]['tgl']; ?></span>
</li>

</ul>


  </div>
</div>
    <div class="col mt-3">
    <div class="d-flex bd-highlight">
</div>

    <div class="d-flex bd-highlight">
<table class="table mt-1" id="tabb">
        <thead class="">
            <tr>    
                <th scope="col" style="text-align:center; font-size:18px; width:1%;">No Surjal</th>
                <th scope="col" style="text-align:center; font-size:18px;">Info</th>
                <th scope="col" style="text-align:center; font-size:18px;">Material</th>
                <th scope="col" style="text-align:center; font-size:18px;">Quantity</th>
                <th scope="col" style="text-align:center; font-size:18px;">No PO Supplier</th>
                <th scope="col" >Unit</th>
                <th scope="col">Tgl Datang</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            <?php foreach($hasil as $a): ?>
                
                <?php $idpch = $a['id_purchase']; ?>
    <?php $quer =  mysqli_query($koneksi, "select * from purchasing where id = '$idpch' ");
                        $has = mysqli_fetch_all($quer, MYSQLI_ASSOC); ?>  
                        <?php $qty1 = $has[0]['qty_dtg1'];
                              $qty2 = $has[0]['qty_dtg2']; ?>
                          <?php if($a['info'] === 'kedatangan pertama' ){
                              $qty = $qty1;
                          }else {
                              $qty = $qty2;
                          } ?>    

    <tr>  
        <td style="text-align:center; font-size:18px; width:1%;"><?= $a['nomor_surjal']; ?></td>
      <td style="text-align:center; font-size:18px;"><?= $a['info']; ?></td>
      <td style="text-align:center; font-size:18px;"><?= $has[0]['spec']; ?></td>
      <td style="text-align:center; font-size:18px;"><?= $qty ?></td>
      <td style="text-align:center; font-size:18px;"><?= $has[0]['no_po_supplier']; ?></td>
      <td><?= $has[0]['unit']; ?></td>
      <td><?= $a['tgl']; ?></td>              
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>
</div>

<?php } ?>

<script type="text/javascript">
    window.print();
</script> 
<?= $this->endSection(); ?>
