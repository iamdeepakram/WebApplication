<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Common_model extends CI_Model{ 


    // when insert details in database table generates code 
    public function code_generator($Table_name, $initials, $column_name){

        // SELECT column_name.customer_code, customers.id ,customers.first_name FROM `customers` ORDER BY customer_code DESC LIMIT 1
        // Check for existing code through database query
        $this->db->select($Table_name.'.'.$column_name);
        $this->db->from($Table_name);
        $this->db->order_by($column_name, "desc");
        $this->db->limit(1);
        $query = $this->db->get();
        $result = null;
            // give $result = 'CC000000' / some code from databse  
        foreach ($query->result() as $row)
        {
            $result = $row->$column_name;
        }

        // if not code in not there
        if (empty($result)){
            // code = ''
            $code = $initials.'000001';
        // else
        } else {
            // Slice the string - 'CC000001' - 'CC', '000001'
            $code_number = preg_split("/([A-Z]+)/", $result);
            // increment the integer value by +1
            // than add to code 
            $code = $initials.sprintf("%'.06d", (int)$code_number[1]+1);
        }
        
        return $code;


    }

    public function AddData($data = array(), $table_name){
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

            $insert = $this->db->insert($table_name, $data);

            if(!empty($insert)){
                return $this->db->insert_id();
            }else{
                return false;
            }
        } else{
            return false;
        }
        
    }






}