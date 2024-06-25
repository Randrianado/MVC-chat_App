<?php
    require_once'../config/config.php';

    $url=isset($_GET['url']) ? $_GET['url'] : null;
    $url=rtrim($url,'/');
    $rl=filter_var($url,FILTER_SANITIZE_URL);
    $params=explode('/',$url);

    $controller=isset($params[0]) ? $params[0] : null;
    $action=isset($params[1]) ? $params[1] : null;

    if($controller && $action){
        require_once"../Controllers/{$controller}Controller.php";
        $controllerClass=$controller . 'Controller';
        $controllerObject=new $controllerClass();
        $controllerObject->$action;
    }else{
        header('Location: ../views/login.php');
    }
?>