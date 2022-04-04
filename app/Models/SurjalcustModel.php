<?php

namespace App\Models;

use CodeIgniter\Model;
class SurjalcustModel extends Model
{
  protected $table = 'surjalcust';
  protected $allowedFields = ['idpo','nosurjal','tgl','qty','id_customer'];


  
  public function getSurjalcust($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }

  public function getPosurjal($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['idpo'=>$id])->findAll();
  }

}