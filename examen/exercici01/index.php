<?php
session_start();


$items[0] = array("nom" => "Camiseta fressetes", "color" => "groc", "preu" => "5");
$items[1] = array("nom" => "Camiseta Lion", "color" => "rosa", "preu" => "10");
$items[2] = array("nom" => "Camiseta Polaroid", "color" => "negre", "preu" => "15");
$items[3] = array("nom" => "Camiseta HAPPY", "color" => "groc", "preu" => "20");
$items[4] = array("nom" => "Camiseta Powe Girl", "color" => "negre", "preu" => "25");
$items[5] = array("nom" => "Camiseta Rayo", "color" => "rosa", "preu" => "30");

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/5de91a6d37.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="global.js"></script>

    <title>Exercici01</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-2">
            <ul class="navbar-nav mr-auto">
                FILTRE:
                <li class="nav-item"><a class="nav-link" href="index.php"><i class="far fa-square"></i> Groc</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php"><i class="far fa-square"></i> Negre</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php"><i class="far fa-square"></i> Rosa</a></li>
            </ul>
        </div>

    <div class="col-10"><div class="row">
<?php  if(isset($_SESSION["seleccionada"])){ ?>
    <div class="card m-1" style="width: 18rem;">
        <img class="card-img-top" src="img/<?= $_SESSION["seleccionada"] ?>.webp" alt="Card image cap">
        <div class="card-body">
            <p class="card-text"><?php echo $items[$_SESSION["seleccionada"]]["nom"] ?> <?php echo $items[$_SESSION["seleccionada"]]["preu"] ?>€</p>
            <button class="btn btn-primary" onclick="post('producte.php', {id:<?= $_SESSION["seleccionada"] ?>, nom:'<?php echo $items[$_SESSION["seleccionada"]]["nom"] ?>', color:'<?php echo $items[$_SESSION["seleccionada"]]["color"] ?>', preu:<?php echo $items[$_SESSION["seleccionada"]]["preu"] ?>})">Selecciona</button>
            <button id="<?php echo $_SESSION["seleccionada"] ?>" class="btn btn-success" onclick="post('carrito.php', {nom:'<?php echo $items[$_SESSION["seleccionada"]]["nom"] ?>', color:'<?php echo $items[$_SESSION["seleccionada"]]["color"] ?>', preu:<?php echo $items[$_SESSION["seleccionada"]]["preu"] ?>})">Compra</button>
        </div>
    </div>
    <?php for($x = 0; $x < count($items); $x++) {
        if($x != $_SESSION["seleccionada"]){?>

            <div class="card m-1" style="width: 18rem;">
                <img class="card-img-top" src="img/<?= $x ?>.webp" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text"><?php echo $items[$x]["nom"] ?> <?php echo $items[$x]["preu"] ?>€</p>
                    <button class="btn btn-primary" onclick="post('producte.php', {id:<?= $x ?>, nom:'<?php echo $items[$x]["nom"] ?>', color:'<?php echo $items[$x]["color"] ?>', preu:<?php echo $items[$x]["preu"] ?>})">Selecciona</button>
                    <button id="<?php echo $x ?>" class="btn btn-success" onclick="post('carrito.php', {nom:'<?php echo $items[$x]["nom"] ?>', color:'<?php echo $items[$x]["color"] ?>', preu:'<?php echo $items[$x]["preu"] ?>'})">Compra</button>
                </div>
            </div>

<?php }}} else {
    for($x = 0; $x < count($items); $x++) {?>
        <div class="card m-1" style="width: 18rem;">
            <img class="card-img-top" src="img/<?= $x ?>.webp" alt="Card image cap">
            <div class="card-body">
                <p class="card-text"><?php echo $items[$x]["nom"] ?> <?php echo $items[$x]["preu"] ?>€</p>
                <button class="btn btn-primary" onclick="post('producte.php', {id:<?= $x ?>, nom:'<?php echo $items[$x]["nom"] ?>', color:'<?php echo $items[$x]["color"] ?>', preu:<?php echo $items[$x]["preu"] ?>})">Selecciona</button>
                <button id="<?php echo $x ?>" class="btn btn-success" onclick="post('carrito.php', {nom:'<?php echo $items[$x]["nom"] ?>', color:'<?php echo $items[$x]["color"] ?>', preu:'<?php echo $items[$x]["preu"] ?>'})">Compra</button>
            </div>
        </div>
<?php }} ?>
    </div></div>
</div>
</div>
</body>
</html>