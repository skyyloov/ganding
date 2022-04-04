<?php $id=$_GET["id"];?>

<?php $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
                        $query =  mysqli_query($koneksi, "select * from warehouse where id = $id ");
                        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC); ?>
                        <?php foreach($hasil as $a){
                            $unit = $a['unit'];
                            $kodepart = $a['kodepart'];
                            $qty = (int) $a['total_qty'];
                        } ?>

<?php if($unit == 'lembar' && $kodepart !== "" ){ ?>
    <?php $quer =  mysqli_query($koneksi, "select * from part where kode_part = '$kodepart' ");
                        $has = mysqli_fetch_all($quer, MYSQLI_ASSOC); ?>
                    <?php foreach($has as $a){
                        $pcslembar = (float) $a['pcs_lembar'];
                        $qtyact = $pcslembar * $qty;
                    } ?>
<div class="modal-dialog modal-lg  md-effect-1 ">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" >View Detail Material</h4>
        </div>
        <div class="modal-body">
        <form method="" action="" class="">

   <div class="form-row">
       <div class="form-group col-md-4">
           <label for="nama_customer">Nama Customer</label>
       <input type="text" class="form-control" name="nama_customer" value="<?= $hasil[0]['nama_customer']; ?>" readonly>
       </div>

       <div class="form-group col-md-4">
           <label for="nama_supplier">Nama Supplier</label>
           <input type="text" class="form-control" name="nama_supplier" id="nama_supplier" value="<?= $hasil[0]['nama_supplier']; ?>" readonly>
        </div>

        <div class="form-group col-md-4">
            <label for="kodepart">Kode Material</label>
            <input type="text" class="form-control" name="kodepart" id="kodepart" value="<?= $hasil[0]['kodepart']; ?>"  readonly>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="nama_material">Material</label>
            <input type="text" name="nama_material" class="form-control" id="nama_material" value="<?= $hasil[0]['nama_material']; ?>" readonly>
        </div>
        <div class="form-group col-md-2">
            <label for="spec">Spek</label>
            <input type="text" class="form-control" name="spec" value="<?= $hasil[0]['spec']; ?>" id="spec" readonly>
        </div>
        <div class="form-group col-md-2">
            <label for="total_qty">Quantity Stok</label>
            <input type="text" class="form-control" id="total_qty" name="total_qty" value="<?= floor($hasil[0]['total_qty']); ?>"  readonly>
        </div>
        <div class="form-group col-md-2">
           <label for="berat_jenis">Konversi (Pieces)</label>
           <input type="text" class="form-control" id="berat_jenis" value="<?= floor($qtyact); ?>" name="berat_jenis" readonly>
        </div>
        <div class="form-group col-md-2">
           <label for="berat_jenis">Tanggal Datang</label>
           <input type="text" class="form-control" id="berat_jenis" value="<?= $hasil[0]['tanggal_datang']; ?>" name="berat_jenis" readonly>
        </div>
    </div>

</form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
<?php } elseif($unit == 'sheet' && $kodepart !== "" ){  ?>
    <?php $quer =  mysqli_query($koneksi, "select * from part where kode_part = '$kodepart' ");
                        $has = mysqli_fetch_all($quer, MYSQLI_ASSOC); ?>
                    <?php foreach($has as $a){
                        $pcssheet = (float) $a['pcs_sheet'];
                        $qtyactt = $pcssheet * $qty;
                    } ?>
    <div class="modal-dialog modal-lg  md-effect-1 ">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" >View Detail Material</h4>
        </div>
        <div class="modal-body">
        <form method="" action="" class="">

   <div class="form-row">
       <div class="form-group col-md-4">
           <label for="nama_customer">Nama Customer</label>
       <input type="text" class="form-control" name="nama_customer" value="<?= $hasil[0]['nama_customer']; ?>" readonly>
       </div>

       <div class="form-group col-md-4">
           <label for="nama_supplier">Nama Supplier</label>
           <input type="text" class="form-control" name="nama_supplier" id="nama_supplier" value="<?= $hasil[0]['nama_supplier']; ?>" readonly>
        </div>

        <div class="form-group col-md-4">
            <label for="kodepart">Kode Material</label>
            <input type="text" class="form-control" name="kodepart" id="kodepart" value="<?= $hasil[0]['kodepart']; ?>"  readonly>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="nama_material">Material</label>
            <input type="text" name="nama_material" class="form-control" id="nama_material" value="<?= $hasil[0]['nama_material']; ?>" readonly>
        </div>
        <div class="form-group col-md-2">
            <label for="spec">Spek</label>
            <input type="text" class="form-control" name="spec" value="<?= $hasil[0]['spec']; ?>" id="spec" readonly>
        </div>
        <div class="form-group col-md-2">
            <label for="total_qty">Quantity Stok</label>
            <input type="text" class="form-control" id="total_qty" name="total_qty" value="<?= floor($hasil[0]['total_qty']); ?>"  readonly>
        </div>
        <div class="form-group col-md-2">
           <label for="berat_jenis">Konversi (Pieces)</label>
           <input type="text" class="form-control" id="berat_jenis" value="<?= floor($qtyactt); ?>" name="berat_jenis" readonly>
        </div>
        <div class="form-group col-md-2">
           <label for="berat_jenis">Tanggal Datang</label>
           <input type="text" class="form-control" id="berat_jenis" value="<?= $hasil[0]['tanggal_datang']; ?>" name="berat_jenis" readonly>
        </div>
    </div>

</form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>

    <?php } elseif ($unit == 'coil' && $kodepart !== "" ) { ?>
        <?php $quer =  mysqli_query($koneksi, "select * from part where kode_part = '$kodepart' ");
                        $has = mysqli_fetch_all($quer, MYSQLI_ASSOC); ?>
                    <?php foreach($has as $a){
                        $kgpcs = (float) $a['kg_pcs'];
                        $qtyacttt = $qty / $kgpcs;
                    } ?>
        <div class="modal-dialog modal-lg  md-effect-1 ">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" >View Detail Material</h4>
        </div>
        <div class="modal-body">
        <form method="" action="" class="">

   <div class="form-row">
       <div class="form-group col-md-4">
           <label for="nama_customer">Nama Customer</label>
       <input type="text" class="form-control" name="nama_customer" value="<?= $hasil[0]['nama_customer']; ?>" readonly>
       </div>

       <div class="form-group col-md-4">
           <label for="nama_supplier">Nama Supplier</label>
           <input type="text" class="form-control" name="nama_supplier" id="nama_supplier" value="<?= $hasil[0]['nama_supplier']; ?>" readonly>
        </div>

        <div class="form-group col-md-4">
            <label for="kodepart">Kode Material</label>
            <input type="text" class="form-control" name="kodepart" id="kodepart" value="<?= $hasil[0]['kodepart']; ?>"  readonly>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="nama_material">Material</label>
            <input type="text" name="nama_material" class="form-control" id="nama_material" value="<?= $hasil[0]['nama_material']; ?>" readonly>
        </div>
        <div class="form-group col-md-2">
            <label for="spec">Spek</label>
            <input type="text" class="form-control" name="spec" value="<?= $hasil[0]['spec']; ?>" id="spec" readonly>
        </div>
        <div class="form-group col-md-2">
            <label for="total_qty">Quantity Stok</label>
            <input type="text" class="form-control" id="total_qty" name="total_qty" value="<?= floor($hasil[0]['total_qty']); ?>"  readonly>
        </div>
        <div class="form-group col-md-2">
           <label for="berat_jenis">Konversi (Pieces)</label>
           <input type="text" class="form-control" id="berat_jenis" value="<?= floor($qtyacttt); ?>" name="berat_jenis" readonly>
        </div>
        <div class="form-group col-md-2">
           <label for="berat_jenis">Tanggal Datang</label>
           <input type="text" class="form-control" id="berat_jenis" value="<?= $hasil[0]['tanggal_datang']; ?>" name="berat_jenis" readonly>
        </div>
    </div>

</form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>


<?php }elseif ($unit === 'pcs' && $kodepart !== "" ) {?>

    <?php $quer =  mysqli_query($koneksi, "select * from part where kode_part = '$kodepart' ");
                        $has = mysqli_fetch_all($quer, MYSQLI_ASSOC); ?>
                    <?php foreach($has as $a){
                    } ?>
        <div class="modal-dialog modal-lg  md-effect-1 ">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" >View Detail Material</h4>
        </div>
        <div class="modal-body">
        <form method="" action="" class="">

   <div class="form-row">
       <div class="form-group col-md-4">
           <label for="nama_customer">Nama Customer</label>
       <input type="text" class="form-control" name="nama_customer" value="<?= $hasil[0]['nama_customer']; ?>" readonly>
       </div>

       <div class="form-group col-md-4">
           <label for="nama_supplier">Nama Supplier</label>
           <input type="text" class="form-control" name="nama_supplier" id="nama_supplier" value="<?= $hasil[0]['nama_supplier']; ?>" readonly>
        </div>

        <div class="form-group col-md-4">
            <label for="kodepart">Kode Material</label>
            <input type="text" class="form-control" name="kodepart" id="kodepart" value="<?= $hasil[0]['kodepart']; ?>"  readonly>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="nama_material">Material</label>
            <input type="text" name="nama_material" class="form-control" id="nama_material" value="<?= $hasil[0]['nama_material']; ?>" readonly>
        </div>
        <div class="form-group col-md-2">
            <label for="spec">Spek</label>
            <input type="text" class="form-control" name="spec" value="<?= $hasil[0]['spec']; ?>" id="spec" readonly>
        </div>
        <div class="form-group col-md-2">
            <label for="total_qty">Quantity Stok</label>
            <input type="text" class="form-control" id="total_qty" name="total_qty" value="<?= $hasil[0]['total_qty']; ?>"  readonly>
        </div>
        <div class="form-group col-md-2">
           <label for="berat_jenis">Tanggal Datang</label>
           <input type="text" class="form-control" id="berat_jenis" value="<?= $hasil[0]['tanggal_datang']; ?>" name="berat_jenis" readonly>
        </div>
    </div>

</form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>

  
<?php } elseif ($kodepart == "") { ?>
    <div class="modal-dialog modal-lg  md-effect-1 ">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" >View Detail Material</h4>
        </div>
        <div class="modal-body">
        <form method="" action="" class="">

   <div class="form-row">
       <div class="form-group col-md-4">
           <label for="nama_customer">Nama Customer</label>
       <input type="text" class="form-control" name="nama_customer" value="<?= $hasil[0]['nama_customer']; ?>" readonly>
       </div>

       <div class="form-group col-md-4">
           <label for="nama_supplier">Nama Supplier</label>
           <input type="text" class="form-control" name="nama_supplier" id="nama_supplier" value="<?= $hasil[0]['nama_supplier']; ?>" readonly>
        </div>

        <div class="form-group col-md-4">
            <label for="kodepart">Kode Material</label>
            <input type="text" class="form-control" name="kodepart" id="kodepart" value="<?= $hasil[0]['kodepart']; ?>"  readonly>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="nama_material">Material</label>
            <input type="text" name="nama_material" class="form-control" id="nama_material" value="<?= $hasil[0]['nama_material']; ?>" readonly>
        </div>
        <div class="form-group col-md-2">
            <label for="spec">Spek</label>
            <input type="text" class="form-control" name="spec" value="<?= $hasil[0]['spec']; ?>" id="spec" readonly>
        </div>
        <div class="form-group col-md-2">
            <label for="total_qty">Quantity Stok</label>
            <input type="text" class="form-control" id="total_qty" name="total_qty" value="<?= $hasil[0]['total_qty']; ?>"  readonly>
        </div>
        <div class="form-group col-md-2">
           <label for="berat_jenis">Tanggal Datang</label>
           <input type="text" class="form-control" id="berat_jenis" value="<?= $hasil[0]['tanggal_datang']; ?>" name="berat_jenis" readonly>
        </div>
    </div>

</form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
<?php }elseif($unit === 'tube' && $kodepart !== ""){ ?>

    <?php $quer =  mysqli_query($koneksi, "select * from part where kode_part = '$kodepart' ");
                        $has = mysqli_fetch_all($quer, MYSQLI_ASSOC); ?>
                    <?php foreach($has as $a){
                    } ?>
        <div class="modal-dialog modal-lg  md-effect-1 ">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" >View Detail Material</h4>
        </div>
        <div class="modal-body">
        <form method="" action="" class="">

   <div class="form-row">
       <div class="form-group col-md-4">
           <label for="nama_customer">Nama Customer</label>
       <input type="text" class="form-control" name="nama_customer" value="<?= $hasil[0]['nama_customer']; ?>" readonly>
       </div>

       <div class="form-group col-md-4">
           <label for="nama_supplier">Nama Supplier</label>
           <input type="text" class="form-control" name="nama_supplier" id="nama_supplier" value="<?= $hasil[0]['nama_supplier']; ?>" readonly>
        </div>

        <div class="form-group col-md-4">
            <label for="kodepart">Kode Material</label>
            <input type="text" class="form-control" name="kodepart" id="kodepart" value="<?= $hasil[0]['kodepart']; ?>"  readonly>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="nama_material">Material</label>
            <input type="text" name="nama_material" class="form-control" id="nama_material" value="<?= $hasil[0]['nama_material']; ?>" readonly>
        </div>
        <div class="form-group col-md-2">
            <label for="spec">Spek</label>
            <input type="text" class="form-control" name="spec" value="<?= $hasil[0]['spec']; ?>" id="spec" readonly>
        </div>
        <div class="form-group col-md-2">
            <label for="total_qty">Quantity Stok</label>
            <input type="text" class="form-control" id="total_qty" name="total_qty" value="<?= $hasil[0]['total_qty']; ?>"  readonly>
        </div>
        <div class="form-group col-md-2">
           <label for="berat_jenis">Tanggal Datang</label>
           <input type="text" class="form-control" id="berat_jenis" value="<?= $hasil[0]['tanggal_datang']; ?>" name="berat_jenis" readonly>
        </div>
    </div>

</form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>

<?php } ?>

    <!-- <form action="/manajemenproyek/public/proyek/download" method="post">
        <input type="file" value="<?= $a['file']; ?>" hidden >
        <button type="submit" class="btn btn-xs btn-info">Download File</button>
      </form> -->