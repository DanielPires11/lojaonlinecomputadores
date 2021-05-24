

<?php
    include_once 'includes/dbh.inc.php';
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/backoffice.css">
    <link rel="icon" type="image/png" href="imagens/favicon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <title>Backoffice</title>
</head>
<body>
<header>
        <a href="list.php"><img src="imagens/logo.png" width="100"></a>
</header>

<?php
  
  if(isset($_POST['guardar']))
{	 
	  $id = $_POST['id'];
	  $preco = $_POST['preco'];
	  $fotografia = $_POST['fotografia'];
    $designacao = $_POST['designacao'];
    $cpu = $_POST['cpu'];   
    $ram = $_POST['ram'];
    $disco = $_POST['disco'];
    $ecra = $_POST['ecra'];       
    $placaGrafica = $_POST['placaGrafica'];   
    $descricao = $_POST['descricao']; 
    $stock = $_POST['stock'];  


$sql = "INSERT INTO artigo (designacao,preco,fotografia,stock)
VALUES ('$id','$preco','$fotografia','$stock')";

$sql1 = "INSERT INTO categoria (id_categoria, designacao)
VALUES ('$id', '$designacao')";

$sql3 = "INSERT INTO especificacao (cpu, ram, disco, ecra, placaGrafica)
values ('$cpu', '$ram', '$disco', '$ecra', '$placaGrafica')";

$sql4 = "INSERT INTO artigo_especificacao (artigo, especificacao, descricao)
values ('$id', '$id', '$descricao')";


     if (mysqli_query($conn, $sql)){
        if (mysqli_query($conn, $sql1)){
            if (mysqli_query($conn, $sql3)){
                if (mysqli_query($conn, $sql4)){
		echo "<br>Gravado com sucesso";
	 } else {
    echo "<br>Algo correu mal sql: ";
   } 
  
  }
  else {
    echo "<br>Algo correu mal: sql1";
   }
 }
 else {
  echo "<br>Algo correu mal: sql2";
 }
 }

     else {
		echo "<br>Algo correu mal: sql3";
	 }
	 
     mysqli_close($conn);
}
  ?>
<br>
<form method="get" action="insert.php"><button type="submit">Novo</button></form>
<form method="get" action="list.php"><button type="submit">Lista</button></form>