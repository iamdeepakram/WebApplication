<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurent extends CI_Controller {

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
        $this->load->model('Restaurent_model'); 
        //---- From DB -----//
        $this->load->model('Common_model'); 

        
    } 

	public function RegisterRestaurent()
	{

			$RestaurentData = array();
			$RestaurentUserData = array();
 

			$this->form_validation->set_rules('restaurent_name', 'Restaurent Name', 'required');  
			$this->form_validation->set_rules('first_name', 'First Name', 'required');  
			$this->form_validation->set_rules('last_name', 'Last Name', 'required');  
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[restaurent_user.email]'); 
			$this->form_validation->set_rules('phone', 'Phone', 'required'); 
			$this->form_validation->set_rules('password', 'password', 'required'); 
			$this->form_validation->set_rules('confirm_pass', 'confirm password', 'required|matches[password]');
        
			
			if($this->form_validation->run() == true){ 

				$table_name = 'restaurent_user';
				//Generate item_code 
				//code_generator($table_name, $initials, $column_name);
				$ruser_code = $this->Common_model->code_generator($table_name, 'RU', 'ruser_code');
				$RestaurentUserData = array(
					'ruser_code' => $ruser_code,
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'password' => md5($this->input->post('password')), 
				);

				// Make array to insert  in restaurent_details table
				$restaurent_code = $this->Common_model->code_generator('restaurent_details', 'RC', 'restaurent_code');
				$RestaurentData = array(
					'restaurent_code' => $restaurent_code,
					'restaurent_name' => $this->input->post('restaurent_name'),
				);


				$AddRUser = $this->Common_model->AddData($RestaurentUserData, $table_name); 
				$AddRestaurent= $this->Common_model->AddData($RestaurentData, 'restaurent_details'); 

				//Map user to restaurent 
				$map_code = $this->Common_model->code_generator('ruser_rdetails_mapping', 'RURDM', 'map_code');

				$MapRuserToRestaurent = array(
					'map_code' => $map_code, 
					'restaurent_code' => $restaurent_code, 
					'ruser_code' => $ruser_code, 
				);

				$AddMapping = $this->Common_model->AddData($MapRuserToRestaurent, 'ruser_rdetails_mapping'); 

				if($AddRUser && $AddRestaurent && $AddMapping){

					
					//------This message is for login page -------//
					$this->session->set_flashdata('su_msg', 'Registered successfully'); 
					redirect('restaurent/LoginRestaurent'); 
				}else{ 
					$data['err_msg'] = 'Please try again.'; 
				} 
			}else{ 
				$data['err_msg'] = validation_errors(); 
				$data['restaurentuserdata'] = $RestaurentUserData;
				$data['restaurentdata'] = $RestaurentData;
				$data['title'] = 'Register Restaurent';
				$this->load->view('restaurent/register', $data);
			}
	}

	public function LoginRestaurent()
	{
		

		$this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

	    if($this->form_validation->run() == true){ 
            
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $table_name = 'restaurent_user';

            $VerifyLogin = $this->Restaurent_model->VerifyRestaurentUser($email, $password, $table_name); 
	            
	            if($VerifyLogin)
	            { 
	            	$RestaurentArray = array();
	            	//Get user information 
	            	$RawRestaurentUserDetails = $this->Restaurent_model->FetchRestaurentUserDetails('restaurent_user', $email, $password, 1);

	            	if ($RawRestaurentUserDetails) {
								$RuserCode = null;
			            		
								foreach ($RawRestaurentUserDetails as $key => $value){

									$RuserCode = $value['ruser_code'];
			            				$RestaurentArray = array(
			            					'ruser_code' => $value['ruser_code'], 
			            					'ruser_name' => $value['first_name'], 
			            					'email' => $value['email'], 
			            				);

			            		}

			            	// Getting Restaurent Details 
			            	$RawRestaurentDetails = $this->Restaurent_model->FetchRestaurentDetails('ruser_rdetails_mapping', $RuserCode, 1);

								foreach ($RawRestaurentDetails as $key => $value){
									
									$RestaurentArray['restaurent_code'] = $value['restaurent_code'];
			            				
			            		}
	            			            		

							}
			          		// Set session data for restaurent user 
							$this->session->set_userdata($RestaurentArray);
			                $this->session->set_userdata('restaurent_logged_in', true);          
			                redirect(base_url().'restaurent/DashBoard'); 
		        }else
		        { 
		                $data['err_msg'] = 'Wrong email or password, please try again.'; 
		        } 
	        }else{ 
				$data['err_msg'] = validation_errors(); 
				
	            
	        }
	        $data['title'] = 'Login Restaurent';
			$data['linkRegisterRestaurent'] =  base_url().'restaurent/RegisterRestaurent';
			$data['linkHome'] =  base_url();
			$this->load->view('restaurent/login', $data);
	

		
	}
	public function Signout()
	{
		$this->session->sess_destroy(); 
        redirect(base_url().'home/view_home'); 
	}

	public function DashBoard()
	{

		$restaurent_logged_in = $this->session->userdata('restaurent_logged_in');
		if (!$restaurent_logged_in) {
			redirect('restaurent/RegisterRestaurent');
			
		}else{
			$data['title'] = 'Dashboard';
			$data['linkViewOrdersRestaurent'] =  base_url().'restaurent/ViewOrders';
			$data['linkSignOutRestaurent'] =  base_url().'restaurent/Signout';
			$data['linkDashBoardRestaurent'] =  base_url().'restaurent/DashBoard';
			$data['linkViewMenuRestaurent'] =  base_url().'restaurent/ViewMenu';
			$data['linkAddMenuRestaurent'] =  base_url().'restaurent/AddMenu';
			$this->load->view('restaurent/dashboard', $data);
		}
		
	}


	public function ViewOrders()
	{


		$restaurent_logged_in = $this->session->userdata('restaurent_logged_in');
		if (!$restaurent_logged_in) {
			redirect('restaurent/RegisterRestaurent');
			
		}else{
			//get restaurent from the session 
			$restaurent_code = $this->session->userdata()['restaurent_code'];
			// Item Deleted of not 
			$is_active = 1;
			$table_name = 'orders';
			// Getting Restaurent Orders 
			$RestaurentOrders = $this->Restaurent_model->FetchOrders($table_name, $restaurent_code, $is_active);

			$data['RestaurentOrders'] = $RestaurentOrders;


			$data['title'] = 'View Orders';
			$data['linkViewOrdersRestaurent'] =  base_url().'restaurent/ViewOrders';
			$data['linkSignOutRestaurent'] =  base_url().'restaurent/Signout';
			$data['linkDashBoardRestaurent'] =  base_url().'restaurent/DashBoard';
			$data['linkViewMenuRestaurent'] =  base_url().'restaurent/ViewMenu';
			$data['linkAddMenuRestaurent'] =  base_url().'restaurent/AddMenu';
			$this->load->view('restaurent/view_orders', $data);
		}
	}





	public function ViewMenu()
	{


		$restaurent_logged_in = $this->session->userdata('restaurent_logged_in');
		if (!$restaurent_logged_in) {
			redirect('restaurent/RegisterRestaurent');
			
		}else{
			//get restaurent from the session 
			$restaurent_code = $this->session->userdata()['restaurent_code'];
			// Load restaurent menu items 
			$table_name = 'restaurent_menu';
			
			// Item Deleted of not 
			$is_active = 1;
			$RestaurentMenu = $this->Restaurent_model->FetchMenu($table_name, $restaurent_code, $is_active);
			$data['RestaurentMenuItem'] = $RestaurentMenu;


			$data['title'] = 'My Menu';
			$data['linkViewOrdersRestaurent'] =  base_url().'restaurent/ViewOrders';
			$data['linkDashBoardRestaurent'] =  base_url().'restaurent/DashBoard';
			$data['linkSignOutRestaurent'] =  base_url().'restaurent/Signout';
			$data['linkViewMenuRestaurent'] =  base_url().'restaurent/ViewMenu';
			$data['linkAddMenuRestaurent'] =  base_url().'restaurent/AddMenu';
			$this->load->view('restaurent/menu', $data);
		}
	}

	public function AddMenu()
	{

			$restaurent_logged_in = $this->session->userdata('restaurent_logged_in');
			if (!$restaurent_logged_in) {
				
				redirect('restaurent/RegisterRestaurent');
				
			}else{
				//get restaurent from the session 
				$restaurent_code = $this->session->userdata()['restaurent_code'];

					$MenuData = array();
					

					$this->form_validation->set_rules('ItemName', 'Name', 'required');  
					$this->form_validation->set_rules('veg', 'Veg', 'required'); 
					$this->form_validation->set_rules('price', 'Price', 'required');  
					
					if($this->form_validation->run() == true){ 

						$table_name = 'restaurent_menu';
						//Generate item_code 
						//code_generator($table_name, $initials, $column_name);
						$item_code = $this->Common_model->code_generator($table_name, 'RM', 'item_code');
						$MenuData = array(
							'item_code' => $item_code,
							'restaurent_code' => $restaurent_code,
							'item_name' => $this->input->post('ItemName'), 
							'veg' => $this->input->post('veg'), 
							'price' => $this->input->post('price'), 
						);


						$AddMenu = $this->Common_model->AddData($MenuData, $table_name); 
						if($AddMenu){ 
							//------This message is for login page -------//
							$this->session->set_flashdata('su_msg', 'Item added successfully'); 
							redirect('restaurent/ViewMenu'); 
						}else{ 
							$data['err_msg'] = 'Please try again.'; 
						} 
					}else{ 
						$data['err_msg'] = validation_errors(); 
						$data['IetmData'] = $MenuData;
						$data['title'] = 'Add Menu Item';
						$data['linkViewOrdersRestaurent'] =  base_url().'restaurent/ViewOrders';
						$data['linkDashBoardRestaurent'] =  base_url().'restaurent/DashBoard';
						$data['linkSignOutRestaurent'] =  base_url().'restaurent/Signout';
						$data['linkViewMenuRestaurent'] =  base_url().'restaurent/ViewMenu';
						$data['linkAddMenuRestaurent'] =  base_url().'restaurent/AddMenu';
						$this->load->view('restaurent/add_menu_item', $data);
					} 

				}


		
	}


	public function ViewRestaurentInfo($restaurent_code)
	{

		// Load restaurent menu items 
		$table_name = 'restaurent_menu';
		
		// Item Deleted of not 
		$is_active = 1;
		// Get Menu Details 
		$RestaurentMenu = $this->Restaurent_model->FetchMenu($table_name, $restaurent_code, $is_active);
		// Get Restaurent details
		$RestaurentDetails = $this->Restaurent_model->FetchAllRestaurentDetails('restaurent_details', $restaurent_code);
		$RD = array();
		foreach ($RestaurentDetails as $key => $value) {
			if ($restaurent_code == $value['restaurent_code']){ 
				$RD['restaurent_code'] = $value['restaurent_code']; 
				$RD['restaurent_name'] = $value['restaurent_name']; 
				$RD['city'] = $value['city']; 
				$RD['status'] = $value['status']; 
				$RD['timing'] = $value['timing']; 
			}
		}
		$data['RestaurentMenuItem'] = $RestaurentMenu;
		$data['RestaurentDetails'] = $RD;
		$data['ViewRestaurentInfo'] = base_url().'restaurent/ViewRestaurentInfo';
		$data['OrderItem'] = base_url().'customer/order/'.$restaurent_code.'/';


		$data['title'] = 'Restaurent Menu';
		$data['linkLoginCustomer'] =  base_url().'customer/login';
		$data['linkSignupCustomer'] =  base_url().'customer/signup';
		$data['linkLogOutCustomer'] =  base_url().'customer/logout';
		$data['linkRegisterRestaurent'] =  base_url().'restaurent/RegisterRestaurent';
		$data['linkLoginRestaurent'] =  base_url().'restaurent/LoginRestaurent';
		$this->load->view('restaurent/view_menu', $data);
	}
}
