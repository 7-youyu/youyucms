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
 * 学习资源控制器
 */
class LessonController extends AdminController {
    /**
     * [index 学习资源]
     * @return [type] [description]
     */
    public function index(){
        // $this->document = M('menu')
        // ->join('__DOCUMENT__ ON __MENU__.id = __DOCUMENT__.menu_id')
        // ->where(array('youyu_document.status'=>1,'pid'=>6))
        // ->order('update_time desc')
        // ->select();
        $this->document = $this->lists('DoinfoView',array('status'=>1,'pid'=>6),'update_time desc',true,'D',false);
    	$this->display('lesson_list');
    }
    /**
     * [lesson_add 新增资源]
     * @return [type] [description]
     */
    public function lesson_add(){
        $this->menu = M('menu')->where(array('pid'=>6,'status'=>1))->order('sort')->select();
    	$this->display();
    }
    public function lesson_add_sub(){
        $model = D("Doinfo");
        $data['title']       = I('title');
        $data['menu_id']     = I('menu_id');
        $data['username']    = I('username');
        $data['display']     = I('display');
        $data['cover_id']    = I('cover_id');
        $data['status']      = 1;
        $data['create_time'] = time();
        $data['update_time'] = time();
        $data['description'] = I('description');
        $data['document_article'] = array(
                'content' => I('content')
            );
        $result = $model->relation(true)->add($data);
        $this->success('新增成功',U('index'));
    }
    /**
     * [lesson_edit 编辑资源]
     * @return [type] [description]
     */
    public function lesson_edit(){
        $id   = I('id',0,'intval');
        $info = D('Doinfo')->relation(true)->where(array('id'=>$id))->find();
        
        $menu = M('menu')->where(array('pid'=>6,'status'=>1))->order('sort')->select();
        foreach ($menu as $key => $value) {
            if ($value['id'] == $info['menu_id']) {
                $menu[$key]['selected'] = 1;
            }
        }
        $info['content'] = htmlspecialchars_decode($info['content']);
        $this->info = $info;
        $this->menu = $menu;
        $this->display();
    }
    public function lesson_edit_sub(){
        $model = D("Doinfo");
        $data['id']          = I('id');
        $data['title']       = I('title');
        $data['menu_id']     = I('menu_id');
        $data['username']    = I('username');
        $data['display']     = I('display');
        $data['cover_id']    = I('cover_id');
        $data['update_time'] = time();
        $data['description'] = I('description');
        $data['document_article'] = array(
                'content' => I('content')
            );
        $result = $model->relation(true)->where(array('id'=>$data['id']))->save($data);
        $this->success('修改成功！',U('index'));
        
    }
    /**
     * [lesson_del 删除资源]
     * @return [type] [description]
     */
    public function lesson_del(){
        $id = I('id');
        $data['status'] = -1;
        $ret = M('document')->where(array('id'=>$id))->save($data);
        if ($ret) {
            $this->success('删除成功！',U('index'));
        }else{
            $this->error('删除失败');
        }
    }
}