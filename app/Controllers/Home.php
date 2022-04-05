<?php

namespace App\Controllers;
use App\Models\PartModel;
use App\Models\LaporanproduksiModel;

class Home extends BaseController
{   
    protected $laporanproduksiModel;
    protected $partModel;

    public function __construct()
    {
        $this->laporanproduksiModel = new laporanproduksiModel();
        $this->partModel = new partModel();
    }

    public function index()
    {
        return view('welcome_message');
    }

    public function cetakrekapsup()
    {
        $get = $this->request->getGet();
        $idsurjal = $get['idsurjal'];
        $idsup = $get['idsup'];
        $data=[
            'tittle' => 'HOME | Cetak Rekap Surjal Supplier',
            'idsurjal' => $idsurjal,
            'idsup' => $idsup
        ];
        
        return view('cetakrekapsup', $data);
    }

    public function cetakrekapcust($id)
    {
        $data=[
            'tittle' => 'HOME | Cetak Rekap Surjal Customer',
            'nosurjal' => $id
        ];
        return view('cetakrekapcust', $data);
    }

    public function cetakwip($id)
    {
        $data = [
            'hasil' => $this->partModel->getPartz($id),
            'tittle' => 'HOME | Cetak Stock WIP'
        ];

        return view('cetakwip', $data);
    }

    public function cetakmrp()
    {
        $post = $this->request->getPost();
        $tanggul = $post['tanggal'];
        $id = $post['id'];
        $data= [
            'tittle' => 'HOME | Cetak MRP',
            'tanggul' => $tanggul,
            'id' => $id

        ];

        return view('cetakmrp',$data);
    }

    public function indexlogin()
    {
        $data=[
            'tittle' => 'Login System'
        ];
        return view('indexlogin',$data);
    }

    public function login()
    {

if (mysqli_connect_errno()){
    echo "Koneksi Ke Database Gagal : ".mysqli_connect_error();
}

$login = $this->request->getPost();

$username = $login['username'];
$password = $login['password'];

$query = mysqli_query($this->koneksi, "select * from admin where username='$username' and password='$password'");

$check = mysqli_num_rows($query);
$_SESSION['username']=$username;
if ($check>0){


    if ($_SESSION['username']=='admin') {
    $_SESSION['status'] = 'login';
    return redirect()->to('/halamanutama');

    } elseif ($_SESSION['username']=='ppic') {
        $_SESSION['status'] = 'login';
        return redirect()->to('/halamanutama');

    } elseif ($_SESSION['username']=='marketing') {
         $_SESSION['status'] = 'login';         
         return redirect()->to('/halamanutama');

    }elseif ($_SESSION['username']=='purchasing') {
        $_SESSION['status'] = 'login';
        return redirect()->to('/halamanutama');
    }
} 

else{
    session()->setFlashdata('pesangagal','Username atau Password Salah');
    return redirect()->to('/');
}



    }

    public function logout()
    {
        unset($_SESSION['status']);

        session()->setFlashdata('pesan','Anda Berhasil Logout');
        return redirect()->to('/');

    }

    public function laporanproduksi($id)
    {
        $data=[
            'tittle' => 'HOME | LAPORAN PRODUKSI',
            'proses' => $this->laporanproduksiModel->getLaps($id)
        ];
        
        return view('laporanproduksi',$data);
    }

    public function cetaklaporan($id1,$id2)
    {
        $data=[
            'tittle' => 'HOME | CETAK LAPORAN',
            'proses' => $id1,
            'tgl' => $id2
        ];

        return view('cetaklaporan', $data);
    }




}
