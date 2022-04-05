<?= $this->extend('layout/tampil'); ?>
<?= $this->Section('contet'); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="col">
        <?php if(session()->getFlashdata('pesan')){ ?>
  <div class="alert alert-danger" role="alert">
  <?= session()->getFlashdata('pesan'); ?>
</div>
  <?php }elseif (session()->getFlashdata('pesanberhasil')) {?>
    <div class="alert alert-info" role="alert">
  <?= session()->getFlashdata('pesanberhasil'); ?>
</div>
    <?php } ?>

                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin">
                                 <i class="fa fa-tasks fa-2x"></i>
                                 <label>     
                                <span style="font-size:20px;">Production</span>
                                </label> 
                                 </div>
                              </div>
                              <div class="full inner_elements">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="tab_style1">
                                          <div class="tabbar padding_infor_info">
                                             <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                   <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Part Stock</a>
                                                   <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Stamping Process</a>
                                                   <a class="nav-item nav-link" id="nav-assy-tab" data-toggle="tab" href="#nav-assy" role="tab" aria-controls="nav-assy" aria-selected="false">Assembly Process</a>
                                                   <a class="nav-item nav-link disabled" id="nav-schedule-tab" data-toggle="tab" href="#nav-schedule" role="tab" aria-controls="nav-schedule" aria-selected="false">Production Schedule</a>
                                                   <a class="nav-item nav-link" id="nav-wip-tab" data-toggle="tab" href="#nav-wip" role="tab" aria-controls="nav-wip" aria-selected="false">Stock WIP(All)</a>
                                                </div>
                                             </nav>
                                             <div class="tab-content" id="nav-tabContent">
                                                 <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                     <div class="row">
                                                         <form action="">
                                                             <div class="form-group col-md-6">
                                                                 <label for="nama_customer">Part Name</label>
                                                                 <select class="form-control" name="nama_customer" id="part" required>
                                                                     <option value="0">~Pilih Part~</option>
                                                                     <?php
                     $koneksi = mysqli_connect('localhost','root','','ganding');
                      $query =  mysqli_query($koneksi, "select * from part");
                      $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                      foreach ($hasil as $item){ ?>
                            <option value="<?php echo $item["id"];?>"><?php echo $item['nama_part'].' | '.$item['kode_part'];?></option> 
                           <?php  } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4 customer" >
                        <label for="nama_customer">Customer Name</label>
                        <select class="form-control" name="nama_customer" id="" required>
                            <option value="" selected="true" disabled="disabled" >Customer Name</option>
                        </select>
                    </div>
                </form>
            </div>
            
            <div class="row stok">
                
            </div>                                              
                                                </div>



                                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                <div class="col">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                 </div>
                              </div>
                              <div class="full inner_elements">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="tab_style3">
                                          <div class="tabbar padding_infor_info">
                                             <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Proses1</a>
                                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Proses2</a>
                                                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Proses3</a>
                                                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Proses4</a>
                                                <a class="nav-link" id="v-pills-proses5-tab" data-toggle="pill" href="#v-pills-proses5" role="tab" aria-controls="v-pills-proses5" aria-selected="false">Proses5</a>
                                                <a class="nav-link" id="v-pills-proses6-tab" data-toggle="pill" href="#v-pills-proses6" role="tab" aria-controls="v-pills-proses6" aria-selected="false">Proses6</a>
                                                <a class="nav-link" id="v-pills-proses7-tab" data-toggle="pill" href="#v-pills-proses7" role="tab" aria-controls="v-pills-proses7" aria-selected="false">Proses7</a>
                                             </div>
                                             <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

                                                    <a href="<?= base_url('/laporanproduksi/1'); ?>" class="btn btn-xs btn-danger" style="float:left;">Laporan Produksi</a>
                                                    <div class="table-responsive">
                                                    <table class="table table-bordered table-hover" id="proses1">
                                                        <thead class="table-primary">
            <tr>    
                <th scope="col" style="text-align:center; width:1%;">ID</th>
                <th scope="col" style="text-align:center;">Part Name</th>
                <th scope="col" style="text-align:center;">Process Name</th>
                <th scope="col" style="text-align:center;">Qty Aktual</th>
                <th scope="col" ></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            <?php foreach($proses1 as $a): ?>
            <?php 
                $idpart1 = $a['id_part'];
            $koneksi = mysqli_connect('localhost','root','','ganding');
                      $querypart1 =  mysqli_query($koneksi, "select * from part where id = $idpart1 ");
                      $hasilpart1 = mysqli_fetch_all($querypart1, MYSQLI_ASSOC); ?>
    <tr>  
        <td style="text-align:center; width:1%;"><?= $a['id_part']; ?></td>
      <td style="text-align:center;"><?= $a['nama_part'].' | '.$hasilpart1[0]['kode_part']; ?></td>
      <td style="text-align:center;"><?= $a['nama_proses']; ?></td>
      <td style="text-align:center;"><?= $a['act_proses1']; ?></td>
      <td><input type="button" id="prosessatu" class="btn btn-xs btn-success" value="Input Data"></td>              
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>

                                                </div>
                                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                <a href="<?= base_url('/laporanproduksi/2'); ?>" class="btn btn-xs btn-danger" style="float:left;">Laporan Produksi</a>
                                                <div class="table-responsive">
                                                <table class="table table-bordered table-hover" id="proses2">
        <thead class="table-primary">
            <tr>    
                <th scope="col" style="text-align:center; width:1%;">ID</th>
                <th scope="col" style="text-align:center;">Part Name</th>
                <th scope="col" style="text-align:center;">Process Name</th>
                <th scope="col" style="text-align:center;">Qty In</th>
                <th scope="col" style="text-align:center;">Qty Out</th>
                <th scope="col" ></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            <?php foreach($proses2 as $a): ?>
            <?php  $idpart2 = $a['id_part'];
            $koneksi = mysqli_connect('localhost','root','','ganding');
                      $querypart2 =  mysqli_query($koneksi, "select * from part where id = $idpart2 ");
                      $hasilpart2 = mysqli_fetch_all($querypart2, MYSQLI_ASSOC);  ?>
    <tr>  
        <td style="text-align:center; width:1%;"><?= $a['id_part']; ?></td>
      <td style="text-align:center;"><?= $a['nama_part'].' | '.$hasilpart2[0]['kode_part']; ?></td>
      <td style="text-align:center;"><?= $a['nama_proses']; ?></td>
      <td style="text-align:center;"><?= $a['plan2']; ?></td>
      <td style="text-align:center;"><?= $a['act_proses2']; ?></td>
      <td><input type="button" id="prosesdua" class="btn btn-xs btn-success" value="Input Data"></td>              
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                <a href="<?= base_url('/laporanproduksi/3'); ?>" class="btn btn-xs btn-danger" style="float:left;">Laporan Produksi</a>
                                                <div class="table-responsive">
                                                <table class="table table-bordered table-hover" id="proses3">
        <thead class="table-primary">
            <tr>    
                <th scope="col" style="text-align:center; width:1%;">ID</th>
                <th scope="col" style="text-align:center;">Part Name</th>
                <th scope="col" style="text-align:center;">Process Name</th>
                <th scope="col" style="text-align:center;">Qty In</th>
                <th scope="col" style="text-align:center;">Qty Out</th>
                <th scope="col" ></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            <?php foreach($proses3 as $a): ?>
             <?php  $idpart3 = $a['id_part'];
            $koneksi = mysqli_connect('localhost','root','','ganding');
                      $querypart3 =  mysqli_query($koneksi, "select * from part where id = $idpart3 ");
                      $hasilpart3 = mysqli_fetch_all($querypart3, MYSQLI_ASSOC);  ?>
    <tr>  
        <td style="text-align:center; width:1%;"><?= $a['id_part']; ?></td>
      <td style="text-align:center;"><?= $a['nama_part'].' | '.$hasilpart3[0]['kode_part']; ?></td>
      <td style="text-align:center;"><?= $a['nama_proses']; ?></td>
      <td style="text-align:center;"><?= $a['plan3']; ?></td>
      <td style="text-align:center;"><?= $a['act_proses3']; ?></td>
      <td><input type="button" id="prosestiga" class="btn btn-xs btn-success" value="Input Data"></td>              
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                                <a href="<?= base_url('/laporanproduksi/4'); ?>" class="btn btn-xs btn-danger" style="float:left;">Laporan Produksi</a>
                                                <div class="table-responsive">
                                                <table class="table table-bordered table-hover" id="proses4">
        <thead class="table-primary">
            <tr>    
                <th scope="col" style="text-align:center; width:1%;">ID</th>
                <th scope="col" style="text-align:center;">Part Name</th>
                <th scope="col" style="text-align:center;">Process Name</th>
                <th scope="col" style="text-align:center;">Qty In</th>
                <th scope="col" style="text-align:center;">Qty Out</th>
                <th scope="col" ></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            <?php foreach($proses4 as $a): ?>
             <?php  $idpart4 = $a['id_part'];
            $koneksi = mysqli_connect('localhost','root','','ganding');
                      $querypart4 =  mysqli_query($koneksi, "select * from part where id = $idpart4 ");
                      $hasilpart4 = mysqli_fetch_all($querypart4, MYSQLI_ASSOC);  ?>
    <tr>  
        <td style="text-align:center; width:1%;"><?= $a['id_part']; ?></td>
      <td style="text-align:center;"><?= $a['nama_part'].' | '.$hasilpart4[0]['kode_part']; ?></td>
      <td style="text-align:center;"><?= $a['nama_proses']; ?></td>
      <td style="text-align:center;"><?= $a['plan4']; ?></td>
      <td style="text-align:center;"><?= $a['act_proses4']; ?></td>
      <td><input type="button" id="prosesempat" class="btn btn-xs btn-success" value="Input Data"></td>              
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-proses5" role="tabpanel" aria-labelledby="v-pills-proses5-tab">
                                                <a href="<?= base_url('/laporanproduksi/5'); ?>" class="btn btn-xs btn-danger" style="float:left;">Laporan Produksi</a>
                                                <div class="table-responsive">
                                                <table class="table table-bordered table-hover" id="proses5">
        <thead class="table-primary">
            <tr>    
                <th scope="col" style="text-align:center; width:1%;">ID</th>
                <th scope="col" style="text-align:center;">Part Name</th>
                <th scope="col" style="text-align:center;">Process Name</th>
                <th scope="col" style="text-align:center;">Qty In</th>
                <th scope="col" style="text-align:center;">Qty Out</th>
                <th scope="col" ></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            <?php foreach($proses5 as $a): ?>
             <?php  $idpart5 = $a['id_part'];
            $koneksi = mysqli_connect('localhost','root','','ganding');
                      $querypart5 =  mysqli_query($koneksi, "select * from part where id = $idpart5 ");
                      $hasilpart5 = mysqli_fetch_all($querypart5, MYSQLI_ASSOC);  ?>
    <tr>  
        <td style="text-align:center; width:1%;"><?= $a['id_part']; ?></td>
      <td style="text-align:center;"><?= $a['nama_part'].' | '.$hasilpart5[0]['kode_part']; ?></td>
      <td style="text-align:center;"><?= $a['nama_proses']; ?></td>
      <td style="text-align:center;"><?= $a['plan5']; ?></td>
      <td style="text-align:center;"><?= $a['act_proses5']; ?></td>
      <td><input type="button" id="proseslima" class="btn btn-xs btn-success" value="Input Data"></td>              
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-proses6" role="tabpanel" aria-labelledby="v-pills-proses6-tab">
                                                <a href="<?= base_url('/laporanproduksi/6'); ?>" class="btn btn-xs btn-danger" style="float:left;">Laporan Produksi</a>
                                                <div class="table-responsive">
                                                <table class="table table-bordered table-hover" id="proses6">
        <thead class="table-primary">
            <tr>    
                <th scope="col" style="text-align:center; width:1%;">ID</th>
                <th scope="col" style="text-align:center;">Part Name</th>
                <th scope="col" style="text-align:center;">Process Name</th>
                <th scope="col" style="text-align:center;">Qty In</th>
                <th scope="col" style="text-align:center;">Qty Out</th>
                <th scope="col" ></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            <?php foreach($proses6 as $a): ?>
             <?php  $idpart6 = $a['id_part'];
            $koneksi = mysqli_connect('localhost','root','','ganding');
                      $querypart6 =  mysqli_query($koneksi, "select * from part where id = $idpart6 ");
                      $hasilpart6 = mysqli_fetch_all($querypart6, MYSQLI_ASSOC);  ?>
    <tr>  
        <td style="text-align:center; width:1%;"><?= $a['id_part']; ?></td>
      <td style="text-align:center;"><?= $a['nama_part'].' | '.$hasilpart6[0]['kode_part']; ?></td>
      <td style="text-align:center;"><?= $a['nama_proses']; ?></td>
      <td style="text-align:center;"><?= $a['plan6']; ?></td>
      <td style="text-align:center;"><?= $a['act_proses6']; ?></td>
      <td><input type="button" id="prosesenam" class="btn btn-xs btn-success" value="Input Data"></td>              
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-proses7" role="tabpanel" aria-labelledby="v-pills-proses7-tab">
                                                <a href="<?= base_url('/laporanproduksi/7'); ?>" class="btn btn-xs btn-danger" style="float:left;">Laporan Produksi</a>
                                                <div class="table-responsive">
                                                <table class="table table-bordered table-hover" id="proses7">
        <thead class="table-primary">
            <tr>    
                <th scope="col" style="text-align:center; width:1%;">ID</th>
                <th scope="col" style="text-align:center;">Part Name</th>
                <th scope="col" style="text-align:center;">Process Name</th>
                <th scope="col" style="text-align:center;">Qty In</th>
                <th scope="col" style="text-align:center;">Qty Out</th>
                <th scope="col" ></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            <?php foreach($proses7 as $a): ?>
             <?php  $idpart7 = $a['id_part'];
            $koneksi = mysqli_connect('localhost','root','','ganding');
                      $querypart7 =  mysqli_query($koneksi, "select * from part where id = $idpart7 ");
                      $hasilpart7 = mysqli_fetch_all($querypart7, MYSQLI_ASSOC);  ?>
    <tr>  
        <td style="text-align:center; width:1%;"><?= $a['id_part']; ?></td>
      <td style="text-align:center;"><?= $a['nama_part'].' | '.$hasilpart7[0]['kode_part']; ?></td>
      <td style="text-align:center;"><?= $a['nama_proses']; ?></td>
      <td style="text-align:center;"><?= $a['plan7']; ?></td>
      <td style="text-align:center;"><?= $a['act_proses7']; ?></td>
      <td><input type="button" id="prosestujuh" class="btn btn-xs btn-success" value="Input Data"></td>              
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
                              </div>
                           </div>
                        </div>


                                                </div>



                                                <div class="tab-pane fade" id="nav-assy" role="tabpanel" aria-labelledby="nav-assy-tab">
                                                <div class="col">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                              </div>
                              <div class="full inner_elements">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="tab_style3">
                                          <div class="tabbar padding_infor_info">
                                             <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active" id="v-pills-spot-tab" data-toggle="pill" href="#v-pills-spot" role="tab" aria-controls="v-pills-spot" aria-selected="true">Spot1</a>
                                                <a class="nav-link" id="v-pills-spot2-tab" data-toggle="pill" href="#v-pills-spot2" role="tab" aria-controls="v-pills-spot2" aria-selected="true">Spot2</a>
                                                <a class="nav-link" id="v-pills-weld-tab" data-toggle="pill" href="#v-pills-weld" role="tab" aria-controls="v-pills-weld" aria-selected="false">Welding</a>
                                             </div>
                                             
                                             <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-spot" role="tabpanel" aria-labelledby="v-pills-spot-tab">
                                                <a href="<?= base_url('/laporanproduksi/spot1'); ?>" class="btn btn-xs btn-danger" style="float:left;">Laporan Produksi</a>
                                                <div class="table-responsive">
                                                <table class="table table-bordered table-hover" id="spot">
        <thead class="table-primary">
            <tr>    
                <th scope="col" style="text-align:center; width:1%;">ID</th>
                <th scope="col" style="text-align:center;">Part Name</th>
                <th scope="col" style="text-align:center;">Process Name</th>
                <th scope="col" style="text-align:center;">Qty In</th>
                <th scope="col" style="text-align:center;">Qty Out</th>
                <th scope="col" ></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            <?php foreach($spot as $a): ?>
    <tr>  
        <td style="text-align:center; width:1%;"><?= $a['id_part']; ?></td>
      <td style="text-align:center;"><?= $a['nama_part']; ?></td>
      <td style="text-align:center;"><?= $a['nama_proses']; ?></td>
      <td style="text-align:center;"><?= $a['qty_in']; ?></td>
      <td style="text-align:center;"><?= $a['qty_out']; ?></td>
      <td><input type="button" id="prosesspot" class="btn btn-xs btn-success" value="Input Data"></td>              
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>
                                                </div>
                                                
   <div class="tab-pane fade" id="v-pills-spot2" role="tabpanel" aria-labelledby="v-pills-spot2-tab">
                                                <a href="<?= base_url('/laporanproduksi/spot2'); ?>" class="btn btn-xs btn-danger" style="float:left;">Laporan Produksi</a>
                                                <div class="table-responsive">
                                                <table class="table table-bordered table-hover" id="spot2">
        <thead class="table-primary">
            <tr>    
                <th scope="col" style="text-align:center; width:1%;">ID</th>
                <th scope="col" style="text-align:center;">Part Name</th>
                <th scope="col" style="text-align:center;">Process Name</th>
                <th scope="col" style="text-align:center;">Qty In</th>
                <th scope="col" style="text-align:center;">Qty Out</th>
                <th scope="col" ></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            <?php foreach($spot2 as $h): ?>
    <tr>  
        <td style="text-align:center; width:1%;"><?= $h['id_part']; ?></td>
      <td style="text-align:center;"><?= $h['nama_part']; ?></td>
      <td style="text-align:center;"><?= $h['nama_proses']; ?></td>
      <td style="text-align:center;"><?= $h['qty_in']; ?></td>
      <td style="text-align:center;"><?= $h['qty_out']; ?></td>
      <td><input type="button" id="prosesspot2" class="btn btn-xs btn-success" value="Input Data"></td>              
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>
                                                </div>
                                                
                                                
                                                <div class="tab-pane fade" id="v-pills-weld" role="tabpanel" aria-labelledby="v-pills-weld-tab">
                                                    
                                                
