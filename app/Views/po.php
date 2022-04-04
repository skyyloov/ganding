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

  <i class="fa fa-shopping-cart fa-2x"></i> 
  <label>
      <span style="font-size:25px;">Data Purchase Order Customer</span>
    </label>
      <a href="<?= base_url('/buatpo'); ?>" class="btn btn-xs btn-danger" style="float:right;">Buat Purchase Order</a>

            <div class="table-responsive">
            <table  class="table table-hover table-bordered tabul mt-5" id="tabul" >
                <thead class="table-secondary">
                    <tr>
                        <th class="hidden"></th>
                        <th style="text-align: center;">Nama Customer</th>
                        <th style="text-align: center;">No.PO</th>
                        <th style="text-align: center;">Tanggal PO</th>
                        <th style="text-align: center;">Nama Part</th>
                        <th style="text-align: center; width: 10%;"></th>
                        <th></th>
                    </tr>
                </thead>
<tbody>
    <?php $i=1; ?>
	<?php foreach ($po as $row) : ?>
        
        <tr>
            <td class="hidden"><?= $row['id']; ?></td>
            <td><?php echo $row ["nama_customer"]; ?></td>
            <td><?php echo $row ["nomor_po"]; ?></td>
            <td><?php echo $row ["tgl_po"]; ?></td>
            <td><?php echo $row ["nama_part"]; ?></td>
            <td> 
                <input type="button" id="tombo" value="View Detail" class="btn btn-xs btn-success tombo"> 
            </td>
            <?php if($row['status'] == 'belum close'){ ?>
                <td><input type="button" id="tombolrevisi" value="Revisi" class="btn btn-xs btn-warning tombolrevisi"></td>
                <?php }else { ?>
                    <td></td>
                    <?php } ?>
        </tr>
        <?php $i++ ?>
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
   let table = $('#tabul').DataTable();
   $('#tabul tbody').on( 'click', '#tombo', function () {
	        var current_row = $(this).parents('tr');
	        if (current_row.hasClass('child')) {
	            current_row = current_row.prev();
	        }
           
           var data = table.row( current_row ).data();
	        console.log(data)
    $('.modal').load('<?= base_url('/detailpo.php?id='); ?>' + data[0]);  
    $("#viewModal").modal("toggle");
   });
});
</script>  

<script type="text/javascript">
$(document).ready(function(){
   let table = $('#tabul').DataTable();
   $('#tabul tbody').on( 'click', '#tombolrevisi', function () {
	        var current_row = $(this).parents('tr');
	        if (current_row.hasClass('child')) {
	            current_row = current_row.prev();
	        }
           
           var data = table.row( current_row ).data();
	        console.log(data)
    $('.modal').load('<?= base_url('/revisi.php?id='); ?>' + data[0]);  
    $("#viewModal").modal("toggle");
   });
});
</script>  

<?= $this->endSection(); ?>