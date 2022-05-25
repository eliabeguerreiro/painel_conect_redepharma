<?php
session_start();
//echo("Location:http://10.7.0.214/chamados_teste/index.php?login=".$_SESSION['login']."&senha=".$_SESSION['senha']);

header("Location:http://10.7.0.214/chamados_teste/index.php?login=".$_SESSION['login']."&senha=".$_SESSION['senha']);
?>