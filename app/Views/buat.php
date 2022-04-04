<?= $this->extend('layout/tampil'); ?>
<?= $this->Section('contet'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script type='text/javascript'>
$(window).load(function(){
$("#ktp").change(function() {
      console.log($("#ktp option:selected").val());
      if ($("#ktp option:selected").val() !== '8') {
        $('#no_ktp').prop('hidden', 'true');
      } else {
        $('#no_ktp').prop('hidden', false);
      }
    });
});
</script>
<div class="container mt-5">
    <div class="row">
        <div class="col">
          
        <i class="fas fa-users fa-3x blue2_color"></i> <span style="font-size:24px;"><label for="">Tambah Customer</label></span>
        <div class="panel panel-default">
    <div class="panel-heading"></div>
    <div class="panel-body">
    
       <form action="<?= base_url('/customer/save'); ?>" method="POST">
       	<div class="control-group after-add-more">
           <?php if(session()->getFlashdata('pesan')): ?>
  <div class="alert alert-danger" role="alert">
  <?= session()->getFlashdata('pesan'); ?>
</div>
  <?php endif; ?>

	         <div class="">
                 <label>Nama Customer **</label>
      <input type="text" autocomplete="off" class="form-control <?= ($validation->hasError('nama_customer[]'))?'is-invalid':''; ?>" id="nama_customer[]" name="nama_customer[]" value="<?= old('nama_customer[]'); ?>">
    <div id="validationServer03Feedback" class="invalid-feedback">
     <?= $validation->getError('nama_customer'); ?>
    </div>
    </div>

            <label>Alamat</label>
            <input type="text" autocomplete="off" name="alamat[]" class="form-control">
            <label>Kontak</label>
              <input type="text" autocomplete="off" name="kontak[]" class="form-control" id="">

              <label>Email</label>
              <input type="text" autocomplete="off" name="email[]" class="form-control" id="">

              <div id="no_ktp" hidden>
  <label></label>
  <input type="text" autocomplete="off" name="no_ktp" id="no" value=""/>
  <label>Nama Aktivitas</label>
            <input type="text" autocomplete="off" name="nama_aktivita[]" class="form-control">
            <label>Deskripsi Aktivitas</label>
            <input type="text" autocomplete="off" name="deskrips[]" class="form-control">
 </div> 
              <br>
	        <div class="input-group-btn"> 
	            <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
	          </div>
	      </div>
	        <div class="control-group text"autocomplete="off">
	            <br>
	            <button class="btn btn-success" type="submit" name="submit">Submit</button>
	        </div>
 		</form>
 
        <!-- Copy Fields -->
        <div class="copy hide">
        	 <div class="control-group">
             <div class="">
             <label>Nama Customer</label>
      <input type="text" autocomplete="off" class="form-control <?= ($validation->hasError('nama_customer[]'))?'is-invalid':''; ?>" id="nama_customer[]" name="nama_customer[]" value="<?= old('nama_customer[]'); ?>">
    <div id="validationServer03Feedback" class="invalid-feedback">
     <?= $validation->getError('nama_customer[]'); ?>
    </div>
    </div>

            <label>Alamat</label>
            <input type="text" autocomplete="off" name="alamat[]" class="form-control">
            <label>Kontak</label>
              <input type="text" autocomplete="off" name="kontak[]" class="form-control" id="">

              <label>Email</label>
              <input type="text" autocomplete="off" name="email[]" class="form-control" id="">
             
              <div id="no_kt" hidden>
  <label>Input No Ktp</label>
  <input type="text" autocomplete="off" name="no_ktp" id="no" value=""/>
  <label>Nama Aktivitas</label>
            <input type="text" autocomplete="off" name="nama_aktivita[]" class="form-control">
            <label>Deskripsi Aktivitas</label>
            <input type="text" autocomplete="off" name="deskrips[]" class="form-control">
 </div> 
              <br>
               <div class="input-group-btn"> 
              <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Hapus</button>
            </div>
        </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>
<script type='text/javascript'>
$(window).load(function(){
$("#kt").change(function() {
      console.log($("#kt option:selected").val());
      if ($("#kt option:selected").val() == '2') {
        $('#no_kt').prop('hidden', false);
      } else {
        $('#no_kt').prop('hidden', 'true');
      }
    });
});
</script>
        


        </div>
    </div>
</div>

<?= $this->endSection(); ?>