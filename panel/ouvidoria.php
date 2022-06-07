<?php
session_start();
header("Location:http://10.7.0.214/ouvidoria/index.php?login=".$_SESSION['login']."&senha=".$_SESSION['senha']);
?>