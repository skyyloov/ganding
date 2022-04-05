<?php

namespace App\Controllers;

use App\Models\ProsesModel;
use App\Models\Proses1Model;
use App\Models\Proses2Model;
use App\Models\Proses3Model;
use App\Models\Proses4Model;
use App\Models\Proses5Model;
use App\Models\Proses6Model;
use App\Models\Proses7Model;
use App\Models\SpotModel;
use App\Models\PartModel;
use App\Models\WhModel;
use App\Models\WhfgModel;
use App\Models\WeldingModel;
use App\Models\FinishgoodModel;
use App\Models\ScheduleproduksiModel;
use App\Models\PoModel;
use App\Models\CustModel;
use App\Models\LaporanproduksiModel;

class Production extends BaseController
{
    protected $laporanproduksiModel;
    protected $custModel;
    protected $poModel;
    protected $scheduleproduksiModel;
    protected $finishgoodModel;
    protected $whfgmodel;
    protected $whModel;
    protected $prosesModel;
    protected $proses1Model;
    protected $proses2Model;
    protected $proses3Model;
    protected $proses4Model;
    protected $proses5Model;
    protected $proses6Model;
    protected $proses7Model;
    protected $spotModel;
    protected $partModel;
    protected $weldingModel;

    public function __construct() {
        
        $this->laporanproduksiModel = new laporanproduksiModel();
        $this->custModel = new custModel();
        $this->poModel = new poModel();
        $this->finishgoodModel = new finishgoodModel();
        $this->whfgModel = new whfgModel();
        $this->whModel = new whModel();
        $this->spotModel = new spotModel();
        $this->prosesModel = new prosesModel();
        $this->proses1Model = new proses1Model();
        $this->proses2Model = new proses2Model();
        $this->proses3Model = new proses3Model();
        $this->proses4Model = new proses4Model();
        $this->proses5Model = new proses5Model();
        $this->proses6Model = new proses6Model();
        $this->proses7Model = new proses7Model();
        $this->partModel = new partModel();
        $this->weldingModel = new weldingModel();
        $this->scheduleproduksiModel = new scheduleproduksiModel();
    }

    public function index()
    {
        if (isset($_SESSION['status'])) {
            $keterangan1 = 'spot1';
            $keterangan2 = 'spot2';
            
        $data = [
            'tittle' => 'Home | Production',
            'proses1' => $this->proses1Model->getProses1(),
            'proses' => $this->prosesModel->getProses(),
            'proses2'=> $this->proses2Model->getProses2(),
            'proses3'=> $this->proses3Model->getProses3(),
            'proses4'=> $this->proses4Model->getProses4(),
            'proses5'=> $this->proses5Model->getProses5(),
            'proses6'=> $this->proses6Model->getProses6(),
            'proses7'=> $this->proses7Model->getProses7(),
            'spot' => $this->spotModel->getSpotall($keterangan1),
            'spot2' => $this->spotModel->getSpotall($keterangan2),
            'jadwal' => $this->scheduleproduksiModel->getJadwal(),
            'validation' => \Config\Services::Validation(),
            'part' => $this->partModel->getPart() 

        ];
        return view('production',$data);
    }else {
        session()->setFlashdata('pesangagal','Anda Belum Login');
            return redirect()->to('/');
    }


    }


    public function saveassy()
    {

        if (!$this->validate([
            'namafg' => 'is_unique[welding.nama_fg]'
        ])) {
            session()->setFlashdata('pesan','Tambah Data Gagal, Sudah Ada Finish Good Assy Welding Tersebut Di Database');
            return redirect()->to('/production')->withInput();
            // $validation = \Config\Services::validation();
            // return redirect()->to('/ganding/create')->withInput()->with('validation',$validation);
        }

        if (!$this->validate([
            'qty' => 'numeric'
        ])) {
            session()->setFlashdata('pesan','Tambah Data Gagal, Input Quantity Need Dengan Angka');
            return redirect()->to('/production')->withInput();
            // $validation = \Config\Services::validation();
            // return redirect()->to('/ganding/create')->withInput()->with('validation',$validation);
        }

        $post = $this->request->getPost();
        $idcustomer = $post['customer'];
        $namafg = $post['namafg'];
        
        $hitungcek = count($post['qty']);
         for ($g=0; $g<$hitungcek ; $g++) { 
         $kuantitineed = (int) $post['qty'][$g];
         $cekkuantiti = $post['qty'][$g];
         
         if($kuantitineed != $cekkuantiti){
                session()->setFlashdata('pesan','Tambah Data FinishGood Assy Welding Gagal, Anda Harus Menginputkan Angka di Kolom Quantity Need!');
                return redirect()->to('/production');
         }
         
       }
        
        
        $customer = $this->custModel->getCustomer($idcustomer);
        $namacust = $customer[0]['nama_customer'];
        $idcust = $customer[0]['id'];

        $this->weldingModel->save([
            'nama_fg' => $namafg,
            'qty' => '',
            'idcustomer' => $idcust,
            'nama_customer' => $namacust
        ]);

        $wels = $this->weldingModel->getWelds($namafg);
        $idwelds = $wels[0]['id'];

       $itung = count($post['part']);

       for ($i=0; $i<$itung ; $i++) { 
           $this->finishgoodModel->save([
                'id_part' => $post['part'][$i],
                'id_fg' => $idwelds,
                'qty_need' => $post['qty'][$i]
           ]);
       }

       session()->setFlashdata('pesanberhasil','Tambah Data FinishGood Assy Welding Berhasil');
          return redirect()->to('/production');
        
    }

    public function inputassy()
    {
        $weld = $this->request->getPost();
        $idwelding = $weld['idfg'];
        
        $qty = (int) $weld['qty'];
        $cekqty = $weld['qty'];
        if($qty != $cekqty){
             session()->setFlashdata('pesan','Input Data Gagal, Anda Menginputkan Quantity Bukan Angka!');
                return redirect()->to('/production');
        }
        
        
        $welding = $this->weldingModel->getWelding($idwelding);
        $qtyweldingawal = (int) $welding[0]['qty'];

        $fg = $this->finishgoodModel->getFinish($idwelding);
        $hitung = count($fg);
        
        for ($i=0; $i < $hitung ; $i++) { 

            $qtyneed = (int) $fg[$i]['qty_need'];
              $idpart = $fg[$i]['id_part'];
            $part = $this->partModel->getPart($idpart);
            $proses = $part[0]['proses'];
            $code = $part[0]['kode_part'];
            $namapart = $part[0]['nama_part'];

            if ($proses > 0) {

            
            $queryfg =  mysqli_query($this->koneksi, "select * from warehousefg where id_part = $idpart ");
            $hasilfg = mysqli_fetch_all($queryfg, MYSQLI_ASSOC);
            $hitungfg = mysqli_num_rows($queryfg);

            if ($hitungfg < 1) {
                session()->setFlashdata('pesan','Input Data Gagal, Stock Finish Part'.'  '.$namapart.'  '.'Tersebut Tidak Ada Di Warehouse FG');
          return redirect()->to('/production');
            }elseif ($hitungfg > 0) {

               $stokwhfg = $hasilfg[0]['qty'];
                
               $qtybutuh =  $qty * $qtyneed;
               
               if ($qtybutuh > $stokwhfg) {
                session()->setFlashdata('pesan','Input Data Gagal, Stock Finish Part'.'  '.$namapart.'  '.'Tersebut Kurang');
                return redirect()->to('/production');
                }
            }

            }elseif ($proses == 0) {
                
            $querywh =  mysqli_query($this->koneksi, "select * from warehouse where kodepart = '$code' ");
            $hasilwh = mysqli_fetch_all($querywh, MYSQLI_ASSOC);
            $hitungwh = mysqli_num_rows($querywh);

            if ($hitungwh < 1) {
                session()->setFlashdata('pesan','Input Data Gagal, Stock Part'.'  '.$namapart.'  '.'Tersebut Tidak Ada Di Warehouse RM');
          return redirect()->to('/production');
            }elseif ($hitungwh > 0) {

               $stokwh = (int) $hasilwh[0]['total_qty'];
                
               $qtybutuh =  $qty * $qtyneed;
               
               if ($qtybutuh > $stokwh) {
                session()->setFlashdata('pesan','Input Data Gagal, Stock Part'.'  '.$namapart.'  '.'Tersebut Kurang');
                return redirect()->to('/production');
                }
            }

            }

            } 

            for ($j=0; $j < $hitung ; $j++) { 
                $qtyneeds = (int) $fg[$j]['qty_need'];
                $idparts = $fg[$j]['id_part'];
              $parts = $this->partModel->getPart($idparts);
              $process = $parts[0]['proses'];
              $codes = $parts[0]['kode_part'];
              $namaparts = $parts[0]['nama_part'];

              if ($process > 0) {
                  
                  
                  $queryfgs =  mysqli_query($this->koneksi, "select * from warehousefg where id_part = $idparts ");
                  $hasilfgs = mysqli_fetch_all($queryfgs, MYSQLI_ASSOC);
                  $hitungfgs = mysqli_num_rows($queryfgs);
                  
                  $idwhfg = $hasilfgs[0]['id'];
                  $stoksfg = (int) $hasilfgs[0]['qty']; 
                  
                  $qtykepake = $qty * $qtyneeds;
                  $qtysisa = $stoksfg - $qtykepake;  
                  
                  $this->whfgModel->save([
                      "id" => $idwhfg,
                      'qty' => $qtysisa
                    ]);
                }elseif ($process == 0) {
                    
                    $querywhs =  mysqli_query($this->koneksi, "select * from warehouse where kodepart = '$codes' ");
                    $hasilwhs = mysqli_fetch_all($querywhs, MYSQLI_ASSOC);
                    $hitungwhs = mysqli_num_rows($querywhs);
                    
                    $idwhs = $hasilwhs[0]['id'];
                    $stokswhs = (int) $hasilwhs[0]['total_qty']; 
                    
                    $qtykepaks = $qty * $qtyneeds;
                    $qtysisa = $stokswhs - $qtykepaks;  
                    
                    $this->whModel->save([
                        'id' => $idwhs,
                        'total_qty' => $qtysisa
                      ]);
                }

            }

            $qtyjadiwelding = $qtyweldingawal + $qty;

                $this->weldingModel->save([
                    'id' => $idwelding,
                    'qty' => $qtyjadiwelding
                ]);

                session()->setFlashdata('pesanberhasil','Buat Assy Welding Telah Berhasil Di Input');
                return redirect()->to('/production');

    }

