<?php

require('../../../vendor/autoload.php');
require_once('../../../src/Constant.php');

use App\Classes\Auth;
use App\Classes\Database;

    $db = new Database(HOST_NAME, DB_USER, DB_PASS, DB_NAME);
    $pdo = $db->getPDO();
    $auth = new Auth($pdo, '../../index.php');

    $user = $auth->user()->requireRole('admin');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Administration</title>
</head>
<body>
    <div class="container">
        <br>
            <h1>Admin Dashboard</h1>
        <br>
    </div>
</body>
</html>