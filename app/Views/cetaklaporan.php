<?= $this->extend('layout/templatecetak'); ?>
<?= $this->Section('templatecetak'); ?>



<?php  $koneksi = mysqli_connect('localhost','root','','ganding'); ?>
<?php  $querycetak =  mysqli_query($koneksi, "select * from laporanproduksi where proses = '$proses' and tanggal like '$tgl%' ");
                      $hasilcetak = mysqli_fetch_all($querycetak, MYSQLI_ASSOC); ?>
<div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row">
                        <!-- invoice section -->
                        <div class="media mb-3 mt-5">
  <img src="<?= base_url('/img/gandingrbg.png'); ?>" width="100px" height="75px" class="mr-3" alt="...">
  <div class="media-body">
    <h5 class="mt-0" style="font-size:23px;">PT. GANDING TOOLSINDO</h5>
    <ul class="list-group list-group-vertical">
  <li class="list-group-item"> <label style="font-size:16px;"> Jl. Raya Serang Cibarusah No. 17 Cikarang Kabupaten Bekasi
        No. Tlp (021)89956347</label>  <span style="float:right; font-size:17px;">Laporan Hasil Produksi </li>
  <li class="list-group-item"><strong>
      <span style="text-align:center; font-size:17px;"></span>
      </strong> | <span style="font-size:17px;">
        <?= 'Dicetak Pada'.'  '.$tgl; ?> 
      </span>
      </li>
</ul>


  </div>
</div>
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0"> 
                                <label>
                                </label>    
                                </h2>
                                 </div>
                              </div>
                              <div class="full padding_infor_info">
                                 <div class="table_row">
                                    <div class="table-responsive laporanprod">
                                       <table class="table">
                                          <thead>
                                             <tr>
                                                <th border=4; style="width:14px; text-align:center; font-size:15px;">Product</th>
                                                <th border=4; style="width:14px; text-align:center; font-size:15px;">Process</th>
                                                <th border=4; style="width:14px; text-align:center; font-size:15px;">Quantity</th>
                                                <th border=4; style="width:14px; text-align:center; font-size:15px;">Not Good</th>
                                                <th border=4; style="width:30px; text-align:center; font-size:15px;">Description</th>
                                                <th border=4; style="width:14px; text-align:center; font-size:15px;">Date</th>
                                             </tr>
                                          </thead>

                                          <tbody>
                                                <?php foreach($hasilcetak as $a): ?>
                                             <tr>
                                                 <?php
                                                 $idpart = $a['id_part'];
                                                 $query =  mysqli_query($koneksi, "select * from part where id = $idpart ");
                      $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                      $menghitung = mysqli_num_rows($query);
                      if($menghitung > 0 ){
                        $namapart = $hasil[0]['nama_part'];
                      }else{
                            $namapart = "";                      
                      }?>
                                                <td style="text-align:center; font-size:15px;"><?= $namapart; ?></td>
                                                <td style="text-align:center; font-size:15px;"><?= "Proses"." ".$a['proses']; ?></td>
                                                <td style="text-align:center; font-size:15px;"><?= $a['quantity']; ?></td>
                                                <td style="text-align:center; font-size:15px;"><?= $a['ng']; ?></td>
                                                <td style="text-align:center; font-size:15px;">
                                            <p>
                                                <?= $a['keterangan']; ?>
                                            </p>        
                                            </td>
                                                <td style="text-align:center; font-size:15px;"><?= $a['tanggal']; ?></td>
                                             </tr>
                                                    <?php endforeach; ?>
                                          </tbody>

                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>


<script type="text/javascript">
    window.print();
</script> 
<?= $this->endSection(); ?>