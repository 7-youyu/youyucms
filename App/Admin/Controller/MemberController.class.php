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
 * 历届成员控制器
 */
class MemberController extends AdminController {
    /**
     * [index 历届成员]
     * @return [type] [description]
     */
    public function index(){
    	// $this->document = M('menu')
     //    ->join('__DOCUMENT__ ON __MENU__.id = __DOCUMENT__.menu_id')
     //    ->where(array('youyu_document.status'=>1,'pid'=>5))
     //    ->order('update_time desc')
     //    ->select();
        $this->document = $this->lists('DoinfoView',array('status'=>1,'pid'=>5),'update_time desc',true,'D',false);
    	$this->display('member_list');
    }
    /**
     * [member_add 新增成员]
     * @return [type] [description]
     */
    public function member_add(){
        $this->menu = M('menu')->where(array('pid'=>5,'status'=>1))->order('sort')->select();
    	$this->display();
    }
    public function member_add_sub() {
        $model = M("document");
        $data['title']       = I('title');
        $data['cover_id']    = I('cover_id');
        $data['menu_id']     = I('menu_id');
        $data['username']    = I('username');
        $data['display']     = I('display');
        $data['show_url']    = I('show_url');
        $data['comment']     = I('comment');
        $data['status']      = 1;
        $data['create_time'] = time();
        $data['update_time'] = time();

        $result = $model->add($data);
        $this->success('新增成功',U('index'));
	}
	/**
     * [member_edit 修改成员]
     * @return [type] [description]
     */
    public function member_edit(){
        $id   = I('id',0,'intval');
        $info = M('document')->where(array('id'=>$id))->find();
        $menu = M('menu')->where(array('pid'=>5,'status'=>1))->order('sort')->select();
        foreach ($menu as $key => $value) {
            if ($value['id'] == $info['menu_id']) {
                $menu[$key]['selected'] = 1;
            }
        }
        $this->info = $info;
        $this->menu = $menu;
        $this->display();
    }
    public function member_edit_sub() {
		$model = M("document");
        $data['id']       	 = I('id');
        $data['title']       = I('title');
        $data['cover_id']    = I('cover_id');
        $data['menu_id']     = I('menu_id');
        $data['username']    = I('username');
        $data['display']     = I('display');
        $data['show_url']    = I('show_url');
        $data['comment']     = I('comment');
        $data['update_time'] = time();
        $result = $model->where(array('id'=>$data['id']))->save($data);
        $this->success('修改成功！',U('index'));
    }	    
    /**
     * [member_del 删除成员]
     * @return [type] [description]
     */
    public function member_del(){
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