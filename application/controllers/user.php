<?php

class User extends CI_Controller {
    
    protected $data = array();
    
    // ------------------------------------------------------------------------
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    // ------------------------------------------------------------------------
    //Update User//
    // ------------------------------------------------------------------------
    public function user()
    {
        if ($this->session->userdata('is_logged_in') == false) {
            $this->load->view('errors/restricted');
            return false;
        } else {
            $this->load->view('dashboard/inc/header_view');

            $data['user']=$this->user_model->get_user_info();

            $this->load->view('dashboard/user_view',$data);
            $this->load->view('dashboard/inc/footer_view');
        }
    }

    public function update_firstname(){
        $this->form_validation->set_rules('firstname', 'First Name', 'required|min_length[2]|max_length[35]');

        if ($this->form_validation->run()){

            $fname = $this->input->post('firstname');
            $user_id = $this->session->userdata('user_id');

            $this->user_model->update(['firstname'=>$fname], $user_id);
            $this->session->set_flashdata('update_success', 'Your information has been updated.');
            redirect('user/user');

        }else{

            redirect('user/user');
        }
    }

    public function update_lastname(){
        $this->form_validation->set_rules('lastname', 'Last Name', 'required|min_length[2]|max_length[35]');
        if ($this->form_validation->run()){

            $lname = $this->input->post('lastname');
            $user_id = $this->session->userdata('user_id');

            $this->user_model->update(['lastname'=>$lname], $user_id);
            $this->session->set_flashdata('update_success', 'Your information has been updated.');
            redirect('user/user');

        }else{

            redirect('user/user');
        }
    }

    public function update_email(){
        $this->form_validation->set_rules('email', 'Email','required|valid_email' );

        if ($this->form_validation->run()){

            $email = $this->input->post('email');
            $user_id = $this->session->userdata('user_id');

            $this->user_model->update(['email'=>$email], $user_id);
            $this->session->set_flashdata('update_success', 'Your information has been updated.');
            redirect('user/user');

        }else{

            redirect('user/user');
        }
    }

    public function update_login(){
        $this->form_validation->set_rules('login','Login', 'required|min_length[4]|max_length[35]|is_unique[users.login]');


        if ($this->form_validation->run()){
            $login = $this->input->post('login');
            $user_id = $this->session->userdata('user_id');

            $this->user_model->update(['login'=>$login], $user_id);
            $this->session->set_flashdata('update_success', 'Your information has been updated.');

            $this->session->set_userdata('login', $login);
            redirect('user/user');

        }else{

            redirect('user/user');
        }
    }

    public function update_password(){
        $this->form_validation->set_rules('password','Password','required|min_length[4]|max_length[35]');
        $this->form_validation->set_rules('confirm_password','Confirm_password','required|matches[password]');

        if ($this->form_validation->run()){
            $password = $this->input->post('password');
            $passwordhash = md5($password);
            $user_id = $this->session->userdata('user_id');

            $this->user_model->update(['password'=>$passwordhash], $user_id);
            $this->session->set_flashdata('update_success', 'Your information has been updated.');

            redirect('user/user');

        }else{

            redirect('user/user');
        }
    }
    //-------------------------------------------------------------------------
    //Register
    // ------------------------------------------------------------------------

    public function register()
    {
        // Form Validation
        $this->form_validation->set_rules('login','Login', 'required|min_length[4]|max_length[35]|is_unique[users.login]');
        $this->form_validation->set_rules('email', 'Email','required|valid_email|is_unique' );
        $this->form_validation->set_rules('password','Password','required|min_length[4]|max_length[35]');
        $this->form_validation->set_rules('confirm_password','Confirm_password','required|matches[password]');
        $this->form_validation->set_rules('firstname', 'First Name', 'required|min_length[2]|max_length[35]');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required|min_length[2]|max_length[35]');

        if ($this->form_validation->run()){
            $this->user_model->add_user();

            $this->session->set_flashdata('registered', 'You are now registered. Please Login');
            redirect('home');

        } else {

            $this->load->view('login/inc/header_view');
            $this->load->view('login/login_view');
            $this->load->view('login/inc/footer_view');
        }
    }

    //-------------------------------------------------------------------------
    //Error
    // ------------------------------------------------------------------------
    public function restricted(){

        $this->load->view('errors/restricted');
    }
    // ------------------------------------------------------------------------
}