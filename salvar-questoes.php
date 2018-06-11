<br>
<?php
	$questao = @$_POST["questao"];		
	$nivel = @$_POST["nivel"];
	$materia = @$_POST["cod_materia"];
	$curso = @$_POST["cod_curso"];
	$alternativas = @$_POST["alternativa"];
	$contador = 0;
	
	$correta = array(
		@$_POST["corretaA"],
		@$_POST["corretaB"],
		@$_POST["corretaC"],
		@$_POST["corretaD"],
	);
	
	switch($_REQUEST["acao"]){
		
		#Caso seja Cadastro
		case "cadastrar":
			$sql = "INSERT INTO questoes (questao, nivel, materia, curso) VALUES ('{$questao}', '{$nivel}', '{$materia}', '{$curso}')";

			$resultado = $conn->query($sql);			
			
			foreach ($alternativas as $alternativa){

				$qual = $correta[$contador];

				if(empty($qual)){
					$qual = 0;
				}
				else{
					$qual = $correta[$contador];
				}
				
				$contador = $contador + 1;

				$alte = "INSERT INTO alternativa (alternativas, correta) VALUES ('{$alternativa}', '{$qual}')";

				$salvo = $conn->query($alte);
			}

			foreach ($alternativas as $alternativa){

				$questalter = "INSERT INTO questoesalternativa (cod_questoes, cod_alternativa) VALUES ((SELECT cod_questoes FROM questoes WHERE questao = '{$questao}'), (SELECT cod_alternativa FROM alternativa WHERE alternativas = '{$alternativa}'))";

				$salvoQuestAltern = $conn->query($questalter);
			}

			if($salvo==true){
				print "<div class='alert alert-success'>Cadastrado com Sucesso!</div>";
				print "<meta http-equiv='refresh' content='1;url=index.php?page=cadastrar-questoes'>";								
			}
			else{
				print "<div class='alert alert-danger'>Não foi possivel cadastrar</div>";
                print "<meta http-equiv='refresh' content='1;url=index.php?page=cadastrar-questoes'>";
			}
		break;		
	
		#Caso seja Editar
		case "editar":
			$editarAlternativas = array(
				@$_POST["alternativaA"],
				@$_POST["alternativaB"],
				@$_POST["alternativaC"],
				@$_POST["alternativaD"],
			);

			$cod_alternativa = array(
				@$_POST["cod_alternativaA"],
				@$_POST["cod_alternativaB"],
				@$_POST["cod_alternativaC"],
				@$_POST["cod_alternativaD"],
			);

			$cod_questoes = @$_POST["cod_questao"];				

			foreach ($editarAlternativas as $key => $value){

				$qual = $correta[$contador];

				if(empty($qual)){
					$qual = 0;
				}
				else{
					$qual = $correta[$contador];
				}
				
				$contador = $contador + 1;				

				$sqlA = "UPDATE alternativa SET alternativas = '{$value}', correta = '{$qual}' WHERE cod_alternativa =".$cod_alternativa[$key];

				$resultadoA = $conn->query($sqlA);						
			}	

			$sqlQ = "UPDATE questoes SET questao = '{$questao}', nivel = '{$nivel}', materia = '{$materia}', curso = '{$curso}' WHERE cod_questoes =".$cod_questoes;

			$resultadoQ = $conn->query($sqlQ);

			if($resultadoQ==true){
				print "<div class='alert alert-success'>Cadastrado com Sucesso!</div>";
				print "<meta http-equiv='refresh' content='1;url=index.php?page=cadastrar-questoes'>";								
			}
			else{
				print "<div class='alert alert-danger'>Não foi possivel cadastrar</div>";
                print "<meta http-equiv='refresh' content='1;url=index.php?page=cadastrar-questoes'>";
            }
		break;

		#Caso seja Editar
		case "excluir":
			$sql = "DELETE FROM questoes WHERE cod_questoes =".@$_REQUEST["cod_questoes"];

			$resultado = $conn->query($sql);

			if($resultado==true){
				print "<div class='alert alert-success'>Excluido com Sucesso!</div>";
				print "<meta http-equiv='refresh' content='1;url=index.php?page=listar-questoes'>";
			}
			else{
				print "<div class='alert alert-danger'>Não foi possível Excluir!</div>";
				print "<meta http-equiv='refresh' content='1;url=index.php?page=listar-questoes'>";
			}
		break;	
	}	
?>