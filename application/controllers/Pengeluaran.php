<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Pengeluaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('Pengeluaran_model');
        $this->load->model('User_model', 'userrole');
    }

    public function index()
    {
        $data['judul'] = "Halaman Pengeluaran";
        $data['user'] = $this->userrole->getBy();
        $data['userr'] = $this->userrole->get();
        $data['c_user'] = $this->userrole->count_user();
        $data['pengeluaran'] = $this->Pengeluaran_model->get();
        $data['c_pengeluaran'] = $this->Pengeluaran_model->count_p();
        $this->load->view("layout/header", $data);
        $this->load->view("pengeluaran/vw_pengeluaran", $data);
        $this->load->view("layout/footer", $data);
    }

    public function tambah()
    {
        $data['user'] = $this->userrole->getBy();
        $data['userr'] = $this->userrole->get();
        $data['judul'] = "Halaman Tambah Data Pengeluaran";
        $data['pengeluaran'] = $this->Pengeluaran_model->get();
        $this->form_validation->set_rules('nama_pengeluaran', 'Nama Pengeluaran', 'required', [
            'required' => 'Nama Pengeluaran Wajib di isi'
        ]);
        $this->form_validation->set_rules('tgl_pengeluaran', 'Tanggal Pengeluaran', 'required', [
            'required' => 'Tanggal Pengeluaran Wajib di isi'
        ]);
        $this->form_validation->set_rules('nominal', 'Nominal', 'required', [
            'required' => 'Nominal Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("pengeluaran/vw_tambah_pengeluaran", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama_pengeluaran' => $this->input->post('nama_pengeluaran'),
                'tgl_pengeluaran' => $this->input->post('tgl_pengeluaran'),
                'nominal' => $this->input->post('nominal'),

            ];
            $this->Pengeluaran_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pengeluaran Berhasil Ditambah!</div>');
            redirect('Pengeluaran');
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
        $data['userr'] = $this->userrole->get();
        $data['judul'] = "Halaman Detail Data Pengeluaran";
        $data['pengeluaran'] = $this->Pengeluaran_model->getById($id);
        $this->load->view("layout/header", $data);
        $this->load->view("pengeluaran/vw_detail_pengeluaran", $data);
        $this->load->view("layout/footer", $data);
    }

    public function edit($id)
    {
        $data['user'] = $this->userrole->getBy();
        $data['userr'] = $this->userrole->get();
        $data['judul'] = "Halaman Edit Data Pengeluaran";
        $data['pengeluaran'] = $this->Pengeluaran_model->getById($id);
        $this->form_validation->set_rules('nama_pengeluaran', 'Nama Pengeluaran', 'required', [
            'required' => 'Nama Pengeluaran Wajib di isi'
        ]);
        $this->form_validation->set_rules('tgl_pengeluaran', 'Tanggal Pengeluaran', 'required', [
            'required' => 'Tanggal Pengeluaran Wajib di isi'
        ]);
        $this->form_validation->set_rules('nominal', 'Nominal', 'required', [
            'required' => 'Nominal Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("pengeluaran/vw_ubah_pengeluaran", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama_pengeluaran' => $this->input->post('nama_pengeluaran'),
                'tgl_pengeluaran' => $this->input->post('tgl_pengeluaran'),
                'nominal' => $this->input->post('nominal'),

            ];
            $id = $this->input->post('id');
            $this->Pengeluaran_model->update(['id' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pengeluaran Berhasil Ditambah!</div>');
            redirect('Pengeluaran');
        }
    }

    public function hapus($id)
    {
        $data['user'] = $this->userrole->getBy();
        $data['userr'] = $this->userrole->get();
        $this->Pengeluaran_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Pengeluaran tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pengeluaran Berhasil Dihapus!</div>');
        }
        redirect('Pengeluaran');
    }
}
