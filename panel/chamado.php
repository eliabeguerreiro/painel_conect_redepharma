<?php
session_start();
//echo("Location:http://10.7.0.214/chamados_teste/index.php?login=".$_SESSION['login']."&senha=".$_SESSION['senha']);
//var_dump($_SESSION);
header("Location:http://10.7.0.214/chamados_teste/index.php?login=".$_SESSION['usuario']['login']."&senha=".$_SESSION['senham']);
?>