<?php
class Todo_model extends CI_Model{

    public function get_todo($id){
        $this->db->select('
            todos.todo_name,
            todos.id,
            todos.create_date,
            todos.is_completed,
            lists.id as list_id,
            lists.list_name
            ');
        $this->db->from('todos');
        $this->db->join('lists', 'lists.id = todos.list_id','LEFT');
        $this->db->where('todos.id',$id);
        $query = $this->db->get();
        if($query->num_rows() != 1){
            return FALSE;
        }
        return $query->row();
    }

    public function get_todo_list_id($task_id){
        $this->db->where('id',$task_id);
        $query = $this->db->get('todos');
        return $query->row()->list_id;
    }

    public function get_list_name($list_id){
        $this->db->where('id',$list_id);
        $query = $this->db->get('lists');
        return $query->row()->list_name;
    }


    public function create_todo($data){
        $insert = $this->db->insert('todos', $data);
        return $insert;
    }

    public function edit_todo($todo_id,$data){
        $this->db->where('id', $todo_id);
        $this->db->update('todos', $data);
        return TRUE;
    }


    public function delete_todo($todo_id){
        $this->db->where('id',$todo_id);
        $this->db->delete('todos');
        return;
    }


    public function get_todo_data($todo_id){
        $this->db->where('id',$todo_id);
        $query = $this->db->get('todos');
        return $query->row();
    }


    public function check_if_complete($id){
        $this->db->where('id',$id);
        $query = $this->db->get('todos');
        return $query->row()->is_completed;
    }

    public function mark_complete($task_id){
        $this->db->set('is_completed', 1);
        $this->db->where('id', $task_id);
        $this->db->update('todos');
        return TRUE;
    }

    public function mark_new($todo_id){
        $this->db->set('is_completed', 0);
        $this->db->where('id', $todo_id);
        $this->db->update('todos');
        return TRUE;
    }


    public function get_users_todos($user_id){
        $this->db->where('list_user_id',$user_id);
        $this->db->join('todos', 'lists.id = todos.list_id');
        $this->db->order_by('todos.create_date', 'asc');
        $query = $this->db->get('lists');
        return $query->result();
    }
}