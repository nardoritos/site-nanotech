<?php
header('Content-Type: text/html; charset=UTF-8');
echo "<html><head><meta charset='utf-8'></head></html>";
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
     "<p>
======================<br><br>

Formulário de orçamento enviado pelo site do Nanothermic 1 - www.nanothermic1.com.br <br><br>

CLASSIFICAÇÃO DE CLIENTE: [ ]A [ ]B [ ]C [ ]D [ ]E <br><br><br>


NOME: $nome<br>
E-MAIL:  $email<br>
FONE:  $fone<br>
CELULAR:  $celular<br>
EMPRESA:  $empresa<br>
CNPJ / CPF:  $cnpj<br>
CARGO NA EMPRESA:  $cargo<br>
PRODUTO:  $produto<br>
MENSAGEM:  $mensagem<br>
ONDE NOS ACHOU:  $achou<br><br><br>
 
 
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
     $corpo= "<p>Olá " . $nome . ". Obrigado por entrar em contato com a Nanotech do Brasil, seu orçamento foi encaminhado para o departamento responsável e será respondido o mais breve possível. </p>";
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
    echo "Orçamento enviado com sucesso!";
?>