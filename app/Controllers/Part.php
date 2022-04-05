<?php

namespace App\Controllers;
use App\Models\CustModel;
use App\Models\PartModel;
use App\Models\ProsesModel;
use App\Models\Proses1Model;
use App\Models\Proses2Model;
use App\Models\Proses3Model;
use App\Models\Proses4Model;
use App\Models\Proses5Model;
use App\Models\Proses6Model;
use App\Models\Proses7Model;
use App\Models\SpotModel;
use App\Models\WhModel;
use App\Models\PoModel;
use App\Models\FinishgoodModel;
use App\Models\WhfgModel;

class Part extends BaseController
{

    protected $whfgModel;
    protected $poModel;
    protected $finishgoodModel;
    protected $whModel;
    protected $custModel;
    protected $partModel;
    protected $prosesModel;
    protected $proses1Model;
    protected $proses2Model;
    protected $proses3Model;
    protected $proses4Model;
    protected $proses5Model;
    protected $proses6Model;
    protected $proses7Model;
    protected $spotModel;

    public function __construct() {
        
        $this->whfgModel = new whfgModel();
        $this->poModel = new poModel();
        $this->finishgoodModel = new finishgoodModel();
        $this->whModel = new whModel();
        $this->spotModel = new spotModel();
        $this->custModel = new custModel();        
        $this->partModel = new partModel();
        $this->prosesModel = new prosesModel();
        $this->proses1Model = new proses1Model();
        $this->proses2Model = new proses2Model();
        $this->proses3Model = new proses3Model();
        $this->proses4Model = new proses4Model();
        $this->proses5Model = new proses5Model();
        $this->proses6Model = new proses6Model();
        $this->proses7Model = new proses7Model();
    }

    
        public function buatpart($id)
    {   
        
        $data = [
            'tittle' => 'Home | Form Tambah Data Part',
            'validation' => \Config\Services::Validation(),
            'id_customer' => $id
        ];
        return view('buatpart',$data);
    }

