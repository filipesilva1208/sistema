<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro_cliente extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->model('Cadastro_cliente');

    }

    public function salvar()
    	{
            date_default_timezone_set('America/Bahia');

            $login = $this->input->post('login');
            $row = $this->db->where('login =',$login)->count_all_results('clientes');
            
            //verifica se existe um usuário com mesmo nome
            if($row > 0){
                return false;
            }else{  

            $data['nome_cliente'] = $this->input->post('nome');
            $data['email'] = $this->input->post('email');
            $data['telefone_cliente'] = $this->input->post('telefone');
            $data['rua'] = $this->input->post('rua');
            $data['numero_rua'] = $this->input->post('numero');
            $data['cep_rua'] = $this->input->post('cep');
            $data['bairro'] = $this->input->post('bairro');
            $data['complemento'] = $this->input->post('complemento');
            $data['ponto_referencia'] = $this->input->post('ponto_referencia');
            $data['login'] = $this->input->post('login');
            $data['senha'] = md5($this->input->post('senha'));
            $data['nivel'] = 'user';
            $data['data_cadastro'] = date('Y-m-d H:i:s');
    
            return $this->db->insert('clientes', $data);
       
        }
        }
}