<?php $idsurjal=$_GET["id"];?>
<?php $idsup=$_GET["tgl"]; ?>

<?php if($idsurjal == 0 || $idsurjal == null ){ ?>
    <div class="alert alert-info" role="alert">
  <?= "Tidak Ada Data"; ?>
</div>
<?php } else {?>

<?php  $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
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
                          $namasupplier = "No Data Customer";
                        } ?>

    <div class="col">
        <form action="https://scmganding.site/public/home/cetakrekapsup/" method="GET">
        <input type="hidden" name="idsurjal" value="<?= $idsurjal; ?>">
        <input type="hidden" name="idsup" value="<?= $idsup; ?>">
            <button type="submit" style="float:right;" class="btn btn-sm btn-info">Cetak Rekap</button>
        </form>
    <div class="d-flex bd-highlight">
  <div class="p-2 flex-grow-1 bd-highlight"><span style="text-align:center; font-size:15px;"><?= $namasupplier; ?></span></div>
  <div class="p-2 bd-highlight">Insterted At</div>
  <div class="p-2 bd-highlight"><span><?= $hasil[0]['tgl']; ?></span></div>
</div>

    <div class="d-flex bd-highlight">
        <div class="table-responsive">
<table class="table mt-1" id="tabb">
        <thead class="">
            <tr>    
                <th scope="col" style="text-align:center; width:1%;">No Surjal</th>
                <th scope="col" style="text-align:center;">Info</th>
                <th scope="col" style="text-align:center;">Material</th>
                <th scope="col" style="text-align:center;">Quantity</th>
                <th scope="col" style="text-align:center;">No PO Supplier</th>
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
        <td style="text-align:center; width:1%;"><?= $a['nomor_surjal']; ?></td>
      <td style="text-align:center;"><?= $a['info']; ?></td>
      <td style="text-align:center;"><?= $has[0]['spec']; ?></td>
      <td style="text-align:center;"><?= $qty ?></td>
      <td style="text-align:center;"><?= $has[0]['no_po_supplier']; ?></td>
      <td><?= $has[0]['unit']; ?></td>
      <td><?= $a['tgl']; ?></td>              
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>
</div>
</div>

<?php } ?>