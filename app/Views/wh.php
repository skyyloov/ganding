<?= $this->extend('layout/tampil'); ?>
<?= $this->Section('contet'); ?>
<?php $koneksi = mysqli_connect('localhost','root','','ganding'); ?>
<?php $queryyy =  mysqli_query($koneksi, "select * from warehouse where unit = 'lembar' ");
                               $hasu = mysqli_fetch_all($queryyy, MYSQLI_ASSOC); 
                               $hit = mysqli_num_rows($queryyy); ?>

<?php $queryy =  mysqli_query($koneksi, "select * from warehouse where unit = 'sheet' ");
                               $hasul = mysqli_fetch_all($queryy, MYSQLI_ASSOC);
                               $hitu = mysqli_num_rows($queryy);  ?>

<?php $query =  mysqli_query($koneksi, "select * from warehouse where unit = 'coil' ");
                               $hasilwhcoil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                               $hitungwhcoil = mysqli_num_rows($query);  ?>

<?php $quer =  mysqli_query($koneksi, "select * from warehouse where unit = 'pcs' ");
                               $has = mysqli_fetch_all($quer, MYSQLI_ASSOC);
                               $hitungpcs = mysqli_num_rows($quer);  ?>

<?php $querytube =  mysqli_query($koneksi, "select * from warehouse where unit = 'tube' ");
                               $hasiltube = mysqli_fetch_all($querytube, MYSQLI_ASSOC);
                               $hitungtube = mysqli_num_rows($querytube);  ?>

<div class="container mt-5">
    <div class="row">
        <div class="col">

        <div class="col">
        <?php if(session()->getFlashdata('pesan')): ?>
  <div class="alert alert-danger" role="alert">
  <?= session()->getFlashdata('pesan'); ?>
</div>
  <?php endif; ?>

  <?php if(session()->getFlashdata('pesanberhasil')): ?>
  <div class="alert alert-info" role="alert">
  <?= session()->getFlashdata('pesanberhasil'); ?>
</div>
  <?php endif; ?>
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin">
                                 <i class="fas fa-warehouse fa-2x"></i>
                                 <label>
                                     <span style="font-size:20px;">Warehouse RM</span>
                                    </label>
                                 </div>
                              </div>
                              <div class="full inner_elements">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="tab_style3">
                                          <div class="tabbar padding_infor_info">
                                             <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Confirm Material Receipt</a>
                                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Material</a>
                                                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Delivery Note (Supplier)</a>
                                             </div>
                                             <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
