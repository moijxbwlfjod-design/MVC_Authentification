<?php
require_once __DIR__ . "/../Repositories/UsersRepository.php";


class Validation{
    static function NameValidation(string $first_name,string $last_name){
        $pattern = "/^[\p{L} ]{2,25}$/u";
        return preg_match($pattern, $first_name) && preg_match($pattern, $last_name);
    }

    static function RegisterValidation(string $first_name, string $last_name, string $email, string $password, string $role){
        if(self::NameValidation($first_name, $last_name) && !empty($password) && !empty($role) && ($role == "Recruteur" || $role == "Candidat") && filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }
}
