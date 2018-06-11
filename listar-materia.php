<br>
<h3><center>LISTA DE MATERIAS</center></h3><br>
<body>
	<div class="container" id="listar">	
		<?php
			$sql = "SELECT * FROM materia";
			
			$resultado = $conn->query($sql) or die($conn->error);
			
			$qtd = $resultado->num_rows;
			
			if($qtd > 0){
				print "<table class='table table-striped table-bordered table-hover'>";
				print "<tr>";
					print "<th>MATERIA</th>";
					print "<th>CARGA HORÁRIA </th>";
					print "<th>AÇÕES</th>";
					print "</tr>";

				while($row = $resultado->fetch_assoc()){
					print "<tr>";
					print "<td>".$row["nome_materia"]."</td>";
					print "<td>".$row["carga_horaria"]."</td>";
					print "<td>
						
						<button onclick=\"location.href='index.php?page=editar-materia&cod_materia=".$row["cod_materia"]."'; \"class='btn btn-success btn-sm'><i class='fa fa-edit'></i></button>
						
						<button onclick=\"location.href='index.php?page=salvar-materia&acao=excluir&cod_materia=".$row["cod_materia"]."'; \"class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></button>
						
						</td>";
					print "</tr>";
				}
				print "</table>";
			}
			else{
				print "Não encontrou resultados";
			}
		?>
	</div>
</body>