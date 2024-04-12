<?php
    
    namespace App\persistence;

    class ConnectionFactory{

        static $dbuser = "root";
        static $dbname = "users";
        static $password = "";
        static $dbhost = "localhost";
        static $dbport = "3306";

        
        static $connectionInstance;

        public static function getConnection(){
            $strConn = "mysql:host". self::$dbhost. ";dbname=".self::$dbname;
            echo "<p>".$strConn."</p>";
            try{
            self::$connectionInstance = new \PDO($strConn, self::$dbuser, self::$password);
            self::$connectionInstance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            }catch(\PDOException $e){
                echo print_r ($e, true);
            }
            return self::$connectionInstance;
        }

    }