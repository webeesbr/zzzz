<?php
require ("../includes/PHPMailer/class.phpmailer.php");


$mail = new PHPMailer();
 
// Charset para evitar erros de caracteres
$mail->Charset = 'UTF-8';
 
// Dados de quem está enviando o email
$mail->From = 'contato.webees@gmail.com';
$mail->FromName = 'Nome de quem enviou';
 
// Setando o conteudo
$mail->IsHTML(true);
$mail->Subject = 'Assunto do e-mail';
$mail->Body     = '&lt;h1&gt;Teste de envio de e-mail&lt;/h1&gt; &lt;p&gt;Isso é um teste&lt;/p&gt;';
$mail->AltBody = 'Conteudo sem HTML para editores que não suportam, sim, existem alguns';
 
// Validando a autenticação
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host     = "ssl://smtp.googlemail.com";
$mail->Port     = 465;
$mail->Username = 'contato.webees@gmail.com';
//LEMBRAR DE COLOCAR A SENHA CERTA NA HORA DE SUBIR
$mail->Password = 'senha';
 
// Setando o endereço de recebimento
$mail->AddAddress('contato.webees@gmail.com', 'Nome');
 
// Enviando o e-mail
if ($mail->Send())
    echo 'E-mail enviado com sucesso';
else
    echo 'Erro ao enviar e-mail';
?>