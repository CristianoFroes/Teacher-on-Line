<br>
<h3><center>EDITAR CURSO</center></h3><br>
<?php
	$sql = "SELECT * FROM curso WHERE cod_curso =".$_REQUEST["cod_curso"];
	
	$resultado = $conn->query($sql) or die($conn->error);
	
	$row = $resultado->fetch_assoc();
?>

<body>
	<div class="container">
		<form action="index.php?page=salvar-curso&acao=editar&cod_curso=<?php print $row["cod_curso"]; ?>" method="POST">
			<div class="form-group">
				<label>NOME DO CURSO</label>
				<input type="text" name="nome_curso" class="form-control" value="<?php print $row["nome_curso"]; ?>"required>
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-success">Editar</button> 
				<input type='button' class="btn btn-primary" value='Voltar' onclick='history.go(-1)' />
			</div>
		</form>
	</div>
</body>