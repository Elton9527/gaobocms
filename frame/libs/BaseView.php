<?php

/**
 * Author:wanggaobo
 * Date:2018/3/20 9:34
 **/
class BaseView
{
    public static $view;
    public static function init(){
        self::$view = new Smarty();
        self::$view->left_delimiter='{';
        self::$view->right_delimiter='}';
    }

    public static function assign($data){
        foreach($data as $key=>$value){
            self::$view->assign($key, $value);
        }
    }

    public static function display($template){
        self::$view->display($template);
    }

}