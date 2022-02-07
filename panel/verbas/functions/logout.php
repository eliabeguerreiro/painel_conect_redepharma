<?php
session_start();
include("../functions/connection.php");
include("../functions/fun.php");

if($_GET['sair']){
  if($_GET['sair'] == 'sim'){
    header("Location:../../index.php");
  }
}
