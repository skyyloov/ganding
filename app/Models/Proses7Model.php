<?php

namespace App\Models;

use CodeIgniter\Model;
class Proses7Model extends Model
{
  protected $table = 'proses7';
  protected $allowedFields = ['id_part','nama_part','nama_proses','plan7','act_proses7'];


  
  public function getProses7($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }

  public function getProcess7($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id_part'=>$id])->findAll();
  }

}