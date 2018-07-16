<?
$hoje_tmp = getdate();
$hoje = ($hoje_tmp[hours].":".$hoje_tmp[minutes].":".$hoje_tmp[seconds]);

$nome = $_POST["Nome"];
$email = $_POST["email"];
$fone = $_POST["fone"];
$assunto = $_POST["assunto"];
$mensagem = $_POST["mensagem"];
$celular = $_POST["celular"];
$empresa = $_POST["empresa"];
$cnpj = $_POST["cnpj"];
$cargo = $_POST["cargo"];
$achou = $_POST["achou"];
$produto = $_POST["produto"];


global $email;

// FAÇA ESTAS CONFIGURAÇÕES

$enviou = mail("portinexd@gmail.com", // COLOQUE SEU E-MAIL AQUI!
"Orçamento via site Nanothermic 1", // COLOQUE O ASSUNTO DO E-MAIL A SER RECEBIDO

// TERMINO DA CONFIGURAÇÃO

"
======================

Formulário de orçamento enviado pelo site do Nanothermic 1 - www.nanothermic1.com.br 
$hoje

CLASSIFICAÇÃO DE CLIENTE: [ ]A [ ]B [ ]C [ ]D [ ]E 


NOME: $nome
E-MAIL:  $email
FONE:  $fone
CELULAR:  $celular
EMPRESA:  $empresa
CNPJ / CPF:  $cnpj
CARGO NA EMPRESA:  $cargo
PRODUTO:  $produto
MENSAGEM:  $mensagem
ONDE NOS ACHOU:  $achou
 
 
======================"
,
"From: $email");

if ($enviou){
?> <script language="javascript"> alert ('<? echo "$nome, Enviado com Sucesso! Obrigado."; ?>') </script> <?
}

else {
?> <script language="javascript"> alert ('<? echo "$nome, Não enviado<br>Tente novamente."; ?>') </script> <?

}

// Enviando a mensagem para o destinatário
// Definindo os cabeçalhos do e-mail
$headers = "Content-type:text/html; charset=iso-8859-1";

// Envia um e-mail para o remetente, agradecendo a visita no site, e dizendo que em breve o e-mail será respondido.

$mensagem2 = "<p>Olá " . $nome . ". Obrigado por entrar em contato com a Nanotech do Brasil, seu orçamento foi encaminhado para o departamento responsável e será respondido o mais breve possível. </p>";
$mensagem2 .= "<p>Atenciosamente, <br>
Nanotech do Brasil - (11) 4432-0180<br>
www.nanotechdobrasil.com.br</p>"; 


$envia = mail("Seu pedido de orçamento do produto Nanothermic 1 foi enviado!",$mensagem2,$headers,
"From: sandro@nanotechdobrasil.com.br");

?><!--Não apagar este -->

