<?php

require('vendor/autoload.php');

$faker = Faker\Factory::create('fr_FR');

$pdo = new \PDO('mysql:host=localhost;dbname=db_classe_auth;charset=utf8mb4', 'root', '', [
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
]);

$userQuery = $pdo->prepare("INSERT INTO users SET username = :username, passwords = :passwords, roles = :roles");


for ($i = 0; $i < 10; $i++) {
    $username = 'user'.$i;
    $passwords = password_hash('user'.$i, PASSWORD_ARGON2I);
    $roles = $faker->randomElement(array('admin', 'user'));

    $userQuery->execute(compact('username', 'passwords', 'roles'));
}