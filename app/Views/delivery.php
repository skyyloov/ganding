<?= $this->extend('layout/tampil'); ?>
<?= $this->Section('contet'); ?>


<div class="container mt-5">
    <div class="row">
        <div class="col">

        <?php if(session()->getFlashdata('pesan')){ ?>
  <div class="alert alert-danger" role="alert">
  <?= session()->getFlashdata('pesan'); ?>
</div>
  <?php }elseif (session()->getFlashdata('pesanberhasil')) {?>
    <div class="alert alert-info" role="alert">
  <?= session()->getFlashdata('pesanberhasil'); ?>
</div>
    <?php } ?>
        <div class="col">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                 <a><i class="fas fa-shipping-fast fa-2x"></i>
                                 <label>
                                    <span style="font-size:20px;">Delivery</span></a>
                                 </label> 
                                 </div>
                              </div>
                              <div class="full inner_elements">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="tab_style2">
                                          <div class="tabbar padding_infor_info">
                                             <nav>
                                                <div class="nav nav-tabs" id="nav-tab1" role="tablist">
                                                   <a class="nav-item nav-link active" id="nav-home-tab2" data-toggle="tab" href="#nav-home_s2" role="tab" aria-controls="nav-home_s2" aria-selected="true">Delivery Schedule</a>
                                                   <a class="nav-item nav-link" id="nav-profile-tab2" data-toggle="tab" href="#nav-profile_s2" role="tab" aria-controls="nav-profile_s2" aria-selected="false">Delivery Note(Customer)</a>
                                                   <a class="nav-item nav-link" id="nav-pengiriman-tab2" data-toggle="tab" href="#nav-pengiriman_s2" role="tab" aria-controls="nav-pengiriman_s2" aria-selected="false">Delivery Finish Good</a>
                                                </div>
                                             </nav>
                                             <div class="tab-content" id="nav-tabContent_2">
                                                <div class="tab-pane fade show active" id="nav-home_s2" role="tabpanel" aria-labelledby="nav-home-tab">
                                                  
                                                <div class="col-md-6">

                                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="flush-headingOne">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                                    Daftar Purchase Order Customer
                                                                </button>
                                                            </h2>
                                                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                                <div class="accordion-body">
                    <?php  $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
                      $query =  mysqli_query($koneksi, "select * from po where status = 'belum close' ");
                      $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                      $hitung = mysqli_num_rows($query); ?>
<?php if($hitung > 0 ){ ?>

                                                                <ul class="list-group list-group-flush" id="daftar">
                                                                    <?php foreach($hasil as $a): ?>               
                                                                <li   onmouseover="this.style.cursor='pointer';" class="list-group-item listpo" id="listpo" value="<?= $a['id']; ?>">

                                                                <?= $a['nama_customer']."  ".$a['nomor_po']."  ".$a['nama_part']."  ".$a['qty_pcs']; ?>

                                                                </li>
                                                                     <?php endforeach; ?>   
                                                                </ul>
  <?php }elseif($hitung < 1){ ?>
  <div class="alert alert-info" role="alert">
  <?= "No Data"; ?>
</div>
    <?php } ?>
                                                            </div>
                                                            </div>
                                                        </div>
</div>
</div>

<div class="col-md-6 scheduledeliv">

</div>

</div>
<!-- nav delivery note -->
<div class="tab-pane fade" id="nav-profile_s2" role="tabpanel" aria-labelledby="nav-profile-tab">


<div class="col">

<form action="">
   <div class="form-row" id="delivery">
   <div class="form-group col-md-3">
                        <label for="nama_customer">Nama Customer</label>
                        <select class="form-control" name="nama_customer" id="customer" required>
                        <option value="0">-Pilih Customer</option>
                        <?php
                     $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
                        $query =  mysqli_query($koneksi, "select * from customer");
                        $hasilsup = mysqli_fetch_all($query, MYSQLI_ASSOC);
                        foreach ($hasilsup as $item){ ?>
                            <option value="<?php echo $item["id"];?>"><?php echo $item['nama_customer'];?></option> 
                            <?php  } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-5 surjal" id="">
                        <label for="nama_customer">No Surat Jalan</label>
                        <select class="form-control" name="nama_customer" id="surjal" required>
                        <option value="" disabled="disabled" selected="true">-Pilih Customer Dahulu</option>
                    </select>
                    </div>              
   </div>
