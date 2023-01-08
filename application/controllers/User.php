<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('User_model', 'userrole');
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman User";
        $data['user'] = $this->userrole->getBy();
        $data['userr'] = $this->userrole->get();
        $data['c_user'] = $this->User_model->count_user();
        $data['c_donatur'] = $this->User_model->count_donatur();
        $this->load->view("layout/header", $data);
        $this->load->view("user/vw_user", $data);
        $this->load->view("layout/footer", $data);
    }

    public function tambah()
    {
        $data['judul'] = "Halaman Tambah User";
        $data['user'] = $this->userrole->getBy();
        $data['c_user'] = $this->User_model->count_user();
        $data['c_donatur'] = $this->User_model->count_donatur();
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama User Wajib di isi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required', [
            'required' => 'Email Wajib di isi'
        ]);
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[5]|matches[password2]',
            [
                'matches' => 'Password Tidak Sama',
                'min_length' => 'Password Terlalu Pendek',
                'required' => 'Password harus diisi'
            ]
        );
        $this->form_validation->set_rules(
            'password2',
            'Password',
            'required|trim|min_length[5]|matches[password1]',
            [
                'matches' => 'Password Tidak Sama',
                'min_length' => 'Password Terlalu Pendek',
                'required' => 'Password harus diisi'
            ]
        );
        $this->form_validation->set_rules('role', 'Role', 'required', [
            'required' => 'Role Wajib di isi'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat Wajib di isi'
        ]);
        $this->form_validation->set_rules('nomor', 'Nomor HP', 'required', [
            'required' => 'Nomor HP Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("user/vw_tambah_user", $data);
            $this->load->view("layout/footer");
        } else {
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
                $config['upload_path'] = './assets/img/user/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->User_model->insert($data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data User Berhasil Ditambah!</div>');
            redirect('User');
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
            $config['upload_path'] = './assets/img/user/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->User_model->insert($data, $upload_image);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data User Berhasil Ditambah!</div>');
        redirect('User');
    }
    public function detail($id)
    {
        $data['judul'] = "Halaman Detail User";
        $data['user'] = $this->userrole->getBy();
        $data['user'] = $this->User_model->get();
        $data['c_user'] = $this->User_model->count_user();
        $data['c_donatur'] = $this->User_model->count_donatur();
        $data['user'] = $this->User_model->getById($id);
        $this->load->view("layout/header", $data);
        $this->load->view("user/vw_detail_user", $data);
        $this->load->view("layout/footer", $data);
    }

    public function edit($id)
    {
        $data['judul'] = "Halaman Ubah User";
        $data['user'] = $this->User_model->getById($id);

        $this->form_validation->set_rules('nama', 'Nama User', 'required', [
            'required' => 'Nama User Wajib di isi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required', [
            'required' => 'Email Wajib di isi'
        ]);
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[5]|matches[password2]',
            [
                'matches' => 'Password Tidak Sama',
                'min_length' => 'Password Terlalu Pendek',
                'required' => 'Password harus diisi'
            ]
        );
        $this->form_validation->set_rules(
            'password2',
            'Password',
            'required|trim|min_length[5]|matches[password1]',
            [
                'matches' => 'Password Tidak Sama',
                'min_length' => 'Password Terlalu Pendek',
                'required' => 'Password harus diisi'
            ]
        );
        $this->form_validation->set_rules('role', 'Role', 'required', [
            'required' => 'Role Wajib di isi'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat Wajib di isi'
        ]);
        $this->form_validation->set_rules('nomor', 'Nomor HP', 'required', [
            'required' => 'Nomor HP Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("user/vw_ubah_user", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'role' => $this->input->post('role'),
                'alamat' => $this->input->post('alamat'),
                'nomor' => $this->input->post('nomor'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/user/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['user']['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/user/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id = $this->input->post('id');
            $this->User_model->update(['id' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data User Berhasil DiUbah!</div>');
            redirect('User');
        }
    }

    public function hapus($id)
    {
        $this->User_model->delete($id);
        $data['user'] = $this->User_model->get();
        $data['c_user'] = $this->User_model->count_user();
        $data['c_donatur'] = $this->User_model->count_donatur();
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data User Uang tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data User Uang Berhasil Dihapus!</div>');
        }
        redirect('User');
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
        $this->User_model->insert($data);
        redirect('User');
    }
}
