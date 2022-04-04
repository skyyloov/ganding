<?= $this->extend('layout/tampil'); ?>
<?= $this->Section('contet'); ?>

<?php  date_default_timezone_set('Asia/Jakarta');
        $date =date('Y-m-d');  ?>

<?php  $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding'); ?>
<div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row">
                        <!-- invoice section -->
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2><i class="fa fa-file-text-o"></i> 
                                <label>
                                    Laporan Produksi
                                </label>    
                                </h2>
                                 </div>

                                 <div class="lapsz">
                                    <div class="form-group col-md-2" style="float:right;">
                                       <input type="text"  class="form-control" name="proses" autocomplete="off" id="proses" placeholder="Process 1-7" required>
                                       <span id="pesan"></span>
                                    </div>
                                    <div class="form-group col-md-2" style="float:right;">
                                       <input type="date"  class="form-control" name="tgl" value="<?= $date; ?>" id="tgl" placeholder="Tanggal" required>
                                    </div>

                                 </div>


                              </div>
                              <div class="full">
                                 <div class="invoice_inner">
                                    <div class="row">
                                       <div class="col-md-5">
                                          <div class="full invoice_blog padding_infor_info padding-bottom_0">
                                             <p><strong>PT Ganding Toolsindo</strong><br>  
                                             Jl. Raya Serang Cibarusah No. 17 Cikarang Kabupaten Bekasi<br>    
                                                <strong>Phone : </strong><a>No. Tlp (021)89956347</a><br>  
                                                <strong>Email : </strong><a>ganding_toolsindo2004@yahoo.com</a>
                                             </p>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="full invoice_blog padding_infor_info padding-bottom_0">
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="full invoice_blog padding_infor_info padding-bottom_0">
                                             <p><strong>Laporan Hasil Produksi: </strong><br> 
                                                <strong>Date : </strong> <a id="tanggalanproduksi">
                                                   <?= $date; ?>
                                                </a>  
                                             </p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="full padding_infor_info">
                                 <div class="table_row">
                                    <div class="table-responsive laporanprod">
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

                                              <?php $menghitung=count($proses);
                                                if($menghitung > 0){     ?>
                                          <tbody>
                                                <?php foreach($proses as $a): ?>
                                             <tr>
                                                 <?php
                                                 $idpart = $a['id_part'];
                                                 $query =  mysqli_query($koneksi, "select * from part where id = $idpart ");
                      $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                      $hitung = mysqli_num_rows($query); 
                       if($hitung > 0){
                           $namapart = $hasil[0]['nama_part'];
                       }else{
                           $namapart = "";
                       }
                       ?>
                                                <td style="text-align:center;"><?= $namapart; ?></td>
                                                <td style="text-align:center;"><?= "Proses"." ".$a['proses']; ?></td>
                                                <td style="text-align:center;"><?= $a['quantity']; ?></td>
                                                <td style="text-align:center;"><?= $a['ng']; ?></td>
                                                <td style="text-align:center;">
                                            <p>
                                                <?= $a['keterangan']; ?>
                                            </p>        
                                            </td>
                                                <td style="text-align:center;"><?= $a['tanggal']; ?></td>
                                             </tr>
                                                    <?php endforeach; ?>
                                                    
                                          </tbody>
                                          <a href="https://scmganding.site/public/cetaklaporan/<?= $proses[0]['proses']; ?>/<?= $date; ?>" target="blank" class="btn btn-xs btn-warning" style="float:right;">Cetak Laporan</a>
                                        <?php }else{ ?>
                                         <div class="alert alert-danger" role="alert">
  <?= "Tidak Ada Data Laporan Produksi"; ?>
</div>
                                        <?php } ?>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

// <script type="text/javascript">
// $(document).ready(function(){

    
//     $("#proses").keydown(function(data){
//       if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57))
//       {
//         $("#pesan").html("isikan angka").show().fadeOut("slow");
//         return false;
//       }
//     });

// });
// </script> 

               <script type="text/javascript">
$(document).ready(function(){
    $('.lapsz').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var proses = $('#proses').val();
    var tgl = $('#tgl').val();
    $('.laporanprod').load('<?= base_url('/laporan.php?proses='); ?>' + proses + '&tgl=' + tgl);
    $('#tanggalanproduksi').html(tgl);  
});
});
</script>  

<?= $this->endSection(); ?>