<?php

namespace App\Models;

use CodeIgniter\Model;
class Proses4Model extends Model
{
  protected $table = 'proses4';
  protected $allowedFields = ['id_part','nama_part','nama_proses','plan4','act_proses4'];


  
  public function getProses4($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }

  public function getProcess4($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id_part'=>$id])->findAll();
  }

}