<?php
    session_start();

    $logado = $_SESSION["logado"];

    if(!isset($logado)){        
        header("Location: login.php");        
        exit();
    }    
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>	
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Gerenciador de Questões</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<link href="css/style.css" type="text/css"  rel="stylesheet" />
		<link rel="shortcut icon" type="image/png" href="images/avpreto.png">	
    </head>

    <body>		
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="#"><img src="images/abranco.png" width="40"><a/>
	        <a class="navbar-brand" href="#">Teacher Online</a>
        	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            	<span class="navbar-toggler-icon"></span>
          	</button>

	        <div class="collapse navbar-collapse" id="navbarSupportedContent">
	            <ul class="navbar-nav ml-auto">
		            <li class="nav-item active">
		               <a class="nav-link" href="index.php"><span class="fa fa-home"> Home</span> <span class="sr-only">(current)</span></a>
		            </li>
	              
	            	<li class="nav-item dropdown active">
	                	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                  		<i class="fa fa-plus" aria-hidden="true"></i> Cadastro
	                	</a>
	                
		                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			                <a class="dropdown-item" href="index.php?page=cadastrar-curso">CURSO</a>
			                <a class="dropdown-item" href="index.php?page=cadastrar-materia">MATERIA</a>
			                <a class="dropdown-item" href="index.php?page=cadastrar-questoes">QUESTÕES</a>
			                <div class="dropdown-divider"></div>
			                <a class="dropdown-item" href="index.php?page=cadastrar-aluno">ALUNO</a>
		                </div>
		            </li>
	              
	            	<li class="nav-item dropdown active">
	                	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                  		<i class="fa fa-list" aria-hidden="true"></i> Listar
	                	</a>
	                
		                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			                <a class="dropdown-item" href="index.php?page=listar-usuario">USUÁRIO</a>
			                <a class="dropdown-item" href="index.php?page=listar-curso">CURSO</a>
			                <a class="dropdown-item" href="index.php?page=listar-materia">MATERIA</a>
			                <a class="dropdown-item" href="index.php?page=listar-aluno">ALUNO</a>
			                <a class="dropdown-item" href="index.php?page=listar-questoes">QUESTÕES</a>
		                </div>
	              	</li>

	            	<li class="nav-item dropdown active">
						<a class="nav-link" href="index.php?page=cadastrar-prova"><i class="fa fa-file-archive-o"></i> Gerar Prova</a>
              		</li>
	              
	              	<li class="nav-item active">
	                	<a class="nav-link" href="sair.php"><span class="fa fa-sign-out"> Sair</span></a>
	              	</li>
	            </ul>
	        </div>
	    </nav>			

	    <div class="container">
			<div class="row">
				<div class="col-lg-12">						
					<?php
						include("config.php");                       
						
						#Request das páginas
						switch(@$_REQUEST["page"]){
							
							#Casos do Usuário
							case "listar-usuario":
								include("listar-usuario.php");
							break;
							case "salvar-usuario":
								include("salvar-usuario.php");
							break;
							case "editar-usuario":
								include("editar-usuario.php");
							break;  

							#Casos do Curso                         
							case "cadastrar-curso":
								include("cadastrar-curso.php");
							break;
							case "listar-curso":
								include("listar-curso.php");
							break;
							case "salvar-curso":
								include("salvar-curso.php");
							break;
							case "editar-curso":
								include("editar-curso.php");
							break;
							
							#Casos da Materia
							case "cadastrar-materia":
								include("cadastrar-materia.php");
							break;
							case "listar-materia":
								include("listar-materia.php");
							break;
							case "salvar-materia":
								include("salvar-materia.php");
							break;
							case "editar-materia":
								include("editar-materia.php");
							break;

							#Casos do Aluno 
							case "cadastrar-aluno":
							include("cadastrar-aluno.php");
							break;
							case "listar-aluno":
								include("listar-aluno.php");
							break;
							case "salvar-aluno":
								include("salvar-aluno.php");
							break;
							case "editar-aluno":
								include("editar-aluno.php");
							break;
							
							#Casos da Questões  
							case "cadastrar-questoes":
								include("cadastrar-questoes.php");
							break;
							case "listar-questoes":
								include("listar-questoes.php");
							break;
							case "salvar-questoes":
								include("salvar-questoes.php");
							break;
							case "editar-questoes":
								include("editar-questoes.php");
							break;

							#Gerenciar Grade
							case "cadastrar-grade":
								include("cadastrar-grade.php");
							break;

							#Gerenciar Prova
							case "cadastrar-prova":
								include("cadastrar-prova.php");
							break;					

							#Default
							default:
								include("home.php");
							break;                         
						}
					?>
				</div>
			</div>  
		</div>
			
        <script src="js/jquery-3.2.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>     
    </body>
</html>