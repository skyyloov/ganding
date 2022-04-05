<?php $id=$_GET['id']; ?>

<label for="nama_part">Unit Material</label>
                       <select class="form-control" name="unit_material" id="unit" required>
                        <option value="">-Pilih Unit</option>
                        <?php
                      $koneksi = mysqli_connect('localhost','root','','ganding');
                        $query =  mysqli_query($koneksi, "select * from part where id = '$id' ");
                        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
                        foreach ($hasil as $item){ ?>
                            <option value="<?php echo $item["unit_material"];?>"><?php echo $item['unit_material'];?></option> 
                           <?php  } ?>
                    </select>