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
 * 奖章奖项控制器
 */
class AwardController extends AdminController {
    /**
     * [index 奖章奖项]
     * @return [type] [description]
     */
    public function index(){
    	// $this->document = M('menu')
     //    ->join('__DOCUMENT__ ON __MENU__.id = __DOCUMENT__.menu_id')
     //    ->where(array('youyu_document.status'=>1,'pid'=>4))
     //    ->order('update_time desc')
     //    ->select();
        $this->document = $this->lists('DoinfoView',array('status'=>1,'pid'=>4),'update_time desc',true,'D',false);

    	$this->display('award_list');
    }
    /**
     * [award_add 新增奖章]
     * @return [type] [description]
     */
    public function award_add(){
        $this->menu = M('menu')->where(array('pid'=>4,'status'=>1))->order('sort')->select();
    	$this->display();
    }
    public function award_add_sub() {
        $model = M("document");
        $data['title']       = I('title');
        $data['cover_id']    = I('cover_id');
        $data['menu_id']     = I('menu_id');
        $data['username']    = I('username');
        $data['display']     = I('display');
        $data['status']      = 1;
        $data['create_time'] = time();
        $data['update_time'] = time();

        $result = $model->add($data);
        $this->success('新增成功',U('index'));
	}
	/**
     * [award_edit 修改奖章]
     * @return [type] [description]
     */
    public function award_edit(){
        $id   = I('id',0,'intval');
        $info = M('document')->where(array('id'=>$id))->find();
        $menu = M('menu')->where(array('pid'=>4,'status'=>1))->order('sort')->select();
        foreach ($menu as $key => $value) {
            if ($value['id'] == $info['menu_id']) {
                $menu[$key]['selected'] = 1;
            }
        }
        $this->info = $info;
        $this->menu = $menu;
        $this->display();
    }
    public function award_edit_sub() {
		$model = M("document");
        $data['id']       	 = I('id');
        $data['title']       = I('title');
        $data['cover_id']    = I('cover_id');
        $data['menu_id']     = I('menu_id');
        $data['username']    = I('username');
        $data['display']     = I('display');
        $data['update_time'] = time();
        $result = $model->where(array('id'=>$data['id']))->save($data);
        $this->success('修改成功！',U('index'));
    }	    
    /**
     * [award_del 删除奖章]
     * @return [type] [description]
     */
    public function award_del(){
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