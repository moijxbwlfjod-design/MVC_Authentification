<?php
$routes = [];
function route(string $path, callable $callback){
    global $routes;
    $routes[$path] = $callback;  
}

function run(){
    global $routes;
    $uri = $_SERVER['REQUEST_URI']; 
    $isFound = false;
    foreach($routes as $path => $callback){
        if($uri !== $path) continue;
        $isFound = true;
        $callback();
    }
    if(!$isFound){
        $notFoundCallBack = $routes["/404"];
        $notFoundCallBack();
    }
}
route("/MVC_Authentification/login", function (){
    header("location:login.php");
});



route("/MVC_Authentification/", function(){
    header("location:Public/register.php");
});

route("/404", function(){
    echo "<script>alert('Page Not Found')</script>";
});
run();
?>