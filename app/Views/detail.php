<?= $this->extend('layout/tampil'); ?>
<?= $this->Section('contet'); ?>
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">

        <div class="d-inline-flex p-4 bd-highlight">
        <div class="card" style="width: 100%;">
   <div class="card-header">
       <h2 style="text-align:center;">Detail Customer</h2>
    </div>
<div class="card-body">
<div class="card mx-3"  style="width:30%; ;">
    
</div>
    <table class="table table-bordered table-hover mt-4">
        <thead class="table-dark">
            <tr>    
                <th scope="col" style="text-align:center; widht:1%;">Nomor</th>
                <th scope="col" style="text-align:center;">Customer Name</th>
                <th scope="col" style="text-align:center;">Address</th>
                <th scope="col" style="text-align:center;">Contact</th>
                <th scope="col" style="text-align:center;">Email</th>
                <th scope="col" style="text-align:center;">Details</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            <?php foreach($cust as $a): ?>
    <tr>  
        <td style="text-align:center;"><?= $i++; ?></td>
      <td style="text-align:center;"><?= $a['nama_customer']; ?></td>
      <td style="text-align:center;"><?= $a['alamat']; ?></td>
      <td style="text-align:center;"><?= $a['kontak']; ?></td>
      <td style="text-align:center;"><?= $a['email']; ?></td>
      <td><a href="" class="btn btn-sm btn-warning">Detail</a></td>
    </tr>
    <?php endforeach; ?>
</tbody>
</table>


</div>
</div>

</div>

</div>
    </div>
    </div>
</div>
<?= $this->endSection(); ?>