<?php
require_once __DIR__ . "/../Config/Config.php";

class Users{
    protected int $id;
    protected string $first_name;
    protected string $last_name;
    protected string $email;
    protected string $password;
    protected string $role;

    public function __construc(int $id, string $first_name, string $last_name, string $email, string $password, string $role){
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    public function getId():int{
        return $this->id;
    }

    public function getFirstName():string{
        return $this->first_name;
    }

    public function getLastName():string{
        return $this->last_name;
    }

    public function getFullName():string{
        return $this->first_name . " " . $this->last_name;
    }

    public function getEmail():string{
        return $this->email;
    }

    public function getPassword():string{
        $this->password;
    }

    public function getRole():string{
        return $this->role;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function setFirstName(string $first_name){
        $this->first_name = $first_name;
    }

    public function setLastName(string $last_name){
        $this->last_name = $last_name;
    }

    public function setEmail(string $email){
        $this->email = $email;
    }

    public function setPassword(string $password){
        $this->password = $password;
    }

    public function setRole(string $role){
        $this->role = $role;
    }

}