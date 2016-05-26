<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('list_model');
    }

    public function index(){
        //Get the logged in users id
        $user_id = $this->session->userdata('user_id');

        if ($this->session->userdata('user_id') == false) {
            redirect('dashboard/restricted');
        }

        //Get all lists from the model
        $data['lists'] = $this->list_model->get_all_lists($user_id);
        //print_r($this->list_model->get_all_lists($user_id));
        //Load views

        $this->load->view('dashboard/inc/header_view');
        $this->load->view('dashboard/dashboard_view',$data);
        $this->load->view('dashboard/inc/footer_view');
    }

    public function logout(){
        $this->facebook->destroy_session();
        //go home
        redirect('home');
        //end session
        $this->session->sess_destroy();

    }

    public function show($id){
        $user_id = $this->session->userdata('user_id');
        $data['list'] = $this->list_model->get_list($id);
        $data['lists'] = $this->list_model->get_all_lists($user_id);
        $data['completed_todos'] = $this->list_model->get_list_todos($id, true);
        $data['uncompleted_todos'] = $this->list_model->get_list_todos($id,false);
        $this->load->view('dashboard/inc/header_view');
        $this->load->view('dashboard/show_view', $data);
        $this->load->view('dashboard/inc/footer_view');

    }

    public function add(){
        $this->form_validation->set_rules('list_name','List Name','trim|required');

        if($this->form_validation->run() == FALSE){
            $this->load->view('dashboard/inc/header_view');
            $this->load->view('dashboard/list_view');
            $this->load->view('dashboard/inc/footer_view');

        } else {

            $data = array(
                'list_name'    => $this->input->post('list_name'),
                'user_id' => $this->session->userdata('user_id')
            );
            if($this->list_model->create_list($data)){
                $this->session->set_flashdata('list_created', 'Your task list has been created');
                //Redirect to index page with error above
                redirect('dashboard');
            }
        }
    }
    public function delete($list_id){
        //Delete list
        $this->list_model->delete_list($list_id);
        //Create Message
        $this->session->set_flashdata('list_deleted', 'Your list has been deleted');
        //Redirect to list index
        redirect('dashboard');
    }

    public function restricted(){
        $this->load->view('errors/restricted');
    }

}

