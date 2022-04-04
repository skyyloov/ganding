<?php

namespace App\Models;

use CodeIgniter\Model;
class HistorysupModel extends Model
{
  protected $table = 'history_posup';
  
  protected $allowedFields = ['tglpo','idpolama','revisi_po','qty_po','tgl_dtg1','qty_dtg1','tgl_dtg2','qty_dtg2'];


  
  public function getHistory($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }

  public function getHistorysup($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['idpolama'=>$id])->findAll();
  }

}