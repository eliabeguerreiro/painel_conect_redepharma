<?php
session_start();
include_once("functions/fun.php");
//notificando o usuario
if(isset($_SESSION['msg'])){
  msg_sistem($_SESSION['msg']);
  unset($_SESSION['msg']);
}

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Cadastro | BI 3.0</title>
</head>
<body>

    <div class="area-login shadow">
        <div class="text-container">
            <img src="./images/logo.png" alt="Logo">
        </div>
        <h1 class="login-name">Cadastro</h1>

       
        <form method="POST" action="functions/cad.php">
            <div class="login-container">
                <input placeholder="Digite seu nome completo" name="nome" required>
            </div><br>

            <div class="login-container">
                <input placeholder="Digite um login" name="login" required>
            </div><br>

            <div class="login-container">
                <select name="depto" id="depto">
                    <option value="TI">TI</option>
                    <option value="FINANCEIRO">Financeiro</option>
                    <option value="CONTROLADORIA">Controladoria</option>
                    <option value="RH">RH</option>
                    <option value="COMPRAS">Compras</option>
                    <option value="MARKETING">Marketing</option>
                    <option value="SUPERVISAO">Supervisão</option>
                </select>
            </div><br>
            
                   
            <div class="password-container">
                <input placeholder="Senha" type="password" name="senha" required>
            </div><br>
            <div class="password-container">
                <input placeholder="Confirme sua senha" type="password" name="senha_confirma" required>
            </div><br>
            

            <div class="button-container">
                <button type="submit">Criar conta</button>
            </div>

        </form>

        </div>

    </div>
</body>
</html>