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

        }

        public function down()
        {
                $this->dbforge->drop_table('customers');
        }
}