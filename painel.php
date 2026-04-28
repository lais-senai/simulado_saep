<?php
include("conexao.php");

if(!isset($_SESSION['usuario'])){
 header("Location:index.php");
}
?>

<h2>Bem-vindo <?php echo $_SESSION['usuario']; ?></h2>

<a href="produtos.php">Cadastro de Produtos</a><br><br>

<a href="estoque.php">Gestão de Estoque</a><br><br>

<a href="logout.php">Logout</a>