<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_foodshala_tables extends CI_Migration {

        public function up()
        {
                //---------Customers - Table -----------//
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'customer_code' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '1000',
                                'null' => FALSE,
                        ),
                        'first_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,
                        ),
                        'last_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),
                        'veg' => array(
                                'type' => 'INT',
                                'default' => '1',
                                'null' => TRUE,
                        ),
                        'email' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),
                        'phone' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '20',
                                'null' => TRUE,
                        ),
                        'password' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => FALSE,
                        ),
                        //------------For Audit Purposes -----------//
                        'is_active' => array(
                                'type' => 'INT',
                                'constraint' => '11',
                                'null' => FALSE,
                        ),
                        'entry_time' => array(
                                'type' => 'DATETIME',
                                'null' => FALSE,
                        ),
                        'entered_by' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '1000',
                                'null' => FALSE,
                        ),
                        'update_time' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE,
                        ),
                        'updated_by' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '1000',
                                'null' => TRUE,
                        ),
                        
                        
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('customers');
                //---------User_session - Table -----------//
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'customer_code' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '1000',
                                'null' => FALSE,
                        ),
                        'log_time' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE,
                        ),
                        'logout_time' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE,
                        ),
                        'duration' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                                'null' => TRUE,
                        ),
                        'ip_address' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '500',
                                'null' => TRUE,
                        ),
                        'mac_address' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '500',
                                'null' => TRUE,
                        ),
                        'locations' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '500',
                                'null' => TRUE,
                        ),
                        //------------For Audit Purposes -----------//
                        'is_active' => array(
                                'type' => 'INT',
                                'constraint' => '11',
                                'default' => '0',
                                'null' => FALSE,
                        ),
                               
                        
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('user_session');


                //---------Customer_address_mapping - Table -----------//
                $this->dbforge->add_field(array(
                            'id' => array(
                                    'type' => 'INT',
                                    'unsigned' => TRUE,
                                    'auto_increment' => TRUE
                            ),
                            'ca_map_code' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '1000',
                                'null' => FALSE,
                            ),
                            'customer_code' => array(
                                    'type' => 'VARCHAR',
                                    'constraint' => '1000',
                                    'null' => FALSE,
                            ),
                            'address_code' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '1000',
                                'null' => FALSE,
                            ),
                            //------------For Audit Purposes -----------//
                            'is_active' => array(
                                    'type' => 'INT',
                                    'constraint' => '11',
                                    'null' => FALSE,
                            ),
                            'entry_time' => array(
                                    'type' => 'DATETIME',
                                    'null' => FALSE,
                            ),
                            'entered_by' => array(
                                    'type' => 'VARCHAR',
                                    'constraint' => '1000',
                                    'null' => FALSE,
                            ),
                            'update_time' => array(
                                    'type' => 'DATETIME',
                                    'null' => TRUE,
                            ),
                            'updated_by' => array(
                                    'type' => 'VARCHAR',
                                    'constraint' => '1000',
                                    'null' => TRUE,
                            ),
                            
                            
                    ));
                    $this->dbforge->add_key('id', TRUE);
                    $this->dbforge->create_table('customer_address_mapping');        

                //---------Customer_address - Table -----------//
                $this->dbforge->add_field(array(
                    'id' => array(
                            'type' => 'INT',
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'address_code' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '1000',
                        'null' => FALSE,
                    ),
                    'address_line_1' => array(
                        'type' => 'TEXT',
                        'null' => TRUE,
                    ),
                    'address_line_2' => array(
                        'type' => 'TEXT',
                        'null' => TRUE,
                    ),
                    'city' => array(
                        'type' => 'INT',
                        'constraint' => '11',
                        'null' => TRUE,
                    ),
                    'state' => array(
                        'type' => 'INT',
                        'constraint' => '11',
                        'null' => TRUE,
                    ),
                    'country' => array(
                        'type' => 'INT',
                        'constraint' => '11',
                        'null' => TRUE,
                    ),
                    'pin_code' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                        'null' => TRUE,
                    ),
                    'co_ordinates' => array(
                        'type' => 'TEXT',
                        'null' => TRUE,
                    ),
                    

                    //------------For Audit Purposes -----------//
                    'is_active' => array(
                            'type' => 'INT',
                            'constraint' => '11',
                            'null' => FALSE,
                    ),
                    'entry_time' => array(
                            'type' => 'DATETIME',
                            'null' => FALSE,
                    ),
                    'entered_by' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '1000',
                            'null' => FALSE,
                    ),
                    'update_time' => array(
                            'type' => 'DATETIME',
                            'null' => TRUE,
                    ),
                    'updated_by' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '1000',
                            'null' => TRUE,
                    ),
                    
                    
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('customer_address'); 
            
                //---------restaurent_user - Table -----------//
                $this->dbforge->add_field(array(
                            'id' => array(
                                    'type' => 'INT',
                                    'unsigned' => TRUE,
                                    'auto_increment' => TRUE
                            ),
                            'ruser_code' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '1000',
                                'null' => FALSE,
                            ),
                            'first_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,
                            ),
                            'last_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                            ),
                            'email' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                            ),
                            'phone' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '20',
                                'null' => TRUE,
                            ),
                            'password' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => FALSE,
                            ),                            
        
                            //------------For Audit Purposes -----------//
                            'is_active' => array(
                                    'type' => 'INT',
                                    'constraint' => '11',
                                    'null' => FALSE,
                            ),
                            'entry_time' => array(
                                    'type' => 'DATETIME',
                                    'null' => FALSE,
                            ),
                            'entered_by' => array(
                                    'type' => 'VARCHAR',
                                    'constraint' => '1000',
                                    'null' => FALSE,
                            ),
                            'update_time' => array(
                                    'type' => 'DATETIME',
                                    'null' => TRUE,
                            ),
                            'updated_by' => array(
                                    'type' => 'VARCHAR',
                                    'constraint' => '1000',
                                    'null' => TRUE,
                            ),
                            
                            
                    ));
                    $this->dbforge->add_key('id', TRUE);
                    $this->dbforge->create_table('restaurent_user'); 
        
            //---------restaurent_details - Table -----------//
            $this->dbforge->add_field(array(
                'id' => array(
                        'type' => 'INT',
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                ),
                'restaurent_code' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '1000',
                    'null' => FALSE,
                ),
                'restaurent_name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '500',
                    'null' => TRUE,
                ),
                'fssai_number' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '20',
                    'null' => TRUE,
                ),
                'email' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                    'null' => TRUE,
                ),
                'phone' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '20',
                    'null' => TRUE,
                ),
                'city' => array(
                    'type' => 'INT',
                    'constraint' => '11',
                    'null' => TRUE,
                ),
                'state' => array(
                    'type' => 'INT',
                    'constraint' => '11',
                    'null' => TRUE,
                ),
                'country' => array(
                    'type' => 'INT',
                    'constraint' => '11',
                    'null' => TRUE,
                ),
                'pin_code' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                    'null' => TRUE,
                ),
                'co_ordinates' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'status' => array(
                    'type' => 'INT',
                    'constraint' => '11',
                    'default' => '1',
                ),
                'timing' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '200',
                    'null' => TRUE,
                ),                          
                //------------For Audit Purposes -----------//
                'is_active' => array(
                        'type' => 'INT',
                        'constraint' => '11',
                        'null' => FALSE,
                ),
                'entry_time' => array(
                        'type' => 'DATETIME',
                        'null' => FALSE,
                ),
                'entered_by' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '1000',
                        'null' => FALSE,
                ),
                'update_time' => array(
                        'type' => 'DATETIME',
                        'null' => TRUE,
                ),
                'updated_by' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '1000',
                        'null' => TRUE,
                ),
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('restaurent_details');
        
        //---------ruser_rdetails_mapping - Table -----------//
            $this->dbforge->add_field(array(
                'id' => array(
                        'type' => 'INT',
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                ),
                'map_code' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '1000',
                    'null' => TRUE,
                ),
                'restaurent_code' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '1000',
                    'null' => TRUE,
                ),
                'ruser_code' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '1000',
                    'null' => TRUE,
                ),
                               
                //------------For Audit Purposes -----------//
                'is_active' => array(
                        'type' => 'INT',
                        'constraint' => '11',
                        'null' => FALSE,
                ),
                'entry_time' => array(
                        'type' => 'DATETIME',
                        'null' => FALSE,
                ),
                'entered_by' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '1000',
                        'null' => FALSE,
                ),
                'update_time' => array(
                        'type' => 'DATETIME',
                        'null' => TRUE,
                ),
                'updated_by' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '1000',
                        'null' => TRUE,
                ),

            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('ruser_rdetails_mapping');
        
            
            //---------restaurent_menu - Table -----------//
            $this->dbforge->add_field(array(
                'id' => array(
                        'type' => 'INT',
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                ),
                'item_code' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '1000',
                    'null' => FALSE,
                ),
                'restaurent_code' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '1000',
                    'null' => FALSE,
                ),
                'item_name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '500',
                    'null' => TRUE,
                ),
                'veg' => array(
                    'type' => 'INT',
                    'constraint' => '11',
                    'null' => TRUE,
                ),
                'price' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                    'null' => TRUE,
                ),
                'description' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'image' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'ingredients' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),                       
                //------------For Audit Purposes -----------//
                'is_active' => array(
                        'type' => 'INT',
                        'constraint' => '11',
                        'null' => FALSE,
                ),
                'entry_time' => array(
                        'type' => 'DATETIME',
                        'null' => FALSE,
                ),
                'entered_by' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '1000',
                        'null' => FALSE,
                ),
                'update_time' => array(
                        'type' => 'DATETIME',
                        'null' => TRUE,
                ),
                'updated_by' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '1000',
                        'null' => TRUE,
                ),
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('restaurent_menu');
        
        //---------Orders - Table -----------//
            $this->dbforge->add_field(array(
                'id' => array(
                        'type' => 'INT',
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                ),
                'order_code' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '1000',
                    'null' => FALSE,
                ),
                'customer_code' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '1000',
                    'null' => FALSE,
                ),
                'restaurent_code' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '1000',
                    'null' => FALSE,
                ),
                'address_code' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '1000',
                    'null' => FALSE,
                ),
                'total' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                    'null' => TRUE,
                ),
                'status' => array(
                    'type' => 'INT',
                    'constraint' => '11',
                    'null' => TRUE,
                ),
                'payment_type' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                    'null' => TRUE,
                ),
                'description' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),               
                //------------For Audit Purposes -----------//
                'is_active' => array(
                        'type' => 'INT',
                        'constraint' => '11',
                        'null' => FALSE,
                ),
                //--------- entry_time or order_date or order_time -------//
                'entry_time' => array(
                        'type' => 'DATETIME',
                        'null' => FALSE,
                ),
                'entered_by' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '1000',
                        'null' => FALSE,
                ),
                'update_time' => array(
                        'type' => 'DATETIME',
                        'null' => TRUE,
                ),
                'updated_by' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '1000',
                        'null' => TRUE,
                ),

            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('orders');

            //---------order_detail - Table -----------//
                $this->dbforge->add_field(array(
                        'id' => array(
                            'type' => 'INT',
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                        ),
                        'order_code' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '1000',
                            'null' => FALSE,
                        ),
                        'item_code' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '1000',
                            'null' => FALSE,
                        ),
                        'quantity' => array(
                            'type' => 'int',
                            'constraint' => '11',
                            'null' => TRUE,
                        ),
                        'price' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100',
                            'null' => TRUE,
                        ),   
                        //------------For Audit Purposes -----------//
                        'is_active' => array(
                                'type' => 'INT',
                                'constraint' => '11',
                                'null' => FALSE,
                        ),
                        //--------- entry_time -------//
                        'entry_time' => array(
                                'type' => 'DATETIME',
                                'null' => FALSE,
                        ),
                        'entered_by' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '1000',
                                'null' => FALSE,
                        ),
                        'update_time' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE,
                        ),
                        'updated_by' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '1000',
                                'null' => TRUE,
                        ),
                    ));
                    $this->dbforge->add_key('id', TRUE);
                    $this->dbforge->create_table('order_detail');
        }

        public function down()
        {
                $this->dbforge->drop_table('customers');
                $this->dbforge->drop_table('user_session');
                $this->dbforge->drop_table('customer_address_mapping');
                $this->dbforge->drop_table('customer_address');
                $this->dbforge->drop_table('restaurent_user');
                $this->dbforge->drop_table('restaurent_details');
                $this->dbforge->drop_table('ruser_rdetails_mapping');
                $this->dbforge->drop_table('restaurent_menu');
                $this->dbforge->drop_table('orders');
                $this->dbforge->drop_table('order_detail');
        }
}