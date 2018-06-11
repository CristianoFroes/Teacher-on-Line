<br>
<?php
	@session_start();

	$nome = @$_POST["nome_usuario"];

	$senha = @$_POST["senha_usuario"];

	require("config.php");
	
	switch($_REQUEST["acao"]){

		#Caso seja cadastro
		case "cadastrar":			

			$sql = "INSERT INTO usuario (nome_usuario, senha_usuario) VALUES ('{$nome}', '{$senha}')";

			$resultado = $conn->query($sql);
					
			if($resultado==true){
				$_SESSION["nome"] = "<div class='alert alert-success'>Cadastrado com Sucesso!</div>";
				header("Location: cadastrar-usuario.php");					 
			}
			else{
				$_SESSION["login"] = "<div class='alert alert-danger'>Favor Informe Nome e Senha!</div>";
				header("Location: cadastrar-usuario.php");		
			}
		break;

		#Caso seja Edição
        case "editar":
            $sql = "UPDATE usuario SET nome_usuario ='{$nome}', senha_usuario = '{$senha}' WHERE cod_usuario =".$_REQUEST["cod_usuario"];
            
            $resultado = $conn->query($sql);
            
            if($resultado==true){
                print "<div class='alert alert-success'>Editado com Sucesso!</div>";
                print "<meta http-equiv='refresh' content='1;url=index.php?page=listar-usuario'>";
            }
            else{
                print "<div class='alert alert-danger'>Não foi possivel Editar</div>";
                print "<meta http-equiv='refresh' content='1;url=index.php?page=listar-usuario'>";
            }
        break;

		#Caso seja Exclusão 
		case "excluir":
			$sql = "DELETE FROM usuario WHERE cod_usuario=".$_REQUEST["cod_usuario"];

			$resultado = $conn->query($sql);

			if($resultado==true){
				print "<div class='alert alert-success'> Usuário Excluido com Sucesso!</div>";
				print "<meta http-equiv='refresh' content='1;url=index.php?page=listar-usuario'>";
			}
			else{
				print "<div class='alert alert-danger'> Não foi possivel Excluir!</div>";
				print "<meta http-equiv='refresh' content='1;url=index.php?page=listar-usuario'>";
			}
		break;		
	}
?>