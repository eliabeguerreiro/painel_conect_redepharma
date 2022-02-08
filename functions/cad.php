<?php
session_start();
include_once("connection.php");
include_once("fun.php");

if($_POST){
    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);    
    
//limpeza da string
    $dados_st = array_map('strip_tags', $dados_rc);
    $dados = array_map('trim', $dados_st);
    
    // var_dump($dados);

    $erro = false;
    if((strlen($dados['senha'])) < 6){
        $erro = true;
        $_SESSION['msg'] = "A senha deve ter no minímo 6 caracteres";
    }elseif(stristr($dados['senha'], "'")) {
        $erro = true;
        $_SESSION['msg'] = "Caracter ( ' ) utilizado na senha é inválido";
    }else{
        $result_usuario = "SELECT id_user FROM usuarios WHERE usuario ='". $dados['login'] ."'";
        $resultado_usuario = mysqli_query($conn_user, $result_usuario);
        if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
            $erro = true;
            $_SESSION['msg'] = "Esse login já consta no sistema!";
        }    
    }

//encriptação da senha
    if(!$erro){
    
        $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
        $result_usuario = "INSERT INTO usuarios (usuario, nome, senha, depto) VALUES ('" .$dados['login']. "','" .$dados['nome']. "','" .$dados['senha']. "','" .$dados['depto']. "')";
        $resultado_usario = mysqli_query($conn_user, $result_usuario);

        echo$result_usuario;
        
        if(mysqli_insert_id($conn_user)){
            $_SESSION['msg'] = "Usuário cadastrado com sucesso <br> Usuario: ".$dados['login']."<br>Anote esse login!";
            header("Location:../index.php");
        }else{
            $_SESSION['msg'] = "Erro ao cadastrar o usuário";
            header("Location:../index.php");
        }
            
    }
}
