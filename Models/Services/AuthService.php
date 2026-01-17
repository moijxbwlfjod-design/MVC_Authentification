<?php

class AuthService{
    function login(string $email, string $password){

    }

    function registration(string $first_name, string $last_name, string $email, string $password, string $role){
        $userRepo = new UsersRepository();
        return $userRepo->create($first_name,$last_name,$email,$password,$role);
    }

    function logout(){
        
    }
}