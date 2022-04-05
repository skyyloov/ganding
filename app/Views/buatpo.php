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
  
        <div class="card">
<div class="card-header">
<i class="fas fa-folder fa-2x blue2_color"></i> <span style="font-size:20px;"><label for="">Input Purchase Order Customer</label></span>
</div>
       <div class="card-body"> 
           <form method="post" action="<?= base_url('/customer/savecust'); ?>" class="mt-5">
               <div class="form-row">

               <div class="form-group col-md-5">
                        <label for="nama_customer">Nama Customer **</label>
                        <select class="form-control" name="nama_customer" id="cust" required>
                        <option value="">-Pilih Customer</option>
                        <?php
                     $koneksi = mysqli_connect('localhost','root','','ganding');
                        $query =  mysqli_query($koneksi, "select * from customer");
                        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                        foreach ($hasil as $item){ ?>
                            <option value="<?php echo $item["id"];?>"><?php echo $item['nama_customer'];?></option> 
                           <?php  } ?>
                    </select>
                    </div>

                   <div class="form-group col-md-6 part">
                       <label for="nama_part">Nama Part **</label>
                       <select class="form-control" name="nama_material" required>
                        <option value="" disabled="disabled">-Pilih Customer Dahulu</option>
                    </select>
                    </div>

                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="nomor_po">Nomor Purchase Order **</label>
                        <input type="text" autocomplete="off" class="form-control" name="nomor_po" id="nomor_po" placeholder="" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="qty_pcs">Quantity Order **</label>
                        <input type="text" autocomplete="off" class="form-control" id="qtypcs" name="qty_pcs" placeholder="" required>
                        <span id="pesan"></span>
                    </div>
                    <div class="form-group col-md-3">
                       <label for="tgl_po">Tanggal PO **</label>
                       <input type="date" class="form-control" id="tgl_po" name="tgl_po" placeholder="" required>
                    </div>
                    <div class="form-group col-md-3">
                       <label for="tgl_terima">Tanggal Terima PO **</label>
                       <input type="date" class="form-control" id="tgl_terima" name="tgl_terima" placeholder="" required>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-xs btn-success">Submit</button>
</form>

        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $('#cust').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    //Added with the EDIT
    var data = $option.val();//to get content of "value" attrib
    console.log(data)
    $('.part').load('<?= base_url('/part.php?id='); ?>' + data);  
});
});
</script>  

<script type="text/javascript">
$(document).ready(function(){

    
    $("#qtypcs").keypress(function(data){
      if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57))
      {
        $("#pesan").html("isikan angka").show().fadeOut("slow");
        return false;
      }
    });
   
});
</script> 

<?= $this->endSection(); ?>