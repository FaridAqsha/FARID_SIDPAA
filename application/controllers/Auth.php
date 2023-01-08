<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'userrole');
    }
    public function index()
    {
        $data['judul'] = "Halaman Login";
        if ($this->session->userdata('email')) {
            redirect('User');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'valid_email' => 'Email Harus Valid',
            'required' => 'Email Wajib di isi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/auth_header");
            $this->load->view("auth/login");
            $this->load->view("layout/auth_footer");
        } else {
            $this->cek_login();
        }
    }
    public function registrasi()
    {
        $this->load->model('User_model');
        $data['judul'] = "Halaman Tambah User";
        $data['user'] = $this->User_model->get();
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama User Wajib di isi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email Wajib di isi',
            'valid_email' => 'Email harus sesuai dengan format'
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
            $this->load->view("layout/auth_header", $data);
            $this->load->view("auth/registrasi", $data);
            $this->load->view("layout/auth_footer");
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
            redirect('Auth');
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
    public function cek_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'id' => $user['id'],
                ];
                $this->session->set_userdata($data);
                if ($user['role' == 'Admin']) {
                    redirect('dashboard');
                } else {
                    redirect('dashboard');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password Salah!!</div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email Belum Terdaftar!!</div>');
            redirect('Auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Berhasil Logout!!</div>');
        redirect('Auth');
    }


    function changepassword()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Change Password';
        $data['user'] = $this->userrole->getBy();
        $email = $this->input->get('email');
        $this->form_validation->set_rules('password1', 'New Password', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/auth_header', $data);
            $this->load->view('auth/change_password', $data);
            $this->load->view('layout/auth_footer', $data);
        } else {
            $password1 = $this->input->post('password1');
            $password2 = $this->input->post('password2');
            if (!$password1 == $password2) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Tidak Sama</div>');
                redirect('auth/changepassword');
            } else {
                $data = [
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                ];
            }
            $email = $this->input->post('email');
            $this->userrole->update(['email' => $email], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil Diubah!</div>');
            redirect('Auth');
        }
    }
}
