<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- DataTable -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<?php $koneksi = mysqli_connect('localhost','root','','ganding'); ?>

<?php $id=$_GET["id"];?>
<?php $tanggul=$_GET["tgl"]; ?>

<?php
date_default_timezone_set('Asia/Jakarta');
 $date =date('Y-m'); ?>

<?php if(!isset($_GET["tgl"])){

    $queriii = mysqli_query($koneksi, "select * from po where id_customer = '$id' and tgl_po like '$date%' and status = 'belum close' ");
                $hoe = mysqli_fetch_all($queriii, MYSQLI_ASSOC);
                $hitoeng = mysqli_num_rows($queriii);

}elseif (isset($_GET["tgl"])) { ?>

<?php $queriii = mysqli_query($koneksi, "select * from po where id_customer = '$id' and tgl_po like '$tanggul%' and status = 'belum close' ");
                $hoe = mysqli_fetch_all($queriii, MYSQLI_ASSOC);
                $hitoeng = mysqli_num_rows($queriii);
                ?>
<?php } ?>

<?php
 if ($hitoeng != 0 ) {
     $query =  mysqli_query($koneksi, "select * from part where id_customer = $id ");
     $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
 }   
   else { ?>
    <div class="alert alert-warning" role="alert">
    <?php echo"TIDAK ADA DATA PO DI BULAN TERSEBUT" ?>
  </div>
 <?php   exit; } ?>
                         
                      
<a style="text-float:center;">  PO BULAN <?= $tanggul; ?>   </a>   
<form action="http://localhost/gands/public/home/cetakmrp" method="post">
    <input type="hidden" name="id" value="<?= $id; ?>">
    <input type="hidden" name="tanggal" value="<?= $tanggul; ?>">
    <button type="submit" style="float:right;" target="blank" class="btn btn-xs btn-warning"  name="submit" >Cetak MRP</button>
</form>          
<table class="table table-bordered table-hover mt-4" id="tabul">
            <thead class="table-dark">
            
            <tr>
                <td colspan="28" style="text-align:right;">Kebutuhan Material</td>
            </tr>

                <tr>    
                    <th scope="col" style="text-align:center; width:1%;">Nomor</th>
                    <th scope="col" style="text-align:center;">Nama Part</th>
                    <th scope="col" style="text-align:center;">Kode Part</th>
                    <th scope="col" style="text-align:center;">Spec</th>
                    <th scope="col" style="text-align:center;">Berat Jenis</th>
                    <th scope="col" style="text-align:center;">Panjang </th>
                    <th scope="col" style="text-align:center;">Lebar</th>
                    <th scope="col" style="text-align:center;">Tebal</th>
                    <th scope="col" style="text-alignLcenterl">Diameter</th>
                    <th scope="col" style="text-align:center;">Pcs/Lbr</th>
                    <th scope="col" style="text-align:center;">Pcs/Sht</th>
                    <th scope="col" style="text-align:center;">Kg/Sht</th>
                    <th scope="col" style="text-align:center;">Kg/Pcs</th>
                    <th scope="col" style="text-align:center;">Sheet/Lbr</th>
                    <th scope="col" style="text-align:center;">Stok Material(Lbr)</th>
                    <th scope="col" style="text-align:center;">Stok Material(Sheet)</th>
                    <th scope="col" style="text-align:center;">Stok Material(Coil)</th>
                    <th scope="col" style="text-align:center;">Konversi (Pcs)</th>
                    <th scope="col" style="text-align:center;">WIP</th>
                    <th scope="col" style="text-align:center;">FG</th>
                    <th scope="col" style="text-align:center;">Total Stok(Pcs)</th>
                    <th scope="col" style="text-align:center;">Quantity Order</th>
                    <th scope="col" style="text-align:center;">Sisa Order Bulan Sebelumnya</th>
                    <th scope="col" style="text-align:center;">Sisa Stok(Pcs)</th>
                    <th scope="col" style="text-align:center;">Pcs </th>
                    <th scope="col" style="text-align:center;">Lembar</th>
                    <th scope="col" style="text-align:center;">Sheet</th>
                    <th scope="col" style="text-align:center;">KG</th>
                </tr>
            </thead>
            <tbody>
                <?= $i=1; ?>
            <?php foreach($hasil as $a):
                $idpart = $a['id'];
                $kodepart = $a['kode_part'];
                $idcust = $a['id_customer'];
                $pcslembar =  $a['pcs_lembar'];
                $pcssheet =  $a['pcs_sheet'];
                $kgpcs =  $a['kg_pcs'];
                ?>
                <tr>  
                    <td style="text-align:center;"><?= $i++; ?></td>
                    <td style="text-align:center;"><?= $a['nama_part']; ?></td>
                    <td style="text-align:center;"><?= $kodepart; ?></td>
                    <td style="text-align:center;"><?= $a['spec']; ?></td>
                    <td style="text-align:center;"><?= $a['berat_jenis']; ?></td>
                    <td><?= $a['panjang']; ?></td>
                    <td style="text-align:center;"><?= $a['lebar']; ?></td>
                    <td style="text-align:center;"><?= $a['tebal']; ?></td>
                    <td style="text-align:center;"><?= $a['diameter']; ?></td>
                    <td style="text-align:center;"><?= $a['pcs_lembar']; ?></td>
                    <td style="text-align:center;"><?= $a['pcs_sheet']; ?></td>
                    <td style="text-align:center;"><?= $a['kg_sheet']; ?></td>
                    <td style="text-align:center;"><?= $a['kg_pcs']; ?></td>
                    <td><?= $a['sheet_lembar']; ?></td>
 
 <?php $koneks = mysqli_connect('localhost','root','','ganding');
