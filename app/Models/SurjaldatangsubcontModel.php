<?php

namespace App\Models;

use CodeIgniter\Model;

class SurjaldatangsubcontModel extends Model
{
  protected $table = 'surjaldatangsubcont';
  protected $allowedFields = ['id_part','qty','ng','keterangan','tgl','nomorsurjal','no_po_supplier','idsup'];


  
  public function getSurjaldatangsubcont($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }

 
}