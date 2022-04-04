<?php

namespace App\Models;

use CodeIgniter\Model;
class RevisicustModel extends Model
{
  protected $table = 'history_pocust';
  
  protected $allowedFields = ['nama_customer','idpoasli','tgl_po','revisi_po','id_part','qty_pcs','updated_at'];


  
  public function getRevisi($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }

  public function getRevisipo($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['idpoasli'=>$id])->findAll();
  }

}