$queryy =  mysqli_query($koneks, "select * from warehouse where kodepart = '$kodepart' and unit = 'lembar' and id_customer = $idcust ");
$ha = mysqli_num_rows($queryy);
$hasul = mysqli_fetch_all($queryy, MYSQLI_ASSOC); ?>                
<?php
        if ($ha==0) {
            $total = 0;
        }else {
            $total = (float) $hasul[0]['total_qty'];
        }

 ?>

<?php $konek = mysqli_connect('localhost','root','','ganding');
$queryyy =  mysqli_query($konek, "select * from warehouse where kodepart = '$kodepart' and unit = 'sheet' and id_customer = $idcust ");
$haa = mysqli_num_rows($queryyy);
$hasl = mysqli_fetch_all($queryyy, MYSQLI_ASSOC); ?>     
           
<?php 
        if ($haa==0) {
            $totl = 0;
        } else {
            
            $totl = (float) $hasl[0]['total_qty']; 
        }
            ?>
<?php $konek = mysqli_connect('localhost','root','','ganding');
$querystokcoil =  mysqli_query($konek, "select * from warehouse where kodepart = '$kodepart' and unit = 'coil' and id_customer = $idcust ");
$hitungstokcoil = mysqli_num_rows($querystokcoil);
$hasilstokcoil = mysqli_fetch_all($querystokcoil, MYSQLI_ASSOC); ?> 
<?php if($hitungstokcoil > 0){
    $stokcoil = (float) $hasilstokcoil[0]['total_qty'];
    $kgpcsakhir = (float) $a['kg_pcs'];
    $stokakhircoil = $stokcoil / $kgpcsakhir;
}elseif ($hitungstokcoil < 1) {
    $stokakhircoil = 0;
    $stokcoil = 0;
} ?>

                    <td style="text-align:center;"><?= floor($total); ?></td>
                    <td style="text-align:center;"><?= floor($totl); ?></td>
                    <td style="text-align:center;"><?= floor($stokcoil); ?></td>
<?php if($a['unit_material']=='lembar'){
    $konversi = ($total*$a['pcs_lembar'])+($totl*$a['pcs_sheet']);
}
elseif ($a['unit_material']=='sheet') {
    $konversi = ($total*$a['pcs_lembar'])+($totl*$a['pcs_sheet']);
}
else {
    $konversi = 0;
} ?>