<div class="container">
   <div class="row">
      <div class="col-md-5">
          <form action="">
              <div class="form-row" id="delivery">
                  <div class="form-group col-md-6">
                      <label for="nama_customer">Nama Produk Assy Weld</label>
                        <select class="form-control" name="nama_customer" id="welding" required>
                        <option value="0">-Pilih Produk</option>
                        <?php
                     $koneksi = mysqli_connect('localhost','root','','ganding');
                      $query =  mysqli_query($koneksi, "select * from welding");
                      $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                      foreach ($hasil as $item){ ?>
                            <option value="<?php echo $item["id"];?>"><?php echo $item['nama_fg'];?></option> 
                            <?php  } ?>
                        </select>
                    </div>     
                        <div class="form-group col-md-4">
                            <input type="button" class="btn btn-xs btn-danger" value="Tambah Produk Welding" id="tambahweld" >
                        </div>
                
                </div>
</form>

<div class="weld">

</div>

      </div>
      <div class="col-md-4">
      <a><i class="fas fa-check"></i> <span>Make FinishGood</span></a> 

      <form action="<?= base_url('/production/inputassy'); ?>" method = "POST" class="mt-3">
          <div class="form-row">
          <div class="form-group col-md-6">
                      <label for="idfg">Produk Assy Weld</label>
                        <select class="form-control" name="idfg" id="welding" required>
                        <option value="">-Pilih Produk</option>
                        <?php
                     $koneksi = mysqli_connect('localhost','root','','ganding');
                      $query =  mysqli_query($koneksi, "select * from welding");
                      $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                      foreach ($hasil as $item){ ?>
                            <option value="<?php echo $item["id"];?>"><?php echo $item['nama_fg'];?></option> 
                            <?php  } ?>
                        </select>
                    </div> 
                    <div class="form-group col-md-4">
                       <label for="qty">Quantity</label>
                       <input type="text" class="form-control" autocomplete="off" id="qty" required value="" name="qty">
                    </div>
                    
          </div>
          <button  type="submit" name="submit" class="btn btn-xs btn-success">Buat FG</button>
      </form>


      </div>
   </div>
