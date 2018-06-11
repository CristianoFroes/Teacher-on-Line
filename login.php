<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="PT-BR">
    <head>
        <meta charset="UTF-8">
        <title>Gerenciador de Provas</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="shortcut icon" type="image/png" href="images/avpreto.png"/>

    </head>
	
    <body id="login">
        <div class="container" id="cadastro"><br>
            <h3><center>LOGIN DO USUÁRIO</center></h3><br> 
            <div class="container">
                <form action="validar.php" method="POST">
                    <div class="form-group">   
                        <label>LOGIN</label>
                        <input type="text" name="nome_usuario" class="form-control">
                    </div>

                    <div class="form-group">      
                        <label>SENHA</label>
                        <input type="password" name="senha_usuario" class="form-control">
                    </div>
                    
                    <div class="form-group">  
                        <button type="submit" class="btn btn-success">Entrar</button>
                    </div>
                </form><br> 

                <label>Novo por aqui?<?php print "<a href=cadastrar-usuario.php> Cadastre-se!</a>" ?></label>

                <?php

                    #Erro no Login
                    if(isset($_SESSION["Erro"])){
                        print $_SESSION["Erro"];            
                        unset($_SESSION["Erro"]);
                        print "<meta http-equiv='refresh' content='1.5;login.php'>";
                    }
                    else{

                        #Login Efetuado com Sucesso
                        if(isset($_SESSION["conectado"])){
                        print $_SESSION["conectado"];            
                        unset($_SESSION["conectado"]);
                        print "<meta http-equiv='refresh' content='1.5;index.php'>";
                        }
                    }
                ?>
            </div>
        </div>
    </body>
</html>