<?php $id=$_GET["id"];?>




 <label for="nama_part">Nama Part</label>
                       <select class="form-control" name="nama_part" id="part" required>
                        <option value="">-Pilih Part</option>
                        <?php
                      $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
                        $query =  mysqli_query($koneksi, "select * from part where id_customer = '$id' ");
                        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                        foreach ($hasil as $item){ ?>
                            <option value="<?php echo $item["id"];?>"><?php echo $item['nama_part']." "."|"." ".$item['kode_part'];?></option> 
                           <?php  } ?>
                    </select>

                    <script type="text/javascript">
$(document).ready(function(){
    $('#part').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    //Added with the EDIT
    var data = $option.val();//to get content of "value" attrib
    console.log(data)
    $('.unit').load('https://scmganding.site/public/unit.php?id=' + data);  
});
});
</script> 