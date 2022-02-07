<?php
session_start();
//var_dump($_SESSION);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9104146bde.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <title>Início | Redepharma</title>
</head>

<body>

    <section class="header">


        <div class="hub">

            <div>
                <h1>Sistema em Implementação</h1>
                <strong>Aguardando Cadastro dos funcionarios do Financeiro e do Compras</strong>

            </div>
            <br>
            <div class="btn_container">
                <div onclick="location.href='#'" class="btn_box" style="cursor: not-allowed;">
                    <div class="btn_icon"></div>
                    <div class="btn_name">Inventário</div>
                </div>
                <div onclick="location.href='#'" class="btn_box" style="cursor: not-allowed;">
                    <div class="btn_icon"></div>
                    <div class="btn_name">Delivery</div>
                    <small>*desenvolvimento*</small>
                </div>
                <div onclick="location.href='+'" class="btn_box" style="cursor: not-allowed;">
                    <div class="btn_icon"></div>
                    <div class="btn_name">Verbas</div>

                </div>
                <div onclick="location.href='#'" class="btn_box" style="cursor: not-allowed;">
                    <div class="btn_icon"></div>
                    <div class="btn_name">Chamados</div>
                    <small>*desenvolvimento*</small>
                </div>
                <div onclick="location.href='#'" class="btn_box" style="cursor: not-allowed;">
                    <div class="btn_icon"></div>
                    <div class="btn_name">BI</div>
                    <small>*desenvolvimento*</small>
                </div>
                <div onclick="location.href='../functions/logout.php'" class="btn_box">
                    <div class="btn_icon"></div>
                    <div class="btn_name">Sair</div>
                </div>
            </div>

        </div>
    </section>
</body>

</html>