    public function savepart()
    {
        
        if (!$this->validate([
            'kode_part' => 'is_unique[part.kode_part]'
        ])) {
            session()->setFlashdata('pesangagal','Input Data Gagal, Sudah Ada Kode Part Tersebut Di Database!');
            return redirect()->to('/cust')->withInput();
            // $validation = \Config\Services::validation();
            // return redirect()->to('/ganding/create')->withInput()->with('validation',$validation);
        }
       

        $tes = $this->request->getPost();
$code = $tes['kode_part'];
$spoet = $tes['spot'];
        if ($spoet == 'spot') {
            $nut = $tes['nut'];
            $nut2 = 0;
        }elseif($spoet == '2spot') {
            $nut = $tes['nut'];
            $nut2 = $tes['nut2'];
            
        }elseif($spoet == 'nonspot'){
            $nut = 0;
            $nut2 = 0;
        }

if ($tes['unit'] =='coil' || $tes['unit'] =='lembar' || $tes['unit'] =='sheet' ) {
    if (!$this->validate([
        'kode_part' => 'required',
        'spec' => 'required',
        'tebal' => 'required',
        'berat_jenis' => 'required',
        'pcs_sheet' => 'required',
        'lebar' => 'required',
        'panjang' => 'required'
    ])) {
        session()->setFlashdata('pesangagal','Input Data Gagal, Lengkapi Data Spek, Tebal, Berat Jenis, Piece/Sheet, Lebar, dan Panjang Part Tersebut!');
        return redirect()->to('/cust')->withInput();
        // $validation = \Config\Services::validation();
        // return redirect()->to('/ganding/create')->withInput()->with('validation',$validation);
    }
        $tbl = $tes['tebal'];
        $cektbl = (float) $tes['tebal'];
        $bj = $tes['berat_jenis'];
        $cekbj = (float) $tes['berat_jenis'];
        $pcsshit = $tes['pcs_sheet'];
        $tespcsshit = (float) $tes['pcs_sheet'];
        $lebar = $tes['lebar'];
        $ceklebar = (float) $tes['lebar'];
        $pjg = $tes['panjang'];
        $cekpjg = (float) $tes['panjang'];
        $diameters = $tes['diameter'];
        $cekdiameters = (float) $tes['diameter'];
        
        if($tbl != $cektbl){
             session()->setFlashdata('pesangagal','Input Data Gagal, Anda Menginput Data Ketebalan Bukan Angka, Gunakan Titik Jika ingin Menginputkan Koma');
              return redirect()->to('/part/buatpart/'.$tes['id_customer']);
        }elseif($bj != $cekbj){
            session()->setFlashdata('pesangagal','Input Data Gagal, Anda Menginput Data Berat Jenis Bukan Angka, Gunakan Titik Jika ingin Menginputkan Koma');
             return redirect()->to('/part/buatpart/'.$tes['id_customer']);
        }elseif($pcsshit != $tespcsshit){
            session()->setFlashdata('pesangagal','Input Data Gagal, Anda Menginput Data Piece / Sheet Bukan Angka, Gunakan Titik Jika ingin Menginputkan Koma');
             return redirect()->to('/part/buatpart/'.$tes['id_customer']);
        }elseif($lebar != $ceklebar){
            session()->setFlashdata('pesangagal','Input Data Gagal, Anda Menginput Data Lebar Bukan Angka, Gunakan Titik Jika ingin Menginputkan Koma');
             return redirect()->to('/part/buatpart/'.$tes['id_customer']);
        }elseif($pjg != $cekpjg){
            session()->setFlashdata('pesangagal','Input Data Gagal, Anda Menginput Data Panjang Bukan Angka, Gunakan Titik Jika ingin Menginputkan Koma');
             return redirect()->to('/part/buatpart/'.$tes['id_customer']);
        }
        
        
    $serib = 1000000;

    $kg_sheet = round($tes['tebal'] * $tes['panjang'] * $tes['lebar'] * $tes['berat_jenis'] / $serib , 2);

    $kg_pcs = round($kg_sheet / $tes['pcs_sheet'], 2);

}elseif ($tes['unit'] == 'pcs') {
    $serib = "";
    $kg_sheet= "";
    $kg_pcs = "";
}elseif ($tes['unit'] == 'tube') {

    if (!$this->validate([
        'kode_part' => 'required',
        'spec' => 'required',
        'tebal' => 'required',
        'berat_jenis' => 'required',
        'diameter' => 'required',
        'panjang' => 'required'
    ])) {
        session()->setFlashdata('pesangagal','Input Data Gagal, Lengkapi Data Spek, Tebal, Berat Jenis, Piece/Sheet, Diameter, dan Panjang Part Tersebut!');
        return redirect()->to('/cust')->withInput();
        // $validation = \Config\Services::validation();
        // return redirect()->to('/ganding/create')->withInput()->with('validation',$validation);
    }
    
       $tbl = $tes['tebal'];
        $cektbl = (float) $tes['tebal'];
        $bj = $tes['berat_jenis'];
        $cekbj = (float) $tes['berat_jenis'];
        $diameters = $tes['diameter'];
        $cekdiameters = (float) $tes['diameter'];
        $pjg = $tes['panjang'];
        $cekpjg = (float) $tes['panjang'];
        $lbr = $tes['lebar'];
        $ceklbr = (float) $tes['lebar'];
        $pcsshit = $tes['pcs_sheet'];
        $tespcsshit = (float) $tes['pcs_sheet'];
        
        if($tbl != $cektbl){
             session()->setFlashdata('pesangagal','Input Data Gagal, Anda Menginput Data Ketebalan Bukan Angka, Gunakan Titik Jika ingin Menginputkan Koma');
              return redirect()->to('/part/buatpart/'.$tes['id_customer']);
        }elseif($bj != $cekbj){
            session()->setFlashdata('pesangagal','Input Data Gagal, Anda Menginput Data Berat Jenis Bukan Angka, Gunakan Titik Jika ingin Menginputkan Koma');
            return redirect()->to('/part/buatpart/'.$tes['id_customer']);
        }elseif($diameters != $cekdiameters){
            session()->setFlashdata('pesangagal','Input Data Gagal, Anda Menginput Data Diameter Bukan Angka, Gunakan Titik Jika ingin Menginputkan Koma');
             return redirect()->to('/part/buatpart/'.$tes['id_customer']);
        }elseif($pjg != $cekpjg){
            session()->setFlashdata('pesangagal','Input Data Gagal, Anda Menginput Data Panjang Bukan Angka, Gunakan Titik Jika ingin Menginputkan Koma');
             return redirect()->to('/part/buatpart/'.$tes['id_customer']);
        }


    $kg_sheet = "";
    $serib = 1000000;
    $hitunglebartube = $tes['diameter'] * 22/7;
    $kg_pcs = round($hitunglebartube  * $tes['tebal'] * $tes['berat_jenis'] * $tes['panjang'] / $serib ,3); 
}

        

        $name = $tes['nama_customer'];
        if ($tes['unit']=='lembar') {
            $sheet_lbr = floor(2438/$tes['lebar']);
            $pcs_lbr = floor($tes['pcs_sheet'] * $sheet_lbr);
        } elseif($tes['unit']=='sheet') {
            $sheet_lbr = floor(2438/$tes['lebar']) ;
            $pcs_lbr = floor($tes['pcs_sheet'] * $sheet_lbr) ;
        } elseif ($tes['unit']=='coil') {
            $sheet_lbr = 0;
            $pcs_lbr = 0;
        }elseif ($tes['unit'] == 'pcs') {
           $pcs_lbr = 0;
           $sheet_lbr = 0;
       }elseif ($tes['unit'] == 'tube') {
           $pcs_lbr = 0;
           $sheet_lbr = 0;
       }
        // elseif (!$this->validate([
        //     'foto' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]'
        // ])) {
        //     session()->setFlashdata('pesan','Harus Input Foto');
        //     return redirect()->to('/cust')->withInput();
        //     // $validation = \Config\Services::validation();
        //     // return redirect()->to('/ganding/create')->withInput()->with('validation',$validation);
        // }
        $filefoto= $this->request->getFile('foto');
            
        if ($filefoto != "") {
            if (!$this->validate([
                'foto' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]'
            ])) {
                session()->setFlashdata('pesangagal','Input Data Gagal, Harus Mengupload File Foto Dengan Ekstensi .jpg atau .jpeg atau .png dan Tidak Lebih Dari 1 MB ');
        return redirect()->to('/cust');
            }

        $namafile = $filefoto->getRandomName();

        $filefoto->move('img', $namafile);
        
    }else{
            $namafile = "";
        }

