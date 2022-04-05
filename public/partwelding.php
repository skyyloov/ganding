<?php $id=$_GET["id"];?>

<label for="part[]">Pilih Part</label>
                        <select class="form-control weld" name="part[]" id="welding" required>
                            <option value="0">-Pilih</option>
                            <?php
                      $koneksi = mysqli_connect('localhost','root','','ganding');
                      $query =  mysqli_query($koneksi, "select * from part where id_customer = $id ");
                      $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                      foreach ($hasil as $item){ ?>
                      <?php $idparts = $item['id']; ?>
                      <?php $queryfgsz =  mysqli_query($koneksi, "select * from finishgood where id_part = $idparts ");
                      $hasilfgsz = mysqli_fetch_all($queryfgsz, MYSQLI_ASSOC);
                      $hitungfgsz = mysqli_num_rows($queryfgsz); ?>
                      <?php if($hitungfgsz > 0){ ?>
                            <option class="disabled" disabled value="<?php echo $item["id"];?>"><?php echo $item['nama_part'];?></option> 
                            <?php }else { ?>
                                <option class=""  value="<?php echo $item["id"];?>"><?php echo $item['nama_part'];?></option> 
                                <?php } ?>
                            <?php  } ?>
                        </select>


<script type="text/javascript">
$(document).ready(function(){
    $('.weld').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    //Added with the EDIT
    var data = $option.val();//to get content of "value" attrib
    console.log(data)
});

if('option[value='data']') {
     $('.weld').attr("disabled", "disabled");
    }

// }else{
//     .siblings().removeAttr("disabled");
//  }
// $('option[value='data']')
//   .attr("disabled", "disabled");
//   .siblings().removeAttr("disabled");

});
</script> 
