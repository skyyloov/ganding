<?php

namespace App\Models;

use CodeIgniter\Model;
class Proses5Model extends Model
{
  protected $table = 'proses5';
  protected $allowedFields = ['id_part','nama_part','nama_proses','plan5','act_proses5'];


  
  public function getProses5($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }

  public function getProcess5($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id_part'=>$id])->findAll();
  }

}