<?php

class Order extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('order_model', 'om');
    }

    public function all_orders() {
        $data = array(
            'add_new_url' => site_url('Order/add_new'),
            'edit_url' => site_url('Order/edit/'),
            'orders' => $this->om->get_all()
        );
        $this->load_view('order/all_orders', $data);
    }

    public function update_order($order_id) {
        
    }

    public function single_order() {
        
    }

    public function update_order_status($status) {
        
    }

    public function test() {
        //$this->om->trashAll();
//        $id = $this->om->add(array(
//            'customer_name' => "Mr.Test",
//            'email' => 'test@example.com',
//            'shipping_address' => '125,Testing valley',
//            'phone_number' => '677-776',
//            'total_amount' => '1000',
//        ));
//        echo "Order Created!!!";
        $mobile_id = 1;
        $this->om->add_product_to_order(1,$mobile_id);
        echo "<br/>Product added!!!";

        echo $this->om->get_total_order_amount(1);
    }

}
