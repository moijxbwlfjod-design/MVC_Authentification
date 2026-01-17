<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . "/../Models/Services/Validation.php";
require_once __DIR__ . "/../Models/Services/AuthService.php";

class AuthController{
    function login(){
        if(isset($_POST["Login-Btn"])){
            if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["first_name"]) && Validation::EmailValidation($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["first_name"])){
                $AuthSer = new AuthService();
                if($AuthSer->login($_POST["first_name"], $_POST["email"], $_POST["password"])){
                    $_SESSION["name"] = $_POST["first_name"] . $_POST["last_name"];
                    header("location: ../Views/View.php");
                    exit;
                }
            } else{
                die("<script>alert('Please Give Valide Data In Form')</script>");
            }
        }
    }

    function registration(){
        if(isset($_POST["Register-Btn"])){
            if(isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["role"]) && Validation::RegisterValidation($_POST["first_name"], $_POST["last_name"], $_POST["email"], $_POST["password"], $_POST["role"])){
                $AuthSer = new AuthService();
                if($AuthSer->registration($_POST["first_name"], $_POST["last_name"], $_POST["email"], $_POST["password"], $_POST["role"])){
                    $_SESSION["name"] = $_POST["first_name"] . $_POST["last_name"];
                    header("location: ../Views/View.php");
                    exit;
                }
            } else{
                die("<script>alert('Please Give Valide Data In Form')</script>");
            }
        }
    }

    //function logout(){

    //}
}

$AuthController = new AuthController();
$AuthController->login();
$AuthController->registration();