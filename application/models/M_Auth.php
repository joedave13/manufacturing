<?php    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Auth extends CI_Model {
        public function insertUserData($data)
        {
            $this->db->insert('user', $data);
        }

        public function checkUser($email)
        {
            return $this->db->get_where('user', ['email' => $email])->row_array();
        }
    }
    
    /* End of file M_Auth.php */
    
?>
