<?= $this->extend('layout/tampil'); ?>
<?= $this->Section('contet'); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col">

        <div class="col">
        <?php if(session()->getFlashdata('pesangagal')): ?>
  <div class="alert alert-danger" role="alert">
  <?= session()->getFlashdata('pesangagal'); ?>
</div>
  <?php endif; ?>
  <?php if(session()->getFlashdata('pesan')): ?>
  <div class="alert alert-info" role="alert">
  <?= session()->getFlashdata('pesan'); ?>
</div>
  <?php endif; ?>
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                 <i class="fa fa-object-group fa-2x"></i>
                                 <label>
                                    <span style="font-size:20px;">Purchasing</span>
                                 </label> 
                                 </div>
                              </div>
                              <div class="full inner_elements">
                                 <div class="row">
                                    <div class="col">
                                       <div class="tab_style2">
                                          <div class="tabbar padding_infor_info">
                                             <nav>
                                                <div class="nav nav-tabs" id="nav-tab1" role="tablist">
                                                   <a class="nav-item nav-link active" id="nav-home-tab2" data-toggle="tab" href="#nav-home_s2" role="tab" aria-controls="nav-home_s2" aria-selected="true">Supplier</a>
                                                   <a class="nav-item nav-link" id="nav-profile-tab2" data-toggle="tab" href="#nav-profile_s2" role="tab" aria-controls="nav-profile_s2" aria-selected="false">Purchase Order Supplier</a>
                                                   <a class="nav-item nav-link disabled" id="nav-contact-tab2" data-toggle="tab" href="#nav-contact_s2" role="tab" aria-controls="nav-contacts_s2" aria-selected="false">Material Request</a>
                                                   <a class="nav-item nav-link" id="nav-massage-tab2" data-toggle="tab" href="#nav-massage_s2" role="tab" aria-controls="nav-massage_s2" aria-selected="false">Material Receipt</a>
                                                   <?php $hitungplan = count($seeplan);
                                                   if($hitungplan > 0){ ?>
                                                   <a class="nav-item nav-link" id="nav-setting-tab2" data-toggle="tab" href="#nav-setting_s2" role="tab" aria-controls="nav-setting_s2" aria-selected="false"><span class="spinner-grow text-danger spinner-grow-sm float-lg-left badge">5</span>See Plan</a>
                                                   <?php }else{ ?>
                                                   <a class="nav-item nav-link" id="nav-setting-tab2" data-toggle="tab" href="#nav-setting_s2" role="tab" aria-controls="nav-setting_s2" aria-selected="false">See Plan</a>
                                                   
                                                      <?php } ?>
                                                </div>
                                             </nav>
                                             <div class="tab-content" id="nav-tabContent_2">
                                                <div class="tab-pane fade show active" id="nav-home_s2" role="tabpanel" aria-labelledby="nav-home-tab">
<a href="<?= base_url('/buatsup'); ?>" class="btn btn-sm btn-danger" style="float:left;">Tambah Supplier</a>
<div class="table-responsive">
<table class="table table-bordered table-hover mt-4" id="tabb">
        <thead class="table-secondary">
            <tr>  
            
                <th scope="col" style="text-align:center; width:1%;">No</th>
                <th scope="col" style="text-align:center;">Supplier Name</th>
                <th scope="col" style="text-align:center;">Alamat</th>
                <th scope="col" style="text-align:center;">Kontak</th>
                <th scope="col" style="text-align:center;">Email</th>
                <th scope="col" style="text-align:center;"></th>
            </tr>
        </thead>
        <tbody>
            <?php $a=1; ?>
            <?php foreach($sup as $b): ?>
    <tr>  
        <td style="text-align:center; width:1%;" hidden><?= $b['id']; ?></td>
        <td style="text-align:center; width:1%;"><?= $a++; ?></td>
      <td style="text-align:center;"><?= $b['nama_supplier']; ?></td>
      <td style="text-align:center;"><?= $b['alamat']; ?></td>
      <td style="text-align:center;"><?= $b['kontak']; ?></td>
      <td style="text-align:center;"><?= $b['email']; ?></td>
      <td><?= $b['person']; ?></td>              
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>

                                                </div>
                                                <div class="tab-pane fade" id="nav-profile_s2" role="tabpanel" aria-labelledby="nav-profile-tab">
