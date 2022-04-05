<?php if(isset($_GET["idproses1"])){ ?>
<?php $id = $_GET["idproses1"]; ?>
<?php   $koneksi =mysqli_connect('localhost','root','','ganding');
                        $query =  mysqli_query($koneksi, "select * from part where id = $id ");
                        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC); ?>
                        <?php $hitung = mysqli_num_rows($query); ?>

<div class="modal-dialog modal-fullscreen-sm-down">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" >Input Data Proses1 Part <?= $hasil[0]['nama_part']; ?></h4>
        </div>
        <div class="modal-body">
        <form method="POST" action="http://localhost/gands/public/production/input1" enctype="multipart/form-data" class="">
               <div class="form-row">

               <div class="form-group col">
                        <label for="qty">Input Quantity Aktual</label>
                        <input type="text" required autocomplete="off" class="form-control qty" id="qty" name="qty" placeholder="Masukkan Angka">
                        <span id="pesan"></span>
                    </div>

                    <input type="hidden" class="form-control" id="qt" name="idpart" autocomplete="off" value="<?= $hasil[0]['id']; ?>" placeholder="">
                </div>

                <div class="form-row">
                    <div class="form-group col">
                    <div class="form-check">
  <input class="form-check-input checkbox" id="checkbox" type="checkbox" name="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
   Apakah Ada Barang Not Good?
  </label>
</div>
                    </div>
                </div>

                <div class="form-row notgood">

                </div>


                <button type="submit" name="submit" id="tombol"  class="btn btn-xs btn-success mt-1">Submit</button>
</form>
        </div>
        <div class="modal-footer">
           
        </div>
    </div>
</div>


<?php }elseif(isset($_GET["idproses2"])){ ?>
    <?php $id = $_GET["idproses2"]; ?>
<?php   $koneksi = mysqli_connect('localhost','root','','ganding');
                        $query =  mysqli_query($koneksi, "select * from part where id = $id ");
                        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC); ?>
                        <?php $hitung = mysqli_num_rows($query); ?>

<div class="modal-dialog modal-fullscreen-sm-down">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" >Input Data Proses2 Part <?= $hasil[0]['nama_part']; ?></h4>
        </div>
        <div class="modal-body">
        <form method="post" action="http://localhost/gands/public/production/input2" class="">
               <div class="form-row">

               <div class="form-group col">
                        <label for="qty">Input Quantity Aktual</label>
                        <input type="text" required autocomplete="off" class="form-control qty" id="qty" name="qty" placeholder="Masukkan Angka">
                        <span id="pesan"></span>
                    </div>

                    <input type="hidden" class="form-control" id="qt" name="idpart" autocomplete="off" value="<?= $hasil[0]['id']; ?>" placeholder="Masukkan Angka">
                </div>

                <div class="form-row">
                    <div class="form-group col">
                    <div class="form-check">
  <input class="form-check-input checkbox" id="checkbox" type="checkbox" name="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
   Apakah Ada Barang Not Good?
  </label>
</div>
                    </div>
                </div>

                <div class="form-row notgood">

                </div>

                <button type="submit" name="submit" id="tombol"  class="btn btn-xs btn-success mt-1">Submit</button>
</form>
        </div>
        <div class="modal-footer">
           
        </div>
    </div>
</div>

 <?php }elseif(isset($_GET["idproses3"])){ ?>
    <?php $id = $_GET["idproses3"]; ?>
<?php   $koneksi = mysqli_connect('localhost','root','','ganding');
                        $query =  mysqli_query($koneksi, "select * from part where id = $id ");
                        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC); ?>
                        <?php $hitung = mysqli_num_rows($query); ?>

<div class="modal-dialog modal-fullscreen-sm-down">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" >Input Data Proses3 Part <?= $hasil[0]['nama_part']; ?></h4>
        </div>
        <div class="modal-body">
        <form method="post" action="http://localhost/gands/public/production/input3" class="">
               <div class="form-row">

               <div class="form-group col">
                        <label for="qty">Input Quantity Aktual</label>
                        <input type="text" required autocomplete="off" class="form-control qty" id="qty" name="qty" placeholder="Masukkan Angka">
                        <span id="pesan"></span>
                    </div>

                    <input type="hidden" class="form-control" id="qt" name="idpart" autocomplete="off" value="<?= $hasil[0]['id']; ?>" placeholder="Masukkan Angka">
                </div>

                <div class="form-row">
                    <div class="form-group col">
                    <div class="form-check">
  <input class="form-check-input checkbox" id="checkbox" type="checkbox" name="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
   Apakah Ada Barang Not Good?
  </label>
