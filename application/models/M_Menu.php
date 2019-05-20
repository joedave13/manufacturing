<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Menu extends CI_Model {
        public function getUserData()
        {
            return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        public function getMenu()
        {
            return $this->db->get('user_menu')->result_array();
        }

        public function insertMenuData($data)
        {
            $this->db->insert('user_menu', $data);    
        }

        public function insertSubMenuData($data)
        {
            $this->db->insert('user_sub_menu', $data);
        }

        public function getSubMenu()
        {
            $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
            FROM `user_sub_menu`
            JOIN `user_menu`
            ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
            ";
            return $this->db->query($query)->result_array();
        }
    }
    
    /* End of file M_Menu.php */
    
?>
