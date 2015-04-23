<?php
	session_start();
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$mensagem = $_POST["mensagem"];

 	require_once("PHPMailerAutoload.php");

 	$mail = new PHPMailer();
 	$mail->isSMTP();
 	$mail->Host = 'smtp.gmail.com';
  	$mail->Port = 587;
 	$mail->SMTPSecure = 'tls';
 	$mail->SMTPAuth = true;
 	$mail->Username = "mail@gmail.com";
 	$mail->Password = "senha";

  	$mail->setFrom("mail@gmail.com","Alura curso PHP");
  	$mail->addAddress("mail@gmail.com");
    $mail->Subject = "Email de contato da loja";
    $mail->msgHTML("<html>De: {$nome}<br/>Email: {$email}<br/>Mensagem: {$mensagem}<br/></html>");
  	$mail->AltBody = "De: {$nome}\nEmail: {$email}\nMensagem: {$mensagem}";

if($mail->send()){
	$_SESSION["success"] = "Mensagem enviada com successo";
	header("Location: index.php");
}else{
	$_SESSION["danger"] = "Erro ao enviar a mensagem " . $mail->ErrorInfo;
	header("Location: contato.php");
}
die();