<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Cadastros extends CI_Controller{
        function index(){
            $this->load->model('cadastros_model');
            $alunos = array("alunos" => $this->cadastros_model->retorna_alunos());
            $this->load->my_view('cadastros/alunos', $alunos);
        }
        
        function alunos_campos(){
            $this->load->model('cadastros_model');
            $retorno = $this->cadastros_model->inicia_array_aluno();
            $estados = $this->cadastros_model->retorna_estados();
            $status = $this->cadastros_model->retorna_status();
            $idioma = $this->cadastros_model->retorna_idiomas();
            $retorno_aux = array("retorno" => $retorno, "estados" => $estados, "status" => $status, "idiomas" => $idioma); 
            $this->load->my_view('cadastros/alunosCampos', $retorno_aux);
        }
        
        function altera_aluno($id_aluno){
            $this->load->model('cadastros_model');
            $retorno = $this->cadastros_model->retorna_alunos($id_aluno);
            $estados = $this->cadastros_model->retorna_estados();
            $status = $this->cadastros_model->retorna_status();
            $idioma = $this->cadastros_model->retorna_idiomas();
            $retorno_aux = array("retorno" => $retorno, "estados" => $estados, "status" => $status, "idiomas" => $idioma); 
            $this->load->my_view('cadastros/alunosCampos', $retorno_aux);
        }
        
        function gravar_aluno($id_aluno){
            $this->load->model('cadastros_model');
            $estados = $this->cadastros_model->salvar_aluno($id_aluno);
            redirect('Cadastros');
        }
        
        function remove_aluno($id_aluno){
            $this->load->model('cadastros_model');
            $retorno = $this->cadastros_model->remover_aluno($id_aluno);
            redirect('Cadastros');
        }
        
        function lista_usuarios_ativos(){
            $this->load->model('cadastros_model');
            $alunos = array("alunos" => $this->cadastros_model->retorna_alunos());
            echo json_encode($alunos);
        }
        
        function lista_usuarios_id(){
            $id = $this->input->post('codigo_aluno');
            $this->load->model('cadastros_model');
            $alunos = array("alunos" => $this->cadastros_model->retorna_alunos_id($id));
            echo json_encode($alunos);
        }
        
        function lista_usuarios_cpf(){
            $cpf = $this->input->post('cpf_aluno');
            $this->load->model('cadastros_model');
            $alunos = array("alunos" => $this->cadastros_model->retorna_alunos_cpf($cpf));
            echo json_encode($alunos);
        }
       
    }        
    
?>