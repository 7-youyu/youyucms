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
 * 配置管理控制器
 */
class ConfigController extends AdminController {
    public function index(){
        $this->result = M('config')->order('sort')->select();
        $this->display('config_list');
    }
    public function config_add(){
        $this->display();
    }
    public function config_add_sub(){
        $data = I();
        $ret  = M('config');
        $ret->add($data);
        $this->success('新增成功！',U('index'));
        
    }
    public function config_edit(){
        $id = I('id',0,'intval');
        $result = M('config')->where(array('id'=>$id))->find();
        $this->assign('result',$result);
        $this->display();
    }
    public function config_edit_sub(){
        $data = I();
        $ret  = M('config');
        $ret->save($data);
        $this->success('修改成功！',U('index'));
    }
    public function config_del(){
        $id = I('id',0,'intval');
        $result = M('config')->where(array('id'=>$id))->delete();
        if ($result) {
            $this->success('删除成功！',U('index'));
        }else{
            $this->error('删除失败！',U('index'));
        }
    }
}