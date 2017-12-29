<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastro de Alunos</h2>        
    </div>
    <div class="col-lg-2">
        <?= anchor('cadastraAluno', '<i class="fa fa-share fa-lg"></i> Novo Aluno', array('class' => 'posBotaoNovo btn btn-info')) ?>
    </div>    
</div>
<br>
<?php if($this->session->flashdata("aluno_sucesso")){ ?>
<script>swal("Sucesso!", "<?= $this->session->flashdata("aluno_sucesso") ?>", "success")</script>   
<?php } ?>
<table id="table" class="table table-striped table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th width="10%">Código</th>
            <th width="40%">Nome do Aluno</th>
            <th width="10%">CPF</th>
            <th width="10%">idioma</th>
            <th width="5%">Status</th>
            <th width="25%"></th>
        </tr>
    </thead>    
    <tbody>
        <?php foreach ($alunos as $aluno) { ?>        
        <tr>
            <td><?= $aluno['id'] ?></td>
            <td><?= $aluno['nome'] ?></td>
            <td><?= $aluno['cpf'] ?></td>
            <td><?= $aluno['nome_idioma'] ?></td>
            <td><?= $aluno['nome_status'] ?></td>
            <td>
                <a class="btn btn-primary" href="alteraAluno/<?= $aluno['id'] ?>">
                <i class="fa fa-pencil-square-o fa-lg"></i> Editar</a>
                <a class="btn btn-danger" href="removeAluno/<?= $aluno['id'] ?>">
                <i class="fa fa-pencil-square-o fa-lg"></i> Remover</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>