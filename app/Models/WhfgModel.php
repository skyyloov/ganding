<?php

namespace App\Models;

use CodeIgniter\Model;
class WhfgModel extends Model
{
  protected $table = 'warehousefg';
  protected $allowedFields = ['id_part','id_fg','nama_part','qty','keterangan'];


  
  public function getFg($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }

  public function getWhfg($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id_part'=>$id])->findAll();
  }

  public function getWhfgpart($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id_part'=>$id])->findAll();
  }


    public function getWhfinishgood($id = false )
  {
    if ($id == false) {
      return $this->where(['keterangan'=>""])->findAll();
    }

    return $this->where(['keterangan'=>$id])->findAll();
  }
  
   public function getWhsubcont($id = false )
  {
    if ($id == false) {
      return $this->where(['keterangan'=>""])->findAll();
    }

    return $this->where(['id_part'=>$id,'keterangan'=>""])->findAll();
  }
  
  public function getWhfgkedatangansubcont($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id_part'=>$id,'keterangan'=>'subcont'])->findAll();
  }

}