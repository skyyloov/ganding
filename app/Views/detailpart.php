<?= $this->extend('layout/tampil'); ?>
<?= $this->Section('contet'); ?>

<div class="container mt-5">
    <div class="row">
    <i class="fa fa-cog fa-3x blue2_color" style="float:left;"></i> <span style="font-size:27px; text-align:left;">
    <label>Detail Part</label></span>
    </div>
    <div class="row">
        <div class="col">

       <?php if(session()->getFlashdata('pesan')): ?>
  <div class="alert alert-info" role="alert">
  <?= session()->getFlashdata('pesan'); ?>
</div>
  <?php endif; ?>

  <?php if(session()->getFlashdata('pesangagal')): ?>
  <div class="alert alert-danger" role="alert">
  <?= session()->getFlashdata('pesangagal'); ?>
</div>
  <?php endif; ?>
  
       <div class="col-md-9">

        <form method="" action="" class="mt-5">

            <input type="hidden" name="id_customer" value="<?= $part[0]['id_customer']; ?>">
            <input type="hidden" nama="idpart" id="parts" value="<?= $part[0]['id']; ?>">
               <div class="form-row">
                   <div class="form-group col-md-3">
                       <label for="nama_customer">Nama Customer</label>
                   <input type="text" class="form-control" name="nama_customer" value="<?= $part[0]['nama_customer']; ?>" readonly>
                   </div>

                   <div class="form-group col-md-4">
                       <label for="nama_part">Nama Part</label>
                       <input type="text" class="form-control" name="nama_part" id="nama_part" value="<?= $part[0]['nama_part']; ?>" readonly>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="kode_part">Kode Part</label>
                        <input type="text" class="form-control" name="kode_part" id="kode_part" value="<?= $part[0]['kode_part']; ?>"  readonly>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="unit">Unit Material</label>
                        <input type="text" name="unit" class="form-control" id="unit" value="<?= $part[0]['unit_material']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="spec">Spek Material</label>
                        <input type="text" class="form-control" name="spec" value="<?= $part[0]['spec']; ?>" id="spec" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="tebal">Ketebalan</label>
                        <input type="text" class="form-control" id="tebal" name="tebal" value="<?= $part[0]['tebal']; ?>"  readonly>
                    </div>
                    <div class="form-group col-md-2">
                       <label for="berat_jenis">Berat Jenis</label>
                       <input type="text" class="form-control" id="berat_jenis" value="<?= $part[0]['berat_jenis']; ?>" name="berat_jenis" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="kg_sheet">KG / Sheet</label>
                        <input type="text" class="form-control" id="kg_sheet" value="<?= $part[0]['kg_sheet']; ?>" name="kg_sheet" readonly>
                    </div>
                </div>

                <div class="form-row">
                    
                    <div class="form-group col-md-2">
                        <label for="kg_pcs">KG / Piece</label>
                        <input type="text" class="form-control" id="kg_pcs" value="<?= $part[0]['kg_pcs']; ?>" name="kg_pcs" readonly>
                    </div>
                    <div class="form-group col-md-2">
                       <label for="panjang">Panjang</label>
                       <input type="text" class="form-control" id="panjang" value="<?= $part[0]['panjang']; ?>" name="panjang" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="proses">Proses</label>
                        <input type="text" class="form-control" name="proses" value="<?= $part[0]['proses']; ?>" id="proses"  readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="lebar">Lebar</label>
                        <input type="text" class="form-control" name="lebar" value="<?= $part[0]['lebar']; ?>" id="lebar" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="diameter">Diameter</label>
                        <input type="text" class="form-control" name="diameter" value="<?= $part[0]['diameter']; ?>" id="diameter" readonly>
                    </div>
                </div>

                <div class="form-row">
                <div class="form-group col-md-2">
                       <label for="pcs_lembar">Piece / Lembar</label>
                       <input type="text" class="form-control" id="pcs_lembar" value="<?= $part[0]['pcs_lembar']; ?>" name="pcs_lembar" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="sheet_lembar">Sheet / Lembar</label>
                        <input type="text" class="form-control" name="sheet_lembar" value="<?= $part[0]['sheet_lembar']; ?>" id="sheet_lembar"  readonly>
                    </div>
                    <div class="form-group col-md-2">
                       <label for="pcs_sheet">Piece / Sheet</label>
                       <input type="text" class="form-control" id="pcs_sheet" value="<?= $part[0]['pcs_sheet']; ?>" name="pcs_sheet" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="spot">Spot</label>
                        <input type="text" name="spot" class="form-control" id="spot" value="<?= $part[0]['spot']; ?>" readonly>
                    </div>
                   

                </div>

            </form>
            </div>
            

            <div class="col-md-3 mt-5">
                <div class="card border-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">Picture Part</div>
  <div class="card-body">
    <img src="<?= base_url('/img/'.$part[0]['foto']); ?>" class="img-fluid rounded-start" alt="...">
  </div>
</div>

<div class="form-group col-md-8">
    <form action="<?= base_url('/part/delete'); ?>" method="post">
        <label for="spot">Delete</label>
        <input type="hidden" name="idpart" value="<?= $part[0]['id']; ?>">
        <input type="submit" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-xs btn-danger form-control " id="tomboldelete" value="Delete Data Part">
    </form>
                    </div>

                    <div class="form-group col-md-8">
                    <label for="spot">Edit</label>
                        <input type="button" class="btn btn-xs btn-warning form-control " id="tombol" value="Edit Data Part">
                    </div>

                </div>

        </div>
    </div>
</div>


<div id="viewModal" class="modal fade mr-tp-100" role="dialog">

<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" >View Data</h4>
        </div>
        <div class="modal-body">
         
        </div>
        <div class="modal-footer">
           
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
   $('#tombol').on( 'click', function () {
	        var data = $('#parts').val();
    $('.modal').load('<?= base_url('/editpart.php?id='); ?>' + data);  
    $("#viewModal").modal("toggle");
   });
   
});
</script> 



<?= $this->endSection(); ?>