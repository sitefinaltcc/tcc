	<?php

	require_once("conecta.php");	
	
	function buscaUsuario($conexao, $email, $senha){
		$email = mysqli_real_escape_string($conexao, $email);
		$senhaMd5 = md5($senha);
		$resultado = mysqli_query($conexao,"select * from usuarios where email = '{$email}' and senha = '{$senhaMd5}'");
		$usuario = mysqli_fetch_assoc($resultado);
		return $usuario;
	}