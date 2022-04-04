<?php

namespace App\Controllers;
use App\Models\PoModel;
use App\Models\ScheduleModel;
use App\Models\WhfgModel;
use App\Models\SurjalcustModel;
use App\Models\WeldingModel;
use App\Models\FinishgoodModel;
use App\Models\PartModel;

class Delivery extends BaseController
{
    protected $partModel;
    protected $finishgoodModel;
    protected $weldingModel;
    protected $surjalcustModel;
    protected $poModel;
    protected $scheduleModel;
    protected $whfgModel;

    public function __construct()
    {
        $this->partModel = new partModel();
        $this->finishgoodModel = new finishgoodModel();
        $this->weldingModel = new weldingModel();
        $this->surjalcustModel = new surjalcustModel();
        $this->whfgModel = new whfgModel();
        $this->scheduleModel = new scheduleModel();
        $this->poModel = new poModel();
    }

    public function index()
    {
        if (isset($_SESSION['status'])) {
        $data = [
            'tittle' => 'Home | Delivery'
        ];

        return view('delivery', $data);
    }else {
            session()->setFlashdata('pesangagal','Anda Belum Login');
                return redirect()->to('/');
        }
    }

    public function saveschedule()
    {
        $post = $this->request->getPost();
        $idpo = $post['idpo'];
        $qty = (int) $post['qty'];
        $tgl = $post['tanggalkirim'];
        $hitung = count($post['tanggalkirim']);
        $number = $hitung - 1;
        
        if ($hitung - 1 ==0) {
            $qtymoduluz = 1;
        }elseif($hitung - 1 !== 0){
            $qtymoduluz = $hitung - 1;
        }
        
        $po = $this->poModel->getPo($idpo);
        $qtypcs = (int)$po[0]['qty_pcs'];
        $idpart = $po[0]['id_part'];
        
   
if ($qty > $qtypcs) {
    session()->setFlashdata('pesan','Quantity yang di Input Berlebih');
    return redirect()->to('/delivery');
}else {
    $dibagi = $qtypcs / $qty;
        $hasil = $qtypcs % $qty;
        $sisabagi = $qtypcs - $hasil;
        $sisabener = $sisabagi / $qtymoduluz;
}

        for ($j=0; $j < $number; $j++) { 
            $tes[] = $sisabener;
        }
        
        $tes[]=$hasil;

        if ($hasil == 0) {

            for ($i=0; $i < $hitung ; $i++) { 
                
                $this->scheduleModel->save([
                    'id_part' => $idpart,
                    'id_po' => $idpo,
                    'date' => $post['tanggalkirim'][$i],
                    'status' => 'belum close',
                    'qty' => $qty,
                    'keterangan' => 'belum tuntas'
                ]);
            
        }

        }elseif ($hasil !== 0) {        
            for ($i=0; $i < $hitung ; $i++) { 
                
                        $this->scheduleModel->save([
                            'id_part' => $idpart,
                            'id_po' => $idpo,
                            'date' => $post['tanggalkirim'][$i],
                            'status' => 'belum close',
                            'qty' => $tes[$i],
                            'keterangan' => 'belum tuntas'
                        ]);
                    
                
            
        }
            
        }
        
        session()->setFlashdata('pesanberhasil','Schedule Delivery Berhasil Dibuat');
        return redirect()->to('/delivery');

    }


