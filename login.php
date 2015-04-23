<?php
require_once("banco-usuario.php");
require_once("logica-usuario.php");
//var_dump($_POST);
$usuario = buscaUsuario($conexao, $_POST["email"], $_POST["senha"]);

if($usuario == null)
{
	$_SESSION["danger"] = "Usuário ou senha inválidos";
	header("Location: index.php");
}else{
	$_SESSION["success"] = "Usuário logado com sucesso";
	logaUsuario($usuario["email"]);
	header("Location: index.php");	
}
die();