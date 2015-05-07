<?php
// +----------------------------------------------------------------------
// | 游渔实验室内容管理系统 [ youyucms ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 All rights reserved.
// +----------------------------------------------------------------------
// | Author: 游渔 <shang.knight@qq.com> <http://aincrad.sinaapp.com/>
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Think\Controller;
/**
 * 后台首页控制器
 */
class IndexController extends AdminController {
    /**
     * [index 首页]
     * @return [type] [description]
     */
    public function index(){

        $prx = C('DB_PREFIX');
    	$list = array(
			'news'    => M('menu')->join('__DOCUMENT__ ON __MENU__.id = __DOCUMENT__.menu_id')->where(array($prx.'document.status'=>1,'pid'=>2))->count(),
			'discus'  => M('menu')->join('__DOCUMENT__ ON __MENU__.id = __DOCUMENT__.menu_id')->where(array($prx.'document.status'=>1,'pid'=>7))->count(),
			'comment' => M('comment')->count(),
			'user'    => M('user')->count()
    	); 
    	$this->list = $list;
     	$this->display();
    }


}