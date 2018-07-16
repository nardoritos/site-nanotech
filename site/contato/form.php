<?php
@session_start();
header('Content-Type: text/html; charset=UTF-8');
echo "<html><head><meta charset='utf-8'></head></html>";
$form = @$_GET["form"];
if ($form=='s'){
$nome = $_POST["Nome"];
$email = $_POST["email"];
$fone = $_POST["fone"];
$mensagem = $_POST["mensagem"];
$celular = $_POST["celular"];
$empresa = $_POST["empresa"];
$cnpj = $_POST["cnpj"];
$cargo = $_POST["cargo"];
$achou = $_POST["achou"];
$produto = $_POST["produto"];

// Inclui o arquivo class.phpmailer.php localizado na pasta class
require_once("class/class.phpmailer.php");
 
// Inicia a classe PHPMailer
$mail = new PHPMailer(true);
 
// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP
 
try {
     $mail->Host = 'email-ssl.com.br'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
     $mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
     $mail->Port       = 587; //  Usar 587 porta SMTP
     $mail->Username = 'marketing@nanotechdobrasil.com.br'; // Usuário do servidor SMTP (endereço de email)
     $mail->Password = 'loc@1020'; // Senha do servidor SMTP (senha do email usado)
     $mail->CharSet = 'UTF-8';
     //Define o remetente
     // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
     $mail->SetFrom('marketing@nanotechdobrasil.com.br', 'Nanothermic 1'); //Seu e-mail
     $mail->AddReplyTo('marketing@nanotechdobrasil.com.br', 'Nanothermic 1'); //Seu e-mail
     $mail->Subject = 'Orçamento via site Nanothermic 1 [AUTOMÁTICO]';//Assunto do e-mail
 
 
     //Define os destinatário(s)
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     $mail->AddAddress("comercial@nanotechdobrasil.com.br", "vendas1@nanotechdobrasil.com.br");
 
     //Campos abaixo são opcionais 
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
     //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
     //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo
 
 
     //Define o corpo do email
     $corpo=
     "
<p>======================<br><br>

Formulário de orçamento enviado pelo site do Nanothermic 1 - www.nanothermic1.com.br</p> <br><br>

CLASSIFICAÇÃO DE CLIENTE: [ ]A [ ]B [ ]C [ ]D [ ]E </p><br><br><br>


NOME: $nome</p><br>
E-MAIL:  $email</p><br>
FONE:  $fone</p><br>
CELULAR:  $celular</p><br>
EMPRESA:  $empresa</p><br>
CNPJ / CPF:  $cnpj</p><br>
CARGO NA EMPRESA:  $cargo</p><br>
MENSAGEM:  $mensagem</p><br>
ONDE NOS ACHOU:  $achou</p><br><br><br>
 
 
======================</p>";
     $mail->MsgHTML($corpo); 
 
     ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
     //$mail->MsgHTML(file_get_contents('arquivo.html'));
 
     $mail->Send();
 
    //caso apresente algum erro é apresentado abaixo com essa exceção.
    }catch (phpmailerException $e) {
      echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
}

$mail2 = new PHPMailer(true);
// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail2->IsSMTP(); // Define que a mensagem será SMTP
 
try {
     $mail2->Host = 'email-ssl.com.br'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
     $mail2->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
     $mail2->Port       = 587; //  Usar 587 porta SMTP
     $mail2->Username = 'sandro@nanotechdobrasil.com.br'; // Usuário do servidor SMTP (endereço de email)
     $mail2->Password = 'loc@1020'; // Senha do servidor SMTP (senha do email usado)
     $mail2->CharSet = 'UTF-8';
     //Define o remetente
     // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
     $mail2->SetFrom('sandro@nanotechdobrasil.com.br', 'Sandro Dorta'); //Seu e-mail
     $mail2->AddReplyTo('sandro@nanotechdobrasil.com.br', 'Sandro Dorta'); //Seu e-mail
     $mail2->Subject = 'Seu pedido de orçamento do produto Nanothermic 1 foi enviado!';//Assunto do e-mail
 
 
     //Define os destinatário(s)
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     $mail2->AddAddress($email);
 
     //Campos abaixo são opcionais 
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
     //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
     //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo
 
 
     //Define o corpo do email
     $corpo= "<p>Olá " . $nome . ". <br>Obrigado por entrar em contato com a Nanotech do Brasil, seu orçamento foi encaminhado para o departamento responsável e será respondido o mais breve possível. </p>";
$corpo .= "<p>Atenciosamente, <br>
Nanotech do Brasil - (11) 4432-0180<br>
www.nanotechdobrasil.com.br</p>"; 
     $mail2->MsgHTML($corpo); 
 
     ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
     //$mail->MsgHTML(file_get_contents('arquivo.html'));
 
     $mail2->Send();
 
    //caso apresente algum erro é apresentado abaixo com essa exceção.
    }catch (phpmailerException $e) {
      echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
}
    echo "Pedido enviado com sucesso!";
}
?>

