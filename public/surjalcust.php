<style>
.garis_tepi1 {
     border: 1px solid;
}
.garis_tepi2 {
     border: 4px solid;
}
</style>

<?php $nosurjal = $_GET['nosurjal']; ?>

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

<a href="https://scmganding.site/public/home/cetakrekapcust/<?= $nosurjal; ?>" style="float:right;" target="blank" class="btn btn-sm btn-warning">Cetak Rekap</a>
  <div class="d-flex bd-highlight">
  <div class="p-2 flex-grow-1 bd-highlight"><span style="text-align:center; font-size:17px;"><?= $namacustomer; ?></span></div>
  <div class="p-2 bd-highlight">Insterted At</div>
  <div class="p-2 bd-highlight"><span><?= $hasilsurjal[0]['tgl']; ?></span></div>
</div>

  <div class="d-flex bd-highlight">
      <div class="table-responsive">
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
              <?php $idpo = $a['idpo'];
  $queryposurjal =  mysqli_query($koneksi, "select * from po where id = $idpo ");
  $hasilposurjal = mysqli_fetch_all($queryposurjal, MYSQLI_ASSOC); ?> 
    <tr>  
        <td style="text-align:center; width:1%;"><?= $i++; ?></td>
      <td style="text-align:center;"><?= $hasilposurjal[0]['nama_part']; ?></td>
      <td style="text-align:center"><?= $hasilposurjal[0]['nomor_po']; ?></td>
      <td style="text-align:center;"><?= $a['qty']; ?></td>
      <td style="text-align:center;"><?= $a['tgl']; ?></td>              
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>
</div>

<?php } ?>