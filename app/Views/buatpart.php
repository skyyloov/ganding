<?= $this->extend('layout/tampil'); ?>
<?= $this->Section('contet'); ?>
<?php $koneksi = mysqli_connect('localhost','root','','ganding');
                        $query =  mysqli_query($koneksi, "select * from customer where id = $id_customer ");
                        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC); ?>
                        <?php foreach($hasil as $a):
                            $customer = $a['nama_customer'];
                        endforeach;
                            ?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            
  <?php if(session()->getFlashdata('pesangagal')): ?>
  <div class="alert alert-danger" role="alert">
  <?= session()->getFlashdata('pesangagal'); ?>
</div>
  <?php endif; ?>
  
       <div class="card">
<div class="card-header">
<i class="fas fa-file-import fa-2x blue2_color"></i> <span style="font-size:20px;"><label for="">Tambah Part Customer <?= $customer; ?></label></span>
    <!-- <h3>Tambah Part Customer <?= $customer; ?></h3> -->
</div>
       <div class="card-body"> 
           <form method="post" action="<?= base_url('/part/savepart'); ?>" class="mt-5" enctype="multipart/form-data" >
               <div class="form-row">
                   <div class="form-group col-md-6">
                       <input type="hidden" name="id_customer" value="<?= $id_customer; ?>">
                       <input type="hidden" name="nama_customer" value="<?= $customer; ?>" >
                       <label for="nama_part">Nama Part **</label>
                       <input type="text" autocomplete="off" class="form-control" name="nama_part" id="nama_part" placeholder="Tulis Dengan Huruf Kapital" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="kode_part">Kode Part **</label>
                        <input type="text" autocomplete="off" class="form-control" name="kode_part" id="kode_part" placeholder="Kode Part" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="unit">Unit Material **</label>
                        <select class="form-control" id="unit" name="unit" required>
            <option value="">- Pilih Material</option>
                        
                            <option value="lembar">Lembar</option> 
                            <option value="sheet">Sheet</option> 
                            <option value="coil">Coil</option> 
                            <option value="pcs">Pieces</option> 
                            <option value="tube">Tube</option>
              </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="spec">Spek Material</label>
                        <input type="text" autocomplete="off" class="form-control" name="spec" id="spec" placeholder="Contoh: SPHC-PO" >
                    </div>
                    <div class="form-group col-md-3">
                        <label for="tebal">Ketebalan</label>
                        <input type="text" autocomplete="off" onkeypress="return isNumberKey(event)" class="form-control inputan" id="tebal" name="tebal" placeholder="Contoh : 2.3" >
                    </div>
                </div>

                <div class="form-row">
                   <div class="form-group col-md-3">
                       <label for="berat_jenis">Berat Jenis</label>
                       <input type="text" autocomplete="off" onkeypress="return isNumberKey(event)" class="form-control inputan" id="berat_jenis" name="berat_jenis" placeholder="Contoh : 7.85">
                    </div>
                    <div class="form-group col-md-3">
                       <label for="panjang">Panjang</label>
                       <input type="text" autocomplete="off" onkeypress="return isNumberKey(event)" class="form-control inputan" id="panjang" name="panjang" placeholder="Contoh : 1219">
                    </div>
                    <div class="form-group col-md-3">
                       <label for="pcs_sheet">Piece / Sheet</label>
                       <input type="text" autocomplete="off" onkeypress="return isNumberKey(event)" class="form-control inputan" id="pcs_sheet" name="pcs_sheet" placeholder="Contoh : 10">
                    </div>
                    <div class="form-group col-md-3">
                       <label for="diameter">Diameter</label>
                       <input type="text" autocomplete="off" onkeypress="return isNumberKey(event)" class="form-control inputan" id="diameter" name="diameter" placeholder="Contoh : 38.0">
                    </div>
                </div>

                <div class="form-row">
                   
                    <div class="form-group col-md-3">
                        <label for="proses">Proses</label>
                        <select class="form-control" id="proses" name="proses" >
            <option value="">- Pilih -</option>
                        
                            <option value="1">1 Proses</option> 
                            <option value="2">2 Proses</option> 
                            <option value="3">3 Proses</option> 
                            <option value="4">4 Proses</option>
                            <option value="5">5 Proses</option> 
                            <option value="6">6 Proses</option> 
                            <option value="7">7 Proses</option>  
              </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="spot">Spot</label>
                        <select class="form-control" id="spot" name="spot">
            <option value="nonspot">- Pilih</option>
                        
                            <option value="spot">1 Spot</option>
                            <option value="2spot">2 Spot</option>
                            <option value="nonspot">Non Spot</option> 
              </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="lebar">Lebar</label>
                        <input type="text" autocomplete="off" onkeypress="return isNumberKey(event)" class="form-control inputan" name="lebar" id="lebar" placeholder="Contoh : 100">
                    </div>

                </div>

<div class="form-row process">

</div>

<div class="form-row sepot">
    
</div>

                <div class="form-row">
                    <div class=" form-group col-md-6">
                <label for="foto">Foto Part</label>
            <input type="file" class="form-control" id="foto" name="foto" >
                </div>
                </div>

                <button type="submit" style="float:center;" class="main_bt">Submit</button>
            </form>
        </div>
        </div>
        
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $('#spot').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    //Added with the EDIT
    var data = $option.val();//to get content of "value" attrib
    console.log(data)
    $('.sepot').load('<?= base_url('/sepot.php?id='); ?>' + data);  
});
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('#proses').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    //Added with the EDIT
    var data = $option.val();//to get content of "value" attrib
    console.log(data)
    $('.process').load('<?= base_url('/process.php?id='); ?>' + data);  
});
});
</script>

<script type="text/javascript">
    function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
  </script>

<?= $this->endSection(); ?>