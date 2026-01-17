<?php
require_once __DIR__ . "/../../Config/Config.php";
require_once __DIR__ . "/../Users.php";

class UsersRepository{ // TO Be Deleted
    protected $users = [];


    function create(string $first_name, string $last_name, string $email, string $password, string $role){
        try{
            $conn = Connection::ConnectToDB();
            $sql = "insert into users (first_name, last_name, email, password, role) values (?, ?, ?, ?, ?)";
            $conn->prepare($sql);
            $ref = new ReflectionFunction(__FUNCTION__);
            $args = get_func_args();
            foreach($ref->getParameters() as $index => $param){
                $conn->bindParam($index + 1, $args[$index]);
            }
            $new_user = new Users($conn->lastInsertId, $first_name, $last_name, $email, $password, $role);
            $this->users[] = $new_user;
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    static function verifyAdmin(){
        $how_much_admin = 0;
        if(count($this->users) > 0){
            foreach($this->users as $kay => $value){
                if($value->getRole() == "Admin"){
                    if ($how_much_admin > 1){
                        return false;
                    }
                    $how_much_admin += 1;
                }
            }
        }
        return true;
    }

    function login(string $email, string $password){
        $conn = Connection::ConnectToDB();
        $sql = "select password from users where email = ?";
        $query = $conn->prepare($sql);
        $query->execute([$email]);
        if($query->rowCount() > 0){
            $pass = $query->fetch(PDO::FETCH_ASSOC)["password"];
            if(password_verify($password, $pass)){
                return true;
            }
            return false;
        }
        return false;
    }
}