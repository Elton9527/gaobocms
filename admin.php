<?php
/**
 * Author:wanggaobo
 * Date:2018/3/20 9:37
 * 后台管理页面入口
 **/
include_once '/framework.php';
include_once '/include.php';
include_once '/BasePage.php';
session_start();
BasePage::run($database['default']);
if(isset($_SESSION['username']) && $_SESSION['username']){
    $controllerName = isset($_GET['controller'])?$_GET['controller']:'admin';
    $methodName = isset($_GET['method'])?$_GET['method']:'sayHi';
}else{
    $controllerName = isset($_GET['controller'])?$_GET['controller']:'admin';
    $methodName = isset($_GET['method'])?$_GET['method']:'login';
}
c($controllerName)->$methodName();