    public function finishpart()
    {
        if (!$this->validate([
            'qty' => 'numeric'
        ])) {
            session()->setFlashdata('pesan','Delivery Gagal, Input Quantity Need Dengan Angka');
            return redirect()->to('/delivery');
        }
        
        $fp = $this->request->getPost();
        $qtymaudikirim = (int) $fp['qty'];
        $idfg = $fp['nama_part'];
        $nosurjal = $fp['nosurjal'];
        $whfg = $this->whfgModel->getFg($idfg);
        $idpart = $whfg[0]['id_part'];
        $qtyasli = (int) $whfg[0]['qty'];
        $namapart = $whfg[0]['nama_part'];

        date_default_timezone_set('Asia/Jakarta');
        $tglsekarang =date('Y-m-d H:i:s');

        if ($qtymaudikirim > $qtyasli) {
            
        session()->setFlashdata('pesan','Delivery Gagal, Quantity Yang di Kirim Berlebih dari Stok di Warehouse FG ');
        return redirect()->to('/delivery');

        }

        $ambilpo = $this->poModel->getPartz($idpart);
            $hitungpo = count($ambilpo);

        if ($hitungpo < 1) {
            session()->setFlashdata('pesan','Delivery Gagal, Tidak Ada Data Purchase Order Dari Customer Tersebut');
        return redirect()->to('/delivery');
        }elseif ($hitungpo > 1) {
            $idpo1 = $ambilpo[0]['id'];
            $qtydipo1 = (int) $ambilpo[0]['qty_pcs'];
            $idcustomer = $ambilpo[0]['id_customer'];
            $delivact1 = (int) $ambilpo[0]['deliv_act'];
            $idpo2 = $ambilpo[1]['id'];
            $qtydipo2 = (int) $ambilpo[1]['qty_pcs'];
            $delivact2 = (int) $ambilpo[1]['deliv_act'];
            $delivjadi1 = $qtymaudikirim + $delivact1;
            $delivjadi2 = $qtymaudikirim + $delivact2;
            
            $sisafg = $qtyasli - $qtymaudikirim;

            if ($delivjadi1 > $qtydipo1) {
                $sisadeliv1 = $delivjadi1 - $qtydipo1;
                $kedeliv1 = $qtymaudikirim - $sisadeliv1;
                $delivfix1 = $kedeliv1 + $delivact1;
                $status1 = 'close';
                $delivfix2 = $delivact2 + $sisadeliv1;
                $delivsurjal = $sisadeliv1;

                if ($delivfix2 >= $qtydipo2) {
                    $status2 = 'close';
                }else {
                    $status2 = 'belum close';
                }


                $this->poModel->save([
                    'id' => $idpo1,
                    'deliv_act' => $delivfix1,
                    'status' => $status1   
                ]);

                $this->poModel->save([
                    'id' => $idpo2,
                    'deliv_act' => $delivfix2,
                    'status' => $status2 
                ]);

                $this->whfgModel->save([
                    'id' => $idfg,
                    'qty' => $sisafg
                ]);

                $this->surjalcustModel->save([
                    'idpo' => $idpo1,
                    'nosurjal' => $nosurjal,
                    'tgl' => $tglsekarang,
                    'qty' => $kedeliv1,
                    'id_customer' => $idcustomer
                ]);

                $this->surjalcustModel->save([
                    'idpo' => $idpo2,
                    'nosurjal' => $nosurjal,
                    'tgl' => $tglsekarang,
                    'qty' => $delivsurjal,
                    'id_customer' => $idcustomer
                ]);

            }elseif ($delivjadi1 <= $qtydipo1 ) {
                $qtydikirim = $qtymaudikirim + $delivact1;
                $delivsurjal = $qtymaudikirim;
                if ($delivjadi1 == $qtydipo1) {
                    $status = 'close';
                }else {
                    $status = 'belum close';
                }

                $this->poModel->save([
                    'id' => $idpo1,
                    'deliv_act' => $delivjadi1,
                    'status' => $status
                ]);

                $this->whfgModel->save([
                    'id' => $idfg,
                    'qty' => $sisafg
                ]);

                $this->surjalcustModel->save([
                    'idpo' => $idpo1,
                    'nosurjal' => $nosurjal,
                    'tgl' => $tglsekarang,
                    'qty' => $delivsurjal,
                    'id_customer' => $idcustomer
                ]);

            }

            $schedule = $this->scheduleModel->getPoschedule($idpo1);
            $hitungschedule = count($schedule);

            if ($hitungschedule > 1) {
                $qtyschedule1 = (int) $schedule[0]['qty'];
                $idschedule1 = $schedule[0]['id'];
                $qtyschedule2 = (int) $schedule[1]['qty'];
                $idschedule2  = $schedule[1]['id'];
                $keterangan = 'tuntas';

                if ($qtyschedule1 == $delivsurjal) {
                    

                    $this->scheduleModel->save([
                        'id' => $idschedule1,
                        'keterangan' => $keterangan
                    ]);

                }elseif ($qtyschedule1 > $delivsurjal) {
                    $sisaschedule = $qtyschedule1 - $delivsurjal;
                    $selanjutnya = $sisaschedule + $qtyschedule2;

                    $this->scheduleModel->save([
                        'id' => $idschedule1,
                        'qty' => $delivsurjal,
                        'keterangan' => $keterangan
                    ]);

                    $this->scheduleModel->save([
                        'id' => $idschedule2,
                        'qty' => $selanjutnya
                    ]);

                }elseif ($qtyschedule1 < $delivsurjal) {
                    $lebihschedule = $delivsurjal - $qtyschedule1;
                    $selanjutnya = $qtyschedule2 - $lebihschedule;

                    $this->scheduleModel->save([
                        'id' => $idschedule1,
                        'qty' => $delivsurjal,
                        'keterangan' => $keterangan
                    ]);


                    $this->scheduleModel->save([
                        'id' => $idschedule2,
                        'qty' => $selanjutnya
                    ]);

                }



            }elseif ($hitungschedule == 1) {
                $qtyschedule1 = (int) $schedule[0]['qty'];
                $idschedule1 = $schedule[0]['id'];
                $keterangan = 'tuntas';

                if ($delivsurjal >= $qtyschedule1) {
                    $this->scheduleModel->save([
                        'id' => $idschedule1,
                        'keterangan' => $keterangan
                    ]);
                }elseif ($delivsurjal < $qtyschedule1) {
                        $sisaan = $qtyschedule1 - $delivsurjal; 
                        
                        $this->scheduleModel->save([
                            'id' => $idschedule1,
                            'qty' => $sisaan
                        ]);
                }


            }

        }elseif ($hitungpo == 1) {
            $idpo = $ambilpo[0]['id'];
            $idcustomer = $ambilpo[0]['id_customer'];
            $qtydipo = (int) $ambilpo[0]['qty_pcs'];
            $delivpo = (int) $ambilpo[0]['deliv_act'];
            $delivjadi = $qtymaudikirim + $delivpo;

            if ($delivjadi > $qtydipo) {
                
                $sisadeliv = $delivjadi - $qtydipo;
                $kedeliv = $qtymaudikirim - $sisadeliv;
                $sisafgdeliv =  $qtyasli - $kedeliv;
                $delivfix = $kedeliv + $delivpo; 
                $delivsurjal = $kedeliv;

                $this->whfgModel->save([
                    'id' => $idfg,
                    'qty' => $sisafgdeliv
                ]);

                $this->poModel->save([
                    'id' => $idpo,
                    'deliv_act' => $delivfix,
                    'status' => 'close'
                ]);

                $this->surjalcustModel->save([
                    'idpo' => $idpo,
                    'nosurjal' => $nosurjal,
                    'tgl' => $tglsekarang,
                    'qty' => $delivsurjal,
                    'id_customer' => $idcustomer
                ]);


            }elseif ($delivjadi <= $qtydipo) {
                $sisadifg = $qtyasli - $qtymaudikirim;
                $delivsurjal = $qtymaudikirim;
                if ($delivjadi == $qtydipo) {
                    $status = 'close';
                }else {
                    $status = 'belum close';
                }

                $this->whfgModel->save([
                    'id' => $idfg,
                    'qty' => $sisadifg
                ]);

                $this->poModel->save([
                    'id' => $idpo,
                    'deliv_act' => $delivjadi,
                    'status' => $status
                ]);

                $this->surjalcustModel->save([
                    'idpo' => $idpo,
                    'nosurjal' => $nosurjal,
                    'tgl' => $tglsekarang,
                    'qty' => $delivsurjal,
                    'id_customer'=> $idcustomer
                ]);

            }

            $schedule = $this->scheduleModel->getPoschedule($idpo);
            $hitungschedule = count($schedule);

            if ($hitungschedule > 1) {
                $qtyschedule1 = (int) $schedule[0]['qty'];
                $idschedule1 = $schedule[0]['id'];
                $qtyschedule2 = (int) $schedule[1]['qty'];
                $idschedule2  = $schedule[1]['id'];
                $keterangan = 'tuntas';

                if ($qtyschedule1 == $delivsurjal) {
                    

                    $this->scheduleModel->save([
                        'id' => $idschedule1,
                        'keterangan' => $keterangan
                    ]);

                }elseif ($qtyschedule1 > $delivsurjal) {
                    $sisaschedule = $qtyschedule1 - $delivsurjal;
                    $selanjutnya = $sisaschedule + $qtyschedule2;

                    $this->scheduleModel->save([
                        'id' => $idschedule1,
                        'qty' => $delivsurjal,
                        'keterangan' => $keterangan
                    ]);

                    $this->scheduleModel->save([
                        'id' => $idschedule2,
                        'qty' => $selanjutnya
                    ]);

                }elseif ($qtyschedule1 < $delivsurjal) {
                    $lebihschedule = $delivsurjal - $qtyschedule1;
                    $selanjutnya = $qtyschedule2 - $lebihschedule;

                    $this->scheduleModel->save([
                        'id' => $idschedule1,
                        'qty' => $delivsurjal,
                        'keterangan' => $keterangan
                    ]);


                    $this->scheduleModel->save([
                        'id' => $idschedule2,
                        'qty' => $selanjutnya
                    ]);

                }



            }elseif ($hitungschedule == 1) {
                $qtyschedule1 = (int) $schedule[0]['qty'];
                $idschedule1 = $schedule[0]['id'];
                $keterangan = 'tuntas';

                if ($delivsurjal >= $qtyschedule1) {
                    $this->scheduleModel->save([
                        'id' => $idschedule1,
                        'keterangan' => $keterangan
                    ]);
                }elseif ($delivsurjal < $qtyschedule1) {
                        $sisaan = $qtyschedule1 - $delivsurjal; 
                        
                        $this->scheduleModel->save([
                            'id' => $idschedule1,
                            'qty' => $sisaan
                        ]);
                }


            }

        }

        
        session()->setFlashdata('pesanberhasil','Delivery'.'  ' .$namapart.'  '.'Berhasil');
        return redirect()->to('/delivery');

    }