</div>

                                                </div>
                                                
                                                
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                                                </div>


                                                <div class="tab-pane fade" id="nav-wip" role="tabpanel" aria-labelledby="nav-wip-tab">
                        
                                                <div class="row">
                                                    <div class="col">


                                                    <form action="">
                                                             <div class="form-group col-md-6">
                                                                 <label for="nama_customer">Pilih Customer</label>
                                                                 <select class="form-control" name="nama_customer" id="customer" required>
                                                                     <option value="0">~Pilih Customer~</option>
                                                                     <?php
                     $koneksi = mysqli_connect('localhost','root','','ganding');
                      $query =  mysqli_query($koneksi, "select * from customer");
                      $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                      foreach ($hasil as $item){ ?>
                            <option value="<?php echo $item["id"];?>"><?php echo $item['nama_customer'];?></option> 
                           <?php  } ?>
                        </select>
                    </div>
                </form>
                                                    </div>
                                                </div>
                                                
                                     <div class="row wip">
                                    
                                     <div class="alert alert-danger" role="alert">
                                    <?= "Data WIP"; ?>
                                            </div>
                                            
                                     </div>
                                                
                                                </div>
<?php //akhir navbar dibawahnya schedule produksi ?>
                                                <div class="tab-pane fade" id="nav-schedule" role="tabpanel" aria-labelledby="nav-schedule-tab">
