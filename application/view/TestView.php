<?php

/**
 * Author:wanggaobo
 * Date:2018/3/8 11:05
 **/
class TestView
{
    // 显示数据
    function display($data){
        $smarty = new Smarty();
        $smarty -> assign('content', $data);
        $smarty -> display('index.tpl');
    }
}