    public function input1()
    {
         if (!$this->validate([
            'qty' => 'numeric'
        ])) {
            session()->setFlashdata('pesan','Input Data Gagal, Inputlah Quantity dan Quantity Not Good Dengan Angka');
            return redirect()->to('/production');
        }
        
        $pos = $this->request->getPost();
        
        if(isset($pos['ng'])){
            if (!$this->validate([
            'ng' => 'numeric'
        ])) {
           session()->setFlashdata('pesan','Input Data Gagal, Inputlah Quantity dan Quantity Not Good Dengan Angka!');
            return redirect()->to('/production');
        }
        }
        
        if (isset($pos['ng'])&& $pos['ng'] !== "") {
            $quantiti = (int) $pos['qty'];
            $keterangan = $pos['ketng'];
            $ng = (int) $pos['ng'];
            $qty = $quantiti + $ng;
        }else{
            $keterangan = "";
            $ng = 0;
            $qty = (int) $pos['qty'];
            $quantiti = $qty;
        }
        $idpart = $pos['idpart'];
        
        $part = $this->partModel->getPart($idpart);
        $code = $part[0]['kode_part'];
        $unit = $part[0]['unit_material'];
        $shtlbr = (float) $part[0]['sheet_lembar'];
        $pcssht = (float) $part[0]['pcs_sheet'];
        $pcslbr = (float) $part[0]['pcs_lembar'];
        $kgpcs = (float) $part[0]['kg_pcs'];
        

if ($unit == 'lembar' || $unit == 'sheet') {
   
        $querylbr =  mysqli_query($this->koneksi, "select * from warehouse where kodepart = '$code' and unit = 'lembar' ");
        $hasillbr = mysqli_fetch_all($querylbr, MYSQLI_ASSOC); 
    $hitunglbr = mysqli_num_rows($querylbr);

        $querysht =  mysqli_query($this->koneksi, "select * from warehouse where kodepart = '$code' and unit = 'sheet' ");
        $hasilsht = mysqli_fetch_all($querysht, MYSQLI_ASSOC); 
    $hitungsht = mysqli_num_rows($querysht);

    if ($hitungsht > 0) {
        $idsht = $hasilsht[0]['id'];
        $materialsht = (float) $hasilsht[0]['total_qty'];
        $usesheet = $qty / $pcssht ;
        $sisasht = $materialsht - $usesheet ;

        if ($usesheet > $materialsht) {
            session()->setFlashdata('pesan','Material Sheet Kurang! Konversikan Dahulu Di Warehouse RM');
          return redirect()->to('/production');
        }else {
            $this->whModel->save([
            'id' => $idsht,
            'total_qty' => $sisasht
        ]);
        }

        

    }elseif ($hitunglbr > 0 && $hitungsht == 0) {
        $idlbr = $hasillbr[0]['id'];
        $materiallbr = (float) $hasillbr[0]['total_qty'];
        $uselbr = $qty / $pcslbr;
        $sisalbr = $materiallbr - $uselbr;

        if ($uselbr > $materiallbr) {
            session()->setFlashdata('pesan','Material Lembar Kurang! Buatlah Permintaan Ke Purchasing');
          return redirect()->to('/production');
        }else {
            $this->whModel->save([
            'id' => $idlbr,
            'total_qty' => $sisalbr
        ]);
        }

    }elseif ($hitunglbr == 0 && $hitungsht == 0 ) {
        session()->setFlashdata('pesan','Tidak Ada Material Sheet Maupun Material Lembar');
        return redirect()->to('/production');
    }

}elseif ($unit == 'coil') {
    $querycoil =  mysqli_query($this->koneksi, "select * from warehouse where kodepart = '$code' and unit = 'coil' ");
        $hasilcoil = mysqli_fetch_all($querycoil, MYSQLI_ASSOC); 
    $hitungcoil = mysqli_num_rows($querycoil);

    if ($hitungcoil > 0) {
        $materialcoil = (float)$hasilcoil[0]['total_qty'];
        $usecoil = $qty * $kgpcs;
        $coilsisa = $materialcoil - $usecoil;
        $idcoil = $hasilcoil[0]['id'];

        if ($usecoil > $materialcoil) {
            session()->setFlashdata('pesan','Material Coil Kurang');
          return redirect()->to('/production');
        }else {
            $this->whModel->save([
                'id' => $idcoil,
                'total_qty' => $coilsisa
            ]);
            
        }

    }elseif ($hitungcoil == 0) {
        session()->setFlashdata('pesan','Tidak Ada Persediaan Material Coil');
          return redirect()->to('/production');
    }

}elseif ($unit == 'pcs') {
    $querypcs =  mysqli_query($this->koneksi, "select * from warehouse where kodepart = '$code' and unit = 'pcs' ");
    $hasilpcs = mysqli_fetch_all($querypcs, MYSQLI_ASSOC); 
$hitungpcs = mysqli_num_rows($querypcs);

    if ($hitungpcs > 0) {
        $materialpcs = (int) $hasilpcs[0]['total_qty'];
        $pcssisa = $materialpcs - $qty;
        $idpcs = $hasilpcs[0]['id'];

        if ($qty > $materialpcs) {
            session()->setFlashdata('pesan','Material Kurang');
          return redirect()->to('/production');
        }else {
            $this->whModel->save([
                'id' => $idpcs,
                'total_qty' => $pcssisa
            ]);
        }

    }elseif ($hitungpcs == 0) {
        session()->setFlashdata('pesan','Tidak Ada Persediaan Material Part Tersebut');
          return redirect()->to('/production');
    }

}elseif ($unit == 'tube') {
    $querytube =  mysqli_query($this->koneksi, "select * from warehouse where kodepart = '$code' and unit = 'tube' ");
    $hasiltube = mysqli_fetch_all($querytube, MYSQLI_ASSOC); 
$hitungtube = mysqli_num_rows($querytube);

    if ($hitungtube > 0) {
        $materialtube = (int) $hasiltube[0]['total_qty'];
        $tubesisa = $materialtube - $qty;
        $idtube = $hasiltube[0]['id'];

        if ($qty > $materialtube) {
            session()->setFlashdata('pesan','Material Kurang');
          return redirect()->to('/production');
        }else {
            $this->whModel->save([
                'id' => $idtube,
                'total_qty' => $tubesisa
            ]);
        }

    }elseif ($hitungtube == 0) {
        session()->setFlashdata('pesan','Tidak Ada Persediaan Material Tube');
          return redirect()->to('/production');
    }
}

        
        $query =  mysqli_query($this->koneksi, "select * from warehouse where kodepart = '$code' and unit = 'sheet' ");
        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC); 
    $hitung = mysqli_num_rows($query);
    
        $part = $this->partModel->getPart($idpart);
        $jmlhproses = (int) $part[0]['proses'];
        $namapart = $part[0]['nama_part'];
        $spoet = $part[0]['spot'];


        $proses1 = $this->proses1Model->getProcess1($idpart);
        $idproses1 = $proses1[0]['id'];
        $namapart = $proses1[0]['nama_part'];
        $qtyawal = (int) $proses1[0]['act_proses1'];
        $qtyjadi1 = $qty + $qtyawal;

        $proses = $this->prosesModel->getProcess($idpart);
        $idproses = $proses[0]['id'];
        $qtyin = $proses[0]['qty_in'];
        $qtyout = $proses[0]['qty_out'];
        $qtyintotal = $qtyin + $qty;

    if ($spoet == 'spot' | $spoet == '2spot') {
        $spot = $this->spotModel->getSpotz($idpart);
        $idspot = $spot[0]['id'];
        $qtyinspot = (int) $spot[0]['qty_in'];
        $qtyoutspot = (int) $spot[0]['qty_out'];   
    }

        $this->proses1Model->save([
            'id' => $idproses1,
            'act_proses1' => $qtyjadi1
        ]);

        if ($jmlhproses > 1) {
            $proses2 = $this->proses2Model->getProcess2($idpart);
            $idproses2 = $proses2[0]['id'];
            $planawal = (int) $proses2[0]['plan2'];
            $planjadi2 = (int) $planawal + $quantiti;
         $this->proses2Model->save([
            'id' => $idproses2,
            'plan2' => $planjadi2
        ]);
        }elseif ($jmlhproses == 1) {

            if ($spoet == 'spot') {
                $qtyjadispot = $qtyinspot + $quantiti;
                $this->spotModel->save([
                    'id' => $idspot,
                    'qty_in' => $qtyjadispot
                ]);
            }elseif ($spoet == 'nonspot' ) {
                $whfg = $this->whfgModel->getWhfg($idpart);
                if ($whfg == [] ) {
                    $qtyjads = $qtyout + $qty;
                    $this->whfgModel->save([
                      'id_part' =>   $idpart,
                      'nama_part' => $namapart,
                      'qty' => $quantiti
                    ]);

                    $this->prosesModel->save([
                        'id' => $idproses,
                        'qty_out' => $qtyjads
                    ]);
                }else {
                    $qtyfg = (int) $whfg[0]['qty'];
                    $idfg = $whfg[0]['id'];
                    $qtyjadi = $qtyfg + $quantiti;
                    $qtyjads = $qtyout + $qty;
                    $this->whfgModel->save([
                        'id' => $idfg,
                        'qty' =>$qtyjadi
                    ]);
    
                    $this->prosesModel->save([
                        'id' => $idproses,
                        'qty_out' => $qtyjads
                    ]);
                }
            }elseif($spoet == '2spot'){
                $qtyjadispot = $qtyinspot + $quantiti;
                $this->spotModel->save([
                    'id' => $idspot,
                    'qty_in' => $qtyjadispot
                ]);
            }

           
        }
       
        $this->prosesModel->save([
            'id' => $idproses,
            'qty_in' => $qtyintotal
        ]);


        $queryjadwal1 =  mysqli_query($this->koneksi, "select * from scheduleproduksi where id_part = $idpart and proses = 1 ");
            $hasiljadwal1 = mysqli_fetch_all($queryjadwal1, MYSQLI_ASSOC);
            $hitungjadwal1 = mysqli_num_rows($queryjadwal1);

           if ($hitungjadwal1 > 0) {
               $idjadwal1 = $hasiljadwal1[0]['id'];
                $qtydijadwal1 = (int) $hasiljadwal1[0]['qty'];
                
                if ($qty > $qtydijadwal1) {
                    $qtyjumlahjadwal = 0;
                    
                    $this->scheduleproduksiModel->save([
                        'id' => $idjadwal1,
                        'qty' => $qtyjumlahjadwal,
                        'status' => 'tidak masuk'
                    ]);

                }elseif ($qty == $qtydijadwal1) {
                    $qtyjumlahjadwal = 0;
                    
                    $this->scheduleproduksiModel->save([
                        'id' => $idjadwal1,
                        'qty' => $qtyjumlahjadwal,
                        'status' => 'tidak masuk'
                    ]);
                }elseif ($qty < $qtydijadwal1) {
                   $qtyjumlahjadwal = $qtydijadwal1 - $quantiti;
                   
                   $this->scheduleproduksiModel->save([
                        'id'=> $idjadwal1,
                        'qty' => $qtyjumlahjadwal,
                        'status' => 'masuk'
                   ]);
               }

            }else {
                
            }


            $querypo =  mysqli_query($this->koneksi, "select * from scheduleproduksi where id_part = $idpart and status = 'tidak masuk' ");
            $hasilpo = mysqli_fetch_all($querypo, MYSQLI_ASSOC);
            $hitungpo = mysqli_num_rows($querypo);
            if ($hitungpo < 1) {

                $querypojadwal =  mysqli_query($this->koneksi, "select * from po where id_part = $idpart and status = 'belum close' ");
            $hasilpojadwal = mysqli_fetch_all($querypojadwal, MYSQLI_ASSOC);
            $hitungpojadwal = mysqli_num_rows($querypojadwal);

            if ($hitungpojadwal > 0 ) {
             
            $idpo = $hasilpojadwal[0]['id'];
            $this->poModel->save([
                'id'=>$idpo,
                'schedule' =>'tidak masuk' 
            ]);

            }

            }else {
                
            }

            date_default_timezone_set('Asia/Jakarta');
            $date =date('Y-m-d H:i:s');

            $this->laporanproduksiModel->save([
                'id_part'=> $idpart,
                'proses' => 1,
                'quantity'=> $quantiti,
                'ng' => $ng,
                'keterangan' => $keterangan,
                'tanggal' => $date
            ]);

