<?php $id = $_GET['id'];
      $nomor = 1; 
      $num = 1;
      $menghitung = 1;
      $menghitung2 = 1;  ?>
      
<?php for($i=0; $i<$id; $i++){ ?>

    <div class="form-group col-md-2">
                        <?php $for = 'proses'.$menghitung++;
                                $for2 = 'proses'.$menghitung2++;  ?>
                        <label for="<?= $for; ?>">Nama Proses <?= $nomor++; ?></label>
                        <?php $nm = 'proses'.$num++; ?>
                        <input type="text" autocomplete="off" class="form-control" name="<?= $nm; ?>" id="<?= $for2; ?>" placeholder="Contoh : Bending ">
                    </div>

<?php } ?>