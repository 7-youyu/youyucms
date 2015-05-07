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
 * 审核控制器
 */
class VerifyController extends AdminController {
    /**
     * [index 审核]
     * @return [type] [description]
     */
    public function index(){
        $this->list = $this->lists('document',array('status'=>0),'id desc');

    	$this->display('verify_list');
    }
    public function verify_see(){
        $id   = I('id',0,'intval');
        $info = D('Doinfo')->relation(true)->where(array('id'=>$id))->find();
        
        $menu = M('menu')->where(array('pid'=>7,'status'=>1))->order('sort')->select();
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
    public function verify_see_sub(){
        $model = D("Doinfo");
        $data['id']          = I('id');
        $data['title']       = I('title');
        $data['menu_id']     = I('menu_id');
        $data['username']    = $_SESSION['user']['username'];
        $data['display']     = I('display');
        $data['position']    = I('position');
        $data['status']      = I('status');
        $data['update_time'] = time();
        $data['description'] = mb_substr(I('content','','strip_tags'), 0,70,'utf-8');
        $data['document_article'] = array(
                'content' => I('content')
            );
        $result = $model->relation(true)->where(array('id'=>$data['id']))->save($data);
        $this->success('审核成功！',U('index'));
        
    }
}