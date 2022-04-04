<?php

namespace App\Models;

use CodeIgniter\Model;

class PoModel extends Model
{
  protected $table = 'po';
  protected $allowedFields = ['nama_customer','id_customer','no_po','id_part','tgl_po','tglterima_po','revisi_po','nama_part','qty_pcs','deliv_act','outstand_qty','nomor_po','status','schedule'];


  
  public function getPo($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }


  public function getPartz($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id_part'=>$id,'status'=>'belum close'])->findAll();
  }

}