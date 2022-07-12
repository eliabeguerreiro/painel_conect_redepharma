<?php
session_start();
include("../../functions/conexao.php");


$result_user = "SELECT * FROM `usuarios` WHERE id = ".$_SESSION['usuario']['id_usuario']."";
$resultado_user = mysqli_query($conn, $result_user);
$row_user = mysqli_fetch_assoc($resultado_user); 

var_dump($row_user);


if($_POST){

    var_dump($_POST);

    $dados = $_POST;
    $sql_alterar = "UPDATE usuarios SET cargo = '" .$_POST['cargo']. "' WHERE id = " .$_SESSION['usuario']['id_usuario']."";
    $alterar_cargo = mysqli_query($conn_user, $sql_alterar);

    $sql_alterar = "UPDATE usuarios SET email = '" .$_POST['email']. "' WHERE id = " .$_SESSION['usuario']['id_usuario']."";
    $alterar_email = mysqli_query($conn_user, $sql_alterar);
    
    $sql_alterar = "UPDATE usuarios SET telefone = '" .$_POST['telefone']. "' WHERE id = " .$_SESSION['usuario']['id_usuario']."";
    $alterar_telefone = mysqli_query($conn_user, $sql_alterar);



    if($alterar_cargo){
        if($alterar_email){
            if($alterar_telefone){
                
                //header("Location:./index.php");

            }
        }
    }

}


?>

