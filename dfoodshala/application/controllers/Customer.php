<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() { 
        parent::__construct(); 
        //--- get the form_validation library -----//
        $this->load->library('form_validation'); 
         
        $this->load->library('session');
        //--- From Database -----//
        $this->load->model('Customer_model'); 
        //---- From DB -----//
        $this->load->model('Common_model'); 

        
    } 



	public function signup()
	{
			$CustomerData = array();

			$this->form_validation->set_rules('first_name', 'First Name', 'required');  
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[customers.email]'); 
			$this->form_validation->set_rules('veg', 'Preference', 'required');  
			$this->form_validation->set_rules('password', 'password', 'required'); 
			$this->form_validation->set_rules('confirm_pass', 'confirm password', 'required|matches[password]'); 
			
			if($this->form_validation->run() == true){ 

				// Here we call a code generator function
				// $customer_code = $this->Common_model->code_generator($table_name, $initials, $column_name);
				$customer_code = $this->Common_model->code_generator('customers', 'CC', 'customer_code');
				$CustomerData = array(
					'customer_code' => $customer_code,
					'first_name' => $this->input->post('first_name'), 
					'email' => $this->input->post('email'), 
					'password' => md5($this->input->post('password')), 
					'veg' => $this->input->post('veg'), 
				);
				$AddCustomer = $this->Customer_model->add_customer($CustomerData); 
				if($AddCustomer){ 
					//------This message is for login page -------//
					$this->session->set_flashdata('su_msg', 'Sign up successful. Please log in.'); 
					redirect('customer/login'); 
				}else{ 
					$data['err_msg'] = 'Please try again.'; 
				} 
			}else{ 
				$data['err_msg'] = validation_errors(); 
				$data['customer'] = $CustomerData;
				$data['title'] = 'Sign Up';
				$this->load->view('templates/header', $data);
				$this->load->view('customer/signup', $data);
			} 
	}
	
	public function login()
	{

		$this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

	    if($this->form_validation->run() == true){ 
            
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $table_name = 'customers';

            $VerifyLogin = $this->Customer_model->verify_login($email, $password, $table_name); 
	            
	            if($VerifyLogin){ 
	            	$CustomerArray = array();
	            	//Get user information 
	            	$RawCustomerDetails = $this->Customer_model->FetchCustomerDetails('customers', $email, $password, 1);
					if ($RawCustomerDetails) {
						foreach ($RawCustomerDetails as $key => $value){

	            				$CustomerArray = array(
	            					'customer_code' => $value['customer_code'], 
	            					'customer_name' => $value['first_name'], 
	            					'email' => $value['email'], 
	            				);
	            		}

					}
	            	
					$this->session->set_userdata($CustomerArray);
	                $this->session->set_userdata('logged_in', true);          
	                redirect(base_url()); 
	            }else{ 
	                $data['err_msg'] = 'Wrong email or password, please try again.'; 
	            } 
	        }else{ 
				$data['err_msg'] = validation_errors(); 
	            
	        }
		$data['title'] = 'Login';
		$data['linkSignupCustomer'] =  base_url().'customer/signup';
		$this->load->view('customer/login', $data);

	}


	public function logout()
	{

        $this->session->sess_destroy(); 
        redirect(base_url().'home/view_home'); 
	}


	public function order()
	{
			$restaurent_code =  $this->uri->segment(3);
			$item_code =  $this->uri->segment(4);	
			$address_code = 'AD00000000';

			$customer_logged_in = $this->session->userdata('logged_in');
			if (!$customer_logged_in) {
				
				redirect('customer/login');
				
			}else{

				// Here we call a code generator function
				// $customer_code = $this->Common_model->code_generator($table_name, $initials, $column_name);
				$customer_code = $this->session->userdata()['customer_code'];
				$order_code = $this->Common_model->code_generator('orders', 'OD', 'order_code');
				$OrderData = array(
					'order_code' => $order_code,
					'customer_code' => $customer_code,
					'restaurent_code' => $restaurent_code,
					'address_code' => $address_code,
					
				);
				$table_name = 'orders';
				$AddOrder = $this->Common_model->AddData($OrderData, $table_name);
				
				// Add Order with Item code 
				$OrderDetailData = array(
					'order_code' => $order_code,
					'item_code' => $item_code,
					'price' => $restaurent_code,

				);
				$AddOrderDetails = $this->Common_model->AddData($OrderDetailData, 'order_detail');

				if($AddOrder && $AddOrderDetails){ 
					
					//------This message is for login page -------//
					$this->session->set_flashdata('su_msg', 'Order Succesfull.'); 
					redirect('customer/view_order'); 
				}else{ 
					$data['err_msg'] = 'Please try again.'; 
				} 


			}

	}

	public function view_order()
	{
		$data['title'] = 'View Order';
		
		$this->load->view('customer/view_order', $data);

	}
}
