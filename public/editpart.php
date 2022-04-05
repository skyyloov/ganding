
<?php $id = $_GET['id']; ?>

<?php $koneksi = mysqli_connect('localhost','root','','ganding');
                        $query =  mysqli_query($koneksi, "select * from part where id = $id ");
                        $part = mysqli_fetch_all($query, MYSQLI_ASSOC); ?>

<div class="modal-dialog modal-lg  md-effect-1 ">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" >Edit Detail Part</h4>
        </div>
        <div class="modal-body">
        <form method="POST" action="http://localhost/gands/public/part/saveeditpart" enctype="multipart/form-data" class="mt-5">
    <input type="hidden" name="material" value="<?= $part[0]['unit_material']; ?>" id="material">
        <input type="hidden" name="spoet" value="<?= $part[0]['spot']; ?>" id="spoet">
        <input type="hidden" name="process" value="<?= $part[0]['proses']; ?>" id="process">
        <input type="hidden" name="id_customer" value="<?= $part[0]['id_customer']; ?>">
            <input type="hidden" name="idpart" id="parts" value="<?= $part[0]['id']; ?>">
               <div class="form-row">
                   <div class="form-group col-md-3">
                       <label for="nama_customer">Nama Customer</label>
                   <input type="text" autocomplete="off" class="form-control" name="nama_customer" value="<?= $part[0]['nama_customer']; ?>" readonly>
                   </div>

                   <div class="form-group col-md-2">
                       <label for="nama_part">Nama Part</label>
                       <input type="text" autocomplete="off" class="form-control" name="nama_part" id="nama_part" value="<?= $part[0]['nama_part']; ?>">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="kode_part">Kode Part</label>
                        <input type="text" autocomplete="off" class="form-control" name="kode_part" id="kode_part" value="<?= $part[0]['kode_part']; ?>" >
                    </div>
                </div>
                
                <div class="form-row">
                <div class="form-group col-md-3">
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
                    <div class="form-group col-md-2">
                        <label for="spec">Spek Material</label>
                        <input type="text" autocomplete="off" class="form-control" name="spec"  value="<?= $part[0]['spec']; ?>" id="spec">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="tebal">Ketebalan</label>
                        <input type="text" autocomplete="off" class="form-control" id="tebal" name="tebal"  onkeypress="return isNumberKey(event)" value="<?= $part[0]['tebal']; ?>" >
                    </div>
                    <div class="form-group col-md-2">
                       <label for="berat_jenis">Berat Jenis</label>
                       <input type="text" autocomplete="off" class="form-control" id="berat_jenis" value="<?= $part[0]['berat_jenis']; ?>"  onkeypress="return isNumberKey(event)" name="berat_jenis">
                    </div>
                    <div class="form-group col-md-2">
                       <label for="diameter">Diameter</label>
                       <input type="text" autocomplete="off" class="form-control" id="diameter" value="<?= $part[0]['diameter']; ?>"  onkeypress="return isNumberKey(event)" name="diameter">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-2">
                       <label for="panjang">Panjang</label>
                       <input type="text" autocomplete="off" class="form-control" id="panjang"  onkeypress="return isNumberKey(event)" value="<?= $part[0]['panjang']; ?>" name="panjang">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="proses">Proses</label>
                        <input type="text" autocomplete="off" class="form-control" id="proses" value="<?= $part[0]['proses']; ?>" readonly name="proses">
                    </div>
                    <div class="form-group col-md-2">
                       <label for="pcs_sheet">Piece / Sheet</label>
                       <input type="text" autocomplete="off" class="form-control" id="pcs_sheet" value="<?= $part[0]['pcs_sheet']; ?>"  onkeypress="return isNumberKey(event)" name="pcs_sheet">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="spot">Spot</label>
                        <select class="form-control" id="spots" name="spot" >
            <option value="nonspot">- Pilih -</option>
                        
                            <option value="spot">SPOT</option> 
                            <option value="2spot">2 SPOT</option>
                            <option value="nonspot">Non SPOT</option>   
              </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="lebar">Lebar</label>
                        <input type="text" autocomplete="off" class="form-control" name="lebar"  onkeypress="return isNumberKey(event)" value="<?= $part[0]['lebar']; ?>" id="lebar">
                    </div>
                </div>
                <div class="form-row">
        <?php
        $proses = $part[0]['proses'];
              $nomor = 1;
              $num = 1;
              $nom = 1; 
              $hit = 1;  ?>



        <?php  for($i=0; $i<$proses; $i++){ ?>
            <?php $prs = 'proses'.$num++;
                  $plan = 'plan'.$nom++;   ?>

<?php $queryprs =  mysqli_query($koneksi, "select * from $prs where id_part = $id ");
                        $hasilprs = mysqli_fetch_all($queryprs, MYSQLI_ASSOC); ?>

    <div class="form-group col-md-2 tes">
            <label for="kode_part">Proses <?= $nomor++; ?></label>
            <input type="text" autocomplete="off" class="form-control" name="<?= 'proses'.$hit++; ?>" id="kode_part" value="<?= $hasilprs[0]['nama_proses']; ?>" >
                <?php $nilai = (int)$hasilprs[0][$plan]; ?>
        </div>
        <?php } ?> 

    

    </div>
    
<div class="form-row sepot">
                      
                    </div>
    <div class="form-row">
                    <div class=" form-group col-md-5">
                <label for="foto">Foto Part</label>
            <input type="file" class="form-control" id="foto" name="foto" >
                </div>
                </div>

    <button type="submit" onclick="return confirm('Yakin Ingin Mengubah Data?')" name="submit" id="buton"  class="btn btn-xs btn-danger buton" >Submit Edit</button>
</form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>


<script type="text/javascript">
$(document).ready(
    function(){
        var value = $('#spoet').val();
        $('option[value=' + value + ']')
            .attr('selected',true);
    });
</script>

<script type="text/javascript">
$(document).ready(
    function(){
        var valu = $('#material').val();
        $('option[value=' + valu + ']')
            .attr('selected',true);
    });
</script>

<script type="text/javascript">
$(document).ready(
    function(){
        var option = $('#spot').val();
    var idpart = $('#parts').val();
    $('.sepot').load('http://localhost/gands/public/sepot.php?idedit=' + option +'&idpart=' + idpart);  
    });
</script>

<script type="text/javascript">
$(document).ready(function(){
    var idpartsz = $('#parts').val();
    $('#spots').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    //Added with the EDIT
    var data = $option.val();//to get content of "value" attrib
    console.log(data)
    $('.sepot').load('http://localhost/gands/public/spotsz.php?idedit=' + data + '&idpart=' + idpartsz);  
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
