<?php
/**
 * Author:wanggaobo
 * Date:2018/3/8 10:28
 * 单一入口
 **/
include_once '/framework.php';
include_once '/include.php';
include_once '/BasePage.php';

$db = new BaseDb();
$db->init($database['default']);

$controllerName = isset($_GET['controller'])?$_GET['controller']:'welcome';
$methodName = isset($_GET['method'])?$_GET['method']:'index';
# 处理接收到的参数，过滤掉特殊符号
# 验证控制器名称是否有效
c($controllerName)->$methodName();

