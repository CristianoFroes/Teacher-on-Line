<br>
<?php
	$nome = @$_REQUEST["nome_curso"];
	
	switch($_REQUEST["acao"]){
		
		#Caso seja Cadastro
		case "cadastrar":
			$sql = "INSERT INTO curso (nome_curso) VALUES ('{$nome}')";
			
			$resultado = $conn->query($sql);
			
			if($resultado==true){
				print "<div class='alert alert-success'>Cadastrado com Sucesso!</div>";
				print "<meta http-equiv='refresh' content='1;url=index.php?page=cadastrar-curso'>";
			}
			else{
				print "<div class='alert alert-danger'>Não foi possivel cadastrar</div>";
				print "<meta http-equiv='refresh' content='1;url=index.php?page=cadastrar-curso'>";
			}
		break;
		
		#Caso seja Edição
		case "editar":
			$sql = "UPDATE curso SET nome_curso ='{$nome}' WHERE cod_curso =".$_REQUEST["cod_curso"];
			
			$resultado = $conn->query($sql);
			
			if($resultado==true){
				print "<div class='alert alert-success'>Editado com Sucesso!</div>";
				print "<meta http-equiv='refresh' content='1;url=index.php?page=listar-curso'>";
			}
			else{
				print "<div class='alert alert-danger'>Não foi possivel Editar</div>";
				print "<meta http-equiv='refresh' content='1;url=index.php?page=listar-curso'>";
			}
		break;
		
		#Caso seja Exclusão
		case "excluir":
			$sql = "DELETE FROM curso WHERE cod_curso =".$_REQUEST["cod_curso"];
			
			$resultado = $conn->query($sql);
			
			if($resultado==true){
				print "<div class='alert alert-success'>Excluido com Sucesso!</div>";
				print "<meta http-equiv='refresh' content='1;url=index.php?page=listar-curso'>";
			}
			else{
				print "<div class='alert alert-danger'>Não foi possivel a exclusão</div>";
				print "<meta http-equiv='refresh' content='1;url=index.php?page=listar-curso'>";
			}
		break;
	}
?>