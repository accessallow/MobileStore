<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Billing extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Billing_model');
	}

	public function index()
	{	
		$this->data['title'] = 'Billing';
		
		$this->load_store_front_view('mobile/billing', $this->data);
	}
	
	public function save_order()
	{
		$customer = array(
			'name' 		=> $this->input->post('name'),
			'email' 	=> $this->input->post('email'),
			'address' 	=> $this->input->post('address'),
			'phone' 	=> $this->input->post('phone')
		);		

		$cust_id = $this->Billing_model->insert_customer($customer);

		$order = array(
			'date' 			=> date('Y-m-d'),
			'customerid' 	=> $cust_id,
                        'status' => 0
		);		

		$ord_id = $this->Billing_model->insert_order($order);
		
		if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
				$order_detail = array(
					'orderid' 		=> $ord_id,
					'productid' 	=> $item['id'],
					'quantity' 		=> $item['qty'],
					'price' 		=> $item['price']
				);		

				$cust_id = $this->Billing_model->insert_order_detail($order_detail);
			endforeach;
		endif;
		
                //Clearing the cart stuff now
                $this->cart->destroy();
		$this->load_store_front_view('mobile/order_complete',null);
	}
}