<div class="contaier">
<div class="row">
<?php $koneksi = mysqli_connect('localhost','root','','ganding');
                      $queryproduksi =  mysqli_query($koneksi, "select * from po where status = 'belum close' ");
                      $hasilproduksi = mysqli_fetch_all($queryproduksi, MYSQLI_ASSOC);
                      $hitungproduksi = mysqli_num_rows($queryproduksi); ?>



<?php if($hitungproduksi > 0){ ?>
    <div class="col-md-4">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                       Schedule Recommendation
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">

                    <ul class="list-group list-group-flush" id="produksi">
                        
                    <?php foreach($hasilproduksi as $p){
    $idpoo = $p['id'];
    $idpartzs =$p['id_part'];
    $code = $p['no_po'];
    $namapart = $p['nama_part'];

    $querydeliv =  mysqli_query($koneksi, "select * from scheduledelivery where id_part = $idpartzs and status = 'belum close' ");
                      $hasildeliv = mysqli_fetch_all($querydeliv, MYSQLI_ASSOC);
                      $hitungdeliv = mysqli_num_rows($querydeliv);

if ($hitungdeliv > 0) {
    $qtyaman = (int) $hasildeliv[0]['qty'];
    $qtyamanfinal = $qtyaman * 3;
}elseif($hitungdeliv < 1 ) {
    $qtyamanfinal = 0;
}

$querywhfg =  mysqli_query($koneksi, "select * from warehousefg where id_part = $idpartzs ");
                      $hasilwhfg = mysqli_fetch_all($querywhfg, MYSQLI_ASSOC);
                      $hitungwhfg = mysqli_num_rows($querywhfg);

                      if ($hitungwhfg > 0) {
                          $stokwhfg = (int) $hasilwhfg[0]['qty'];
                      }elseif($hitungwhfg < 1) {
                          $stokwhfg = 0;
                      }
                      $querywhmaterial =  mysqli_query($koneksi, "select * from warehouse where kodepart = '$code' ");
                      $hasilwhmaterial = mysqli_fetch_all($querywhmaterial, MYSQLI_ASSOC);
                      $hitungwhmaterial = mysqli_num_rows($querywhmaterial);

                      if ($hitungwhmaterial > 0 ) {
                          $qtystokmaterial = (int) $hasilwhmaterial[0]['total_qty'];
                      }elseif ($hitungwhmaterial < 1) {
                          $qtystokmaterial = (int) 0 ;
                      }

 $querystokfp =  mysqli_query($koneksi, "select * from proses where id_part = $idpartzs ");
                      $hasilstokfp = mysqli_fetch_all($querystokfp, MYSQLI_ASSOC);
                      $hitungstokfp = mysqli_num_rows($querystokfp);

                      if ($hitungstokfp > 0) {
                        $qtyin = (int) $hasilstokfp[0]['qty_in'];
                        $qtyout = (int) $hasilstokfp[0]['qty_out'];
                        if ($qtyin > $qtyout) {
                          $distok = $qtyin - $qtyout;
                        }else {
                            $distok = 0;
                        }
      
                      }else {
                          $distok = 0;
                      }
                      
                      $jadi = $stokwhfg + $distok;

                   if ($jadi < $qtyamanfinal && $qtystokmaterial !== 0) {
                       $araiidpart[] = $idpartzs;
                   }else {
                       $araiidpart = [];
                   }   


                     } ?>


    <?php 
        $itungarai = count($araiidpart);
        for ($w=0; $w < $itungarai ; $w++) {  ?>
        <?php $idpartschedule = $araiidpart[$w];
             $querypartschedule =  mysqli_query($koneksi, "select * from part where id = $idpartschedule ");
             $hasilpartschedule = mysqli_fetch_all($querypartschedule, MYSQLI_ASSOC);
             $hitungpartschedule = mysqli_num_rows($querypartschedule); ?>

  <li onmouseover="this.style.cursor='pointer';" value="<?= $hasilpartschedule[0]['id']; ?>" class="list-group-item produksi" id="pilihschedule"><?= $hasilpartschedule[0]['nama_part']; ?></li>
  <?php } ?>
  
</ul>

</div>
</div>
</div>

</div>

<?php }elseif ($hitungproduksi < 1) {?>
    <div class="col-md-4">

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Schedule Recommendation
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="alert alert-info" role="alert">
                            <?= "Tidak Ada Rekomendasi"; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
        
                        


    </div>

<div class="col-md-1">

</div>

    <div class="col-md-6">
    
    <i class="fa fa-book fa-1x"></i> <span style="font-size:15px;">Schedule</span>
                        <table class="table table-bordered table-hover" id="jadwal">
        <thead class="table-primary">
            <tr>    
                <th scope="col" style="text-align:center; width:1%;">ID</th>
                <th scope="col" style="text-align:center;">Part Name</th>
                <th scope="col" style="text-align:center;">Process Name</th>
                <th scope="col" style="text-align:center;">Quantity Plan</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            <?php foreach($jadwal as $a): ?>
                <?php
                    $idpartjadwal = $a['id_part'];
                    $prosez = $a['proses'];
                    $prsz = 'proses'.$prosez; ?>
                    <?php if($prsz == 'proses8'){
                        $prsz = 'spot';
                    } ?>
                <?php  $koneksi = mysqli_connect('localhost','root','','ganding');
                      $queryjadwal =  mysqli_query($koneksi, "select * from $prsz where id_part = $idpartjadwal ");
                      $hasiljadwal = mysqli_fetch_all($queryjadwal, MYSQLI_ASSOC); ?>
    <tr>  
        <td style="text-align:center; width:1%;"><?= $a['id']; ?></td>
      <td style="text-align:center;"><?= $hasiljadwal[0]['nama_part']; ?></td>
      <td style="text-align:center;"><?= $hasiljadwal[0]['nama_proses']; ?></td>
      <td style="text-align:center;"><?= $a['qty']; ?></td>              
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







        </div>
    </div>
</div>



<script type="text/javascript">
$(document).ready(function(){
    $('#welding').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    //Added with the EDIT
    var data = $option.val();//to get content of "value" attrib
    console.log(data)
    $('.weld').load('<?= base_url('/welding.php?id='); ?>' + data);  
});
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('#part').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    //Added with the EDIT
    var data = $option.val();//to get content of "value" attrib
    console.log(data)
    $('.customer').load('<?= base_url('/customer.php?id='); ?>' + data);  
    $('.stok').load('<?= base_url('/stok.php?id='); ?>' + data);
});
});
</script>

