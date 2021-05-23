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
	 $designacao = $_POST['designacao'];
	 $preco = $_POST['preco'];
	 $fotografia = $_POST['fotografia'];
	 $comentario = $_POST['comentario'];

	 $sql = "INSERT INTO artigo (designacao,preco,fotografia,comentario)
	 VALUES ('$designacao','$preco','$fotografia','$comentario')";
	 
     if (mysqli_query($conn, $sql)) {
		echo "<br>Gravado com sucesso";
	 } 
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