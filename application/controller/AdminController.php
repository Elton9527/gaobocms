<?php

/**
 * Author:wanggaobo
 * Date:2018/3/20 10:03
 **/
//include_once '../../frame/libs/third_party/smarty/Smarty.class.php';
class AdminController
{
    public $view;
    function __construct()
    {
        //session_start();
        BaseView::init();
        if(!$_SESSION['userinfo']){
            $this->showmessage('请登录后在操作！', 'admin.php?controller=admin&method=login');
        }
    }

    // 管理后台首页
    function index()
    {
        $data['userinfo'] = $_SESSION['userinfo'];
        BaseView::assign($data);
        BaseView::display('admin/index.html');
    }

    // 添加新闻
    public function newsadd(){
        if(!$_POST){
            $data = $this->getnewsinfo();
            BaseView::assign(array('data'=>$data));
            BaseView::display('admin/newsadd.html');
        }else{
            $this->newssubmit();
        }
    }

    private function getnewsinfo(){
        if(isset($_GET['id'])){
            $id = intval($_GET['id']);
            $newsobj = gaobomodel('news');
            return $newsobj->findOne_by_id($id);
        }else{
            return array();
        }
    }
    // 处理表单提交
    private function newssubmit(){
        extract($_POST);
        $news_model = gaobomodel('news');
        $data = array(
            'title' => $title,
            'content' => $content,
            'author' => $author,
            'from' => $from,
        );

        if($_POST['id']!=''){
            $news_model ->update($data, intval($_POST['id']));
            $this->showmessage('修改成功！', 'admin.php?controller=admin&method=newslist');
        }else{
            $result = $news_model->insert($data);
            $this->showmessage('添加成功！', 'admin.php?controller=admin&method=newslist');
        }
    }

    // 新闻列表
    public function newslist(){
        $data = $this->getnewslist();
        BaseView::assign(array('data'=>$data));
        BaseView::display('admin/newslist.html');
    }

    private function getnewslist(){
        $news_model = gaobomodel('news');
        return $news_model -> findAll_orderby_dateline();
    }

    // 后台登录页面
    function login(){
        if($_SESSION['userinfo']){
            $this->showmessage('已经登录了！', 'admin.php?controller=admin&method=index');
        }
        if(isset($_POST['username']) && isset($_POST['password'])){
            # 数据库验证用户名和密码
            $userModel = gaobomodel('user');
            $userinfo = $userModel -> findUserByPassword($_POST['username'], $_POST['password']);

            # 数据库验证成功，保存用户信息到Session
            if($userinfo){
                $_SESSION['userinfo'] = $userinfo;
                # 同时页面跳转到管理页面
                pageJump('admin.php', 'admin', 'index');
            } else {
                $data['errormsg'] = '请使用您的用户名和密码在下面登录';
                BaseView::assign($data);
                BaseView::display('login.html');
            }
        }else{
            $data['errormsg'] = '';
            BaseView::assign($data);
            BaseView::display('login.html');
        }
    }

    public function newsdel(){
        if($_GET['id']){
            $this->delnews();
            $this->showmessage('删除新闻成功！', 'admin.php?controller=admin&method=newslist');
        }
    }
    private function delnews(){
        $news_model = gaobomodel('news');
        return $news_model->del_by_id($_GET['id']);
    }

    private function showmessage($info, $url){
        echo "<script>alert('$info');window.location.href='$url'</script>";
        exit;
    }

    // 退出登录
    function logout(){
        unset($_SESSION['userinfo']);
        pageJump('admin.php', 'admin', 'login');
    }
}