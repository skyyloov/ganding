<?php

namespace App\Models;

use CodeIgniter\Model;

class FinishgoodModel extends Model
{
  protected $table = 'finishgood';
  protected $allowedFields = ['id_part','id_fg','qty_need'];


  
  public function getFinishgood($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }

  public function getFinish($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id_fg'=>$id])->findAll();
  }

  public function getFinishpart($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id_part'=>$id])->findAll();
  }

}