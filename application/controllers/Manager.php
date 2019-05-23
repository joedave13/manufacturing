<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Manager extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            //Do your magic here
            $this->load->model('M_Manager');
            check_login();
        }
        
    
        public function index()
        {
            $data['title'] = 'My Profile';
            $data['user'] = $this->M_Manager->getUserData();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('manager/index', $data);
            $this->load->view('templates/footer');
        }

        public function editProfile()
        {   
            $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
            
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Edit Profile';
                $data['user'] = $this->M_Manager->getUserData();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('manager/editProfile', $data);
                $this->load->view('templates/footer');
            } else {
                $email = $this->input->post('email');
                $name = $this->input->post('name');

                //Jika ada gambar
                $upload_image = $_FILES['image'];
                if ($upload_image) {
                    $config['allowed_types'] = 'gif|png|jpg';
                    $config['max_size'] = 2048;
                    $config['upload_path'] = './assets/img/profile/';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $old_image = $data['user']['image'];
                        if ($old_image != 'default.jpg') {
                            unlink('./assets/img/profile/' . $old_image);
                        }
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('image', $new_image);
                    }
                    else {
                        echo $this->upload->display_errors();
                    }
                }

                $this->db->set('name', $name);
                $this->db->where('email', $email);
                $this->db->update('user');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Profile Updated.</div>');
                redirect('manager');
            }
        }
    }
    
    /* End of file Manager.php */
    
?>
