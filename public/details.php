<?php $id=$_GET["id"];?>

<?php $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
                        $query =  mysqli_query($koneksi, "select * from part where id_customer = $id ");
                        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC); ?>
<?php  $querycust =  mysqli_query($koneksi, "select * from customer where id = $id ");
                        $hasilcust = mysqli_fetch_all($querycust, MYSQLI_ASSOC); ?>


<div class="modal-dialog modal-lg  md-effect-1 ">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" >View Part <?= $hasilcust[0]['nama_customer']; ?></h4>
            <a href="https://scmganding.site/public/part/buatpart/<?= $id; ?>" class="btn btn-info">Tambah Part</a>
        </div>
        <div class="modal-body">
            <?php $i=1; ?>
                <?php foreach($hasil as $a): ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mt-4">
        <thead class="table-success">
            <tr>    
                <th scope="col" style="text-align:center; width:1%;">Nomor</th>
                <th scope="col" style="text-align:center;">Part Name</th>
                <th scope="col" style="text-align:center;">Part Code</th>
                <th scope="col" style="text-align:center;">Proses</th>
                <th scope="col" style="text-align:center;">Spot</th>
                <th style="width:10%;"></th>
                
            </tr>
        </thead>
        <tbody>
            
            
    <tr>  
        <td style="text-align:center;"><?= $i++; ?></td>
      <td style="text-align:center;"><?= $a['nama_part']; ?></td>
      <td style="text-align:center;"><?= $a['kode_part']; ?></td>
      <td style="text-align:center;"><?= $a['proses']; ?></td>
      <td style="text-align:center;"><?= $a['spot']; ?></td>
      <td><a href="https://scmganding.site/public/part/<?= $a['id']; ?>" class="btn btn-xs btn-primary" style="float:center;">See Detail</a></td>
      
    </tr>
   
</tbody>
</table>
</div>
<?php endforeach; ?>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
    
    <!-- <form action="/manajemenproyek/public/proyek/download" method="post">
        <input type="file" value="<?= $a['file']; ?>" hidden >
        <button type="submit" class="btn btn-xs btn-info">Download File</button>
      </form> -->