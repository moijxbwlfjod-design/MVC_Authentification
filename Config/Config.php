<?php

class Connection{
    static function ConnectToDB(){
        $conn = new PDO("mysql:dbname=$_ENV[db_name];host=localhost", $_ENV['db_user'], $_ENV["db_pass"]);
        return $conn;
    }
}
