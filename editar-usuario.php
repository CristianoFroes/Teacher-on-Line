<br>
<h3><center>EDITAR CURSO</center></h3><br>
<?php
	$sql = "SELECT * FROM usuario WHERE cod_usuario =".$_REQUEST["cod_usuario"];
	
	$resultado = $conn->query($sql) or die($conn->error);
	
	$row = $resultado->fetch_assoc();
?>

<body>
	<div class="container">
		<form action="index.php?page=salvar-usuario&acao=editar&cod_usuario=<?php print $row["cod_usuario"]; ?>" method="POST">
			<div class="form-group">
				<label>NOME DO USUÁRIO</label>
				<input type="text" name="nome_usuario" value="<?php print $row['nome_usuario']; ?>" class="form-control">
			</div>
			
			<div class="form-group">
				<label>SENHA</label>
				<input type="password" name="senha_usuario" class="form-control">
			</div>
			
			<div class="row-class">
			<button type="submit" class="btn btn-success">Editar</button>
			<input type='button' class="btn btn-primary" value='Voltar' onclick='history.go(-1)' />
		</form>
	</div>
</body>