<script type="text/javascript">
$(document).ready(function(){
   let table = $('#proses1').DataTable();
   $('#proses1 tbody').on( 'click', '#prosessatu', function () {
	        var current_row = $(this).parents('tr');
	        if (current_row.hasClass('child')) {
	            current_row = current_row.prev();
	        }
           
           var data = table.row( current_row ).data();
	        console.log(data)
    $('.modal').load('<?= base_url('/proses1.php?idproses1='); ?>' + data[0]);  
    $("#viewModal").modal("toggle");
   });
   
});
</script> 

<script type="text/javascript">
$(document).ready(function(){
   let table = $('#proses2').DataTable();
   $('#proses2 tbody').on( 'click', '#prosesdua', function () {
	        var current_row = $(this).parents('tr');
	        if (current_row.hasClass('child')) {
	            current_row = current_row.prev();
	        }
           
           var data = table.row( current_row ).data();
	        console.log(data)
    $('.modal').load('<?= base_url('/proses1.php?idproses2='); ?>' + data[0]);  
    $("#viewModal").modal("toggle");
   });
   
});
</script> 

<script type="text/javascript">
$(document).ready(function(){
   let table = $('#proses3').DataTable();
   $('#proses3 tbody').on( 'click', '#prosestiga', function () {
	        var current_row = $(this).parents('tr');
	        if (current_row.hasClass('child')) {
	            current_row = current_row.prev();
	        }
           
           var data = table.row( current_row ).data();
	        console.log(data)
    $('.modal').load('<?= base_url('/proses1.php?idproses3='); ?>' + data[0]);  
    $("#viewModal").modal("toggle");
   });
   
});
</script> 

