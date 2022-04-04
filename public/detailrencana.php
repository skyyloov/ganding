<?php $id=$_GET["id"];?>

<?php $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
                        $querydetails =  mysqli_query($koneksi, "select * from purchasing where id_supplier = '$id' and status= 'belum' ");
                        $hasil = mysqli_fetch_all($querydetails, MYSQLI_ASSOC); ?>
<?php $hitung = mysqli_num_rows($querydetails); ?>




<div class="modal-dialog modal-lg  md-effect-1 ">
    <div class="modal-content">
    <?php if($hitung==0): ?>
    <div class="alert alert-info" role="alert">
    <?php echo"Belum Ada Rencana Kedatangan Dari Supplier Tersebut" ?>
  </div>
 <?php   exit; endif; ?>   
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" >View Detail Purchase Order Supplier <?= $hasil[0]['nama_supplier']; ?></h4>
        </div>
        <div class="modal-body">

       

<?php foreach($hasil as $a): ?>
    <div class="card border-info">

        <form action="">
            
            <div class="form-row">
                <div class="form-group col-md-3">
                       <label for="nama_customer">No PO Supplier</label>
                       <input type="text" class="form-control" name="nama_customer" value="<?= $a['no_po_supplier']; ?>" readonly>
       </div>

       <div class="form-group col-md-2">
           <label for="nama_part">Kode Part</label>
           <input type="text" class="form-control" name="nama_part" id="nama_part" value="<?= $a['no_po']; ?>" readonly>
        </div>

        <div class="form-group col-md-2">
            <label for="kode_part">Qty Order</label>
            <input type="text" class="form-control" name="kode_part" id="kode_part" value="<?= $a['qty_po']; ?>"  readonly>
        </div>
        
        <div class="form-group col-md-2">
            <label for="kode_part">Nama Part</label>
            <input type="text" class="form-control" name="kode_part" id="kode_part" value="<?= $a['nama_part']; ?>"  readonly>
        </div>

        <div class="form-group col-md-2">
            <label for="kode_part">Spek</label>
            <input type="text" class="form-control" name="kode_part" id="kode_part" value="<?= $a['spec']; ?>"  readonly>
        </div>
        
        <div class="form-group col-md-2">
            <label for="kode_part">Kedatangan Pertama</label>
            <input type="text" class="form-control" name="kode_part" id="kode_part" value="<?= $a['tgl_dtg1']; ?>"  readonly>
            <input type="text" class="form-control" value="<?= $a['qty_dtg1']; ?>" readonly>
        </div>
        
        <div class="form-group col-md-2">
            <label for="kode_part">Kedatangan Kedua</label>
            <input type="text" class="form-control" name="kode_part" id="kode_part" value="<?= $a['tgl_dtg2']; ?>"  readonly>
            <input type="text" name="" class="form-control" value="<?= $a['qty_dtg2']; ?>" id="">
        </div>
    </div>
</form>
</div>
<?php endforeach; ?>

            </div>
            <div class="modal-footer">
                </div>
        </div>
    </div>