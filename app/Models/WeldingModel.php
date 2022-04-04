<?php

namespace App\Models;

use CodeIgniter\Model;

class WeldingModel extends Model
{
  protected $table = 'welding';
  protected $allowedFields = ['nama_fg','qty','idcustomer','nama_customer'];


  
  public function getWelding($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }

  public function getWelds($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['nama_fg'=>$id])->findAll();
  }
  
}