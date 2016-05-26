<?php
class Todos extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id') == false) {
            redirect('home/restricted');
        }
        $this->load->model('todo_model');
    }
    public function show($id){
        $data['todo'] = $this->todo_model->get_todo($id);
        $data['is_completed'] = $this->todo_model->check_if_complete($id);
        $this->load->view('dashboard/inc/header_view');
        $this->load->view('dashboard/todos/show',$data);
        $this->load->view('dashboard/inc/footer_view');

    }
    public function add($list_id = null){
        $this->form_validation->set_rules('todo_name','Todo Name','required');
        if($this->form_validation->run() == FALSE){
            //Get list name for view
            $data['list_name'] = $this->todo_model->get_list_name($list_id);
            //Load view and layout
            $this->load->view('dashboard/inc/header_view');
            $this->load->view('dashboard/todos/add_view',$data);
            $this->load->view('dashboard/inc/footer_view');

        } else {
            //Post values to array
            $data = array(
                'todo_name'    => $this->input->post('todo_name'),
                'list_id'      => $list_id
            );

            if($this->todo_model->create_todo($data)){
                $this->session->set_flashdata('todo_created', 'Your todo has been created');
                //Redirect to index page with error above
                redirect('dashboard');
            }
        }
    }
    public function edit($todo_id){
        $this->form_validation->set_rules('todo_name','Todo Name','required');
        if($this->form_validation->run() == FALSE){
            $data['list_id'] = $this->todo_model->get_todo_list_id($todo_id);
            $data['list_name'] = $this->todo_model->get_list_name($data['list_id']);
            $data['this_todo'] = $this->todo_model->get_todo_data($todo_id);
            //Load view and
            $this->load->view('dashboard/inc/header_view');
            $this->load->view('dashboard/todos/edit_todo_view',$data);
            $this->load->view('dashboard/inc/footer_view');
        } else {
            $list_id = $this->todo_model->get_todo_list_id($todo_id);
            $data = array(
                'todo_name'    => $this->input->post('todo_name'),
                'list_id'      => $list_id
            );
            if($this->todo_model->edit_todo($todo_id,$data)){
                $this->session->set_flashdata('todo_updated', 'Your todo has been updated');
                redirect('dashboard/show/'.$list_id.'');
            }
        }
    }
    public function mark_complete($todo_id){
        if($this->todo_model->mark_complete($todo_id)){
            $list_id = $this->todo_model->get_todo_list_id($todo_id);
            $this->session->set_flashdata('marked_complete', 'Todo has been marked complete');
            redirect('dashboard/show/'.$list_id.'');
        }
    }


    public function mark_new($todo_id){
        if($this->todo_model->mark_new($todo_id)){
            $list_id = $this->todo_model->get_task_list_id($todo_id);
            $this->session->set_flashdata('marked_new', 'Todo has been marked new');
            redirect('/dashboard/show/'.$list_id.'');
        }
    }


    public function delete($list_id,$todo_id){
        //Delete list
        $this->todo_model->delete_todo($todo_id);
        //Create Message
        $this->session->set_flashdata('todo_deleted', 'Your todo has been deleted');
        //Redirect to list index
        redirect('dashboard/show/'.$list_id.'');
    }

}