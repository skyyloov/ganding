<?php

namespace App\Models;

use CodeIgniter\Model;

class RencanaModel extends Model
{
  protected $table = 'rencana';
  protected $allowedFields = ['no_po_supplier','description','start_date','end_date','qty1','qty2'];


  
  public function getRenc($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }

 
}