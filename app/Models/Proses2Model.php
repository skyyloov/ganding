<?php

namespace App\Models;

use CodeIgniter\Model;
class Proses2Model extends Model
{
  protected $table = 'proses2';
  protected $allowedFields = ['id_part','nama_part','nama_proses','plan2','act_proses2'];


  
  public function getProses2($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }

  public function getProcess2($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id_part'=>$id])->findAll();
  }

}