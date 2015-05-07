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
 * 菜单管理控制器
 */
class MenuController extends AdminController {
    /**
     * [index 菜单显示]
     * @return [type] [description]
     */
    public function index(){
        $result = M('menu')->where(array('pid'=>0))->select();
        $this->assign('result',$result);
    	$this->display('menu_list');
    }
    /**
     * [menu_add 增加菜单]
     * @return [type] [description]
     */
    public function menu_add(){
    	$this->display();
    }
    public function menu_add_sub(){
        $data = I();
        $ret  = D('Menu');
        if (!$ret->create($data)) {
            $this->error($ret->getError());
        }else{
            $ret->add($data);
            $this->success('新增成功！',U('index'));
        }
    }
    /**
     * [menu_edit 编辑菜单]
     * @return [type] [description]
     */
    public function menu_edit(){
        $id = I('id',0,'intval');
        $result = M('menu')->where(array('id'=>$id))->find();
        $this->assign('result',$result);
        $this->display();
    }
    public function menu_edit_sub(){
        $data = I();
        $ret  = D('Menu');
        if (!$ret->create($data)) {
            $this->error($ret->getError());
        }else{
            $ret->save($data);
            $this->success('修改成功！',U('index'));
        }
    }
    /**
     * [menu_del 删除菜单]
     * @return [type] [description]
     */
    public function menu_del(){
        $id = I('id',0,'intval');
        $result = M('menu')->where(array('id'=>$id))->delete();
        if ($result) {
            $this->success('删除成功！',U('index'));
        }else{
            $this->error('删除失败！',U('index'));
        }
    }
}