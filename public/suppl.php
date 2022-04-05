  <?php $koneksi = mysqli_connect('localhost','root','','ganding'); ?>

<?php if (isset($_GET["idsupplier"])) { ?>
                 
    <?php $id=$_GET["idsupplier"];?>

                     
<?php                $querysoep =  mysqli_query($koneksi, "select DISTINCT no_po_supplier from purchasing where id_supplier = $id and status = 'belum' ");
                $hitung = mysqli_num_rows($querysoep);?>

<label for="nama_part">No PO Supplier</label>
                       <select class="form-control" name="noposup" id="bism" required>
                        
                <?php if($hitung===0){ ?>
                    <option value="0" disabled="disabled">Tidak Ada PO Dari Supplier tersebut</option>
                    <?php } 
                     else{ ?>
                    <option value="">-Pilih No PO Supplier</option>
                     <?php   $hasil = mysqli_fetch_all($querysoep, MYSQLI_ASSOC);
                        foreach ($hasil as $item){ ?>
                            <option value="<?php echo $item["no_po_supplier"];?>"><?php echo $item['no_po_supplier'];?></option> 
                           <?php  } ?>

                       <?php } ?>    
                    </select>
<?php } ?>

<?php if(isset($_GET["idd"])) { ?>
<?php $idd=$_GET["idd"]; ?>
<?php                $query =  mysqli_query($koneksi, "select * from purchasing where id_supplier = $idd and konfirmasi = 'belum dikonfirmasi' or konfirmasi1 ='belum dikonfirmasi' ");
                $hitung = mysqli_num_rows($query);?>

<label for="nama_part">No PO Supplier</label>
                       <select class="form-control" name="noposup" id="bims" required>
                        
                <?php if($hitung===0){ ?>
                    <option value="0" disabled="disabled">Tidak Ada PO Yang Perlu Dikonfirmasi Dari Supplier Tersebut</option>
                    <?php } 
                     else{ ?>
                    <option value="">-Pilih No PO Supplier</option>
                     <?php   $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                        foreach ($hasil as $item){ ?>
                            <option value="<?php echo $item["id"];?>"><?php echo $item['no_po_supplier'].' '.$item['spec'].' ';?></option> 
                           <?php  } ?>

                       <?php } ?>    
                    </select>

<?php } ?>


<?php if(isset($_GET["iddd"])){ ?>
<?php $iddd = $_GET["iddd"]; ?>
<?php                $query =  mysqli_query($koneksi, "select DISTINCT nomor_surjal from surjal where id_supplier = $iddd ");
                $hitung = mysqli_num_rows($query);?>

<label for="nama_part">No Surat Jalan</label>
                       <select class="form-control" name="noposup" id="surjal" required>
                        
                <?php if($hitung===0){ ?>
                    <option value="0" selected="true" disabled="disabled">Tidak Ada Surat Jalan</option>
                    <?php } 
                     else{ ?>
                    <option value="">-Pilih No Surjal</option>
                     <?php   $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                        foreach ($hasil as $item){ ?>
                            <option value="<?php echo $item["nomor_surjal"];?>"><?= $item['nomor_surjal']; ?></option> 
                           <?php  } ?>

                       <?php } ?>    
                    </select>

<?php } ?>


<?php if(isset($_GET["idcustomer"])){ ?>
<?php $idcustomer = $_GET["idcustomer"]; ?>
<?php                $querycustomer =  mysqli_query($koneksi, "select DISTINCT nosurjal from surjalcust where id_customer = $idcustomer ");
                $hitungcustomer = mysqli_num_rows($querycustomer);?>

<label for="nama_part">No Surat Jalan</label>
                       <select class="form-control" name="noposup" id="surjalcustomer" required>
                        
                <?php if($hitungcustomer===0 || $idcustomer ===0){ ?>
                    <option value="" selected="true" >Tidak Ada Surat Jalan</option>
                    <?php } 
                     else{ ?>
                    <option value="">-Pilih No Surjal</option>
                     <?php   $hasil = mysqli_fetch_all($querycustomer, MYSQLI_ASSOC);
                        foreach ($hasil as $item){ ?>
                            <option value="<?php echo $item["nosurjal"];?>"><?= $item['nosurjal']; ?></option> 
                           <?php  } ?>

                       <?php } ?>    
                    </select>

<?php } ?>


                    <script type="text/javascript">
$(document).ready(function(){
    $('#bism').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    //Added with the EDIT
    var data = $option.val();//to get content of "value" attrib
    console.log(data)
    $('.sus').load('http://localhost:8080/gands/public/matrs.php?no_po_supplier=' + data);  
});
});
</script>   

<script type="text/javascript">
$(document).ready(function(){
    $('#bims').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    //Added with the EDIT
    var data = $option.val();//to get content of "value" attrib
    console.log(data)
    $('.confrm').load('http://localhost:8080/gands/public/confrm.php?idd=' + data);  
});
});
</script>   



<script type="text/javascript">
$(document).ready(function(){
    $('#surjalcustomer').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    //Added with the EDIT
    var datasurjal = $option.val();//to get content of "value" attrib
    console.log(datasurjal)
    $('.deliv').load('http://localhost:8080/gands/public/surjalcust.php?nosurjal=' + datasurjal);  
});
});
</script>  
