<?php

namespace App\Controllers;
use App\Models\PurchasingModel;
use App\Models\SupModel;
use App\Models\WhModel;
use App\Models\SurjalModel;
use App\Models\HistorysupModel;
use App\Models\RencanaModel;

class Purchasing extends BaseController
{
    protected $rencanaModel;
    protected $historysupModel;
    protected $purchasingModel;
    protected $supModel;
    protected $whModel;
    protected $surjalModel;
    public function __construct() {

        $this->rencanaModel = new rencanaModel();
        $this->historysupModel = new historysupModel();
        $this->purchasingModel = new purchasingModel();
        $this->supModel = new supModel();
        $this->whModel = new whModel();
        $this->surjalModel = new surjalModel();
    }

    public function index()
    {
        if (isset($_SESSION['status'])) {
        $data = [
            'tittle' =>'Home | Data Purchasing',
            'purchase' => $this->purchasingModel->GetPurchase(),
            'sup' => $this->supModel->getSup(),
            'seeplan' => $this->rencanaModel->getRenc()
        ];

        return view ('purchase', $data);
    }else {
            session()->setFlashdata('pesangagal','Anda Belum Login');
            return redirect()->to('/');
        }
        
    }

    public function buatsup()
    {
        $data= [
            'tittle' => 'Home | Tambah Supplier',
            'validation' => \Config\Services::Validation()
        ];
        return view ('buatsup', $data);
    }

    public function savesup()
    {

        $tes = $this->request->getPost();
        if (!$this->validate([
            'nama_supplier' => 'is_unique[supplier.nama_supplier]'
    ])) {
        session()->setFlashdata('pesan','Sudah ada Data Supplier Tersebut!');
        return redirect()->to('/buatsup')->withInput();
    }
        $total=count($tes['nama_supplier']);

        for($i=0; $i<$total; $i++){
            // if (!$this->validate([
            //     'nama_customer' => 'required',
            //     'alamat'  => 'required',
            //     'kontak' => 'required',
            //     'email' => 'required'
            // ])) {
            //     session()->setFlashdata('pesan','Lengkapi Data Tersebut!');
            //     return redirect()->to('/buatcust')->withInput();
            //     // $validation = \Config\Services::validation();
            //     // return redirect()->to('/ganding/create')->withInput()->with('validation',$validation);
            // }

               $this->supModel->save([
        'nama_supplier' =>  $tes['nama_supplier'][$i],
        'alamat' =>  $tes['alamat'][$i],
        'kontak' =>  $tes['kontak'][$i],
        'email' =>  $tes['email'][$i],
        'person' => $tes['person'][$i]
       ]);

       

    }
session()->setFlashdata('pesan','Data Supplier Berhasil Ditambahkan!');
       return redirect()->to('/purchasing');
    }

    public function buatposup()
    {
        $data = [
            'tittle' => 'Home | Buat Purchase Order',
            'validation' => \Config\Services::Validation()
        ];
        return view('buatposup', $data);
    }


