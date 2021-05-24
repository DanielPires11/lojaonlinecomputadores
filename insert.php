
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/backoffice.css">
    <link rel="icon" type="image/png" href="imagens/favicon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <title>Backoffice</title>
</head>
<body>
<header>
        <a href="list.php"><img src="imagens/logo.png" width="100"></a>
</header>

<h1>Insira um novo produto</h1>

<form action="process.php" method="post">

ID <input type="text" name="id" /><br>
Preço <input type="text" name= "preco" /><br>
Fotografia <input type="text" name="fotografia" /><br>
Designação <input type="text" name="designacao" /><br>
Processador <input type="text" name="cpu" /><br>
Memória <input type="text" name="ram" /><br>
Disco <input type="text" name="disco" /><br>
Ecrã <input type="text" name="ecra" /><br>
Gráfica <input type="text" name="placaGrafica" /><br>
Descrição <input type="text" name="descricao" /><br>
Stock <input type="text" name="stock" /><br>

<input type="submit" name="guardar" value="Gravar">

</form>

</body>
</html>