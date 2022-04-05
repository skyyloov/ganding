
<div class="modal-dialog modal-fullscreen-sm-down">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" >Form Tambah Part Assy Welding</h4>
        </div>
        <div class="modal-body">

        <div class="panel panel-default">
    <div class="panel-heading"></div>
    <div class="panel-body">
    
       <form action="http://localhost/gands/public/production/saveassy" method="POST">
       	<div class="control-group after-add-more">

	         <div class="">
                 <label>Nama Part Assy Weld</label>
      <input type="text" class="form-control" id="namafg" name="namafg" value="" required>
    </div>

    <label for="customerwelding">Pilih customer</label>
                        <select class="form-control" name="customer" id="customerwelding" required>
                            <option value="">-Pilih</option>
                            <?php
                      $koneksi = mysqli_connect('localhost','root','','ganding');
                      $query =  mysqli_query($koneksi, "select * from customer ");
                      $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                      foreach ($hasil as $item){ ?>
                            <option value="<?php echo $item["id"];?>"><?php echo $item['nama_customer'];?></option> 
                            <?php  } ?>
                        </select>

                        <div class="weldings">
    <label for="part[]">Pilih Part</label>
                        <select class="form-control" name="part[]" id="welding" required>
                            <option value="">-Pilih</option>
                            <?php
                      $koneksi = mysqli_connect('localhost','root','','ganding');
                      $query =  mysqli_query($koneksi, "select * from part where id = 0 ");
                      $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                      foreach ($hasil as $item){ ?>
                            <option value="<?php echo $item["id"];?>"><?php echo $item['nama_part'];?></option> 
                            <?php  } ?>
                            <option disabled="disabled">Pilih Customer Dahulu</option>
                        </select>
                        </div>

                        <label>Quantity Part yang Dibutuhkan untuk Satu Assy Weld</label>
      <input type="text" class="form-control qtyy" placeholder="Masukkan Angka!" id="qty" name="qty[]" autocomplete="off" value="" required>
      <span id="pesann"></span>
<br>
	        <div class="input-group-btn"> 
	            <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
	          </div>
	      </div>
	        <div class="control-group text-center">
	            <br>
	            <button class="btn btn-success" type="submit" name="submit">Submit</button>
	        </div>
 		</form>
 
        <!-- Copy Fields -->
        <div class="copy hide">
        	 <div class="control-group">
             <div class="">

                        <div class="weldings">
             <label for="part[]">Pilih Part</label>
                        <select class="form-control" name="part[]" id="welding" required>
                            <option value="">-Pilih</option>
                            <?php
                      $koneksi = mysqli_connect('localhost','root','','ganding');
                      $query =  mysqli_query($koneksi, "select * from part where id = 0 ");
                      $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                      foreach ($hasil as $item){ ?>
                            <option value="<?php echo $item["id"];?>"><?php echo $item['nama_part'];?></option> 
                            <?php  } ?>
                             <option disabled="disabled">Pilih Customer Dahulu</option>
                        </select>
                        </div>

                        <label>Quantity Part yang Dibutuhkan untuk Satu Assy Weld</label>
      <input type="text" class="form-control qtyy" autocomplete="off" placeholder="Masukkan Angka!" id="qtyy" name="qty[]" value="" required>
      <span id="pesansz" class="pesansz"></span>
      <br>
               <div class="input-group-btn"> 
              <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Hapus</button>
            </div>
        </div>
    </div>
  </div>
</div>


        <div class="modal-footer">
           
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);

          $(".qtyy").keypress(function(data){
      if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57))
      {
        $(".pesansz").html("isikan angka").show().fadeOut("slow");
        return false;
      }
    });

      });
      
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
      
           
    $(".qtyy").keypress(function(data){
      if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57))
      {
        $("#pesansz").html("isikan angka").show().fadeOut("slow");
        return false;
      }
    });
      
    });
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('#customerwelding').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    //Added with the EDIT
    var data = $option.val();//to get content of "value" attrib
    console.log(data)
    $('.weldings').load('http://localhost/gands/public/partwelding.php?id=' + data);  
});
});
</script>
