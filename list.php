<?php
    include_once 'includes/dbh.inc.php';
    if (!$conn) 
    {
      die("Connection failed: " . mysqli_connect_error());
    }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/backoffice.css">
    <link rel="icon" type="image/png" href="imagens/favicon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <title>Backoffice</title>
</head>

<header>
        <a href="list.php"><img src="imagens/logo.png" width="100"></a>
</header>

<?php
echo '<h1>Backoffice</h1>
<h3>Listagem de equipamentos</h3>';
    
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
    <td> Nr Série </td>
    <td> Stock </td>
</tr>
<?php

$i=0;  
while ($row = mysqli_fetch_assoc($result))
{
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
    <td> <?php echo $row2["preco"]; ?> € </td>
    <td> <?php echo $row2["nSerie"]; ?> </td>
    <td> <?php echo $row2["stock"]; ?> </td>
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



  



    
   

