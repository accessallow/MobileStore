<?php

class Mobile extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mobile_model');
    }

    public function index() {
        $this->store_catalogue();
    }

    public function store($mobile_id) {
        $this->load->model('upload_model');
        $data = array(
            'mobile' => $this->mobile_model->get_one_mobile($mobile_id),
            'star_features' => $this->mobile_model->getStarFeatures($mobile_id),
            'specifications' => $this->get_managed_array($this->mobile_model->get_specs($mobile_id)),
            'images' => $this->upload_model->get_all_uploads($mobile_id)
        );
        $this->load_store_front_view('mobile/storefront', $data);
    }

    public function store_search() {

        if ($this->input->post('search_term')) {
            $search_term = $this->input->post('search_term');
            $mobiles = $this->mobile_model->search($search_term);
            $data = array(
                'mobiles' => $mobiles,
                'form_submit_url' => site_url('Mobile/store_search')
            );
        } else {
            $data = array(
                'form_submit_url' => site_url('Mobile/store_search')
            );
        }

        $this->load_store_front_view('mobile/search', $data);
    }

    public function all_mobiles() {

        $data = array(
            'add_new_url' => site_url('Mobile/add_new'),
            'edit_url' => site_url('Mobile/edit/'),
            'mobiles' => $this->mobile_model->get_all()
        );
        $this->load_view('mobile/all_mobiles', $data);
        //echo $data['mobiles'];
    }

    public function single($id) {
        $data = array(
            'add_new_url' => site_url('Mobile/add_new'),
            'edit_url' => site_url('Mobile/edit/'),
            'mobile' => $this->mobile_model->get_one_mobile($id),
            'edit' => true,
            'form_submit_url' => site_url('Mobile/update/' . $id),
            'back_url' => site_url('Mobile/all_mobiles')
        );

        $this->load_view('mobile/add_new', $data);
    }

    public function specifications($id) {
        $this->load->helper('form');
        $this->load->model('upload_model');
        $data = array(
            'add_new_url' => site_url('Mobile/add_new'),
            'edit_url' => site_url('Mobile/edit/'),
            'mobile' => $this->mobile_model->get_one_mobile($id),
            'edit' => true,
            'form_submit_url' => site_url('Mobile/update/' . $id),
            'back_url' => site_url('Mobile/all_mobiles'),
            'add_star_feature_url' => site_url('Mobile/add_star_feature/' . $id),
            'delete_star_feature_url' => site_url('Mobile/delete_star_feature/' . $id),
            'add_specs_url' => site_url('Mobile/add_specs/' . $id),
            'delete_spec_url' => site_url('Mobile/delete_spec/' . $id),
            'star_features' => $this->mobile_model->getStarFeatures($id),
            'specifications' => $this->get_managed_array($this->mobile_model->get_specs($id)),
            'uploads' => $this->upload_model->get_all_uploads($id)
        );

        $this->load_view('mobile/specs_page', $data);
    }

    public function add_new() {
        if ($this->input->post('title')) {
            $data = array(
                'title' => $this->input->post('title'),
                'subtitle' => $this->input->post('subtitle'),
                'company' => $this->input->post('company'),
                'connectivity' => $this->input->post('connectivity'),
                'storage' => $this->input->post('storage'),
                'warranty' => $this->input->post('warranty'),
                'mrp' => $this->input->post('mrp'),
                'selling_price' => $this->input->post('selling_price'),
                'actual_price' => $this->input->post('actual_price'),
                'discount_value' => $this->input->post('discount_value'),
                'discount_text' => $this->input->post('discount_text'),
                'seller_name' => $this->input->post('seller_name'),
                'delivery_time' => $this->input->post('delivery_time'),
                'delivery_charge' => $this->input->post('delivery_charge'),
                'cod' => $this->input->post('cash_on_delivery'),
                'replacement_policy' => $this->input->post('replacement_policy'),
                'delivery_text' => $this->input->post('delivery_text'),
            );
            $this->mobile_model->add($data);
            $this->set_success_flash('New Mobile details added successfully.');
            redirect('Mobile/all_mobiles');
        } else {
            $data = array(
                'form_submit_url' => site_url('Mobile/add_new'),
                'back_url' => site_url('Mobile/all_mobiles')
            );
            $this->load_view('mobile/add_new', $data);
        }
    }

    public function update($id) {

        if ($this->input->post('mobile_id')) {
            $mobile_data = array(
                'title' => $this->input->post('title'),
                'subtitle' => $this->input->post('subtitle'),
                'company' => $this->input->post('company'),
                'connectivity' => $this->input->post('connectivity'),
                'storage' => $this->input->post('storage'),
                'warranty' => $this->input->post('warranty'),
                'mrp' => $this->input->post('mrp'),
                'selling_price' => $this->input->post('selling_price'),
                'actual_price' => $this->input->post('actual_price'),
                'discount_value' => $this->input->post('discount_value'),
                'discount_text' => $this->input->post('discount_text'),
                'seller_name' => $this->input->post('seller_name'),
                'delivery_time' => $this->input->post('delivery_time'),
                'delivery_charge' => $this->input->post('delivery_charge'),
                'cod' => $this->input->post('cash_on_delivery'),
                'replacement_policy' => $this->input->post('replacement_policy'),
                'delivery_text' => $this->input->post('delivery_text'),
            );
            $this->mobile_model->update($id, $mobile_data);
            $this->set_success_flash("Mobile details updated");
        }
        redirect('Mobile/single/' . $id);
    }

    public function delete($id) {
        $this->mobile_model->delete($id);
        $this->set_info_flash("Mobile Successfully deleted");
        redirect('Mobile/all_mobiles');
    }

    public function add_star_feature($mobile_id) {
        if ($this->input->post('new_feature')) {
            $new_feature = $this->input->post('new_feature');
            $this->mobile_model->add_star_feature($mobile_id, $new_feature);
        }
        redirect('Mobile/specifications/' . $mobile_id);
    }

    public function delete_star_feature($mobile_id, $feature_id) {
        $this->mobile_model->delete_star_feature($mobile_id, $feature_id);
        redirect('Mobile/specifications/' . $mobile_id);
    }

    public function add_specs($mobile_id) {
        if ($this->input->post('spec_category') && $this->input->post('spec_name')) {
            $spec_category = $this->input->post('spec_category');
            $spec_name = $this->input->post('spec_name');
            $spec_value = $this->input->post('spec_value');

            $this->mobile_model->add_specification($mobile_id, $spec_category, $spec_name, $spec_value);
        }
        redirect('Mobile/specifications/' . $mobile_id);
    }

    public function delete_spec($mobile_id, $spec_id) {
        $this->mobile_model->delete_spec($mobile_id, $spec_id);
        redirect('Mobile/specifications/' . $mobile_id);
    }

    public function get_specs($mobile_id) {
        $specs = $this->mobile_model->get_specs($mobile_id);


        echo '<hr/>';
        echo '<pre> ';
        $managed_array = $this->get_managed_array($specs);
        var_dump($managed_array);
        echo '<hr/>';
        echo '<pre>';
        sort($managed_array);
        var_dump($managed_array);
    }

    function get_managed_array($specs) {
        $managed_array = null;
        foreach ($specs as $s) {
            //echo $s->spec_name . " ==> " . $s->spec_value . "<br/>";

            $managed_array[$s->spec_category][$s->spec_name] = array(
                'id' => $s->id,
                'spec_value' => $s->spec_value
            );
        }
        //sort($managed_array);
        return $managed_array;
    }

    function get_all_json() {
        $mobiles = $this->mobile_model->get_all();
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($mobiles));
    }

    function store_catalogue() {
        $this->load->helper('form');
        $data = array(
            'mobiles' => $this->mobile_model->get_all()
        );

        $this->load_store_front_view('mobile/store_catalogue', $data);
    }

    function view_my_cart() {
        $data = array(
            'cart_items' => $this->mobile_model->get_cart_items(),
            'checkout_url' => site_url('Mobile/checkout'),
            'total_money' => $this->mobile_model->get_cart_total(),
            'total_items' => $this->mobile_model->get_cart_count(),
        );
//        echo '<pre>';
//        echo var_dump($this->mobile_model->get_cart_items());
//        echo '</pre>';
        $this->load_store_front_view('mobile/cart', $data);
    }

    function update_cart() {
        
        $data = array(
            'rowid' => 'b99ccdf16028f015540f341130b6d8ec',
            'qty' => 3
        );

        $this->cart->update($data);


        redirect('Mobile/view_my_cart');
    }

    function add_to_cart($mobile_id) {
        $this->mobile_model->add_to_cart($mobile_id);
        redirect('Mobile/store/' . $mobile_id);
    }

    function clear_cart() {
        $this->mobile_model->clear_cart();
        redirect('Mobile/view_my_cart');
    }

}
