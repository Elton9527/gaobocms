<?php

/**
 * Author:wanggaobo
 * Date:2018/3/20 15:05
 **/
class BasePage
{
    public static $config;
    public static function init_db(){
        BaseDb::init(self::$config);
    }
    public static function run($config){
        self::$config = $config;
        // 初始化数据库
        self::init_db();
    }
}