<?php 
    if (!defined('BASEPATH')) exit('No direct script access allowed');

    class MY_Loader extends CI_Loader 
    {
        public function my_view($nome, $dados = array()) 
        {
            $this->view("cabecalho.php");
            $this->view($nome, $dados);
            $this->view("rodape.php");
        }
        
        public function my_cover_view($nome, $dados = array()) 
        {
            $this->view("cabecalho_inicial.php");
            $this->view($nome, $dados);
            $this->view("rodape_inicial.php");
        }
    }
?>