<?php
    // $dbServername = "localhost";
    // $dbUsername = "root";
    // $dbPassword = "";
    // $dbName = "lojaonlinecomputadores";

    // $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    include_once 'includes/dbh.inc.php';


echo "Database Connected Successfully";   

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
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


$sql = "INSERT INTO artigo (designacao,preco,fotografia)
VALUES ('$id','$preco','$fotografia')";

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
	 } } } }
     else {
		echo "<br>Algo correu mal: " . $sql . "
" . mysqli_error($conn);
	 }
	 
     mysqli_close($conn);
}
  ?>
<br>
<form method="get" action="insert.php"><button type="submit">Novo</button></form>
<form method="get" action="list.php"><button type="submit">Lista</button></form>