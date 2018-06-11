<br>
<h3><center>LISTA DE ALUNOS</center></h3><br>
<body>
	<div class="container" id="listar">	
		<?php		
			$sql = "SELECT * FROM aluno AS al INNER JOIN curso AS cr ON al.cod_curso = cr.cod_curso";
			
			$resultado = $conn->query($sql) or die($conn->error);
			
			$qtd = $resultado->num_rows;			
			
			if($qtd > 0){
				print "<table class='table table-striped table-bordered table-hover'>";
				print "<tr>";					
					print "<th>ALUNO</th>";
					print "<th>SEXO</th>";
					print "<th>DATA NASCIMENTO</th>";
					print "<th>DATA MATRICULA</th>";
					print "<th>REGISTRO</th>";
					print "<th>CURSO</th>";
					print "<th>AÇÕES</th>";
				print "</tr>";

				$cont_masculino = 0;
				$cont_feminino = 0;
				$cont_nao_infor = 0;
				
				while($row = $resultado->fetch_assoc()){
					print "<tr>";					
						print "<td>". $row["nome_aluno"] ."</td>";
						print "<td>". $row["sexo"] ."</td>";
						print "<td>". $row["data_nascimento"] ."</td>";
						print "<td>". $row["data_matricula"] ."</td>";
						print "<td>". $row["registro"] ."</td>";
						print "<td>". $row["nome_curso"] ."</td>";
	                print "</td>";
					
					if($row["sexo"]=="M"){
						$cont_masculino++;
					}
					else if($row["sexo"]=="F"){
						$cont_feminino++;
					}
					else{
						$cont_nao_infor++;
					}					
					
					print "<td>
					
						<button onclick=\"location.href='index.php?page=editar-aluno&cod_aluno=".$row["cod_aluno"]."'; \" class='btn btn-success btn-sm'><i class='fa fa-edit'></i></button>
						
						<button onclick=\"location.href='index.php?page=salvar-aluno&acao=excluir&cod_aluno=".$row["cod_aluno"]."'; \" class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></button>
						
						</td>";
					print "</tr>";
				}
				print "</table>";
			}				
			else{
				print "Não Encontrou Resultados";
			}
		?>
	
		<div class="container" id="donutchart" style="width: 700px; height: 300px;">
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		    
		    <script type="text/javascript">
			    google.charts.load("current", {packages:["corechart"]});
			    
			    google.charts.setOnLoadCallback(drawChart);
			    
			    function drawChart() {
			    	var data = google.visualization.arrayToDataTable([
			    		['Sexo', 'Quantidade'],
			    		['Masculino',     <?php print $cont_masculino; ?>],
			    		['Feminino',      <?php print $cont_feminino; ?>],          
			    		['Não Informado', <?php print $cont_nao_infor; ?>],          
			    	]);

			        var options = {
			        	title: 'Gráfico por Sexo',
			        	pieHole: 0.4,
			        };

			        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
			        
			        chart.draw(data, options);
		      	}
		    </script>
	    </div>
    </div>		
</body>