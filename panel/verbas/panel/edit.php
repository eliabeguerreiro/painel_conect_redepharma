<?php
session_start();
include("../functions/connection.php");
include("../functions/fun.php");
/*
echo("<br>");
var_dump($_SESSION);
echo("<br>");
*/

if(!empty($_SESSION['usuario']['id_usuario']))
{}
else{$_SESSION['msg']='Você precisa logar para acessar o painel!</br>';
    header("Location: ../index.php");
} 

$id = $_GET['id'];


$sqlBus = "SELECT * FROM verba WHERE id_verba='".$id."'";
$sqlBuscar = mysqli_query($conn, $sqlBus);
$verba = mysqli_fetch_assoc($sqlBuscar);

if($verba){
    /*
    echo("<br>");
    var_dump($verba);
    echo("<br>");
    */
           
    if($_POST){  
                
        $sql_alt = "INSERT INTO movimentacao (autor, valor, dt_inclusao, ds, verba) VALUES ('".$_SESSION['usuario']['id_usuario']."', '".$_POST['valor']."', '".date('Y,m,d')."', '".$_POST['descricao']."','".$verba['id_verba']."') ";
        $sql_alterar = mysqli_query($conn, $sql_alt);  
    
        
        
            if($sql_alterar){
                $sql = "UPDATE verba SET dt_ult_altera =  '".date('Y-m-d')."' WHERE id_verba =  '".$id."'";
                $update = mysqli_query($conn, $sql);  

                

                //echo$sql;

                if($update){
                    $sql_log = "INSERT INTO log_verba (id_user, nome, data_altera) VALUES ('".$_SESSION['usuario']['id_usuario']."', 'criou a movimentação:  ".$_POST['descricao']."' , '".date('Y,m,d')."')";
                    $upload_log = mysqli_query($conn, $sql_log);

                    if($upload_log){
                        $_SESSION['msg'] = 'Ação registrada!';
                        //header("Location:".$_SESSION['URL']);

                    }else{
                        $_SESSION['msg'] = 'Ação não registrada!';
                        //header("Location:".$_SESSION['URL']);
                    }

                }else{
                    $_SESSION['msg'] = 'Ação não registrada!';
                    //header("Location:".$_SESSION['URL']);
                }
            }else{
                
                $_SESSION['msg'] = 'Ação não registrada!';
                    //header("Location:".$_SESSION['URL']);
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
    <title>Criar Verba | Verbas</title>
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
                        <h2>Movimentações - <?php echo($verba['ds_verba'])  ?></h2>
                    </div>
                        <?php

                    $valor_atual = pegarTotal($conn, $verba['id_verba']);
                    $valor_total = $verba['valor'] - $valor_atual;

                            
                            echo("
                            <center>
                            <div class='contentValores'>
                            <div>
                            <div>
                                <strong>Valor inicial:</strong>
                                <p id='valorInicialShow' style='color: red; margin-bottom: 0; font-weight: bold; font-size: 50px; text-align: center; text-transform: capitalize;'>-R$".$verba['valor']."</p>
                                <input id='valorInicial' style='display: none' value='".$verba['valor']."'/>
                            </div>

                            <div>
                                <strong>Valor Total:</strong>
                                <p id='valorTotalShow' style='margin-bottom: 0; font-weight: bold; font-size: 50px; text-align: center; text-transform: capitalize;'>R$".$valor_total."</p>
                                <input id='valorTotal' style='display: none' value='".$valor_total."'/>
                            </div>
                            </div>

                            <div>
                                <div onclick='openDoc()' style='width: 200px; height: 200px; border-radius: 15px; box-shadow: 0 1px 6px rgba(0,0,0,0.5); display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer;'>
                                <i style='font-size: 60px' class='fas fa-paperclip'></i>
                                <strong style='font-size: 20px; margin-top: 30px;'>Anexo</strong>
                                </div>
                            </div>
                            </div>
                            </center>
                            ");

                        
                            if($valor_atual){
                                echo("
                                <div style='display: flex; align-items: center; justify-content: center; margin-top: 20px'>
                                    <p style='color: #000'>Total de movimentações até ".date('d/m/Y',strtotime($verba['dt_ult_altera'])).": </p>
                                    <p style='color: #000; margin-left: 7px'>+R$".$valor_atual."</p>
                                </div>");
                    }
                    ?>
            

                    <div class="tabela-inventario">
                        <p class="p-2" style="color: #8f1838; font-weight: bold; font-size: 20px;"></p>


                        <?php
                    $sqlmov = "SELECT * FROM movimentacao WHERE verba='".$id."'";

                    //echo($sqlmov);
                    $sqlmovi = mysqli_query($conn, $sqlmov);

                    echo("<table id='customers'><tbody>");
                    while($mov = mysqli_fetch_assoc($sqlmovi)){

                        $sqlu = "SELECT * FROM usuarios WHERE id_user = '".$mov['autor']."'";
                        $sqlus = mysqli_query($conn, $sqlu);
                        $user = mysqli_fetch_assoc($sqlus);
                        echo("<tr>");
                        echo("<td> Alteração: ".$mov['ds']."</td>");
                        echo("<td> Valor : R$:".$mov['valor']."</td>");
                        echo("<td> Autor: ".$user['nome']."</td>");
                        echo("<td> Criação: ".$mov['dt_inclusao']."</td>");
                        echo("</tr>");
                    }
                    echo("</tbody></table>");
                    
                    


                ?>
                </div>
                </div>

                        <div class="recentInbox">
                            <div class="cardHeader">
                                <h2>Criar Movimentação</h2>
                            </div>
                            <div class="content" style="flex: auto;">
                                <div class="tabela-inventario">
                                    <p class="p-2" style="color: #8f1838; font-weight: bold; font-size: 20px;"></p>
                                    <center>
                                        <div class="form-group" style="padding: 20px 20px 20px 20px;">
                                            <form method="POST" action="">

                                                <label>Inserir movimentação na Verba:
                                                    <?php echo($verba['ds_verba']);?></label>

                                                <input class="form-control" type="number" step='0.01' min="10"
                                                    max="10000000" name="valor" placeholder="Digite o valor">
                                                <br>
                                                <small>Opcional</small>
                                                <input class="form-control" type="text" name="descricao"
                                                    placeholder="Digite um descrição sobre a movimentação:">
                                                <br>
                                                <div class="d-flex align-items-center justify-content-around">

                                                    <div class="btn-group">
                                                        <input value='Criar'class="btn btn-danger" type="submit"
                                                            name="btnAltData"><br>
                                                    </div>

                                                </div>

                                            </form>
                                        </div>
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
                    <script>
                        let valorTotal = document.getElementById('valorTotal').value;
                        let valorInicial = document.getElementById('valorInicial').value;
                        let valorTotalShow = document.getElementById('valorTotalShow');
                        let valorInicialShow = document.getElementById('valorInicialShow');

                        if(valorTotal <= valorInicial*1){
                            valorTotalShow.style.color='#ff0000';
                        }
                        if(valorTotal < valorInicial*0.75){
                            valorTotalShow.style.color='#ff5500';
                        }
                        if(valorTotal < valorInicial*0.50){
                            valorTotalShow.style.color='#ffcc00';
                        }
                        if(valorTotal < valorInicial*0.25){
                            valorTotalShow.style.color='#ccff00';
                        }
                        if(valorTotal < valorInicial*0.1){
                            valorTotalShow.style.color='#33ff00';
                        }
                        if(valorTotal < 0){
                            valorTotalShow.style.color='#3c2e8c';
                        }

                        function openDoc() {
                            <?php 
                            if($verba['anexo'] == NULL){
                                echo("alert('Esta verba não possuí anexos.')");
                            }else{
                                echo("window.open('./anexos/".$verba['anexo']."')");
                            }
                            ?>
                        }
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
                                        <button type="button" class="btn btn-primary"
                                            data-dismiss="modal">Voltar</button>
                                        <a type="button" class="btn btn-danger"
                                            href='../functions/logout.php?sair=sim'>Sair</a>
                                    </center>
                                </div>
                            </div>

                        </div>
                    </div>
</body>

</html>




</body>

</html>

<?php
    