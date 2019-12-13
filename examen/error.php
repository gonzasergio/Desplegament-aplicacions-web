<?php

$text = [
    "es" => [
        "user" => "usuario",
        "pass" => "contraseña",
        "submit" => "enviar"],
    "cat" => [
        "user" => "usuari",
        "pass" => "contrasenya",
        "submit" => "send"],
    "en" => [
        "user" => "user",
        "pass" => "password",
        "submit" => "send"],
];

$lang="en";

if (isset($_COOKIE['lang'])){
    $lang=$_COOKIE['lang'];
}

if (isset($_GET['lang'])) {
    $lang=$_GET['lang'];
    setcookie('lang',"$lang");
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
    <title>Document</title>
</head>
<body>

<nav class="navbar navbar-dark navbar-expand bg-dark justify-content-between">
    <a class="navbar-brand" href="#">
        <img src="/prova/superhero.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        Projectes i Consultoria TIC
    </a>
    <ul class="navbar-nav">
        <li class="nav-item <?php if ($lang == 'es') echo 'active' ?>"><a href="error.php?lang=es" class="nav-link">ES</a></li>
        <li class="nav-item <?php if ($lang == 'en') echo 'active' ?>"><a href="error.php?lang=en" class="nav-link">EN</a></li>
        <li class="nav-item <?php if ($lang == 'cat') echo 'active' ?>"><a href="error.php?lang=cat" class="nav-link">CAT</a></li>
    </ul>
</nav>

<div class="container">
    <div class="row py-5">
        <div class="col-sm-4 mx-auto">
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="user"><?php echo $text[$lang]['user']?>:</label><input type="text" class="form-control" name="user" id="user">
                </div>
                <div class="form-group">
                    <label for="pass"><?php echo $text[$lang]['pass']?>:</label><input type="text" class="form-control" name="pass" id="pass">
                </div>
                <button type="submit" class="btn btn-primary btn-block"><?php echo $text[$lang]['submit']?></button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<?php
