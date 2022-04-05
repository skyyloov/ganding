<?= $this->extend('layout/tampil'); ?>
<?= $this->Section('contet'); ?>
<?php  date_default_timezone_set('Asia/Jakarta');
        $date =date('Y-m');  ?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <i class="fa fa-table fa-2x"></i> <label>
                <span style="font-size:25px;">Material Requirement Planning</span>
            </label>
        
<form action="">
<div class="form-row" id="hayolah">
               <div class="form-group col-md-3">
                        <label for="nama_customer">Nama Customer</label>
                        <select class="form-control" name="nama_customer" id="mrp" required>
                        <option value="0">-Pilih Customer</option>
                        <?php
                      $koneksi = mysqli_connect('localhost','root','','ganding');
                        $querycust =  mysqli_query($koneksi, "select * from customer");
                        $hasilcust = mysqli_fetch_all($querycust, MYSQLI_ASSOC);
                        foreach ($hasilcust as $item){ ?>
                            <option value="<?php echo $item["id"];?>"><?php echo $item['nama_customer'];?></option> 
                            <?php  } ?>
                        </select>
                    </div>
                    
<div class="form-group col-md-2">
    <label for="">Pilih Periode Bulan</label>
    <input type="month" id="tgl" name="tgl" value="<?= $date; ?>" class="form-control" >
</div> 

                </div>
            </form>

           
<div class="table-responsive">
    <div class="mrp">
        <table class="table table-bordered table-hover mt-4" id="tabl">
            <thead class="table-dark">
            
            <tr>
                <td colspan="23" style="text-align:right;">Kebutuhan Material</td>
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
                    <th scope="col" style="text-align:center;">Pcs/Lbr</th>
                    <th scope="col" style="text-align:center;">Pcs/Sht</th>
                    <th scope="col" style="text-align:center;">Kg/Sht</th>
                    <th scope="col" style="text-align:center;">Kg/Pcs</th>
                    <th scope="col" style="text-align:center;">Sheet/Lbr</th>
                    <th scope="col" style="text-align:center;">Unit</th>
                    <th scope="col" style="text-align:center;">Stok Material</th>
                    <th scope="col" style="text-align:center;">Konversi (Pcs)</th>
                    <th scope="col" style="text-align:center;">WIP</th>
                    <th scope="col" style="text-align:center;">FG</th>
                    <th scope="col" style="text-align:center;">Stok (Pcs)</th>
                    <th></th>
                    <th scope="col" style="text-align:center;">Pcs </th>
                    <th scope="col" style="text-align:center; width:1%;">Sheet</th>
                    <th scope="col" style="text-align:center;">KG</th>
                </tr>
            </thead>
            <tbody>
                
                
                <tr>  
                    <td style="text-align:center;"></td>
                    <td style="text-align:center;"></td>
                    <td style="text-align:center;"></td>
                    <td style="text-align:center;"></td>
                    <td style="text-align:center;"></td>
                    <td></td>
                    <td style="text-align:center;"></td>
                    <td style="text-align:center;"></td>
                    <td style="text-align:center;"></td>
                    <td style="text-align:center;"></td>
                    <td style="text-align:center;"></td>
                    <td></td>
                    <td style="text-align:center;"></td>
                    <td style="text-align:center;"></td>
                    <td style="text-align:center;"></td>
                    <td style="text-align:center;"></td>
                    <td style="text-align:center;"></td>
                    <td></td>
                    <td></td>
                    <td style="text-align:center;"></td>
                    <td style="text-align:center;"></td>
                    <td style="text-align:center;"></td>
                    <td style="text-align:center;"></td>
                </tr>
                
            </tbody>
        </table>
    </div>
    </div>


</div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    var tanggal = $('#tgl').val();
    let table = $('#tabl').DataTable();
    
$('#hayolah').change(function() {
    var tanggal = $('#tgl').val();
    var data = $(this).find('option:selected').val();

    $('.mrp').load('<?= base_url('/mrpp.php?id='); ?>'+data + '&tgl=' + tanggal );
});

});
</script>  

<?= $this->endSection(); ?>