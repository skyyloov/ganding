<?php $id = $_GET["id"]; ?>
<?php   $koneksi =mysqli_connect('localhost','root','','ganding');
                        $query =  mysqli_query($koneksi, "select * from part where id = $id ");
                        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC); ?>
                        <?php $hitung = mysqli_num_rows($query); ?>

<div class="modal-dialog modal-fullscreen-sm-down">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" >Input Data Kedatangan Subcont <?= $hasil[0]['nama_part']; ?></h4>
        </div>
        <div class="modal-body">
        <form method="POST" action="http://localhost:8080/gands/public/warehousefg/kedatangan" enctype="multipart/form-data" class="">
               <div class="form-row">

               <div class="form-group col">
                        <label for="qty">Input Quantity Kedatangan</label>
                        <input type="text" required autocomplete="off" class="form-control qty" id="qty" name="qty" placeholder="Masukkan Angka">
                        <span id="pesan"></span>
                    </div>

            <div class="form-group col">
                        <label for="surjal">Surat Jalan</label>
                        <input type="text" required autocomplete="off" class="form-control" id="surjal" name="surjal" placeholder="Masukkan Nomor Surat Jalan">
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
                        $('.notgood').load('http://localhost:8080/gands/public/cekbox.php?idcek=' + data);
                    } else {
                        $('.notgood').load('http://localhost:8080/gands/public/cekbox.php?idcek2=' + data);
                    }
                });
            });
        </script>