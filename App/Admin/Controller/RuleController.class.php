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
 * 权限控制器
 */
class RuleController extends AdminController {
    public function index(){
        $this->result = M('rule')->select();
        $this->display('rule_list');
    }
    public function rule_add(){
        $this->menu = C('BACK_MENU');
        $this->display('rule_add');
    }
    public function rule_add_sub(){
        $data['name']        = I('name');
        $data['description'] = I('description');
        $data['allow_menu']  = serialize(I('allow_menu'));

        M('rule')->add($data);
        $this->success('新增成功！',U('index'));
    }
    public function rule_edit(){
        $id = I('id',0,'intval');
        $result = M('rule')->where(array('id'=>$id))->find();
        $result['allow_menu'] = unserialize($result['allow_menu']);

        $menu = C('BACK_MENU');
        foreach ($menu as $key => $value) {
            foreach ($result['allow_menu'] as $k => $v) {
                if ($value['target'] == $v) {
                    $menu[$key]['checked'] = 1;
                }
            }
        }
        $this->menu = $menu;
        $this->result = $result;
        $this->display('rule_edit');
    }
    public function rule_edit_sub(){
        $data['id']          = I('id');
        $data['name']        = I('name');
        $data['description'] = I('description');
        $data['allow_menu']  = serialize(I('allow_menu'));

        $ret  = M('rule');
        $ret->where(array('id'=>$data['id']))->save($data);
        $this->success('修改成功！',U('index'));
    }
    public function rule_del(){
        $id = I('id',0,'intval');
        $result = M('rule')->where(array('id'=>$id))->delete();
        if ($result) {
            $this->success('删除成功！',U('index'));
        }else{
            $this->error('删除失败！',U('index'));
        }
    }

    
}