</div>
                    </div>
                </div>

                <div class="form-row notgood">

                </div>


                <button type="submit" name="submit" id="tombol"  class="btn btn-xs btn-success mt-1">Submit</button>
</form>
        </div>
        <div class="modal-footer">
           
        </div>
    </div>
</div>
 <?php }elseif(isset($_GET["idproses4"])){ ?> 
    <?php $id = $_GET["idproses4"]; ?>
<?php   $koneksi = mysqli_connect('localhost','root','','ganding');
                        $query =  mysqli_query($koneksi, "select * from part where id = $id ");
                        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC); ?>
                        <?php $hitung = mysqli_num_rows($query); ?>

<div class="modal-dialog modal-fullscreen-sm-down">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" >Input Data Proses4 Part <?= $hasil[0]['nama_part']; ?></h4>
        </div>
        <div class="modal-body">
        <form method="post" action="http://localhost/gands/public/production/input4" class="">
               <div class="form-row">

               <div class="form-group col">
                        <label for="qty">Input Quantity Aktual</label>
                        <input type="text" required autocomplete="off" class="form-control qty" id="qty" name="qty" placeholder="Masukkan Angka">
                        <span id="pesan"></span>
                    </div>

                    <input type="hidden" class="form-control" id="qt" name="idpart" autocomplete="off" value="<?= $hasil[0]['id']; ?>" placeholder="Masukkan Angka">
                </div>

                <div class="form-row">
                    <div class="form-group col">
                    <div class="form-check">
  <input class="form-check-input checkbox" id="checkbox" type="checkbox" name="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
   Apakah Ada Barang Not Good?
  </label>
</div>
                    </div>
                </div>

                <div class="form-row notgood">

                </div>


                <button type="submit" name="submit" id="tombol"  class="btn btn-xs btn-success mt-1">Submit</button>
</form>
        </div>
        <div class="modal-footer">
           
        </div>
    </div>
</div>
  <?php }elseif(isset($_GET["idproses5"])){ ?>
    <?php $id = $_GET["idproses5"]; ?>
<?php   $koneksi = mysqli_connect('localhost','root','','ganding');
                        $query =  mysqli_query($koneksi, "select * from part where id = $id ");
                        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC); ?>
                        <?php $hitung = mysqli_num_rows($query); ?>

<div class="modal-dialog modal-fullscreen-sm-down">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" >Input Data Proses5 Part <?= $hasil[0]['nama_part']; ?></h4>
        </div>
        <div class="modal-body">
        <form method="post" action="http://localhost/gands/public/production/input5" class="">
               <div class="form-row">

               <div class="form-group col">
                        <label for="qty">Input Quantity Aktual</label>
                        <input type="text" required autocomplete="off" class="form-control qty" id="qty" name="qty" placeholder="Masukkan Angka">
                        <span id="pesan"></span>
                    </div>

                    <input type="hidden" class="form-control" id="qt" name="idpart" autocomplete="off" value="<?= $hasil[0]['id']; ?>" placeholder="Masukkan Angka">
                </div>

                <div class="form-row">
                    <div class="form-group col">
                    <div class="form-check">
  <input class="form-check-input checkbox" id="checkbox" type="checkbox" name="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
   Apakah Ada Barang Not Good?
  </label>
</div>
                    </div>
                </div>

                <div class="form-row notgood">

                </div>


                <button type="submit" name="submit" id="tombol"  class="btn btn-xs btn-success mt-1">Submit</button>
</form>
        </div>
        <div class="modal-footer">
           
        </div>
    </div>
</div>
<?php }elseif(isset($_GET["idproses6"])){ ?>
    <?php $id = $_GET["idproses6"]; ?>
<?php   $koneksi = mysqli_connect('localhost','root','','ganding');
                        $query =  mysqli_query($koneksi, "select * from part where id = $id ");
                        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC); ?>
                        <?php $hitung = mysqli_num_rows($query); ?>

