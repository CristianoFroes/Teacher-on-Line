<br>
<h3><center>CADASTRO DE ALUNOS</center></h3><br>
<body>
	<div class="container">
		<form action="index.php?page=salvar-aluno&acao=cadastrar" method="POST">					
			<div class="form-group">
				<label>NOME DO ALUNO</label>
				<input type="text" name="nome_aluno" class="form-control">
			</div>
			
			<div class="form-group">
				<label>SEXO</label>
				<input type="radio" name="sexo" value="M">Masculino
				<input type="radio" name="sexo" value="F">Feminino				
			</div>			
			
			<div class="form-group">
				<label>DATA DE NASCIMENTO</label>
				<input type="date" name="data_nascimento" class="form-control">
			</div>
			
			<div class="form-group">
				<label>DATA DA MATRICULA</label>
				<input type="date" name="data_matricula" class="form-control">
			</div>

			<div class="form-group">
				<label>NÚMERO DO REGISTRO</label>
				<input type="text" name="registro" class="form-control">
			</div>

			<div class="form-group">
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
				<button type="submit" class="btn btn-success">Cadastrar</button>
			</div>
		</form>
	</div>
</body>