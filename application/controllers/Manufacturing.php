<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manufacturing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('M_Manufacturing');
    }


    public function index()
    {
        $data['title'] = 'Products';
        $data['user'] = $this->M_Manufacturing->getUserData();
        $data['products'] = $this->M_Manufacturing->getAllProducts();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('manufacturing/products', $data);
        $this->load->view('templates/footer');
    }

    public function addProduct()
    {
        $this->form_validation->set_rules('name', 'Product Name', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');
        $this->form_validation->set_rules('qty', 'Quantity', 'trim|required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Add Products';
            $data['user'] = $this->M_Manufacturing->getUserData();
            $data['category'] = $this->M_Manufacturing->getProductCategory();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('manufacturing/addProducts', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'price' => $this->input->post('price'),
                'tax' => 15 / 100,
                'qty' => $this->input->post('qty'),
                'image' => 'default_product.jpg',
                'type' => $this->input->post('type'),
                'kind_of' => $this->input->post('kind_of'),
                'category_id' => $this->input->post('category'),
                'date_created' => time()
            ];
            $this->M_Manufacturing->insertProductData($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Product Added.</div>');
            redirect('manufacturing');
        }
    }

    public function editProduct($id)
    {
        $this->form_validation->set_rules('name', 'Product Name', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');
        $this->form_validation->set_rules('qty', 'Quantity', 'trim|required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Products';
            $data['user'] = $this->M_Manufacturing->getUserData();
            $data['category'] = $this->M_Manufacturing->getProductCategory();
            $data['selectedProduct'] = $this->M_Manufacturing->getProductById($id);
            $data['type'] = ['Storable Product', 'Consumable', 'Service'];
            $data['kind_of'] = ['Component', 'Complete Product'];
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('manufacturing/editProducts', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'price' => $this->input->post('price'),
                'qty' => $this->input->post('qty'),
                'type' => $this->input->post('type'),
                'kind_of' => $this->input->post('kind_of'),
                'category_id' => $this->input->post('category'),
            ];
            $id_produk = $this->input->post('id');

            //Cek ada gambar
            $product_image = $_FILES['image']['name'];

            if ($product_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 2048;
                $config['upload_path'] = './assets/img/product/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                }
                else {
                    echo $this->upload->display_errors();
                }
            }
            
            $this->db->where('id_produk', $id_produk);
            $this->db->update('produk', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                Product Updated.</div>');
            redirect('manufacturing');
        }
    }

    public function deleteProduct($id)
    {
        $this->M_Manufacturing->deleteProduct($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Product Deleted.</div>');
        redirect('manufacturing');
    }

    public function detailProduct($id)
    {
        $data['title'] = 'Detail Products';
        $data['user'] = $this->M_Manufacturing->getUserData();
        $data['category'] = $this->M_Manufacturing->getProductCategory();
        $data['product'] = $this->M_Manufacturing->getProductDetail($id);
        $data['type'] = ['Storable Product', 'Consumable', 'Service'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('manufacturing/detailProducts', $data);
        $this->load->view('templates/footer');
    }
}
    
    /* End of file Manufacturing.php */
