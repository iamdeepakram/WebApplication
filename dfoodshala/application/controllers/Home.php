<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
       
        $this->load->model('Common_model'); 
        $this->load->model('Restaurent_model'); 

        
    } 


	public function view_home()
	{
		// Get all restaurent details
		$data['AllRestaurentDetails'] = $this->Restaurent_model->FetchAllRestaurentDetails();
		$data['ViewRestaurentInfo'] = base_url().'restaurent/ViewRestaurentInfo';


		$data['title'] = 'FoodShala';
		$data['linkLoginCustomer'] =  base_url().'customer/login';
		$data['linkSignupCustomer'] =  base_url().'customer/signup';
		$data['linkLogOutCustomer'] =  base_url().'customer/logout';
		$data['linkRegisterRestaurent'] =  base_url().'restaurent/RegisterRestaurent';
		$data['linkLoginRestaurent'] =  base_url().'restaurent/LoginRestaurent';

		$this->load->view('home/home', $data);
	}
}
