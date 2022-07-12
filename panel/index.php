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
    <title>RedeConecta | Redepharma</title>
    <link href='styles.css' rel='stylesheet'>
</head>
<body>
    <section class='header'>
        <img src="./images/bannerRedeConect.png" style="width: 100%; height: auto;" alt="banner">
    </section>
    <div class='verify'>
        <section class='py-5 text-ligth'>
            <!-- <center><alerta>*Aguardando o cadastro dos funcionários do Financeiro e do Compras<alerta></center> -->
            <div class='valida'>
                <?php
                if($_SESSION['usuario']['depto'] == 1){
                    ?>
                    <div onclick="location.href='https://www.inventario.redepharma.com.br/'" class="card-btn">
                    <div class="card-icon">
                        <ion-icon name="file-tray-stacked-outline"></ion-icon>
                    </div>
                    <div class="card-nome">
                        <p>Inventário</p>
                    </div>
                    </div>
                
                    <div onclick="location.href='./delivery.php'" class="card-btn">
                    <div class="card-icon">
                        <ion-icon name="car-outline"></ion-icon>
                    </div>
                    <div class="card-nome">
                        <p>Delivery</p>
                        
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
                    <div onclick="location.href='./ouvidoria.php'" class="card-btn">
                        <div class="card-icon">
                            <ion-icon name="chatbubbles-outline"></ion-icon>
                        </div>
                        <div class="card-nome">
                            <p>Ouvidoria</p>
                        </div>
                    </div>

                <?php
                }
                if($_SESSION['usuario']['depto'] == 2 || $_SESSION['usuario']['depto'] == 3){
                    ?>
                    <div onclick="location.href='./verbas/panel'" class="card-btn">
                        <div class="card-icon">
                            <ion-icon name="cash-outline"></ion-icon>
                        </div>
                        <div class="card-nome">
                            <p>Verbas</p>
                        </div>
                    </div>

                    <?php
                }
                
                ?>

                <div onclick="location.href='./chamado.php'" class="card-btn">
                    <div class="card-icon">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                    <div class="card-nome">
                        <p>Chamados</p>
                    </div>
                </div>

                <div onclick="window.open('https://redepharma.com.br:2096/', '_blank')"  class="card-btn">
                    <div class="card-icon">
                        <ion-icon name="mail-outline"></ion-icon>
                    </div>
                    <div class="card-nome">
                        <p>Webmail</p>
                    </div>
                </div>
                <div onclick="window.open('http://interno.redepharma.com.br/bi/', '_blank')" class="card-btn">
                    <div class="card-icon">
                        <ion-icon name="stats-chart-outline"></ion-icon>
                    </div>
                    <div class="card-nome">
                        <p>BI</p>
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
                <p style="color: #fff">RedePharma ©</p>
                </div>
            </div>
        </section>
    </footer>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	</body>
</html>