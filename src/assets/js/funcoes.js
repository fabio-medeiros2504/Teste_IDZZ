function valida_cpf(cpf) {
    var numeros, digitos, soma, i, resultado, digitos_iguais;
    digitos_iguais = 1;
    if (cpf.length < 11)
        return false;
    for (i = 0; i < cpf.length - 1; i++)
        if (cpf.charAt(i) != cpf.charAt(i + 1))
              {
              digitos_iguais = 0;
              break;
              }
    if (!digitos_iguais)
        {
        numeros = cpf.substring(0,9);
        digitos = cpf.substring(9);
        soma = 0;
        for (i = 10; i > 1; i--)
              soma += numeros.charAt(10 - i) * i;
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0))
              return false;
        numeros = cpf.substring(0,10);
        soma = 0;
        for (i = 11; i > 1; i--)
              soma += numeros.charAt(11 - i) * i;
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1))
              return false;
        return true;
        }
    else
        return false;
}

function salvaUsuario(insere){
    var texto = "";    
    
    if (insere == 0){
        texto = "Deseja inserir um novo Aluno?";
    } else {
        texto = "Deseja editar este Aluno?";
    }
    
    if (document.getElementById("nome").value == ""){
        swal("Informação em Falta!", "Informe o nome do aluno!", "error")
        return false;
    }
    
    if (document.getElementById("cpf").value == ""){
        swal("Informação em Falta!", "Informe o CPF do aluno!", "error")
        return false;
    }
    
    if (valida_cpf(document.getElementById("cpf").value.replace('.','').replace('.','').replace('-','')) == false){
        swal("Informação em Falta!", "CPF Inválido!", "error")
        return false;
    }
    
    if (document.getElementById("id_idioma").value == "selected"){
        swal("Informação em Falta", "Informe o idioma do Aluno!", "error")
        return false;
    }
    
    if (document.getElementById("id_status").value == "selected"){
        swal("Informação em Falta", "Informe o Status do Aluno!", "error")
        return false;
    }
    
    if (document.getElementById("id_estado").value == "selected"){
        swal("Informação em Falta", "Informe o Estado!", "error")
        return false;
    }
    
    if (document.getElementById("telefone").value == ""){
        swal("Informação em Falta!", "Informe o telefone do aluno!", "error")
        return false;
    }
    
    swal({
      title: "Confirmar",
      text: texto,
      type: "info",
      showCancelButton: true,
      confirmButtonText: "Sim",
      cancelButtonText: "Não",
      closeOnConfirm: false
    },
    function(){      
      document.getElementById("form_alunos").submit();     
    });
}