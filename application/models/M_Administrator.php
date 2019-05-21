<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Administrator extends CI_Model {
        public function getUserData()
        {
            return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        public function getRoleData()
        {
            return $this->db->get('user_role')->result_array();
        }

        public function getRoleAccess($role_id)
        {
            return $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        }

        public function getRoleMenu()
        {
            $this->db->where('id != ', 1);
            return $this->db->get('user_menu')->result_array();
        }

        public function getAllUser()
        {
            $this->db->select('*');
            $this->db->from('user');
            $this->db->join('user_role', 'user.role_id = user_role.id');
            return $this->db->get()->result_array();
        
        }
        public function addUser($data)
        {
            $this->db->insert('user', $data);
        }
    }
    
    /* End of file M_Administrator.php */
    
?>
