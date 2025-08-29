<?php
$hostname = 'localhost';
$username = 'root';
$senha = '123';
$conexao = mysqli_connect($hostname, $username, $senha);
$db= mysqli_select_db($conexao, "wdev_vagas");
$senhac = password_hash('123' , PASSWORD_DEFAULT);
$sql = "update alunos set senha = '$senhac'";
mysqli_query($conexao, $sql);

?>