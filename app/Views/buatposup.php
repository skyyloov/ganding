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
<i class="fas fa-folder fa-2x green_color"></i> <span style="font-size:20px;"><label for="">Input Purchase Order Supplier</label></span>
    
</div>
       <div class="card-body"> 
           <form method="post" action="<?= base_url('/purchasing/saveposup'); ?>" class="mt-5">
               <div class="form-row">

               <div class="form-group col-md-5">
                        <label for="nama_customer">Nama Customer</label>
                        <select class="form-control" name="nama_customer" id="cust" required>
                        <option value="">-Pilih Customer</option>
                        <?php
                      $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
                        $query =  mysqli_query($koneksi, "select * from customer");
                        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                        foreach ($hasil as $item){ ?>
                            <option value="<?php echo $item["id"];?>"><?php echo $item['nama_customer'];?></option> 
                           <?php  } ?>
                    </select>
                    </div>

                   <div class="form-group col-md-6">
                       <label for="nama_part">Nama Supplier</label>
                       <select class="form-control" name="nama_supplier" required>
                        <option value="">-Pilih Supplier</option>
                        <?php
                     $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
                        $query =  mysqli_query($koneksi, "select * from supplier");
                        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                        foreach ($hasil as $item){ ?>
                            <option value="<?php echo $item["id"];?>"><?php echo $item['nama_supplier'];?></option> 
                           <?php  } ?>
                    </select>
                    </div>

                </div>
                
                <div class="form-row">
                            <div class="form-group col-md-5 part">
                        <label for="nama_customer">Nama Part</label>
                        <select class="form-control" name="nama_customer" id="part" required>
                        <option value="" disabled="disabled">-Pilih Customer Dahulu</option>
                    </select>
                    </div>
                   
                    <div class="form-group col-md-2">
                        <label for="tgl_po">Tanggal PO</label>
                        <input type="date" name="tgl_po" id="" class="form-control">        
                    </div>
                    <div class="form-group col-md-2 unit">
                        <label for="unit_material">Unit Material</label>
                        <select class="form-control" name="unit_material">
                        <option value="">-Pilih</option>
                        <option value="lembar">Lembar</option>
                        <option value="sheet">Sheet</option>
                        <option value="pcs">Piece</option>
                        <option value="coil">Coil</option>
                    </select>
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="nomor_po_supplier">Nomor Purchase Order</label>
                        <input type="text" autocomplete="off" class="form-control" name="nomor_po_supplier" value="<?= old('nomor_po_supplier'); ?>" id="nomor_po_supplier" placeholder="" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="qty_po">Quantity Order</label>
                        <input type="text" autocomplete="off" class="form-control" id="qtypcssup" name="qty_po" placeholder="" value="<?= old('qty_po'); ?>" required>
                        <span id="pesann"></span>
                    </div>
                    <div class="form-group col-md-2">
                       <label for="tgl_dtg1">Rencana Pertama</label>
                       <input type="date" class="form-control" id="tgl_dtg1" name="tgl_dtg1" placeholder="" value="<?= old('tgl_dtg1'); ?>" required>
                    </div>
                    <div class="form-group col-md-2">
                       <label for="tgl_dtg2">Rencana Kedua</label>
                       <input type="date" value="<?= old('tgl_dtg2'); ?>" class="form-control" id="tgl_dtg2" name="tgl_dtg2" placeholder="">
                    </div>
                </div>

                <div class="form-row">

                <div class="form-group col-md-2" id="qty1" hidden >
                        <label for="qty_dtg1">Quantity Rencana Kedatangan Pertama</label>
                        <input type="text" autocomplete="off" class="form-control" value="<?= old('qty_dtg1'); ?>" name="qty_dtg1" id="qty_dtg1" placeholder="">
                        <span id="pesan"></span>
                    </div>
                    <div class="form-group col-md-2" id="qty2" hidden >
                        <label for="qty_dtg2">Quantity Rencana Kedatangan Kedua</label>
                        <input type="text" autocomplete="off" class="form-control" id="qty_dtg2" value="<?= old('qty_dtg2'); ?>" name="qty_dtg2" placeholder="">
                        <span id="pesannn"></span>
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

    if ($('#tgl_dtg1').val() == '') {
        $('#qty1').prop('hidden',true);
        $('#qty1').val('');
    }else{
        $('#qty1').prop('hidden',false);
    }

    $('#tgl_dtg1').change(function() {
      
    if ($('#tgl_dtg1').val() == '') {
        $('#qty1').prop('hidden',true);
    }else{
        $('#qty1').prop('hidden',false);
    }
});
});
</script> 


<script type="text/javascript">
$(document).ready(function(){

    if ($('#tgl_dtg2').val() == '') {
            $('#qty2').prop('hidden',true);
        }else{
            $('#qty2').prop('hidden',false); 
        }

    $('#tgl_dtg2').change(function() {
    
        if ($('#tgl_dtg2').val() == '') {
            $('#qty2').prop('hidden',true); 
        }else{
            $('#qty2').prop('hidden',false); 
        }
});
});
</script> 


<script type="text/javascript">
$(document).ready(function(){

    
    $("#qtypcssup").keypress(function(data){
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

    
    $("#qty_dtg1").keypress(function(data){
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

    
    $("#qty_dtg2").keypress(function(data){
      if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57))
      {
        $("#pesannn").html("isikan angka").show().fadeOut("slow");
        return false;
      }
    });
   
});
</script> 

<?= $this->endSection(); ?>