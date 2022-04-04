<?php

namespace App\Controllers;
use App\Models\WhModel;
use App\Models\PurchasingModel;
use App\Models\RencanaModel;

class Warehouse extends BaseController
{
    protected $rencanaModel;
    protected $whModel;
    protected $purchasingModel;
    public function __construct() {

        $this->whModel = new whModel();
        $this->rencanaModel = new rencanaModel();
        $this->purchasingModel = new purchasingModel();
        
    }
    public function index()
    {
        if (isset($_SESSION['status'])) {
        $data = [
            'tittle' => 'Home | WareHouse Material',
            'validation' => \Config\Services::Validation(),
            'wh' => $this->whModel->getWh()
        ];
        return view('wh', $data);
    }else {
        session()->setFlashdata('pesangagal','Anda Belum Login');
            return redirect()->to('/');
    }


    }

    public function confirm()
    {
        $wh = $this->request->getPost();
        $id = $wh['noposup'];
        if (isset($wh['qty_dtg1']) && isset($wh['qty_dtg2']) ) {

            if (!$this->validate([
                'qty_dtg1' => 'numeric',
                'qty_dtg2' => 'numeric'
                
            ])) {
                session()->setFlashdata('pesan','Input Form Konfirmasi Kedatangan Harus Menggunakan Angka!');
           return redirect()->to('/wh');
            }
        } elseif (isset($wh['qty_dtg1']) && !isset($wh['qty_dtg2']) ) {
            if (!$this->validate([
                'qty_dtg1' => 'numeric'
                
            ])) {
                session()->setFlashdata('pesan','Input Form Konfirmasi Kedatangan Harus Menggunakan Angka!');
           return redirect()->to('/wh');
            }
        } elseif (!isset($wh['qty_dtg1']) && isset($wh['qty_dtg2']) ) {
            if (!$this->validate([
                'qty_dtg2' => 'numeric'
                
            ])) {
                session()->setFlashdata('pesan','Input Form Konfirmasi Kedatangan Harus Menggunakan Angka!');
           return redirect()->to('/wh');
            }
        }

               
            if (isset($wh['qty_dtg1'])) {

                $posup =$this->purchasingModel->GetPurchase($id);
                $code = $posup[0]['no_po'];
                $idcust = $posup[0]['id_customer'];
                $unit = $posup[0]['unit'];
                $qty1 = (int) $posup[0]['qty_dtg1'];
                $qty2 = (int) $posup[0]['qty_dtg2'];
                $qtyac = (int) $posup[0]['qty_act'];
                $no_po_supplier = $posup[0]['no_po_supplier'];
                $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
                               $query =  mysqli_query($koneksi, "select * from warehouse where kodepart = '$code' and id_customer = '$idcust' and unit = '$unit' ");
                               $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC); 
                               foreach ($hasil as $a) {
                                $idwh = $a['id'];
                                $qtytoel = (int) $a['total_qty'];
                            }

                $qtybaru = $wh['qty_dtg1'];
                if ($qtybaru >= $qty1) {
                    $qtynew = $qtytoel + $qtybaru; 
                    $qtypur = ($qtyac - $qty1) + $qtybaru;
                    $this->purchasingModel->save([
                        'id' => $id,
                        'konfirmasi' => 'dikonfirmasi',
                        'qty_act' => $qtypur,
                        'qty_dtg1' => $qtybaru
                    ]); 

                    $this->whModel->save([
                        'id' => $idwh,
                        'total_qty' => $qtynew,
                        'status' => 'dikonfirmasi'
    
                  ]); 
                } else {
                    $qtynew = $qtytoel + $qty1;
                    $this->purchasingModel->save([
                        'id' => $id,
                        'konfirmasi' => 'dikonfirmasi'
                    ]); 

                    $this->whModel->save([
                        'id' => $idwh,
                        'total_qty' => $qtynew,
                        'status' => 'dikonfirmasi'
    
                  ]); 
                }

                $queryyy =  mysqli_query($koneksi, "select * from rencana where description = 'kedatangan pertama' and qty1 = '$code' and qty2 = '$no_po_supplier' ");
                $hitooeng = mysqli_num_rows($queryyy);
                if ($hitooeng > 0 ) {
                    $has = mysqli_fetch_all($queryyy, MYSQLI_ASSOC); 
                               foreach ($has as $b) {
                                $idrc = $b['id'];
                            }
                    $this->rencanaModel->delete($idrc);

                }
                 $querykedats2 =  mysqli_query($koneksi, "select * from rencana where description = 'kedatangan kedua' and qty1 = '$code' and qty2 = '$no_po_supplier' ");
                $hitungkedats2 = mysqli_num_rows($querykedats2);
                if($hitungkedats2 > 0 ){
                $hasilkedats2 = mysqli_fetch_all($querykedats2, MYSQLI_ASSOC);
                    $tglkedats2 = $hasilkedats2[0]['start_date'];
                    if($tglkedats2 == '0000-00-00'){
                        $idrc2 = $hasilkedats2[0]['id'];
                        
                        $this->rencanaModel->delete($idrc2);
                    }
                }
                               
                
            }

