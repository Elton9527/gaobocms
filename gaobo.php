<?php
/**
 * Author:wanggaobo
 * Date:2018/3/8 11:25
 **/
//实例化controller
function c($controllerName){
    $controllerName = ucfirst($controllerName);
    $controllerName = $controllerName.'Controller';
    include_once '/application/controller/'.$controllerName.'.php';
    $obj = new $controllerName();
    return $obj;
}

// 实例化Model
function gaobomodel($modelName){
    $modelName = ucfirst($modelName);
    $modelName = $modelName.'Model';
    include_once '/application/model/'.$modelName.'.php';
    $obj = new $modelName();
    return $obj;
}

// 实例化View
function gaoboview($viewName){
    $viewName = ucfirst($viewName);
    $viewName = $viewName.'View';
    include_once '/application/view/'.$viewName.'.php';
    include_once '/frame/libs/third_party/smarty/Smarty.class.php';
    $obj = new $viewName();
    return $obj;
}

function pageJump($page, $controller, $method){

    $url = $page.'?controller='.$controller.'&method='.$method;
    //print_r($url);die();
    header("Location:{$url}");
}

