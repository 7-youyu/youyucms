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
 * 回收站控制器
 */
class RecycleController extends AdminController {
    /**
     * [index 回收站]
     * @return [type] [description]
     */
    public function index(){

        $this->list = $this->lists('document',array('status'=>-1),'update_time desc');

    	$this->display('recycle_list');
    }
    public function recycle_back(){
        $id = I('id');
        $data['status'] = 1;
        $ret = M('document')->where(array('id'=>$id))->save($data);
        if ($ret) {
            $this->success('还原成功！',U('index'));
        }else{
            $this->error('还原失败');
        }
    }

    public function recycle_del(){
        $id = I('id');
        $model = D("Doinfo");
        $result = $model->relation(true)->where(array('id'=>$id))->delete();
        if ($result) {
            $this->success('删除成功！',U('index'));
        }else{
            $this->error('删除失败');
        }
    }
    
 
}