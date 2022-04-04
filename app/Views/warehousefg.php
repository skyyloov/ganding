<?= $this->extend('layout/tampil'); ?>
<?= $this->Section('contet'); ?>
<?php $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding'); ?>
<div class="container mt-5">
    <?php if(session()->getFlashdata('pesan')): ?>
  <div class="alert alert-info" role="alert">
  <?= session()->getFlashdata('pesan'); ?>
</div>
  <?php endif; ?>
  
  <?php if(session()->getFlashdata('pesangagal')): ?>
  <div class="alert alert-danger" role="alert">
  <?= session()->getFlashdata('pesangagal'); ?>
</div>
  <?php endif; ?>
    <!-- tab style 2 -->
                        <div class="col">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                   <i class="fas fa-check fa-2x"></i> <span style="font-size:20px;"><label for="">Warehouse Finish Good</label></span>
                                 </div>
                              </div>
                              <div class="full inner_elements">
                                 <div class="row">
                                    <div class="col">
                                       <div class="tab_style2">
                                          <div class="tabbar padding_infor_info">
                                             <nav>
                                                <div class="nav nav-tabs" id="nav-tab1" role="tablist">
                                                   <a class="nav-item nav-link active" id="nav-home-tab2" data-toggle="tab" href="#nav-home_s2" role="tab" aria-controls="nav-home_s2" aria-selected="true">Data Finish Good</a>
                                                   <a class="nav-item nav-link" id="nav-profile-tab2" data-toggle="tab" href="#nav-profile_s2" role="tab" aria-controls="nav-profile_s2" aria-selected="false">Delivery Subcont</a>
                                                   <a class="nav-item nav-link" id="nav-contact-tab2" data-toggle="tab" href="#nav-contact_s2" role="tab" aria-controls="nav-contacts_s2" aria-selected="false">Delivery Note (Subcont)</a>
                                                   <a class="nav-item nav-link" id="nav-arrival-tab2" data-toggle="tab" href="#nav-arrival_s2" role="tab" aria-controls="nav-arrival_s2" aria-selected="false">Kedatangan (Arrival)</a>
                                                    <a class="nav-item nav-link" id="nav-history-tab2" data-toggle="tab" href="#nav-history_s2" role="tab" aria-controls="nav-history_s2" aria-selected="false">Rekap Subcont (All)</a>
                                                </div>
                                             </nav>
                                             
                                             <!--navtab datafg-->
                                             
                                             <div class="tab-content" id="nav-tabContent_2">
                                                <div class="tab-pane fade show active" id="nav-home_s2" role="tabpanel" aria-labelledby="nav-home-tab">
                                                   
                                                   
                                                   <!-- tab style 3 -->
                        <div class="col">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full inner_elements">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="tab_style3">
                                          <div class="tabbar padding_infor_info">
                                             <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active" id="v-pills-datafinishpart-tab" data-toggle="pill" href="#v-pills-datafinishpart" role="tab" aria-controls="v-pills-datafinishpart" aria-selected="true">Data Finish Part</a>
                                                <a class="nav-link" id="v-pills-datafinishassy-tab" data-toggle="pill" href="#v-pills-datafinishassy" role="tab" aria-controls="v-pills-datafinishassy" aria-selected="false">Data Finish Assy Welding</a>
                                                <a class="nav-link" id="v-pills-subcont-tab" data-toggle="pill" href="#v-pills-subcont" role="tab" aria-controls="v-pills-subcont" aria-selected="false">Data Finish SubCont</a>
                                             </div>
                                             <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-datafinishpart" role="tabpanel" aria-labelledby="v-pills-datafinishpart-tab">
                                                  
                                                  
                                                  <?php
                                                  $hitungfp = count($finishpart);
                                                  if($hitungfp > 0){ ?>
                                            <div class="table-responsive">
                                                   <table class="table table-bordered table-hover mt-1" id="tabelfinishpart">
        <thead class="table-info">
            <tr>    
                <th hidden scope="col" style="text-align:center; width:1%;">ID</th>
                <th scope="col" style="text-align:center; width:1%;">No</th>
                <th scope="col" style="text-align:center;">Customer Name</th>
                <th scope="col" style="text-align:center;">Part Name</th>
                <th scope="col" style="text-align:center;">Quantity</th>
                <th scope="col" style="text-align:center;">Description</th>
                <th scope="col" ></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            <?php foreach($finishpart as $d): ?>
                <?php 
                    $idpart = $d['id_part'];
                $querypart2 =  mysqli_query($koneksi, "select * from part where id = $idpart ");
                               $hasilpart2 = mysqli_fetch_all($querypart2, MYSQLI_ASSOC);
                               if ($d['keterangan'] == ""){
                                   $keterangan = "Finish Part";
                               }else{
                                   $keterangan = $d['keterangan'];
                               }
                               ?>

                <tr>  
        <td hidden style="text-align:center; width:1%;"><?= $d['id']; ?></td>
        <td  style="text-align:center; width:1%;"><?= $i++; ?></td>
      <td style="text-align:center;"><?= $hasilpart2[0]['nama_customer']; ?></td>
      <td style="text-align:center;"><?= $d['nama_part']; ?></td>
      <td style="text-align:center;"><?= $d['qty']; ?></td>
      <td style="text-align:center;"><?= $keterangan; ?></td>
      <td>
          </td>              
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>
<?php } else{ ?>
   <div class="alert alert-info" role="alert">
  <?php echo"Tidak Ada Data Finish Part" ?>
</div>
   <?php } ?>                                                  

                                                  
                                                  
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-datafinishassy" role="tabpanel" aria-labelledby="v-pills-datafinishassy-tab">
                                                   
                                                   
                                                             
                                         <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
      <?php foreach($welding as $a):
        $idfg = $a['id'];
      ?>
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        <?= $a['nama_fg']." | ".$a['nama_customer']." | "." Stock = ".$a['qty']; ?>
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
        <?php  $querypart3 =  mysqli_query($koneksi, "select * from finishgood where id_fg = $idfg ");
                               $hasilpart3 = mysqli_fetch_all($querypart3, MYSQLI_ASSOC); ?>
      <div class="accordion-body">
          <ul class="list-group">
    <?php foreach($hasilpart3 as $j): ?>
    
    <?php $idpartweld = $j['id_part'];
    
    $querypart4 =  mysqli_query($koneksi, "select * from part where id = $idpartweld ");
                               $hasilpart4 = mysqli_fetch_all($querypart4, MYSQLI_ASSOC);
    ?>
    
  <li class="list-group-item"><?= $hasilpart4[0]['nama_part']; ?></li>
  
  <?php endforeach; ?>