    public function saveposup()
    {
        
        if (!$this->validate([
            'qty_po' => 'numeric'
        ])) {
           session()->setFlashdata('pesangagal','Input Data Gagal, Inputlah Quantity Order Dan Kedatangan Dengan Angka!');
            return redirect()->to('/buatposup');
        }
        
        
        $tes = $this->request->getPost();
        $quantitypo = (int) $tes['qty_po'];
        $quantity1 = (int) $tes['qty_dtg1'];
        $quantity2 = (int) $tes['qty_dtg2'];
        
       if($tes['tgl_dtg1'] !== ""){
         
         if (!$this->validate([
            'qty_dtg1' => 'numeric'
        ])) {
           session()->setFlashdata('pesangagal','Input Data Gagal, Inputlah Quantity Order Dan Kedatangan Dengan Angka!');
            return redirect()->to('/buatposup');
        }
        
       }
       
       
       if($tes['tgl_dtg2'] !== ""){
         if (!$this->validate([
            'qty_dtg2' => 'numeric'
        ])) {
           session()->setFlashdata('pesangagal','Input Data Gagal, Inputlah Quantity Order Dan Kedatangan Dengan Angka!');
            return redirect()->to('/buatposup');
        }  
       }
       
       
        if ($quantity2 !== '' || $quantity1 !== '') {
            $quantityjadi = $quantity1 + $quantity2;
        }

        if ($quantityjadi > $quantitypo) {
           
            session()->setFlashdata('pesangagal',' Input Purchase Order Gagal, Quantity Kedatangan 1 atau 2 Tidak Sesuai Dengan Quantity Order');
            return redirect()->to('/buatposup')->withInput();
        
        }elseif ($quantityjadi < $quantitypo) {

            session()->setFlashdata('pesangagal',' Input Purchase Order Gagal, Quantity Kedatangan 1 atau 2 Tidak Sesuai Dengan Quantity Order');
            return redirect()->to('/buatposup')->withInput();
        }

        $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
        $query =  mysqli_query($koneksi, "select * from part where id = $tes[nama_part] ");
        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
        foreach ($hasil as $item){
        $nama_part = $item['nama_part'];
        $kode_part = $item['kode_part'];
        $nama_cust = $item['nama_customer'];
        $spec = $item['spec'];
        $tebal = $item['tebal'];
        $idcust = $item['id_customer'];
        $lebar = $item['lebar'];
        }

        $quer =  mysqli_query($koneksi, "select * from supplier where id = $tes[nama_supplier] ");
        $has = mysqli_fetch_all($quer, MYSQLI_ASSOC);
        foreach ($has as $it){
        $nama_supplier = $it['nama_supplier'];
        $id_sup = $it['id'];
        }
if ($tes['unit_material']=='lembar') {
    $spek = $spec.' '.'X'.' '.$tebal.' '.'x'.' '.'1219'.' '.'X'.' '.'2438'.' ';
}
elseif ($tes['unit_material']=='coil') {
    $spek = $spec.' '.'X'.' '.$tebal.' '.'X'.' '.$lebar;
}

elseif ($tes['unit_material']=='sheet') {
    $spek = $spec.' '.'X'.' '.$tebal.' '.'X'.' '.$lebar;
}elseif ($tes['unit_material']=='pcs') {
    $spek = $spec;
}elseif ($tes['unit_material']=='tube') {
    $spek = $spec;
}

        $this->purchasingModel->save([
            'nama_customer' =>  $nama_cust,
            'no_po' => $kode_part,
            'tglkirim_po' =>  $tes['tgl_po'],
            'nama_part' =>  $nama_part,
            'spec' => $spek,
            'tebal' =>  $tebal,
            'nama_supplier' =>  $nama_supplier,
            'id_supplier' => $id_sup,
            'id_customer' => $idcust,
            'qty_po' => $tes['qty_po'],
            'unit' => $tes['unit_material'],
            'no_po_supplier' => $tes['nomor_po_supplier'],
            'tgl_dtg1' => $tes['tgl_dtg1'],
            'qty_dtg1' => $tes['qty_dtg1'],
            'statuspertama' => 'belum',
            'tgl_dtg2' => $tes['tgl_dtg2'],
            'qty_dtg2' => $tes['qty_dtg2'],
            'statuskedua' => 'belum',
            'status' => 'belum',
            'konfirmasi' => '',
            'konfirmasi1' => ''
           ]);

           session()->setFlashdata('pesan','Data Purchase Order Supplier Berhasil Di Input!');
       return redirect()->to('/purchasing');

    }

