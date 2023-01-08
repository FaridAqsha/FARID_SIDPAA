<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

class Donasi_Uang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('Donasi_Uang_model');
        $this->load->model('User_model', 'userrole');
    }

    public function index()
    {
        $data['judul'] = "Halaman Donasi Uang";
        $data['user'] = $this->userrole->getBy();
        $data['userr'] = $this->userrole->get();
        $data['c_user'] = $this->userrole->count_user();
        $data['donasi_uang'] = $this->Donasi_Uang_model->get();
        $data['donasi_uang_nama'] = $this->Donasi_Uang_model->join();
        $data['c_total'] = $this->Donasi_Uang_model->count_du();
        $this->load->view("layout/header", $data);
        $this->load->view("donasi_uang/vw_donasi_uang", $data);
        $this->load->view("layout/footer", $data);
    }

    public function tambah()
    {
        $data['judul'] = "Halaman Tambah Donasi Uang";
        $data['user'] = $this->userrole->getBy();
        $data['userr'] = $this->userrole->get();
        $data['donasi_uang'] = $this->Donasi_Uang_model->get();
        $data['donasi_uang_nama'] = $this->Donasi_Uang_model->join();
        $this->form_validation->set_rules('nama_donasi', 'Nama Donasi', 'required', [
            'required' => 'Nama Donasi Uang Wajib di isi'
        ]);
        $this->form_validation->set_rules('id_user', 'ID Donasi', 'required', [
            'required' => 'Donatur Wajib di isi'
        ]);
        $this->form_validation->set_rules('tgl_donasi_uang', 'Tanggal Donasi Uang', 'required', [
            'required' => 'Tanggal Donasi Wajib di isi'
        ]);
        $this->form_validation->set_rules('nominal', 'Nominal', 'required', [
            'required' => 'Nominal Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("donasi_uang/vw_tambah_donasi_uang", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama_donasi' => $this->input->post('nama_donasi'),
                'id_user' => $this->input->post('id_user'),
                'tgl_donasi_uang' => $this->input->post('tgl_donasi_uang'),
                'nominal' => $this->input->post('nominal'),

            ];
            $this->Donasi_Uang_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Donasi Uang Berhasil Ditambah!</div>');
            redirect('Donasi_Uang');
        }
    }

    public function uploadd()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),

            'role' => $this->input->post('role'),
            'alamat' => $this->input->post('alamat'),
            'nomor' => $this->input->post('nomor'),

        ];
        $upload_image = $_FILES['gambar']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/donasi_uang/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->donasi_uang_model->insert($data, $upload_image);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data donasi_uang Berhasil Ditambah!</div>');
        redirect('donasi_uang');
    }
    public function detail($id)
    {
        $data['user'] = $this->userrole->getBy();
        $data['judul'] = "Halaman Detail Donasi Uang";
        $data['donasi_uang'] = $this->Donasi_Uang_model->getById($id);
        $data['dua'] = $this->Donasi_Uang_model->joinid($id);
        $data['userr'] = $this->userrole->getById($id);
        $this->load->view("layout/header", $data);
        $this->load->view("donasi_uang/vw_detail_donasi_uang", $data);
        $this->load->view("layout/footer", $data);
    }

    public function edit($id)
    {
        $data['user'] = $this->userrole->getBy();
        $data['judul'] = "Halaman Edit Donasi Uang";
        $data['donasi_uang'] = $this->Donasi_Uang_model->getById($id);
        $data['dua'] = $this->Donasi_Uang_model->joinid($id);
        $data['userr'] = $this->userrole->get();
        $data['userid'] = $this->userrole->getById($id);
        $this->form_validation->set_rules('nama_donasi', 'Nama Donasi', 'required', [
            'required' => 'Nama Donasi Uang Wajib di isi'
        ]);
        $this->form_validation->set_rules('id_user', 'ID Donasi', 'required', [
            'required' => 'Donatur Wajib di isi'
        ]);
        $this->form_validation->set_rules('tgl_donasi_uang', 'Tanggal Donasi Uang', 'required', [
            'required' => 'Tanggal Donasi Wajib di isi'
        ]);
        $this->form_validation->set_rules('nominal', 'Nominal', 'required', [
            'required' => 'Nominal Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("donasi_uang/vw_ubah_donasi_uang", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama_donasi' => $this->input->post('nama_donasi'),
                'id_user' => $this->input->post('id_user'),
                'tgl_donasi_uang' => $this->input->post('tgl_donasi_uang'),
                'nominal' => $this->input->post('nominal'),

            ];
            $id = $this->input->post('id');
            $this->Donasi_Uang_model->update(['id_user' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Donasi Uang Berhasil Ditambah!</div>');
            redirect('Donasi_Uang');
        }
    }

    public function hapus($id)
    {
        $this->Donasi_Uang_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Donasi Uang tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Donasi Uang Berhasil Dihapus!</div>');
        }
        redirect('Donasi_Uang');
    }

    function upload()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'asal_sekolah' => $this->input->post('asal_sekolah'),
            'alamat' => $this->input->post('alamat'),
            'nomor' => $this->input->post('nomor'),
        ];
        $this->Donasi_Uang_model->insert($data);
        redirect('Donasi_Uang');
    }

    public function export()
    {
        $dompdf = new DOMPDF();
        $this->data['all_jual'] = $this->Penjualan_model->get();
        $this->data['title'] = 'Laporan Data Penjualan';
        $this->data['no'] = 1;
        $dompdf->setPaper('A4', 'Landscape');
        $html = $this->load->view('penjualan/report', $this->data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Data Penjualan Tanggal ' . date('d F Y'), array("Attachment" => false));
    }
}
