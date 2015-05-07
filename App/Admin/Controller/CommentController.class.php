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
 * 评论控制器
 */
class CommentController extends AdminController {
    /**
     * [index 评论]
     * @return [type] [description]
     */
    public function index(){
        $this->list = $this->lists('comment',array('status'=>1),'id desc',true);

    	$this->display('comment_list');
    }
    public function comment_del(){
        $id = I('id');
        $data['status'] = -1;
        $ret = M('comment')->where(array('id'=>$id))->save($data);
        if ($ret) {
            $this->success('删除成功！',U('index'));
        }else{
            $this->error('删除失败');
        }
    }
}