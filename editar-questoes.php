<br>
<h3><center>EDITAR QUESTÕES</center></h3><br>
<?php
	$sql = "SELECT qu.cod_questoes, qu.questao, al.cod_alternativa, al.alternativas, ma.nome_materia, ma.cod_materia, cr.nome_curso, cr.cod_curso, qu.nivel FROM questoes AS qu 
				INNER JOIN questoesalternativa AS qa ON qu.cod_questoes = qa.cod_questoes 
				INNER JOIN curso AS cr ON qu.curso = cr.cod_curso 
				INNER JOIN materia AS ma ON qu.materia = ma.cod_materia 
				INNER JOIN alternativa AS al ON qa.cod_alternativa = al.cod_alternativa 
					WHERE qu.cod_questoes =".$_REQUEST["cod_questoes"];
					
	$resultado = $conn->query($sql) or die($conn->error);

	$row = $resultado->fetch_assoc();	
?>

<body>
	<div class="container">
		<form action="index.php?page=salvar-questoes&acao=editar&cod_questoes=<?php print $row["cod_questoes"]; ?>" method="POST">		
			<div class="form-group">
				<label><b>CURSO</b></label><br>				
				<select name="cod_curso" class="form-control" required>
				<?php
					$sqlC = "SELECT * FROM curso";
					
					$resultadoC = $conn->query($sqlC) or die($conn->error);
					
					print "<option value='".$row["cod_curso"]."'>".$row["nome_curso"]."</option>";
						
					while($rowC = $resultadoC->fetch_assoc()){
						print "<option value='".$row["cod_curso"]."'>".$row["nome_curso"]."</option>";
					}		
				?>
				</select>
			</div>

			<div class="form-group">
				<label><b>MATÉRIA</b></label><br>
				<?php
					$sqlM = "SELECT * FROM materia";
					
					$resultadoM = $conn->query($sqlM) or die($conn->error);
					
					if($resultadoM->num_rows > 0){
						print "<select name='cod_materia' class='form-control' required>
	                                <option value='".$row["cod_materia"]."'>".$row["nome_materia"]."</option>";
						
						while($rowM = $resultadoM->fetch_assoc()){
							print "<option value='".$row["cod_materia"]."'>".$row["nome_materia"]."</option>";
						}
						print "</select>";
					}			
				?>
			</div>	
			
			<div class="form-group">			
				<label><b>QUESTÃO</b></label>						
				<input type="text" name="questao" class="form-control" value="<?php print $row["questao"]; ?>" required>
				<input type="hidden" name="cod_questao" value="<?php print $row["cod_questoes"]; ?>"><br>				
				<label><b>Nível:</b></label>
				<select name="nivel" required>
					<option value=""> <?php print $row["nivel"]; ?> </option>
					<option value="Facil">Fácil</option>
					<option value="Medio">Médio</option>
					<option value="Dificil">Difícil</option>
				</select>		
			</div>
			
			<div class="form-group">
				<div class="checkbox">
					<label><b>Alternativa A</b></label>
					<label><input type="checkbox" id="corretaA" name="corretaA" onclick="<?php print 'value = 1' ;?>">Correta?</label>
					<input type="text" name="alternativaA" class="form-control" value="<?php print $row['alternativas']; ?>"required>
					<input type="hidden" name="cod_alternativaA" value="<?php print $row['cod_alternativa']; ?>">			 
				</div>
			</div>
			
			<div class="form-group">
				<div class="checkbox">
					<label><b>Alternativa B</b></label>
					<label><input type="checkbox" id="corretaB" name="corretaB" onclick="<?php print 'value = 1' ;?>">Correta?</label>
					<input type="text" name="alternativaB" class="form-control" value="<?php ($row = $resultado->fetch_array()); print $row['alternativas']; ?>"required>
					<input type="hidden" name="cod_alternativaB" value="<?php print $row['cod_alternativa']; ?>">
				</div>
			</div>
			
			<div class="form-group">
				<div class="checkbox">
					<label><b>Alternativa C</b></label>
					<label><input type="checkbox" id="corretaC" name="corretaC" onclick="<?php print 'value = 1' ;?>">Correta?</label>
					<input type="text" name="alternativaC" class="form-control" value="<?php ($row = $resultado->fetch_array()); print $row['alternativas']; ?>"required>
					<input type="hidden" name="cod_alternativaC" value="<?php print $row['cod_alternativa']; ?>">
				</div>
			</div>
			
			<div class="form-group">			
				<div class="checkbox"
					<label><b>Alternativa D</b></label> 
					<label><input type="checkbox" id="corretaD" name="corretaD" onclick="<?php print 'value = 1' ;?>">Correta?</label>
					<input type="text" name="alternativaD" class="form-control" value="<?php ($row = $resultado->fetch_array()); print $row['alternativas']; ?>"required>
					<input type="hidden" name="cod_alternativaD" value="<?php print $row['cod_alternativa']; ?>">
				</div>
			</div>

			<div class="form group">
				<button type="submit" class="btn btn-success">Editar</button>
				<input type='button' class="btn btn-primary" value='Voltar' onclick='history.go(-1)'>				
			</div>
		</form>
	</div>	
</body>