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
/**
 * 前台用户管理控制器
 */
class UserController extends HomeController {
    /**
     * [register 用户注册]
     * @return [type] [description]
     */
    public function register($email = '', $username = '', $password = '', $rpassword = '', $verify = ''){
        if(!C('WEB_REGISTER_CLOSE')){
            $this->error('注册已关闭');
        }
        if(IS_POST){ //注册用户
            /* 检测验证码 */
            if(!check_verify($verify)){
                $this->error('验证码输入错误！');
            }

            /* 检测密码 */
            if($password != $rpassword){
                $this->error('密码和重复密码不一致！');
            }           

            $User = D('User');
            $uid = $User->register($email, $username, $password);
            if(0 < $uid){ 
                //TODO: 发送验证邮件
                $this->success('注册成功！',U('login'));
            } else {
                $this->error($this->showRegError($uid));
            }
        
        } else { //显示注册表单
            $this->display();
        }
    }

    /**
     * [login 用户登陆]
     * @param  string $username [description]
     * @param  string $password [description]
     * @return [type]           [description]
     */
    public function login($email = '', $password = ''){
        if(IS_POST){ //登录验证

            $User = D('User');
            $uid = $User->login($email, $password);
            if(0 < $uid){ 
                $this->success('登录成功！',U('Home/Index/index'));
            } else {
                switch($uid) {
                    case -1: $error = '用户不存在或被禁用！'; break; //系统级别禁用
                    case -2: $error = '密码错误！'; break;
                    default: $error = '未知错误！'; break; // 0-接口参数错误（调试阶段使用）
                }
                $this->error($error);
            }

        } else { //显示登录表单
            $this->display();
        }
    }

    /* 验证码，用于登录和注册 */
    public function verify(){
        $verify = new \Think\Verify();
        $verify->length   = 2;
        $verify->entry(1);
    }

    /**
     * 获取用户注册错误信息
     * @param  integer $code 错误编码
     * @return string        错误信息
     */
    private function showRegError($code = 0){
        switch ($code) {
            case -1:  $error = '用户名长度必须在16个字符以内！'; break;
            case -2:  $error = '用户名被禁止注册！'; break;
            case -3:  $error = '用户名被占用！'; break;
            case -4:  $error = '密码长度必须在6-30个字符之间！'; break;
            case -5:  $error = '邮箱格式不正确！'; break;
            case -6:  $error = '邮箱长度必须在1-32个字符之间！'; break;
            case -7:  $error = '邮箱被禁止注册！'; break;
            case -8:  $error = '邮箱被占用！'; break;
            case -9:  $error = '手机格式不正确！'; break;
            case -10: $error = '手机被禁止注册！'; break;
            case -11: $error = '手机号被占用！'; break;
            default:  $error = '未知错误';
        }
        return $error;
    }


    public function user_center(){
        if ( !is_login() ) {
            $this->error( '您还没有登陆',U('User/login') );
        }
        if (IS_POST) {
            $data = I();
            $ret  = M('user');
            $ret->where(array('uid'=>$data['uid']))->save($data);
            $this->success('修改成功！');
        }else{
            $uid = $_SESSION['user']['uid'];
            $this->result = M('user')->where(array('uid'=>$uid))->find();            
            $this->display();
        }
    }
    public function user_head(){
        if ( !is_login() ) {
            $this->error( '您还没有登陆',U('User/login') );
        }
        if (IS_POST) {
            $data = I();
            $ret  = M('user');
            $ret->where(array('uid'=>$data['uid']))->save($data);
            $this->success('修改成功！');
        }else{
            $this->display();
        }
    }
    public function user_doc(){
        if ( !is_login() ) {
            $this->error( '您还没有登陆',U('User/login') );
        }
        $map['display'] = array('eq',1);
        $map['pid'] = array('eq',7);
        $map['username'] = array('eq',$_SESSION['user']['username']);
        // $map['position'] = array('neq',2);
        // $list  = D('DoinfoView')->where($map)->order("$order desc")->select();
        $list = $this->lists('DoinfoView',$map,"update_time desc",true,'D',false);
        $this->list  = $list;
        $this->display();
    }
    public function user_book(){
        if ( !is_login() ) {
            $this->error( '您还没有登陆',U('User/login') );
        }
        if (IS_POST) {
            $model = M("document");
            $data['id']          = I('id');
            $data['title']       = I('title');
            $data['cover_id']    = I('cover_id');
            $data['show_url']    = I('show_url');
            $data['update_time'] = time();
            $ret = $model->where(array('id'=>$data['id']))->save($data);
            if ($ret) {
                $this->success('修改成功！');
            }else{
                $this->error('修改失败');
            }
        }else{
            $uid = $_SESSION['user']['uid'];
            $prx = C('DB_PREFIX');
            $this->info = M('menu')
                    ->join('__DOCUMENT__ ON __MENU__.id = __DOCUMENT__.menu_id')
                    ->where(array($prx."document.status"=>1,$prx."document.display"=>1,"comment"=>$uid,"pid"=>5))
                    ->find();      
            $this->display();
        }
    }
    public function user_profile(){
        if ( !is_login() ) {
            $this->error( '您还没有登陆',U('User/login') );
        }
        if ( IS_POST ) {
            $uid              = is_login();
            $password         = I('old');
            $repassword       = I('repassword');
            $data['password'] = I('password');
            empty($password) && $this->error('请输入原密码');
            empty($data['password']) && $this->error('请输入新密码');
            empty($repassword) && $this->error('请输入确认密码');
            
            if (strlen($data['password']) < 6||strlen($data['password'])>30) {
               $this->error('密码长度必须在6-30个字符之间！');
            }
            
            if($data['password'] !== $repassword){
                $this->error('您输入的新密码与确认密码不一致');
            }

            $old = M('user')->where(array('uid'=>$uid))->getField('password');
            if(md5($password) != $old){
                $this->error('原密码验证错误');
            }else{
                $data['password'] = md5($data['password']);
                M('user')->where(array('uid'=>$uid))->save($data);
                $this->success('修改成功！');
            }     
        }else{
            $this->display();
        }
    }

    public function logout(){
        if(is_login()){
            D('User')->logout();
            $this->success('退出成功！', U('User/login'));
        } else {
            $this->redirect('User/login');
        }
    }
}