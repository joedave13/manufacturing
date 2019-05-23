<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Manufacturing extends CI_Model {
        public function getUserData()
        {
            return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }

        public function getAllProducts()
        {
            return $this->db->get('produk')->result_array();
        }
        
        public function getProductCategory()
        {
            return $this->db->get('category')->result_array();
        }

        public function insertProductData($data)
        {
            $this->db->insert('produk', $data);
        }

        public function getProductById($id)
        {
            return $this->db->get_where('produk', ['id_produk' => $id])->row_array();       
        }

        public function updateProductData($data, $id)
        {
            $this->db->where('id_produk', $id);
            $this->db->update('produk', $data);
        }

        public function deleteProduct($id)
        {
            $this->db->where('id_produk', $id);
            $this->db->delete('produk');
        }

        public function getProductDetail($id)
        {
            $this->db->select('*');
            $this->db->from('produk');
            $this->db->join('category', 'produk.category_id = category.id');
            $this->db->where('id_produk', $id);
            return $this->db->get()->row_array();
        }
    }
    
    /* End of file M_Manufacturing.php */
    
?>
