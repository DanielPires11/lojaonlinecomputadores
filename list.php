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
  
  $sql = "SELECT * FROM categoria";
  $result = mysqli_query($conn, $sql);
  $queryresult = mysqli_num_rows($result);
  
  $sql1 = "SELECT * FROM  especificacao";
  $result1 = mysqli_query($conn, $sql1);
  
  $sql2 = "SELECT * FROM  artigo";
  $result2 = mysqli_query($conn, $sql2);

  if ($queryresult > 0) {
    ?>

    <table>
  
  <tr>
    <td> Descrição </td>
    <td> CPU </td>
    <td> RAM </td>
    <td> Disco </td>
    <td> Ecrã </td>
    <td> Gráfica </td>
    <td> Preço </td>
  </tr>
<?php
$i=0;  
while($row = mysqli_fetch_assoc($result)){
    $row1 = mysqli_fetch_assoc($result1);
    $row2 = mysqli_fetch_assoc($result2);
    
?>

<tr>
    <td> <?php echo $row["designacao"]; ?> </td>
    <td> <?php echo $row1["cpu"]; ?> </td>
    <td> <?php echo $row1["ram"]; ?> </td>
    <td> <?php echo $row1["disco"]; ?> </td>
    <td> <?php echo $row1["ecra"]; ?> </td>
    <td> <?php echo $row1["placaGrafica"]; ?> </td>
    <td> € <?php echo $row2["preco"]; ?> </td>
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



  



    
   

