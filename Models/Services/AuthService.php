<?php

class AuthService{
    function login(string $email, string $password){
        $userRepo = new UsersRepository();
        return $userRepo->login($email, $password);
    }

    function registration(string $first_name, string $last_name, string $email, string $password, string $role){
        $userRepo = new UsersRepository();
        $password = password_hash($password, PASSWORD_DEFAULT);
        return $userRepo->create($first_name,$last_name,$email,$password,$role);
    }

    function logout(){
        
    }
}