<?php
session_start();

$_SESSION["seleccionada"] = $_POST["id"];
$nom = $_POST["nom"];
$color = $_POST["color"];
$preu = $_POST["preu"];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="global.js"></script>

    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <h1>PÀGINA QUE MOSTRA EL PRODUCTE <?php echo $_SESSION["seleccionada"]?></h1>
    </div>
    <div class="row">
        <img src="img/<?php echo $_SESSION["seleccionada"]?>.webp" style="width: 400px" alt="">
    </div>
    <div class="row">
        <a href="index.php" class="btn btn-primary">TORNAR A LA LLISTA</a>
        <button id="<?php echo $_SESSION["seleccionada"] ?>" class="btn btn-success ml-2" onclick="post('carrito.php', {nom:'<?php echo $nom ?>', color:'<?php echo $color ?>', preu:<?php echo $preu ?>})">COMPRA</button>
    </div>
</div>
</body>
</html>