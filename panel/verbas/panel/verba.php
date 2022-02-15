<?php
session_start();
include("../functions/connection.php");
include("../functions/fun.php");

//var_dump($_SESSION);

if(!empty($_SESSION['usuario']['id_usuario']))
{}
else{
    var_dump($_SESSION);
    
    $_SESSION['msg']='Você precisa logar para acessar o painel!</br>';
    header("Location: ../index.php");
} 

//coletando dados do formulario
if($_POST){

    if(!$_FILES['arquivo']){

        $sql_forne = "INSERT INTO verba (fornecedor, valor, dt_criacao, ds_verba, autor) 
        values('".$dados['fornecedor']."', '".$dados['valor']."', '".date('Y,m,d')."', '".$dados['ds']."', '".$_SESSION['usuario']['id_usuario']."')";
        //echo($sql_forne);
        $upload = mysqli_query($conn, $sql_forne);
    }

    $dados = $_POST;
    

    // Pasta onde o arquivo vai ser salvo
    $_UP['pasta'] = 'anexos/';
            
    // Tamanho máximo do arquivo (em Bytes)
    $_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
    
    // Array com as extensões permitidas
    $_UP['extensoes'] = array('jpg', 'png', 'pdf');
    
    // Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
    $_UP['renomeia'] = false;
    
    // Array com os tipos de erros de upload do PHP
    $_UP['erros'][0] = 'Não houve erro';
    $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
    $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
    $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
    $_UP['erros'][4] = 'Não foi feito o upload do arquivo';
    
    // Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
    if ($_FILES['arquivo']['error'] != 0) {
        die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
        exit; // Para a execução do script
    }
    
    // Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
    
    // Faz a verificação do tamanho do arquivo
    if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
        $_SESSION['msg'] =  "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
    }else{
        
        if ($_UP['renomeia'] == true) {
            // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
            $nome_final = time().'.jpg';
        }else{
            // Mantém o nome original do arquivo
            $nome_final = $_FILES['arquivo']['name'];
        }
        
        // Depois verifica se é possível mover o arquivo para a pasta escolhida
        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
            // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
            $_SESSION['msg'] =  "Upload efetuado com sucesso!";
            $_SESSION['msg'] =  '<br /><a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
            $verifica = true;
        
        }else {
            // Não foi possível fazer o upload, provavelmente a pasta está incorreta
            $_SESSION['msg'] =  "Não foi possível enviar o arquivo, tente novamente";
        }
    
        
    if(!$upload){
   
        $sql_forne = "INSERT INTO verba (fornecedor, valor, anexo, dt_criacao, ds_verba, autor) 
        values('".$dados['fornecedor']."', '".$dados['valor']."', '$nome_final', '".date('Y,m,d')."', '".$dados['ds']."', '".$_SESSION['usuario']['id_usuario']."')";
        //echo($sql_forne);
        $upload = mysqli_query($conn, $sql_forne);
    }

    }

    if($upload){

        $sql_log = "INSERT INTO log_verba (id_user, nome, data_altera) VALUES ('".$_SESSION['usuario']['id_usuario']."', 'criou a verba:  ".$dados['ds']."' , '".date('Y,m,d')."')";
        $upload_log = mysqli_query($conn, $sql_log);
        //echo $sql_log;
        if($upload_log){
            $_SESSION['msg'] = "A verba ".$dados['ds']." foi cadastrada. Sua ação foi registrada";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9104146bde.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Cadastrar Verba | Verbas</title>
</head>

<body>
    <div style="position: relative; width: 100%;">
        <!-- sideBar -->
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><img src="../images/small_logo_white.png" width="60px" height="60px"
                                id="logo_redeph"></i></span>
                        <span class="title">Redepharma</span>


                    </a>
                </li>
                <li>
                    <a href="./">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="title">Início</span>
                    </a>
                </li>
                <li>
                    <a href="./cadastro.php">
                        <span class="icon"><i class="fas fa-box-open"></i></span>
                        <span class="title">Cadastrar Fornecedor</span>
                    </a>
                </li>
                <li class="hovered">
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
            
            <div class='alert alert-danger' role='alert'>
                <center><strong> Site em manutenção - não cadastrem verbas ou fornecedores até a saída deste aviso!</strong></center>
            </div>

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
                        <h2>Cadastrar Verbas</h2>
                    </div>
                    <div class="content" style="flex: auto;">
                        <div class="tabela-inventario">
                            <p class="p-2" style="color: #8f1838; font-weight: bold; font-size: 20px;"></p>
                            <center>
                                <form method="POST" action="" enctype="multipart/form-data">

                                    <label>Descrição</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="ds"
                                            placeholder="Digite uma descrição para a verba">
                                        <small id="emailHelp" class="form-text text-muted"></small>
                                    </div>
                                    <br>
                                    <br>

                                    <label>Fornecedor</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="fornecedor" id="">
                                            <?php
                                    $for = "SELECT * FROM fornecedores";
                                    $forne = mysqli_query($conn, $for);
                                    while($fornecedor = mysqli_fetch_assoc($forne)){
                                        echo("<option value='".$fornecedor['id_fornecedor']."'>".$fornecedor['nome']."</option>");
                                    }
                                
                                ?>
                                        </select>
                                        <small id="emailHelp" class="form-text text-muted"></small>
                                    </div>
                                    <br>
                                    <br>

                                    <label>Valor</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="number" step='0.01' min="10" max="10000000"
                                            name="valor" placeholder="Digite o válor da verba">
                                        <small id="emailHelp" class="form-text text-muted"></small>
                                    </div>
                                    <br>
                                    <br>

                                    <label>Anexo</label><br>
                                    <input id="arquivo" name="arquivo" class="col-md-8 input-file form-control"
                                        type="file"><br>
                                    <br>


                                    <input class="btn btn-primary" type="submit" name="btnCadUsuario"
                                        value="Cadastrar"><br>

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

            toggle.onclick = function() {
                navigation.classList.toggle('active');
                main.classList.toggle('active');
            }
            </script>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
                integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
                crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
                integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
                crossorigin="anonymous">
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