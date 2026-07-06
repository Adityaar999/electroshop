<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->library('form_validation');
    }

    public function index() {
        if ($this->session->userdata('admin_logged_in')) {
            redirect('shop');
        }
        $this->load->view('auth/login');
    }

    public function login() {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
            return;
        }

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $admin    = $this->M_admin->get_by_username($username);

        if ($admin && password_verify($password, $admin->password)) {
            $this->session->set_userdata([
                'admin_logged_in' => TRUE,
                'admin_id'        => $admin->id,
                'admin_nama'      => $admin->nama,
                'admin_username'  => $admin->username,
            ]);
            $this->session->set_flashdata('success', 'Selamat datang, ' . $admin->nama . '!');
            redirect('shop');
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah!');
            redirect('auth');
        }
    }

    public function logout() {
        $this->session->unset_userdata(['admin_logged_in','admin_id','admin_nama','admin_username']);
        $this->session->set_flashdata('success', 'Berhasil logout.');
        redirect('auth');
    }
}
