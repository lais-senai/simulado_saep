<?php
include("conexao.php");

if(!isset($_SESSION['usuario'])){
 header("Location:index.php");
}

/* SALVAR NOVO PRODUTO */
if(isset($_POST['salvar'])){

$nome = $_POST['nome'];
$marca = $_POST['marca'];
$estoque = $_POST['estoque'];
$minimo = $_POST['minimo'];

if($nome == "" || $marca == "" || $estoque == "" || $minimo == ""){
 echo "Preencha todos os campos <br><br>";
}else{

mysqli_query($conn,"INSERT INTO produtos
(nome,marca,estoque,minimo)
VALUES
('$nome','$marca','$estoque','$minimo')");
}
}

/* EXCLUIR */
if(isset($_GET['excluir'])){

$id = $_GET['excluir'];

mysqli_query($conn,"DELETE FROM produtos
WHERE idprodutos='$id'");
}

/* EDITAR */
if(isset($_POST['editar'])){

$id = $_POST['id'];
$nome = $_POST['nome'];
$marca = $_POST['marca'];
$estoque = $_POST['estoque'];
$minimo = $_POST['minimo'];

mysqli_query($conn,"UPDATE produtos SET
nome='$nome',
marca='$marca',
estoque='$estoque',
minimo='$minimo'
WHERE idprodutos='$id'");
}
?>

<h2>Cadastro de Produtos</h2>

<form method="post">

Nome:<br>
<input type="text" name="nome"><br>

Marca:<br>
<input type="text" name="marca"><br>

Estoque:<br>
<input type="number" name="estoque"><br>

Minimo:<br>
<input type="number" name="minimo"><br><br>

<input type="submit" name="salvar" value="Salvar">

</form>

<hr>

<form method="get">

Buscar Produto:<br>
<input type="text" name="busca">
<input type="submit" value="Buscar">

</form>

<hr>

<table border="1" cellpadding="5">

<tr>
<th>ID</th>
<th>Nome</th>
<th>Marca</th>
<th>Estoque</th>
<th>Minimo</th>
<th>Ações</th>
</tr>

<?php

$busca = "";

if(isset($_GET['busca'])){
$busca = $_GET['busca'];
}

$sql = "SELECT * FROM produtos
WHERE nome LIKE '%$busca%'";

$resultado = mysqli_query($conn,$sql);

while($dados = mysqli_fetch_assoc($resultado)){

echo "<tr>";

echo "<td>".$dados['idprodutos']."</td>";
echo "<td>".$dados['nome']."</td>";
echo "<td>".$dados['marca']."</td>";
echo "<td>".$dados['estoque']."</td>";
echo "<td>".$dados['minimo']."</td>";

echo "<td>
<a href='produtos.php?excluir=".$dados['idprodutos']."'>Excluir</a>
</td>";

echo "</tr>";
}
?>

</table>

<br>

<a href="painel.php">Voltar ao Painel</a>