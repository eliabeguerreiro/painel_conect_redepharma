<?php

function msg_sistem ($msg){    
    echo "<div class='alert alert-warning' role='alert'><center>";
    echo $_SESSION['msg'];
    echo"</div></center>";
        }




function pegarTotal ($conn, $verba){


    $sql = "SELECT * FROM verba WHERE id_verba  = $verba";
    $sqlve = mysqli_query($conn, $sql);
    $sqlverba = mysqli_fetch_assoc($sqlve);

    $sqlm = "SELECT * FROM movimentacao WHERE verba  = $verba";
    $sqlmo = mysqli_query($conn, $sqlm);
    $sub = 0;

    while($sqlmovimentacao = mysqli_fetch_assoc($sqlmo)){
        $sub  += $sqlmovimentacao['valor'];
        
    }

    $valorinicial = $sqlverba['valor'];
    
    if($sub == 0){
        
    }else{
        return($sub);
    }   
}



function pegarAutor ($conn, $conn2, $verba){
    
    $sql = "SELECT * FROM verba WHERE id_verba  = $verba";
    $sqlv = mysqli_query($conn, $sql);
    $sqlve = mysqli_fetch_assoc($sqlv);
    

    $sqlu = "SELECT * FROM usuarios WHERE id_user = '".$sqlve['autor']."'";
    $sqlus = mysqli_query($conn2, $sqlu);
    $user = mysqli_fetch_assoc($sqlus);
    return($user['nome']);



}