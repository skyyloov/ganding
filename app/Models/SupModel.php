<?php

namespace App\Models;

use CodeIgniter\Model;

class SupModel extends Model
{
  protected $table = 'supplier';
  protected $allowedFields = ['nama_supplier','alamat','kontak','person','email'];


  
  public function getSup($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }

 
}