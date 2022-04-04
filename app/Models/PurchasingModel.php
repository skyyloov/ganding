<?php

namespace App\Models;

use CodeIgniter\Model;

class PurchasingModel extends Model
{
  protected $table = 'purchasing';
  protected $allowedFields = ['nama_customer','no_po','tglkirim_po','revisi_po','nama_part','spec','tebal','nama_supplier','id_supplier','id_customer','qty_po','unit','qty_act','outstanding_qty','no_po_supplier','tgl_dtg1','qty_dtg1','statuspertama','tgl_dtg2','qty_dtg2','statuskedua','status','konfirmasi','konfirmasi1'];


  
  public function getPurchase($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }
}