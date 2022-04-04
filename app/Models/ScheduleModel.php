<?php

namespace App\Models;

use CodeIgniter\Model;
class ScheduleModel extends Model
{
  protected $table = 'scheduledelivery';
  protected $allowedFields = ['id_part','id_po','date','status','qty','keterangan'];


  
  public function getSchedule($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id'=>$id])->findAll();
  }

  public function getJadwal($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id_part'=>$id])->findAll();
  }

  public function getPoschedule($id = false )
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id_po'=>$id,'keterangan'=>'belum tuntas'])->findAll();
  }

}