</ul>
      </div>
    </div>
  
  <?php endforeach; ?>
  </div>
</div>
        
                                                   
                                                   
                                                </div>
                                              
                                              
                                              <div class="tab-pane fade" id="v-pills-subcont" role="tabpanel" aria-labelledby="v-pills-subcont-tab">
                                                   
                                                   
                                                                <?php
                                                  $hitungsubcont = count($finishsubcont);
                                                  if($hitungsubcont > 0){ ?>
                                        <div class="table-responsive">
                                                   <table class="table table-bordered table-hover mt-1" id="tabelweld">
        <thead class="table-warning">
            <tr>    
                <th hidden scope="col" style="text-align:center; width:1%;">ID</th>
                <th scope="col" style="text-align:center; width:1%;">No</th>
                <th scope="col" style="text-align:center;">Customer Name</th>
                <th scope="col" style="text-align:center;">Part Name</th>
                <th scope="col" style="text-align:center;">Quantity</th>
                <th scope="col" style="text-align:center;">Description</th>
                <th scope="col" ></th>
            </tr>
        </thead>
        <tbody>
            <?php $u=1; ?>
            <?php foreach($finishsubcont as $g): ?>
                <?php 
                    $idpart = $g['id_part'];
                $querypart5 =  mysqli_query($koneksi, "select * from part where id = $idpart ");
                               $hasilpart5 = mysqli_fetch_all($querypart5, MYSQLI_ASSOC);
                               if ($g['keterangan'] == ""){
                                   $keterangan = "Finish Part";
                               }else{
                                   $keterangan = $g['keterangan'];
                               }
                               ?>

                <tr>  
        <td hidden style="text-align:center; width:1%;"><?= $g['id']; ?></td>
        <td  style="text-align:center; width:1%;"><?= $u++; ?></td>
      <td style="text-align:center;"><?= $hasilpart5[0]['nama_customer']; ?></td>
      <td style="text-align:center;"><?= $g['nama_part']; ?></td>
      <td style="text-align:center;"><?= $g['qty']; ?></td>
      <td style="text-align:center;"><?= $keterangan; ?></td>
      <td>
          
          <!--<input type="button" id="tommm" class="btn btn-xs btn-info" value="See Detail">-->
          
          </td>              
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>
<?php } else{ ?>
   <div class="alert alert-info" role="alert">
  <?php echo"Tidak Ada Data Finish Subcont" ?>
</div>
   <?php } ?>        
                                                   
                                                   
                                                </div>
                                              
                                              
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                                                   
                                                   
                                                </div>
                                        
                                        <!--akhir navtab data fg        -->
                                                
                                    <!--navtab delivery subcont            -->
                                                <div class="tab-pane fade" id="nav-profile_s2" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                
                                                
                                                 <div class="col-md-10">
   
    <a><i class="fa fa-american-sign-language-interpreting fa-2x"></i> <span style="font-size:15px;">Subcont Finish Part</span></a>

    <form action="<?= base_url('/warehousefg/delivsubcont'); ?>" method="post" class="mt-3">

    <div class="form-row">

       
       <div class="form-group col-md-4">
          <label for="partfinish">Part Name</label>
          <select class="form-control" name="partfinish" id="partfinish" required>
             <option value="">~Pilih Part~</option>
             <?php
                      $query =  mysqli_query($koneksi, "select * from warehousefg where keterangan = '' ");
                      $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                      foreach ($hasil as $item){ ?>
                            <option value="<?php echo $item["id_part"];?>"><?php echo $item['nama_part'];?></option> 
                            <?php  } ?>
                           </select>
                        </div>
                        <div class="form-group col-md-2">
                           <label for="qty">Quantity Delivery</label>
                           <input type="text" id="qtykirim" autocomplete="off" class="form-control qty" name="qty">
                           <span id="pesan"></span>
                        </div>
                        
                        <div class="form-group col-md-3">
          <label for="namasup">Supplier Name</label>
          <select class="form-control" name="nama_supplier" id="namasup" required>
             <option value="">~Pilih Supplier~</option>
             <?php
                      $querysup =  mysqli_query($koneksi, "select * from supplier ");
                      $hasilsup = mysqli_fetch_all($querysup, MYSQLI_ASSOC);
                      foreach ($hasilsup as $item){ ?>
                            <option value="<?php echo $item["id"];?>"><?php echo $item['nama_supplier'];?></option> 
                            <?php  } ?>
                           </select>
                        </div>
                        
                     </div>


       <div class="form-row">
       <div class="form-group col-md-4">
                <label for="nosurjal">Nomor Surat Jalan</label>
       <input type="text" class="form-control" autocomplete="off" name="nosurjal" required>
       </div>
       <div class="form-group col-md-4">
                <label for="posup">Nomor Purchase Order</label>
       <input type="text" class="form-control" autocomplete="off" required name="posup">
       </div>
       </div>

       <button type="submit" name="submit" class="main_bt">Submit Delivery</button>
    </form>

    </div>
                                                
                                                
                                                </div>
                                                
                                        <!--akhir navtab deliverysubcont-->
                                                
                                                
                                                <!--navtab surjalsubcont-->
                                                
                                                <div class="tab-pane fade" id="nav-contact_s2" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                  
                                                  <div class="row">
                                                      
                                                   <div class="form-group col-md-4">
          <label for="surjaldeliverysubcont">Delivery Note</label>
          <select class="form-control" name="surjaldeliverysubcont" id="surjaldeliverysubcont" required>
             <option value="">~Pilih~</option>
             <?php
             
             $querysoerjal =  mysqli_query($koneksi, "select DISTINCT nomorsurjal from surjalsubcont ");
                      $hasilsoerjal = mysqli_fetch_all($querysoerjal, MYSQLI_ASSOC);
             
             foreach ($hasilsoerjal as $itemsurjal){ ?>
                            <option value="<?php echo $itemsurjal["nomorsurjal"];?>"><?php echo $itemsurjal['nomorsurjal'];?></option> 
                            <?php  } ?>
                           </select>
                        </div>
                                                  </div>
                                                  
                                                  <div class="row mt-3 surjaldelivery">
                                                      
                                                      
                                                  </div>
                                                  
                                                  
                                                </div>
                                          <!--akhirnavtab surjalsubcont-->
                                          
                                          <!--navtab kedatangan      -->
                                                <div class="tab-pane fade" id="nav-arrival_s2" role="tabpanel" aria-labelledby="nav-arrival-tab">
                                                  
                                                  
                                                   <div class="col">
                           <div class="white_shd full margin_bottom_30">
                              
                              <div class="full inner_elements">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="tab_style3">
                                          <div class="tabbar padding_infor_info">
                                             <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active" id="v-pills-kedatangan-tab" data-toggle="pill" href="#v-pills-kedatangan" role="tab" aria-controls="v-pills-kedatangan" aria-selected="true">Subcont</a>
                                                <a class="nav-link" id="v-pills-rekapsurjal-tab" data-toggle="pill" href="#v-pills-rekapsurjal" role="tab" aria-controls="v-pills-rekapsurjal" aria-selected="false">Rekap Surjal</a>
                                             </div>
                                             <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-kedatangan" role="tabpanel" aria-labelledby="v-pills-kedatangan-tab">
                                                   
                                                   
                                                   <?php
                                                  $hitungsub = count($subcont);
                                                  if($hitungsub > 0){ ?>
                                            <div class="table-responsive">
                                                   <table class="table table-bordered table-hover mt-1" id="tabelsubcont">
        <thead class="table-info">
            <tr>    
                <th scope="col" style="text-align:center; ">ID Part</th>
                <th scope="col" style="text-align:center;">Part Name</th>
                <th scope="col" style="text-align:center;">Quantity Sent</th>
                <th scope="col" style="text-align:center;">Quantity Arrive</th>
                <th scope="col" style="text-align:center;">Not Good</th>
                <th scope="col" ></th>
            </tr>
        </thead>
        <tbody>
            <?php $w=1; ?>
            <?php foreach($subcont as $g): ?>
                <?php 
                    $idpart = $g['id_part'];
                $querypart7 =  mysqli_query($koneksi, "select * from part where id = $idpart ");
                               $hasilpart7 = mysqli_fetch_all($querypart7, MYSQLI_ASSOC);
                               $namapart = $hasilpart7[0]['nama_part'];
                               ?>

                <tr>  
        <td  style="text-align:center; "><?= $g['id_part']; ?></td>
      <td style="text-align:center;"><?= $namapart; ?></td>
      <td style="text-align:center;"><?= $g['quantitykirim']; ?></td>
      <td style="text-align:center;"><?= $g['quantitydatang']; ?></td>
      <td style="text-align:center;"><?= $g['ng']; ?></td>
      <td><input type="button" id="tombolsubcont" class="btn btn-xs btn-info" value="Input Kedatangan"></td>              
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>
<?php } else{ ?>
   <div class="alert alert-info" role="alert">
  <?php echo"Tidak Ada Data Part Yang Disubcont" ?>
</div>
   <?php } ?>                                                  
                                                   
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-rekapsurjal" role="tabpanel" aria-labelledby="v-pills-rekapsurjal-tab">
                                                  
                                                  
                                                  
                                                   <div class="row">
                                                      
                                                   <div class="form-group col-md-4">
          <label for="suppliersubcont">Supplier</label>
          <select class="form-control" name="supplier" id="suppliersubcont" required>
             <option value="">~Pilih Supplier~</option>
             <?php
             
             $querysupplier =  mysqli_query($koneksi, "select * from supplier ");
                      $hasilsupplier = mysqli_fetch_all($querysupplier, MYSQLI_ASSOC);
             
             foreach ($hasilsupplier as $itemsupplier){ ?>
                            <option value="<?php echo $itemsupplier["id"];?>"><?php echo $itemsupplier['nama_supplier'];?></option> 
                            <?php  } ?>
                           </select>
                        </div>
                        
                        <div class="form-group col-md-4 dnkedatangan" id="dnkedatangan">
          <label for="">Pilih Surat Jalan</label>
          <select class="form-control" name="supplier" id="surjalkedatangan" required>
             <option value="">~Pilih Surat Jalan~</option>

                            <option value="" disabled="disabled">Pilih Supplier Dahulu</option> 
                            
                           </select>
                        </div>
                                                  </div>
                                                  
                                                  <div class="row mt-3 surjalkedatangan">
                                                      
                                                      
                                                  </div>
                                                  
                                                  
                                                  
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                                                </div>
                              <!--akhirnavtab kedatangan                  -->
                                                
                                                
                                                <!--navtab rekap subcont-->
                                                
                                                 <div class="tab-pane fade" id="nav-history_s2" role="tabpanel" aria-labelledby="nav-history-tab">
                                                  
                                                     <?php
                                                  $hitunghistory = count($historysubcont);
                                                  if($hitunghistory > 0){ ?>
                                            <div class="table-responsive">
                                                   <table class="table table-bordered table-hover mt-1" id="tabelhistory">
        <thead class="table-info">
            <tr>    
                <th scope="col" style="text-align:center; ">ID Part</th>
                <th scope="col" style="text-align:center;">Part Name</th>
                <th scope="col" style="text-align:center;">Quantity Sent</th>
                <th scope="col" style="text-align:center;">Quantity Arrive</th>
                <th scope="col" style="text-align:center;">Not Good</th>
                <th scope="col" ></th>
            </tr>
        </thead>
        <tbody>
            <?php $w=1; ?>
            <?php foreach($historysubcont as $h): ?>
                <?php 
                    $idpart = $h['id_part'];
                $querypart7 =  mysqli_query($koneksi, "select * from part where id = $idpart ");
                               $hasilpart7 = mysqli_fetch_all($querypart7, MYSQLI_ASSOC);
                               $namapart = $hasilpart7[0]['nama_part'];
                               ?>

                <tr>  
        <td  style="text-align:center; "><?= $h['id_part']; ?></td>
      <td style="text-align:center;"><?= $namapart; ?></td>
      <td style="text-align:center;"><?= $h['quantitykirim']; ?></td>
      <td style="text-align:center;"><?= $h['quantitydatang']; ?></td>
      <td style="text-align:center;"><?= $h['ng']; ?></td>
      <td></td>              
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>
<?php } else{ ?>
   <div class="alert alert-info" role="alert">
  <?php echo"Tidak Ada Data Rekapan Subcont" ?>
</div>
   <?php } ?>                                                  
                                                  
                                                  
                                                </div>
                                                
                                         <!--akhirnavtab history subcont-->
                                                
                                                
                                                
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
    
