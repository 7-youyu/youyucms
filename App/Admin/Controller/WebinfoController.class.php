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
 * 网站首页内容控制器
 */
class WebinfoController extends AdminController {
    /**
     * [home_picture_list 首页图片]
     * @return [type] [description]
     */
    public function home_picture_list(){
        $this->document = M('lab_top')->where('status=1 AND class=1')->order('sort')->select();
        $this->display('home_picture_list');
    }
    public function home_picture_add(){
        $this->display('home_picture_add');
    }
    public function home_picture_add_sub(){
        $model = M("lab_top");
        $data['title']       = I('title');
        $data['cover_id']    = I('cover_id');
        $data['url']         = I('url');
        $data['description'] = I('description');
        $data['sort']        = I('sort');
        $data['status']      = 1;
        $data['class']       = 1;

        $result = $model->add($data);
        $this->success('新增成功',U('home_picture_list'));
    }
    public function home_picture_edit(){
        $id   = I('id',0,'intval');
        $this->info = M('lab_top')->where(array('id'=>$id))->find();
        $this->display('home_picture_edit');
    }
    public function home_picture_edit_sub(){
        $model = M("lab_top");
        $data['id']          = I('id');
        $data['title']       = I('title');
        $data['cover_id']    = I('cover_id');
        $data['url']         = I('url');
        $data['description'] = I('description');
        $data['sort']        = I('sort');

        $result = $model->where(array('id'=>$data['id']))->save($data);
        $this->success('修改成功！',U('home_picture_list'));
    }
    public function home_picture_del(){
        $id = I('id');
        $model = M("lab_top");
        $result = $model->where(array('id'=>$id))->delete();
        $this->success('删除成功！',U('home_picture_list'));
    }
    /**
     * [home_people_list 首页人物]
     * @return [type] [description]
     */
    public function home_people_list(){
        $this->document = M('lab_top')->where('status=1 AND class=2')->order('sort')->select();
        $this->display('home_people_list');
    }
    public function home_people_add(){
        $this->display('home_people_add');
    }
    public function home_people_add_sub(){
        $model = M("lab_top");
        $data['title']       = I('title');
        $data['cover_id']    = I('cover_id');
        $data['url']         = I('url');
        $data['description'] = I('description');
        $data['sort']        = I('sort');
        $data['status']      = 1;
        $data['class']       = 2;

        $result = $model->add($data);
        $this->success('新增成功',U('home_people_list'));
    }
    public function home_people_edit(){
        $id   = I('id',0,'intval');
        $this->info = M('lab_top')->where(array('id'=>$id))->find();
        $this->display('home_people_edit');
    }
    public function home_people_edit_sub(){
        $model = M("lab_top");
        $data['id']          = I('id');
        $data['title']       = I('title');
        $data['cover_id']    = I('cover_id');
        $data['url']         = I('url');
        $data['description'] = I('description');
        $data['sort']        = I('sort');

        $result = $model->where(array('id'=>$data['id']))->save($data);
        $this->success('修改成功！',U('home_people_list'));
    }
    public function home_people_del(){
        $id = I('id');
        $model = M("lab_top");
        $result = $model->where(array('id'=>$id))->delete();
        $this->success('删除成功！',U('home_people_list'));
    }
    /**
     * [home_content_list 首页内容]
     * @return [type] [description]
     */
    public function home_content_list(){
        $this->document = M('lab_top')->where('status=1 AND class=3')->order('sort')->select();
        $this->display('home_content_list');
    }
    public function home_content_add(){
        $this->display('home_content_add');
    }
    public function home_content_add_sub(){
        $model = M("lab_top");
        $data['title']       = I('title');
        $data['cover_id']    = I('cover_id');
        $data['description'] = I('description');
        $data['sort']        = I('sort');
        $data['status']      = 1;
        $data['class']       = 3;

        $result = $model->add($data);
        $this->success('新增成功',U('home_content_list'));
    }
    public function home_content_edit(){
        $id   = I('id',0,'intval');
        $this->info = M('lab_top')->where(array('id'=>$id))->find();
        $this->display('home_content_edit');
    }
    public function home_content_edit_sub(){
        $model = M("lab_top");
        $data['id']          = I('id');
        $data['title']       = I('title');
        $data['cover_id']    = I('cover_id');
        $data['description'] = I('description');
        $data['sort']        = I('sort');

        $result = $model->where(array('id'=>$data['id']))->save($data);
        $this->success('修改成功！',U('home_content_list'));
    }
    public function home_content_del(){
        $id = I('id');
        $model = M("lab_top");
        $result = $model->where(array('id'=>$id))->delete();
        $this->success('删除成功！',U('home_content_list'));
    }
}