            if (isset($wh['qty_dtg2'])) {

                $posup =$this->purchasingModel->GetPurchase($id);
                $code = $posup[0]['no_po'];
                $unit = $posup[0]['unit'];
                $idcust = $posup[0]['id_customer'];
                $qty2b = (int) $posup[0]['qty_dtg2'];
                $qtyacb = (int) $posup[0]['qty_act'];
                $no_po_supplier = $posup[0]['no_po_supplier'];
                $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
                               $queryy =  mysqli_query($koneksi, "select * from warehouse where kodepart = '$code' and id_customer = '$idcust' and unit = '$unit' ");
                               $hasils = mysqli_fetch_all($queryy, MYSQLI_ASSOC); 
                               foreach ($hasils as $a) {
                                $idwh = $a['id'];
                                $qtytoel = (int) $a['total_qty'];
                            }

                $qtybaruu = $wh['qty_dtg2'];
                if ($qtybaruu >= $qty2b) {
                    $qtyneww = $qtytoel + $qtybaruu; 
                    $qtypur = ($qtyacb - $qty2b) + $qtybaruu;
                    $this->purchasingModel->save([
                        'id' => $id,
                        'konfirmasi1' => 'dikonfirmasi',
                        'qty_act' => $qtypur,
                        'qty_dtg2' => $qtybaruu
                    ]); 

                    $this->whModel->save([
                        'id' => $idwh,
                        'total_qty' => $qtyneww,
                        'status' => 'dikonfirmasi'
    
                  ]); 
                } else {
                    $qtyneww = $qtytoel + $qty1;
                    $this->purchasingModel->save([
                        'id' => $id,
                        'konfirmasi1' => 'dikonfirmasi'
                    ]); 

                    $this->whModel->save([
                        'id' => $idwh,
                        'total_qty' => $qtyneww,
                        'status' => 'dikonfirmasi'
    
                  ]); 
                }
                
                $queryyy =  mysqli_query($koneksi, "select * from rencana where description = 'kedatangan kedua' and qty1 = '$code' and qty2 = '$no_po_supplier' ");
                $hitto = mysqli_num_rows($queryyy);

                if ($hitto > 0) {
                    $has = mysqli_fetch_all($queryyy, MYSQLI_ASSOC); 
                               foreach ($has as $b) {
                                $idrc = $b['id'];
                            }
                    $this->rencanaModel->delete($idrc);
                }
                               
            }
              

