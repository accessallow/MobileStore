<?php

class Mobile_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->library('rb');
        $this->load->library('session');
        $this->load->library('cart');
    }

    public function add($data) {
        $mobile = R::dispense('mobile');


        $mobile->title = $data['title'];
        $mobile->subtitle = $data['subtitle'];
        $mobile->company = $data['company'];
        $mobile->connectivity = $data['connectivity'];
        $mobile->storage = $data['storage'];

        $mobile->warranty = $data['warranty'];

        $mobile->mrp = $data['mrp'];
        $mobile->selling_price = $data['selling_price'];
        $mobile->actual_price = $data['actual_price'];
        $mobile->discount_value = $data['discount_value'];
        $mobile->discount_text = $data['discount_text'];

        $mobile->seller_name = $data['seller_name'];
        $mobile->delivery_time = $data['delivery_time'];
        $mobile->delivery_charge = $data['delivery_charge'];
        $mobile->cod = $data['cod'];
        $mobile->replacement_policy = $data['replacement_policy'];
        $mobile->delivery_text = $data['delivery_text'];

//        $mobile-> = $data[''];
//        $mobile-> = $data[''];

        $id = R::store($mobile);
    }

    public function update($id, $data) {
        $mobile = R::load('mobile', $id);
        if ($mobile) {
            $mobile->title = $data['title'];
            $mobile->subtitle = $data['subtitle'];
            $mobile->company = $data['company'];
            $mobile->connectivity = $data['connectivity'];
            $mobile->storage = $data['storage'];

            $mobile->warranty = $data['warranty'];

            $mobile->mrp = $data['mrp'];
            $mobile->selling_price = $data['selling_price'];
            $mobile->actual_price = $data['actual_price'];
            $mobile->discount_value = $data['discount_value'];
            $mobile->discount_text = $data['discount_text'];

            $mobile->seller_name = $data['seller_name'];
            $mobile->delivery_time = $data['delivery_time'];
            $mobile->delivery_charge = $data['delivery_charge'];
            $mobile->cod = $data['cod'];
            $mobile->replacement_policy = $data['replacement_policy'];
            $mobile->delivery_text = $data['delivery_text'];

            R::store($mobile);
        }
    }

    public function delete($id) {
        $mobile = R::load('mobile', $id);
        R::trash($mobile);
    }

    public function get_all() {
        $mobiles = R::findAll('mobile');
        return $mobiles;
    }
    public function search($search_term){
        $this->load->database();
        $query_string = "select * from mobile
                        where
                        title like '%$search_term%'
                        or
                        subtitle like '%$search_term%'
                        or
                        storage like '%$search_term%'
                        or
                        company like '%$search_term%'
                        ;";
        $result = $this->db->query($query_string);
        return $result->result();
    }

    public function get_one_mobile($id) {
        $mobile = R::load('mobile', $id);
        return $mobile;
    }

    public function add_star_feature($mobile_id, $feature_text) {
        $mobile = R::load('mobile', $mobile_id);
        $feature = R::dispense('starspecs');
        $feature->feature_text = $feature_text;
        $mobile->ownStarspecsList[] = $feature;
        R::store($mobile);
    }
    public function delete_star_feature($mobile_id,$feature_id){
        $mobile = R::load('mobile', $mobile_id);
        unset($mobile->ownStarspecsList[$feature_id]);
        R::store($mobile);
    }
    public function add_key_feature($mobile_id, $feature_text) {
        $mobile = R::load('mobile', $mobile_id);
        $feature = R::dispense('keyspecs');
        $feature->feature_text = $feature_text;
        $mobile->ownKeyspecsList[] = $feature;
        R::store($mobile);
    }

    public function add_specification($mobile_id, $spec_category,$spec_name, $spec_value) {
        $mobile = R::load('mobile', $mobile_id);
        $spec_item = R::dispense('specifications');
        $spec_item->spec_category = $spec_category;
        $spec_item->spec_name = $spec_name;
        $spec_item->spec_value = $spec_value;
        $mobile->ownSpecificationsList[] = $spec_item;
        R::store($mobile);
    }

    public function getStarFeatures($mobile_id) {
        $mobile = R::load('mobile', $mobile_id);
//        $first = reset($mobile->ownStarspecsList); //gets first product
//        $last = end($mobile->ownStarspecsList); //gets last product
        return $mobile->ownStarspecsList;
    }
    public function get_specs($mobile_id){
        $mobile = R::load('mobile', $mobile_id);
        $specs = $mobile->ownSpecificationsList;
        return $specs;
    }
    public function delete_spec($mobile_id,$feature_id){
        $mobile = R::load('mobile', $mobile_id);
        unset($mobile->ownSpecificationsList[$feature_id]);
        R::store($mobile);
    }
    
    function add_to_cart($mobile_id) {
        
        $mobile = R::load('mobile', $mobile_id);
        $data = array(
            'id' => 'mobile_store_product_'.$mobile->id,
            'qty' => 1,
            'price' => $mobile->actual_price,
            'name' => $mobile->title,
            'options' => array()
        );

        $this->cart->insert($data);
    }
    function get_cart_count(){
        return $this->cart->total_items();
    }
    function get_cart_total(){
        return $this->cart->total();
    }
    function get_cart_items(){
        return $this->cart->contents();
    }
    function clear_cart(){
        $this->cart->destroy();
    }

}
