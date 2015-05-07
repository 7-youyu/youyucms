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
 * 用户控制器
 */
class UserController extends AdminController {
    public function index(){
        $map['email'] = array('neq',C('SUPER_ADMINI'));
        // $this->result = M('user')->where($map)->select();
        $this->result = $this->lists('user',$map);

        $this->display('user_list');
    }
    public function user_add(){
        $this->rule = M('rule')->select();
        $this->display('user_add');
    }
    public function user_add_sub($email = '', $username = '', $password = '', $rpassword = '',$rule = 0){
        if($password != $rpassword){
            $this->error('密码和重复密码不一致！');
        }           

        $User = D('User');
        $uid = $User->register($email, $username, $password);
        if(0 < $uid){ 
            if ($rule != 0) {
                $data['id'] = $rule;
                $data['uid'] = $uid;
                M('user_rule')->add($data);
            }
            //TODO: 发送验证邮件
            $this->success('新增成功！',U('index'));
        } else {
            $this->error($this->showRegError($uid));
        }
    }
    public function user_edit(){
        $uid = I('uid',0,'intval');
        $rule = M('rule')->select();
        $check_id = M('user_rule')->where(array('uid'=>$uid))->getField('id');
        if (!empty($check_id)) {
            foreach ($rule as $key => $value) {
                if ($value['id'] == $check_id) {
                    $rule[$key]['selected'] = 1;
                }
            }
        }
        $this->rule = $rule;
        $this->result = M('user')->where(array('uid'=>$uid))->find();
        $this->display('user_edit');
    }
    public function user_edit_sub(){
        $data = I();
        $ret  = M('user');
        $uid  = $ret->where(array('uid'=>$data['uid']))->save($data);
        M('user_rule')->where(array('uid'=>$data['uid']))->delete();
        if ($data['rule'] != 0) {
            $list['id'] = $data['rule'];
            $list['uid'] = $data['uid'];
            M('user_rule')->add($list);
        }
        $this->success('修改成功！',U('index'));
    }
    public function user_del(){
        $uid = I('uid',0,'intval');
        if (M('user')->where(array('uid'=>$uid))->getField('email') == C('SUPER_ADMINI')) {
            $this->error('超级管理员无法删除！',U('index'));
        }
        $result = M('user')->where(array('uid'=>$uid))->delete();
        if ($result) {
            $this->success('删除成功！',U('index'));
        }else{
            $this->error('删除失败！',U('index'));
        }
    }
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

}