<?php $koneksi = mysqli_connect('localhost','root','','ganding');
                   $queryy =  mysqli_query($koneksi, "select * from purchasing where konfirmasi = 'belum dikonfirmasi' or konfirmasi1 = 'belum dikonfirmasi' ");
                   $hasill = mysqli_fetch_all($queryy, MYSQLI_ASSOC); 
            $hitungg = mysqli_num_rows($queryy); ?>

                                                   <div class="container">
                                                       <div class="row">
      <?php if($hitungg > 0){ ?>                                                     
        <div class="col-md-4">

<div class="accordion accordion-flush" id="accordionFlushExample">
<div class="accordion-item">
<h2 class="accordion-header" id="flush-headingOne">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
<a><i class="fas fa-file blue2_color"></i> <span class="spinner-grow text-danger spinner-grow-sm float-lg-left badge">5</span>Need Confirmation</a>  
</button>
</h2>
<div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
<div class="accordion-body"> <ul class="list-group list-group-flush" id="daftar">
                                                           <?php foreach($hasill as $a): ?>               
                                                       <li   onmouseover="this.style.cursor='pointer';" class="list-group-item listpo" id="listpo" value="<?= $a['id']; ?>">

                                                       <span><?= $a['qty_act'].'  '; ?><?= $a['unit'].' '.$a['spec'].' '.$a['nama_supplier']; ?></span>

                                                       </li>
                                                            <?php endforeach; ?>   
                                                       </ul>
                                                   
                                                   </div>
</div>
</div>
</div>
</div>
<?php } else { ?>
    <div class="col-md-3">
    <a><i class="fas fa-file"></i> <span>Confirmation</span></a>
    <div class="alert alert-info" role="alert">
  <?php echo"Tidak Ada Kedatangan Yang Perlu Dikonfirmasi" ?>
</div>
    </div>
    <?php } ?>                                  
    
    <div class="col-md-5">
                                                           <a><i class="fas fa-check"></i> <span></span>Form Confirmation</a> 
                                                           <form method="post" action="<?= base_url('/warehouse/confirm'); ?>" class="mt-5">
               <div class="form-row">

               <div class="form-group col-md-6">
                        <label for="id_supplier">Nama Supplier</label>
                        <select class="form-control" name="id_supplier" id="suppp" required>
                        <option value="">-Pilih Supplier</option>
                        <?php
                     $koneksi = mysqli_connect('localhost','root','','ganding');
                        $query =  mysqli_query($koneksi, "select * from supplier");
                        $hasilsoep = mysqli_fetch_all($query, MYSQLI_ASSOC);
                        foreach ($hasilsoep as $item){ ?>
                            <option value="<?php echo $item["id"];?>"><?php echo $item['nama_supplier'];?></option> 
                           <?php  } ?>
                    </select>
                    </div>


                </div>
                
                <div class="form-row">
                <div class="form-group col-md-9 part">
                       <label for="nama_part">Nomor Purchase Order</label>
                       <select class="form-control" name="nama_material" required>
                        <option value="" disabled="disabled">-Pilih Supplier Dahulu</option>
                    </select>
                    </div>
                    
                </div>
                <div class="form-row confrm">

                </div>

                <button type="submit" name="submit" class="btn btn-xs btn-success">Submit Confirmation</button>
</form>
                       
                                                           </div>
                                                       </div>
                                                   </div>


                                                </div>
                                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                <nav>
                                                <div class="nav nav-tabs" id="nav-tab1" role="tablist">
                                                   <a class="nav-item nav-link active" id="nav-home-tab2" data-toggle="tab" href="#nav-home_s2" role="tab" aria-controls="nav-home_s2" aria-selected="true">Lembar</a>
                                                   <a class="nav-item nav-link" id="nav-profile-tab2" data-toggle="tab" href="#nav-profile_s2" role="tab" aria-controls="nav-profile_s2" aria-selected="false">Sheet</a>
                                                   <a class="nav-item nav-link" id="nav-contact-tab2" data-toggle="tab" href="#nav-contact_s2" role="tab" aria-controls="nav-contacts_s2" aria-selected="false">Coil</a>
                                                   <a class="nav-item nav-link" id="nav-massage-tab2" data-toggle="tab" href="#nav-massage_s2" role="tab" aria-controls="nav-massage_s2" aria-selected="false">Shearing Material</a>
                                                   <a class="nav-item nav-link" id="nav-setting-tab2" data-toggle="tab" href="#nav-setting_s2" role="tab" aria-controls="nav-setting_s2" aria-selected="false">Pieces</a>
                                                   <a class="nav-item nav-link" id="nav-tube-tab2" data-toggle="tab" href="#nav-tube_s2" role="tab" aria-controls="nav-tube_s2" aria-selected="false">Tube</a>
                                                </div>
                                             </nav>
                                             <div class="tab-content" id="nav-tabContent_2">
                                                <div class="tab-pane fade show active" id="nav-home_s2" role="tabpanel" aria-labelledby="nav-home-tab">
