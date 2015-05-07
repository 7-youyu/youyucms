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
 * 分类管理控制器
 */
class CategoryController extends AdminController {
    /**
     * [index 分类显示]
     * @return [type] [description]
     */
    public function index(){
        $result   = M('menu')->select();
        $category = node_merge($result);

        $this->assign('category',$category);
    	$this->display('category_list');
    }
    /**
     * [category_add 增加分类]
     * @return [type] [description]
     */
    public function category_add(){
        $result = M('menu')->select();

        $this->pmenu=node_merge($result);
        $this->display();
    }
    public function category_add_sub(){
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
     * [category_edit 编辑分类]
     * @return [type] [description]
     */
    public function category_edit(){
        $id     = I('id',0,'intval');
        $result = M('menu')->where(array('id'=>$id))->find();

        $pret   = M('menu')->select();
        $pmenu  = node_merge($pret);
        foreach ($pmenu as $k => $v) {
            if ($v['id'] == $result['pid']) {
                $pmenu[$k]['selected'] = 1;
            }
        }

        $this->assign('pmenu',$pmenu);
        $this->assign('result',$result);
        $this->display();
    }
    public function category_edit_sub(){
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
     * [category_del 删除分类]
     * @return [type] [description]
     */
    public function category_del(){
        $id = I('id',0,'intval');
        $result = M('menu')->where(array('id'=>$id))->delete();
        if ($result) {
            $this->success('删除成功！',U('index'));
        }else{
            $this->error('删除失败！',U('index'));
        }
    }
}