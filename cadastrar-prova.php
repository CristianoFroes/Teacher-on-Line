<?php
	include_once("config.php");
?>
<br>			
<h3><center> Visualize suas Provas</center></h3><br>

<button onclick="location.href='pdf/index1.php'" type="submit" class="btn btn-success" center><i class="fa fa-file-pdf-o"> Gerar Prova</i></button>
<br>

<body><br>
	<div class="container" id="listar">		
		<?php
			$html = '';

			$gerar_alternativas = [1 => 'a', 2 => 'b', 3 => 'c', 4 => 'd'];
			
			$consultar_questoes = "SELECT * FROM questoes order by cod_questoes asc";
			
			$result_questoes = mysqli_query($conn, $consultar_questoes);
			
			$q = '';
			
			while($row = mysqli_fetch_assoc($result_questoes)){		

				$id_questao = $row['cod_questoes'];
			
				$html .= 'Questão '.$id_questao. ') '.$row['questao']."<br>";

				$consultar_alternativas = "SELECT a.alternativas AS alternativa FROM questoesalternativa qa INNER JOIN alternativa a ON qa.cod_alternativa = a.cod_alternativa WHERE qa.cod_questoes = '$id_questao'";

				$i = 1;

				$result_alternativas = mysqli_query($conn, $consultar_alternativas);
				
				while($row2 = mysqli_fetch_assoc($result_alternativas)){
						$html .= $gerar_alternativas[$i++] . ') ' . $row2['alternativa'] . "<br>"; 
				}
				$html .= "<br><br>";
			}
			print $html;
		?>

		<div class="form group">
			<button onclick="location.href='pdf/index1.php'" type="submit" class="btn btn-success">Gerar Prova</button>					
			<input type="button" class="btn btn-primary" value="Voltar" onclick="history.go(-1)">
		</div>
	</div>
</body>