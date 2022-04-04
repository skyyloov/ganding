<?php

namespace App\Models;

use CodeIgniter\Model;
class Proses6Model extends Model
{
  protected $table = 'proses6';
  protected $allowedFields = ['id_part','nama_part','nama_proses','plan6','act_proses6'];


  
  public function getProses6($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }

  public function getProcess6($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id_part'=>$id])->findAll();
  }

}