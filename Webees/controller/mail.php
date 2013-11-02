<?php
require ("../includes/PHPMailer/class.phpmailer.php");
require ("../comum/constantes.php");

$mail = new PHPMailer();

// Charset para evitar erros de caracteres
$mail -> Charset = 'UTF-8';

// Dados de quem está enviando o email
$mail -> From = 'contato.webees@gmail.com';
$mail -> FromName = 'Nome de quem enviou';

$msg_webees = sprintf(email_webees, $_POST["nome"], $_POST["email"], $_POST["assunto"], $_POST["mensagem"]);

// Setando o conteudo
$mail -> IsHTML(true);
$mail -> Subject = $_POST["assunto"];
$mail -> Body = $msg_webees;
//$mail->Subject = 'Assunto do e-mail';
//$mail->Body     = '&lt;h1&gt;Teste de envio de e-mail&lt;/h1&gt; &lt;p&gt;Isso é um teste&lt;/p&gt;';
//$mail->AltBody = 'Conteudo sem HTML para editores que não suportam, sim, existem alguns';

// Validando a autenticação
$mail -> IsSMTP();
$mail -> SMTPAuth = true;
$mail -> Host = "ssl://smtp.googlemail.com";
$mail -> Port = 465;
$mail -> Username = 'contato.webees@gmail.com';
//LEMBRAR DE COLOCAR A SENHA CERTA NA HORA DE SUBIR
$mail -> Password = 'ludi280709';

// Setando o endereço de recebimento
$mail -> AddAddress('contato.webees@gmail.com', 'Nome');

$message = '<html><body><b>TESTE!!</b><br /><b>Testing inline image!</b><p>Here\'s the inline image!</p><br /><img src="http://www.sambapix.com.br/images/common/logo_s.png" /></body></html>';
$header = "From: Webees <contato.webees@gmail.com> \r\n";
$header .= "To: <contato.webees@gmail.com> \r\n";
$header .= "Date: " . date('Y-m-d H:i:s') . " \r\n";
$header .= "Subject: Teste php \r\n";
$header .= "MIME-Version: 1.0 \r\n";
$header .= 'Content-Type: multipart/related; boundary="boundarey_b1982798239klnkslhaa_00-9342"';
$header .= "\r\n";
$rawEmail .= "--boundarey_b1982798239klnkslhaa_00-9342\n";
$rawEmail .= 'Content-Type: text/html; charset="utf-8"';
$rawEmail .= "\n";
$rawEmail .= "Content-Transfer-Encoding: base64\n";
$rawEmail .= "Content-Disposition: inline\n\n";
$rawEmail .= base64_encode($message);
$rawEmail .= "\n\n--boundarey_b1982798239klnkslhaa_00-9342--\n\n";

$mail -> addCustomHeader($header);
$mail -> Body = $rawEmail;

// Enviando o e-mail
if ($mail -> Send())
	echo 'E-mail enviado com sucesso';
else
	echo 'Erro ao enviar e-mail';
?>