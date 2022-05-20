<?php
session_start();
header( "Location: https://chamados.redepharma.com.br?login=".$_SESSION['login']."&senha=".$_SESSION['senha']);
session_abort();
?>