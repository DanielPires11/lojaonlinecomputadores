<?php
    include_once 'includes/dbh.inc.php';
?>

<link rel="stylesheet" href="css/desktops.css">

<h1>Página de Pesquisa</h1>

    <?php
        if(isset($_POST['butao-pesquisa'])) {
            $pesquisa = mysqli_real_escape_string($conn, $_POST['pesquisa']);    //Proteger de ataques de sql injection
            $sql = "SELECT * FROM categoria WHERE designacao LIKE '%$pesquisa%'";
            $resultados = mysqli_query($conn, $sql);
            $queryResultado = mysqli_num_rows($resultados);

            $sql1 = "SELECT * FROM artigo;";
            $resultados1 = mysqli_query($conn, $sql1);
            
                    
            $sql2 = "SELECT * FROM categoria;";
            $resultados2 = mysqli_query($conn, $sql2);
            

            $sql3 = "SELECT * FROM especificacao;";
            $resultados3 = mysqli_query($conn, $sql3);
            


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