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
 * 项目成果控制器
 */
class ProjectController extends AdminController {
    /**
     * [index 项目成果]
     * @return [type] [description]
     */
    public function index(){
        // $this->document = M('document')->where('status=1 AND menu_id=3')->order('update_time desc')->select();
        $this->document = $this->lists('document','status=1 AND menu_id=3','update_time desc');
        $this->display('project_list');
    }
    /**
     * [project_add 增加项目]
     * @return [type] [description]
     */
    public function project_add(){
    	
    	$this->display();
    }
    public function project_add_sub() {
        $model = D("Doinfo");
        $data['title']       = I('title');
        $data['cover_id']    = I('cover_id');
        $data['menu_id']     = 3;
        $data['username']    = I('username');
        $data['show_url']    = I('show_url');
        $data['display']     = I('display');
        $data['status']      = 1;
        $data['create_time'] = time();
        $data['update_time'] = time();
        $data['description'] = mb_substr(I('content','','strip_tags'), 0,70,'utf-8');
        $data['document_article'] = array(
                'content' => I('content')
            );
        $result = $model->relation(true)->add($data);
        $this->success('新增成功',U('index'));
	}
    /**
     * [project_edit 修改项目]
     * @return [type] [description]
     */
    public function project_edit(){
        $id   = I('id',0,'intval');
        $info = D('Doinfo')->relation(true)->where(array('id'=>$id))->find();
        
        $info['content'] = htmlspecialchars_decode($info['content']);
        $this->info = $info;
        $this->display();
    }
    public function project_edit_sub() {
        $model = D("Doinfo");
        $data['id']          = I('id');
        $data['title']       = I('title');
        $data['cover_id']    = I('cover_id');
        $data['username']    = I('username');
        $data['show_url']    = I('show_url');
        $data['display']     = I('display');
        $data['update_time'] = time();
        $data['description'] = mb_substr(I('content','','strip_tags'), 0,70,'utf-8');
        $data['document_article'] = array(
                'content' => I('content')
            );
        $result = $model->relation(true)->where(array('id'=>$data['id']))->save($data);
        $this->success('修改成功！',U('index'));
    }	    
    /**
     * [project_del 删除项目]
     * @return [type] [description]
     */
    public function project_del(){
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