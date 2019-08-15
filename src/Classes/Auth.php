<?php

namespace App\Classes;

use App\Models\User;
use PDO;

class Auth {

    private $pdo;

    private $loginPath;

    public function __construct(PDO $pdo, string $loginPath = '')
    {
        $this->pdo = $pdo;
        $this->loginPath = $loginPath;
    }


    public function user(): ?User
    {
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $id = $_SESSION['auth'] ?? null;
        if($id === null) {
            return null;
        }
        $query = $this->pdo->prepare('SELECT * FROM users WHERE id = ?');
        $query->execute([$id]);
        $user = $query->fetchObject(User::class);
        
        return $user ?: null;
    }

    public function login(string $username, string $password): ?User
    {
        $query = $this->pdo->prepare('SELECT * FROM users WHERE username = :username');
        $query->execute(['username' => $username]);
        $user = $query->fetchObject(User::class);

        if($user === false){
            return null;
        }

        if(password_verify($password, $user->passwords)) {
            if(session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['auth'] = $user->id;
            return $user;
        }
        return null;
    }

    public function requireRole(string $role): void
    {
        $user = $this->user();

        if($user === null || $user->roles !== $role) {
            header("Location: {$this->loginPath}?forbid=1");
            exit();
        }
    }


}