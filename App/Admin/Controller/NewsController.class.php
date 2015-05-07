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
 * 新闻公告控制器
 */
class NewsController extends AdminController {
    /**
     * [index 新闻列表]
     * @return [type] [description]
     */
    public function index(){
        // $this->document = M('menu')
        // ->join('__DOCUMENT__ ON __MENU__.id = __DOCUMENT__.menu_id')
        // ->where(array('youyu_document.status'=>1,'pid'=>2))
        // ->order('update_time desc')
        // ->select();
        $this->document = $this->lists('DoinfoView',array('status'=>1,'pid'=>2),'update_time desc',true,'D',false);

    	$this->display('news_list');
    }
    /**
     * [news_add 新增新闻]
     * @return [type] [description]
     */
    public function news_add(){
        $this->menu = M('menu')->where(array('pid'=>2,'status'=>1))->order('sort')->select();
    	$this->display();
    }
    public function news_add_sub(){
        $model = D("Doinfo");
        $data['title']       = I('title');
        $data['menu_id']     = I('menu_id');
        $data['username']    = I('username');
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
     * [news_edit 编辑新闻]
     * @return [type] [description]
     */
    public function news_edit(){
        $id   = I('id',0,'intval');
        $info = D('Doinfo')->relation(true)->where(array('id'=>$id))->find();
        
        $menu = M('menu')->where(array('pid'=>2,'status'=>1))->order('sort')->select();
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
    public function news_edit_sub(){
        $model = D("Doinfo");
        $data['id']          = I('id');
        $data['title']       = I('title');
        $data['menu_id']     = I('menu_id');
        $data['username']    = I('username');
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
     * [news_del 删除新闻]
     * @return [type] [description]
     */
    public function news_del(){
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