<?php
    session_start();
    require_once "funcoes.php";
?>

<!DOCTYPE html>

<html lang="pt-br">

	<head>
		<title>Cadastro</title>
		<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;600&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="./Images/icon.jpg" type="image/jpg">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="./Style/form.css" /> 
        <link rel="stylesheet" type="text/css" href="./Style/style.css" />

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        
        <script type="text/javascript" src="./Javascript/jQuery Validation/lib/jquery.js"></script>
   		<script type="text/javascript" src="https://jqueryvalidation.org/files/lib/jquery-1.11.1.js"></script>
        <script type="text/javascript" src="./Javascript/jQuery Validation/dist/jquery.validate.js"></script>

        <script type="text/javascript" src="./Javascript/validandoForm.js"></script> 
        <script type="text/javascript" src="./Javascript/validandoCPF_CNPJ.validate.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
        <script type="text/javascript" src="./Javascript/cep.js"></script>
        <script type="text/javascript" src="./Javascript/script.js"></script>

        <script src="https://kit.fontawesome.com/ef7a547aae.js" crossorigin="anonymous"></script>
	</head>

	<body>

        <header class="navbar-light text-center">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="./index.php">
                    <img src="./Images/logo.png" height="100px" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item mr-3 ml-3">
                            <a class="nav-link" href="./index.php">Página inicial</a>
                        </li>              
                        <li class="nav-item mr-3 ml-3 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cadastro
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="./cpf.php">Pessoa física</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="./cnpj.php">Pessoa jurídica</a>
                            </div>
                        </li> 
                        <li class="nav-item mr-3 ml-3 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Consultas
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="./consulta_cpf.php">Pessoa física</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="./consulta_cnpj.php">Pessoa jurídica</a>
                            </div>
                        </li>
                        <li class="nav-item mr-3 ml-3">
                            <a href="./login.php" class="nav-link">Login</a>
                            <?= isset($_SESSION['usuario']) ? $_SESSION['usuario'] : '' ?>
                        </li>
                        <li class="nav-item mr-3 ml-3">
                            <a href="./logout.php" class="nav-link">Logout</a>
                        </li>
                    </ul>
                </div>                
            </nav>
        </header> 

    <main>

        <?php
            if (!empty($_SESSION['erro'])){
                alertErro($_SESSION['erro']);
            }
        ?>

        <form id="formularioLogin" class="form-horizontal" method="post" action="index.php">

        <div class="container mt-5">            
            <div class="row">  

                    <div class="col-md-6 formulario">
                        <h2>Login</h2>

                        <div class="panel panel-default">                  
                            <div class="panel-body">                                

                                    <!------------ USUÁRIO E SENHA ------------>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked onclick="cpf()">
                                                <label class="form-check-label" for="inlineRadio1" onclick="cpf()">Pessoa física</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" onclick="cnpj()">
                                                <label class="form-check-label" for="inlineRadio2" onclick="cnpj()">Pessoa jurídica</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="usuario">Usuário</label>
                                            <div class="validar">
                                                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Digite seu usuário" autofocus value="" />
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="senha">Senha</label>
                                                <div class="validar">
                                                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" value="" />
                                                </div>
                                        </div>
                                    </div> 
                                
                            </div>
                        </div>
                    </div>
            </div>

            <div class="form-group text-center pb-2">
                <button type="submit" name="logar_cpf" class="btn btn-lg btn-primary" id="logar_cpf">Logar</button>
                <button type="submit" name="logar_cnpj" class="btn btn-lg btn-primary" id="logar_cnpj">Logar</button>
            </div>

        </div>  
        </form>

    </main>

<?php
    include_once("footer.php");
?>