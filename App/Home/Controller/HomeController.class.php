<?php
// +----------------------------------------------------------------------
// | 游渔实验室内容管理系统 [ youyucms ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 All rights reserved.
// +----------------------------------------------------------------------
// | Author: 游渔 <shang.knight@qq.com> <http://aincrad.sinaapp.com/>
// +----------------------------------------------------------------------
namespace Home\Controller;
use Think\Controller;
use Think\Model;
/**
 * 前台公共控制器
 */
class HomeController extends Controller {
    
    /* 空操作，用于输出404页面 */
	// public function _empty(){
	// 	$this->redirect('Index/index');
	// }


    protected function _initialize(){
        /* 读取站点配置 */
        $config = api('Config/lists');
        C($config); //添加配置

        if(!C('WEB_SITE_CLOSE')){
            $this->error('站点已经关闭，请稍后访问~');
        }
        if(!isset($_SESSION['user'])){
            if(isset($_COOKIE['uid'])&&isset($_COOKIE['username'])&&isset($_COOKIE['email'])){
                //用cookie给session赋值
                $user   = array();
                $user[] = $_COOKIE['uid'];
                $user[] = $_COOKIE['username'];
                $user[] = $_COOKIE['email'];
                session('user',$user);
                session('user_sign', data_auth_sign($user));
            }
        }
        $this->assign('__MENU__',$this->getMenus());
    }
    protected function getMenus($action_name=ACTION_NAME){
        $result = M('menu')->where(array('pid'=>0,'status'=>1))->order('sort')->select();
        foreach ($result as $key => $value) {
            if ($value['url'] == 'index/'.$action_name) {
                $result[$key]['active'] = 1;
            }
        }
        return $result;
    }

	/* 用户登录检测 */
	protected function login(){
		/* 用户登录检测 */
		is_login() || $this->error('您还没有登录，请先登录！', U('User/login'));
	}

    protected function lists($model,$where=array(),$order='',$field=true,$type='M',$relation=false){
        $REQUEST    =   (array)I('request.');
        
        if(is_string($model)){
            if ($type=='M') {
                $model  =   M($model);
            }else{
                $model  =   D($model);
            }
        }

        $total      =   $model->where($where)->count();
        // dump($where);
        if( isset($REQUEST['r']) ){
            $listRows = (int)$REQUEST['r'];
        }else{
            $listRows = C('LIST_ROWS') > 0 ? C('LIST_ROWS') : 10;
        }
        $page = new \Think\Page($total, $listRows, $REQUEST);
        if($total>$listRows){
            $page->setConfig('theme','<nav><ul class="pagination">%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%</ul></nav>');
        }
        $p =$page->show();
        $this->assign('_page', $p? $p: '');
        $this->assign('_total',$total);
        $limit = $page->firstRow.','.$page->listRows;

        // $model->setProperty('options',$options);
        if (!$relation) {           
            return $model->field($field)->where($where)->order($order)->limit($limit)->select();
        }else{
            return $model->field($field)->where($where)->relation(true)->order($order)->limit($limit)->select();
        }
    }
}