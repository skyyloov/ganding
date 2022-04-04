<?php

namespace App\Models;

use CodeIgniter\Model;
class SpotModel extends Model
{
  protected $table = 'spot';
  protected $allowedFields = ['id_part','nama_part','nama_proses','qty_in','qty_out','keterangan'];


  
  public function getSpot($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }

  public function getSpotz($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id_part'=>$id])->findAll();
  }

  public function getSpotdelete($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id_part'=>$id])->findAll();
  }
  
  public function getSpot1($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id_part'=>$id,'keterangan'=>'spot1'])->findAll();
  }
  
  public function getSpot2($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id_part'=>$id,'keterangan'=>'spot2'])->findAll();
  }
  
  
  public function getSpotall($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['keterangan'=>$id])->findAll();
  }
  
  

}