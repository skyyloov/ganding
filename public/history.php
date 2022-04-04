<?php $id=$_GET['id']; ?>

<?php $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
                        $query =  mysqli_query($koneksi, "select * from purchasing where id = $id ");
                        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC); ?>

<div class="modal-dialog modal-lg  md-effect-1 ">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" >Revisi Purchase Order</h4>
        </div>
        <div class="modal-body">
        <form method="post" action="https://scmganding.site/public/purchasing/saverevisi" class="mt-3">
               <div class="form-row">
<input type="hidden" name="idpo" value="<?= $hasil[0]['id']; ?>">
               <div class="form-group col-md-5">
                        <label for="nama_customer">Nama Customer</label>
                        <input type="text" name="nama_customer" id="" class="form-control" value="<?= $hasil[0]['nama_customer']; ?>"readonly>
                    </div>

                   <div class="form-group col-md-6">
                       <label for="nama_part">Nama Supplier</label>
                       <input type="text" name="nama_supplier" id="" class="form-control" value="<?= $hasil[0]['nama_supplier']; ?>"readonly>
                    </div>

                </div>
                
                <div class="form-row">
                            <div class="form-group col-md-5 part">
                        <label for="nama_customer">Nama Part</label>
                        <input type="text" name="nama_part" id="" class="form-control" value="<?= $hasil[0]['nama_part']; ?>"readonly>
                    </div>
                   
                    <div class="form-group col-md-2">
                        <label for="tgl_po">Tanggal PO</label>
                        <input type="text" name="tgl_po" id="" class="form-control" value="<?= $hasil[0]['tglkirim_po']; ?>"readonly>        
                    </div>
                    <div class="form-group col-md-2">
                        <label for="unit_material">Unit Material</label>
                        <input type="text" name="unit" id="" class="form-control" value="<?= $hasil[0]['unit']; ?>"readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="unit_material">Revisi</label>
                        <input type="text" name="revisi" id="" class="form-control" value="<?= $hasil[0]['revisi_po']; ?>"readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="nomor_po_supplier">Nomor Purchase Order</label>
                        <input type="text" class="form-control" value="<?= $hasil[0]['no_po_supplier']; ?>"readonly name="nomor_po_supplier" id="nomor_po_supplier" placeholder="" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="qty_po">Quantity Order</label>
                        <input type="text" autocomplete="off" class="form-control" value="<?= $hasil[0]['qty_po']; ?>" id="qtypcssup" name="qty_po" placeholder="" required>
                        <span id="pesann"></span>
                    </div>
                    <div class="form-group col-md-3">
                       <label for="tgl_dtg1">Rencana Pertama</label>
                       <input type="date" class="form-control" value="<?= $hasil[0]['tgl_dtg1']; ?>" id="tgl_dtg1" name="tgl_dtg1" placeholder="" required>
                    </div>
                    <div class="form-group col-md-3">
                       <label for="tgl_dtg2">Rencana Kedua</label>
                       <input type="date" class="form-control" value="<?= $hasil[0]['tgl_dtg2']; ?>" id="tgl_dtg2" name="tgl_dtg2" placeholder="">
                    </div>
                </div>

                <div class="form-row">

                <div class="form-group col-md-2" id="qty1" hidden >
                        <label for="qty_dtg1">Quantity Rencana Kedatangan Pertama</label>
                        <input type="text" class="form-control" value="<?= $hasil[0]['qty_dtg1']; ?>" autocomplete="off" name="qty_dtg1" id="qty_dtg1" placeholder="">
                        <span id="pesan"></span>
                    </div>
                    <div class="form-group col-md-2" id="qty2" hidden >
                        <label for="qty_dtg2">Quantity Rencana Kedatangan Kedua</label>
                        <input type="text" class="form-control" value="<?= $hasil[0]['qty_dtg2']; ?>" autocomplete="off" id="qty_dtg2" name="qty_dtg2" placeholder="">
                        <span id="pesannn"></span>
                    </div>

                </div>
                <button type="submit" name="submit" class="btn btn-xs btn-success">Submit</button>
</form>

            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>

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
        $('#qty_dtg1').val('');
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
            $('#qty_dtg2').val(''); 
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
