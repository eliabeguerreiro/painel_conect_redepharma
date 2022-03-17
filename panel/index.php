<?php
session_start();
//var_dump($_SESSION);

?>
<!DOCTYPE html>
<html lang='pt-BR'>

<head>
    <meta charset='utf-8' />
    <meta name=”description” content='Plataforma central da Redepharma'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <link rel='shortcut icon' href='favicon.ico' type='image/x-icon' />
    <title>Recepção | Redepharma</title>
    <link href='styles.css' rel='stylesheet'>
</head>
<body>
    <section class='header'>
        <div class='circulo'></div>
        <header>
            <a href='./'><img src='./images/logo_white.png' class='logo'></a>
        </header>
        <div class='content'>
            <div class='textBox'>
                <h2 style="color: #FFF;">REDEPHARMA</h2>
                <p style="color: #FFF;">Bem vindo ao PharmaCenter, sistema central de tecnologia da RedePharma</p>
            </div>

            <div class='imgBox'>
                <img src='./images/re_redepharma.png' alt='Rê Redepharma'>
            </div>
        </div>
    </section>
    <div class='verify'>
        <section class='py-5 text-ligth'>
            <!-- <center><alerta>*Aguardando o cadastro dos funcionários do Financeiro e do Compras<alerta></center> -->
            <div class='valida'>
                <div onclick="location.href='https://www.inventario.redepharma.com.br/'" class="card-btn">
                    <div class="card-icon">
                        <ion-icon name="file-tray-stacked-outline"></ion-icon>
                    </div>
                    <div class="card-nome">
                        <p>Inventário</p>
                    </div>
                </div>
                <div class="card-btn" style="cursor: not-allowed;">
                    <div class="card-icon">
                        <ion-icon name="car-outline"></ion-icon>
                    </div>
                    <div class="card-nome">
                        <p>Delivery</p>
                        <small>em desenvolvimento</small>
                    </div>
                </div>
                <div onclick="location.href='./verbas/panel'" class="card-btn">
                    <div class="card-icon">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                    <div class="card-nome">
                        <p>Verbas</p>
                    </div>
                </div>
                <div class="card-btn" onclick="location.href='../../chamados_redph/'">
                    <div class="card-icon">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                    <div class="card-nome">
                        <p>Chamados</p>
                    </div>
                </div>
                <div class="card-btn" style="cursor: not-allowed;">
                    <div class="card-icon">
                        <ion-icon name="stats-chart-outline"></ion-icon>
                    </div>
                    <div class="card-nome">
                        <p>BI</p>
                        <small>em breve</small>
                    </div>
                </div>
                <div onclick="location.href='../functions/logout.php?sair=sim'" class="card-btn">
                    <div class="card-icon">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </div>
                    <div class="card-nome">
                        <p>Sair</p>
                    </div>
                </div>
            </div>
        </section>
	</div>
    <!-- Footer -->

    <footer class="footer">
        <div class="blueLine"></div>
        <section>
            <div>
                <div class="colunas" style="padding-top: 30px; padding-bottom: 30px;">
                    <p style="color: #fff">RedePharma © Desenvolvido por: <a style="text-decoration: none; color: #ff7d12;" href="https://github.com/kcaiosouza">Caio Souza</a> & <a style="text-decoration: none; color: #ff7d12;" href="https://github.com/eliabeguerreiro">Eliabe Paz</a>
                     </p>
                </div>
            </div>
        </section>
    </footer>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	</body>
</html>