</form>

<div class="deliv" id="">

</div>
                                                   </div>



                                                </div>
<!-- nav pengiriman -->
<div class="tab-pane fade" id="nav-pengiriman_s2" role="tabpanel" aria-labelledby="nav-pengiriman-tab">
    <div class="col-md-6">
   
    <a><i class="fab fa-docker yellow_color fa-2x"></i> <span style="font-size:15px;">Finish Part</span></a>

    <form action="<?= base_url('/delivery/finishpart'); ?>" method="post" class="mt-3">

    <div class="form-row">

       
       <div class="form-group col-md-6">
          <label for="nama_customer">Part Name</label>
          <select class="form-control" name="nama_part" id="partfinish" required>
             <option value="">~Pilih Part~</option>
             <?php
                     $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
                      $query =  mysqli_query($koneksi, "select * from warehousefg");
                      $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                      foreach ($hasil as $item){ ?>
                            <option value="<?php echo $item["id"];?>"><?php echo $item['nama_part'].' | '.$item['keterangan'];?></option> 
                            <?php  } ?>
                           </select>
                        </div>
                        <div class="form-group col-md-4">
                           <label for="qty">Quantity Delivery</label>
                           <input type="text" id="qtykirim" autocomplete="off" class="form-control" name="qty">
                           <span id="pesan"></span>
                        </div>
                     </div>


       <div class="form-row">
       <div class="form-group col-md-4">
                <label for="nosurjal">Nomor Surat Jalan</label>
       <input type="text" class="form-control" autocomplete="off" name="nosurjal">
       </div>
       </div>

       <button type="submit" name="submit" class="btn btn-xs btn-success">Submit Delivery</button>
    </form>

    </div>

    <div class="col-md-6">
    
    <a><i class="fa fa-truck purple_color fa-2x"></i> <span style="font-size:15px;">Finish Assy Welding</span></a>

<form action="<?= base_url('/delivery/assyweld'); ?>" method="post" class="mt-3">

    <div class="form-row">

       
       <div class="form-group col-md-6">
          <label for="nama_customer">Finish Good Name</label>
          <select class="form-control" name="id_fg" id="fg" required>
             <option value="">~Pilih FG~</option>
             <?php
                     $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
                      $query =  mysqli_query($koneksi, "select * from welding");
                      $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                      foreach ($hasil as $item){ ?>
                            <option value="<?php echo $item["id"];?>"><?php echo $item['nama_fg'];?></option> 
                            <?php  } ?>
                           </select>
                        </div>
                        <div class="form-group col-md-4">
                           <label for="qty">Quantity Delivery</label>
                           <input type="text" id="qtykirimm" autocomplete="off" class="form-control" name="qty">
                           <span id="pesann"></span>
                        </div>
                     </div>


       <div class="form-row">
       <div class="form-group col-md-4">
                <label for="nosurjal">Nomor Surat Jalan</label>
       <input type="text" class="form-control" autocomplete="off" name="nosurjal">
       </div>
       
       
       </div>

       <button type="submit" name="submit" class="btn btn-xs btn-success">Submit Delivery FG</button>
    </form>


    </div>

                                                </div>
<!-- akhir nav tab -->
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        
                        <div class="modal fade" id="viewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

<div class="modal-dialog modal-lg">
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



        </div>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function(){
   
   $('#daftar').on( 'click', '.listpo', function () {
	        var idval = $(this).val();
            
    $('.scheduledeliv').load('<?= base_url('/scheduledeliv.php?id='); ?>' + idval);  
   });
   
});
</script> 

<script type="text/javascript">
$(document).ready(function(){

    
    $("#qtykirim").keypress(function(data){
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

    
    $("#qtykirimm").keypress(function(data){
      if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57))
      {
        $("#pesann").html("isikan angka").show().fadeOut("slow");
        return false;
      }
    });
   
});
</script> 

<script type="text/javascript">
$(document).ready(function(){
    $('#customer').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    //Added with the EDIT
    var data = $option.val();//to get content of "value" attrib
    console.log(data)
    $('.surjal').load('<?= base_url('/suppl.php?idcustomer='); ?>' + data);  
});
});
</script>  




<?= $this->endSection(); ?>