<?php

namespace App\Models;

use CodeIgniter\Model;

class SurjalsubcontModel extends Model
{
  protected $table = 'surjalsubcont';
  protected $allowedFields = ['id_part','quantity','nomorsurjal','no_po_supplier','id_supplier','tgl'];


  
  public function getSurjalsubcont($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }

 
}