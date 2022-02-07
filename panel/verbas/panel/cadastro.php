<?php
session_start();
include("../functions/connection.php");
include("../functions/fun.php");



if(!empty($_SESSION['usuario']['id_usuario']))
{}
else{$_SESSION['msg']='Você precisa logar para acessar o painel!</br>';
    header("Location: ../index.php");
} 

//coletando dados do formulario
if($_POST){
    
    $dados = $_POST;

    $sql_forne = "INSERT INTO fornecedores (nome) values('".$dados['nome']."')";
    $upload = mysqli_query($conn, $sql_forne);

    //echo$sql_forne;

     if(mysqli_insert_id($conn)){
        $_SESSION['msg'] = "O Fornecedor ".$dados['nome']." foi cadastrado com sucesso";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9104146bde.js"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Cadastrar Fornecedor | Verbas</title>
</head>
<body> 
    <div style="position: relative; width: 100%;">
        <!-- sideBar -->
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><img src="../images/small_logo_white.png" width="60px" height="60px" id="logo_redeph"></i></span>
                        <span class="title">Redepharma</span>
                        
                        
                    </a>
                </li>
                <li>
                    <a href="./">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="title">Início</span>
                    </a>
                </li>
                <li class="hovered">
                    <a href="./cadastro.php">
                        <span class="icon"><i class="fas fa-box-open"></i></span>
                        <span class="title">Cadastrar Fornecedor</span>
                    </a>
                </li>
                <li>
                    <a href="./verba.php">
                        <span class="icon"><i class="fas fa-money-bill-wave"></i></span>
                        <span class="title">Cadastrar Verba</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="./log.php">
                        <span class="icon"><i class="fas fa-clipboard-list"></i></span>
                        <span class="title">Log de alterações</span>
                    </a>
                </li> -->
                <li>
                    <a href="#" id="exit-btn" data-toggle="modal" data-target="#myModal">
                        <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                        <span class="title">Sair</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- main -->
        <div class="main">
            <!-- Mensagem de bem vindo -->
            <?php

            if(isset($_SESSION['msg'])){
                msg_sistem($_SESSION['msg']);
                unset($_SESSION['msg']);
            }

            ?>
            <div class="topbar">
                <!-- Botão Sanduiche-->
                <div class="toggle">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
            <!-- inbox Chamados -->
            <div class="details">
                <div class="recentInbox">
                    <div class="cardHeader">
                        <h2>Cadastrar Fornecedor</h2>
                    </div>
                    <div class="content" style="flex: auto;">
            <div class="tabela-inventario">
                <p class="p-2" style="color: #8f1838; font-weight: bold; font-size: 20px;"></p>
                    <center>
                        <form method="POST" action="" enctype="multipart/form-data">

                            <label>Nome</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="nome"
                                    placeholder="Digite o nome do fornecedor">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                            <br>
                            <br>

                            <input class="btn btn-primary" type="submit" name="btnCadUsuario" value="Cadastrar"><br>

                        </form>
                    </center>
                    </div>
            </div>
        </div>
    </div>

    <script>
        // ativar barra lateral
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');
        var edit_save = document.getElementById("logo_redeph");

        toggle.onclick = function(){
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
            integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
            integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Conteudo -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Deseja sair do verbas?</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <center>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Voltar</button>
                                <a type="button" class="btn btn-danger" href='../functions/logout.php?sair=sim'>Sair</a>
                            </center>
                        </div>
                    </div>

                </div>
            </div>
</body>
</html>