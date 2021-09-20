<?php

class Migration extends CI_Controller
{

        // public function index()
        // {
        //     //verificar se usuario tem permissão para realizar a migration
        //     $this->load->library('migration');

        //     if ($this->migration->current() === FALSE)
        //     {
        //         show_error($this->migration->error_string());
        //     }else{
        //         echo "Migração realizada com sucesso!";
        //     }
        // }
        public function version($id = NULL)
        {    
            $id_admin = 1;
            if($id_admin != 1){
                echo 'page not found';
                die();
            }else{

                if(is_null($id)) die("<p>Informe o n&uacute;mero da vers&atilde;o.</p>");
                
                $ret = $this->exec_func('version', $id);
                echo $ret;
            }
        }
        private function exec_func($func, $id = NULL)
        {
            $this->load->library('migration');
    
            if ( ! $this->migration->{$func}($id) )
            {
                return $this->migration->error_string();
            }
    
            return "<p>Migra&ccedil;&atilde;o {$id} bem sucedida!</p>";
        }
    
    

}