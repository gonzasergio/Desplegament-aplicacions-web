<?php
session_start();

if (isset($_POST["nom"])){
    $nom = $_POST["nom"];
    $color = $_POST["color"];
    $preu = $_POST["preu"];
}

if (isset($_SESSION["carrito"])){
    if (!isset($_REQUEST["vaciar"])){
        if (!isset($_REQUEST["del"])){
            if (isset($_POST["nom"])){
                if (compruebaExistencia($nom)){
                    for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
                        if ($_SESSION["carrito"][$i]["nom"] == $nom){
                            $_SESSION["carrito"][$i]["quantitat"]++;
                        }
                    }
                } else {
                    array_push($_SESSION["carrito"], ["nom" => "$nom", "color" => "$color", "preu" => $preu, "quantitat" => 1]);
                }
                header('Location: carrito.php');
            }
        } else {
            borrarElemento($_REQUEST["del"]);
            header('Location: carrito.php');
        }
    } else {
        $_SESSION["carrito"] = [];
        header('Location: carrito.php');
    }

} else {
    $_SESSION["carrito"] = [];
    array_push($_SESSION["carrito"], ["nom" => "$nom", "color" => "$color", "preu" => $preu, "quantitat" => 1]);
}

function compruebaExistencia($nom){
    $existe = false;
    for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
        if ($_SESSION["carrito"][$i]["nom"] == $nom){
            $existe = true;
            break;
        }
    }
    return $existe;
}

function borrarElemento($id){
    if ($_SESSION["carrito"][$id]["quantitat"] == 1){
        unset($_SESSION["carrito"][$id]);
        reordenar();
    } else {
        $_SESSION["carrito"][$id]["quantitat"]--;
    }
}

function reordenar(){
    $carrito = [];
    for ($i = 0; $i < count($_SESSION["carrito"])+1; $i++) {
        if (isset($_SESSION["carrito"][$i])){
            $nom = $_SESSION["carrito"][$i]["nom"];
            $color = $_SESSION["carrito"][$i]["color"];
            $preu = $_SESSION["carrito"][$i]["preu"];
            $quantitat = $_SESSION["carrito"][$i]["quantitat"];
            array_push($carrito, ["nom" => "$nom", "color" => "$color", "preu" => $preu, "quantitat" => $quantitat]);
        }
    }
    $_SESSION["carrito"] = $carrito;
}
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

    <title>Carrito</title>
</head>
<body>
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <table class="table table-bordered table-striped text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>Nom</th>
                        <th>Color</th>
                        <th>Quantitat</th>
                        <th>Preu</th>
                        <th>-1</th>
                    </tr>
                </thead>
                <tbody>
                <?php //var_dump($_SESSION["carrito"]);
                for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {?>
                    <tr>
                        <td><?php echo $_SESSION["carrito"][$i]["nom"]?></td>
                        <td><?php echo $_SESSION["carrito"][$i]["color"]?></td>
                        <td><?php echo $_SESSION["carrito"][$i]["quantitat"]?></td>
                        <td><?php echo $_SESSION["carrito"][$i]["preu"]?>€</td>
                        <td><a id="btn<?php echo $i?>" class="btn btn-danger" href="carrito.php?del=<?php echo $i?>"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td>
                        <?php
                        $total = 0;

                        for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
                            $total += $_SESSION["carrito"][$i]["preu"] * $_SESSION["carrito"][$i]["quantitat"];
                        }
                        echo $total . "€";
                        ?>
                    </td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col text-right">
            <a class="btn btn-primary" href="index.php">Seguir Comprando</a>
            <a class="btn btn-danger" href="carrito.php?vaciar">Vaciar Carrito</a>
        </div>
    </div>
</div>
</body>
</html>