<br>
<?php
    $nome = @$_POST["nome_aluno"];
    $sexo = @$_POST["sexo"];
    $dataNasc = @$_POST["data_nascimento"];
    $dataMatri = @$_POST["data_matricula"];
	$codAluno = @$_POST["cod_aluno"];
    $curso = @$_POST["cod_curso"];
	$registro = @$_POST["registro"];
   
   switch($_REQUEST["acao"]){
        
        #Caso seja Cadastro
        case "cadastrar":
            $sql = "INSERT INTO aluno (nome_aluno, sexo, data_nascimento, data_matricula, cod_curso, registro) VALUES ('{$nome}', '{$sexo}','{$dataNasc}', '{$dataMatri}', '{$curso}', '{$registro}')";

            $resultado = $conn->query($sql);

            if($resultado==true){
                print "<div class='alert alert-success'>Cadastrado com Sucesso!</div>";
                print "<meta http-equiv='refresh' content='1;index.php?page=cadastrar-aluno'>";
            }
            else{
                print "<div class='alert alert-danger'>Não foi possivel cadastrar</div>";
                print "<meta http-equiv='refresh' content='1;index.php?page=cadastrar-aluno'>";
            }
        break;

        #Caso seja Editar
		case "editar":       
	       $sql = "UPDATE aluno SET nome_aluno='{$nome}', sexo='{$sexo}', data_nascimento='{$dataNasc}', data_matricula='{$dataMatri}', cod_curso='{$curso}', registro ='{$registro}' WHERE cod_aluno=".$_REQUEST["cod_aluno"];
			
			$resultado = $conn->query($sql) or die($conn->error);
			
			if($resultado==true){
				print "<div class='alert alert-success'>Editou com sucesso!</div>";
				print "<meta http-equiv='refresh' content='1;index.php?page=listar-aluno'>";				
			}
            else{
				print "<div class='alert alert-danger'>Não foi possível editar.</div>";
				print "<meta http-equiv='refresh' content='1;index.php?page=listar-aluno'>";
			}
		break;
		
        #Caso seja Exclusão    
        case "excluir":
            $sql = "DELETE FROM aluno WHERE cod_aluno =".@$_REQUEST["cod_aluno"];
            
            $resultado = $conn->query($sql);
            
            if($resultado==true){
                print "<div class='alert alert-success'>Excluido com Sucesso!</div>";
                print "<meta http-equiv='refresh' content ='1;url=index.php?page=listar-aluno'>";
            }
            else{
                print "<div class='alert alert-danger'>Não foi possível Excluir!</div>";
                print "<meta http-equiv='refresh' content='1;url=index.php?page=listar-aluno'>";
            }
        break;
    }
?>