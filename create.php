<?php include "templates/header.php"; ?>

<?php
    include_once 'includes/dbh.inc.php';
?>

<!-- 
    inserção para a base de dados
 -->

 <?php
 $new_artigo = array(
      "nSerie" => $_POST['nSerie'],
      "designacao"  => $_POST['designacao'],
      "preco"     => $_POST['preco'],
      "fotografia"       => $_POST['fotografia'],
      "comentario"       => $_POST['comentario'],
      "stock"       => $_POST['stock']
        );

    $sql = sprintf(
"INSERT INTO %s (%s) values (%s)",
"artigo",
implode(", ", array_keys($new_artigo)),
":" . implode(", :", array_keys($new_artigo))
    );

?>


<?php if (isset($_POST['submit']) && $statement) { ?>
  > <?php echo $_POST['nSerie']; ?> Inserido com sucesso.
<?php } ?>

<h1>Novo</h1>

<form method="post">
    	<label for="nSerie">Número de série</label>
    	<input type="text" name="nSerie" id="nSerie">

    	<label for="designacao">Designação</label>
    	<input type="text" name="designacao" id="designacao">
    	
        <label for="preco">Preço</label>
    	<input type="text" name="preco" id="preco">
    	
        <label for="fotografia">Fotografia</label>
    	<input type="text" name="fotografia" id="fotografia">
    	
        <label for="stock">Stock</label>
    	<input type="text" name="stock" id="stock">

    	<input type="submit" name="submit" value="Submit">
    </form>

    <a href="backoffice.php">Backoffice</a>



<?php include "templates/footer.php"; ?>