    public function assyweld()
    {
        if (!$this->validate([
            'qty' => 'numeric'
        ])) {
            session()->setFlashdata('pesan','Delivery Gagal, Input Quantity Need Dengan Angka');
            return redirect()->to('/delivery');
        }
        
        $weld = $this->request->getPost();
        

        $qtymaudikirim = (int) $weld['qty'];    
        $idwelding = $weld['id_fg'];
        $nosurjal = $weld['nosurjal'];

        date_default_timezone_set('Asia/Jakarta');
        $tgl =date('Y-m-d H:i:s');

        $welding = $this->weldingModel->getWelding($idwelding);
        $qtywelding = (int) $welding[0]['qty']; 
        $namafg = $welding[0]['nama_fg'];

        if ($qtymaudikirim > $qtywelding) {
            session()->setFlashdata('pesan','Delivery Gagal, Stok di Gudang Welding Kurang');
        return redirect()->to('/delivery');
            
        }elseif ($qtymaudikirim <= $qtywelding) {
            
            $finishgood = $this->finishgoodModel->getFinish($idwelding);
            $hitungfg = count($finishgood);

            for ($j=0; $j<$hitungfg ; $j++) { 
                $idpart = $finishgood[$j]['id_part'];
                $part = $this->partModel->getPart($idpart);
                $po = $this->poModel->getPartz($idpart);
                $qtyneed = (int) $finishgood[$j]['qty_need']; 
                $qtyyangdikirim = $qtyneed * $qtymaudikirim;
                
                $hitungpo = count($po);

                    if ($hitungpo < 1) {
                        session()->setFlashdata('pesan','Delivery Assy Welding Gagal, Tidak Ada Data Purchase Order'.'  '.$part[0]['nama_part'].'  '.'Dari Customer Tersebut');
                    return redirect()->to('/delivery');
                    }elseif ($hitungpo >= 1) {
                        
                        $idpo1 = $po[0]['id'];
                $qtydipo1 = (int) $po[0]['qty_pcs'];
                $delivact1 = (int) $po[0]['deliv_act'];
                // $idpo2 = $po[1]['id'];
                // $qtydipo2 = (int) $po[1]['qty_pcs'];
                // $delivact2 = (int) $po[1]['deliv_act'];
                $delivjadi1 = $qtyyangdikirim + $delivact1;
                // $delivjadi2 = $qtyyangdikirim + $delivact2;


                        if ($delivjadi1 > $qtydipo1) {
                            
                            $sisadeliv1 = $delivjadi1 - $qtydipo1;
                            $delivfix1  = $qtyyangdikirim - $sisadeliv1;
                            $delivbenerfix1[] = $delivfix1 + $delivact1; 
                            $fgfix[] = floor($delivfix1 / $qtyneed);
                            // $fpfixkekirim[] = $fgfix * $qtyneed; 

                         }elseif ($delivjadi1 <= $qtydipo1) {
                             $fgfix[] = $qtymaudikirim;
                             $fpfixkekirim[] = $qtyyangdikirim;
                             $delivbenerfix1[] = $delivjadi1;
                         }


                    }

            }

            for ($i=0; $i<$hitungfg ; $i++) { 
                $idpart = $finishgood[$i]['id_part'];
                $part = $this->partModel->getPart($idpart);
                $po = $this->poModel->getPartz($idpart);
                $idcustomer = $po[0]['id_customer'];
                $delivact = (int) $po[0]['deliv_act'];   
                $idpo = $po[0]['id'];
                $qtyneed = (int) $finishgood[$i]['qty_need']; 
                $qtydipo = (int) $po[0]['qty_pcs'];

                $fgyangbenerandikirim = min($fgfix);
                $qtydikirimkepo = $fgyangbenerandikirim * $qtyneed;
                $delivan = $delivact + $qtydikirimkepo;
                $sisadiwelding = $qtywelding - $fgyangbenerandikirim;  

                if ($qtydipo == $delivan )  {
                    $status = 'close';
                }else {
                    $status = 'belum close';
                }

                $this->poModel->save([
                        'id' => $idpo,
                        'deliv_act' => $delivan,
                        'status' => $status
                ]);

                $this->surjalcustModel->save([
                    'idpo' => $idpo,
                    'nosurjal' => $nosurjal,
                    'tgl' => $tgl,
                    'qty' => $qtydikirimkepo,
                    'id_customer' => $idcustomer
                ]);
              
                
                $schedule = $this->scheduleModel->getPoschedule($idpo);
            $hitungschedule = count($schedule);

            if ($hitungschedule > 1) {
                $qtyschedule1 = (int) $schedule[0]['qty'];
                $idschedule1 = $schedule[0]['id'];
                $qtyschedule2 = (int) $schedule[1]['qty'];
                $idschedule2  = $schedule[1]['id'];
                $keterangan = 'tuntas';

                if ($qtyschedule1 == $qtydikirimkepo) {
                    

                    $this->scheduleModel->save([
                        'id' => $idschedule1,
                        'keterangan' => $keterangan
                    ]);

                }elseif ($qtyschedule1 > $qtydikirimkepo) {
                    $sisaschedule = $qtyschedule1 - $qtydikirimkepo;
                    $selanjutnya = $sisaschedule + $qtyschedule2;

                    $this->scheduleModel->save([
                        'id' => $idschedule1,
                        'qty' => $qtydikirimkepo,
                        'keterangan' => $keterangan
                    ]);

                    $this->scheduleModel->save([
                        'id' => $idschedule2,
                        'qty' => $selanjutnya
                    ]);

                }elseif ($qtyschedule1 < $qtydikirimkepo) {
                    $lebihschedule = $qtydikirimkepo - $qtyschedule1;
                    $selanjutnya = $qtyschedule2 - $lebihschedule;

                    $this->scheduleModel->save([
                        'id' => $idschedule1,
                        'qty' => $qtydikirimkepo,
                        'keterangan' => $keterangan
                    ]);


                    $this->scheduleModel->save([
                        'id' => $idschedule2,
                        'qty' => $selanjutnya
                    ]);

                }



            }elseif ($hitungschedule == 1) {
                $qtyschedule1 = (int) $schedule[0]['qty'];
                $idschedule1 = $schedule[0]['id'];
                $keterangan = 'tuntas';

                if ($qtydikirimkepo >= $qtyschedule1) {
                    $this->scheduleModel->save([
                        'id' => $idschedule1,
                        'keterangan' => $keterangan
                    ]);
                }elseif ($qtydikirimkepo < $qtyschedule1) {
                        $sisaan = $qtyschedule1 - $qtydikirimkepo; 
                        
                        $this->scheduleModel->save([
                            'id' => $idschedule1,
                            'qty' => $sisaan
                        ]);
                }


            }




            }

            $this->weldingModel->save([
                'id' => $idwelding,
                'qty' =>$sisadiwelding
            ]);

        }


        

        session()->setFlashdata('pesanberhasil','Delivery'.'  ' .$namafg.'  '.'Berhasil');
        return redirect()->to('/delivery');


    }


}
