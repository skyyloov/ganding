<?php $id = $_GET['id']; ?>

<?php   $koneksi = mysqli_connect('localhost','root','','ganding');
                      $query =  mysqli_query($koneksi, "select * from part where id_customer = $id ");
                      $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC); ?>

<div class="col-md-2">
 <a href="http://localhost:8080/gands/public/cetakwip/<?= $id; ?>" class="btn btn-xs btn-info mb-3" target="blank">Cetak Stok WIP</a>
</div>

  <?php $noemoer=1; ?>

            <?php foreach($hasil as $a): ?>

                <?php
                $spot = $a['spot'];
              $nomor = 1;
              $num = 1;
              $nom = 1; 
              $noem = 1;
              $hitng = 1;
              $menghitung = 1;
              $itungin = 1;
              $idpart = $a['id'];  ?>

                <?php $proses = $a['proses']; ?>
                <div class="table-responsive">
<table class="table table-bordered table-hover" id="wip">
        <thead class="table-info">
            <tr>    
                <th scope="col" style="text-align:center; width:1%;">ID</th>
                <th scope="col" style="text-align:center;">Part Name</th>
                <th scope="col" style="text-align:center;" >Part Code</th>
                <?php  for($j=0; $j<$proses; $j++){ ?>
            <?php $prs = 'proses'.$num++;
                  $plan = 'plan'.$nom++;
                  $pzrs = 'PROSES'.$noem++;   ?>
                <th scope="col" style="text-align:center;"><?= $pzrs; ?></th>
                <?php } ?>
                  <?php if($spot == 'spot'){ ?>
                    <th scope="col" style="text-align:center;">SPOT</th>
                    <?php } ?>
                    <th scope="col" style="text-align:center">Stok FG</th>

                    <?php $queryassy =  mysqli_query($koneksi, "select * from finishgood where id_part = $idpart ");
                      $hasilassy = mysqli_fetch_all($queryassy, MYSQLI_ASSOC);
                      $hitungassy = mysqli_num_rows($queryassy); ?>
                    <?php if($hitungassy > 0){ ?>
                    <th scope="col" style="text-align:center">Assembly</th>
                    <?php }else {?>

                      <?php } ?>
            </tr>
        </thead>
        <tbody>
            
    <tr>  
        <td style="text-align:center; width:1%;"><?= $noemoer++; ?></td>
      <td style="text-align:center;"><?= $a['nama_part']; ?></td>
      <td style="text-align:center;"><?= $a['kode_part']; ?></td>
      
      <?php  for($i=0; $i<$proses; $i++){ ?>
            <?php $prs = 'proses'.$hitng++;
                  $plan = 'plan'.$menghitung++;
                  $pzrs = 'PROSES'.$itungin++;   ?>
<?php $queryprs =  mysqli_query($koneksi, "select * from $prs where id_part = $idpart ");
                        $hasilprs = mysqli_fetch_all($queryprs, MYSQLI_ASSOC); ?>
                        <?php $nilai = (int)$hasilprs[0][$plan]; ?>
      <td style="text-align:center;"><?= $nilai; ?></td>
      
      <?php } ?>    
      <?php if($spot == 'spot'){ ?>
        <?php $queryspot =  mysqli_query($koneksi, "select * from spot where id_part = $idpart ");
                      $hasilspot = mysqli_fetch_all($queryspot, MYSQLI_ASSOC); ?>

          <td style="text-align:center;"><?= $hasilspot[0]['qty_in']; ?></td>
        <?php } ?>
<?php $koneksi = mysqli_connect('localhost','root','','ganding');
                      $querywhfg =  mysqli_query($koneksi, "select * from warehousefg where id_part = $idpart ");
                      $hasilwhfg = mysqli_fetch_all($querywhfg, MYSQLI_ASSOC);
                      $hitungwhfg = mysqli_num_rows($querywhfg); ?>
       <?php if($hitungwhfg > 0){ ?> 
        <td style="text-align:center;"><?= $hasilwhfg[0]['qty']; ?></td>
        <?php }elseif ($hitungwhfg < 1) {?>
          <td style="text-align:center;"><?= 0; ?></td>
          <?php } ?>

<?php $queryassy =  mysqli_query($koneksi, "select * from finishgood where id_part = $idpart ");
                      $hasilassy = mysqli_fetch_all($queryassy, MYSQLI_ASSOC);
                      $hitungassy = mysqli_num_rows($queryassy); ?>
            <?php if($hitungassy > 0){ ?>
              <?php $idfg = $hasilassy[0]['id_fg'];
                    $qtyneed = (int) $hasilassy[0]['qty_need']; ?>
              <?php $querywelding =  mysqli_query($koneksi, "select * from welding where id = $idfg ");
                      $hasilwelding = mysqli_fetch_all($querywelding, MYSQLI_ASSOC);
                      $hitungwelding = mysqli_num_rows($querywelding); ?>
                      <?php $stokdifg = (int) $hasilwelding[0]['qty'];
                            $stokwipdiwelding = $stokdifg * $qtyneed; ?>
              <td style="text-align:center;"><?= $stokwipdiwelding; ?></td>
        <?php }else {?>
          <?php } ?>

          </tr>
</tbody>
</table>
</div>
<?php endforeach; ?> 

<script type="text/javascript">
$(document).ready(function(){
  $('#button').on( 'click', function () {
    window.print();
        });
});
</script> 