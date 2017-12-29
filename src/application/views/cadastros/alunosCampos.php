<?php    
    $tipo = $retorno['tipo'];
    
    if ($tipo == 0) {
        $funcao = "salvaAluno/".$tipo;
    } else {
        $funcao = "salvaAluno/".$retorno['id'];
    }
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastro de Alunos</h2>
        <ol class="breadcrumb">
            <li>
                <a>Cadastros</a>
            </li>
            <li>
                <a>Alunos</a>
            </li>
            <li class="active">
                <?php 
                if ($tipo == 0) {
                ?>
                    <strong>Novo Aluno</strong>
                <?php
                } else {
                ?>
                    <strong>Editar Aluno</strong>
                <?php
                }
                ?>
            </li>
        </ol>
    </div>
</div>
<br>
<?php
    $attributes = array('id' => 'form_alunos');
    echo form_open($funcao, $attributes);
?>
<input type="hidden" name="id_cobranca" value="<?=$retorno['id_cobranca']?>">
<input type="hidden" name="id_dados" value="<?=$retorno['id_dados']?>">
<div class="row">
  <div class="col-lg-12">
    <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5>Dados Pessoais</h5>
        <div class="ibox-tools">
          <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
          </a>
        </div>
      </div>            
      <div class="ibox-content">
        <div class="ibox float-e-margins">
          <div class="row">
            <div class="col-lg-8">
              <?php        
              echo form_label("Nome do Usuário", "lblUsuario");
              echo form_input(array(
                "name" => "nome",
                "id" => "nome",
                "class" => "form-control",
                "maxlength" => "100",
                "type" => "text",
                "value" => $retorno['nome']
              ));        
              echo form_error("nome_usuario"); 
              ?>
            </div>
            <div class="col-lg-2">
              <?php        
              echo form_label("Data de Nascimento", "lblDataNasc");
              echo form_input(array(
                "name" => "data_nascimento",
                "id" => "data_nascimento",
                "class" => "form-control",
                "maxlength" => "100",
                "type" => "text",
                "value" => $retorno['data_nascimento']
              ));        
              echo form_error("data_nascimento"); 
              ?>
            </div>
            <div class="col-lg-2">
              <?php        
              echo form_label("CPF", "lblCPF");
              echo form_input(array(
                "name" => "cpf",
                "id" => "cpf",
                "class" => "form-control",
                "maxlength" => "100",
                "type" => "text",
                "value" => $retorno['cpf']
              ));        
              echo form_error("cpf"); 
              ?>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-lg-4">
              <?php 				
              echo form_label("Idioma", "lblIdioma");
              ?>
              <select id="id_idioma" name="id_idioma" class="form-control">        
                <option value=<?= $retorno['id_idioma'] ?> selected><?= $retorno['nome_idioma'] ?>
                <?php foreach ($idiomas as $idioma) { ?>
                <option value="<?= $idioma['id_idioma']?>">
                <?= $idioma['nome_idioma']?>
                </option>	  			
                <?php } ?>
              </select>
              <?= form_error("id_idioma");  ?>
            </div>
            <div class="col-lg-4">
              <?php 				
              echo form_label("Status", "lblStatus");
              ?>
              <select id="id_status" name="id_status" class="form-control">        
                <option value=<?= $retorno['id_status'] ?> selected><?= $retorno['nome_status'] ?>
                <?php foreach ($status as $sta) { ?>
                <option value="<?= $sta['id_status']?>">
                <?= $sta['nome_status']?>
                </option>	  			
                <?php } ?>
              </select>
              <?= form_error("id_estado");  ?>
            </div>
          </div>
          <br>          
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5>Dados de Cobrança</h5>
        <div class="ibox-tools">
          <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
          </a>
        </div>
      </div>            
      <div class="ibox-content">
        <div class="ibox float-e-margins">
          <div class="row">
            <div class="col-lg-6">
              <?php        
              echo form_label("Logradouro", "lblendereco");
              echo form_input(array(
                "name" => "logradouro",
                "id" => "logradouro",
                "class" => "form-control",
                "maxlength" => "100",
                "type" => "text",
                "value" => $retorno['logradouro']
              ));        
              echo form_error("logradouro"); 
              ?>
            </div>
            <div class="col-lg-2">
              <?php        
              echo form_label("Número", "lblNumero");
              echo form_input(array(
                "name" => "numero",
                "id" => "numero",
                "class" => "form-control",
                "maxlength" => "100",
                "type" => "text",
                "value" => $retorno['numero']
              ));        
              echo form_error("numero"); 
              ?>
            </div>
            <div class="col-lg-4">
              <?php        
              echo form_label("Bairro", "lblBairro");
              echo form_input(array(
                "name" => "bairro",
                "id" => "bairro",
                "class" => "form-control",
                "maxlength" => "100",
                "type" => "text",
                "value" => $retorno['bairro']
              ));        
              echo form_error("bairro"); 
              ?>
            </div>
          </div>
          <br>
          <div class="row">            
            <div class="col-lg-4">
              <?php        
              echo form_label("Cidade", "lblCidade");
              echo form_input(array(
                "name" => "cidade",
                "id" => "cidade",
                "class" => "form-control",
                "maxlength" => "100",
                "type" => "text",
                "value" => $retorno['cidade']
              ));        
              echo form_error("cidade"); 
              ?>
            </div>
            <div class="col-lg-2">
              <?php        
              echo form_label("CEP", "lblcep");
              echo form_input(array(
                "name" => "cep",
                "id" => "cep",
                "class" => "form-control",
                "maxlength" => "10",
                "type" => "text",
                "value" => $retorno['cep']
              ));        
              echo form_error("cep"); 
              ?>
            </div>
            <div class="col-lg-4">
              <?php 				
              echo form_label("Estado", "lblEstado");
              ?>
              <select id="id_estado" name="id_estado" class="form-control">        
                <option value=<?= $retorno['id_estado'] ?> selected><?= $retorno['nome_estado'] ?>
                <?php foreach ($estados as $estado) { ?>
                <option value="<?= $estado['id_estado']?>">
                <?= $estado['nome_estado']?>
                </option>	  			
                <?php } ?>
              </select>
              <?= form_error("id_estado");  ?>
            </div>
            <div class="col-lg-2">
              <?php        
              echo form_label("Telefone", "lblTelefone");
              echo form_input(array(
                "name" => "telefone",
                "id" => "telefone",
                "class" => "form-control",
                "maxlength" => "100",
                "type" => "text",
                "value" => $retorno['telefone']
              ));        
              echo form_error("telefone"); 
              ?>
            </div>
        </div>
    </div>
  </div>
</div>
<br><br><br>
<div class="row">    
  <div class="col-lg-12">
    <div class="col-lg-9"></div>
    <div class="col-lg-3">
      <div class="ibox float-e-margins">
        <div class="form-group">
          <?= anchor('Cadastros', '<i class="fa fa-arrow-left"></i> Voltar', array('class' => 'btn btn-danger')) ?>
          <a class="btn btn-primary" role="button" onClick="return salvaUsuario(<?= $tipo ?>);">
              <i class="fa fa-check"></i> Salvar</a>   
          </a>    
        </div>
      </div>
    </div>
  </div>
</div>
<?php 
    echo form_close();
?>