<div class="modal-dialog modal-fullscreen-sm-down">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" >Input Data Proses6 Part <?= $hasil[0]['nama_part']; ?></h4>
        </div>
        <div class="modal-body">
        <form method="post" action="http://localhost/gands/public/production/input6" class="">
               <div class="form-row">

               <div class="form-group col">
                        <label for="qty">Input Quantity Aktual</label>
                        <input type="text" required autocomplete="off" class="form-control" id="qty" name="qty" placeholder="Masukkan Angka">
                        <span id="pesan"></span>
                    </div>

                    <input type="hidden" class="form-control qty" id="qt" name="idpart" autocomplete="off" value="<?= $hasil[0]['id']; ?>" placeholder="Masukkan Angka">
                </div>

                <div class="form-row">
                    <div class="form-group col">
                    <div class="form-check">
  <input class="form-check-input checkbox" id="checkbox" type="checkbox" name="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
   Apakah Ada Barang Not Good?
  </label>
</div>
                    </div>
                </div>

                <div class="form-row notgood">

                </div>


                <button type="submit" name="submit" id="tombol"  class="btn btn-xs btn-success mt-1">Submit</button>
</form>
        </div>
        <div class="modal-footer">
           
        </div>
    </div>
</div>
  <?php }elseif(isset($_GET["idproses7"])){ ?>
    <?php $id = $_GET["idproses7"]; ?>
<?php   $koneksi = mysqli_connect('localhost','root','','ganding');
                        $query =  mysqli_query($koneksi, "select * from part where id = $id ");
                        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC); ?>
                        <?php $hitung = mysqli_num_rows($query); ?>

<div class="modal-dialog modal-fullscreen-sm-down">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" >Input Data Proses7 Part <?= $hasil[0]['nama_part']; ?></h4>
        </div>
        <div class="modal-body">
        <form method="post" action="http://localhost/gands/public/production/input7" class="">
               <div class="form-row">

               <div class="form-group col">
                        <label for="qty">Input Quantity Aktual</label>
                        <input type="text" required autocomplete="off" class="form-control qty" id="qty" name="qty" placeholder="Masukkan Angka">
                        <span id="pesan"></span>
                    </div>

                    <input type="hidden" class="form-control" id="qt" name="idpart" autocomplete="off" value="<?= $hasil[0]['id']; ?>" placeholder="Masukkan Angka">
                </div>

                <div class="form-row">
                    <div class="form-group col">
                    <div class="form-check">
  <input class="form-check-input checkbox" id="checkbox" type="checkbox" name="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
   Apakah Ada Barang Not Good?
  </label>
</div>
                    </div>
                </div>

                <div class="form-row notgood">

                </div>


                <button type="submit" name="submit" id="tombol"  class="btn btn-xs btn-success mt-1">Submit</button>
</form>
        </div>
        <div class="modal-footer">
           
        </div>
    </div>
</div>
  <?php }elseif (isset($_GET["idprosesspot"])) {?>
    <?php $id = $_GET["idprosesspot"]; ?>
<?php   $koneksi = mysqli_connect('localhost','root','','ganding');
                        $query =  mysqli_query($koneksi, "select * from part where id = $id ");
                        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC); ?>
                        <?php $hitung = mysqli_num_rows($query); ?>

<div class="modal-dialog modal-fullscreen-sm-down">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" >Input Data Proses SPOT Part <?= $hasil[0]['nama_part']; ?></h4>
        </div>
        <div class="modal-body">
        <form method="post" action="http://localhost/gands/public/production/inputspot" class="">
               <div class="form-row">

               <div class="form-group col-md-4">
                        <label for="qty">Input Quantity Aktual</label>
                        <input type="text" autocomplete="off" class="form-control qty" id="qty" name="qty" required placeholder="Masukkan Angka">
                        <span id="pesan"></span>
                    </div>

                    <input type="hidden" class="form-control" id="qt" name="idpart" autocomplete="off" value="<?= $hasil[0]['id']; ?>" placeholder="Masukkan Angka">

                    <div class="form-group col-md-5">
                        <label for="idwh">Pilih Material Spot</label>
                        <select class="form-control" name="idwh" id="welding" required>
                            <option value="">-Pilih</option>
                            <?php
                      $queryspot =  mysqli_query($koneksi, "select * from warehouse where unit = 'pcs' ");
                      $hasilspot = mysqli_fetch_all($queryspot, MYSQLI_ASSOC);
                      $hitungspot = mysqli_num_rows($queryspot);
                      if($hitungspot > 0){
                      foreach ($hasilspot as $item){ ?>
                            <option value="<?php echo $item["id"];?>"><?php echo $item['nama_material'].' |'.'  '.$item['nama_customer'];?></option> 
                            <?php  } }else{ ?>
                            
                            <option value="" disabled="disabled" ><?php echo "Tidak Ada Material";?></option>
                            <?php } ?>
                        </select>
                    </div>     
                </div>
                    
                <div class="form-row">
                    <div class="form-group col">
                    <div class="form-check">
  <input class="form-check-input checkbox" id="checkbox" type="checkbox" name="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
   Apakah Ada Barang Not Good?
  </label>