<script type="text/javascript">
$(document).ready(function(){
   let table = $('#proses4').DataTable();
   $('#proses4 tbody').on( 'click', '#prosesempat', function () {
	        var current_row = $(this).parents('tr');
	        if (current_row.hasClass('child')) {
	            current_row = current_row.prev();
	        }
           
           var data = table.row( current_row ).data();
	        console.log(data)
    $('.modal').load('<?= base_url('/proses1.php?idproses4='); ?>' + data[0]);  
    $("#viewModal").modal("toggle");
   });
   
});
</script> 

<script type="text/javascript">
$(document).ready(function(){
   let table = $('#proses5').DataTable();
   $('#proses5 tbody').on( 'click', '#proseslima', function () {
	        var current_row = $(this).parents('tr');
	        if (current_row.hasClass('child')) {
	            current_row = current_row.prev();
	        }
           
           var data = table.row( current_row ).data();
	        console.log(data)
    $('.modal').load('<?= base_url('/proses1.php?idproses5='); ?>' + data[0]);  
    $("#viewModal").modal("toggle");
   });
   
});
</script> 

<script type="text/javascript">
$(document).ready(function(){
   let table = $('#proses6').DataTable();
   $('#proses6 tbody').on( 'click', '#prosesenam', function () {
	        var current_row = $(this).parents('tr');
	        if (current_row.hasClass('child')) {
	            current_row = current_row.prev();
	        }
           
           var data = table.row( current_row ).data();
	        console.log(data)
    $('.modal').load('<?= base_url('/proses1.php?idproses6='); ?>' + data[0]);  
    $("#viewModal").modal("toggle");
   });
   
});
</script> 

