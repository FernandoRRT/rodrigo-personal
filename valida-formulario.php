<?php


/**
 * Send as JSON
 */
header("Content-Type: application/json", true);


//if(!$_POST) exit;

	// $nome = $_POST['name'];
	// $telefone = $_POST['phone'];
	// $email = $_POST['email'];
	// $assunto = 'Mensagem nova do site!';
	// $destino = "suporteiros@gmail.com";
	// $mensagem = '<h1 style="text-align: center;"><span style="font-family:verdana,geneva,sans-serif">Tem mensagem nova pra voc&ecirc;!</span></h1>';
	// $mensagem .= '<p><span style="font-family:georgia,serif">Rog&eacute;rio, <strong>'.$_POST['name'].'</strong>deseja falar contigo:</span></p>';
	// $mensagem .= '<p><span style="font-family:tahoma,geneva,sans-serif">'.$_POST['message'].'</span></p><hr />';
	// $mensagem .= '<address>Esse email foi enviado atrav&eacute;s do seu site.</address>';
	// $mensagem .= '<div>Nome: '.$_POST['name'].'</div><div>Email: '.$_POST['email'].'</div><div>Telefone: '.$_POST['phone'].'</div><address>&nbsp;</address>';

	$nome = $_POST['name'];
	$telefone = $_POST['phone'];
	$email = $_POST['email'];
	$texto = $_POST['message'];
	$assunto = 'Mensagem nova do site!';
	$destino = "suporteiros@gmail.com";

	$mensagem = '<h1 style="text-align: center;"><span style="font-family:verdana,geneva,sans-serif">Tem mensagem nova pra voc&ecirc;!</span></h1>';
	$mensagem .= '<p><span style="font-family:georgia,serif">Rog&eacute;rio, <strong>'.$nome.'</strong>deseja falar contigo:</span></p>';
	$mensagem .= '<p><span style="font-family:tahoma,geneva,sans-serif">'.$texto.'</span></p><hr />';
	$mensagem .= '<address>Esse email foi enviado atrav&eacute;s do seu site.</address>';
	$mensagem .= '<div>Nome: '.$nome.'</div><div>Email: '.$email.'</div><div>Telefone: '.$telefone.'</div><address>&nbsp;</address>';






	//codificações corretas e  tudo mais.
	$headers =  "Content-Type:text/html; charset=UTF-8\n";
	$headers .= "From:  profrogerio.com.br<sistema@profrogerio.com.br>\n";
	//Vai ser //mostrado que  o email partiu deste email e seguido do nome
	$headers .= "X-Sender:  <sistema@dominio.com.br>\n";
	//email do servidor //que enviou
	$headers .= "X-Mailer: PHP  v".phpversion()."\n";
	$headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
	$headers .= "Return-Path:  <".$email.">\n";
	//caso a msg //seja respondida vai para  este email.
	$headers .= "MIME-Version: 1.0\n";
	
	if(mail($destino, $assunto, $mensagem, $headers)) {
		// Si el correo es enviado correctamente, mostramos un mensaje 
		$a = 1;
		$b = "<div class='alert alert-success'>Sua mensagem foi enviada corretamente! Muito obrigado.</div>";
		$dab = array(
			"a" => $a, 
			"b" => $b
		);
	echo (json_encode($dab));
	} else {
		echo 'ERROR!';
	}

?>