<a href="<?= base_url('/buatposup'); ?>" class="btn btn-sm btn-danger" style="float:left;">Buat PO Supplier</a>
<div class="table-responsive">
<table class="table table-bordered table-hover mt-4" id="tab">
        <thead class="table-secondary">
            <tr>    
            <th hidden></th>
                <th scope="col" style="text-align:center; width:1%;">No</th>
                <th scope="col" style="text-align:center;">Supplier Name</th>
                <th scope="col" style="text-align:center;">No PO Supplier</th>
                <th scope="col" style="text-align:center;">Qty Order</th>
                <th scope="col" style="text-align:center;">Qty Actual</th>
                <th scope="col" style="text-align:center;">Outstand Qty</th>
                <th scope="col" ></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            <?php foreach($purchase as $a): ?>
    <tr>  
        <td style="text-align:center; width:1%;" hidden><?= $a['id']; ?></td>
        <td style="text-align:center; width:1%;"><?= $i++; ?></td>  
      <td style="text-align:center;"><?= $a['nama_supplier']; ?></td>
      <td style="text-align:center;"><?= $a['no_po_supplier']; ?></td>
      <td style="text-align:center;"><?= $a['qty_po']; ?></td>
      <td style="text-align:center;"><?= $a['qty_act']; ?></td>
      <td style="text-align:center;"><?= $a['outstanding_qty']; ?></td>
      <td><input type="button" id="tom" class="btn btn-xs btn-success" value="Detail">
   </td>              
   <?php if($a['status'] == 'sudah'){ ?>
   <td><input type="button" id="tombolrevisi" class="btn btn-xs btn-warning disabled" value="Revisi"></td>
   <?php }else{ ?>
      <td><input type="button" id="tombolrevisi" class="btn btn-xs btn-warning" value="Revisi"></td>
      <?php } ?>
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>

                                                </div>
                                                <div class="tab-pane fade" id="nav-contact_s2" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                   <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et 
                                                      quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos 
                                                      qui ratione voluptatem sequi nesciunt.
                                                   </p>
                                                </div>
                                                <div class="tab-pane fade" id="nav-massage_s2" role="tabpanel" aria-labelledby="nav-massage-tab">

                                                   <div class="d-flex flex-column bd-highlight mb-3">
                                                      <div class="row">
                                                         <div class="col-md-7">
                                                         <i class="fa fa-truck blue2_color fa-2x"></i> <span style="font-size:17px;">Material Receipt</span>
                                                            <form action="<?= base_url('/purchasing/kedatangan'); ?>" class="mt-3" method="POST">

                                                            <div class="form-row">
                <div class="form-group col-md-5">
                        <label for="nama_customer">Nama Supplier</label>
                        <select class="form-control pilihsup" name="nama_supplier" id="suppliersz" required>
                        <option value="">-Pilih Supplier</option>
                        <?php
                      $koneksis = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
                        $querysup =  mysqli_query($koneksis, "select * from supplier");
                        $hasilsup = mysqli_fetch_all($querysup, MYSQLI_ASSOC);
                        foreach ($hasilsup as $item){ ?>
                            <option value="<?php echo $item["id"];?>"><?php echo $item['nama_supplier'];?></option> 
                           <?php  } ?>
                    </select>
                    </div>
                    <div class="form-group col-md-5 partsupplier" id="partsupplier">
                        <label for="nama_customer">No PO Supplier</label>
                        <select class="form-control" name="nama_customer" id="bism" required>
                        <option value="" disabled="disabled">-Pilih Supplier Dahulu</option>
                    </select>
                    </div>
       

    </div>

<div class="sus">


</div>



<button type="submit" name="submit" class="btn btn-success">Submit</button>
                                                            </form>

                                                         </div>
                                                         <div class="col-md-2">
<?php  $koneksis = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
                        $querydetail =  mysqli_query($koneksis, "select * from supplier");
                        $hasildetail = mysqli_fetch_all($querydetail, MYSQLI_ASSOC); ?>
                                                         <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
    Data Rencana
  </button>
  <ul class="dropdown-menu ini" aria-labelledby="dropdownMenu2">
               <?php foreach($hasildetail as $ba): ?>
    <li class="ono" id="ono">
    <button class="dropdown-item buton" id="buton" value="<?= $ba['id']; ?>" type="button"><?= $ba['nama_supplier']; ?></button>
   </li>
               <?php endforeach; ?>
   </ul>
</div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                                            

                                                </div>
                                                <div class="tab-pane fade" id="nav-setting_s2" role="tabpanel" aria-labelledby="nav-setting-tab">

                                                <div class="d-flex flex-column bd-highlight mb-3">
                                                   
		<div class="row">
<div class="col-md-10">
	<div class="page-header">
   <h3></h3>
		<div class="pull-right form-inline">
			<div class="btn-group">
				<button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
				<button class="btn btn-default" data-calendar-nav="today">Today</button>
				<button class="btn btn-primary" data-calendar-nav="next">Next >></button>
			</div>
			<div class="btn-group">
				<button class="btn btn-warning" data-calendar-view="year">Year</button>
				<button class="btn btn-warning active" data-calendar-view="month">Month</button>
				<button class="btn btn-warning" data-calendar-view="week">Week</button>
				<button class="btn btn-warning" data-calendar-view="day">Day</button>
			</div>
		</div>
		
	</div>
	
		
			<div id="showEventCalendar"></div>
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
                        </div>


<div id="viewModal" class="modal fade mr-tp-100" role="dialog">

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
   let table = $('#tab').DataTable();
   $('#tab tbody').on( 'click', '#tom', function () {
	        var current_row = $(this).parents('tr');
	        if (current_row.hasClass('child')) {
	            current_row = current_row.prev();
	        }
           
           var data = table.row( current_row ).data();
	        console.log(data)
    $('.modal').load('<?= base_url('/detailpurchase.php?id='); ?>' + data[0]);  
    $("#viewModal").modal("toggle");
   });
   
    $('#suppliersz').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    //Added with the EDIT
    var datasup = $option.val();//to get content of "value" attrib
    console.log(datasup)
    
    
    $('#partsupplier').load('<?= base_url('/suppl.php?idsupplier='); ?>' + datasup);  
});

$('.ono').on( 'click', '.buton', function() {
      
      var dat = $(this).val();  
     
   $('.modal').load('<?= base_url('/detailrencana.php?id='); ?>' + dat);  
    $("#viewModal").modal("toggle");
   });
   
});
</script>   

<script type="text/javascript">
$(document).ready(function(){
   let table = $('#tab').DataTable();
   $('#tab tbody').on( 'click', '#tombolrevisi', function () {
	        var current_row = $(this).parents('tr');
	        if (current_row.hasClass('child')) {
	            current_row = current_row.prev();
	        }
           
           var data = table.row( current_row ).data();
	        console.log(data)
    $('.modal').load('<?= base_url('/history.php?id='); ?>' + data[0]);  
    $("#viewModal").modal("toggle");
   });
   
});
</script>   

<script>
$(document).ready(function() {
   let table = $('#tabb').DataTable();
});
</script>
 

<?= $this->endSection(); ?>