    public function kedatangan()
    {
        $pos = $this->request->getPost();

    date_default_timezone_set('Asia/Jakarta');
        $date =date('Y-m-d'); 

        if (isset($pos['cekbox1'])) {

            $total1=count($pos['cekbox1']);
            for($i=0; $i<$total1; $i++){


                $id = $pos['cekbox1'][$i];
                $posup =$this->purchasingModel->GetPurchase($id);
                $code = $posup[0]['no_po'];
                $qty= (int) $posup[0]['qty_po'];
                $qty1= (int) $posup[0]['qty_dtg1'];
                $qty2= (int) $posup[0]['qty_dtg2'];
                $qtyact = (int)$posup[0]['qty_act'];
                $nama_cust = $posup[0]['nama_customer'];
                $namasup = $posup[0]['nama_supplier'];
                $idsup = $posup[0]['id_supplier'];
                $idcust = $posup[0]['id_customer'];
                $no_po_supplier = $posup[0]['no_po_supplier'];
                $spec= $posup[0]['spec'];
                $namepart = $posup[0]['nama_part'];
                $tebal = $posup[0]['tebal'];
                $unit = $posup[0]['unit'];
                $qtytol = $qty1+$qtyact;
                $qtynol = 0;
                $confirm = 'belum dikonfirmasi';
    
    if ($qtytol >= $qty) {
        $suds = "sudah";
        $qtykur = 0;
        
    } else {
        $suds = "belum";
        $qtykur = $qty-$qtytol;
        
    }
    
                $this->purchasingModel->save([
                    'id' => $id,
                    'qty_act' => $qtytol,
                    'outstanding_qty' => $qtykur,
                    'statuspertama' =>  'sudah',
                    'status' => $suds,
                    'konfirmasi' => $confirm
                   ]);

                   $this->surjalModel->save([
                    'nomor_surjal' => $pos['nosurjal'],
                    'id_purchase' => $id,
                    'id_supplier' => $idsup,
                    'info' => 'kedatangan pertama',
                    'tgl' => $date
                ]);

                   $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
                   $query =  mysqli_query($koneksi, "select * from warehouse where kodepart = '$code' and id_customer = '$idcust' and unit = '$unit' ");
                   $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC); 
            $hitung = mysqli_num_rows($query);
            foreach ($hasil as $a) {
                $idwh = $a['id'];
                $qtytoel = (int) $a['total_qty'];
                $qtyy = $qty1 + $qtytoel; 
                
            }
          if ($hitung>0) {
              
            
              $this->whModel->save([
                    'id' => $idwh,
                    'total_qty' => $qtytoel

              ]);
          } else {
              $this->whModel->save([
                  'nama_customer'=> $nama_cust,
                  'nama_supplier'=> $namasup,
                  'no_po_suppplier'=> $no_po_supplier,
                  'kodepart' => $code,
                  'nama_material' => $namepart,
                  'spec' => $spec,
                  'tebal' => $tebal,
                  'total_qty' => $qtynol,
                  'unit' => $unit,
                  'tanggal_datang' => $date,
                  'tgl_terakhir_keluar' =>'' ,
                  'id_supplier' => $idsup,
                  'id_customer' => $idcust,
                  'status' => ''
              ]);
          }  
                }

          

        }



        if (isset($pos['cekbox2'])) {

            $total2=count($pos['cekbox2']);

            for($i=0; $i<$total2; $i++){


                $id = $pos['cekbox2'][$i];
                $posup =$this->purchasingModel->GetPurchase($id);
                $qty=(int)$posup[0]['qty_po'];
                $qty1=(int)$posup[0]['qty_dtg1'];
                $qty2=(int)$posup[0]['qty_dtg2'];
                $qtyact = (int)$posup[0]['qty_act'];
                $nama_cust = $posup[0]['nama_customer'];
                $namasup = $posup[0]['nama_supplier'];
                $idsup = $posup[0]['id_supplier'];
                $idcust = $posup[0]['id_customer'];
                $no_po_supplier = $posup[0]['no_po_supplier'];
                $spec= $posup[0]['spec'];
                $namepart = $posup[0]['nama_part'];
                $tebal = $posup[0]['tebal'];
                $unit = $posup[0]['unit'];
                $code = $posup[0]['no_po'];
                $qtytol = $qty2+$qtyact;
                $qtynol = 0;
                $confirm = 'belum dikonfirmasi';
    if ($qtytol >= $qty) {
        $sud = "sudah";
        $qtykur = 0;
        
    } else {
        $sud = "belum";
        $qtykur = $qty-$qtytol;
        
    }
    
                $this->purchasingModel->save([
                    'id' => $id,
                    'qty_act' => $qtytol,
                    'outstanding_qty' => $qtykur,
                    'statuskedua' =>  'sudah',
                    'status' => $sud,
                    'konfirmasi1' => $confirm
                   ]);
            
                   $this->surjalModel->save([
                       'nomor_surjal' => $pos['nosurjal'],
                       'id_purchase' => $id,
                       'id_supplier' => $idsup,
                       'info' => 'kedatangan kedua',
                       'tgl' => $date
                   ]);

                   $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
                   $queryy =  mysqli_query($koneksi, "select * from warehouse where kodepart = '$code' and id_customer = '$idcust' and unit = '$unit' ");
                   $hasill = mysqli_fetch_all($queryy, MYSQLI_ASSOC); 
            $hitungg = mysqli_num_rows($queryy);
            foreach ($hasill as $a) {
                $idwh = $a['id'];
                $qtytoel = (int) $a['total_qty'];
                $qtyy = $qty2 + $qtytoel; 
            }
          if ($hitungg>0) {
              
            
              $this->whModel->save([
                    'id' => $idwh,
                    'total_qty' => $qtytoel

              ]);
          } else {
              $this->whModel->save([
                  'nama_customer'=> $nama_cust,
                  'nama_supplier'=> $namasup,
                  'no_po_suppplier'=> $no_po_supplier,
                  'kodepart' => $code,
                  'nama_material' => $namepart,
                  'spec' => $spec,
                  'tebal' => $tebal,
                  'total_qty' => $qtynol,
                  'unit' => $unit,
                  'tanggal_datang' => $date,
                  'id_supplier' => $idsup,
                  'id_customer' => $idcust,
                  'status' => ''
              ]);
          }  
            
                } 


        }

