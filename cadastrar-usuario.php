<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="PT-BR">
    <head>
        <meta charset="UTF-8">
        <title>Gerenciador de Provas</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
    </head>

	<body id="login">
		<div class="container" id="cadastro"><br>
			<h3><center>NOVO CADASTRO</center></h3><br>
			<div class="container">
				<form action="salvar-usuario.php?acao=cadastrar" method="POST">		
					<div class="form-group">
						<label>NOME DO USUÁRIO</label>
						<input type="text" name="nome_usuario" class="form-control" required>
					</div>

					<div class="form-group">
						<label>SENHA</label>
						<input type="password" name="senha_usuario" class="form-control" required>
					</div>

					<div class="row-class">
						<button type="submit" class="btn btn-success">Cadastrar</button>
						<input type="button" class="btn btn-primary" value="Voltar" onclick="history.go(-1)">
					</div>
				</form>
				<br>

				<?php
				
					#Erro no cadastro
					if(isset($_SESSION["login"])){
						print $_SESSION["login"];
						unset($_SESSION["login"]);
						print "<meta http-equiv='refresh' content='1.5;cadastrar-usuario.php'>";
					}
					else{

						#Cadastro com Sucesso
						if(isset($_SESSION["nome"])){
							print $_SESSION["nome"];
							unset($_SESSION["nome"]);
							print "<meta http-equiv='refresh' content='1.5;login.php'>";
						}
					}
				?>
			</div>	
		</div>
	</body>
</html>