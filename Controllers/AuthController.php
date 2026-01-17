<?php
require_once __DIR__ . "/../Models/Services/Validation.php";
require_once __DIR__ . "/../Models/Services/AuthService.php";

class AuthController{
    //function login(){

    //}

    function registration(){
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["role"]) && Validation::RegisterValidation($_POST["first_name"], $_POST["last_name"], $_POST["email"], $_POST["password"], $_POST["role"])){
                $AuthSer = new AuthService();
                if($AuthSer->registration($_POST["first_name"], $_POST["last_name"], $_POST["email"], $_POST["password"], $_POST["role"])){
                    echo "<script>
                            fetch(
                                '/../Views/View.php',{
                                    method: 'POST',
                                    body: 'name=$_POST[first_name] $_POST[last_name]'
                                }
                            ).then(res => res.text());
                          </script>";
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
$AuthController->registration();