<?php
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
class Connection{
    static function ConnectToDB(){
        $conn = new PDO("mysql:dbname=$_ENV[db_name];host=localhost", $_ENV['db_user'], $_ENV["db_pass"]);
        return $conn;
    }
}
