<?php $idsup = $_GET['idsupplier']; ?>

 <?php $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding'); ?>
                        
<?php  $querysoep =  mysqli_query($koneksi, "select DISTINCT nomorsurjal from surjaldatangsubcont where idsup = $idsup ");
                $hitung = mysqli_num_rows($querysoep);?>

<label for="nama_part">Pilih No Surat Jalan</label>
                       <select class="form-control" name="noposup" id="surjalkedatangan" required>
                        
                <?php if($hitung===0){ ?>
                    <option value="0" disabled="disabled">Tidak Ada Surat Jalan Dari Supplier tersebut</option>
                    <?php } 
                     else{ ?>
                    <option value="">-Pilih No Surat Jalan</option>
                     <?php   $hasil = mysqli_fetch_all($querysoep, MYSQLI_ASSOC);
                        foreach ($hasil as $item){ ?>
                            <option value="<?php echo $item["nomorsurjal"];?>"><?php echo $item['nomorsurjal'];?></option> 
                           <?php  } ?>

                       <?php } ?>    
                    </select>
                    
                    <script type="text/javascript">
$(document).ready(function(){
    $('#surjalkedatangan').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    //Added with the EDIT
    var datasurjal = $option.val();//to get content of "value" attrib
    console.log(datasurjal)
    $('.surjalkedatangan').load('https://scmganding.site/public/surjalsubcont.php?idsupplier=' + datasurjal);  
});
});
</script> 