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
                <select name="depto" id="depto" required>
					<option value="">Selecione seu departamento</option>
                    <option value="1">TI</option>
                    <option value="3">Financeiro</option>
                    <option value="4">Controladoria</option>
                    <option value="5">RH</option>
                    <option value="2">Compras</option>
                    <option value="6">Marketing</option>
                    <option value="7">Supervisão</option>
                    <option value="8">Gerente de Loja</option>
                </select>
            </div><br>
            
                   
            <div class="password-container">
                <input placeholder="Senha" type="password" name="senha" required>
            </div><br>
            <div class="password-container">
                <input placeholder="Confirme sua senha" type="password" name="senha_confirma" required>
            </div><br>
         

        </form>

        </div>

    </div>
</body>
</html>