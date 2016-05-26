<?php


class User_model extends CI_Model
{
    protected $_table = 'users';
    protected $_primary_key = 'user_id';

    // ------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------------------------------------------------------------

    // ------------------------------------------------------------------------

    public function add_user(){
        $info = array
        (
            'login' => $this->input->post('login'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname')
        );

        $query = $this->db->insert('users', $info );

        return $query;
    }

    public function login_user($login,$password){
        $enc_password = md5($password);

        $this->db->where('login', $login);
        $this->db->where('password', $enc_password);

        $result = $this->db->get('users');
        if($result->num_rows() == 1){
            return $result->row(0)->user_id;
        } else {
            return false;
        }
    }


    // ------------------------------------------------------------------------
    public function get_facebook_user($email){
        $this->db->where('email',$email);

        $result = $this->db->get('users');

        if($result->num_rows() == 1){
            return $result->row(0);
        } else {
            return false;
        }

    }
    public function get_user($id){

        if (is_numeric($id)) {
            $this->db->where($this->_primary_key, $id);
        }

        if (is_array($id)) {
            foreach ($id as $_key => $_value) {
                $this->db->where($_key, $_value);
            }
        }

        $q = $this->db->get($this->_table);
        return $q->result_array();
    }

    // ------------------------------------------------------------------------
    // ****************  UPDATE USER *********************************************/

    public function get_user_info($id = null)
    {
        if ($this->session->userdata('is_logged_in') == false) {
            $this->load->view('errors/restricted');
            return false;
        } else {

            if ($id != null) {
                $result = $this->get([
                    'login' => $this->session->userdata('login')
                ]);
            } else {
                $result = $this->get([
                    'login' => $this->session->userdata('login')
                ]);
            }
        }
        return $result;
    }

    public function get($id = null, $order_by = null)
    {
        if (is_numeric($id)) {
            $this->db->where($this->_primary_key, $id);
        }

        if (is_array($id)) {
            foreach ($id as $_key => $_value) {
                $this->db->where($_key, $_value);
            }
        }

        $q = $this->db->get($this->_table);
        return $q->result_array();
    }

    public function insert($data)
    {
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }

    // ------------------------------------------------------------------------

    public function update($new_data, $where)
    {
        if (is_numeric($where)) {
            $this->db->where($this->_primary_key, $where);
        }
        elseif (is_array($where)) {
            foreach ($where as $_key => $_value) {
                $this->db->where($_key, $_value);
            }
        }
        else {
            die("You must pass a second parameter to the UPDATE() method.");
        }

        $this->db->update($this->_table, $new_data);
        return $this->db->affected_rows();
    }

    // ------------------------------------------------------------------------

    public function insertUpdate($data, $id = false)
    {
        if (!$id) {
            die("You must pass a second parameter to the insertUPDATE() method.");
        }

        $this->db->select($this->_primary_key);
        $this->db->where($this->_primary_key, $id);
        $q = $this->db->get($this->_table);
        $result = $q->num_rows();

        if ($result == 0) {
            return $this->insert($data);
        }

        return $this->update($data, $id);
    }

    // ------------------------------------------------------------------------
    public function delete($id)
    {
        if (is_numeric($id)) {
            $this->db->where($this->_primary_key, $id);
        }
        elseif (is_array($id)) {
            foreach ($id as $_key => $_value) {
                $this->db->where($_key, $_value);
            }
        }
        else {
            die("You must pass a parameter to the DELETE() method.");
        }

        $this->db->delete($this->_table);
        return $this->db->affected_rows();
    }

    // ------------------------------------------------------------------------

}