<?php $konek = mysqli_connect('localhost','root','','ganding');
$querystokpcs =  mysqli_query($konek, "select * from warehouse where kodepart = '$kodepart' and unit = 'pcs' and id_customer = $idcust ");
$hitungstokpcs = mysqli_num_rows($querystokpcs);
$hasilstokpcs = mysqli_fetch_all($querystokpcs, MYSQLI_ASSOC); ?> 
<?php if($hitungstokpcs > 0){
    $stokpcs = (int) $hasilstokpcs[0]['total_qty'];
}elseif ($hitungstokpcs < 1) {
    $stokpcs = 0;
} ?>

<?php $konek = mysqli_connect('localhost','root','','ganding');
$querystoktube =  mysqli_query($konek, "select * from warehouse where kodepart = '$kodepart' and unit = 'tube' and id_customer = $idcust ");
$hitungstoktube = mysqli_num_rows($querystoktube);
$hasilstoktube = mysqli_fetch_all($querystoktube, MYSQLI_ASSOC); ?> 
<?php if($hitungstoktube > 0){
    $stoktube = (int) $hasilstoktube[0]['total_qty'];
}elseif ($hitungstoktube < 1) {
    $stoktube = 0;
} ?>
    <?php $konversiakhir = floor($stokakhircoil + $konversi + $stokpcs + $stoktube); ?>
                    <td style="text-align:center;"><?= $konversiakhir; ?></td>

<?php $kon = mysqli_connect('localhost','root','','ganding');
$quer =  mysqli_query($kon, "select * from proses where id_part = $idpart ");
$h = mysqli_num_rows($quer);
$has = mysqli_fetch_all($quer, MYSQLI_ASSOC); ?>                
<?php
        if ($h==0) {
            $wip = 0;
        }else {
           $qtyin = (int) $has[0]['qty_in'];
           $qtyout = (int) $has[0]['qty_out'];
            if ($qtyin > $qtyout) {
                $wip = $qtyin - $qtyout;
            }else {
                $wip = 0;
            }

        }

 ?>
                    <td style="text-align:center;"><?= $wip; ?></td>

<?php $con = mysqli_connect('localhost','root','','ganding');
$que =  mysqli_query($con, "select * from warehousefg where id_part = $idpart ");
$haaaa = mysqli_num_rows($que);
$hasss = mysqli_fetch_all($que, MYSQLI_ASSOC); ?>   

<?php $querywelding =  mysqli_query($con, "select * from finishgood where id_part = $idpart ");
$hitungwelding = mysqli_num_rows($querywelding);
$hasilwelding = mysqli_fetch_all($querywelding, MYSQLI_ASSOC); ?>            

<?php
        if ($haaaa==0) {
            $fg = 0;
        }else {
            $fg = $hasss[0]['qty'];
        }

 ?>

<?php if($hitungwelding > 0){
$idwelding= $hasilwelding[0]['id_fg'];
$qtyneed = (int) $hasilwelding[0]['qty_need'];


$querywelds =  mysqli_query($con, "select * from welding where id = $idwelding ");
$hitungwelds = mysqli_num_rows($querywelds);
$hasilwelds = mysqli_fetch_all($querywelds, MYSQLI_ASSOC);
$qtydiwelding = (int) $hasilwelds[0]['qty'];

$stokdiwelding = $qtydiwelding * $qtyneed;

}elseif($hitungwelding < 1) {
    $stokdiwelding = 0;
} ?>

<?php $benertotal = $konversiakhir+$fg+$wip+$stokdiwelding; ?>

                    <td><?= $fg; ?></td>
                    <td><?= $benertotal; ?></td>

                    

