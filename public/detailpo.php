<?php $id=$_GET["id"];?>

<?php $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
                        $query =  mysqli_query($koneksi, "select * from po where id = $id ");
                        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC); ?>


<div class="modal-dialog modal-lg  md-effect-1 ">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" >View Detail Purchase Order Customer</h4>
        </div>
        <div class="modal-body">
        <form method="" action="" class="mt-5">

<input type="hidden" name="id_customer" value="<?= $hasil[0]['id']; ?>">

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
            <input type="text" class="form-control" name="tgl_po" value="<?= $hasil[0]['tgl_po']; ?>" id="tgl_po" readonly>
        </div>
        <div class="form-group col-md-2">
            <label for="tglterima_po">Tgl Terima PO</label>
            <input type="text" class="form-control" id="tglterima_po" name="tglterima_po" value="<?= $hasil[0]['tglterima_po']; ?>"  readonly>
        </div>
        <div class="form-group col-md-2">
           <label for="berat_jenis">Revisi PO</label>
           <input type="text" class="form-control" id="berat_jenis" value="<?= $hasil[0]['revisi_po']; ?>" name="berat_jenis" readonly>
        </div>
        <div class="form-group col-md-2">
            <label for="kg_sheet">Quantity Order</label>
            <input type="text" class="form-control" id="kg_sheet" value="<?= $hasil[0]['qty_pcs']; ?>" name="kg_sheet" readonly>
        </div>
    </div>

    <div class="form-row">
        
        <div class="form-group col-md-2">
            <label for="kg_pcs">Delivery to Customer</label>
            <input type="text" class="form-control" id="kg_pcs" value="<?= $hasil[0]['deliv_act']; ?>" name="kg_pcs" readonly>
        </div>
        <?php if($hasil[0]['deliv_act'] > 0){
            $outstand = $hasil[0]['qty_pcs'] - $hasil[0]['deliv_act'];
        }elseif($hasil[0]['deliv_act'] == 0){
            $outstand = 0 ;
        }?>
        <div class="form-group col-md-2">
           <label for="panjang">Outstanding Delivery</label>
           <input type="text" class="form-control" id="panjang" value="<?= $outstand; ?>" name="panjang" readonly>
        </div>
    </div>

</form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>