</div>


<div id="viewModal" class="modal fade mr-tp-100" role="dialog">

<div class="modal-dialog modal-lg ">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" >View Data</h4>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
           
        </div>
    </div>
</div>
</div>



<script type="text/javascript">
$(document).ready(function(){
    $('#surjaldeliverysubcont').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    //Added with the EDIT
    var data = $option.val();//to get content of "value" attrib
    console.log(data)
    $('.surjaldelivery').load('<?= base_url('/surjalsubcont.php?iddelivery='); ?>' + data);  
});


$('#suppliersubcont').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    //Added with the EDIT
    var data = $option.val();//to get content of "value" attrib
    console.log(data)
    $('.dnkedatangan').load('<?= base_url('/suppliersubcont.php?idsupplier='); ?>' + data);  
});

// $('#surjalkedatangan').change(function() {
//     //Use $option (with the "$") to see that the variable is a jQuery object
//     var $option = $(this).find('option:selected');
//     //Added with the EDIT
//     var datasurjal = $option.val();//to get content of "value" attrib
//     console.log(datasurjal)
//     $('.surjalkedatangan').load('<?= base_url('/surjalsubcont.php?idsupplier='); ?>' + datasurjal);    
// });

});
</script>

<script type="text/javascript">
$(document).ready(function(){
    
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    
   let table = $('#tabelsubcont').DataTable();
   
   $('#tabelsubcont tbody').on( 'click', '#tombolsubcont', function () {
	        var current_row = $(this).parents('tr');
	        if (current_row.hasClass('child')) {
	            current_row = current_row.prev();
	        }
           
           var data = table.row( current_row ).data();
	        console.log(data)
    $('.modal').load('<?= base_url('/kedatangansubcont.php?id='); ?>' + data[0]);  
    $("#viewModal").modal("toggle");
   });
   
});
</script> 

<script type="text/javascript">
$(document).ready(function(){

    
    $(".qty").keydown(function(data){
      if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57))
      {
        $("#pesan").html("isikan angka").show().fadeOut("slow");
        return false;
      }
    });

});
</script> 

<script type="text/javascript">
$(document).ready(function(){
   let table = $('#tabelweld').DataTable();
   
});
</script> 

<script type="text/javascript">
$(document).ready(function(){
   let table = $('#tabelhistory').DataTable();
   
});
</script> 

<script type="text/javascript">
$(document).ready(function(){
   let table = $('#tabelfinishpart').DataTable();
   
});
</script>

<?= $this->endSection(); ?>