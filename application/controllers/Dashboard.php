<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
        $this->load->model('User_model', 'userrole');
        $this->load->model('Donasi_Barang_model');
        $this->load->model('Donasi_Uang_model');
        $this->load->model('Pengeluaran_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman Dashboard";
        $data['user'] = $this->userrole->getBy();
        $data['userr'] = $this->userrole->get();
        $data['c_user'] = $this->userrole->count_user();
        $data['c_donatur'] = $this->userrole->count_donatur();
        $data['c_db'] = $this->Donasi_Barang_model->count_barang();
        $data['donasi_uang'] = $this->Donasi_Uang_model->get();
        $data['pengeluaran'] = $this->Pengeluaran_model->get();



        $this->load->view("layout/header", $data);
        $this->load->view("dashboard/vw_dashboard", $data);
        $this->load->view("layout/footer", $data);
    }

    public function count_user()
    {
        $this->load->model('User_model');
        return $this->User_model->get();
    }
}