<?php if($hit > 0){ ?>
                                                <div class="table-responsive">
                                                <table class="table table-bordered table-hover mt-1" id="tab">
        <thead class="table-info">
            <tr>    
                <th scope="col" style="text-align:center; width:1%;">ID</th>
                <th scope="col" style="text-align:center;">Customer Name</th>
                <th scope="col" style="text-align:center;">Material</th>
                <th scope="col" style="text-align:center;">Spec</th>
                <th scope="col" style="text-align:center;">Quantity</th>
                <th scope="col" ></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            <?php foreach($hasu as $a): ?>
                <?php 
                $kodepart1 = $a['kodepart'];
                $querypart1 =  mysqli_query($koneksi, "select * from part where kode_part = '$kodepart1' ");
                               $hasilpart1 = mysqli_fetch_all($querypart1, MYSQLI_ASSOC); ?>
    <tr>  
        <td style="text-align:center; width:1%;"><?= $a['id']; ?></td>
      <td style="text-align:center;"><?= $a['nama_customer']; ?></td>
      <td style="text-align:center;"><?= $hasilpart1[0]['nama_part']; ?></td>
      <td style="text-align:center;"><?= $a['spec']; ?></td>
      <td style="text-align:center;"><?= floor($a['total_qty']); ?></td>
      <td><input type="button" id="tom" class="btn btn-xs btn-success" value="See Detail"></td>              
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>
<?php } else{ ?>
   <div class="alert alert-info" role="alert">
  <?php echo"Tidak Ada Material" ?>
</div>
<?php } ?>

                                                   </div>

                                                   <div class="tab-pane fade" id="nav-profile_s2" role="tabpanel" aria-labelledby="nav-profile-tab">
<?php if($hitu > 0){ ?>
                                            <div class="table-responsive">
                                                   <table class="table table-bordered table-hover mt-1" id="tabbb">
        <thead class="table-info">
            <tr>    
                <th scope="col" style="text-align:center; width:1%;">ID</th>
                <th scope="col" style="text-align:center;">Customer Name</th>
                <th scope="col" style="text-align:center;">Material</th>
                <th scope="col" style="text-align:center;">Spec</th>
                <th scope="col" style="text-align:center;">Quantity</th>
                <th scope="col" ></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            <?php foreach($hasul as $d): ?>
                <?php 
                    $kodepart2 = $d['kodepart'];
                $querypart2 =  mysqli_query($koneksi, "select * from part where kode_part = '$kodepart2' ");
                               $hasilpart2 = mysqli_fetch_all($querypart2, MYSQLI_ASSOC); ?>

                <tr>  
        <td style="text-align:center; width:1%;"><?= $d['id']; ?></td>
      <td style="text-align:center;"><?= $d['nama_customer']; ?></td>
      <td style="text-align:center;"><?= $hasilpart2[0]['nama_part']; ?></td>
      <td style="text-align:center;"><?= $d['spec']; ?></td>
      <td style="text-align:center;"><?= floor($d['total_qty']); ?></td>
      <td><input type="button" id="tommm" class="btn btn-xs btn-success" value="See Detail"></td>              
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>
<?php } else{ ?>
   <div class="alert alert-info" role="alert">
  <?php echo"Tidak Ada Material" ?>
</div>
   <?php } ?>                                                  

</div>

                                                  <div class="tab-pane fade" id="nav-contact_s2" role="tabpanel" aria-labelledby="nav-contact-tab">
<?php if($hitungwhcoil > 0){ ?>
                                            <div class="table-responsive">
                                                    <table class="table table-bordered table-hover mt-1" id="tabb">
        <thead class="table-info">
            <tr>    
                <th scope="col" style="text-align:center; width:1%;">ID</th>
                <th scope="col" style="text-align:center;">Customer Name</th>
                <th scope="col" style="text-align:center;">Material</th>
                <th scope="col" style="text-align:center;">Spec</th>
                <th scope="col" style="text-align:center;">Quantity</th>
                <th scope="col" ></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            <?php foreach($hasilwhcoil as $b): ?>
                <?php 
                    $kodepart3 = $b['kodepart'];
                $querypart3 =  mysqli_query($koneksi, "select * from part where kode_part = '$kodepart3' ");
                               $hasilpart3 = mysqli_fetch_all($querypart3, MYSQLI_ASSOC); ?>

    <tr>  
        <td style="text-align:center; width:1%;"><?= $b['id']; ?></td>
      <td style="text-align:center;"><?= $b['nama_customer']; ?></td>
      <td style="text-align:center;"><?= $hasilpart3[0]['nama_part']; ?></td>
      <td style="text-align:center;"><?= $b['spec']; ?></td>
      <td style="text-align:center;"><?= floor($b['total_qty']); ?></td>
      <td><input type="button" id="tomm" class="btn btn-xs btn-success" value="See Detail"></td>              
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>
<?php } else{ ?>
   <div class="alert alert-info" role="alert">
  <?php echo"Tidak Ada Material" ?>
</div>
<?php } ?>

                                                   </div>

                                                   <div class="tab-pane fade" id="nav-tube_s2" role="tabpanel" aria-labelledby="nav-tube-tab">
