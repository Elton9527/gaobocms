<?php

/**
 * Author:wanggaobo
 * Date:2018/3/20 9:35
 **/
class BaseDb
{
    public static $db;
    public static function init($config){
        $dbdriver = $config['dbdriver'];
        self::$db = new $dbdriver;
        self::$db ->connect($config['hostname'],$config['username'],$config['password'],$config['dbname']);
    }

    public static function query($sql){
        return self::$db->query($sql);
    }

    public static function findAll($sql){
        $query = self::$db -> query($sql);
        return self::$db ->findAll($query);
    }

    public static function findOne($sql){
        $query = self::$db->query($sql);
        return self::$db->findOne($query);
    }

    public static function update($table, $arr, $where){
        return self::$db->update($table, $arr, $where);
    }

    public static function del($table,$where){
        return self::$db->del($table,$where);
    }
}