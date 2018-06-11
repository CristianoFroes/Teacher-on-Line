<th>Imprima suas provas</th>
	<div class="form group">
		<button onclick="location.href='pdf/index1.php'" type="submit" class="btn btn-success">Gerar Prova</button>					
		<input type="button" class="btn btn-primary" value="Voltar" onclick="history.go(-1)">
	</div>
	
<br>
<h3><center>Provas</center></h3><br>
<body>
	<div class="container" id="listar">	
		<?php
			$sql = "SELECT qu.cod_questoes, qu.questao, al.alternativas FROM questoes AS qu INNER JOIN questoesalternativa AS qa ON qu.cod_questoes = qa.cod_questoes INNER JOIN alternativa AS al ON qa.cod_alternativa = al.cod_alternativa";
			
			$resultado = $conn->query($sql) or die($conn->error);
			
			$qtd = $resultado->num_rows;		
			
			if($qtd > 0){
				print "<table class='table table-striped table-bordered table-hover'>";
				print "<tr>";
					print "<th>Questão</th>";
					print "<th>Alternativa A</th>";
					print "<th>Alternativa B</th>";
					print "<th>Alternativa C</th>";
					print "<th>Alternativa D</th>";
					print "<th>Ações</th>";
					print "</tr>";				

				$cod_questoes = 0;	
				
				while($row = $resultado->fetch_array()){
					
					#Verifica se a questão que já foi impressa, se for diferente da anterior ele imprime a nova
					if($cod_questoes != $row["cod_questoes"]){
						
						$cod_questoes = $row["cod_questoes"];

						$questao = $row["questao"];

						print "<tr>";
						print "<td>".$questao."</td>";
						print "<td>".$row["alternativas"]."</td>";


						#Verifica se a linha anterior já foi preenchida e preenche a seguinte
						if($row = $resultado->fetch_array()){							
							print "<td>".$row["alternativas"]."</td>";
						}

						#Se não preenche com vazio
						else{
							print "<td></td>";
						}
						
						#Verifica se a linha anterior já foi preenchida e preenche a seguinte
						if($row = $resultado->fetch_array()){							
							print "<td>".$row["alternativas"]."</td>";
						}

						#Se não preenche com vazio
						else{
							print "<td></td>";
						}
						
						#Verifica se a linha anterior já foi preenchida e preenche a seguinte
						if($row = $resultado->fetch_array()){							
							print "<td>".$row["alternativas"]."</td>";
						}

						#Se não preenche com vazio
						else{
							print "<td></td>";
						}
						
						print "<td>
						
							<button onclick=\"location.href='index.php?page=editar-questoes&cod_questoes=".$cod_questoes."'; \" class='btn btn-success btn-sm'><i class='fa fa-edit'></i></button>
							
							<button onclick=\"location.href='index.php?page=salvar-questoes&acao=excluir&cod_questoes=".$cod_questoes."'; \" class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></button>
							
							</td>";
						print "</tr>";
					}
				}
				print "</table>";
			}
			else{
				print "Não Encontrou Resultados";
			}
		?>
	</div>		
</body>