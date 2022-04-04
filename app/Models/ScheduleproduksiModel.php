<?php

namespace App\Models;

use CodeIgniter\Model;
class ScheduleproduksiModel extends Model
{
  protected $table = 'scheduleproduksi';
  protected $allowedFields = ['id_part','proses','qty','status'];


  
  public function getScheduleproduksi($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }

  public function getJadwalproduksi($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id_part'=>$id])->findAll();
  }

  public function getJadwal($id = false )
  {

    return $this->where(['status'=>'masuk'])->findAll();
  }

}