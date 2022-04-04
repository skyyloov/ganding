<?php

namespace App\Models;

use CodeIgniter\Model;

class Proses3Model extends Model
{
  protected $table = 'proses3';
  protected $allowedFields = ['id_part','nama_part','nama_proses','plan3','act_proses3'];


  
  public function getProses3($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }

  public function getProcess3($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id_part'=>$id])->findAll();
  }

}