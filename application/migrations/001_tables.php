<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_tables extends CI_Migration {

    public function up()
    {
        #Create 1 Table users
            /*
                Tabela responsável por registrar todos os usuários
            */
            $this->dbforge->add_field("`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY");
            $this->dbforge->add_field("`name` varchar(100) NOT NULL ");
            $this->dbforge->add_field("`email` varchar(100) NOT NULL ");
            $this->dbforge->add_field("`cpf` varchar(50) NOT NULL ");
            $this->dbforge->add_field("`password` varchar(100) NOT NULL ");
            $this->dbforge->add_field("`telephone` varchar(20) NOT NULL ");
            $this->dbforge->add_field("`nivel` int(2) NOT NULL DEFAULT '0'");
            $this->dbforge->add_field("`status` int(2) NOT NULL DEFAULT '0'");
            $this->dbforge->add_field("`active` int(2) NOT NULL DEFAULT '0'");
            $this->dbforge->add_field("`sponsor` int(11) NOT NULL DEFAULT '0'");
            $this->dbforge->add_field("`account_ip` VARCHAR(20) NOT NULL DEFAULT '0'");
            $this->dbforge->add_field("`created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'");
            $this->dbforge->add_field("`updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'");
            $this->dbforge->add_field("`activate_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'");

            $this->dbforge->create_table('users', TRUE);
        #table users

        #table 2 users_wallets
            /*
                Tabela responsável por gerenciar os valores dos usuários
            */
            $this->dbforge->add_field("`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY");
            $this->dbforge->add_field("`id_user` int(11) NOT NULL ");
            $this->dbforge->add_field("`balance_a` DECIMAL(15,2) NOT NULL DEFAULT '0'");    //saldo disponivel
            $this->dbforge->add_field("`balance_b` DECIMAL(15,2) NOT NULL DEFAULT '0'");    //saldo bloqueado
            $this->dbforge->add_field("`balance_w` DECIMAL(15,2) NOT NULL DEFAULT '0'");    //saldo retirado
            $this->dbforge->add_field("`balance_u` DECIMAL(15,2) NOT NULL DEFAULT '0'");    //saldo total usado
            $this->dbforge->add_field("`commission_a` DECIMAL(15,2) NOT NULL DEFAULT '0'"); //comissão disponivel
            $this->dbforge->add_field("`commission_b` DECIMAL(15,2) NOT NULL DEFAULT '0'"); //comissão bloqueada
            $this->dbforge->add_field("`commission_w` DECIMAL(15,2) NOT NULL DEFAULT '0'"); //comissão retirada
            $this->dbforge->add_field("`created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'");
            $this->dbforge->add_field("`updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'");
            $this->dbforge->create_table('users_wallets', TRUE);           
        #table users_wallets

        #table 3 users_banks
            /*
                Tabela responsável por registrar os bancos dos usuarios
            */
            $this->dbforge->add_field("`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY");
            $this->dbforge->add_field("`id_user` int(11) NOT NULL ");
            $this->dbforge->add_field("`bank_name` varchar(50) NOT NULL ");
            $this->dbforge->add_field("`account_type` varchar(50) NULL ");
            $this->dbforge->add_field("`account` varchar(50) NULL ");
            $this->dbforge->add_field("`bank_agency` varchar(50) NULL ");
            $this->dbforge->add_field("`active` int(11) NOT NULL DEFAULT '0'");
            $this->dbforge->add_field("`created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'");
            $this->dbforge->add_field("`updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'");

            $this->dbforge->create_table('users_banks',TRUE);
        #table users_banks

        #table 4 users_deposits
            /*
                Tabela responsável por armazenar os depositos
            */
            $this->dbforge->add_field("`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY");
            $this->dbforge->add_field("`id_user` int(11) NOT NULL");
            $this->dbforge->add_field("`value` DECIMAL(15,2) NOT NULL");
            $this->dbforge->add_field("`receipt` varchar(100) NOT NULL DEFAULT '0'");
            $this->dbforge->add_field("`method` varchar(50) NOT NULL DEFAULT '0'");
            $this->dbforge->add_field("`status` int(11) NOT NULL DEFAULT '0'");
            $this->dbforge->add_field("`created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'");
            $this->dbforge->add_field("`updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'");

            $this->dbforge->create_table('users_deposits',TRUE);
        #table users_deposits

        #table 5 users_withdrawals
            /*
                Tabela responsável por registrar as retiradas do usuário
            */
            $this->dbforge->add_field("`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY");
            $this->dbforge->add_field("`id_user` int(11) NOT NULL");
            $this->dbforge->add_field("`value` DECIMAL(15,2) NOT NULL");
            $this->dbforge->add_field("`referent` varchar(50) NOT NULL ");
            $this->dbforge->add_field("`status` int(11) NOT NULL DEFAULT '0'");
            $this->dbforge->add_field("`created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'");
            $this->dbforge->add_field("`updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'");

            $this->dbforge->create_table('users_withdrawals',TRUE);
        #table users_withdrawals

        #table 6 users_plans
            /*
                Tabela responsável por armazenar e genrenciar os planos, produtos aderidos pelo cliente
            */
            $this->dbforge->add_field("`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY");
            $this->dbforge->add_field("`id_user` int(11) NOT NULL DEFAULT '0'");
            $this->dbforge->add_field("`id_product` int(11) NOT NULL DEFAULT '0'");
            $this->dbforge->add_field("`value` DECIMAL(15,2) NOT NULL DEFAULT '0' ");
            $this->dbforge->add_field("`percent` DECIMAL(15,2) NOT NULL DEFAULT '0'");
            $this->dbforge->add_field("`status` int(2) NOT NULL DEFAULT '0'");
            $this->dbforge->add_field("`active` int(2) NOT NULL DEFAULT '0'");
            $this->dbforge->add_field("`created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'");
            $this->dbforge->add_field("`updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'");
            $this->dbforge->add_field("`due_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'");

            $this->dbforge->create_table('users_plans',TRUE);
        #table users_plans

        #table 7 users_profits
            /*
                Tabela responsável por registrar os rendimentos
                de planos ativos dos usuarios
            */
            $this->dbforge->add_field("`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY");
            $this->dbforge->add_field("`id_user` VARCHAR(50) NOT NULL ");
            $this->dbforge->add_field("`value` DECIMAL(15,2) NOT NULL DEFAULT '0' ");
            $this->dbforge->add_field("`percent` DECIMAL(15,2) NOT NULL ");
            $this->dbforge->add_field("`created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'");

            $this->dbforge->create_table('users_profits',TRUE);
        #table users_profits

        #table 8 users_networks
            /*
                Tabela responsável por registrar quantidade de convidados na rede
                logica: soma somente indicados diretos, e um script soma dinamicamente
                de acordo com a quantidade de nives o total de convidados por nivel
            */
            $this->dbforge->add_field("`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY");
            $this->dbforge->add_field("`id_user` int(11) NOT NULL  ");
            $this->dbforge->add_field("`references` int(11) NOT NULL DEFAULT '0' ");
            $this->dbforge->add_field("`created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'");
            $this->dbforge->add_field("`updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'");

            $this->dbforge->create_table('users_networks',TRUE);
        #table users_networks


        #table 9 sys_settings
            /*
                Tabela responsável por configurações padrões do site
            */
            $this->dbforge->add_field("`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY");
            $this->dbforge->add_field("`site_name` varchar(50) NOT NULL DEFAULT 'site'");
            $this->dbforge->add_field("`logo` varchar(100) NULL");
            $this->dbforge->add_field("`bg_login` varchar(100) NULL");
            $this->dbforge->add_field("`bg_register` varchar(100) NULL");
            $this->dbforge->add_field("`bg_recover_pass` varchar(100) NULL");
            $this->dbforge->add_field("`status` varchar(100) NOT NULL DEFAULT '1'");
            $this->dbforge->add_field("`created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'");
            $this->dbforge->add_field("`updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'");

            $this->dbforge->create_table('sys_settings',TRUE);
            
        #table sys_settings

        #table 10 sys_unilever
            /*
                Tabela responsável por registrar os níves e % de unilevel
            */
            $this->dbforge->add_field("`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY");
            $this->dbforge->add_field("`level` int(11) NOT NULL DEFAULT '0'");
            $this->dbforge->add_field("`percent` DECIMAL(10,2) NOT NULL DEFAULT '0'");
            $this->dbforge->add_field("`status` int(11) NOT NULL DEFAULT '0'");
            $this->dbforge->add_field("`created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'");
            $this->dbforge->add_field("`updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'");

            $this->dbforge->create_table('sys_unilever',TRUE);
        #table sys_unilever

        #table 11 sys_rules
            /*
                Tabela responsável por registrar as regras gerais do sistema
            */
            $this->dbforge->add_field("`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY");    
            $this->dbforge->add_field("`days_profit_interval` INT(11) NOT NULL DEFAULT '1' ");        // Intervalo em dias para lucros
            $this->dbforge->add_field("`min_withdrawn` DECIMAL(15,2) NOT NULL DEFAULT '0' ");         // Mínimo saque
            $this->dbforge->add_field("`max_withdrawn` DECIMAL(15,2) NOT NULL DEFAULT '0' ");         // Máximo para saque
            $this->dbforge->add_field("`min_deposits` DECIMAL(15,2) NOT NULL DEFAULT '0' ");          // Mínimo para depósito
            $this->dbforge->add_field("`max_deposits` DECIMAL(15,2) NOT NULL DEFAULT '0' ");          // Máximo para depósito
            $this->dbforge->add_field("`day_withdrawn` VARCHAR(20) NOT NULL DEFAULT '0' ");           // Dia para saque (9 = todos os dias) (8 = segunda a sexta ) (1=dom 2=seg | 3=ter | 4=qua | 5=qui | 6=sex | 7=sab) 
            $this->dbforge->add_field("`start_time_withdrawn` VARCHAR(20) NOT NULL DEFAULT '0' ");    // Horário para saque ex 09:00
            $this->dbforge->add_field("`end_time_withdrawn` VARCHAR(20) NOT NULL DEFAULT '0' ");      // Horário para saque ex 18:00
            $this->dbforge->add_field("`commission` int(2) NOT NULL DEFAULT '1'");                    // se for = 1 é necessário estar ativo pra ganhar bonus de rede
            $this->dbforge->add_field("`account_ip` int(2) NOT NULL DEFAULT '0'");                    // Se for = 1 será permitido uma conta por IP
            $this->dbforge->add_field("`created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'");
            $this->dbforge->add_field("`updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'");

            $this->dbforge->create_table('sys_rules',TRUE);
        #table sys_rules

        #table 12 sys_products
            /*
                Tabela responsável por armazenar os planos, produtos, pacotes
            */
            $this->dbforge->add_field("`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY");
            $this->dbforge->add_field("`name` VARCHAR(50) NOT NULL ");
            $this->dbforge->add_field("`value` DECIMAL(15,2) NOT NULL DEFAULT '0' ");
            $this->dbforge->add_field("`percent` DECIMAL(15,2) NOT NULL ");
            $this->dbforge->add_field("`limit_days` INT(11) NOT NULL DEFAULT '0' ");
            $this->dbforge->add_field("`image` VARCHAR(100) NOT NULL DEFAULT '0' ");
            $this->dbforge->add_field("`status` int(11) NOT NULL DEFAULT '0'");
            $this->dbforge->add_field("`created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'");
            $this->dbforge->add_field("`updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'");

            $this->dbforge->create_table('sys_products',TRUE);
        #table sys_products

        #table 13 sys_log_comission
            /*
                Tabela responsável por armazenar as comissões de todos os usuários
            */
            $this->dbforge->add_field("`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY");
            $this->dbforge->add_field("`id_user` INT(11) NOT NULL ");
            $this->dbforge->add_field("`value` DECIMAL(15,2) NOT NULL DEFAULT '0' ");
            $this->dbforge->add_field("`percent` DECIMAL(15,2) NOT NULL ");
            $this->dbforge->add_field("`refetent` DECIMAL(15,2) NOT NULL ");
            $this->dbforge->add_field("`created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'");

            $this->dbforge->create_table('sys_log_comission',TRUE);
        #table sys_log_comission

        
    }

    public function down()
    {
        # tables relacionado ao usuario
        $this->dbforge->drop_table('users');
        $this->dbforge->drop_table('users_wallets');
        $this->dbforge->drop_table('users_banks');
        $this->dbforge->drop_table('users_deposits');
        $this->dbforge->drop_table('users_withdrawals');
        $this->dbforge->drop_table('users_plans');
        $this->dbforge->drop_table('users_profits');
        $this->dbforge->drop_table('users_networks');

        # tables relacionado ao sistema
        $this->dbforge->drop_table('sys_settings');
        $this->dbforge->drop_table('sys_unilever');
        $this->dbforge->drop_table('sys_rules');
        $this->dbforge->drop_table('sys_products');
        $this->dbforge->drop_table('sys_log_comission');
    }

}