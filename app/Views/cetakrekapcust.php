<?= $this->extend('layout/templatecetak'); ?>
<?= $this->Section('templatecetak'); ?>
<?php date_default_timezone_set('Asia/Jakarta');
 $date =date('Y-m-d'); ?> 


<?php if($nosurjal == ""){ ?>
    <div class="alert alert-warning" role="alert">
  <?= "Tidak Ada Data"; ?>
</div>
    <?php }else{ ?>
      <?php $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
                        $querysurjal =  mysqli_query($koneksi, "select * from surjalcust where nosurjal = '$nosurjal' ");
                        $hasilsurjal = mysqli_fetch_all($querysurjal, MYSQLI_ASSOC);
                        $idcust = $hasilsurjal[0]['id_customer']; ?>

                        <?php $querycust =  mysqli_query($koneksi, "select * from customer where id = $idcust ");
                        $hasilcust = mysqli_fetch_all($querycust, MYSQLI_ASSOC);
                        $hitungcust = mysqli_num_rows($querycust);
                        if ($hitungcust > 0) {
                          $namacustomer = "Rekap Surat Jalan"." "."Customer"."  ".$hasilcust[0]['nama_customer'];
                        }else {
                          $namacustomer = "No Data Customer";
                        } ?>

<div class="media mb-3 mt-5">
<img src="<?= base_url('/img/gandingrbg.png'); ?>" width="100px" height="75px" class="mr-3" alt="...">
  <div class="media-body">
    <h5 class="mt-0" style="font-size:23px;">PT. GANDING TOOLSINDO</h5>
    <ul class="list-group list-group-vertical">
  <li class="list-group-item"> <label style="font-size:16px;"> Jl. Raya Serang Cibarusah No. 17 Cikarang Kabupaten Bekasi
        No. Tlp (021)89956347</label>  <span style="float:right; font-size:17px;">Nomor Surat Jalan: <?= $nosurjal; ?></span> </li>
  <li class="list-group-item"><strong>
      <span style="text-align:center; font-size:17px;"><?= $namacustomer; ?></span>
      </strong> | <span style="font-size:17px;">
        <?= 'Dicetak Pada'.'  '.$date; ?> 
      </span>
      </li>
  <li class="list-group-item"> 
    <label style="font-size:17px;">
    Insterted At 
  </label>
    <span style="font-size:17px;"><?= $hasilsurjal[0]['tgl']; ?></span>
</li>

</ul>


  </div>
</div>
    <div class="col mt-3">
    <div class="d-flex bd-highlight">
</div>

  
 


  <div class="d-flex bd-highlight">
  <table class="table table-bordered border-primary mt-1 " style="border-color:black;" id="tab">
        <thead class="" style="border-color:black;">
            <tr  style="border-color:black;">    
                <th  style="border-color:black; text-align:center; font-size:23px;" style=" width:1%;">No</th>
                <th  style="border-color:black; text-align:center; font-size:23px;">Part Name</th>
                <th style="border-color:black; text-align:center; font-size:23px;">No.Purchase Order</th>
                <th  style="border-color:black; text-align:center; font-size:23px;">Quantity</th>
                <th  style="border-color:black; text-align:center; font-size:23px;">Tgl Delivery</th>
            </tr>
        </thead>
        <tbody style="border-color:black;">
            <?php $i=1; ?>
            <?php foreach($hasilsurjal as $a): ?>
              <?php $idpo = $a['idpo'];
  $queryposurjal =  mysqli_query($koneksi, "select * from po where id = $idpo ");
  $hasilposurjal = mysqli_fetch_all($queryposurjal, MYSQLI_ASSOC); ?> 
    <tr style="border-color:black;">  
        <td style="text-align:center; font-size:23px; width:1%;" style="border-color:black;"><?= $i++; ?></td>
      <td style="text-align:center; font-size:23px;" style="border-color:black;"><?= $hasilposurjal[0]['nama_part']; ?></td>
      <td style="text-align:center; font-size:23px;" style="border-color:black;"><?= $hasilposurjal[0]['nomor_po']; ?></td>
      <td style="text-align:center; font-size:23px;" style="border-color:black;"><?= $a['qty']; ?></td>              
      <td style="text-align:center; font-size:23px;" style="border-color:black;"><?= $a['tgl']; ?></td>
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>

<?php } ?>

<script type="text/javascript">
    window.print();
</script> 
<?= $this->endSection(); ?>