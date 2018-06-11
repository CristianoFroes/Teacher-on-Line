<?php
	include_once("conexao.php");
	
	$html = '';
	
	$gerar_alternativas = [1 => 'a', 2 => 'b', 3 => 'c', 4 => 'd', 5 => 'e'];
	
	$consultar_questoes = "SELECT * FROM questoes";
	
	$result_questoes = mysqli_query($conn, $consultar_questoes);
	
	while($row = mysqli_fetch_assoc($result_questoes)){
		$html .= $row['questao'] . "<br>";

			$id_questao = $row['cod_questoes'];

			$consultar_alternativas = "SELECT a.alternativas AS alternativa FROM questoesalternativa qa INNER JOIN alternativa a ON qa.cod_alternativa = a.cod_alternativa WHERE qa.cod_questoes = '$id_questao'";

			$i=1;

			$result_alternativas = mysqli_query($conn, $consultar_alternativas);
			
			while($row2 = mysqli_fetch_assoc($result_alternativas)){
				$html .= $gerar_alternativas[$i++] . ') ' . $row2['alternativa'] . "<br>"; 
			}
		$html .= "<br><br>";
	}
	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html('
			<center><img src="images/afbranco.jpg" width="50"></center>
			<h1 style="text-align: center;">Teacher Online - Prova</h1>
			'. $html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_celke.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>