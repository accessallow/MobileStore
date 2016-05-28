<?php

//core/micontroller
class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('mobile_model');

        //Authentication check
//        if (1||$this->session->userdata('login')) {
//            
//            //Activation releted common code
//            $this->load->model('activation_model');
//            $this->activation_model->degrade();
//            $activated = $this->activation_model->is_product_activated();
//            if ($activated == false) {
//                redirect('Activation/register');
//            }
//            
//            
//            
//        } else {
//                redirect('Front/login');
//        }
    }

    function set_success_flash($message) {
        $this->session->set_flashdata('alert_class', 'alert-success');
        $this->session->set_flashdata('message', $message);
        $this->session->set_flashdata('glyphicon_class', 'glyphicon-ok-circle');
    }

    function set_error_flash($message) {
        $this->session->set_flashdata('alert_class', 'alert-danger');
        $this->session->set_flashdata('message', $message);
        $this->session->set_flashdata('glyphicon_class', 'glyphicon-remove-circle');
    }

    function set_info_flash($message) {
        $this->session->set_flashdata('alert_class', 'alert-info');
        $this->session->set_flashdata('message', $message);
        $this->session->set_flashdata('glyphicon_class', 'glyphicon-info-sign');
    }
    
    public function load_view($view, $data) {
        $this->load->view('template/sb-admin/header');
        $this->load->view('template/sb-admin/nav');
        $this->load->view($view, $data);
        $this->load->view('template/sb-admin/wrappers_footer');
        $this->load->view('template/sb-admin/footer');
    }

    public function load_view_without_nav($view, $data) {
        $this->load->view('template/sb-admin/header');
        $this->load->view('template/sb-admin/wrappers_header');
        $this->load->view($view, $data);
        $this->load->view('template/sb-admin/wrappers_footer_without_nav');
        $this->load->view('template/sb-admin/footer');
    }

    

    public function load_store_front_view($view, $data) {
        $cart_items = $this->mobile_model->get_cart_count();
        $data['cart_items'] = $cart_items;
        $this->load->view('template/sb-admin/header');
        $this->load->view('template/sb-admin/wrappers_header');
        $this->load->view('mobile/storefront_header', $data);
        $this->load->view($view, $data);
        $this->load->view('template/sb-admin/wrappers_footer_without_nav');
        $this->load->view('template/sb-admin/footer');
    }
}
