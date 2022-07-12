<?php 
session_start();

define('HOST1', 'redepharma.com.br:3306');
define('USUARIO1', 'redeph12_inventario');
define('SENHA1', 'redeph@inventario');
define('DB1', 'redeph12_usuarios');

$conn_user = mysqli_connect(HOST1, USUARIO1, SENHA1, DB1) or die ('Falha na conexão com o Banco de Dados!');


if($_POST != null){
    $username = $_POST['user'];
    $senha = $_POST['hash'];
    $senha_encriptada = password_hash($senha, PASSWORD_DEFAULT);
}
?>
<form action="" method="post">
    <label for="user">USUARIO:</label>
    <input name="user" type="text">
    <label for="hash">SENHA:</label>
    <input name="hash" type="password">
    <input type="submit" value="Update Senha">
</form>

<?php

if($_POST != null){
$result_username = "SELECT * FROM usuarios WHERE usuario = '$username'";
$resultado_user = mysqli_query($conn_user, $result_username);
$dadoUser=mysqli_fetch_assoc($resultado_user);

$update_senha = "UPDATE usuarios SET senha = '".$senha_encriptada."' WHERE id_user = ".$dadoUser['id_user'];
$resultado_user = mysqli_query($conn_user, $update_senha);

//header('Location:../index.php');
}