            session()->setFlashdata('pesanberhasil','Data Berhasil Dikonfirmasi');
          return redirect()->to('/wh');
    }

    public function shearing()
    {
        $shear = $this->request->getPost();

if ($shear['kodepart']=== "" ) {
    session()->setFlashdata('pesan','Data Material Tersebut Tidak Lengkap');
          return redirect()->to('/wh');
}        
     
        $qtyall = (int) $shear['total_qty'];
        $qtysher = (int) $shear['qty_shearing'];
        $idwh = $shear['nama_material'];
        $spek = $shear['spec'];
        $code = $shear['kodepart'];
        $qtty = $qtyall - $qtysher;

        $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
        $query =  mysqli_query($koneksi, "select * from part where kode_part = '$code' ");
        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
        foreach ($hasil as $a) {
            $pcsheet = $a['pcs_sheet'];
            $shtlembar = $a['sheet_lembar'];
            $kgpcs = $a['kg_pcs'];
            $pcslembar = $a['pcs_lembar'];
            $kgsht = $a['kg_sheet'];

        } 
//cek apakah di warehouse ada material sheet

        $que = mysqli_query($koneksi, "select * from warehouse where kodepart = '$code' and unit = 'sheet' ");
        $hitung = mysqli_num_rows($que);

        if ($hitung > 0 ) {
            $has = mysqli_fetch_all($que, MYSQLI_ASSOC);
            foreach ($has as $b) {
                $idlams = $b['id'];
                $toqty = (int) $b['total_qty'];
            }
    $qtybaru = $qtysher * $shtlembar;
    $qtyniw = $toqty + $qtybaru;
        $this->whModel->save([
            'id' => $idwh,
            'total_qty' => $qtty
        ]);

        $this->whModel->save([
            'id' => $idlams,
            'total_qty' => $qtyniw
        ]);

        }else {
            $qtybar = $qtysher * $shtlembar;
            $quer =  mysqli_query($koneksi, "select * from warehouse where id = '$idwh' ");
            $ha = mysqli_fetch_all($quer, MYSQLI_ASSOC);
            foreach ($ha as $c) {
                $namacust = $c['nama_customer'];
                $namasup = $c['nama_supplier'];
                $no_po_supplier = $c['no_po_supplier'];
                $cod = $c['kodepart'];
                $nama = $c['nama_material'];
                $spek = $c['spec'];
                $tbl = $c['tebal'];
                $unit = 'sheet';
                $idsup = $c['id_supplier'];
                $idcust = $c['id_customer'];
            }

            $this->whModel->save([
                'id' => $idwh,
                'total_qty' => $qtty
            ]);

            $this->whModel->save([
                'nama_customer' => $namacust,
                'nama_supplier' => $namasup,
                'no_po_supplier' => $no_po_supplier,
                'kodepart' => $cod,
                'nama_material' => $nama,
                'spec' => $spek,
                'tebal' => $tbl,
                'total_qty' => $qtybar,
                'unit' => $unit,
                'tanggal_datang' => '',
                'id_supplier' => $idsup,
                'id_customer' => $idcust
            ]);

        }

        session()->setFlashdata('pesanberhasil','Shearing Lembar Menjadi Sheet Berhasil');
        return redirect()->to('/wh');

    }

    public function cutsize()
    {
        $cz = $this->request->getPost();
       
        if ($cz['kodepart']=== "" ) {
            session()->setFlashdata('pesan','Data Material Tersebut Tidak Lengkap');
                  return redirect()->to('/wh');
        }  

        $qtyall = (int) $cz['total_qty'];
        $qtysher = (int) $cz['qty_shearing'];
        $idwh = $cz['nama_material'];
        $spek = $cz['spec'];
        $code = $cz['kodepart'];

        $koneksi = mysqli_connect('localhost','n1775814_sony','918256ccd741','n1775814_ganding');
        $query =  mysqli_query($koneksi, "select * from part where kode_part = '$code' ");
        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
        foreach ($hasil as $a) {
            $pcsheet = $a['pcs_sheet'];
            $shtlembar = $a['sheet_lembar'];
            $kgpcs = $a['kg_pcs'];
            $pcslembar = $a['pcs_lembar'];
            $kgsht = $a['kg_sheet'];

        } 
//cek apakah di warehouse ada material sheet

$que = mysqli_query($koneksi, "select * from warehouse where kodepart = '$code' and unit = 'sheet' ");
$hitung = mysqli_num_rows($que);

    if ($hitung > 0) {
        $has = mysqli_fetch_all($que, MYSQLI_ASSOC);
        foreach ($has as $b) {
            $idlams = $b['id'];
            $toqty = (int) $b['total_qty'];
        }
    $qtybar = ROUND($qtyall - $qtysher / $shtlembar,2);
$qtyniw = $toqty + $qtysher;
    $this->whModel->save([
        'id' => $idwh,
        'total_qty' => $qtybar
    ]);

    $this->whModel->save([
        'id' => $idlams,
        'total_qty' => $qtyniw
    ]);

    }else {
        $qtybar = ROUND($qtyall - $qtysher / $shtlembar,2);
            $quer =  mysqli_query($koneksi, "select * from warehouse where id = '$idwh' ");
            $ha = mysqli_fetch_all($quer, MYSQLI_ASSOC);
            foreach ($ha as $c) {
                $namacust = $c['nama_customer'];
                $namasup = $c['nama_supplier'];
                $no_po_supplier = $c['no_po_supplier'];
                $cod = $c['kodepart'];
                $nama = $c['nama_material'];
                $spek = $c['spec'];
                $tbl = $c['tebal'];
                $unit = 'sheet';
                $idsup = $c['id_supplier'];
                $idcust = $c['id_customer'];
            }

            $this->whModel->save([
                'id' => $idwh,
                'total_qty' => $qtybar
            ]);

            $this->whModel->save([
                'nama_customer' => $namacust,
                'nama_supplier' => $namasup,
                'no_po_supplier' => $no_po_supplier,
                'kodepart' => $cod,
                'nama_material' => $nama,
                'spec' => $spek,
                'tebal' => $tbl,
                'total_qty' => $qtysher,
                'unit' => $unit,
                'tanggal_datang' => '',
                'id_supplier' => $idsup,
                'id_customer' => $idcust
            ]);

    }

    session()->setFlashdata('pesanberhasil','Membuat Sheet Dari Lembar Berhasil');
    return redirect()->to('/wh');

    }



}