        $this->partModel->save([
            'nama_part' =>  $tes['nama_part'],
            'kode_part' =>  $tes['kode_part'],
            'nama_customer' =>  $tes['nama_customer'],
            'berat_jenis' =>  $tes['berat_jenis'],
            'unit_material' =>  $tes['unit'],
            'tebal' =>  $tes['tebal'],
            'panjang' =>  $tes['panjang'],
            'lebar' =>  $tes['lebar'],
            'kg_sheet' =>  $kg_sheet,
            'kg_pcs' =>  $kg_pcs,
            'pcs_sheet' =>  $tes['pcs_sheet'],
            'proses' =>  $tes['proses'],
            'spot' =>  $tes['spot'],
            'nut' => $nut,
            'nut2' => $nut2,
            'id_customer' =>  $tes['id_customer'],
            'spec' => $tes['spec'],
            'pcs_lembar' => $pcs_lbr,
            'sheet_lembar' => $sheet_lbr,
            'foto' => $namafile,
            'diameter' => $tes['diameter']
           ]);

           $query =  mysqli_query($this->koneksi, "select * from part where kode_part = '$code' ");
           $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
           $idpart = $hasil[0]['id'];
           $proses = $tes['proses'];

if ($proses == 1) {
    $this->proses1Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses1'],
        'plan1' => '',
        'actual_proses1' => ''
    ]);
}elseif ($proses == 2) {
    $this->proses1Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses1'],
        'plan1' => '',
        'actual_proses1' => ''
    ]);
    $this->proses2Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses2'],
        'plan2' => '',
        'actual_proses2' => ''
    ]);
} elseif ($proses ==3) {
    $this->proses1Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses1'],
        'plan1' => '',
        'actual_proses1' => ''
    ]);
    $this->proses2Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses2'],
        'plan2' => '',
        'actual_proses2' => ''
    ]);
    $this->proses3Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses3'],
        'plan3' => '',
        'actual_proses3' => ''
    ]);
}elseif ($proses ==4) {
    $this->proses1Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses1'],
        'plan1' => '',
        'actual_proses1' => ''
    ]);
    $this->proses2Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses2'],
        'plan2' => '',
        'actual_proses2' => ''
    ]);
    $this->proses3Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses3'],
        'plan3' => '',
        'actual_proses3' => ''
    ]);
    $this->proses4Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses4'],
        'plan4' => '',
        'actual_proses4' => ''
    ]);
}elseif ($proses ==5) {
    $this->proses1Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses1'],
        'plan1' => '',
        'actual_proses1' => ''
    ]);$this->proses2Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses2'],
        'plan2' => '',
        'actual_proses2' => ''
    ]);$this->proses3Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses3'],
        'plan3' => '',
        'actual_proses3' => ''
    ]);$this->proses4Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses4'],
        'plan4' => '',
        'actual_proses4' => ''
    ]);$this->proses5Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses5'],
        'plan5' => '',
        'actual_proses5' => ''
    ]);
}elseif ($proses == 6) {
    $this->proses1Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses1'],
        'plan1' => '',
        'actual_proses1' => ''
    ]);
    $this->proses2Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses2'],
        'plan2' => '',
        'actual_proses2' => ''
    ]);
    $this->proses3Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses3'],
        'plan3' => '',
        'actual_proses3' => ''
    ]);
    $this->proses4Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses4'],
        'plan4' => '',
        'actual_proses4' => ''
    ]);
    $this->proses5Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses5'],
        'plan5' => '',
        'actual_proses5' => ''
    ]);
    $this->proses6Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses6'],
        'plan6' => '',
        'actual_proses6' => ''
    ]);
}elseif ($proses == 7) {
    $this->proses1Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses1'],
        'plan1' => '',
        'actual_proses1' => ''
    ]);
    $this->proses2Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses2'],
        'plan2' => '',
        'actual_proses2' => ''
    ]);
    $this->proses3Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses3'],
        'plan3' => '',
        'actual_proses3' => ''
    ]);
    $this->proses4Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses4'],
        'plan4' => '',
        'actual_proses4' => ''
    ]);
    $this->proses5Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses5'],
        'plan5' => '',
        'actual_proses5' => ''
    ]);
    $this->proses6Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses6'],
        'plan6' => '',
        'actual_proses6' => ''
    ]);
    $this->proses7Model->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['proses7'],
        'plan7' => '',
        'actual_proses7' => ''
    ]);
}

