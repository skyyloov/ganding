<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanproduksiModel extends Model
{
  protected $table = 'laporanproduksi';
  protected $allowedFields = ['id_part','proses','quantity','ng','keterangan','tanggal'];


  
  public function getLaporan($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }

  public function getLaps($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['proses'=>$id])->findAll();
  }

 
}