<?php $id = $_GET['id']; ?>

<?php   $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
                        $query =  mysqli_query($koneksi, "select * from part where id = $id ");
                        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC); ?>
                        <?php $hitung = mysqli_num_rows($query); ?>
<label for="nama_customer">Customer Name</label>
                        <select class="form-control" name="nama_customer" id="" required>
                            <option value="" selected="true" disabled="disabled" ><?= $hitung>0 ? $hasil[0]['nama_customer'] : "Nama_customer"; ?></option>
                        </select>