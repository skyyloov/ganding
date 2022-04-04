<?php

namespace App\Models;

use CodeIgniter\Model;

class HistorysubcontModel extends Model
{
  protected $table = 'historysubcont';
  protected $allowedFields = ['id_part','no_po_supplier','quantitykirim','quantitydatang','ng','keterangan','status','id_supplier'];


  
  public function getSubcont($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }

  public function getHistorysubcont($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id_part'=>$id])->findAll();
  }

 
}