<?php $proses=$_GET["proses"];?>
<?php $tgl=$_GET["tgl"]; ?>
<?php  $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding'); ?>
<?php  $querylaporan =  mysqli_query($koneksi, "select * from laporanproduksi where proses = '$proses' and tanggal like '$tgl%' ");
                      $hasillaporan = mysqli_fetch_all($querylaporan, MYSQLI_ASSOC);
                      $hitunglaporan = mysqli_num_rows($querylaporan); ?>
                      <?php if($hitunglaporan > 0){ ?>
                        <a href="https://scmganding.site/public/cetaklaporan/<?= $proses; ?>/<?= $tgl; ?>" target="blank" class="btn btn-xs btn-warning" style="float:right;">Cetak Laporan</a>
<table class="table">
                                          <thead>
                                             <tr>
                                                <th style="width:14px; text-align:center;">Product</th>
                                                <th style="width:14px; text-align:center;">Process</th>
                                                <th style="width:14px; text-align:center;">Quantity</th>
                                                <th style="width:14px; text-align:center;">Not Good</th>
                                                <th style="width:30px; text-align:center;">Description</th>
                                                <th style="width:14px; text-align:center;">Date</th>
                                             </tr>
                                          </thead>

                                          <tbody>
                                                <?php foreach($hasillaporan as $b): ?>
                                             <tr>
                                                 <?php
                                                 $idpart = $b['id_part'];
                                                 $querypart =  mysqli_query($koneksi, "select * from part where id = $idpart ");
                      $hasil = mysqli_fetch_all($querypart, MYSQLI_ASSOC); ?>
                                                <td style="text-align:center;"><?= $hasil[0]['nama_part']; ?></td>
                                                <td style="text-align:center;"><?= "Proses"." ".$b['proses']; ?></td>
                                                <td style="text-align:center;"><?= $b['quantity']; ?></td>
                                                <td style="text-align:center;"><?= $b['ng']; ?></td>
                                                <td style="text-align:center;">
                                            <p>
                                                <?= $b['keterangan']; ?>
                                            </p>        
                                            </td>
                                                <td style="text-align:center;"><?= $b['tanggal']; ?></td>
                                             </tr>
                                                    <?php endforeach; ?>
                                          </tbody>

                                       </table>
<?php }else{ ?>
    <div class="alert alert-danger" role="alert">
  <?= "Tidak Ada Data Laporan Produksi"; ?>
</div>
<?php } ?>