<?php    
    if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Cadastros_model extends CI_Model{        
        function retorna_alunos($id_aluno = 0){
            if ($id_aluno > 0){
                $this->db->where("id", $id_aluno);
                $alunos = $this->db->get("vw_alunos")->row_array();
                if (count($alunos) > 0){$alunos['tipo'] = $id_aluno;}                
            } else {                         
                $alunos = $this->db->get("vw_alunos")->result_array();                    
            }                
            return $alunos;
        }
        
        function retorna_alunos_id($id_aluno = 0){
            $this->db->where("id", $id_aluno);
            $alunos = $this->db->get("vw_alunos")->row_array();
            return $alunos;
        }
        
        function retorna_alunos_cpf($cpf){
            $this->db->where("cpf", $cpf);
            $alunos = $this->db->get("vw_alunos")->row_array();
            return $alunos;
        }
        
        function inicia_array_aluno(){
            $aluno = array(
                "id_usuario" => "",
                "nome" => "", 
                "cidade" => "",
                "id_estado" => "",
                "nome_estado" => "",
                "cep" => "",
                "data_nascimento" => "",
                "bairro" => "",
                "numero" => 0,
                "logradouro" => "",
                "cpf" => "",
                "telefone" => "",
                "id_status" => "",
                "nome_status" => "",
                "id_idioma" => "", 
                "nome_idioma" => "",
                "tipo" => "0",
                "id_dados" => "",
                "id_cobranca" => ""
            );
            return $aluno;
        }
        
        function retorna_status($id_status = 0){
            if ($id_status > 0){
                $this->db->where("id_status", $id_status);                    
                $status = $this->db->get("status")->row_array();
            } else {
                $status = $this->db->get("status")->result_array();                
            }
            return $status;
        }        
       
        function retorna_estados(){
            $this->db->order_by("nome_estado");
            $estados = $this->db->get("estado")->result_array();                
            return $estados;
        }
        
        function retorna_idiomas(){
            $this->db->order_by("nome_idioma");
            $estados = $this->db->get("idioma")->result_array();                
            return $estados;
        }
        
        function salvar_aluno($id_aluno){
            $id_estado = $this->input->post("id_estado");
            $nome = $this->input->post("nome");
            $cidade = $this->input->post("cidade");
            $numero = $this->input->post("numero");
            $bairro = $this->input->post("bairro");
            $telefone = $this->input->post("telefone");
            $logradouro = $this->input->post("logradouro");
            $cpf = $this->input->post("cpf");    
            $id_status = $this->input->post("id_status");
            $cep = $this->input->post("cep");
            $data_nascimento = $this->input->post("data_nascimento");
            $id_idioma = $this->input->post("id_idioma");
            $id_cobranca = $this->input->post("id_cobranca");
            $id_dados = $this->input->post("id_dados");
            
            $dados_pessoais = array(
                "nome" => $nome,
                "data_nascimento" => $data_nascimento,
                "cpf" => $cpf
            );
            
            $dados_cobranca = array(
                "numero" => $numero,
                "bairro" => $bairro,
                "id_estado" => $id_estado,
                "cidade" => $cidade,
                "logradouro" => $logradouro,
                "telefone" => $telefone,
                "cep" => $cep
            );
            
            $this->db->trans_start();
            
            if ($id_aluno == 0){
                $this->db->insert("cobranca", $dados_cobranca);
                $id_dados_cobranca = $this->db->insert_id();
                $this->db->insert("dados_pessoais", $dados_pessoais);
                $id_dados_pessoais = $this->db->insert_id();
                
                $aluno = array(
                    "id_dados_pessoais" => $id_dados_pessoais,
                    "id_dados_cobranca" => $id_dados_cobranca,
                    "id_idioma" => $id_idioma,
                    "id_status" => $id_status
                );
                
                $this->db->insert("alunos", $aluno);
            }else{
                $aluno = array(
                    "id_idioma" => $id_idioma,
                    "id_status" => $id_status
                );
                
                $this->db->where('id_cobranca', $id_cobranca);
                $this->db->update("cobranca", $dados_cobranca);
                $this->db->where('id_dados', $id_dados);
                $this->db->update("dados_pessoais", $dados_pessoais); 
                $this->db->where('id_aluno', $id_aluno);
                $this->db->update("alunos", $aluno); 
            }
            
            $this->db->trans_complete();
            /*if ($idUsuario == 0){               
                $this->cadastros_model->salvarUsuario($usuario);
                $this->session->set_flashdata("usuario_sucesso" ,"Usuário inserido com sucesso!");
            } else {
                $this->cadastros_model->alterarUsuario($usuario, $idUsuario);
                $this->session->set_flashdata("usuario_sucesso" ,"Usuário alterado com sucesso!");
            }*/
        }
        
        function remover_aluno($id_aluno){
            $aluno = $this->retorna_alunos($id_aluno);
            $this->db->trans_start();            
            $this->db->where('id_aluno', $id_aluno);
            $this->db->delete('alunos');
            $this->db->where('id_cobranca', $aluno['id_cobranca']);
            $this->db->delete('cobranca');
            $this->db->where('id_dados', $aluno['id_dados']);
            $this->db->delete('dados_pessoais');
            $this->db->trans_complete();
        }
    }