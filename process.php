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
		echo "Gravado com sucesso";
	 } 
     else {
		echo "Algo correu mal: " . $sql . "
" . mysqli_error($conn);
	 }
	 
     mysqli_close($conn);
}

  ?>