    if (!isset($pos['cekbox1']) && !isset($pos['cekbox2']) ) {
        session()->setFlashdata('pesangagal','Tidak Ada Data Yang Anda Input');
          return redirect()->to('/purchasing');
    }
                

          session()->setFlashdata('pesan','Data Kedatangan Berhasil Di Input, Silahkan Konfirmasi Di Menu Warehouse RM');
          return redirect()->to('/purchasing');

    }


    public function saverevisi()
    {
        if (!$this->validate([
            'qty_po' => 'numeric'
        ])) {
           session()->setFlashdata('pesangagal','Input Data Gagal, Inputlah Quantity Order Dan Kedatangan Dengan Angka!');
            return redirect()->to('/purchasing');
        }
        
        $history = $this->request->getPost();
        $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
        $tglpo = $history['tgl_po'];
        $quantitypo = (int) $history['qty_po'];
        $quantity1 = (int) $history['qty_dtg1'];
        $quantity2 = (int) $history['qty_dtg2'];
        $tglbaru1 = $history['tgl_dtg1'];
        $idpolama = $history['idpo'];
        
        if($history['tgl_dtg1'] !== ""){
         
         if (!$this->validate([
            'qty_dtg1' => 'numeric'
        ])) {
           session()->setFlashdata('pesangagal','Input Data Gagal, Inputlah Quantity Order Dan Kedatangan Dengan Angka!');
            return redirect()->to('/purchasing');
        }
        
       }
       
       
       if($history['tgl_dtg2'] !== ""){
         if (!$this->validate([
            'qty_dtg2' => 'numeric'
        ])) {
           session()->setFlashdata('pesangagal','Input Data Gagal, Inputlah Quantity Order Dan Kedatangan Dengan Angka!');
            return redirect()->to('/purchasing');
        }  
       }
       

        $polama = $this->purchasingModel->getPurchase($idpolama);
        $code = $polama[0]['no_po'];
        $namasup = $polama[0]['nama_supplier'];
        $unit = $polama[0]['unit'];
        $no_po_supplier = $polama[0]['no_po_supplier'];
        $qtypolama = $polama[0]['qty_po'];
        $qtylama1 = $polama[0]['qty_dtg1'];
        $qtylama2 = $polama[0]['qty_dtg2'];
        $tgllama1 = $polama[0]['tgl_dtg1'];
        $tgllama2 = $polama[0]['tgl_dtg2'];

        $revisilama = $history['revisi'];
        
        if ($revisilama == 0) {
            $revisibaru = 1;
        }else {
            $revisibaru = $revisilama + 1;
        }


        if ($quantity2 !== '' || $quantity1 !== '') {
            $quantityjadi = $quantity1 + $quantity2;
        }


        if ($quantity2 ==0) {
            $tglbaru2 = 0000-00-00;
            
            $queryrencana =  mysqli_query($koneksi, "select * from rencana where description = 'kedatangan kedua' and qty1 = '$code' and qty2 = '$no_po_supplier' ");
            $hitto = mysqli_num_rows($queryrencana);

            if ($hitto > 0) {
                $has = mysqli_fetch_all($queryrencana, MYSQLI_ASSOC); 
                           foreach ($has as $b) {
                            $idrc = $b['id'];
                        } 
                $this->rencanaModel->save([
                    'id' => $idrc,
                    'start_date' => $tglbaru2,
                    'end_date' => $tglbaru2
                ]);

            }

        }else{

            $tglbaru2 = $history['tgl_dtg2'];
            $queryrencana =  mysqli_query($koneksi, "select * from rencana where description = 'kedatangan kedua' and qty1 = '$code' and qty2 = '$no_po_supplier' ");
            $hitto = mysqli_num_rows($queryrencana);

            if ($hitto > 0) {
                $has = mysqli_fetch_all($queryrencana, MYSQLI_ASSOC); 
                           foreach ($has as $b) {
                            $idrc = $b['id'];
                        }
                        $keterangan = "Rencana Kedatangan Kedua".":  ".$no_po_supplier." | ".$namasup." | ".$quantity2." | ".$unit; 
                $this->rencanaModel->save([
                    'id' => $idrc,
                    'no_po_supplier' => $keterangan,
                    'start_date' => $tglbaru2,
                    'end_date' => $tglbaru2
                ]);

            }
        }

        if ($quantity1 == 0) {
            $tglbaru1 = 0000-00-00;
            
            $queryrencana =  mysqli_query($koneksi, "select * from rencana where description = 'kedatangan pertama' and qty1 = '$code' and qty2 = '$no_po_supplier' ");
            $hitto = mysqli_num_rows($queryrencana);

            if ($hitto > 0) {
                $has = mysqli_fetch_all($queryrencana, MYSQLI_ASSOC); 
                           foreach ($has as $b) {
                            $idrc = $b['id'];
                        } 
                $this->rencanaModel->save([
                    'id' => $idrc,
                    'start_date' => $tglbaru1,
                    'end_date' => $tglbaru1
                ]);

            }

        }else{

            $tglbaru1 = $history['tgl_dtg1'];
            $queryrencana =  mysqli_query($koneksi, "select * from rencana where description = 'kedatangan pertama' and qty1 = '$code' and qty2 = '$no_po_supplier' ");
            $hitto = mysqli_num_rows($queryrencana);

            if ($hitto > 0) {
                $has = mysqli_fetch_all($queryrencana, MYSQLI_ASSOC); 
                           foreach ($has as $b) {
                            $idrc = $b['id'];
                        }
                        $keterangan = "Rencana Kedatangan Kedua".":  ".$no_po_supplier." | ".$namasup." | ".$quantity1." | ".$unit; 
                $this->rencanaModel->save([
                    'id' => $idrc,
                    'no_po_supplier' => $keterangan,
                    'start_date' => $tglbaru1,
                    'end_date' => $tglbaru1
                ]);

            }
        }

        if ($quantityjadi > $quantitypo) {
           
            session()->setFlashdata('pesangagal','Revisi Gagal Quantity Kedatangan 1 atau 2 Tidak Sesuai Dengan Quantity Order');
            return redirect()->to('/purchasing');
        }elseif ($quantityjadi < $quantitypo) {
            session()->setFlashdata('pesangagal','Revisi Gagal Quantity Kedatangan 1 atau 2 Tidak Sesuai Dengan Quantity Order');
            return redirect()->to('/purchasing');
        
        }

        

        $this->purchasingModel->save([
            'id' => $idpolama,
            'revisi_po' => $revisibaru,
            'qty_po' => $quantitypo,
            'tgl_dtg1' => $tglbaru1,
            'tgl_dtg2' => $tglbaru2,
            'qty_dtg1' => $quantity1,
            'qty_dtg2' => $quantity2
        ]);

        $this->historysupModel->save([
            'tglpo' => $tglpo,
            'idpolama' => $idpolama,
            'revisi_po' => $revisilama,
            'qty_po' => $qtypolama,
            'tgl_dtg1' => $tgllama1,
            'qty_dtg1' => $qtylama1,
            'tgl_dtg2' => $tgllama2,
            'qty_dtg2' => $qtylama2
        ]);


        session()->setFlashdata('pesan','Revisi Purchase Order Berhasil');
            return redirect()->to('/purchasing');

    }

}
