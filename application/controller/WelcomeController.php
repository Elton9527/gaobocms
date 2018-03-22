<?php

/**
 * Author:wanggaobo
 * Date:2018/3/16 15:34
 **/
class WelcomeController extends BaseView
{
    function index(){
        $smarty = new Smarty();
        $smarty->assign('welcoming', 'Welcome you !');
        $result = $smarty->display('welcome.tpl');
        $this->init();
    }

}