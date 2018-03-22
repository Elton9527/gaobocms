<?php

/**
 * Author:wanggaobo
 * Date:2018/3/8 15:59
 **/
class mysql
{
    public static $mysqli;
    public static $mysqli_result;
    public static $con;

    function error($message){
        die($message);
    }

    /**
     * 连接数据库
     * @param $config  array {hostname, username password}
     */
    public function connect($hostname, $username, $password,$dbname){

        self::$mysqli = new mysqli();
        self::$con = self::$mysqli -> connect($hostname, $username, $password, $dbname);
        if(self::$mysqli->connect_error){
            $this->error(self::$mysqli->connect_error);
        }
    }

    /**
     * 返回query对象
     * @param $sql
     * @return mixed
     */
    public function query($sql){
        return self::$mysqli->query($sql);
    }

    /**
     * 获取所有查找到的数据
     * @param $query
     * @return array
     */
    public function findAll($query){
        $result = array();
        while($row = $query -> fetch_assoc()){
            $result[] = $row;
        }
        return $result;
    }

    /**
     *单条
     *
     *@param source $query sql语句通过mysql_query执行出的来的资源
     *return array   返回单条信息数组
     **/
    function findOne($query){
        $rs = $query->fetch_array(MYSQLI_ASSOC);
        return $rs;
    }

    /**
     *修改函数
     *
     *@param string $table 表名
     *@param array $arr 修改数组（包含字段和值的一维数组）
     *@param string $where  条件
     **/
    function update($table,$arr,$where){
        //update 表名 set 字段=字段值 where ……
        foreach($arr as $key=>$value){
            //$value = mysqli_escape_string(self::$con, $value);
            $keyAndvalueArr[] = "`".$key."`='".$value."'";
        }
        $keyAndvalues = implode(",",$keyAndvalueArr);
        $sql = "update ".$table." set ".$keyAndvalues." where ".$where;//修改操作 格式 update 表名 set 字段=值 where 条件
        $this->query($sql);
    }



    /**
     *删除函数
     *
     *@param string $table 表名
     *@param string $where 条件
     **/
    function del($table,$where){
        $sql = "delete from ".$table." where ".$where;//删除sql语句 格式：delete from 表名 where 条件
        $this->query($sql);
    }


}