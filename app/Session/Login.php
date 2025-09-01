<?php 

    namespace App\Session;

    use App\Db\DataBase;

    use PDO;


    
    class Login{

        public static function isLogged(){
            return false;

        }

       public static function requiredLogin (){
        if(!self::isLogged()){
            header('location: login.php');
        }
     }
    
     public static function requireLogount (){
        if(self::isLogged()){
            header('location: index.php');
        }
     }

        
    }