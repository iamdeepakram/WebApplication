<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Restaurent_model extends CI_Model{ 


    public function FetchMenu($table_name, $restaurent_code, $is_active)
    {
        $query = $this->db->where('restaurent_code', $restaurent_code);
        $query = $this->db->where('is_active', $is_active);
        $result = $this->db->get($table_name);

        return $result->result_array();
    }


    public function FetchOrders($table_name, $restaurent_code, $is_active)
    {
        
    	$query =$this->db->select('DISTINCT(orders.order_code) ,orders.total, orders.status,customers.first_name, order_detail.item_code, order_detail.quantity, order_detail.price');
    	$query =$this->db->from($table_name);
        $query = $this->db->where(''.$table_name.'.is_active', $is_active);
        $query = $this->db->where(''.$table_name.'.restaurent_code', $restaurent_code);
    	$query =$this->db->join('order_detail', 'orders.order_code = order_detail.order_code', 'left');
    	$query =$this->db->join('customers', 'orders.customer_code = customers.customer_code' ,'left');
        $result = $this->db->get();
        // die(var_dump($result));
        return $result->result_array();
    }

    public function VerifyRestaurentUser($email, $password, $table_name)
      {
          $this->db->where('email', $email);
          $this->db->where('password', $password);
          $result = $this->db->get($table_name);

          if ($result->num_rows() == 1) {
    
              return true;
          } else {
              return false;
          }
      }

      public function FetchRestaurentUserDetails($table_name, $email, $password, $is_active)
    {
        $query = $this->db->where('email', $email);
        $query = $this->db->where('password', $password);
        $result = $this->db->get($table_name);

        return $result->result_array();
    }

    public function FetchRestaurentDetails($table_name, $ruser_code, $is_active)
    {
        $query = $this->db->where('ruser_code', $ruser_code);
        $result = $this->db->get($table_name);
        return $result->result_array();
    }


    
  public function FetchAllRestaurentDetails(){
        
        $query = $this->db->where('is_active', 1);
        $result = $this->db->get('restaurent_details');
        return $result->result_array();

    }


}