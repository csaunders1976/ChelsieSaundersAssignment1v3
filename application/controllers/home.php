<?php

class Home extends CI_Controller
{

    // ------------------------------------------------------------------------
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('url');
        $this->load->library('facebook');
//
    }

    // ------------------------------------------------------------------------
    public function index()
    {
        $this->login();
    }

    // ------------------------------------------------------------------------
    public function login()
    {

        $data['user'] = array();
        // Check if user is logged in
        if ($this->facebook->is_authenticated())
        {
            // User logged in, get user details
            $user = $this->facebook->request('get', '/me?fields=id,name,email,first_name,last_name');


            if($user == null){
                $this->session->set_flashdata('login_failed', 'Sorry, the login info that you entered in invalid');
                redirect('home');
            }else{
            $email = $user['email'];
            $user_id = $this->user_model->get_facebook_user($email);
            }

            if($user_id == null){
                $this->session->set_flashdata('login_failed', 'Sorry, the login info that you entered in invalid');
                redirect('home');
            }else{
                $array = json_decode(json_encode($user_id), True);
                $this->session->set_userdata($array);
                redirect('dashboard');

            }



            if (!isset($user['error']))
            {
                $data['user'] = $user;
            }
        }


        $this->load->view('login/inc/header_view');
        $this->load->view('login/login_view');
        $this->load->view('login/inc/footer_view');



    }

    // ------------------------------------------------------------------------
    public function login_validation() {

        $this->form_validation->set_rules('login', 'Login', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run()) {

            $login = $this->input->post('login');
            $password = $this->input->post('password');

            $user_id = $this->user_model->login_user($login, $password);

            if ($user_id) {

                $user_data = array(
                    'user_id' => $user_id,
                    'login' => $login,
                    'is_logged_in' => true
                );

                $this->session->set_userdata($user_data);
                redirect('dashboard');
            }

        }else{
            $this->session->set_flashdata('login_failed', 'Sorry, the login info that you entered in invalid');
            redirect('home');
        }

    }
}