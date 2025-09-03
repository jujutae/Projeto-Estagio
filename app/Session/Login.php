<?php

namespace App\Session;



class Login
{

    private static function init()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function getAlunoLogado()
    {
        self::init();
        return self::isLogged() ? $_SESSION['aluno'] : null;
    }

    public static function login($aluno)
    {
        self::init();

        $_SESSION['aluno'] = [
            'id'   => $aluno->id,
            'nome' => $aluno->nome,
            'cpf'  => $aluno->cpf
        ];

        header('location: /si/index.php');
        exit;
    }

    public static function logout(){
    self::init();

    unset($_SESSION['aluno']);

    header('location: /si/login.php');
    exit;
    }
    
    public static function isLogged()
    {
        self::init();
        return isset($_SESSION['aluno']['id']);
    }

    public static function requiredLogin()
    {
        if (!self::isLogged()) {
            header('location: /si/login.php');
            exit;
        }
    }

    public static function requireLogout()
    {
        if (self::isLogged()) {
            header('location: /si/index.php');
            exit;
        }
    }
}
