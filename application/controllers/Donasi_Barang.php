<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Donasi_Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('Donasi_Barang_model');
        $this->load->model('User_model', 'userrole');
    }

    public function index()
    {
        $data['judul'] = "Halaman Donasi Barang";
        $data['user'] = $this->userrole->getBy();
        $data['userr'] = $this->userrole->get();
        $data['c_user'] = $this->userrole->count_user();
        $data['donasi_barang'] = $this->Donasi_Barang_model->get();
        $data['donasi_barang_nama'] = $this->Donasi_Barang_model->join();
        $data['c_db'] = $this->Donasi_Barang_model->count_barang();
        $this->load->view("layout/header", $data);
        $this->load->view("donasi_barang/vw_donasi_barang", $data);
        $this->load->view("layout/footer", $data);
    }

    public function tambah()
    {
        $data['judul'] = "Halaman Tambah Donasi Barang";
        $data['donasi_barang'] = $this->Donasi_Barang_model->get();
        $data['donasi_barang_nama'] = $this->Donasi_Barang_model->join();
        $data['userr'] = $this->userrole->get();
        $data['user'] = $this->userrole->getBy();
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required', [
            'required' => 'Nama Barang Wajib di isi'
        ]);
        $this->form_validation->set_rules('id_user', 'ID Donasi', 'required', [
            'required' => 'Donatur Wajib di isi'
        ]);
        $this->form_validation->set_rules('tgl_donasi_barang', 'Tanggal Donasi Barang', 'required', [
            'required' => 'Tanggal Donasi Wajib di isi'
        ]);
        $this->form_validation->set_rules('nominal', 'Nominal', 'required', [
            'required' => 'Nominal Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("donasi_barang/vw_tambah_donasi_barang", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama_barang' => $this->input->post('nama_barang'),
                'id_user' => $this->input->post('id_user'),
                'tgl_donasi_barang' => $this->input->post('tgl_donasi_barang'),
                'nominal' => $this->input->post('nominal'),

            ];
            $upload_image = $_FILES['gambar_barang']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/barang/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar_barang')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_barang', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Donasi_Barang_model->insert($data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Donasi Barang Berhasil Ditambah!</div>');
            redirect('Donasi_Barang');
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
        $upload_image = $_FILES['gambar_barang']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/donasi_barang/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar_barang')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar_barang', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->donasi_barang_model->insert($data, $upload_image);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Donasi Barang Berhasil Ditambah!</div>');
        redirect('donasi_barang');
    }
    public function detail($id)
    {
        $data['user'] = $this->userrole->getBy();
        $data['judul'] = "Halaman Detail Donasi Barang";
        $data['donasi_barang'] = $this->Donasi_Barang_model->getById($id);
        $data['dbd'] = $this->Donasi_Barang_model->joinid($id);
        $data['userr'] = $this->userrole->getById($id);
        $this->load->view("layout/header", $data);
        $this->load->view("donasi_barang/vw_detail_donasi_barang", $data);
        $this->load->view("layout/footer", $data);
    }

    public function edit($id)
    {
        $data['user'] = $this->userrole->getBy();
        $data['judul'] = "Halaman Edit Donasi Barang";
        $data['donasi_barang'] = $this->Donasi_Barang_model->getById($id);
        $data['dbd'] = $this->Donasi_Barang_model->joinid($id);
        $data['userr'] = $this->userrole->get();
        $data['userid'] = $this->userrole->getById($id);
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required', [
            'required' => 'Nama Barang Wajib di isi'
        ]);
        $this->form_validation->set_rules('id_user', 'ID Donatur', 'required', [
            'required' => 'Donatur Wajib di isi'
        ]);
        $this->form_validation->set_rules('tgl_donasi_barang', 'Tanggal Donasi Barang', 'required', [
            'required' => 'Tanggal Donasi Wajib di isi'
        ]);
        $this->form_validation->set_rules('nominal', 'Nominal', 'required', [
            'required' => 'Nominal Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("donasi_barang/vw_ubah_donasi_barang", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama_barang' => $this->input->post('nama_barang'),
                'id_user' => $this->input->post('id_user'),
                'tgl_donasi_barang' => $this->input->post('tgl_donasi_barang'),
                'nominal' => $this->input->post('nominal'),

            ];
            $upload_image = $_FILES['gambar_barang']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/barang/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar_barang')) {
                    $old_image = $data['dbd']['gambar_barang'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/barang/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_barang', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id = $this->input->post('id');
            $this->Donasi_Barang_model->update(['id_user' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Donasi Barang Berhasil Ditambah!</div>');
            redirect('Donasi_Barang');
        }
    }

    public function hapus($id)
    {
        $this->Donasi_Barang_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Donasi Barang tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Donasi Barang Berhasil Dihapus!</div>');
        }
        redirect('Donasi_Barang');
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
        $this->Donasi_Barang_model->insert($data);
        redirect('Donasi_Barang');
    }
}