<?php if($hitungtube > 0){ ?>
                                        <div class="table-responsive">
                                                   <table class="table table-bordered table-hover mt-1" id="tabeltube">
        <thead class="table-info">
            <tr>    
                <th scope="col" style="text-align:center; width:1%;">ID</th>
                <th scope="col" style="text-align:center;">Customer Name</th>
                <th scope="col" style="text-align:center;">Material</th>
                <th scope="col" style="text-align:center;">Spec</th>
                <th scope="col" style="text-align:center;">Quantity</th>
                <th scope="col" ></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            <?php foreach($hasiltube as $t): ?>
                <?php 
                    $kodepart6 = $t['kodepart'];
                $querypart6 =  mysqli_query($koneksi, "select * from part where kode_part = '$kodepart6' ");
                               $hasilpart6 = mysqli_fetch_all($querypart6, MYSQLI_ASSOC); ?>

                <tr>  
        <td style="text-align:center; width:1%;"><?= $t['id']; ?></td>
      <td style="text-align:center;"><?= $t['nama_customer']; ?></td>
      <td style="text-align:center;"><?= $hasilpart6[0]['nama_part']; ?></td>
      <td style="text-align:center;"><?= $t['spec']; ?></td>
      <td style="text-align:center;"><?= floor($t['total_qty']); ?></td>
      <td><input type="button" id="tomboltube" class="btn btn-xs btn-success" value="See Detail"></td>              
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>
<?php } else{ ?>
   <div class="alert alert-info" role="alert">
  <?php echo"Tidak Ada Material" ?>
</div>
   <?php } ?>                                                  

</div>


                                                   <div class="tab-pane fade" id="nav-massage_s2" role="tabpanel" aria-labelledby="nav-massage-tab">
<div class="col-md-6">
<a>Shearing Lembar Menjadi Sheet</a>
<form action="<?= base_url('/warehouse/shearing'); ?>" method="POST">

<div class="form-row">
<div class="form-group col-md-7">
<label for="nama_customer">Nama Material</label>
<select class="form-control" name="nama_material" id="mats" required>
<option value="">-Pilih Material</option>
<?php
$koneksi = mysqli_connect('localhost','root','','ganding');
$query =  mysqli_query($koneksi, "select * from warehouse where unit = 'lembar' ");
$hasilmat = mysqli_fetch_all($query, MYSQLI_ASSOC);
foreach ($hasilmat as $item){ ?>
<option value="<?php echo $item["id"];?>"><?php echo $item['nama_material'];?></option> 
<?php  } ?>
</select>
</div>
</div>

<div class="form-row ses">

</div>


<div class="form-row">

<div class="form-group col-md-6">
<label for="qty_shearing">Quantity</label>
    <input type="text" class="form-control" autocomplete="off" name="qty_shearing" placeholder="berapa lembar yang ingin di shearing" id="qty_shearing">
    
</div>

</div>



<button type="submit" name="submit" class="btn btn-success">Submit</button>
</form>

</div>

<div class="col-md-6">

   <a>Membuat Sheet Dari Lembar</a>
<form action="<?= base_url('/warehouse/cutsize'); ?>" method="POST">

