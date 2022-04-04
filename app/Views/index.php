<?= $this->extend('layout/tampil'); ?>
<?= $this->Section('contet'); ?>  

<div class="container mt-5">
    <div class="row">
        <div class="col">
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
        
   <label>
       <i class="fa fa-users fa-2x"></i> <span style="font-size:25px;">Data Customer</span>
    </label>
    <a href="<?= base_url('/buatcust'); ?>" class="btn btn-sm btn-danger" style="float:right;">Tambah Data Customer</a>

                <div class="table-responsive">
                                          <table class="table table-hover table-bordered" id="tabeul">
                                             <thead class="table-secondary">
                                                <tr>
                                                   <th style="width: 2%">No</th>
                                                   <th style="width: 2%">Id</th>
                                                   <th style="width: 20%">Nama Customer</th>
                                                   <th style="width: 40%">Alamat</th>
                                                   <th>Kontak</th>
                                                   <th>Email</th>
                                                   <th></th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <?= $i=1; ?>
                                                <?php foreach($cust as $p): ?>
                                                <tr>
                                                   <td><?= $i++; ?></td>
                                                   <td><?= $p['id']; ?></td>
                                                   <td>
                                                      <a><?= $p['nama_customer']; ?></a>
                                                   </td>
                                                   <td>
                                                      <a><?= $p['alamat']; ?></a>
                                                   </td>
                                                   <td>
                                                       <a><?= $p['kontak']; ?></a>
                                                   </td>
                                                   <td>
                                                      
                                                      <a><?= $p['email']; ?></a>
                                                         <!-- <button class="btn btn-success add-more" id="tombol" type="button" ><i class="glyphicon glyphicon-plus"></i> Tambah</button> -->
                                                   </td>
                                                   <td>
                                                      <input type="button" id="tombol" value="View Part" class="btn btn-xs btn-success tombol"> 
                                                   </td>  
                                                  

<?php endforeach; ?>

</tbody>
</table>

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
   let table = $('#tabeul').DataTable();
   $('#tabeul tbody').on( 'click', '#tombol', function () {
	        var current_row = $(this).parents('tr');
	        if (current_row.hasClass('child')) {
	            current_row = current_row.prev();
	        }
           
           var data = table.row( current_row ).data();
	        console.log(data)
    $('.modal').load('<?= base_url('/details.php?id='); ?>' + data[1]);  
    $("#viewModal").modal("toggle");
   });
   
});
</script>   

<?= $this->endSection(); ?>