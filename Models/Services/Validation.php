<?php
require_once __DIR__ . "/../Repositories/UsersRepository.php";


class Validation{
    static function NameValidation(string $first_name,string $last_name){
        $pattern = "/^\w{2,25}$/";
        if(!empty($first_name) && !empty($last_name) && preg_match($pattern, $first_name)  && preg_match($pattern, $last_name)){
            return true;
        }
        return false;
    }

    static function EmailValidation(string $email){
        $pattern = "/^[\w.-]{2,10}@[a-zA-Z]{2,10}\.[a-zA-Z]{3,7}$/";
        if(!empty($email) && preg_match($pattern, $email)){
            return true;
        }
        return false;
    }

    static function RegisterValidation(string $first_name, string $last_name, string $email, string $password, string $role){
        if(self::NameValidation($first_name, $last_name) && !empty($password) && !empty($role) && ($role == "Recruteur" || $role == "Candidat") && self::EmailValidation($email)){
            return true;
        }
        return false;
    }
}