        session()->setFlashdata('pesanberhasil','Data Proses 1'.'  '.'Part'.'  ' .$namapart.'  '.'Berhasil Di Input' );
          return redirect()->to('/production');
    }

    public function input2()
    {
        if (!$this->validate([
            'qty' => 'numeric'
        ])) {
             session()->setFlashdata('pesan','Input Data Gagal, Inputlah Quantity dan Quantity Not Good Dengan Angka!');
            return redirect()->to('/production');
        }
        
        
        $prs2 = $this->request->getPost();
        
        if(isset($prs2['ng'])){
            if (!$this->validate([
            'ng' => 'numeric'
        ])) {
           session()->setFlashdata('pesan','Input Data Gagal, Inputlah Quantity dan Quantity Not Good Dengan Angka!');
            return redirect()->to('/production');
        }
        }
        
        $idpart = $prs2['idpart'];

        if (isset($prs2['ng'])&& $prs2['ng'] !== "") {
            $quantiti = (int) $prs2['qty'];
            $keterangan = $prs2['ketng'];
            $ng = (int) $prs2['ng'];
            $qty = $quantiti + $ng;
        }else{
            $keterangan = "";
            $ng = 0;
            $qty = (int) $prs2['qty'];
            $quantiti = $qty;
        }

        $part = $this->partModel->getPart($idpart);
        $jmlhproses = (int) $part[0]['proses'];
        $namapart = $part[0]['nama_part'];
        $spoet = $part[0]['spot'];

        $proses2 = $this->proses2Model->getProcess2($idpart);
        $idproses2 = $proses2[0]['id'];
        $planawal2 = (int) $proses2[0]['plan2'];
        $actualawal2 = (int) $proses2[0]['act_proses2'];
        $actualjadi2 = $actualawal2 + $qty;
        $planjadi2 =  $planawal2 - $qty;

        $proses = $this->prosesModel->getProcess($idpart);
        $idproses = $proses[0]['id'];
        $qtyin = $proses[0]['qty_in'];
        $qtyout = $proses[0]['qty_out'];
        $qtyintotal = $qtyin + $qty;
        $qtyouttotal = $qtyout + $qty;

        if ($qty > $planawal2) {
            session()->setFlashdata('pesan','Anda Menginput Berlebih Dari Stock Yang Tersedia di Proses 2' );
            return redirect()->to('/production');
        }elseif ($qty <= $planawal2) {
            
            if ($jmlhproses !== 2) {

                $proses3 = $this->proses3Model->getProcess3($idpart);
        $idproses3 = $proses3[0]['id'];
        $planawal3 = (int) $proses3[0]['plan3'];
        $planjadi3 = (int) $planawal3 + $quantiti;

                $this->proses3Model->save([
                    'id' => $idproses3,
                    'plan3' => $planjadi3
                ]);
            }elseif ($jmlhproses == 2) {
                if ($spoet == 'spot'| $spoet == '2spot') {

                    $spot = $this->spotModel->getSpotz($idpart);
        $idspot = $spot[0]['id'];
        $qtyinspot = (int) $spot[0]['qty_in'];
        $qtyoutspot = (int) $spot[0]['qty_out'];
        $qtyjadispot = $qtyinspot + $quantiti;

                    $this->spotModel->save([
                        'id' => $idspot,
                        'qty_in' => $qtyjadispot
                    ]);
                }elseif ($spoet == 'nonspot') {
                    $fg = $this->whfgModel->getWhfg($idpart);
                        if ($fg == []) {
                            $this->whfgModel->save([
                               'id_part' => $idpart,
                               'nama_part' => $namapart,
                               'qty' => $quantiti 
                            ]);

                            $this->prosesModel->save([
                                'id' => $idproses,
                                'qty_out' => $qtyouttotal
                             ]);
                        }else {
                            $idfg = $fg[0]['id'];
                            $qtyfg = (int) $fg[0]['qty'];
                            $qtyjadifg = $qtyfg + $quantiti;
                            $this->whfgModel->save([
                                'id' => $idfg,
                                'qty' => $qtyjadifg
                             ]);

                             $this->prosesModel->save([
                                'id' => $idproses,
                                'qty_out' => $qtyouttotal
                             ]);

                        }
                    
                }

            }


            
            $this->proses2Model->save([
                'id' => $idproses2,
                'plan2' => $planjadi2,
                'act_proses2' => $actualjadi2
            ]);
            

            $queryjadwal2 =  mysqli_query($this->koneksi, "select * from scheduleproduksi where id_part = $idpart and proses = 2 ");
            $hasiljadwal2 = mysqli_fetch_all($queryjadwal2, MYSQLI_ASSOC);
            $hitungjadwal2 = mysqli_num_rows($queryjadwal2);

           if ($hitungjadwal2 > 0) {
               $idjadwal2 = $hasiljadwal2[0]['id'];
                $qtydijadwal2 = (int) $hasiljadwal2[0]['qty'];
                
                if ($qty > $qtydijadwal2) {
                    $qtyjumlahjadwal = 0;
                    
                    $this->scheduleproduksiModel->save([
                        'id' => $idjadwal2,
                        'qty' => $qtyjumlahjadwal,
                        'status' => 'tidak masuk'
                    ]);

                }elseif ($qty == $qtydijadwal2) {
                    $qtyjumlahjadwal = 0;
                    
                    $this->scheduleproduksiModel->save([
                        'id' => $idjadwal2,
                        'qty' => $qtyjumlahjadwal,
                        'status' => 'tidak masuk'
                    ]);
                }elseif ($qty < $qtydijadwal2) {
                   $qtyjumlahjadwal = $qtydijadwal2 - $qty;
                   
                   $this->scheduleproduksiModel->save([
                        'id'=> $idjadwal2,
                        'qty' => $qtyjumlahjadwal,
                        'status' => 'masuk'
                   ]);
               }

            }else {
                
            }


            $querypo =  mysqli_query($this->koneksi, "select * from scheduleproduksi where id_part = $idpart and status = 'tidak masuk' ");
            $hasilpo = mysqli_fetch_all($querypo, MYSQLI_ASSOC);
            $hitungpo = mysqli_num_rows($querypo);
            if ($hitungpo < 1) {

                $querypojadwal =  mysqli_query($this->koneksi, "select * from po where id_part = $idpart and status = 'belum close' ");
            $hasilpojadwal = mysqli_fetch_all($querypojadwal, MYSQLI_ASSOC);
            $hitungpojadwal = mysqli_num_rows($querypojadwal);
            if ($hitungpojadwal > 0) {
             
                $idpo = $hasilpojadwal[0]['id'];
                $this->poModel->save([
                    'id'=>$idpo,
                    'schedule' =>'tidak masuk' 
                ]);
    
                }
                   
                }else {
                    
                }


                date_default_timezone_set('Asia/Jakarta');
            $date =date('Y-m-d H:i:s');

            $this->laporanproduksiModel->save([
                'id_part'=> $idpart,
                'proses' => 2,
                'quantity'=> $quantiti,
                'ng' => $ng,
                'keterangan' => $keterangan,
                'tanggal' => $date
            ]);


            session()->setFlashdata('pesanberhasil','Data Proses 2'.'  '.'Part'.'  ' .$namapart.'  '.'Berhasil Di Input' );
            return redirect()->to('/production');
        }

    }


    public function input3()
    {
        if (!$this->validate([
            'qty' => 'numeric'
        ])) {
            session()->setFlashdata('pesan','Input Data Gagal, Inputlah Quantity dan Quantity Not Good Dengan Angka!');
            return redirect()->to('/production');
        }
        
        
        $prs3 = $this->request->getPost();
        
        if(isset($prs3['ng'])){
            if (!$this->validate([
            'ng' => 'numeric'
        ])) {
           session()->setFlashdata('pesan','Input Data Gagal, Inputlah Quantity dan Quantity Not Good Dengan Angka!');
            return redirect()->to('/production');
        }
        }
        
        $idpart = $prs3['idpart'];
        
        if (isset($prs3['ng'])&& $prs3['ng'] !== "") {
            $quantiti = (int) $prs3['qty'];
            $keterangan = $prs3['ketng'];
            $ng = (int) $prs3['ng'];
            $qty = $quantiti + $ng;
        }else{
            $keterangan = "";
            $ng = 0;
            $qty = (int) $prs3['qty'];
            $quantiti = $qty;
        }


        $part = $this->partModel->getPart($idpart);
        $jmlhproses = (int) $part[0]['proses'];
        $namapart = $part[0]['nama_part'];
        $spoet = $part[0]['spot'];

        $proses3 = $this->proses3Model->getProcess3($idpart);
        $idproses3 = $proses3[0]['id'];
        $planawal3 = (int) $proses3[0]['plan3'];
        $actualawal3 = (int) $proses3[0]['act_proses3'];
        $actualjadi3 = $actualawal3 + $qty;
        $planjadi3 =  $planawal3 - $qty;

        $proses = $this->prosesModel->getProcess($idpart);
        $idproses = $proses[0]['id'];
        $qtyin = $proses[0]['qty_in'];
        $qtyout = $proses[0]['qty_out'];
        $qtyintotal = $qtyin + $qty;
        $qtyouttotal = $qtyout + $qty;

        if ($qty > $planawal3) {
            session()->setFlashdata('pesan','Anda Menginput Berlebih Dari Stock Yang Tersedia di Proses 3' );
            return redirect()->to('/production');
        }elseif ($qty <= $planawal3) {
            
            if ($jmlhproses !== 3) {

                $proses4 = $this->proses4Model->getProcess4($idpart);
        $idproses4 = $proses4[0]['id'];
        $planawal4 = (int) $proses4[0]['plan4'];
        $planjadi4 = (int) $planawal4 + $quantiti;

                $this->proses4Model->save([
                    'id' => $idproses4,
                    'plan4' => $planjadi4
                ]);
            }elseif ($jmlhproses == 3) {
                if ($spoet == 'spot' |$spoet =='2spot' ) {

                    $spot = $this->spotModel->getSpotz($idpart);
        $idspot = $spot[0]['id'];
        $qtyinspot = (int) $spot[0]['qty_in'];
        $qtyoutspot = (int) $spot[0]['qty_out'];
        $qtyjadispot = $qtyinspot + $quantiti;

                    $this->spotModel->save([
                        'id' => $idspot,
                        'qty_in' => $qtyjadispot
                    ]);
                }elseif ($spoet == 'nonspot') {
                    $fg = $this->whfgModel->getWhfg($idpart);
                        if ($fg == []) {
                            $this->whfgModel->save([
                               'id_part' => $idpart,
                               'nama_part' => $namapart,
                               'qty' => $quantiti 
                            ]);

                            $this->prosesModel->save([
                                'id' => $idproses,
                                'qty_out' => $qtyouttotal
                             ]);

                        }else {
                            $idfg = $fg[0]['id'];
                            $qtyfg = (int) $fg[0]['qty'];
                            $qtyjadifg = $qtyfg + $quantiti;
                            $this->whfgModel->save([
                                'id' => $idfg,
                                'qty' => $qtyjadifg
                             ]);

                             $this->prosesModel->save([
                                'id' => $idproses,
                                'qty_out' => $qtyouttotal
                             ]);

                        }
                    
                }

            }


            
            $this->proses3Model->save([
                'id' => $idproses3,
                'plan3' => $planjadi3,
                'act_proses3' => $actualjadi3
            ]);
            

            $queryjadwal3 =  mysqli_query($this->koneksi, "select * from scheduleproduksi where id_part = $idpart and proses = 3 ");
            $hasiljadwal3 = mysqli_fetch_all($queryjadwal3, MYSQLI_ASSOC);
            $hitungjadwal3 = mysqli_num_rows($queryjadwal3);

           if ($hitungjadwal3 > 0) {
               $idjadwal3 = $hasiljadwal3[0]['id'];
                $qtydijadwal3 = (int) $hasiljadwal3[0]['qty'];
                
                if ($qty > $qtydijadwal3) {
                    $qtyjumlahjadwal = 0;
                    
                    $this->scheduleproduksiModel->save([
                        'id' => $idjadwal3,
                        'qty' => $qtyjumlahjadwal,
                        'status' => 'tidak masuk'
                    ]);

                }elseif ($qty == $qtydijadwal3) {
                    $qtyjumlahjadwal = 0;
                    
                    $this->scheduleproduksiModel->save([
                        'id' => $idjadwal3,
                        'qty' => $qtyjumlahjadwal,
                        'status' => 'tidak masuk'
                    ]);
                }elseif ($qty < $qtydijadwal3) {
                   $qtyjumlahjadwal = $qtydijadwal3 - $qty;
                   
                   $this->scheduleproduksiModel->save([
                        'id'=> $idjadwal3,
                        'qty' => $qtyjumlahjadwal,
                        'status' => 'masuk'
                   ]);
               }

            }else {
                
            }


            $querypo =  mysqli_query($this->koneksi, "select * from scheduleproduksi where id_part = $idpart and status = 'tidak masuk' ");
            $hasilpo = mysqli_fetch_all($querypo, MYSQLI_ASSOC);
            $hitungpo = mysqli_num_rows($querypo);
            if ($hitungpo < 1) {

                $querypojadwal =  mysqli_query($this->koneksi, "select * from po where id_part = $idpart and status = 'belum close' ");
            $hasilpojadwal = mysqli_fetch_all($querypojadwal, MYSQLI_ASSOC);
            $hitungpojadwal = mysqli_num_rows($querypojadwal);
            if ($hitungpojadwal > 0) {
             
                $idpo = $hasilpojadwal[0]['id'];
                $this->poModel->save([
                    'id'=>$idpo,
                    'schedule' =>'tidak masuk' 
                ]);
    
                }
                   
                }else {
                    
                }

                date_default_timezone_set('Asia/Jakarta');
            $date =date('Y-m-d H:i:s');

            $this->laporanproduksiModel->save([
                'id_part'=> $idpart,
                'proses' => 3,
                'quantity'=> $quantiti,
                'ng' => $ng,
                'keterangan' => $keterangan,
                'tanggal' => $date
            ]);

            session()->setFlashdata('pesanberhasil','Data Proses 3'.'  '.'Part'.'  ' .$namapart.'  '.'Berhasil Di Input' );
            return redirect()->to('/production');
        }

    }

    public function input4()
    {
        if (!$this->validate([
            'qty' => 'numeric'
        ])) {
            session()->setFlashdata('pesan','Input Data Gagal, Inputlah Quantity dan Quantity Not Good Dengan Angka!');
            return redirect()->to('/production');
        }
        
        
        $prs4 = $this->request->getPost();
        
        if(isset($prs4['ng'])){
            if (!$this->validate([
            'ng' => 'numeric'
        ])) {
           session()->setFlashdata('pesan','Input Data Gagal, Inputlah Quantity dan Quantity Not Good Dengan Angka!');
            return redirect()->to('/production');
        }
        }
        
        $idpart = $prs4['idpart'];
        
        if (isset($prs4['ng'])&& $prs4['ng'] !== "") {
            $quantiti = (int) $prs4['qty'];
            $keterangan = $prs4['ketng'];
            $ng = (int) $prs4['ng'];
            $qty = $quantiti + $ng;
        }else{
            $keterangan = "";
            $ng = 0;
            $qty = (int) $prs4['qty'];
            $quantiti = $qty;
        }

        $part = $this->partModel->getPart($idpart);
        $jmlhproses = (int) $part[0]['proses'];
        $namapart = $part[0]['nama_part'];
        $spoet = $part[0]['spot'];

        $proses4 = $this->proses4Model->getProcess4($idpart);
        $idproses4 = $proses4[0]['id'];
        $planawal4 = (int) $proses4[0]['plan4'];
        $actualawal4 = (int) $proses4[0]['act_proses4'];
        $actualjadi4 = $actualawal4 + $qty;
        $planjadi4 =  $planawal4 - $qty;

        $proses = $this->prosesModel->getProcess($idpart);
        $idproses = $proses[0]['id'];
        $qtyin = $proses[0]['qty_in'];
        $qtyout = $proses[0]['qty_out'];
        $qtyintotal = $qtyin + $qty;
        $qtyouttotal = $qtyout + $qty;

        if ($qty > $planawal4) {
            session()->setFlashdata('pesan','Anda Menginput Berlebih Dari Stock Yang Tersedia di Proses 4' );
            return redirect()->to('/production');
        }elseif ($qty <= $planawal4) {
            
            if ($jmlhproses !== 4) {

                $proses5 = $this->proses5Model->getProcess5($idpart);
        $idproses5 = $proses5[0]['id'];
        $planawal5 = (int) $proses5[0]['plan5'];
        $planjadi5 = (int) $planawal5 + $quantiti;

                $this->proses5Model->save([
                    'id' => $idproses5,
                    'plan5' => $planjadi5
                ]);
            }elseif ($jmlhproses == 4) {
                if ($spoet == 'spot' | $spoet =='2spot') {

                    $spot = $this->spotModel->getSpotz($idpart);
        $idspot = $spot[0]['id'];
        $qtyinspot = (int) $spot[0]['qty_in'];
        $qtyoutspot = (int) $spot[0]['qty_out'];
        $qtyjadispot = $qtyinspot + $quantiti;

                    $this->spotModel->save([
                        'id' => $idspot,
                        'qty_in' => $qtyjadispot
                    ]);
                }elseif ($spoet == 'nonspot') {
                    $fg = $this->whfgModel->getWhfg($idpart);
                        if ($fg == []) {
                            $this->whfgModel->save([
                               'id_part' => $idpart,
                               'nama_part' => $namapart,
                               'qty' => $quantiti
                            ]);

                            $this->prosesModel->save([
                                'id' => $idproses,
                                'qty_out' => $qtyouttotal
                             ]);

                        }else {
                            $idfg = $fg[0]['id'];
                            $qtyfg = (int) $fg[0]['qty'];
                            $qtyjadifg = $qtyfg + $quantiti;
                            $this->whfgModel->save([
                                'id' => $idfg,
                                'qty' => $qtyjadifg
                             ]);

                             $this->prosesModel->save([
                                'id' => $idproses,
                                'qty_out' => $qtyouttotal
                             ]);

                        }
                    
                }

            }


            
            $this->proses4Model->save([
                'id' => $idproses4,
                'plan4' => $planjadi4,
                'act_proses4' => $actualjadi4
            ]);
            

            $queryjadwal4 =  mysqli_query($this->koneksi, "select * from scheduleproduksi where id_part = $idpart and proses = 4 ");
            $hasiljadwal4 = mysqli_fetch_all($queryjadwal4, MYSQLI_ASSOC);
            $hitungjadwal4 = mysqli_num_rows($queryjadwal4);

           if ($hitungjadwal4 > 0) {
               $idjadwal4 = $hasiljadwal4[0]['id'];
                $qtydijadwal4 = (int) $hasiljadwal4[0]['qty'];
                
                if ($qty > $qtydijadwal4) {
                    $qtyjumlahjadwal = 0;
                    
                    $this->scheduleproduksiModel->save([
                        'id' => $idjadwal4,
                        'qty' => $qtyjumlahjadwal,
                        'status' => 'tidak masuk'
                    ]);

                }elseif ($qty == $qtydijadwal4) {
                    $qtyjumlahjadwal = 0;
                    
                    $this->scheduleproduksiModel->save([
                        'id' => $idjadwal4,
                        'qty' => $qtyjumlahjadwal,
                        'status' => 'tidak masuk'
                    ]);
                }elseif ($qty < $qtydijadwal4) {
                   $qtyjumlahjadwal = $qtydijadwal4 - $qty;
                   
                   $this->scheduleproduksiModel->save([
                        'id'=> $idjadwal4,
                        'qty' => $qtyjumlahjadwal,
                        'status' => 'masuk'
                   ]);
               }

            }else {
                
            }


            $querypo =  mysqli_query($this->koneksi, "select * from scheduleproduksi where id_part = $idpart and status = 'tidak masuk' ");
            $hasilpo = mysqli_fetch_all($querypo, MYSQLI_ASSOC);
            $hitungpo = mysqli_num_rows($querypo);
            if ($hitungpo < 1) {

                $querypojadwal =  mysqli_query($this->koneksi, "select * from po where id_part = $idpart and status = 'belum close' ");
            $hasilpojadwal = mysqli_fetch_all($querypojadwal, MYSQLI_ASSOC);
            $hitungpojadwal = mysqli_num_rows($querypojadwal);
            if ($hitungpojadwal > 0 ) {
             
                $idpo = $hasilpojadwal[0]['id'];
                $this->poModel->save([
                    'id'=>$idpo,
                    'schedule' =>'tidak masuk' 
                ]);
    
                }
                   
                }else {
                    
                }

                date_default_timezone_set('Asia/Jakarta');
            $date =date('Y-m-d H:i:s');

            $this->laporanproduksiModel->save([
                'id_part'=> $idpart,
                'proses' => 4,
                'quantity'=> $quantiti,
                'ng' => $ng,
                'keterangan' => $keterangan,
                'tanggal' => $date
            ]);

            session()->setFlashdata('pesanberhasil','Data Proses 4'.'  '.'Part'.'  ' .$namapart.'  '.'Berhasil Di Input' );
            return redirect()->to('/production');
        }
    }

    public function input5()
    {
        if (!$this->validate([
            'qty' => 'numeric'
        ])) {
            session()->setFlashdata('pesan','Input Data Gagal, Inputlah Quantity dan Quantity Not Good Dengan Angka!');
            return redirect()->to('/production');
        }
        
        
        $prs5 = $this->request->getPost();
        
        if(isset($prs5['ng'])){
            if (!$this->validate([
            'ng' => 'numeric'
        ])) {
           session()->setFlashdata('pesan','Input Data Gagal, Inputlah Quantity dan Quantity Not Good Dengan Angka!');
            return redirect()->to('/production');
        }
        }
        
        $idpart = $prs5['idpart'];
        
        if (isset($prs5['ng'])&& $prs5['ng'] !== "") {
            $quantiti = (int) $prs5['qty'];
            $keterangan = $prs5['ketng'];
            $ng = (int) $prs5['ng'];
            $qty = $quantiti + $ng;
        }else{
            $keterangan = "";
            $ng = 0;
            $qty = (int) $prs5['qty'];
            $quantiti = $qty;
        }

        $part = $this->partModel->getPart($idpart);
        $jmlhproses = (int) $part[0]['proses'];
        $namapart = $part[0]['nama_part'];
        $spoet = $part[0]['spot'];

        $proses5 = $this->proses5Model->getProcess5($idpart);
        $idproses5 = $proses5[0]['id'];
        $planawal5 = (int) $proses5[0]['plan5'];
        $actualawal5 = (int) $proses5[0]['act_proses5'];
        $actualjadi5 = $actualawal5 + $qty;
        $planjadi5 =  $planawal5 - $qty;

        $proses = $this->prosesModel->getProcess($idpart);
        $idproses = $proses[0]['id'];
        $qtyin = $proses[0]['qty_in'];
        $qtyout = $proses[0]['qty_out'];
        $qtyintotal = $qtyin + $qty;
        $qtyouttotal = $qtyout + $qty;

        if ($qty > $planawal5) {
            session()->setFlashdata('pesan','Anda Menginput Berlebih Dari Stock Yang Tersedia di Proses 5' );
            return redirect()->to('/production');
        }elseif ($qty <= $planawal5) {
            
            if ($jmlhproses !== 5) {

                $proses6 = $this->proses6Model->getProcess6($idpart);
        $idproses6 = $proses6[0]['id'];
        $planawal6 = (int) $proses6[0]['plan6'];
        $planjadi6 = (int) $planawal6 + $quantiti;

                $this->proses6Model->save([
                    'id' => $idproses6,
                    'plan6' => $planjadi6
                ]);
            }elseif ($jmlhproses == 5) {
                if ($spoet == 'spot' | $spoet == '2spot') {

                    $spot = $this->spotModel->getSpotz($idpart);
        $idspot = $spot[0]['id'];
        $qtyinspot = (int) $spot[0]['qty_in'];
        $qtyoutspot = (int) $spot[0]['qty_out'];
        $qtyjadispot = $qtyinspot + $quantiti;

                    $this->spotModel->save([
                        'id' => $idspot,
                        'qty_in' => $qtyjadispot
                    ]);
                }elseif ($spoet == 'nonspot') {
                    $fg = $this->whfgModel->getWhfg($idpart);
                        if ($fg == []) {
                            $this->whfgModel->save([
                               'id_part' => $idpart,
                               'nama_part' => $namapart,
                               'qty' => $quantiti 
                            ]);

                            $this->prosesModel->save([
                                'id' => $idproses,
                                'qty_out' => $qtyouttotal
                             ]);

                        }else {
                            $idfg = $fg[0]['id'];
                            $qtyfg = (int) $fg[0]['qty'];
                            $qtyjadifg = $qtyfg + $quantiti;
                            $this->whfgModel->save([
                                'id' => $idfg,
                                'qty' => $qtyjadifg
                             ]);

                             $this->prosesModel->save([
                                'id' => $idproses,
                                'qty_out' => $qtyouttotal
                             ]);

                        }
                    
                }

            }


            
            $this->proses5Model->save([
                'id' => $idproses5,
                'plan5' => $planjadi5,
                'act_proses5' => $actualjadi5
            ]);
            

            $queryjadwal5 =  mysqli_query($this->koneksi, "select * from scheduleproduksi where id_part = $idpart and proses = 5 ");
            $hasiljadwal5 = mysqli_fetch_all($queryjadwal5, MYSQLI_ASSOC);
            $hitungjadwal5 = mysqli_num_rows($queryjadwal5);

           if ($hitungjadwal5 > 0) {
               $idjadwal5 = $hasiljadwal5[0]['id'];
                $qtydijadwal5 = (int) $hasiljadwal5[0]['qty'];
                
                if ($qty > $qtydijadwal5) {
                    $qtyjumlahjadwal = 0;
                    
                    $this->scheduleproduksiModel->save([
                        'id' => $idjadwal5,
                        'qty' => $qtyjumlahjadwal,
                        'status' => 'tidak masuk'
                    ]);

                }elseif ($qty == $qtydijadwal5) {
                    $qtyjumlahjadwal = 0;
                    
                    $this->scheduleproduksiModel->save([
                        'id' => $idjadwal5,
                        'qty' => $qtyjumlahjadwal,
                        'status' => 'tidak masuk'
                    ]);
                }elseif ($qty < $qtydijadwal5) {
                   $qtyjumlahjadwal = $qtydijadwal5 - $qty;
                   
                   $this->scheduleproduksiModel->save([
                        'id'=> $idjadwal5,
                        'qty' => $qtyjumlahjadwal,
                        'status' => 'masuk'
                   ]);
               }

            }else {
                
            }


            $querypo =  mysqli_query($this->koneksi, "select * from scheduleproduksi where id_part = $idpart and status = 'tidak masuk' ");
            $hasilpo = mysqli_fetch_all($querypo, MYSQLI_ASSOC);
            $hitungpo = mysqli_num_rows($querypo);
            if ($hitungpo < 1) {

                $querypojadwal =  mysqli_query($this->koneksi, "select * from po where id_part = $idpart and status = 'belum close' ");
            $hasilpojadwal = mysqli_fetch_all($querypojadwal, MYSQLI_ASSOC);
            $hitungpojadwal = mysqli_num_rows($querypojadwal);
            if ($hitungpojadwal > 0) {
             
                $idpo = $hasilpojadwal[0]['id'];
                $this->poModel->save([
                    'id'=>$idpo,
                    'schedule' =>'tidak masuk' 
                ]);
    
                }
                   
                }else {
                    
                }


                date_default_timezone_set('Asia/Jakarta');
            $date =date('Y-m-d H:i:s');

            $this->laporanproduksiModel->save([
                'id_part'=> $idpart,
                'proses' => 5,
                'quantity'=> $quantiti,
                'ng' => $ng,
                'keterangan' => $keterangan,
                'tanggal' => $date
            ]);


            session()->setFlashdata('pesanberhasil','Data Proses 5'.'  '.'Part'.'  ' .$namapart.'  '.'Berhasil Di Input' );
            return redirect()->to('/production');
        }
    }

    public function input6()
    {
        if (!$this->validate([
            'qty' => 'numeric'
        ])) {
            session()->setFlashdata('pesan','Input Data Gagal, Inputlah Quantity dan Quantity Not Good Dengan Angka!');
            return redirect()->to('/production');
        }
        
        
        $prs6 = $this->request->getPost();
        
        if(isset($prs6['ng'])){
            if (!$this->validate([
            'ng' => 'numeric'
        ])) {
           session()->setFlashdata('pesan','Input Data Gagal, Inputlah Quantity dan Quantity Not Good Dengan Angka!');
            return redirect()->to('/production');
        }
        }
        
        $idpart = $prs6['idpart'];
        
        if (isset($prs6['ng'])&& $prs6['ng'] !== "") {
            $quantiti = (int) $prs6['qty'];
            $keterangan = $prs6['ketng'];
            $ng = (int) $prs6['ng'];
            $qty = $quantiti + $ng;
        }else{
            $keterangan = "";
            $ng = 0;
            $qty = (int) $prs6['qty'];
            $quantiti = $qty;
        }

        $part = $this->partModel->getPart($idpart);
        $jmlhproses = (int) $part[0]['proses'];
        $namapart = $part[0]['nama_part'];
        $spoet = $part[0]['spot'];

        $proses6 = $this->proses6Model->getProcess6($idpart);
        $idproses6 = $proses6[0]['id'];
        $planawal6 = (int) $proses6[0]['plan6'];
        $actualawal6 = (int) $proses6[0]['act_proses6'];
        $actualjadi6 = $actualawal6 + $qty;
        $planjadi6 =  $planawal6 - $qty;

        $proses = $this->prosesModel->getProcess($idpart);
        $idproses = $proses[0]['id'];
        $qtyin = $proses[0]['qty_in'];
        $qtyout = $proses[0]['qty_out'];
        $qtyintotal = $qtyin + $qty;
        $qtyouttotal = $qtyout + $qty;

        if ($qty > $planawal6) {
            session()->setFlashdata('pesan','Anda Menginput Berlebih Dari Stock Yang Tersedia di Proses 6' );
            return redirect()->to('/production');
        }elseif ($qty <= $planawal6) {
            
            if ($jmlhproses !== 6) {

                $proses7 = $this->proses7Model->getProcess7($idpart);
        $idproses7 = $proses7[0]['id'];
        $planawal7 = (int) $proses7[0]['plan7'];
        $planjadi7 = (int) $planawal7 + $quantiti;

                $this->proses7Model->save([
                    'id' => $idproses7,
                    'plan7' => $planjadi7
                ]);
            }elseif ($jmlhproses == 6) {
                if ($spoet == 'spot' | $spoet == '2spot') {

                    $spot = $this->spotModel->getSpotz($idpart);
        $idspot = $spot[0]['id'];
        $qtyinspot = (int) $spot[0]['qty_in'];
        $qtyoutspot = (int) $spot[0]['qty_out'];
        $qtyjadispot = $qtyinspot + $quantiti;

                    $this->spotModel->save([
                        'id' => $idspot,
                        'qty_in' => $qtyjadispot
                    ]);
                }elseif ($spoet == 'nonspot') {
                    $fg = $this->whfgModel->getWhfg($idpart);
                        if ($fg == []) {
                            $this->whfgModel->save([
                               'id_part' => $idpart,
                               'nama_part' => $namapart,
                               'qty' => $quantiti 
                            ]);

                            $this->prosesModel->save([
                                'id' => $idproses,
                                'qty_out' => $qtyouttotal
                             ]);

                        }else {
                            $idfg = $fg[0]['id'];
                            $qtyfg = (int) $fg[0]['qty'];
                            $qtyjadifg = $qtyfg + $quantiti;
                            $this->whfgModel->save([
                                'id' => $idfg,
                                'qty' => $qtyjadifg
                             ]);

                             $this->prosesModel->save([
                                'id' => $idproses,
                                'qty_out' => $qtyouttotal
                             ]);

                        }
                    
                }

            }


            
            $this->proses6Model->save([
                'id' => $idproses6,
                'plan6' => $planjadi6,
                'act_proses6' => $actualjadi6
            ]);
            

            $queryjadwal6 =  mysqli_query($this->koneksi, "select * from scheduleproduksi where id_part = $idpart and proses = 6 ");
            $hasiljadwal6 = mysqli_fetch_all($queryjadwal6, MYSQLI_ASSOC);
            $hitungjadwal6 = mysqli_num_rows($queryjadwal6);

           if ($hitungjadwal6 > 0) {
               $idjadwal6 = $hasiljadwal6[0]['id'];
                $qtydijadwal6 = (int) $hasiljadwal6[0]['qty'];
                
                if ($qty > $qtydijadwal6) {
                    $qtyjumlahjadwal = 0;
                    
                    $this->scheduleproduksiModel->save([
                        'id' => $idjadwal6,
                        'qty' => $qtyjumlahjadwal,
                        'status' => 'tidak masuk'
                    ]);

                }elseif ($qty == $qtydijadwal6) {
                    $qtyjumlahjadwal = 0;
                    
                    $this->scheduleproduksiModel->save([
                        'id' => $idjadwal6,
                        'qty' => $qtyjumlahjadwal,
                        'status' => 'tidak masuk'
                    ]);
                }elseif ($qty < $qtydijadwal6) {
                   $qtyjumlahjadwal = $qtydijadwal6 - $qty;
                   
                   $this->scheduleproduksiModel->save([
                        'id'=> $idjadwal6,
                        'qty' => $qtyjumlahjadwal,
                        'status' => 'masuk'
                   ]);
               }

            }else {
                
            }


            $querypo =  mysqli_query($this->koneksi, "select * from scheduleproduksi where id_part = $idpart and status = 'tidak masuk' ");
            $hasilpo = mysqli_fetch_all($querypo, MYSQLI_ASSOC);
            $hitungpo = mysqli_num_rows($querypo);
            if ($hitungpo < 1) {

                $querypojadwal =  mysqli_query($this->koneksi, "select * from po where id_part = $idpart and status = 'belum close' ");
            $hasilpojadwal = mysqli_fetch_all($querypojadwal, MYSQLI_ASSOC);
            $hitungpojadwal = mysqli_num_rows($querypojadwal);
            if ($hitungpojadwal > 0) {
             
                $idpo = $hasilpojadwal[0]['id'];
                $this->poModel->save([
                    'id'=>$idpo,
                    'schedule' =>'tidak masuk' 
                ]);
    
                }
                   
                }else {
                    
                }

                date_default_timezone_set('Asia/Jakarta');
            $date =date('Y-m-d H:i:s');

            $this->laporanproduksiModel->save([
                'id_part'=> $idpart,
                'proses' => 6,
                'quantity'=> $quantiti,
                'ng' => $ng,
                'keterangan' => $keterangan,
                'tanggal' => $date
            ]);

            session()->setFlashdata('pesanberhasil','Data Proses 6'.'  '.'Part'.'  ' .$namapart.'  '.'Berhasil Di Input' );
            return redirect()->to('/production');
        }
    }

    public function input7()
    {
        if (!$this->validate([
            'qty' => 'numeric'
        ])) {
            session()->setFlashdata('pesan','Input Data Gagal, Inputlah Quantity dan Quantity Not Good Dengan Angka!');
            return redirect()->to('/production');
        }
        
        
        $prs7 = $this->request->getPost();
        
        if(isset($prs7['ng'])){
            if (!$this->validate([
            'ng' => 'numeric'
        ])) {
           session()->setFlashdata('pesan','Input Data Gagal, Inputlah Quantity dan Quantity Not Good Dengan Angka!');
            return redirect()->to('/production');
        }
        }
        
        $idpart = $prs7['idpart'];
        if (isset($prs7['ng'])&& $prs7['ng'] !== "") {
            $quantiti = (int) $prs7['qty'];
            $keterangan = $prs7['ketng'];
            $ng = (int) $prs7['ng'];
            $qty = $quantiti + $ng;
        }else{
            $keterangan = "";
            $ng = 0;
            $qty = (int) $prs7['qty'];
            $quantiti = $qty;
        }

        $part = $this->partModel->getPart($idpart);
        $jmlhproses = (int) $part[0]['proses'];
        $namapart = $part[0]['nama_part'];
        $spoet = $part[0]['spot'];

        $proses7 = $this->proses7Model->getProcess7($idpart);
        $idproses7 = $proses7[0]['id'];
        $planawal7 = (int) $proses7[0]['plan7'];
        $actualawal7 = (int) $proses7[0]['act_proses7'];
        $actualjadi7 = $actualawal7 + $qty;
        $planjadi7 =  $planawal7 - $qty;

        $proses = $this->prosesModel->getProcess($idpart);
        $idproses = $proses[0]['id'];
        $qtyin = $proses[0]['qty_in'];
        $qtyout = $proses[0]['qty_out'];
        $qtyintotal = $qtyin + $qty;
        $qtyouttotal = $qtyout + $qty;

        if ($qty > $planawal7) {
            session()->setFlashdata('pesan','Anda Menginput Berlebih Dari Stock Yang Tersedia di Proses 7' );
            return redirect()->to('/production');
        }elseif ($qty <= $planawal7) {
            
            if ($jmlhproses !== 7) {

            }elseif ($jmlhproses == 7) {
                if ($spoet == 'spot' | $spoet == '2spot') {

                    $spot = $this->spotModel->getSpotz($idpart);
        $idspot = $spot[0]['id'];
        $qtyinspot = (int) $spot[0]['qty_in'];
        $qtyoutspot = (int) $spot[0]['qty_out'];
        $qtyjadispot = $qtyinspot + $quantiti;

                    $this->spotModel->save([
                        'id' => $idspot,
                        'qty_in' => $qtyjadispot
                    ]);
                }elseif ($spoet == 'nonspot') {
                    $fg = $this->whfgModel->getWhfg($idpart);
                        if ($fg == []) {
                            $this->whfgModel->save([
                               'id_part' => $idpart,
                               'nama_part' => $namapart,
                               'qty' => $quantiti 
                            ]);

                            $this->prosesModel->save([
                                'id' => $idproses,
                                'qty_out' => $qtyouttotal
                             ]);

                        }else {
                            $idfg = $fg[0]['id'];
                            $qtyfg = (int) $fg[0]['qty'];
                            $qtyjadifg = $qtyfg + $quantiti;
                            $this->whfgModel->save([
                                'id' => $idfg,
                                'qty' => $qtyjadifg
                             ]);

                             $this->prosesModel->save([
                                'id' => $idproses,
                                'qty_out' => $qtyouttotal
                             ]);

                        }
                    
                }

            }


            
            $this->proses7Model->save([
                'id' => $idproses7,
                'plan7' => $planjadi7,
                'act_proses7' => $actualjadi7
            ]);
            

            $queryjadwal7 =  mysqli_query($this->koneksi, "select * from scheduleproduksi where id_part = $idpart and proses = 7 ");
            $hasiljadwal7 = mysqli_fetch_all($queryjadwal7, MYSQLI_ASSOC);
            $hitungjadwal7 = mysqli_num_rows($queryjadwal7);

           if ($hitungjadwal7 > 0) {
               $idjadwal7 = $hasiljadwal7[0]['id'];
                $qtydijadwal7 = (int) $hasiljadwal7[0]['qty'];
                
                if ($qty > $qtydijadwal7) {
                    $qtyjumlahjadwal = 0;
                    
                    $this->scheduleproduksiModel->save([
                        'id' => $idjadwal7,
                        'qty' => $qtyjumlahjadwal,
                        'status' => 'tidak masuk'
                    ]);

                }elseif ($qty == $qtydijadwal7) {
                    $qtyjumlahjadwal = 0;
                    
                    $this->scheduleproduksiModel->save([
                        'id' => $idjadwal7,
                        'qty' => $qtyjumlahjadwal,
                        'status' => 'tidak masuk'
                    ]);
                }elseif ($qty < $qtydijadwal7) {
                   $qtyjumlahjadwal = $qtydijadwal7 - $qty;
                   
                   $this->scheduleproduksiModel->save([
                        'id'=> $idjadwal7,
                        'qty' => $qtyjumlahjadwal,
                        'status' => 'masuk'
                   ]);
               }

            }else {
                
            }


            $querypo =  mysqli_query($this->koneksi, "select * from scheduleproduksi where id_part = $idpart and status = 'tidak masuk' ");
            $hasilpo = mysqli_fetch_all($querypo, MYSQLI_ASSOC);
            $hitungpo = mysqli_num_rows($querypo);
            if ($hitungpo < 1) {

                $querypojadwal =  mysqli_query($this->koneksi, "select * from po where id_part = $idpart and status = 'belum close' ");
            $hasilpojadwal = mysqli_fetch_all($querypojadwal, MYSQLI_ASSOC);
            $hitungpojadwal = mysqli_num_rows($querypojadwal);
            if ($hitungpojadwal > 0) {
             
                $idpo = $hasilpojadwal[0]['id'];
                $this->poModel->save([
                    'id'=>$idpo,
                    'schedule' =>'tidak masuk' 
                ]);
    
                }
                   
                }else {
                    
                }

                date_default_timezone_set('Asia/Jakarta');
                $date =date('Y-m-d H:i:s');
    
                $this->laporanproduksiModel->save([
                    'id_part'=> $idpart,
                    'proses' => 7,
                    'quantity'=> $quantiti,
                    'ng' => $ng,
                    'keterangan' => $keterangan,
                    'tanggal' => $date
                ]);

            session()->setFlashdata('pesanberhasil','Data Proses 7'.'  '.'Part'.'  ' .$namapart.'  '.'Berhasil Di Input' );
            return redirect()->to('/production');
        }
    }



    public function inputspot()
    {
        if (!$this->validate([
            'qty' => 'numeric'
        ])) {
           session()->setFlashdata('pesan','Input Data Gagal, Inputlah Quantity dan Quantity Not Good Dengan Angka!');
            return redirect()->to('/production');
        }
        
        
        
        $prsspot = $this->request->getPost();
        
        if(isset($prsspot['ng'])){
            if (!$this->validate([
            'ng' => 'numeric'
        ])) {
           session()->setFlashdata('pesan','Input Data Gagal, Inputlah Quantity dan Quantity Not Good Dengan Angka!');
            return redirect()->to('/production');
        }
            
        }
        
        $idpart = $prsspot['idpart'];
        $idwh = $prsspot['idwh'];
        
        if (isset($prsspot['ng'])&& $prsspot['ng'] !== "") {
            $quantiti = (int) $prsspot['qty'];
            $keterangan = $prsspot['ketng'];
            $ng = (int) $prsspot['ng'];
            $qty = $quantiti + $ng;
        }else{
            $keterangan = "";
            $ng = 0;
            $qty = (int) $prsspot['qty'];
            $quantiti = $qty;
        }

        $wh = $this->whModel->getWh($idwh);
        $qtyawalwh = (int) $wh[0]['total_qty'];
        $namamaterial = $wh[0]['nama_material'];

        $part = $this->partModel->getPart($idpart);
        $jmlhproses = (int) $part[0]['proses'];
        $namapart = $part[0]['nama_part'];
        $spoets = $part[0]['spot'];
        $nut2 = (int) $part[0]['nut2'];
        $nut = (int) $part[0]['nut'];
        $nutkepake = $qty * $nut;
        $sisanut = $qtyawalwh - $nutkepake;

        $proses = $this->prosesModel->getProcess($idpart);
        $idproses = $proses[0]['id'];
        $qtyin = $proses[0]['qty_in'];
        $qtyout = $proses[0]['qty_out'];
        $qtyintotal = $qtyin - $qty;
        $qtyouttotal = $qtyout + $qty;
        
        $spot = $this->spotModel->getSpot1($idpart);
        $idspot = $spot[0]['id'];
        $namaproses = $spot[0]['nama_proses'];
        $qtyinspot = (int) $spot[0]['qty_in'];
        $qtyoutspot = (int) $spot[0]['qty_out'];
        $qtyjadispot = $qtyoutspot + $qty;
        $qtysisaspot = $qtyinspot - $qty;

        if ($qty > $qtyinspot) {
            session()->setFlashdata('pesan','Input Gagal, Anda Menginput Berlebih Dari Stock Yang Tersedia' );
            return redirect()->to('/production');
        }else {
            
            if ($nutkepake > $qtyawalwh) {
            session()->setFlashdata('pesan','Input Gagal, Quantity '. $namamaterial .' Stock Di Warehouse RM Kurang' );
            return redirect()->to('/production');
        }else {
            $this->whModel->save([
                'id' => $idwh,
                'total_qty' => $sisanut
            ]);
        }
            
            if($spoets == 'spot'){
            $fg = $this->whfgModel->getWhfg($idpart);
                        if ($fg == []) {
                            $this->whfgModel->save([
                               'id_part' => $idpart,
                               'nama_part' => $namapart,
                               'qty' => $quantiti 
                            ]);

                            $this->prosesModel->save([
                                'id' => $idproses,
                                'qty_out' => $qtyouttotal
                             ]);

                        }else {
                            $idfg = $fg[0]['id'];
                            $qtyfg = (int) $fg[0]['qty'];
                            $qtyjadifg = $qtyfg + $quantiti;
                            $this->whfgModel->save([
                                'id' => $idfg,
                                'qty' => $qtyjadifg
                             ]);

                             $this->prosesModel->save([
                                'id' => $idproses,
                                'qty_out' => $qtyouttotal
                             ]);

                        }
                        
            }elseif($spoets == '2spot'){
                $spot2 = $this->spotModel->getSpot2($idpart);
                $idspot2 = $spot2[0]['id'];
                $qtyinspot2 = (int) $spot2[0]['qty_in'];
                $qtyjadispot2 = $qtyinspot2 + $quantiti;
                
                $this->spotModel->save([
                    'id' => $idspot2,
                    'qty_in' => $qtyjadispot2
                    ]);
                
                
                
            }            
                        $this->spotModel->save([
                            'id' => $idspot,
                            'qty_in' => $qtysisaspot,
                            'qty_out' => $qtyjadispot
                        ]);

        }


        $queryjadwal8 =  mysqli_query($this->koneksi, "select * from scheduleproduksi where id_part = $idpart and proses = 8 ");
        $hasiljadwal8 = mysqli_fetch_all($queryjadwal8, MYSQLI_ASSOC);
        $hitungjadwal8 = mysqli_num_rows($queryjadwal8);

       if ($hitungjadwal8 > 0) {
           $idjadwal8 = $hasiljadwal8[0]['id'];
            $qtydijadwal8 = (int) $hasiljadwal8[0]['qty'];
            
            if ($qty > $qtydijadwal8) {
                $qtyjumlahjadwal = 0;
                
                $this->scheduleproduksiModel->save([
                    'id' => $idjadwal8,
                    'qty' => $qtyjumlahjadwal,
                    'status' => 'tidak masuk'
                ]);

            }elseif ($qty == $qtydijadwal8) {
                $qtyjumlahjadwal = 0;
                
                $this->scheduleproduksiModel->save([
                    'id' => $idjadwal8,
                    'qty' => $qtyjumlahjadwal,
                    'status' => 'tidak masuk'
                ]);
            }elseif ($qty < $qtydijadwal8) {
               $qtyjumlahjadwal = $qtydijadwal8 - $qty;
               
               $this->scheduleproduksiModel->save([
                    'id'=> $idjadwal8,
                    'qty' => $qtyjumlahjadwal,
                    'status' => 'masuk'
               ]);
           }

        }else {
            
        }   


        $querypo =  mysqli_query($this->koneksi, "select * from scheduleproduksi where id_part = $idpart and status = 'tidak masuk' ");
        $hasilpo = mysqli_fetch_all($querypo, MYSQLI_ASSOC);
        $hitungpo = mysqli_num_rows($querypo);
        if ($hitungpo < 1) {

            $querypojadwal =  mysqli_query($this->koneksi, "select * from po where id_part = $idpart and status = 'belum close' ");
        $hasilpojadwal = mysqli_fetch_all($querypojadwal, MYSQLI_ASSOC);
        $hitungpojadwal = mysqli_num_rows($querypojadwal);
        if ($hitungpojadwal > 0) {
             
            $idpo = $hasilpojadwal[0]['id'];
            $this->poModel->save([
                'id'=>$idpo,
                'schedule' =>'tidak masuk' 
            ]);

            }
               
            }else {
                
            }

            date_default_timezone_set('Asia/Jakarta');
            $date =date('Y-m-d H:i:s');

            $this->laporanproduksiModel->save([
                'id_part'=> $idpart,
                'proses' => 'spot1',
                'quantity'=> $quantiti,
                'ng' => $ng,
                'keterangan' => $keterangan,
                'tanggal' => $date
            ]);



        session()->setFlashdata('pesanberhasil','Data Proses SPOT'.'  '.'Part'.'  ' .$namapart.'  '.'Berhasil Di Input' );
            return redirect()->to('/production');

    }
    
    public function inputspot2(){
        
        
        
        if (!$this->validate([
            'qty' => 'numeric'
        ])) {
            session()->setFlashdata('pesan','Input Data Gagal, Inputlah Quantity dan Quantity Not Good Dengan Angka!');
            return redirect()->to('/production');
        }
        
        $inputspot2 = $this->request->getPost();
        
        if(isset($inputspot2['ng'])){
            if (!$this->validate([
            'ng' => 'numeric'
        ])) {
            session()->setFlashdata('pesan','Input Data Gagal, Inputlah Quantity dan Quantity Not Good Dengan Angka!');
            return redirect()->to('/production');
        }
        }
        
         $idpart = $inputspot2['idpart'];
        $idwh = $inputspot2['idwh'];
        
        if (isset($inputspot2['ng'])&& $inputspot2['ng'] !== "") {
            $quantiti = (int) $inputspot2['qty'];
            $keterangan = $inputspot2['ketng'];
            $ng = (int) $inputspot2['ng'];
            $qty = $quantiti + $ng;
        }else{
            $keterangan = "";
            $ng = 0;
            $qty = (int) $inputspot2['qty'];
            $quantiti = $qty;
        }

        $wh = $this->whModel->getWh($idwh);
        $qtyawalwh = (int) $wh[0]['total_qty'];
        $namamaterial = $wh[0]['nama_material'];

        $part = $this->partModel->getPart($idpart);
        $jmlhproses = (int) $part[0]['proses'];
        $namapart = $part[0]['nama_part'];
        $spoets = $part[0]['spot'];
        $nut2 = (int) $part[0]['nut2'];
        $nut = (int) $part[0]['nut'];
        $nutkepake = $qty * $nut2;
        $sisanut = $qtyawalwh - $nutkepake;

        $proses = $this->prosesModel->getProcess($idpart);
        $idproses = $proses[0]['id'];
        $qtyin = $proses[0]['qty_in'];
        $qtyout = $proses[0]['qty_out'];
        $qtyintotal = $qtyin - $qty;
        $qtyouttotal = $qtyout + $qty;
        
        $spot = $this->spotModel->getSpot2($idpart);
        $idspot = $spot[0]['id'];
        $namaproses = $spot[0]['nama_proses'];
        $qtyinspot = (int) $spot[0]['qty_in'];
        $qtyoutspot = (int) $spot[0]['qty_out'];
        $qtyjadispot = $qtyoutspot + $qty;
        $qtysisaspot = $qtyinspot - $qty;

        if ($qty > $qtyinspot) {
            session()->setFlashdata('pesan','Input Gagal, Anda Menginput Berlebih Dari Stock Yang Tersedia' );
            return redirect()->to('/production');
        }else {
            
            if ($nutkepake > $qtyawalwh) {
            session()->setFlashdata('pesan','Input Gagal, Quantity '. $namamaterial .' Stock Di Warehouse RM Kurang' );
            return redirect()->to('/production');
        }else {
            $this->whModel->save([
                'id' => $idwh,
                'total_qty' => $sisanut
            ]);
        }
            
            
           
            $fg = $this->whfgModel->getWhfg($idpart);
                        if ($fg == []) {
                            $this->whfgModel->save([
                               'id_part' => $idpart,
                               'nama_part' => $namapart,
                               'qty' => $quantiti 
                            ]);

                            $this->prosesModel->save([
                                'id' => $idproses,
                                'qty_out' => $qtyouttotal
                             ]);

                        }else {
                            $idfg = $fg[0]['id'];
                            $qtyfg = (int) $fg[0]['qty'];
                            $qtyjadifg = $qtyfg + $quantiti;
                            $this->whfgModel->save([
                                'id' => $idfg,
                                'qty' => $qtyjadifg
                             ]);

                             $this->prosesModel->save([
                                'id' => $idproses,
                                'qty_out' => $qtyouttotal
                             ]);

                        }
                        
                        $this->spotModel->save([
                            'id' => $idspot,
                            'qty_in' => $qtysisaspot,
                            'qty_out' => $qtyjadispot
                        ]);

date_default_timezone_set('Asia/Jakarta');
            $date =date('Y-m-d H:i:s');

            $this->laporanproduksiModel->save([
                'id_part'=> $idpart,
                'proses' => 'spot2',
                'quantity'=> $quantiti,
                'ng' => $ng,
                'keterangan' => $keterangan,
                'tanggal' => $date
            ]);
        }
        
        session()->setFlashdata('pesanberhasil','Data Proses SPOT2'.'  '.'Part'.'  ' .$namapart.'  '.'Berhasil Di Input' );
            return redirect()->to('/production');
        
    }

    public function savescheduleproduksi()
    {
        $schedule = $this->request->getPost();
        
        
        


        
        if ($schedule['qty1'] !== "" ) {
            $idpart1 = $schedule['idpart1'];
            $qtyrencana = (int)$schedule['qty1'];
            $stoktotal = (int)$schedule['stoktotal'];

            if ($qtyrencana > $stoktotal) {
                session()->setFlashdata('pesan','Anda Menginput Rencana Melebihi Stok Di WarehouseRM' );
        return redirect()->to('/production');
            }else {
                
            }

            $queryprosesz1 =  mysqli_query($this->koneksi, "select * from proses1 where id_part = $idpart1  ");
            $hasilprosesz1 = mysqli_fetch_all($queryprosesz1, MYSQLI_ASSOC);
            
            $querypo =  mysqli_query($this->koneksi, "select * from po where id_part = $idpart1 and status = 'belum close' ");
            $hasilpo = mysqli_fetch_all($querypo, MYSQLI_ASSOC);
            $hitungpo = mysqli_num_rows($querypo);
            $idpo = $hasilpo[0]['id'];
            $this->poModel->save([
                'id'=>$idpo,
                'schedule' =>'masuk' 
            ]);

            $query1 =  mysqli_query($this->koneksi, "select * from scheduleproduksi where id_part = $idpart1 and proses = 1 ");
            $hasil1 = mysqli_fetch_all($query1, MYSQLI_ASSOC);
            $hitung1 = mysqli_num_rows($query1);

            if ($hitung1 > 0) {
                $idjadwal1 = $hasil1[0]['id'];
                $qty1 = (int) $hasil1[0]['qty'];
                $qtyjadijadwal1 = $qty1 + $qtyrencana;

                $this->scheduleproduksiModel->save([
                    'id' => $idjadwal1,
                    'qty' => $qtyjadijadwal1,
                    'status' => 'masuk'
                ]);

            }elseif ($hitung1 < 1) {
                
                $this->scheduleproduksiModel->save([
                    'id_part' => $idpart1,
                    'proses' => 1,
                    'qty' => $qtyrencana,
                    'status' => 'masuk'
                ]);

            }

        }

        if (isset($schedule['2'])) {
            $idpart2 = $schedule['2'];

            $queryprosesz2 =  mysqli_query($this->koneksi, "select * from proses2 where id_part = $idpart2  ");
            $hasilprosesz2 = mysqli_fetch_all($queryprosesz2, MYSQLI_ASSOC);

            $qtydiproses2 = (int) $hasilprosesz2[0]['plan2'];

            $querypo =  mysqli_query($this->koneksi, "select * from po where id_part = $idpart2 and status = 'belum close' ");
            $hasilpo = mysqli_fetch_all($querypo, MYSQLI_ASSOC);
            $hitungpo = mysqli_num_rows($querypo);
            $idpo = $hasilpo[0]['id'];
            $this->poModel->save([
                'id'=>$idpo,
                'schedule' =>'masuk' 
            ]);

            $query2 =  mysqli_query($this->koneksi, "select * from scheduleproduksi where id_part = $idpart2 and proses = 2 ");
            $hasil2 = mysqli_fetch_all($query2, MYSQLI_ASSOC);
            $hitung2 = mysqli_num_rows($query2);

            if ($hitung2 > 0) {
                $idjadwal2 = $hasil2[0]['id'];
                $qty2 = (int) $hasil2[0]['qty'];
                $qtyjadijadwal2 = $qty2 + $qtydiproses2;

                $this->scheduleproduksiModel->save([
                    'id' => $idjadwal2,
                    'qty' => $qtyjadijadwal2,
                    'status' => 'masuk'
                ]);

            }elseif ($hitung2 < 1) {
                
                $this->scheduleproduksiModel->save([
                    'id_part' => $idpart2,
                    'proses' => 2,
                    'qty' => $qtydiproses2,
                    'status' => 'masuk'
                ]);

            }

        }

        if (isset($schedule['3'])) {
            $idpart3 = $schedule['3']; 

            $queryprosesz3 =  mysqli_query($this->koneksi, "select * from proses3 where id_part = $idpart3  ");
            $hasilprosesz3 = mysqli_fetch_all($queryprosesz3, MYSQLI_ASSOC);

            $qtydiproses3 = (int) $hasilprosesz3[0]['plan3'];

            $querypo =  mysqli_query($this->koneksi, "select * from po where id_part = $idpart3 and status = 'belum close' ");
            $hasilpo = mysqli_fetch_all($querypo, MYSQLI_ASSOC);
            $hitungpo = mysqli_num_rows($querypo);
            $idpo = $hasilpo[0]['id'];
            $this->poModel->save([
                'id'=>$idpo,
                'schedule' =>'masuk' 
            ]);

            $query3 =  mysqli_query($this->koneksi, "select * from scheduleproduksi where id_part = $idpart3 and proses = 3 ");
            $hasil3 = mysqli_fetch_all($query3, MYSQLI_ASSOC);
            $hitung3 = mysqli_num_rows($query3);

            if ($hitung3 > 0) {
                $idjadwal3 = $hasil3[0]['id'];
                $qty3 = (int) $hasil3[0]['qty'];
                $qtyjadijadwal3 = $qty3 + $qtydiproses3;

                $this->scheduleproduksiModel->save([
                    'id' => $idjadwal3,
                    'qty' => $qtyjadijadwal3,
                    'status' => 'masuk'
                ]);

            }elseif ($hitung3 < 1) {
                
                $this->scheduleproduksiModel->save([
                    'id_part' => $idpart3,
                    'proses' => 3,
                    'qty' => $qtydiproses3,
                    'status' => 'masuk'
                ]);

            }

        }

        if (isset($schedule['4'])) {
            $idpart4 = $schedule['4'];

            $queryprosesz4 =  mysqli_query($this->koneksi, "select * from proses4 where id_part = $idpart4  ");
            $hasilprosesz4 = mysqli_fetch_all($queryprosesz4, MYSQLI_ASSOC);

            $qtydiproses4 = (int) $hasilprosesz4[0]['plan4'];

            $querypo =  mysqli_query($this->koneksi, "select * from po where id_part = $idpart4 and status = 'belum close' ");
            $hasilpo = mysqli_fetch_all($querypo, MYSQLI_ASSOC);
            $hitungpo = mysqli_num_rows($querypo);
            $idpo = $hasilpo[0]['id'];
            $this->poModel->save([
                'id'=>$idpo,
                'schedule' =>'masuk' 
            ]);

            $query4 =  mysqli_query($this->koneksi, "select * from scheduleproduksi where id_part = $idpart4 and proses = 4 ");
            $hasil4 = mysqli_fetch_all($query4, MYSQLI_ASSOC);
            $hitung4 = mysqli_num_rows($query4);

            if ($hitung4 > 0) {
                $idjadwal4 = $hasil4[0]['id'];
                $qty4 = (int) $hasil4[0]['qty'];
                $qtyjadijadwal4 = $qty4 + $qtydiproses4;

                $this->scheduleproduksiModel->save([
                    'id' => $idjadwal4,
                    'qty' => $qtyjadijadwal4,
                    'status' => 'masuk'
                ]);

            }elseif ($hitung4 < 1) {
                
                $this->scheduleproduksiModel->save([
                    'id_part' => $idpart4,
                    'proses' => 4,
                    'qty' => $qtydiproses4,
                    'status' => 'masuk'
                ]);

            }

        }

        if (isset($schedule['5'])) {
            $idpart5 = $schedule['5'];

            $queryprosesz5 =  mysqli_query($this->koneksi, "select * from proses5 where id_part = $idpart5  ");
            $hasilprosesz5 = mysqli_fetch_all($queryprosesz5, MYSQLI_ASSOC);

            $qtydiproses5 = (int) $hasilprosesz5[0]['plan5'];

            $querypo =  mysqli_query($this->koneksi, "select * from po where id_part = $idpart5 and status = 'belum close' ");
            $hasilpo = mysqli_fetch_all($querypo, MYSQLI_ASSOC);
            $hitungpo = mysqli_num_rows($querypo);
            $idpo = $hasilpo[0]['id'];
            $this->poModel->save([
                'id'=>$idpo,
                'schedule' =>'masuk' 
            ]);

            $query5 =  mysqli_query($this->koneksi, "select * from scheduleproduksi where id_part = $idpart5 and proses = 5 ");
            $hasil5 = mysqli_fetch_all($query5, MYSQLI_ASSOC);
            $hitung5 = mysqli_num_rows($query5);

            if ($hitung5 > 0) {
                $idjadwal5 = $hasil5[0]['id'];
                $qty5 = (int) $hasil5[0]['qty'];
                $qtyjadijadwal5 = $qty5 + $qtydiproses5;

                $this->scheduleproduksiModel->save([
                    'id' => $idjadwal5,
                    'qty' => $qtyjadijadwal5,
                    'status' => 'masuk'
                ]);

            }elseif ($hitung5 < 1) {
                
                $this->scheduleproduksiModel->save([
                    'id_part' => $idpart5,
                    'proses' => 5,
                    'qty' => $qtydiproses5,
                    'status' => 'masuk'
                ]);

            }

       
        }

        if (isset($schedule['6'])) {
            $idpart6 = $schedule['6'];
            
            $queryprosesz6 =  mysqli_query($this->koneksi, "select * from proses6 where id_part = $idpart6  ");
            $hasilprosesz6 = mysqli_fetch_all($queryprosesz6, MYSQLI_ASSOC);
            $qtydiproses6 = (int) $hasilprosesz6[0]['plan6'];

            $querypo =  mysqli_query($this->koneksi, "select * from po where id_part = $idpart6 and status = 'belum close' ");
            $hasilpo = mysqli_fetch_all($querypo, MYSQLI_ASSOC);
            $hitungpo = mysqli_num_rows($querypo);
            $idpo = $hasilpo[0]['id'];
            $this->poModel->save([
                'id'=>$idpo,
                'schedule' =>'masuk' 
            ]);

            $query6 =  mysqli_query($this->koneksi, "select * from scheduleproduksi where id_part = $idpart6 and proses = 6 ");
            $hasil6 = mysqli_fetch_all($query6, MYSQLI_ASSOC);
            $hitung6 = mysqli_num_rows($query6);

            if ($hitung6 > 0) {
                $idjadwal6 = $hasil6[0]['id'];
                $qty6 = (int) $hasil6[0]['qty'];
                $qtyjadijadwal6 = $qty6 + $qtydiproses6;

                $this->scheduleproduksiModel->save([
                    'id' => $idjadwal6,
                    'qty' => $qtyjadijadwal6,
                    'status' => 'masuk'
                ]);

            }elseif ($hitung6 < 1) {
                
                $this->scheduleproduksiModel->save([
                    'id_part' => $idpart6,
                    'proses' => 6,
                    'qty' => $qtydiproses6,
                    'status' => 'masuk'
                ]);

            }

        }

        if (isset($schedule['7'])) {
            $idpart7 = $schedule['7'];
            
            $queryprosesz7 =  mysqli_query($this->koneksi, "select * from proses7 where id_part = $idpart7  ");
            $hasilprosesz7 = mysqli_fetch_all($queryprosesz7, MYSQLI_ASSOC);
            $qtydiproses7 = (int) $hasilprosesz7[0]['plan7'];
            
            $querypo =  mysqli_query($this->koneksi, "select * from po where id_part = $idpart7 and status = 'belum close' ");
            $hasilpo = mysqli_fetch_all($querypo, MYSQLI_ASSOC);
            $hitungpo = mysqli_num_rows($querypo);
            $idpo = $hasilpo[0]['id'];
            $this->poModel->save([
                'id'=>$idpo,
                'schedule' =>'masuk' 
            ]);

            $query7 =  mysqli_query($this->koneksi, "select * from scheduleproduksi where id_part = $idpart7 and proses = 7 ");
            $hasil7 = mysqli_fetch_all($query7, MYSQLI_ASSOC);
            $hitung7 = mysqli_num_rows($query7);

            if ($hitung7 > 0) {
                $idjadwal7 = $hasil7[0]['id'];
                $qty7 = (int) $hasil7[0]['qty'];
                $qtyjadijadwal7 = $qty7 + $qtydiproses7;

                $this->scheduleproduksiModel->save([
                    'id' => $idjadwal7,
                    'qty' => $qtyjadijadwal7,
                    'status' => 'masuk'
                ]);

            }elseif ($hitung7 < 1) {
                
                $this->scheduleproduksiModel->save([
                    'id_part' => $idpart7,
                    'proses' => 7,
                    'qty' => $qtydiproses7,
                    'status' => 'masuk'
                ]);

            }

        }

        if (isset($schedule['8'])) {
            $idpart8 = $schedule['8'];
            
            $queryprosesz8 =  mysqli_query($this->koneksi, "select * from spot where id_part = $idpart8  ");
            $hasilprosesz8 = mysqli_fetch_all($queryprosesz8, MYSQLI_ASSOC);
            $qtydiproses8 = (int) $hasilprosesz8[0]['qty_in'];
            
            $querypo =  mysqli_query($this->koneksi, "select * from po where id_part = $idpart8 and status = 'belum close' ");
            $hasilpo = mysqli_fetch_all($querypo, MYSQLI_ASSOC);
            $hitungpo = mysqli_num_rows($querypo);
            $idpo = $hasilpo[0]['id'];
            $this->poModel->save([
                'id'=>$idpo,
                'schedule' =>'masuk' 
            ]);

            $query8 =  mysqli_query($this->koneksi, "select * from scheduleproduksi where id_part = $idpart8 and proses = 8 ");
            $hasil8 = mysqli_fetch_all($query8, MYSQLI_ASSOC);
            $hitung8 = mysqli_num_rows($query8);

            if ($hitung8 > 0) {
                $idjadwal8 = $hasil8[0]['id'];
                $qty8 = (int) $hasil8[0]['qty'];
                $qtyjadijadwal8 = $qty8 + $qtydiproses8;

                $this->scheduleproduksiModel->save([
                    'id' => $idjadwal8,
                    'qty' => $qtyjadijadwal8,
                    'status' => 'masuk'
                ]);

            }elseif ($hitung8 < 1) {
                
                $this->scheduleproduksiModel->save([
                    'id_part' => $idpart8,
                    'proses' => 8,
                    'qty' => $qtydiproses8,
                    'status' => 'masuk'
                ]);

            }

        }

        if ($schedule['qty1'] == "" && !isset($schedule['2']) && !isset($schedule['3']) && !isset($schedule['4']) && !isset($schedule['5']) && !isset($schedule['6']) && !isset($schedule['7']) && !isset($schedule['8']) ) {
            session()->setFlashdata('pesan','Tidak Ada Jadwal Yang Anda Buat' );
        return redirect()->to('/production');
        }

        session()->setFlashdata('pesanberhasil','Jadwal Produksi Berhasil Dibuat' );
        return redirect()->to('/production');
        
    }


}
