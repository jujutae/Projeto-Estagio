<?php 

    namespace App\Session;

    use App\Db\DataBase;

    use PDO;


    //ta dando erro 
    
    class Login{

        private static function init(){
            if(session_status() !== PHP_SESSION_ACTIVE){
                session_start();

            }
        }

        public static function getAlunoLogado(){
            self::init();

            return self::isLogged() ? $_SESSION['aluno'] : null;
        }

        public static function login($aluno){
                self::init();

                $_SESSION['aluno'] = [
                    'id' => $aluno ->id,
                    'nome' => $aluno-> nome,
                    'cpf' => $aluno-> cpf
                ];

                header('locatiom: /si/index.php');
        }

        public static function isLogged(){
            self::init();
            return isset($_SESSION['cpf']['id']);

        }

       public static function requiredLogin (){
        if(!self::isLogged()){
            header('location: /si/login.php');
        }
     }
    
     public static function requireLogount (){
        if(self::isLogged()){
            header('location: /si/index.php');
        }
     }

        
    }