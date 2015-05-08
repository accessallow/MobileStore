<?php

class OrderStatus {

    public static $processing = 1;
    public static $shipment = 2;
    public static $complete = 3;

}

class Order_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->library('rb');
        $this->load->library('session');
        $this->load->library('cart');
    }

    public function add($data) {
        $order = R::dispense('order');

        $order->customer_name = $data['customer_name'];
        $order->email = $data['email'];
        $order->shipping_address = $data['shipping_address'];
        $order->phone_number = $data['phone_number'];
        $order->total_amount = $data['total_amount'];
        $order->status = OrderStatus::$processing;


//        $mobile-> = $data[''];
//        $mobile-> = $data[''];

        $id = R::store($order);
        return $id;
    }

    public function update($id, $data) {
        $order = R::load('order', $id);
        if ($order) {

            $order->customer_name = $data['customer_name'];
            $order->email = $data['email'];
            $order->shipping_address = $data['shipping_address'];
            $order->phone_number = $data['phone_number'];
            $order->total_amount = $data['total_amount'];
            $order->status = OrderStatus::$processing;

            R::store($order);
        }
    }

    public function add_product_to_order($order_id, $mobile_id) {
        $order = R::load('order', $order_id);
        if ($order) {
            $mobile = R::load('mobile', $mobile_id);
            $product = R::dispense("product");
            
            $product->product_name = $mobile->title;
            $product->quantity = 1;
            $product->price = $mobile->actual_price;
            
            $product_id = R::store($product);
            
            $product = R::load('product', $product_id);
            
            $order->ownProductsList[] = $product;
            
            R::store($order);
        }
    }

    public function delete($id) {
        $order = R::load('order', $id);
        R::trash($order);
    }

    public function get_all() {
        $orders = R::findAll('order');
        foreach ($orders as $o){
            $o->total_amount = $this->get_total_order_amount($o->id);
        }
        return $orders;
    }

    public function search($search_term) {
        $this->load->database();
        $query_string = "select * from order
                        where
                        customer_name like '%$search_term%'
                        or
                        email like '%$search_term%'
                        or
                        shipping_address like '%$search_term%'
                        or
                        phone_number like '%$search_term%'
                        ;";
        $result = $this->db->query($query_string);
        return $result->result();
    }

    public function get_one_order($id) {
        $order = R::load('order', $id);
        return $order;
    }

    public function update_order_status($new_status) {
        $order = R::load('order', $id);
        $order->status = $new_status;
        R::store($order);
    }
    public function trashAll(){
        R::wipe('order');
    }
    
    public function get_total_order_amount($order_id){
        $sql = "select sum(price) from product where order_id=$order_id;";
        $row = R::getAll($sql);
        $row = $row[0];
        return $row['sum(price)'];
    }

}
