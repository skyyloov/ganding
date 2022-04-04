<?php

namespace App\Models;

use CodeIgniter\Model;

class ProsesModel extends Model
{
  protected $table = 'proses';
  protected $allowedFields = ['id_part','qty_in','qty_out'];


  
  public function getProses($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }
  public function getProcess($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id_part'=>$id])->findAll();
  }


}