<?php $coenn = mysqli_connect('localhost','root','','ganding');
$quen =  mysqli_query($coenn, "select * from po where no_po = '$kodepart' and tgl_po like '$tanggul%' and status = 'belum close' ");
$haaaau = mysqli_num_rows($quen);
$hasssu = mysqli_fetch_all($quen, MYSQLI_ASSOC); ?>   

<?php 
        if ($tanggul == "") {
            date_default_timezone_set('Asia/Jakarta');
        $datawaktu = date('Y-m');
        }else {
            $datawaktu = $tanggul;
        }
        $cektanggal = date('Y-m', strtotime('-1 month', strtotime($datawaktu)));
 ?>

<?php $coenn = mysqli_connect('localhost','root','','ganding');
$querypolama =  mysqli_query($coenn, "select * from po where id_part = $idpart and tgl_po like '$cektanggal%' and status = 'belum close' ");
$hitungpolama = mysqli_num_rows($querypolama);
$hasilpolama = mysqli_fetch_all($querypolama, MYSQLI_ASSOC); ?>   

<?php if($hitungpolama > 0){
$qtypcslama = (int) $hasilpolama[0]['qty_pcs'];
$delivactlama = (int) $hasilpolama[0]['deliv_act'];

    if ($qtypcslama > $delivactlama) {
        $sisaqtylama = $qtypcslama - $delivactlama;
    }

}elseif ($hitungpolama < 1) {
    $sisaqtylama = 0;
} ?>


<?php
        if ($haaaau==0) {
            $po = 0;
        }else {
            $delipact = (int) $hasssu[0]['deliv_act'];
            $qtypobulanini = (int) $hasssu[0]['qty_pcs'];
            $po = $qtypobulanini - $delipact;
        }

 ?>
                    <td style="text-align:center;"><?= $po; ?></td>
                    <td style="text-align:center;"><?= $sisaqtylama; ?></td>

 <?php  if ($po==0 && $sisaqtylama == 0) {
     $pcs=0;
     $lbr=0;
     $sht=0;
     $kg=0;
 } elseif($po!==0 || $sisaqtylama !== 0 ) {
     $pcs = $sisaqtylama + $po - $benertotal;
     
 }
 
 ?> 
 
 <?php if ($pcs < 1) {
     $pc=0;
     $lb=0;
     $sh=0;
     $k=0;
     $sisa = $benertotal - ($po +$sisaqtylama );
 }else {
    $pcslembarrr = (int)$pcslembar;
    $pcsshttt = (int)$pcssheet;
    $kgpcsss = $kgpcs;
    $sisa = 0;


    if ($a['unit_material']=='lembar' ) {
        
    $lbr = $pcs / $pcslembarrr;
    $sht = $pcs / $pcsshttt;
    $kg = $pcs * $kgpcsss;
    }elseif($a['unit_material']=='sheet') {
        $sht = $pcs / $pcsshttt;
        $kg = $pcs * $kgpcsss;
        $lbr = 0;
    }elseif ($a['unit_material']=='coil') {
        
    $kg = $pcs * $kgpcsss;
    $lbr = 0;
    $sht = 0;
    }elseif($a['unit_material']=='tube'){
        $kg = $pcs*$kgpcsss;
        $lbr = 0;
        $sht = 0;
    }else {
        
    $lbr = 0;
    $sht = 0;
    $kg = 0; 
    }
      

     $pc=$pcs;
     $lb=$lbr;
     $sh=$sht;
     $k=$kg;
 }
 ?>


                    <td style="text-align:center;"><?= $sisa; ?></td>
                    <td style="text-align:center;"><?= $pc; ?></td>
                    <td style="text-align:center;"><?= ceil($lb); ?></td>
                    <td style="text-align:center;"><?= ceil($sh); ?></td>
                    <td style="text-align:center;"><?= ceil($k); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        

        <script>
     $(document).ready(function() {
         var table = $('#tabul').DataTable( {
             scrollY : true,
             scrollX : true,
             scrollCollapse : true
         } );
     } );
        </script>
        <script type="text/javascript">
</script>  
