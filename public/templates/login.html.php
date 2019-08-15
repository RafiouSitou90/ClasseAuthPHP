<?php

use App\Classes\Auth;
use App\Classes\Database;

require('../../vendor/autoload.php');

session_start();

require_once('../../src/Constant.php');

$error = false;

$db = new Database(HOST_NAME, DB_USER, DB_PASS, DB_NAME);
$pdo = $db->getPDO();
$auth = new Auth($pdo);

if($auth->user() !== null) {
    header('Location: ../../index.php');
    exit();
}


if(!empty($_POST)) {


    $user = $auth->login($_POST['username'], $_POST['password']);

    if($user) {
        header('Location: ../../index.php?login=1');
        exit();
    }
    $error = true;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Login</title>
</head>
<body class="p-4">
    <h1>Se connecter</h1>

    <?php if($error): ?>
        <div class="alert alert-danger">
            Identifiant ou mot de passe incorrect
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>

    <form action="" method="post">
        <div class="form-group">
            <input type="text" name="username" id="username" placeholder="Pseudo" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" placeholder="Mot de passe" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>