<?php
    include_once 'includes/dbh.inc.php';
?>

<link rel="stylesheet" href="css/desktops.css">

<header>
        <a href="index.html"><img src="imagens/logo.png" width="100"></a>
        <p id="login"><a href="php/login.php"><img src="imagens/login.png" width="50"><a href="php/basket.php"><img src="imagens/basket.png" height="50"></a></p>
</header>

<a href="desktops.php"><h3 class="desktopstxt">Voltar para Desktops</h3></a>
<h1>Página de Pesquisa</h1>

    <?php
        if(isset($_POST['botao-pesquisa'])) {
            $pesquisa = mysqli_real_escape_string($conn, $_POST['pesquisa']);    //Proteger de ataques de sql injection
            $sql = "SELECT * FROM categoria WHERE designacao LIKE '%$pesquisa%'";
            $resultados = mysqli_query($conn, $sql);
            $queryResultado = mysqli_num_rows($resultados);

            //Selecionar o fotografia que corresponde à pesquisa
            $sql1 = "SELECT artigo.fotografia FROM artigo 
                    INNER JOIN categoria ON artigo.designacao = categoria.id_categoria 
                    WHERE categoria.designacao LIKE '%$pesquisa%'";
            $resultados1 = mysqli_query($conn, $sql1);
            
            //Selecionar o designacao que corresponde à pesquisa        
            $sql2 = "SELECT categoria.designacao 
                    FROM categoria 
                    WHERE categoria.designacao LIKE '%$pesquisa%'";
            $resultados2 = mysqli_query($conn, $sql2);
            
            //Selecionar o especificacao que corresponde à pesquisa 
            $sql3 = "SELECT * FROM categoria
                    INNER JOIN artigo ON categoria.id_categoria = artigo.designacao
                    INNER JOIN artigo_especificacao ON artigo.nSerie = artigo_especificacao.artigo
                    INNER JOIN especificacao ON artigo_especificacao.especificacao = especificacao.id_especificacao 
                    WHERE categoria.designacao LIKE '%$pesquisa%'";
            $resultados3 = mysqli_query($conn, $sql3);
            
            echo "<h1 class='desktopstext'>Foram encontrados " . $queryResultado . " Item(s)" . "</h1>";
            

            if($queryResultado > 0) {
                while($row = mysqli_fetch_assoc($resultados)){
                    $row1 = mysqli_fetch_assoc($resultados1);
                    $row2 = mysqli_fetch_assoc($resultados2);
                    $row3 = mysqli_fetch_assoc($resultados3);
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
                                echo $row3['cpu'] . "<br>Placa Gráfica: ";
                                echo $row3['placaGrafica'] . "<br>Memória RAM: ";
                                echo $row3['ram'] . "<br>Disco: ";
                                echo $row3['disco'] . "<br>";
                            ?>
                        </div>
                    </div>
        <?php
                }
            }
            else {
                echo "Não há resultados para a pesquisa realizada, tente novamente.";
            }
        }
        ?>