if ($proses !== "") {
    $this->prosesModel->save([
        'id_part' => $idpart,
        'qtyin' => 0,
        'qty_out' => 0
    ]);
}

if ($spoet == 'spot') {
    $this->spotModel->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['namaspot'],
        'qty_in' => 0,
        'qty_out' => 0,
        'keterangan' => 'spot1'
    ]);
}elseif($spoet == '2spot'){
    $this->spotModel->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['namaspot'],
        'qty_in' => 0,
        'qty_out' => 0,
        'keterangan' => 'spot1'
        ]);
        
        $this->spotModel->save([
        'id_part' => $idpart,
        'nama_part' => $tes['nama_part'],
        'nama_proses' => $tes['namaspot2'],
        'qty_in' => 0,
        'qty_out' => 0,
        'keterangan' => 'spot2'
        ]);
        
}



           session()->setFlashdata('pesan','Data Part Customer' . '  ' . $name . '  '. 'Berhasil Ditambahkan!');
       return redirect()->to('/cust');
    }

    public function detailpart($id)
    {
        $data = [
            'tittle' => 'Home | Detail Part',
            'part' => $this->partModel->getPart($id)
        ];

   
        return view('detailpart',$data);
    }

    public function saveeditpart()
    {
        $part = $this->request->getPost();
        
        $idpart = $part['idpart'];
        $getpart = $this->partModel->getPart($idpart);
        $code1 = $getpart[0]['kode_part'];
        $code2 = $part['kode_part'];
        $process = $part['proses'];

        if ($code1 !== $code2) {
            
            if (!$this->validate([
                'kode_part' => 'is_unique[part.kode_part]'
            ])) {
                session()->setFlashdata('pesangagal','Edit Data Gagal, Sudah Ada Kode Part Tersebut Di Database!');
                return redirect()->to('/part/'.$part['idpart'])->withInput();
                // $validation = \Config\Services::validation();
                // return redirect()->to('/ganding/create')->withInput()->with('validation',$validation);
            }

        }

        

        if ($part['unit'] =='coil' || $part['unit'] =='lembar' || $part['unit'] =='sheet' ) {
            if (!$this->validate([
                'kode_part' => 'required',
                'spec' => 'required',
                'tebal' => 'required',
                'berat_jenis' => 'required',
                'pcs_sheet' => 'required',
                'lebar' => 'required',
                'panjang' => 'required'
            ])) {
                session()->setFlashdata('pesangagal','Edit Data Gagal, Lengkapi Data Spek, Tebal, Berat Jenis, Piece/Sheet, Lebar, dan Panjang Part Tersebut!');
                return redirect()->to('/part/'.$part['idpart'])->withInput();
                // $validation = \Config\Services::validation();
                // return redirect()->to('/ganding/create')->withInput()->with('validation',$validation);
            }
            
             $tbl = $part['tebal'];
        $cektbl = (float) $part['tebal'];
        $bj = $part['berat_jenis'];
        $cekbj = (float) $part['berat_jenis'];
        $pcsshit = $part['pcs_sheet'];
        $tespcsshit = (float) $part['pcs_sheet'];
        $lebar = $part['lebar'];
        $ceklebar = (float) $part['lebar'];
        $pjg = $part['panjang'];
        $cekpjg = (float) $part['panjang'];
        $diameters = $part['diameter'];
        $cekdiameters = (float) $part['diameter'];
        
        if($tbl != $cektbl){
             session()->setFlashdata('pesangagal','Input Data Gagal, Anda Menginput Data Ketebalan Bukan Angka, Gunakan Titik Jika ingin Menginputkan Koma');
              return redirect()->to('/part/'.$part['idpart']);
        }elseif($bj != $cekbj){
            session()->setFlashdata('pesangagal','Input Data Gagal, Anda Menginput Data Berat Jenis Bukan Angka, Gunakan Titik Jika ingin Menginputkan Koma');
             return redirect()->to('/part/'.$part['idpart']);
        }elseif($pcsshit != $tespcsshit){
            session()->setFlashdata('pesangagal','Input Data Gagal, Anda Menginput Data Piece / Sheet Bukan Angka, Gunakan Titik Jika ingin Menginputkan Koma');
             return redirect()->to('/part/'.$part['idpart']);
        }elseif($lebar != $ceklebar){
            session()->setFlashdata('pesangagal','Input Data Gagal, Anda Menginput Data Lebar Bukan Angka, Gunakan Titik Jika ingin Menginputkan Koma');
             return redirect()->to('/part/'.$part['idpart']);
        }elseif($pjg != $cekpjg){
            session()->setFlashdata('pesangagal','Input Data Gagal, Anda Menginput Data Panjang Bukan Angka, Gunakan Titik Jika ingin Menginputkan Koma');
             return redirect()->to('/part/'.$part['idpart']);
        }

            $serib = 1000000;

    $kg_sheet = round($part['tebal'] * $part['panjang'] * $part['lebar'] * $part['berat_jenis'] / $serib , 2);

    $kg_pcs = round($kg_sheet / $part['pcs_sheet'], 2);

        }elseif($part['unit']=='pcs'){
            $serib = "";
            $kg_sheet= "";
            $kg_pcs = "";
            
        }elseif ($part['unit']=='tube') {
            if (!$this->validate([
        'kode_part' => 'required',
        'spec' => 'required',
        'tebal' => 'required',
        'berat_jenis' => 'required',
        'diameter' => 'required',
        'panjang' => 'required'
    ])) {
        session()->setFlashdata('pesangagal','Input Data Gagal, Lengkapi Data Spek, Tebal, Berat Jenis, Diameter, dan Panjang Part Tersebut!');
       return redirect()->to('/part/'.$part['idpart'])->withInput();
        // $validation = \Config\Services::validation();
        // return redirect()->to('/ganding/create')->withInput()->with('validation',$validation);
    }
    
    $tbl = $part['tebal'];
        $cektbl = (float) $part['tebal'];
        $bj = $part['berat_jenis'];
        $cekbj = (float) $part['berat_jenis'];
        $diameters = $part['diameter'];
        $cekdiameters = (float) $part['diameter'];
        $pjg = $part['panjang'];
        $cekpjg = (float) $part['panjang'];
        $lbr = $part['lebar'];
        $ceklbr = (float) $part['lebar'];
        $pcsshit = $part['pcs_sheet'];
        $tespcsshit = (float) $part['pcs_sheet'];
        
        if($tbl != $cektbl){
             session()->setFlashdata('pesangagal','Input Data Gagal, Anda Menginput Data Ketebalan Bukan Angka, Gunakan Titik Jika ingin Menginputkan Koma');
              return redirect()->to('/part/'.$part['idpart']);
        }elseif($bj != $cekbj){
            session()->setFlashdata('pesangagal','Input Data Gagal, Anda Menginput Data Berat Jenis Bukan Angka, Gunakan Titik Jika ingin Menginputkan Koma');
            return redirect()->to('/part/'.$part['idpart']);
        }elseif($diameters != $cekdiameters){
            session()->setFlashdata('pesangagal','Input Data Gagal, Anda Menginput Data Diameter Bukan Angka, Gunakan Titik Jika ingin Menginputkan Koma');
             return redirect()->to('/part/'.$part['idpart']);
        }elseif($pjg != $cekpjg){
            session()->setFlashdata('pesangagal','Input Data Gagal, Anda Menginput Data Panjang Bukan Angka, Gunakan Titik Jika ingin Menginputkan Koma');
             return redirect()->to('/part/'.$part['idpart']);
        }


    $kg_sheet = "";
    $serib = 1000000;
    $hitunglebartube = $part['diameter'] * 22/7;
    $kg_pcs = round($hitunglebartube  * $part['tebal'] * $part['berat_jenis'] * $part['panjang'] / $serib ,3); 
        }


        if ($part['unit']=='lembar') {
            $sheet_lbr = floor(2438/$part['lebar']);
            $pcs_lbr = floor($part['pcs_sheet'] * $sheet_lbr);
        } elseif($part['unit']=='sheet') {
            $sheet_lbr = floor(2438/$part['lebar']) ;
            $pcs_lbr = floor($part['pcs_sheet'] * $sheet_lbr) ;
        } elseif ($part['unit']=='coil') {
            $sheet_lbr = 0;
            $pcs_lbr = 0;
        }elseif ($part['unit'] == 'pcs') {
           $pcs_lbr = 0;
           $sheet_lbr = 0;
       }elseif ($part['unit'] == 'tube') {
           $pcs_lbr = 0;
           $sheet_lbr = 0;
       }

       $filefoto= $this->request->getFile('foto');
            
       if ($filefoto != "") {
           if (!$this->validate([
               'foto' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]'
           ])) {
               session()->setFlashdata('pesangagal','Edit Data Gagal, Harus Mengupload File Foto Dengan Ekstensi .jpg atau .jpeg atau .png dan Tidak Lebih Dari 1 MB ');
       return redirect()->to('/part/'.$part['idpart'])->withInput();
           }

       $namafile = $filefoto->getRandomName();

       $filefoto->move('img', $namafile);
       
   }else{
       
       $fotolama = $getpart[0]['foto'];
       
       if($fotolama == ""){
           $namafile = "";

       }elseif ($fotolama !== ""){
           $namafile = $fotolama;
       }
       
       
       }

        
       if ($part['spot'] == 'nonspot') {
           $nutsz = 0;
           $nutsz2 = 0;
           $getspot = $this->spotModel->getSpotz($idpart);
        $hitungspot = count($getspot);
        if ($hitungspot > 0) {
            $qtydispot = $getspot[0]['qty_in'];
            $idspot = $getspot[0]['id'];
            $namaspot = $getspot[0]['nama_proses'];

            if ($qtydispot > 0) {
                 session()->setFlashdata('pesangagal','Edit Data Gagal, Masih ada Stock di proses   '.$namaspot);
       return redirect()->to('/part/'.$part['idpart']);

            }

            
        }
        
         $spot2 = $this->spotModel->getSpot2($idpart);
            $hitungspot2 = count($spot2);
            
            if ($hitungspot2 > 0) {
            $qtydispot2 = $spot2[0]['qty_in'];
            $idspot2 = $spot2[0]['id'];
            $namaspot2 = $spot2[0]['nama_proses'];

            if ($qtydispot2 > 0) {
                 session()->setFlashdata('pesangagal','Edit Data Gagal, Masih ada Stock di proses  '.$namaspot2);
       return redirect()->to('/part/'.$part['idpart']);

            }
            
       }
        

       }elseif($part['spot'] == 'spot'){
           $nutsz = $part['nut'];
           $nutsz2 = 0;
            $spot2 = $this->spotModel->getSpot2($idpart);
            $hitungspot2 = count($spot2);
            
            if ($hitungspot2 > 0) {
            $qtydispot2 = $spot2[0]['qty_in'];
            $idspot2 = $spot2[0]['id'];
            $namaspot = $spot2[0]['nama_proses'];

            if ($qtydispot2 > 0) {
                 session()->setFlashdata('pesangagal','Edit Data Gagal, Masih ada Stock di proses  '.$namaspot);
       return redirect()->to('/part/'.$part['idpart']);

            }
            
       }
           
       }else{
           $nutsz = $part['nut'];
           $nutsz2 = $part['nut2'];
       }

       $this->partModel->save([
            'id' => $idpart,
            'nama_part' => $part['nama_part'],
            'kode_part' => $code2,
            'berat_jenis' => $part['berat_jenis'],
            'kg_sheet' => $kg_sheet,
            'pcs_sheet' => $part['pcs_sheet'],
            'kg_pcs' => $kg_pcs,
            'sheet_lembar' => $sheet_lbr,
            'spec' =>  $part['spec'],
            'tebal' => $part['tebal'],
            'lebar' => $part['lebar'],
            'panjang' => $part['panjang'],
            'pcs_lembar' => $pcs_lbr,
            'spot' => $part['spot'],
            'nut' => $nutsz,
            'nut2' => $nutsz2,
            'unit_material' => $part['unit'],
            'foto' => $namafile,
            'diameter' => $part['diameter']
       ]);

       $num = 1;
       $number = 1;
       $nomor = 1;
       $itunglagi = 1;
       for ($i=0; $i<$process ; $i++) {
           $namaprosesbaru = $part['proses'.$itunglagi++]; 
           $varmodel = 'proses'.$number++.'Model';
           $getprocess = 'getProcess'.$nomor++; 
           $ambilproses = $this->$varmodel->$getprocess($idpart);
           $idproses = $ambilproses[0]['id'];

           $this->$varmodel->save([
                'id' => $idproses,
                'nama_part' => $part['nama_part'],
                'nama_proses' => $namaprosesbaru
           ]);
       }

       if ($part['spot']=='spot') {
        $getspot = $this->spotModel->getSpotz($idpart);
        $hitungspot = count($getspot);
        if ($hitungspot == 0) {
            $this->spotModel->save([
                'id_part' => $idpart,
                'nama_part' => $part['nama_part'],
                'nama_proses' => $part['namaspot'],
                'qty_in' => 0,
                'qty_out' => 0
            ]);            
        }elseif($hitungspot > 0) {
            $idspot = $getspot[0]['id'];
            $this->spotModel->save([
                'id' => $idspot,
                'nama_part' => $part['nama_part'],
                'nama_proses' => $part['namaspot']
            ]);  
        }


       }elseif($part['spot'] == 'nonspot'){
        $getspot = $this->spotModel->getSpotz($idpart);
        $hitungspot = count($getspot);
        if ($hitungspot > 0) {
            $qtydispot = $getspot[0]['qty_in'];
            $idspot = $getspot[0]['id'];
            if ($qtydispot > 0) {
                

            }else{
                $this->spotModel->delete($idspot);
            }
            
        }
    }elseif($part['spot'] == '2spot'){
        
        $spot1 = $this->spotModel->getSpot1($idpart);
        $spot2 = $this->spotModel->getSpot2($idpart);
        $itung1 = count($spot1);
        $itung2 = count($spot2);
        
        if($itung1 > 0 ){
            $idspot1 = $spot1[0]['id'];
            $this->spotModel->save([
                    'id' => $idspot1,
                    'nama_proses' => $part['namaspot']
                ]);
        }elseif($itung1 == 0){
            
            $this->spotModel->save([
                'id_part' => $idpart,
                'nama_part' => $part['nama_part'],
                'nama_proses' => $part['namaspot'],
                'qty_in' => 0,
                'qty_out' => 0,
                'keterangan' => 'spot1'
            ]);
            
        }
        
        if($itung2 > 0 ){
            $idspot2 = $spot1[0]['id'];
            $this->spotModel->save([
                    'id' => $idspot2,
                    'nama_proses' => $part['namaspot2']
                ]);
        }elseif($itung2 == 0){
            
            $this->spotModel->save([
                'id_part' => $idpart,
                'nama_part' => $part['nama_part'],
                'nama_proses' => $part['namaspot2'],
                'qty_in' => 0,
                'qty_out' => 0,
                'keterangan' => 'spot2'
            ]);
            
        }
        
        
        
        
        
    }

       session()->setFlashdata('pesan','Data Part Customer' . '  ' . $part['nama_part'] . '  '. 'Berhasil Di Ubah!');
       return redirect()->to('/part/'.$part['idpart']);


    }

    public function deletepart()
    {
        $deletepost = $this->request->getPost();
        $idpart = $deletepost['idpart'];
        

        $getpart = $this->partModel->getPart($idpart);
        $proses = $getpart[0]['proses'];
        $code = $getpart[0]['kode_part'];

        $num = 1;
        $nomor = 1;
        $number = 1;
        $itungg = 1;
        for ($i=0; $i<$proses ; $i++) { 
            $model = 'proses'.$num++.'Model';
            $getmodel = 'getProcess'.$nomor++;
            $plan = 'plan'.$number++;
            $hitungproses = 'Proses'.$itungg++;

            $getproses = $this->$model->$getmodel($idpart);
            $qtyin = $getproses[0][$plan];
            if ($qtyin > 0) {
                session()->setFlashdata('pesangagal','Delete Data Gagal, Masih ada WIP Part Tersebut di '. $hitungproses);
                return redirect()->to('/part/'.$idpart);
            }

        }
        $wh = $this->whModel->getWhpart($code);
        $itungwh = count($wh);

    for($i=0; $i<$itungwh; $i++){
$totalqtywh = $wh[$i]['total_qty'];

            if ($totalqtywh > 0) {
            session()->setFlashdata('pesangagal','Delete Data Gagal, Masih ada Data Material Part Tersebut Di Warehouse RM');
            return redirect()->to('/part/'.$idpart);
            }
    }


        $whfg = $this->whfgModel->getwhfgpart($idpart);
        $itungwhfg = count($whfg);

        for($b=0; $b<$itungwhfg; $b++){
            
            $qtywhfg = $whfg[$b]['qty'];
     
            if ($qtywhfg > 0) {
            session()->setFlashdata('pesangagal','Delete Data Gagal, Masih ada Data Stock Part Tersebut Di Warehouse Finish Good');
            return redirect()->to('/part/'.$idpart);
        }
            
        }


        $getspot = $this->spotModel->getSpotdelete($idpart);
        $hitungspot = count($getspot);
        
        if ($hitungspot == 1 ) {

            $qtyinspot = $getspot[0]['qty_in'];
            if ($qtyinspot > 0) {
             session()->setFlashdata('pesangagal','Delete Data Gagal, Masih ada Data Stock Part Tersebut Di Proses SPOT');
            return redirect()->to('/part/'.$idpart);   
            }
        
        }elseif($hitungspot == 2){
            $qtyinspot = $getspot[0]['qty_in'];
            if ($qtyinspot > 0) {
             session()->setFlashdata('pesangagal','Delete Data Gagal, Masih ada Data Stock Part Tersebut Di Proses SPOT');
            return redirect()->to('/part/'.$idpart);   
            }
            
            $qtyinspot2 = $getspot[1]['qty_in'];
            if ($qtyinspot2 > 0) {
             session()->setFlashdata('pesangagal','Delete Data Gagal, Masih ada Data Stock Part Tersebut Di Proses SPOT');
            return redirect()->to('/part/'.$idpart);   
            }
            
        }


        $getpo = $this->poModel->getPartz($idpart);
        $itungpo = count($getpo);

        if ($itungpo > 0) {
            session()->setFlashdata('pesangagal','Delete Data Gagal, Masih Ada Purchase Order Customer Atas Part Tersebut');
            return redirect()->to('/part/'.$idpart);
        }

        $num2= 1;
        $nomor2 = 1;
        $number2 = 1;
        for ($j=0; $j < $proses ; $j++) { 
            $model2 = 'proses'.$num2++.'Model';
            $getmodel2 = 'getProcess'.$nomor2++;
            $plan2 = 'plan'.$number2++;

            $getprocess = $this->$model2->$getmodel2($idpart);
            $idproses = $getprocess[0]['id'];

            $this->$model2->delete($idproses);

        }

        $getfinishgood = $this->finishgoodModel->getFinishpart($idpart);
        $hitungfinishgood = count($getfinishgood);
        if ($hitungfinishgood > 0) {
            $idfinishgood = $getfinishgood[0]['id'];
            $this->finishgoodModel->delete($idfinishgood);
        }


        $getwh = $this->whModel->getWhdelete($code);
        $hitungwh = count($getwh);
        
        for($k=0; $k<$hitungwh; $k++){
$idwh = $getwh[$k]['id'];
        $this->whModel->delete($idwh); 
    }

        $getwhfg = $this->whfgModel->getWhfg($idpart);
        $hitungwhfg = count($getwhfg);
        
        for($u=0; $u<$hitungwhfg; $u++){
$idwhfg = $getwhfg[$u]['id'];
        $this->whfgModel->delete($idwhfg); 
    }
        
        $spot = $this->spotModel->getSpot1($idpart);
        $hitungspotz = count($spot);
        if ($hitungspotz > 0) {
            $idspotz = $spot[0]['id'];
            $this->spotModel->delete($idspotz);
        }
        
        $spot2 = $this->spotModel->getSpot2($idpart);
        $hitungspotz2 = count($spot2);
        if ($hitungspotz2 > 0) {
            $idspotz2 = $spot2[0]['id'];
            $this->spotModel->delete($idspotz2);
        }


        $this->partModel->delete($idpart);


        
       session()->setFlashdata('pesan','Data Part Customer' . '  ' . $getpart[0]['nama_part'] . '  '. 'Berhasil Di Hapus!');
       return redirect()->to('/cust');

    }
    
}
