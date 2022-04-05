<?php $id = $_GET['id']; ?>
<?php $koneksi = mysqli_connect('localhost','root','','ganding');
                        $query =  mysqli_query($koneksi, "select * from po where id = $id ");
                        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC); ?>
<div class="modal-dialog modal-lg  md-effect-1 ">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" >Revisi Purchase Order</h4>
        </div>
        <div class="modal-body">
        <form method="POST" action="http://localhost:8080/gands/public/customer/saverevisi" class="mt-5">

<input type="hidden" name="idpo" value="<?= $hasil[0]['id']; ?>">

   <div class="form-row">
       <div class="form-group col-md-4">
           <label for="nama_customer">Nama Customer</label>
       <input type="text" class="form-control" name="nama_customer" value="<?= $hasil[0]['nama_customer']; ?>" readonly>
       </div>

       <div class="form-group col-md-4">
           <label for="nama_part">Nama Part</label>
           <input type="text" class="form-control" name="nama_part" id="nama_part" value="<?= $hasil[0]['nama_part']; ?>" readonly>
        </div>

        <div class="form-group col-md-4">
            <label for="kode_part">Kode Part</label>
            <input type="text" class="form-control" name="kode_part" id="kode_part" value="<?= $hasil[0]['no_po']; ?>"  readonly>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="nomor">Nomor PO</label>
            <input type="text" name="nomor" class="form-control" id="nomor" value="<?= $hasil[0]['nomor_po']; ?>" readonly>
        </div>
        <div class="form-group col-md-2">
            <label for="tgl_po">Tanggal PO</label>
            <input type="text" class="form-control" name="tgl_po" value="<?= $hasil[0]['tgl_po']; ?>" id="tgl_po">
        </div>
        <div class="form-group col-md-2">
            <label for="tglterima_po">Tgl Terima PO</label>
            <input type="text" class="form-control" id="tglterima_po" name="tglterima_po" value="<?= $hasil[0]['tglterima_po']; ?>">
        </div>
        
        <div class="form-group col-md-2">
            <label for="kg_sheet">Quantity Order</label>
            <input type="text" class="form-control" autocomplete="off" id="qtypcs" value="<?= $hasil[0]['qty_pcs']; ?>" name="qtypcs" >
        </div>
        <span id="pesan"></span>
    </div>

    <button type="submit" name="submit" class="btn btn-xs btn-danger" >Submit Revisi</button>
</form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>

    <script type="text/javascript">
$(document).ready(function(){

    
    $("#qtypcs").keypress(function(data){
      if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57))
      {
        $("#pesan").html("isikan angka").show().fadeOut("slow");
        return false;
      }
    });
   
});
</script> 