<script type="text/javascript">
$(document).ready(function(){
   let table = $('#proses7').DataTable();
   $('#proses7 tbody').on( 'click', '#prosestujuh', function () {
	        var current_row = $(this).parents('tr');
	        if (current_row.hasClass('child')) {
	            current_row = current_row.prev();
	        }
           
           var data = table.row( current_row ).data();
	        console.log(data)
    $('.modal').load('<?= base_url('/proses1.php?idproses7='); ?>' + data[0]);  
    $("#viewModal").modal("toggle");
   });
   
});
</script> 

<script type="text/javascript">
$(document).ready(function(){
   let table = $('#spot').DataTable();
   $('#spot tbody').on( 'click', '#prosesspot', function () {
	        var current_row = $(this).parents('tr');
	        if (current_row.hasClass('child')) {
	            current_row = current_row.prev();
	        }
           
           var data = table.row( current_row ).data();
	        console.log(data)
    $('.modal').load('<?= base_url('/proses1.php?idprosesspot='); ?>' + data[0]);  
    $("#viewModal").modal("toggle");
   });
   
});
</script> 
<script type="text/javascript">
$(document).ready(function(){
   let table = $('#spot2').DataTable();
   $('#spot2 tbody').on( 'click', '#prosesspot2', function () {
	        var current_row = $(this).parents('tr');
	        if (current_row.hasClass('child')) {
	            current_row = current_row.prev();
	        }
           
           var data = table.row( current_row ).data();
	        console.log(data)
    $('.modal').load('<?= base_url('/proses1.php?idprosesspot2='); ?>' + data[0]);  
    $("#viewModal").modal("toggle");
   });
   
});
</script> 


<script type="text/javascript">
$(document).ready(function(){
   let table = $('#jadwal').DataTable();
   
});
</script> 

<script type="text/javascript">
$(document).ready(function(){
   $('#tambahweld').on( 'click', function () {
	        var data = $('#tambahweld').val();
    $('.modal').load('<?= base_url('/tambahweld.php'); ?>');  
    $("#viewModal").modal("toggle");
   });
   
});
</script> 

<script type="text/javascript">
$(document).ready(function(){
    $('#produksi').on( 'click', '.produksi', function () {
	        var idval = $(this).val();
    $('.modal').load('<?= base_url('/inputschedule.php?idpart='); ?>' + idval);  
    $("#viewModal").modal("toggle");
   });
   
});
</script> 


<script type="text/javascript">
$(document).ready(function(){
    $('#customer').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    //Added with the EDIT
    var data = $option.val();//to get content of "value" attrib
    console.log(data)
    $('.wip').load('<?= base_url('/wip.php?id='); ?>' + data);  
});
});
</script>  

<?= $this->endSection(); ?>