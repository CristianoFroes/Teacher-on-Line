<br>
<h3><center>LISTA DE USUÁRIOS</center></h3><br>
<body>
	<div class="container" id="listar">	
		<?php
			$sql = "SELECT * FROM usuario";
			
			$resultado = $conn->query($sql) or die($conn->error);
			
			$qtd = $resultado->num_rows;
			
			if($qtd > 0){
				print "<table class='table table-striped table-bordered table-hover'>";
				print "<tr>";
					print "<th>USUÁRIOS</th>";
					print "<th>AÇÕES</th>";
					print "</tr>";

				while($row = $resultado->fetch_assoc()){
					print "<tr>";
					print "<td>".$row["nome_usuario"]."</td>";
					print "<td>
						
						<button onclick=\"location.href='index.php?page=editar-usuario&cod_usuario=".$row["cod_usuario"]."'; \" class='btn btn-success btn-sm'><i class='fa fa-edit'></i></button>
						
						<button onclick=\"location.href='index.php?page=salvar-usuario&acao=excluir&cod_usuario=".$row["cod_usuario"]."'; \" class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></button>
						
						</td>";
					print "</tr>";
				}
				print "</table>";
			}
			else{
				print "Sem resultados";
			}
		?>
	</div>	
</body>