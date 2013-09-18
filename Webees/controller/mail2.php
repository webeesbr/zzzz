 
<?php
 
/*
Supondo que o arquivo esteja dentro do
diretório raíz e sub-diretório phpmailer/
*/
require ("../includes/PHPMailer/class.phpmailer.php");


date_default_timezone_set('America/Sao_Paulo');
 
// Abaixo começaremos a utilizar o PHPMailer. 
 
/*
Aqui criamos uma nova instância da classe como $mail.
Todas as características, funções e métodos da classe
poderão ser acessados através da variável (objeto) $mail.
*/
$mail = new PHPMailer(); // 
 
// Define o método de envio
$mail->Mailer     = "smtp";
 
// Define que a mensagem poderá ter formatação HTML
$mail->IsHTML(true); //
 
// Define que a codificação do conteúdo da mensagem será utf-8
$mail->CharSet    = "utf-8";
 
// Define que os emails enviadas utilizarão SMTP Seguro tls
$mail->SMTPSecure = "tls";
 
// Define que o Host que enviará a mensagem é o Gmail
$mail->Host       = "smtp.gmail.com";
 
//Define a porta utilizada pelo Gmail para o envio autenticado
$mail->Port       = "587";                   
 
// Deine que a mensagem utiliza método de envio autenticado
$mail->SMTPAuth   = "true";
 
// Define o usuário do gmail autenticado responsável pelo envio
$mail->Username   = "contato.webees";
 
// Define a senha deste usuário citado acima
$mail->Password   = "ludi280709";
 
// Defina o email e o nome que aparecerá como remetente no cabeçalho
$mail->From       = "contato.webees@gmail.com";
$mail->FromName   = "Webmeeting";
 
// Define o destinatário que receberá a mensagem
$mail->AddAddress($email);
 
/*
Define o email que receberá resposta desta
mensagem, quando o destinatário responder
*/
$mail->AddReplyTo("contato.webees@gmail.com", $mail->FromName);
 
// Assunto da mensagem
$mail->Subject = 'teste';
 
// Toda a estrutura HTML e corpo da mensagem
$mail->Body = 'Este é o corpo da mensagem de teste, em HTML! 
 <IMG src="http://seudomínio.com.br/imagem.jpg" alt=":)"   class="wp-smiley"> ';
$mail->AltBody = 'Este é o corpo da mensagem de teste, em Texto Plano! \r\n 
<IMG src="http://seudomínio.com.br/imagem.jpg" alt=":)"  class="wp-smiley"> ';
 
// Controle de erro ou sucesso no envio
if(!$mail->Send())
{
 
    echo "<p>Erro de envio: </p>" . $mail->ErrorInfo;
 
}
else{
 
    echo "<p>Mensagem enviada com sucesso!</p>";
 
}



?>