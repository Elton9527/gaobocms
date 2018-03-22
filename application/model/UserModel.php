<?php

/**
 * Author:wanggaobo
 * Date:2018/3/20 11:33
 **/
class UserModel
{
    function findUserByPassword($username, $password){
        $sql = "SELECT * FROM USER WHERE username = '{$username}' AND PASSWORD = '{$password}'";
        $result = BaseDb::findAll($sql);
        if($result){
            return $result[0];
        }else{
            return '';
        }
    }
}