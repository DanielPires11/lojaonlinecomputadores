<?php
    include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/desktops.css">
    <link rel="icon" type="image/png" href="imagens/favicon.png">
    <title>Desktops</title>
</head>
<body>
    <header>
        <a href="index.html"><img src="imagens/logo.png" width="100"></a>  
        <p id="login"><a href="php/login.php"><img src="imagens/login.png" width="50"><a href="php/basket.php"><img src="imagens/basket.png" height="50"></a></p>
        <div class="desktopstext">
            <h1>Desktops</h1>
        </div>
    </header>
    <form class="topnav" action="search.php" method="POST">
        <input type="text" name="pesquisa" placeholder="Procurar...">
        <button type="submit" name="butao-pesquisa">Procurar</button>
    </form>

    <!-- Área das fotografias dos computadores e descrição. -->

    <?php
            //Vai retornar os valores CPU, RAM, Disco e Gráfica
            $sql = "SELECT * FROM especificacao;";
            $resultados = mysqli_query($conn, $sql);
            $checkResultados = mysqli_num_rows($resultados);

            //Vai retornar os valores Preço
            $sql1 = "SELECT * FROM artigo;";
            $resultados1 = mysqli_query($conn, $sql1);
            //$checkResultados1 = mysqli_num_rows($resultados1);
            //$row1 = mysqli_fetch_assoc($resultados1);
            

            //Vai retornar os valores Designação
            $sql2 = "SELECT * FROM categoria;";
            $resultados2 = mysqli_query($conn, $sql2);
            //$checkResultados2 = mysqli_num_rows($resultados2);
            //$row2 = mysqli_fetch_assoc($resultados2);
            
            if($checkResultados > 0) {
                while($row = mysqli_fetch_assoc($resultados)){
                    $row1 = mysqli_fetch_assoc($resultados1);
                    $row2 = mysqli_fetch_assoc($resultados2);

    ?>

    <div class="desktops">      
        <img src="<?php echo $row1['fotografia']?>" widht="600" height="400">
        <div class="descrição">
            <h4>
                <?php 
                    echo $row2['designacao'] . "<br>";
                ?>
            </h4>
            Processador: 
            <?php 
                echo $row['cpu'] . "<br>Placa Gráfica: ";
                echo $row['placaGrafica'] . "<br>Memória RAM: ";
                echo $row['ram'] . "<br>Disco: ";
                echo $row['disco'] . "<br>";
            ?>
            <br>
            <br>
            Preço: 
            <?php 
                echo $row1['preco'] . " €"; 
            ?>
    
        </div>
    </div>
        <?php
                }
            }                
        ?>  

    <!-- Fim da área das fotografias dos computadores e descrição. -->
    
        
    <!-- Menu lateral. -->
    <section>
        <aside id="aside-left">
            <nav class="menu">
                <ul>
                    <li><a href="desktops.html">Desktops</a></li>
                    <li><a href="portateis.html">Portáteis</a></li>
                    <li><a href="armazenamento.html">Armazenamento</a></li>
                    <li><a href="software.html">Software</a></li>
                    <li><a href="outlet.html">Outlet</a></li>
                </ul>
            </nav>
        </aside>
    </section>
    <!-- Menu lateral. -->

</body>
</html>