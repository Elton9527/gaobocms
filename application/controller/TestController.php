<?php

/**
 * Author:wanggaobo
 * Date:2018/3/8 11:03
 **/
class TestController
{
    public function show(){
        $testModel = gaobomodel('test');
        $data = $testModel ->getData();

        $testView = gaoboview('test');
        $testView-> display($data);
    }
}