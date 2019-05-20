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
    }
    
    /* End of file M_Administrator.php */
    
?>
