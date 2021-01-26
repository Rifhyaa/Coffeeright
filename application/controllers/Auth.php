<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            // Set title page
            $data['title'] = 'Coffeeright User Registration';
            $this->load->view('layout/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('layout/auth_footer');
        } else {
            // Validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('mspengguna', ['email' => $email])->row_array();

        if ($user) {
            // check user active or not
            if ($user['status'] == 1) {
                // check password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'pengguna' => $user['nama_pengguna'],
                        'id_role' => $user['id_role']
                    ];
                    $this->session->set_userdata($data);
                    redirect('user');
                } else {
                    $this->setAlert('Wrong password!', 'danger');
                    redirect('auth');
                }
            } else if ($user['status'] == 2) {
                $this->setAlert('User is not activated!', 'danger');
                redirect('auth');
            } else {
                $this->setAlert('User has been deleted!', 'danger');
                redirect('auth');
            }
        } else {
            $this->setAlert('User is not registered!', 'danger');
            redirect('auth');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[mspengguna.email]', [
            'is_unique' => 'This email has already registered'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');


        if ($this->form_validation->run() == false) {
            // Set title page
            $data['title'] = 'Coffeeright User Registration';
            $this->load->view('layout/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('layout/auth_footer');
        } else {
            $data = [
                'nama_pengguna' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'foto' => 'default.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'id_role' => 2,
                'status' => 1,
                'creadate' => date('Y-m-d H:i:s'),
                'creaby' => 'member'
            ];

            // Insert data to table mspengguna
            $this->db->insert('mspengguna', $data);
            $this->setAlert('Congratulation! your account has been created. Please Login', 'success');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_role');

        $this->setAlert('You have been logged out!', 'success');
        redirect('auth');
    }

    private function setAlert($message, $type)
    {
        $this->session->set_flashdata('message', "<div class='alert alert-$type role='alert'>
            <small>$message</small>
        </div>");
    }
}
