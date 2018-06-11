<br>
<h3><center>EDITAR ALUNO</center></h3><br>
<?php
	$sql = "SELECT * FROM aluno WHERE cod_aluno =".$_REQUEST["cod_aluno"];
	
	$result = $conn->query($sql) or die($conn->error);
	
	if($result==true){
		$row = $result->fetch_assoc();
	}	
?>

<body>
	<div class="container">
		<form action="index.php?page=salvar-aluno&acao=editar&cod_aluno=<?php print $row["cod_aluno"]; ?>" method="POST">
			<div class="form-group">
				<label>NOME DO ALUNO</label>
				<input type="text" name="nome_aluno" class="form-control" value="<?php print $row["nome_aluno"]; ?>">
			</div>
			
			<div class="form-group">
				<label>SEXO</label>
					<input type="radio" name="sexo" value="M"<?php print $row["sexo"]; ?>">Masculino
					<input type="radio" name="sexo" value="F"<?php print $row["sexo"]; ?>">Feminino
				
			</div>			
			
			<div class="form-group">
				<label>DATA DE NASCIMENTO</label>
				<input type="date" name="data_nascimento" class="form-control"value="<?php print $row["data_nascimento"]; ?>">
			</div>

			<div class="form-group">
				<label>DATA DA MATRICULA</label>
				<input type="date" name="data_matricula" class="form-control" value="<?php print $row["data_matricula"]; ?>">
			</div>
				
			<div class="form-group">
				<label>NÚMERO DO REGISTRO</label>
				<input type="text" name="registro" class="form-control" value="<?php print $row["registro"]; ?>">
			</div>
				
			<div class="form-group" value="<?php print $row["cod_curso"]; ?>">
				<label>CURSO</label><br> 
				
				<?php
					$sql = "SELECT * FROM curso";
						
					$resultado = $conn->query($sql) or die($conn->error);
						
					if($resultado->num_rows > 0){
						print "<select name='cod_curso' class='form-control' required>
			                            <option value=''>Selecione</option>";
						while($row = $resultado->fetch_assoc()){
							print "<option value='".$row["cod_curso"]."'>".$row["nome_curso"]."</option>";
						}
						print "</select>";
					}			
				?>
			</div>

			<div class="form group">
				<button type="submit" class="btn btn-success">Editar</button>
				<input type='button' class="btn btn-primary" value='Voltar' onclick='history.go(-1)'>
			</div>
		</form>
	</div>
</body>	