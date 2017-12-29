function lercookie() {
cookie = document.cookie.substring(document.cookie.indexOf(""),document.cookie.indexOf("end"));
if (cookie=="") document.membros.login.value="";
else document.membros.login.value=""+cookie+"";
}

function lockaccess() {
L = document.membros.login.value;
S = document.membros.senha.value;
if (L=="" || S=="") document.membros.acesso.disabled=true, document.membros.lembrar.disabled=true;
else document.membros.acesso.disabled=false, document.membros.lembrar.disabled=false;
}

function logar() {
if (L.length < 3) alert("O nome de usuário precisa ter pelo menos 3 caracteres!");
else if (S.length < 3) alert("A senha do usuário precisa ter pelo menos 3 caracteres!");
else {



//CRIE UMA PÁGINA CHAMADA "areavip.htm", QUE DEVERÁ SER A PÁGINA QUE SÓ OS USUÁRIOS VIP TÊM ACESSO//

if (L=="jesse" && S=="123456") abrir();
else if (L=="usuario2" && S=="senha2") abrir();
else if (L=="usuario3" && S=="senha3") abrir();
else if (L=="usuario4" && S=="senha4") abrir();
else if (L=="usuario5" && S=="senha5") abrir();






else alert("DADOS INVÁLIDOS OU INCORRETOS!\n\n\Verifique se seu nome de usuário é "+L+" e se sua senha possui "+S.length+" caracteres.\n\Talvez algum caractere esteja faltado ou sobrando.\n\n\Verifique se a luz do 'Caps Lock' está acesa no teclado.\n\Se estiver, pressione 'Caps Lock' e tente novamente.");
}
}


function abrir() {
window.open("https://www.impacttorecarga.com.br/acesso-recarga/","_self",
            "menubar=no,toolbar=no,location=no,directories=no,scrollbars=yes,status=no,resizable=yes"); escrever();
}

function escrever() {
Agora = new Date();
Agora.setTime(Agora.getTime()+(365*24*60*60*1000));
if (document.membros.lembrar.checked == true) {
document.cookie=""+document.membros.login.value+"end"+Agora+"; expires="+Agora.toGMTString();+"";
}

else {
document.cookie="end"+Agora+"; expires="+Agora.toGMTString();+"";
}
}