<?php

namespace App\Models;

use CodeIgniter\Model;

class Proses1Model extends Model
{
  protected $table = 'proses1';
  protected $allowedFields = ['id_part','nama_part','nama_proses','plan1','act_proses1'];


  
  public function getProses1($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }

  public function getProcess1($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id_part'=>$id])->findAll();
  }

}









