<?php
require_once __DIR__ . "/../Repositories/UsersRepository.php";


class AuthService{
    function login(string $first_name, string $email, string $password){
        $userRepo = new UsersRepository();
        return $userRepo->login($first_name, $email, $password);
    }

    function registration(string $first_name, string $last_name, string $email, string $password, string $role){
        $userRepo = new UsersRepository();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        return $userRepo->create($first_name,$last_name,$email,$hash,$role);
    }

    function logout(){
        try{
            session_start();
            session_unset();
            session_destroy();
            return true;
        }catch(Exception $e){
            return false;
        }
    }
}

