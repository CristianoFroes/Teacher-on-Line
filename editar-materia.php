<br>
<h3><center>EDITAR MATERIA</center></h3><br>
<?php
	$sql = "SELECT * FROM materia WHERE cod_materia =".$_REQUEST["cod_materia"];
	
	$result = $conn->query($sql) or die($conn->error);
	
	if($result==true){
		$row = $result->fetch_assoc();
	}	
?>

<body>
	<div class="container">
		<form action="index.php?page=salvar-materia&acao=editar&cod_materia=<?php print $row["cod_materia"]; ?>" method="POST">
			<div class="form-group">
				<label>NOME DA MATERIA</label>
				<input type="text" name="nome_materia" class="form-control" value="<?php print $row["nome_materia"]; ?>">
			</div>
			
			<div class="form-group">
				<label>CARGA HORÁRIA</label>
				<input type="text" name="carga_horaria" class="form-control" value="<?php print $row["carga_horaria"]; ?>">
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-success">Editar</button>
				<input type='button' class="btn btn-primary" value='Voltar' onclick='history.go(-1)' />
			</div>
		</form>
	</div>
</body>