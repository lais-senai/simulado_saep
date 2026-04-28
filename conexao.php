<?php
$conn = mysqli_connect("localhost","root","","saep_db");

if(!$conn){
 die("Erro na conexão");
}

session_start();
?>