<div class="form-row">
<div class="form-group col-md-7">
<label for="nama_customer">Nama Material</label>
<select class="form-control" name="nama_material" id="matz" required>
<option value="">-Pilih Material</option>
<?php
$koneksi = mysqli_connect('localhost','root','','ganding');
$query =  mysqli_query($koneksi, "select * from warehouse where unit = 'lembar' ");
$hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
foreach ($hasil as $item){ ?>
<option value="<?php echo $item["id"];?>"><?php echo $item['nama_material'];?></option> 
<?php  } ?>
</select>
</div>
</div>

<div class="form-row sus">
</div>


<div class="form-row">

<div class="form-group col-md-6">
<label for="qty_shearing">Quantity</label>
    <input type="text" class="form-control" name="qty_shearing" autocomplete="off" placeholder="Ingin Membuat Berapa Sheet" id="qty_shearing">
</div>

</div>



<button type="submit" name="submit" class="btn btn-success">Submit</button>
</form>

</div>

</div>

<div class="tab-pane fade" id="nav-setting_s2" role="tabpanel" aria-labelledby="nav-setting-tab">
<?php if($hitungpcs > 0){ ?>
                                    <div class="table-responsive">
                                                    <table class="table table-bordered table-hover mt-1" id="tabelpcs">
        <thead class="table-info">
            <tr>    
                <th scope="col" style="text-align:center; width:1%;">ID</th>
                <th scope="col" style="text-align:center;">Customer Name</th>
                <th scope="col" style="text-align:center;">Material</th>
                <th scope="col" style="text-align:center;">Spec</th>
                <th scope="col" style="text-align:center;">Quantity</th>
                <th scope="col" ></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            <?php foreach($has as $p): ?>
                <?php
                    $idpart4 = $p['kodepart'];
                $querypart4 =  mysqli_query($koneksi, "select * from part where kode_part = '$idpart4' ");
                               $hasilpart4 = mysqli_fetch_all($querypart4, MYSQLI_ASSOC); ?>

    <tr>  
        <td style="text-align:center; width:1%;"><?= $p['id']; ?></td>
      <td style="text-align:center;"><?= $p['nama_customer']; ?></td>
      <td style="text-align:center;"><?= $hasilpart4[0]['nama_part']; ?></td>
      <td style="text-align:center;"><?= $p['spec']; ?></td>
      <td style="text-align:center;"><?= $p['total_qty']; ?></td>
      <td><input type="button" id="tombolpcs" class="btn btn-xs btn-success" value="See Detail"></td>              
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>
<?php } else{ ?>
   <div class="alert alert-info" role="alert">
  <?php echo"Tidak Ada Material" ?>
</div>
<?php } ?>
                                

</div>


                                                </div>



                                                </div>

                                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

                                                   <div class="col">

<form action="">
   <div class="form-row" id="delivery">
   <div class="form-group col-md-3">
                        <label for="nama_customer">Nama Supplier</label>
                        <select class="form-control" name="nama_customer" id="supplier" required>
                        <option value="0">-Pilih Supplier</option>
                        <?php
                      $koneksi = mysqli_connect('localhost','root','','ganding');
                        $query =  mysqli_query($koneksi, "select * from supplier");
                        $hasilsup = mysqli_fetch_all($query, MYSQLI_ASSOC);
                        foreach ($hasilsup as $item){ ?>
                            <option value="<?php echo $item["id"];?>"><?php echo $item['nama_supplier'];?></option> 
                            <?php  } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-5 surjal" id="">
                        <label for="nama_customer">No Surat Jalan</label>
                        <select class="form-control" name="nama_customer" id="surjal" required>
                        <option value="0" disabled="disabled" selected="true">-Pilih Supplier Dahulu</option>
                    </select>
                    </div>              
   </div>
</form>

