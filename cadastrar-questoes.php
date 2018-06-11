<br>
<h3><center>CADASTRO DE QUESTÕES</center></h3><br>
<body>
	<div class="container">
		<form action="index.php?page=salvar-questoes&acao=cadastrar" method="POST">	
			<div class="form-group">
				<label><b>CURSO</b></label><br>				
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
			
			<div class="form-group">
				<label><b>MATÉRIA</b></label><br>				
				<?php
					$sql = "SELECT * FROM materia";
					
					$resultado = $conn->query($sql) or die($conn->error);
					
					if($resultado->num_rows > 0){
						print "<select name='cod_materia' class='form-control' required>
	                                <option value=''>Selecione</option>";
						
						while($row = $resultado->fetch_assoc()){
							print "<option value='".$row["cod_materia"]."'>".$row["nome_materia"]."</option>";
						}
						print "</select>";
					}			
				?>
			</div>				
			
			<div class="form-group">			
				<label><b>QUESTÃO</b></label>						
				<input type="text" name="questao" class="form-control"><br>				
				<label><b>Nível:</b></label>
				<select name="nivel" required>
					<option value="">Selecione</option>
					<option value="Facil">Fácil</option>
					<option value="Medio">Médio</option>
					<option value="Dificil">Difícil</option>
				</select>		
			</div>
			
			<div class="form-group">
				<div class="checkbox">
					<label><b>Alternativa A</b></label>
					<label><input type="checkbox" id="corretaA" name="corretaA" onclick="<?php print 'value = 1' ;?>">Correta?</label>
					<input type="text" name="alternativa[]" class="form-control">			 
				</div>
			</div>
			
			<div class="form-group">
				<div class="checkbox">
					<label><b>Alternativa B</b></label>
					<label><input type="checkbox" id="corretaB" name="corretaB" onclick="<?php print 'value = 1' ;?>">Correta?</label>
					<input type="text" name="alternativa[]" class="form-control">			 
				</div>
			</div>
			
			<div class="form-group">
				<div class="checkbox">
					<label><b>Alternativa C</b></label>
					<label><input type="checkbox" id="corretaC" name="corretaC" onclick="<?php print 'value = 1' ;?>">Correta?</label>
					<input type="text" name="alternativa[]" class="form-control">
				</div>
			</div>
			
			<div class="form-group">			
				<div class="checkbox">
					<label><b>Alternativa D</b></label> 
					<label><input type="checkbox" id="corretaD" name="corretaD" onclick="<?php print 'value = 1' ;?>">Correta?</label>
					<input type="text" name="alternativa[]" class="form-control">
				</div>
			</div>

			<div class="form group">
				<button type="submit" class="btn btn-success">Cadastrar</button>	
			</div>
		</form>
	</div>	
</body>