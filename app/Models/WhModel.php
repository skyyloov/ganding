<?php

namespace App\Models;

use CodeIgniter\Model;

class WhModel extends Model
{
  protected $table = 'warehouse';
  protected $allowedFields = ['nama_customer','nama_supplier','no_po_supplier','kodepart','nama_material','spec','tebal','total_qty','unit','tanggal_datang','id_supplier','id_customer','status'];


  
  public function getWh($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }

  public function getWhpart($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['kodepart'=>$id])->findAll();
  }
 
  public function getWhdelete($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['kodepart'=>$id])->findAll();
  }

}