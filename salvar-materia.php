<br>
<?php
	$nome = @$_POST["nome_materia"];
	$carga = @$_POST["carga_horaria"];
	
	switch($_REQUEST["acao"]){
		
        #Caso seja Cadastro    
		case "cadastrar":
			$sql = "INSERT INTO materia (nome_materia, carga_horaria) VALUES ('{$nome}', '{$carga}')";
					
			$resultado = $conn->query($sql);			
			
			if($resultado==true){
				print "<div class='alert alert-success'>Cadastrado com Sucesso!</div>";
                print "<meta http-equiv='refresh' content='1;url=index.php?page=cadastrar-materia'>";
			}
			else{
				print "<div class='alert alert-danger'>Não foi possivel cadastrar</div>";
                print "<meta http-equiv='refresh' content='1;url=index.php?page=cadastrar-materia'>";
			}
		break;

		#Caso seja Edição
		 case "editar":
	$sql = "UPDATE materia SET nome_materia='{$nome}', carga_horaria='{$carga}' WHERE cod_materia=".$_REQUEST["cod_materia"];
			
			$result = $conn->query($sql) or die($conn->error);
			
			if($result==true){
				print "<div class='alert alert-success'>Editou com sucesso!</div>";
				print "<meta http-equiv='refresh' content='1;url=index.php?page=listar-materia'>";
			}else{
				print "<div class='alert alert-danger'>Não foi possível editar.</div>";
				print "<meta http-equiv='refresh' content='1;url=index.php?page=listar-materia'>";
			}
		break;
        
        #Caso seja Exclusão    
        case "excluir":
            $sql = "DELETE FROM materia WHERE cod_materia =".@$_REQUEST["cod_materia"];
            
            $resultado = $conn->query($sql);
            
            if ($resultado==true){
                print "<div class='alert alert-success'>Excluido com Sucesso!</div>";
                print "<meta http-equiv='refresh' content='1;url=index.php?page=listar-materia'>";
            }
            else{
                print "<div class='alert alert-danger'>Não foi possível Excluir!</div>";
                print "<meta http-equiv='refresh' content='1;url=index.php?page=listar-materia'>";
            }
        break;
	}
?>