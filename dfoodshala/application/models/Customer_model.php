<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Customer_model extends CI_Model{ 


    public function add_customer($data = array()){
        if(!empty($data)){
            if(!array_key_exists('entry_time', $data)){
                $data['entry_time'] = date('Y-m-s H:i:s');
            }
            if(!array_key_exists('is_active', $data)){
                $data['is_active'] = '1';
            }
            if(!array_key_exists('entered_by', $data)){
                $data['entered_by'] = '001';
            }

            $insert = $this->db->insert('customers', $data);

            if(!empty($insert)){
                return $this->db->insert_id();
            }else{
                return false;
            }
        } else{
            return false;
        }
        
    }



     public function verify_login($email, $password, $table_name)
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

    public function FetchCustomerDetails($table_name, $email, $password, $is_active)
    {
        $query = $this->db->where('email', $email);
        $query = $this->db->where('password', $password);
        $result = $this->db->get($table_name);

        return $result->result_array();
    }

}