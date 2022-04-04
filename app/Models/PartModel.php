<?php

namespace App\Models;

use CodeIgniter\Model;

class PartModel extends Model
{
  protected $table = 'part';
  protected $allowedFields = ['id_customer','nama_part','kode_part','nama_customer','berat_jenis','kg_sheet','pcs_sheet','kg_pcs','sheet_lembar','spec','tebal','lebar','panjang','proses','pcs_lembar','spot','nut','nut2','unit_material','foto','diameter'];


  
  public function getPart($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }

  public function getPartz($id=false)
  {
    if ($id == false) {
      return $this->findAll();
    }

      return $this->where(['id_customer'=>$id])->findAll();
  }
}