<?php

namespace App\Models;

use CodeIgniter\Model;

class SurjalModel extends Model
{
  protected $table = 'surjal';
  protected $allowedFields = ['nomor_surjal','id_purchase','id_supplier','info','tgl'];


  
  public function getSurjal($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }

 
}