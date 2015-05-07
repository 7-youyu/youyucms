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
 * 后台登陆页面控制器
 */
class PublicController extends Controller {
    /**
     * [login 登陆]
     * @return [type] [description]
     */
    public function login($email = '', $password = ''){
    	if(IS_POST){ 

            $User = D('User');
            $uid = $User->login($email, $password);
            if(0 < $uid){ 
                $this->success('登录成功！',U('Index/index'));
            } else {
                switch($uid) {
                    case -1: $error = '用户不存在或被禁用！'; break; 
                    case -2: $error = '密码错误！'; break;
                    default: $error = '未知错误！'; break; 
                }
                $this->error($error);
            }

        } else { 
            $this->display();
        }
    }
    /* 退出登录 */
    public function logout(){
        if(is_login()){
            D('User')->logout();
            $this->success('退出成功！', U('public/login'));
        } else {
            $this->redirect('public/login');
        }
    }
}