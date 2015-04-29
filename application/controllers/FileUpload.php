<?php

class FileUpload extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('upload_model');
    }

    public function load_view($view, $data) {
        $this->load->view('template/sb-admin/header');
        $this->load->view('template/sb-admin/nav');
        $this->load->view($view, $data);
        $this->load->view('template/sb-admin/wrappers_footer');
        $this->load->view('template/sb-admin/footer');
    }

    // Test Function
    public function index($error = null) {
        $data['files'] = scandir('./assets/uploads', 1);
        $data['error'] = $error['error'];
        $this->load->view('file_upload/file_view', $data);
    }

    //Test Function
    public function upload() {
        $user = 'pankajtiwari';
        $time = time();
        $file_name = $user . '_' . $time;

        $config = array(
            'upload_path' => "./assets/uploads/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'file_name' => $file_name
        );
        $this->load->library('upload', $config);
        if ($this->upload->do_upload()) {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('file_upload/upload_success', $data);
        } else {
            $error = array('error' => $this->upload->display_errors());
            //$this->load->view('file_upload/file_view', $error);

            $this->index($error);
        }
    }

    //Wont be used here, about to be deleted
    public function add_new() {
        //only adding form
        if ($this->input->get('attachment_id') && $this->input->get('attachment_type')) {
            $data['attachment_id'] = $this->input->get('attachment_id');
            $data['attachment_type'] = $this->input->get('attachment_type');
            $data['back_url'] = site_url($this->get_controller($this->input->get('attachment_type'), $this->input->get('attachment_id')));

            $this->load->view('template/header', $this->activation_model->get_activation_data());
            $this->load->view('file_upload/new_upload', $data);
            $this->load->view('template/footer');
        } else {
            redirect('Product');
        }
    }

    public function upload_new() {
        if ($this->input->post('attachment_id')) {

            $this->load->library('upload', $config);


            $user = 'upload';
            $time = time();
            $file_name = $user . '_' . $time;

            $config[0] = array(
                'upload_path' => "./assets/uploads/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => TRUE,
                'file_name' => $file_name . '_thumbnail'
            );
            $config[1] = array(
                'upload_path' => "./assets/uploads/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => TRUE,
                'file_name' => $file_name . '_normal'
            );
            $config[2] = array(
                'upload_path' => "./assets/uploads/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => TRUE,
                'file_name' => $file_name . '_large'
            );

            $i = 0;
            $upload_info_array = null;
            foreach ($_FILES as $fieldname => $fileObject) {  //fieldname is the form field name
                if (!empty($fileObject['name'])) {
                    $this->upload->initialize($config[$i]);
                    if (!$this->upload->do_upload($fieldname)) {
                        $errors = $this->upload->display_errors();
                        //flashMsg($errors);
                    } else {
                        // Code After Files Upload Success GOES HERE
                        $data = array('upload_data' => $this->upload->data());
                        $upload_info_array[$i] = array(
                            'name' => $fieldname,
                            'file_object' => $fileObject,
                            'file_name' => $data['upload_data']['file_name']
                        );
                    }
                }
                $i++;
            }
            $this->load->model('upload_model');
            $upload_entry = array(
                'thumbnail_file_name' => $upload_info_array[0]['file_name'],
                'normal_file_name' => $upload_info_array[1]['file_name'],
                'large_file_name' => $upload_info_array[2]['file_name']
            );
            $mobile_id = $this->input->post('attachment_id');
            $this->upload_model->insert($mobile_id, $upload_entry);
            redirect('Mobile/specifications/' . $this->input->post('attachment_id'));

//            if ($this->upload->do_upload()) {
//                $data = array('upload_data' => $this->upload->data());
//                $this->load->model('upload_model');
//                $upload_entry = array(
//                    'attachment_id' => $this->input->post('attachment_id'),
//                    'file_name' => $data['upload_data']['file_name']
//                );
//                $this->upload_model->insert($upload_entry);
//                redirect('Mobile/specifications/' . $this->input->post('attachment_id'));
//            } else {
//                $error = array('error' => $this->upload->display_errors());
//                $this->index($error);
//            }
        } else {
            echo "variables not set!!!\n";
        }
    }

    //Not used here,about to be deleted
    public function get_controller($attachment_type, $attachment_id) {
        $controller = null;
        switch ($attachment_type) {
            case 1: $controller = 'Product/single_product/' . $attachment_id;
                break;
            case 2: $controller = 'Seller/single_seller/' . $attachment_id;
                break;
            case 3: $controller = 'Inventory/single_inventory/' . $attachment_id;
                break;
            case 4: $controller = 'Form49/get/' . $attachment_id;
                break;
        }
        return $controller;
    }

    public function get_uploads($attachment_id = null) {
        if ($attachment_id != null) {

            $this->load->model('upload_model');
            $r = $this->upload_model->get_all_uploads(
                    array(
                        'attachment_id' => $attachment_id
                    )
            );
            $this->output->set_content_type('application/json')
                    ->set_output(json_encode($r));
        } else {
            echo "No output";
        }
    }

    //wont be used here,about to be deleted
    public function single($mobile_id, $imageset_id) {

        $imageset = $this->upload_model->get_single_upload($imageset_id);


        $data['thumbnail_filename'] = base_url('assets/uploads/' . $imageset->thumbnail_filename);
        $data['normal_filename'] = base_url('assets/uploads/' . $imageset->normal_filename);
        $data['large_filename'] = base_url('assets/uploads/' . $imageset->large_filename);

        $data['back_url'] = site_url('Mobile/specifications/' . $mobile_id);

        $data['delete_url'] = site_url("FileUpload/delete/$mobile_id/$imageset_id");



        
        $this->load_view('file_upload/upload_single', $data);
        
    }

    public function delete($mobile_id, $imageset_id) {

        $base_path = '/opt/lampp/htdocs/MobileStore/assets/uploads';
        $this->upload_model->delete($imageset_id, $base_path);

        //echo $base_path;
        redirect('Mobile/specifications/' . $mobile_id);
    }

    //wont be used here,about to be deleted
    public function update($id, $attachment_type, $attachment_id) {
        if ($this->input->post('attachment_type') && $this->input->post('attachment_id')) {
            $this->upload_model->update($id, $this->input->post('upload_description'));
            //echo "updated...";
        }
        redirect($this->get_controller($attachment_type, $attachment_id));
        //echo "update failed!";
    }

}
