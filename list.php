<?php
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "lojaonlinecomputadores";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


?>
<header>
        <a href="list.php"><img src="imagens/logo.png" width="100"></a>
</header>
<?php
echo "Database Connected Successfully";
echo '<h1>Backoffice</h1>
<h3>Listagem de equipamentos</h3>';
    

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  $sql = "SELECT * FROM artigo";
  $result = mysqli_query($conn, $sql);
  $queryresult = mysqli_num_rows($result);
  
  if ($queryresult > 0) {
    ?>

    <table>
  
  <tr>
    <td>Nº Série</td>
    <td>Designação</td>
    <td>Preço</td>
    <td>Fotografia</td>
  </tr>
<?php

$i=0;  
while($row = mysqli_fetch_assoc($result)) {
?>

<tr>
    <td><?php echo $row["nSerie"]; ?></td>
    <td><?php echo $row["designacao"]; ?></td>
    <td><?php echo $row["preco"]; ?></td>
    <td><?php echo $row["fotografia"]; ?></td>
</tr>

<?php
$i++;
}
?>
</table>
 <?php
}
else{
    echo "Sem resultados";
}
?>
<br>
<form method="get" action="insert.php"><button type="submit">Novo</button></form>



  



    
   