<html>
<head>
  <meta charset="utf-8">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script type="text/javascript">
    function hide(){
      var x = document.getElementById("formularioDiv");
      x.style = "display:none";
    }

  </script>
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Lato');
<!--
.Estilo3 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 12; }
.Estilo4 {font-size: 12}
.Estilo5 {
  font-family: Geneva, Arial, Helvetica, sans-serif;
  font-size: 12px;
}
.Estilo10 {
  font-size: 9px;
  color: #333333;
}
.Estilo14 {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 10px; }
-->

/* Forms Base */
* {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.w100p{
  width:100%;

}
select{
  font-family:'Lato',sans-serif;
}


.responsiveForm > div {
  clear: both;
  overflow: hidden;
  padding: 1px;
  margin: 0 0 5px 0;
}
.responsiveForm > div > fieldset > div > div {
  margin: 0 0 5px 0;
}
.responsiveForm > div > label,
legend {
  width: 25%;
  float: left;
  padding-right: 2%;

}
.responsiveForm > div > div,
.responsiveForm > div > fieldset > div {
  width: 75%;
  float: right;
}
.responsiveForm > div > fieldset label {
  font-size: 90%;
}
fieldset {
  border: 0;
  padding: 0;
}

input[type=text],
input[type=email],
input[type=url],
input[type=password],
textarea {
  width: 80%;
  border-top: 1px solid #ccc;
  border-left: 1px solid #ccc;
  border-right: 1px solid #eee;
  border-bottom: 1px solid #eee;   
}
textarea {
  font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 12;
}
select{
  padding:1px!important;
  padding-bottom:3px!important;

}
input[type=text],
input[type=email],
input[type=url],
input[type=password],
textarea,select {
  width: 50%;
  padding: 4px;
  border-radius:3px;
  box-shadow: 1px 1px gray;
  -webkit-box-shadow: 1px 1px gray;
  -moz-box-shadow: 1px 1px gray;
  font-size: 80%; 
  font-family: 'Lato', sans-serif; 
}

input[type=text]:focus,
input[type=email]:focus,
input[type=url]:focus,
input[type=password]:focus,
textarea:focus {
  outline: 0;
  border-color:#95C880;
  background-color:#F5F9F0;
}
select:focus {
  outline: 0;
  border-color:#95C880;
  background-color:#F5F9F0;
  color:#000000;
}
select, option {
color:#727272;
}
input[type=submit] {
  background-color:#0D93B9;
    background: -moz-linear-gradient(center top , #0D93B9, #81BBDA) repeat scroll 0 0 transparent;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0D93B9', endColorstr='#81BBDA'); /* IE */
  background: -webkit-gradient(linear, left top, left bottom, from(#0D93B9), to(#81BBDA)); /* webkit browsers */
  color:#FFFFFF;
  border-radius: 3px 3px 3px 3px;
  border-top-left-radius: 3px;
    border-top-right-radius: 3px;
  border:1px solid #0D93B9;
  padding:4px 10px 4px 10px;

}
input[type=submit]:hover {
  background-color:#B6B6B6;
}
@media (max-width: 600px) {
  .responsiveForm > div {
    margin: 0 0 5px 0; 
  }
  .responsiveForm > div > label,
  legend {
    width: 100%;
    float: none;
    margin: 0 0 5px 0;
  }
  .responsiveForm > div > div,
  .responsiveForm > div > fieldset > div {
    width: 100%;
    float: none;
  }
  input[type=text],
  input[type=email],
  input[type=url],
  input[type=password],
  textarea,
  select {
    width: 100%; 
  }
}
@media (min-width: 1200px) {
  .responsiveForm > div > label,
  legend {
    text-align: right;
  }
}


/*end Forms Base*/

div.clear {clear: both; height: 1px; overflow: hidden;}
.left {float:left}
.right {float:right}
.w20p {width:20%;}
.w80p {width:80%;}
msg-error {
  color: #c65848;
}
.g-recaptcha.error {
  border: solid 2px #c64848;
  padding: .2em;
  width: 19em;
}
</style>
</head>
<body>

<form id="form1" name="frmImgValida" method="post" action="form.php?form=s">
  <div class="container" style="width:100%">
    <div class="row">
      <div class="col-lg-12">
      <div class="responsiveForm pd10" id="formularioDiv" class="col-lg-8 col-offset-lg-3">
        <div>
              <input name="Nome" type="text" id="Nome" size="40" placeholder="Nome" />
          </div>
          <div>
            <input name="email" type="text" id="email" size="40" placeholder="E-mail"/>
          </div>
          <div>
             <input name="fone" type="text" id="fone" size="20" maxlength="16" placeholder="Fone ex.:(99)9999-9999" />
          
          </div>
          <div>
             <input name="celular" type="text" id="celular" size="20" maxlength="16" placeholder="Celular ex.:(99)9999-9999" />
          
          </div>
          <div>
             <input name="empresa" type="text" id="empresa" size="20" maxlength="40" placeholder="Empresa" />
          </div>
          <div>
             <input name="cnpj" type="text" id="cnpj" size="20" maxlength="50" placeholder="CNPJ / CPF" />
          </div>
          <div>
             <input name="cargo" type="text" id="cargo" size="20" maxlength="40" placeholder="Seu cargo na empresa" />
          </div>
          <div>
                <!--<input name="assunto" type="text" id="assunto" size="28" placeholder="Assunto" /> --> 
                <select name="produto" id="produto">
                <option value="" disabled selected>Qual produto deseja?</option>
                  <option>Nanothermic 1</option>
                  <option>Nanothermic 1 Telhados</option>
                  <option>Nanothermic 1 Silos</option>
                  <option>Nanothermic 1 Container</option>
                  <option>Nanothermic 1 Elastic</option>
              </select>
          </div>
          <div>
             <textarea name="mensagem" cols="40" rows="7" id="mensagem" placeholder="Digite aqui sua mensagem"></textarea>
          </div>
          <div>
             <select name="achou" id="achou">
                <option value="" disabled selected>Onde nos achou?</option>
                  <option>Google</option>
                  <option>E-mail marketing</option>
                  <option>Indicação</option>
                  <option>Já sou cliente</option>
                  <option>Facebook</option>
                  <option>Outros</option>
              </select>
          </div>
          <div style="height:70px">
            <script src='https://www.google.com/recaptcha/api.js'></script>
            <div class="g-recaptcha" style="transform:scale(0.80);-webkit-transform:scale(0.80);transform-origin:0 0;-webkit-transform-origin:0 0;" data-sitekey="6Le7VkYUAAAAAF1Lw7V2logSka4YTX2aISHj2HxH"></div>
          </div>

            <div align="left"><span class="Estilo10">
              <input class="w100p" id="btn-validate" type="submit" name="Submit" value="Enviar"  onclick="hide()" />
             </span>
            </div>
          </div>
      </div>
    </div>
  </div>



</form>

</body>
</html>
