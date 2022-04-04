<?php

namespace App\Controllers;
use App\Models\WhfgModel;
use App\Models\WeldingModel;
use App\Models\SubcontModel;
use App\Models\SurjalsubcontModel;
use App\Models\SurjaldatangsubcontModel;
use App\Models\HistorysubcontModel;

class Warehousefg extends BaseController
{   
    protected $surjaldatangsubcontModel;
    protected $historysubcontModel;
    protected $subcontModel;
    protected $surjalsubcontModel;
    protected $whfgModel;
    protected $weldingModel;

    public function __construct()
    {
        $this->surjaldatangsubcontModel = new surjaldatangsubcontModel();
        $this->historysubcontModel = new historysubcontModel();
        $this->surjalsubcontModel = new surjalsubcontModel();
        $this->subcontModel = new subcontModel();
        $this->weldingModel = new weldingModel();
        $this->whfgModel = new whfgModel();
    }

    public function index()
    {
         if (isset($_SESSION['status'])) {
             $keterangan1 = "";
             $keterangan2 = "subcont";
            $data = [
                'tittle' => 'HOME | Warehouse FG',
                'welding' => $this->weldingModel->getWelding(),
                'finishpart' => $this->whfgModel->getWhfinishgood($keterangan1),
                'finishsubcont' => $this->whfgModel->getWhfinishgood($keterangan2),
                'surjal' => $this->surjalsubcontModel->getSurjalsubcont(),
                'subcont' => $this->subcontModel->getSubcont(),
                'historysubcont' => $this->historysubcontModel->getSubcont()
            ];
            return view('warehousefg',$data);    
        }else {
            session()->setFlashdata('pesangagal','Anda Belum Login');
            return redirect()->to('/');
        }
    }
    
    
    public function delivsubcont(){
        
    $subcont = $this->request->getPost();
    $qty = (int)$subcont['qty'];
    $idpart = (int) $subcont['partfinish'];
    $nosurjal = $subcont['nosurjal'];
    $noposup = $subcont['posup'];
    $idsup = $subcont['nama_supplier'];
    
    $whfg = $this->whfgModel->getWhsubcont($idpart);
    $quantitywhfg = (int) $whfg[0]['qty'];
    $sisaqty = $quantitywhfg - $qty;
    $idwhfg = $whfg[0]['id'];
    
    date_default_timezone_set('Asia/Jakarta');
 $date =date('Y-m-d');
    
    if($qty > $quantitywhfg){
          session()->setFlashdata('pesangagal','Delivery Subcont Gagal, Stock di Warehouse Finish Good Kurang!');
            return redirect()->to('/warehousefg');
    }else{
     
     $ambilsubcont = $this->subcontModel->getSubcontpart($idpart);
     $hitungsub = count($ambilsubcont);
     $totalsub = $hitungsub + 1;
     if($hitungsub > 0 ){
         $idsubcont = $ambilsubcont[0]['id'];
         $qtydisubcont = (int) $ambilsubcont[0]['quantitykirim'];
         $qtykirim = $qty + $qtydisubcont;
        $this->subcontModel->save([
                'id' => $idsubcont,
                'quantitykirim' => $qtykirim,
            ]);
            
            $this->surjalsubcontModel->save([
                    'id_part' => $idpart,
                    'quantity' => $qty,
                    'nomorsurjal' => $nosurjal,
                    'no_po_supplier' => $noposup,
                    'id_supplier' => $idsup,
                    'tgl' => $date
                ]);
                
                $this->whfgModel->save([
                        'id' => $idwhfg,
                        'qty' => $sisaqty
                    ]);
            
            session()->setFlashdata('pesan','Delivery Subcont Berhasil');
            return redirect()->to('/warehousefg');
            
     }else{
         
         $this->subcontModel->save([
                'id_part' => $idpart,
                'no_po_supplier' => $noposup,
                'quantitykirim' => $qty,
                'quantitydatang' => 0,
                'ng' => 0,
                'keterangan' => '',
                'status' => 'belumselesai',
                'id_supplier' => $idsup
            ]);
            
            $this->surjalsubcontModel->save([
                    'id_part' => $idpart,
                    'quantity' => $qty,
                    'nomorsurjal' => $nosurjal,
                    'no_po_supplier' => $noposup,
                    'id_supplier' => $idsup,
                    'tgl' => $date
                ]);
            
            $this->whfgModel->save([
                        'id' => $idwhfg,
                        'qty' => $sisaqty
                    ]);
            
            session()->setFlashdata('pesan','Delivery Subcont Berhasil!');
            return redirect()->to('/warehousefg');
         
     }
        
        
    }
    
    
        
    }
    
    
    public function kedatangan(){
        
        date_default_timezone_set('Asia/Jakarta');
 $date =date('Y-m-d');
        $kedatangan = $this->request->getPost();
        $qty = (int) $kedatangan['qty'];
        $idpart = $kedatangan['idpart'];
        $nosurjal = $kedatangan['surjal'];
        
        
        if (!$this->validate([
            'qty' => 'numeric'
        ])) {
            session()->setFlashdata('pesangagal','Input Data Gagal, Inputlah Quantity dan Quantity Not Good Dengan Angka!');
            return redirect()->to('/warehousefg');
        }
        
        
        if(isset($kedatangan['ng'])){
            $ng = (int) $kedatangan['ng'];
            $keterangan = $kedatangan['ketng'];
            
            if (!$this->validate([
            'ng' => 'numeric'
        ])) {
            session()->setFlashdata('pesangagal','Input Data Gagal, Inputlah Quantity dan Quantity Not Good Dengan Angka!');
            return redirect()->to('/warehousefg');
        }
            
        }else{
            $ng = 0;
            $keterangan = "";
        }
        
        
        $subcont = $this->subcontModel->getSubcontpart($idpart);
        $hitung = count($subcont);
        
        if($hitung == 0){
              session()->setFlashdata('pesangagal','Input Kedatangan Subcont Gagal, Tidak ada Data Subcont');
            return redirect()->to('/warehousefg');
        }elseif($hitung > 0){
            
            $idsubcont = $subcont[0]['id'];
            $quantitykirim = (int) $subcont[0]['quantitykirim'];
            $quantitydatang = (int) $subcont[0]['quantitydatang'];
            $qtyng = (int)$subcont[0]['ng'];
            $noposup = $subcont[0]['no_po_supplier'];
            $idsup = $subcont[0]['id_supplier'];
            
            $qtyoutstand = $quantitykirim - ($quantitydatang + $qtyng);
            
            if($qty > $qtyoutstand){
                session()->setFlashdata('pesangagal','Input Kedatangan Subcont Gagal, Anda menginput Quantity Berlebih');
            return redirect()->to('/warehousefg');
            }else{
                
                $quantityjadi = $quantitydatang + $qty;
                $ngjadi = $ng + $qtyng;
                $qtytotal = $quantitykirim - ($quantityjadi + $ngjadi);
                
                if($qtytotal == 0){
                    $this->subcontModel->delete($idsubcont);
                    
                    $this->historysubcontModel->save([
                        'id_part' => $idpart,
                        'no_po_supplier'=>$noposup,
                        'quantitykirim'=>$quantitykirim,
                        'quantitydatang'=>$quantityjadi,
                        'ng'=>$ngjadi,
                        'keterangan'=> '',
                        'status' => '',
                        'id_supplier'=>$idsup
                        ]);
                    
                }else{
                
                $this->subcontModel->save([
                        'id' => $idsubcont,
                        'quantitydatang' => $quantityjadi,
                        'ng' => $ngjadi
                    ]);
                    
                }
                
                
            }
            
            
            
        }
        
        
        $this->surjaldatangsubcontModel->save([
                'id_part'=>$idpart,
                'qty' => $qty,
                'ng' => $ng,
                'keterangan' => $keterangan,
                'tgl' => $date,
                'nomorsurjal'=> $nosurjal,
                'no_po_supplier'=> $noposup,
                'idsup'=> $idsup
            ]);
            
            $whfg = $this->whfgModel->getWhfgkedatangansubcont($idpart);
            $hitungwhfg = count($whfg);
            
            if($hitungwhfg > 0 ){
            $idwhfg = $whfg[0]['id'];
            $qtydiwhfg = (int) $whfg[0]['qty'];
            $qtyjadidiwhfg = $qtydiwhfg + $qty;
            
            $this->whfgModel->save([
                    'id'=>$idwhfg,
                    'qty'=> $qtyjadidiwhfg
                ]);
            }elseif($hitungwhfg == 0){
                $subcontkemaren =  $this->whfgModel->getWhsubcont($idpart);
                $namapart = $subcontkemaren[0]['nama_part'];
                $this->whfgModel->save([
                    'id_part' => $idpart,
                    'id_fg' => 0,
                    'nama_part' => $namapart,
                    'qty' => $qty,
                    'keterangan' => 'subcont'
                    ]);
            }
        
        session()->setFlashdata('pesan','Input Kedatangan Subcont Berhasil!');
            return redirect()->to('/warehousefg');
    }
    
    
}
