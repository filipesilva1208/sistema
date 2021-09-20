<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_insert_data extends CI_Migration {

    public function up()
    {
       
        $this->db->query(
            "INSERT INTO users
            (name, email, cpf, password, telephone, nivel, status, active, sponsor, account_ip, created_at, updated_at, activate_at)
            VALUES('admin', 'admin@email.com', '', '202cb962ac59075b964b07152d234b70', '', 1, 1, 1, 1, '0', now(), now(), now());

            ");

        
    }

    public function down()
    {
        // ...
    }

}