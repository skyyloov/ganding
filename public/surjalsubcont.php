<?php if(isset($_GET['iddelivery'])){ ?>
<?php $iddelivery = $_GET['iddelivery']; ?>

<?php if($iddelivery == ""){ ?>
    <div class="alert alert-warning" role="alert">
  <?= "Tidak Ada Data"; ?>
</div>
    <?php }else{ ?>
      <?php $koneksi = mysqli_connect('localhost','root','','ganding');
                        $querysurjal =  mysqli_query($koneksi, "select * from surjalsubcont where nomorsurjal = '$iddelivery' ");
                        $hasilsurjal = mysqli_fetch_all($querysurjal, MYSQLI_ASSOC);
                        $idsup = $hasilsurjal[0]['id_supplier']; ?>

                        <?php $querycust =  mysqli_query($koneksi, "select * from supplier where id = $idsup ");
                        $hasilcust = mysqli_fetch_all($querycust, MYSQLI_ASSOC);
                        $hitungcust = mysqli_num_rows($querycust);
                        if ($hitungcust > 0) {
                          $namacustomer = "Rekap Surat Jalan Subcont"."  "."Supplier"."  ".$hasilcust[0]['nama_supplier'];
                        }else {
                          $namacustomer = "No Data Supplier";
                        } ?>

  <div class="d-flex bd-highlight">

  <div class="p-2 flex-grow-1 bd-highlight"><span style="text-align:center; font-size:17px;"><?= $namacustomer; ?></span></div>
  <div class="p-2 bd-highlight">Insterted At</div>
  <div class="p-2 bd-highlight"><span><?= $hasilsurjal[0]['tgl']; ?></span></div>
</div>

  <div class="d-flex bd-highlight">
      <div class="table-responsive">
          <!--<a href="https://scmganding.site/public/home/cetakrekapcust/<?= $nosurjal; ?>" style="float:right;" target="blank" class="btn btn-sm btn-warning">Cetak Rekap</a>-->
  <table class="table mt-1" id="tab">
        <thead class="" style="border:1px;">
            <tr>    
                <th scope="col" style="text-align:center; width:1%;">No</th>
                <th scope="col" style="text-align:center;">Part Name</th>
                <th scope="col" style="text-align:center;">No.Purchase Order</th>
                <th scope="col" style="text-align:center;">Quantity</th>
                <th scope="col" style="text-align:center;">Tgl Delivery</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            <?php foreach($hasilsurjal as $a): ?>
              <?php 
              $idpart = $a['id_part'];
  $queryposurjal =  mysqli_query($koneksi, "select * from part where id = $idpart ");
  $hasilposurjal = mysqli_fetch_all($queryposurjal, MYSQLI_ASSOC); ?> 
    <tr>  
        <td style="text-align:center; width:1%;"><?= $i++; ?></td>
      <td style="text-align:center;"><?= $hasilposurjal[0]['nama_part']; ?></td>
      <td style="text-align:center"><?= $a['no_po_supplier']; ?></td>
      <td style="text-align:center;"><?= $a['quantity']; ?></td>
      <td style="text-align:center;"><?= $a['tgl']; ?></td>              
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>
</div>

<?php } ?>

<?php }elseif(isset($_GET['idsupplier'])){ ?>

<?php $iddelivery = $_GET['idsupplier']; ?>

<?php if($iddelivery == ""){ ?>
    <div class="alert alert-warning" role="alert">
  <?= "Tidak Ada Data"; ?>
</div>
    <?php }else{ ?>
      <?php $koneksi = mysqli_connect('localhost','root','','ganding');
                        $querysurjal =  mysqli_query($koneksi, "select * from surjaldatangsubcont where nomorsurjal = '$iddelivery' ");
                        $hasilsurjal = mysqli_fetch_all($querysurjal, MYSQLI_ASSOC);
                        $idsup = $hasilsurjal[0]['idsup']; ?>

                        <?php $querycust =  mysqli_query($koneksi, "select * from supplier where id = $idsup ");
                        $hasilcust = mysqli_fetch_all($querycust, MYSQLI_ASSOC);
                        $hitungcust = mysqli_num_rows($querycust);
                        if ($hitungcust > 0) {
                          $namacustomer = "Rekap Surat Jalan Subcont"."  "."Supplier"."  ".$hasilcust[0]['nama_supplier'];
                        }else {
                          $namacustomer = "No Data Supplier";
                        } ?>

  <div class="d-flex bd-highlight">

  <div class="p-2 flex-grow-1 bd-highlight"><span style="text-align:center; font-size:17px;"><?= $namacustomer; ?></span></div>
  <div class="p-2 bd-highlight">Insterted At</div>
  <div class="p-2 bd-highlight"><span><?= $hasilsurjal[0]['tgl']; ?></span></div>
</div>

  <div class="d-flex bd-highlight">
      <div class="table-responsive">
          <!--<a href="https://scmganding.site/public/home/cetakrekapcust/<?= $nosurjal; ?>" style="float:right;" target="blank" class="btn btn-sm btn-warning">Cetak Rekap</a>-->
  <table class="table mt-1" id="tab">
        <thead class="" style="border:1px;">
            <tr>    
                <th scope="col" style="text-align:center; width:1%;">No</th>
                <th scope="col" style="text-align:center;">Part Name</th>
                <th scope="col" style="text-align:center;">No.Purchase Order</th>
                <th scope="col" style="text-align:center;">Quantity</th>
                <th scope="col" style="text-align:center;">Not Good</th>
                <th scope="col" style="text-align:center;">Keterangan</th>
                <th scope="col" style="text-align:center;">Tgl Delivery</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            <?php foreach($hasilsurjal as $a): ?>
              <?php 
              $idpart = $a['id_part'];
  $queryposurjal =  mysqli_query($koneksi, "select * from part where id = $idpart ");
  $hasilposurjal = mysqli_fetch_all($queryposurjal, MYSQLI_ASSOC); ?> 
    <tr>  
        <td style="text-align:center; width:1%;"><?= $i++; ?></td>
      <td style="text-align:center;"><?= $hasilposurjal[0]['nama_part']; ?></td>
      <td style="text-align:center"><?= $a['no_po_supplier']; ?></td>
      <td style="text-align:center;"><?= $a['qty']; ?></td>
      <td style="text-align:center;"><?= $a['ng']; ?></td>
      <td style="text-align:center;"><?= $a['keterangan']; ?></td>
      <td style="text-align:center;"><?= $a['tgl']; ?></td>              
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>
</div>

<?php } ?>

<?php } ?>