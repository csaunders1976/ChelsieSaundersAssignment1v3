<?php

class List_model extends CI_Model
{


    public function get_all_lists($user_id){
        $this->db->where('user_id',$user_id);
        $query = $this->db->get('lists');
        return $query->result();
    }


    public function get_list_todos($list_id,$active = true){
        $this->db->select('
            todos.todo_name,
            todos.id as todo_id,
            lists.list_name
            ');
        $this->db->from('todos');
        $this->db->join('lists', 'lists.id = todos.list_id');
        $this->db->where('todos.list_id',$list_id);
        if($active == true){
            $this->db->where('todos.is_completed',0);
        } else {
            $this->db->where('todos.is_completed',1);
        }
        $query = $this->db->get();
        if($query->num_rows() < 1){
            return FALSE;
        }
        return $query->result();

    }

    public function get_list($id){

        $this->db->select('*');
        $this->db->from('lists');
        $this->db->where('id',$id);
        $query = $this->db->get();
        if($query->num_rows() != 1){
            return FALSE;
        }
        return $query->row();
    }
    public function create_list($data){
        $insert = $this->db->insert('lists', $data);
        return $insert;
    }
    public function get_list_data($list_id){
        $this->db->where('id',$list_id);
        $query = $this->db->get('lists');
        return $query->row();
    }

    public function delete_list($list_id){
        $this->db->where('id',$list_id);
        $this->db->delete('lists');
        $this->delete_tasks_of_list($list_id);
        return;
    }

    private function delete_tasks_of_list($list_id){
        $this->db->where('list_id',$list_id);
        $this->db->delete('todos');
        return;
    }

    
    // ------------------------------------------------------------------------
    
}