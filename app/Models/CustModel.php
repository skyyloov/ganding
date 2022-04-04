<?php

namespace App\Models;

use CodeIgniter\Model;

class CustModel extends Model
{
  protected $table = 'customer';
  protected $allowedFields = ['nama_customer','alamat','kontak','email'];


  
  public function getCustomer($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }

 
}