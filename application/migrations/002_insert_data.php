<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_insert_data extends CI_Migration {

    public function up()
    {
        $users_padrao = 100;

        for($i=0; $i < $users_padrao; $i++){
            $this->db->query(
                "INSERT INTO users
                (name, email, cpf, password, telephone, nivel, blocked, active, sponsor,profile, account_ip, created_at, updated_at, activate_at)
                VALUES('user{$i}', 'user{$i}@email.com', '', '202cb962ac59075b964b07152d234b70', '', 1, 0, 1, 1,'', '0', now(), now(), now());

                ");
        }
       

        
    }

    public function down()
    {
        // ...
    }

}