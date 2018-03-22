<?php

/**
 * Author:wanggaobo
 * Date:2018/3/21 9:48
 **/
class NewsModel
{
    private $_table = 'news';
    public function insert($data){
        $sql = "INSERT INTO $this->_table(`title`, `content`, `author`,`from`, `dateline`) VALUES('{$data['title']}', '{$data['content']}', '{$data['author']}', '{$data['from']}', ".time().")";
        return BaseDb::query($sql);
    }

    function update($data, $id){
        return BaseDb::update($this->_table, $data, 'id='.$id);
    }

    function findAll_orderby_dateline(){
        $sql = 'select * from '.$this->_table.' order by dateline desc';
        return BaseDb::findAll($sql);
    }

    function findOne_by_id($id){
        $sql = 'select * from '.$this->_table.' where id='.$id;
        return BaseDb::findOne($sql);
    }

    function del_by_id($id){
        return BaseDb::del($this->_table, 'id='.$id);

    }
}