<div class="deliv" id="">

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



        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#mats').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    //Added with the EDIT
    var data = $option.val();//to get content of "value" attrib
    console.log(data)
    $('.ses').load('<?= base_url('/shear.php?id='); ?>' + data);  
});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#matz').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    //Added with the EDIT
    var data = $option.val();//to get content of "value" attrib
    console.log(data)
    $('.sus').load('<?= base_url('/shear.php?id='); ?>' + data);  
});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#suppp').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    //Added with the EDIT
    var data = $option.val();//to get content of "value" attrib
    console.log(data)
    $('.part').load('<?= base_url('/suppl.php?idd='); ?>' + data);  
});
});
</script>

<script type="text/javascript">
$(document).ready(function(){
   let table = $('#tabelpcs').DataTable();
   $('#tabelpcs tbody').on( 'click', '#tombolpcs', function () {
	        var current_row = $(this).parents('tr');
	        if (current_row.hasClass('child')) {
	            current_row = current_row.prev();
	        }
           
           var data = table.row( current_row ).data();
	        console.log(data)
    $('.modal').load('<?= base_url('/whdet.php?id='); ?>' + data[0]);  
    $("#viewModal").modal("toggle");
   });
   
});
</script> 

<script type="text/javascript">
$(document).ready(function(){
   let table = $('#tab').DataTable();
   $('#tab tbody').on( 'click', '#tom', function () {
	        var current_row = $(this).parents('tr');
	        if (current_row.hasClass('child')) {
	            current_row = current_row.prev();
	        }
           
           var data = table.row( current_row ).data();
	        console.log(data)
    $('.modal').load('<?= base_url('/whdet.php?id='); ?>' + data[0]);  
    $("#viewModal").modal("toggle");
   });
   
});
</script>   

<script type="text/javascript">
$(document).ready(function(){
   $('#tabb tbody').on( 'click', '#tomm', function () {
      let table = $('#tabb').DataTable();
	        var current_row = $(this).parents('tr');
	        if (current_row.hasClass('child')) {
	            current_row = current_row.prev();
	        }
           
           var data = table.row( current_row ).data();
	        console.log(data)
    $('.modal').load('<?= base_url('/whdet.php?id='); ?>' + data[0]);  
    $("#viewModal").modal("toggle");
   });
   
});
</script> 

<script type="text/javascript">
$(document).ready(function(){
   let table = $('#tabbb').DataTable();
   $('#tabbb tbody').on( 'click', '#tommm', function () {
	        var current_row = $(this).parents('tr');
	        if (current_row.hasClass('child')) {
	            current_row = current_row.prev();
	        }
           
           var data = table.row( current_row ).data();
	        console.log(data)
    $('.modal').load('<?= base_url('/whdet.php?id='); ?>' + data[0]);  
    $("#viewModal").modal("toggle");
   });
   
});
</script> 

<script type="text/javascript">
$(document).ready(function(){
   let table = $('#tabeltube').DataTable();
   $('#tabeltube tbody').on( 'click', '#tomboltube', function () {
	        var current_row = $(this).parents('tr');
	        if (current_row.hasClass('child')) {
	            current_row = current_row.prev();
	        }
           
           var data = table.row( current_row ).data();
	        console.log(data)
    $('.modal').load('<?= base_url('/whdet.php?id='); ?>' + data[0]);  
    $("#viewModal").modal("toggle");
   });
   
});
</script> 

<script type="text/javascript">
$(document).ready(function(){
$('#delivery').change(function() {
    var tanggal = $('#supplier option:selected').val();
    var data = $('#surjal option:selected').val();

    $('.deliv').load('<?= base_url('/surjal.php?id='); ?>'+data + '&tgl=' + tanggal );
});

});
</script>  

<script type="text/javascript">
$(document).ready(function(){
    $('#supplier').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    //Added with the EDIT
    var data = $option.val();//to get content of "value" attrib
    console.log(data)
    $('.surjal').load('<?= base_url('/suppl.php?iddd='); ?>' + data);  
});
});
</script>  

<?= $this->endSection(); ?>