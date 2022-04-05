<?php

namespace App\Controllers;
use App\Models\CustModel;
use App\Models\PartModel;
use App\Models\PoModel;
use App\Models\RevisicustModel;

class Customer extends BaseController
{
    protected $custModel;
    protected $partModel;
    protected $revisicustModel;
    public function __construct() {
        
        $this->revisicustModel = new revisicustModel();
        $this->custModel = new custModel();        
        $this->partModel = new partModel();
        $this->poModel = new poModel();
    }

    public function page()
    {
        if (isset($_SESSION['status'])) {
            $data = [
                'tittle' => 'HOME | Halaman Utama'
            ];
            return view('utama',$data);    
        }else {
            session()->setFlashdata('pesangagal','Anda Belum Login');
            return redirect()->to('/');
        }
        
    }

    public function index()
    {
        if (isset($_SESSION['status'])) {
        $data = [
            'tittle' => 'Home | SCM',
            'cust' => $this->custModel->getCustomer()
        ];
        
        return view('index',$data);
    }else {
        session()->setFlashdata('pesangagal','Anda Belum Login');
            return redirect()->to('/');
    }

    }

    public function detail($id)
    {
        $data = [
            'tittle' => 'Home | Details',
            'cust' => $this->custModel->getCustomer($id),
            'part' => $this->partModel->getPartz($id)
        ];
        
        return view('detail',$data);
    }

    public function buat()
    {
        $data = [
            'tittle' => 'Home | Form Tambah Data',
            'validation' => \Config\Services::Validation()
        ];
        return view('buat',$data);
    }

    public function save()
    {

        $tes = $this->request->getPost();

        $total=count($tes['nama_customer']);
        if (!$this->validate([
            'nama_customer' => 'required'
        ])) {
            session()->setFlashdata('pesangagal','Lengkapi Data Tersebut!');
            return redirect()->to('/buatcust')->withInput();
            // $validation = \Config\Services::validation();
            // return redirect()->to('/ganding/create')->withInput()->with('validation',$validation);
        }

        elseif (!$this->validate([
                'nama_customer' => 'is_unique[customer.nama_customer]'
        ])) {
            session()->setFlashdata('pesangagal','Sudah ada Data Customer Tersebut!');
            return redirect()->to('/buatcust')->withInput();
        }
        for($i=0; $i<$total; $i++){
            

               $this->custModel->save([
        'nama_customer' =>  $tes['nama_customer'][$i],
        'alamat' =>  $tes['alamat'][$i],
        'kontak' =>  $tes['kontak'][$i],
        'email' =>  $tes['email'][$i]
       ]);

       

    }
session()->setFlashdata('pesan','Data Customer Berhasil Ditambahkan!');
       return redirect()->to('/cust');
    }


    public function po()
    {
        if (isset($_SESSION['status'])) {
        $data = [
         'tittle' => 'Home | PO Customer',
         'po' => $this->poModel->getPo()   

        ];
      return view('po', $data);  
    }else {
        session()->setFlashdata('pesangagal','Anda Belum Login');
            return redirect()->to('/');
    }

    }

    public function buatpo()
    {
        $data = [
            'tittle' => 'Home | Buat Purchase Order',
        ];
        return view('buatpo', $data);
    }

    public function savecust()
    {
        if (!$this->validate([
            'qty_pcs' => 'numeric'
        ])) {
           session()->setFlashdata('pesangagal','Input Data Gagal, Inputlah Quantity Order Dengan Angka!');
            return redirect()->to('/buatpo');
        }
        
        $tes = $this->request->getPost();
        $idpart = $tes['nama_part'];

        $query =  mysqli_query($this->koneksi, "select * from part where id = $tes[nama_part] ");
        $hasil = mysqli_fetch_all($query, MYSQLI_ASSOC);
        foreach ($hasil as $item){
        $nama_part = $item['nama_part'];
        $kode_part = $item['kode_part'];
        $nama_cust = $item['nama_customer'];
        }

        $this->poModel->save([
            'nama_customer' =>  $nama_cust,
            'id_customer' => $tes['nama_customer'],
            'no_po' =>  $kode_part,
            'id_part' => $idpart,
            'tgl_po' =>  $tes['tgl_po'],
            'tglterima_po' =>  $tes['tgl_terima'],
            'nama_part' => $nama_part,
            'qty_pcs' =>  $tes['qty_pcs'],
            'nomor_po' =>  $tes['nomor_po'],
            'status' => 'belum close',
            'schedule' => 'tidak masuk'
           ]);

           session()->setFlashdata('pesan','Data Purchase Order Customer Berhasil Di Input!');
       return redirect()->to('/pocust');
    

    }

    public function mrp()
    {
        if (isset($_SESSION['status'])) {
        $data = [
            'tittle' => 'Home | MRP'

        ];

        return View('mrp', $data);
    }else {
        session()->setFlashdata('pesangagal','Anda Belum Login');
            return redirect()->to('/');
    }

    }

    public function saverevisi()
    {
        if (!$this->validate([
            'qtypcs' => 'numeric'
        ])) {
           session()->setFlashdata('pesangagal','Revisi Data Gagal, Inputlah Quantity Order Dengan Angka!');
            return redirect()->to('/pocust');
        }
        
        $revisi = $this->request->getPost();
        $idpo = $revisi['idpo'];
        $qtybaru = $revisi['qtypcs'];
        $polama = $this->poModel->getPo($idpo);
        $qtylama = $polama[0]['qty_pcs'];
        $revisilama = $polama[0]['revisi_po'];
        $idpart = $polama[0]['id_part'];
        $namacust = $polama[0]['nama_customer'];
        $tglpo = $polama[0]['tgl_po'];
        $tglterima = $polama[0]['tglterima_po'];

        
        date_default_timezone_set('Asia/Jakarta');
         $date =date('Y-m-d H:i:s'); 

        if ($revisilama == '') {
            $revisilamabgt = 1;
        }elseif ($revisilama !== '') {
            $revisilamabgt = $revisilama + 1;
        }

        $this->poModel->save([
            'id' => $idpo,
            'tgl_po' => $revisi['tgl_po'],
            'tglterima_po' => $revisi['tglterima_po'],
            'revisi_po' => $revisilamabgt,
            'qty_pcs' => $qtybaru
        ]);

        $this->revisicustModel->save([
            'nama_customer' => $namacust,
            'idpoasli' => $idpo,
            'tgl_po' => $tglpo,
            'revisi_po' => $revisilamabgt,
            'id_part' => $idpart,
            'qty_pcs' => $qtylama,
            'updated_at' => $date
        ]);

        session()->setFlashdata('pesan','Data Purchase Order Customer Berhasil Di Revisi');
        return redirect()->to('/pocust');
    }

}
