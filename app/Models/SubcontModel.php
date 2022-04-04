<?php

namespace App\Models;

use CodeIgniter\Model;

class SubcontModel extends Model
{
  protected $table = 'subcont';
  protected $allowedFields = ['id_part','no_po_supplier','quantitykirim','quantitydatang','ng','keterangan','status','id_supplier'];


  
  public function getSubcont($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }
  
  public function getSubcontpart($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id_part'=>$id,'status'=>'belumselesai'])->findAll();
  }

 
}