</div>
                    </div>
                </div>

                <div class="form-row notgood">

                </div>

                <button type="submit" name="submit" id="tombol"  class="btn btn-xs btn-success mt-1">Submit</button>
</form>
        </div>
        <div class="modal-footer">
           
        </div>
    </div>
</div>
    <?php }elseif(isset($_GET['idprosesspot2'])){ ?>
    <?php $id = $_GET["idprosesspot2"]; ?>
<?php   $koneksi = mysqli_connect('localhost','root','','ganding');
                        $query =  mysqli_query($koneksi, "select * from part where id = $id ");
                        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC); ?>
                        <?php $hitung = mysqli_num_rows($query); ?>

<div class="modal-dialog modal-fullscreen-sm-down">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" >Input Data Proses SPOT 2 Part <?= $hasil[0]['nama_part']; ?></h4>
        </div>
        <div class="modal-body">
        <form method="post" action="http://localhost/gands/public/production/inputspot2" class="">
               <div class="form-row">

               <div class="form-group col-md-4">
                        <label for="qty">Input Quantity Aktual</label>
                        <input type="text" autocomplete="off" class="form-control qty" id="qty" name="qty" required placeholder="Masukkan Angka">
                        <span id="pesan"></span>
                    </div>

                    <input type="hidden" class="form-control" id="qt" name="idpart" autocomplete="off" value="<?= $hasil[0]['id']; ?>" placeholder="Masukkan Angka">

                    <div class="form-group col-md-5">
                        <label for="idwh">Pilih Material Spot2</label>
                        <select class="form-control" name="idwh" id="welding" required>
                            <option value="">-Pilih</option>
                            <?php
                      $queryspot =  mysqli_query($koneksi, "select * from warehouse where unit = 'pcs' ");
                      $hasilspot = mysqli_fetch_all($queryspot, MYSQLI_ASSOC);
                      $hitungspot = mysqli_num_rows($queryspot);
                      if($hitungspot > 0){
                      foreach ($hasilspot as $item){ ?>
                            <option value="<?php echo $item["id"];?>"><?php echo $item['nama_material'].' |'.'  '.$item['nama_customer'];?></option> 
                            <?php  } }else{ ?>
                            
                            <option value="" disabled="disabled" ><?php echo "Tidak Ada Material";?></option>
                            <?php } ?>
                        </select>
                    </div>     
                </div>
                    
                <div class="form-row">
                    <div class="form-group col">
                    <div class="form-check">
  <input class="form-check-input checkbox" id="checkbox" type="checkbox" name="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
   Apakah Ada Barang Not Good?
  </label>
</div>
                    </div>
                </div>

                <div class="form-row notgood">

                </div>

                <button type="submit" name="submit" id="tombol"  class="btn btn-xs btn-success mt-1">Submit</button>
</form>
        </div>
        <div class="modal-footer">
           
        </div>
    </div>
</div>
    
    <?php } ?>


<script type="text/javascript">
$(document).ready(function(){

    
    $(".qty").keydown(function(data){
      if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57))
      {
        $("#pesan").html("isikan angka").show().fadeOut("slow");
        return false;
      }
    });

});
</script> 

<script>
            $(document).ready(function() {
                $(".checkbox").change(function() {
                    var data = 1;
                     if(this.checked) {
                        $('.notgood').load('http://localhost/gands/public/cekbox.php?idcek=' + data);
                    } else {
                        $('.notgood').load('http://localhost/gands/public/cekbox.php?idcek2=' + data);
                    }
                });
            });
        </script>