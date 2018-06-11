<br>
<h3><center>CADASTRO DE MATERIAS</center></h3><br>
<body>
	<form action="index.php?page=salvar-materia&acao=cadastrar" method="POST">
		<div class="form-group">
			<label>NOME DA MATERIA</label>
			<input type="text" name="nome_materia" class="form-control" required>
		</div>
		<div class="form-group">
			<label>CARGA HORARIA</label>
			<input type="text" name="carga_horaria" class="form-control" required>
		</div>
		
		<div class="form group">
			<button type="submit" class="btn btn-success">Cadastrar</button>
		</div>		
	</form>
</body>