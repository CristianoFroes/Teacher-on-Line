<?php
	session_start();

	include("config.php");	

	$usuario = @$_POST["nome_usuario"];

	$senha = @$_POST["senha_usuario"];
	
	#Verificando se faz parte dos Registros no Banco	
	$sql = "SELECT * FROM usuario WHERE nome_usuario='$usuario' AND senha_usuario = '$senha'";

	$resultado = $conn->query($sql) or die($conn->error);

	$row = $resultado->fetch_assoc();
	
	#Verificando se é verdade	
	if($row > 0){			
		$_SESSION["logado"] = $usuario;		
		$_SESSION["conectado"] = "<div class='alert alert-success'>Bem Vindo!   ".$usuario."</div>";
		header("Location: login.php");			
	}
	else{
		$_SESSION["Erro"] = "<div class='alert alert-danger'>Usuário e ou Senha Inválido(s)!</div>";
		header("Location: login.php");
	}				
?>