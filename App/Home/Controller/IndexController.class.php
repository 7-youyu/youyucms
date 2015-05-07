<?php
// +----------------------------------------------------------------------
// | 游渔实验室内容管理系统 [ youyucms ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 All rights reserved.
// +----------------------------------------------------------------------
// | Author: 游渔 <shang.knight@qq.com> <http://aincrad.sinaapp.com/>
// +----------------------------------------------------------------------
namespace Home\Controller;
use Think\Controller;
/**
 * 前端页面控制器
 */
class IndexController extends HomeController {
    /**
     * [index 首页]
     * @return [type] [description]
     */
    public function index(){
        $this->top_1 = M('lab_top')->where('status=1 AND class=1')->order('sort')->limit(3)->select();
        $this->top_2 = M('lab_top')->where('status=1 AND class=2')->order('sort')->limit(3)->select();
        $this->top_3 = M('lab_top')->where('status=1 AND class=3')->order('sort')->select();
        // var_dump($_SESSION['user']);
    	$this->display();
    }
    /**
     * [news 新闻公告]
     * @return [type] [description]
     */
    public function news(){
        $id     = I('id', 0, 'intval');
        $result = M('menu')->where(array('pid'=>2,'status'=>1))->order('sort')->select();
        $a      = array('id'=>0,'name'=>'全部','url'=>'index/news');

        array_unshift($result, $a);
        foreach ($result as $key => $value) {
            if (empty($result[$key]['url'])) {
                $result[$key]['url'] = M('menu')->where(array('id'=>2))->getField('url').'?id=';
            }
            if ($result[$key]['id'] != 0)
                $result[$key]['url'] = $result[$key]['url'].$result[$key]['id'];
            if ($value['id'] == $id) {
                $result[$key]['active'] = 1;
            }
        }
        if (!empty($id)) {
           $map['menu_id'] = array('eq',$id);
        }
        $map['display'] = array('eq',1);
        $map['pid'] = array('eq',2);
        // $this->list = D('DoinfoView')->where($map)->select();
        $this->list = $this->lists('DoinfoView',$map,'update_time desc',true,'D',false);
        // var_dump($list);
        $this->sidebar = M('config')->where('name="NEWS_SIDEBAR"')->getField('value');
        $this->assign('result',$result);
    	$this->display();
    }
    /**
     * [project 项目成果]
     * @return [type] [description]
     */
    public function project(){
        // $this->list = M('document')->where('status=1 AND menu_id=3 AND display=1')->order('update_time desc')->select();
        $this->list = $this->lists('document','status=1 AND menu_id=3 AND display=1','update_time desc');

    	$this->display();
    }
    /**
     * [award 奖章奖项]
     * @return [type] [description]
     */
    public function award(){
        $result = M('menu')->where(array('pid'=>4,'status'=>1))->order('sort')->select();
        foreach ($result as $key => &$value) {
            $id = $value['id'];
            $value['child'] = M('document')->where("status=1 AND menu_id=$id AND display=1")->order('update_time desc')->select();
        }
        $this->assign('result',$result);
    	$this->display();
    }
    /**
     * [member 历届成员]
     * @return [type] [description]
     */
    public function member(){
        $result = M('menu')->where(array('pid'=>5,'status'=>1))->order('sort')->select();
        foreach ($result as $key => &$value) {
            $id = $value['id'];
            $value['child'] = M('document')->where("status=1 AND menu_id=$id AND display=1")->order('update_time desc')->select();
        }
        $this->assign('result',$result);
    	$this->display();
    }
    /**
     * [lesson 学习资源]
     * @return [type] [description]
     */
    public function lesson(){
        $id     = I('id', 0, 'intval');
        $result = M('menu')->where(array('pid'=>6,'status'=>1))->order('sort')->select();
        $a      = array('id'=>0,'name'=>'全部','url'=>'index/lesson');

        array_unshift($result, $a);
        foreach ($result as $key => $value) {
            if (empty($result[$key]['url'])) {
                $result[$key]['url'] = M('menu')->where(array('id'=>6))->getField('url').'?id=';
            }
            if ($result[$key]['id'] != 0)
                $result[$key]['url'] = $result[$key]['url'].$result[$key]['id'];
            if ($value['id'] == $id) {
                $result[$key]['active'] = 1;
            }
        }
        if (!empty($id)) {
           $map['menu_id'] = array('eq',$id);
        }
        $map['display'] = array('eq',1);
        $map['pid'] = array('eq',6);
        $this->list = D('DoinfoView')->where($map)->select();
        
        $this->assign('result',$result);
    	$this->display();
    }
    /**
     * [discus 交流讨论]
     * @return [type] [description]
     */
    public function discus(){
        $id     = I('id', 0, 'intval');
        $order  = I('order','comment');
        $result = M('menu')->where(array('pid'=>7,'status'=>1))->order('sort')->select();
        $a      = array('id'=>0,'name'=>'全部','url'=>'index/discus');

        array_unshift($result, $a);
        foreach ($result as $key => $value) {
            if (empty($result[$key]['url'])) {
                $result[$key]['url'] = M('menu')->where(array('id'=>7))->getField('url').'?id=';
            }
            if ($result[$key]['id'] != 0)
                $result[$key]['url'] = $result[$key]['url'].$result[$key]['id'];
            if ($value['id'] == $id) {
                $result[$key]['active'] = 1;
            }
        }
        if (!empty($id)) {
           $map['menu_id'] = array('eq',$id);
        }
        $map['display'] = array('eq',1);
        $map['pid'] = array('eq',7);
        $map['status'] = array('eq',1);
        $map['position'] = array('neq',2);
        // $list  = D('DoinfoView')->where($map)->order("$order desc")->select();
        $list = $this->lists('DoinfoView',$map,"$order desc",true,'D',false);
        // foreach ($list as $key => $value) {
        //     if ($value['position'] == 2) {
        //         unset($list[$key]);
        //         array_unshift($list, $value);
        //     }
        // }
        
        if (I('p',1)==1) {
            $list_head  = D('DoinfoView')->where(array('position'=>2,'status'=>1))->select();
            if ($list_head) {
                $list =array_merge($list_head,$list);
            }
        }
        $this->list  = $list;
        $this->order = $order;
        $this->assign('result',$result);
    	$this->display();
    }
    /**
     * [document 文章文档]
     * @return [type] [description]
     */
    public function document(){
        $id = I('id',0,'intval');
        $p  = I('p',1,'intval');
        M('document')->where(array('id'=>$id))->setInc('view');
        $list =D('ArticleView')->where(array('id'=>$id))->find();
        if ($list['status'] != 1 &&$list['username'] != $_SESSION['user']['username']) {
            $this->error('文章不存在或已被删除！');
        }
        $this->list = $list;

        $this->lists('comment',array('document_id'=>$id),'comment_date desc');
        $this->sidebar = M('config')->where('name="DOC_SIDEBAR"')->getField('value');
        $this->p = $p;
    	$this->display();
    }
    public function document_del(){
        $id = I('id',0,'intval');   
        $data['status'] = -1;
        $result = M('document')->where(array('id'=>$id))->save($data);
        if ($result) {
            $this->success('删除成功',U('user/user_doc'));
        }else{
            $this->error('删除失败');
        }
    }
    public function comment(){
        $id  = I('id',0,'intval');
        $limit  = (I('p',0,'intval')-1)*10;
        $ret = M('comment')->where(array('document_id'=>$id))->order('comment_date desc')->limit($limit,10)->select();
        
        echo comment_format($ret);
    }
    public function comment_sub(){
        if ( !is_login() ) {
            $this->error( '您还没有登陆',U('User/login') );
        }
        if(!C('WEB_COMMENT_CLOSE')){
            $this->error('评论已关闭');
        }
        $data['document_id']     = I('document_id');
        $data['comment_content'] = I('comment_content');
        if (empty($data['comment_content'])) {
            $this->error( '评论内容不能为空');
        }
        $data['author']          = $_SESSION['user']['username'];
        $data['user_id']         = $_SESSION['user']['uid'];
        $data['comment_date']    = time();
        $data['status']          = 1;
        $result = M('comment')->add($data);
        $doc_data['comment'] = time();
        $result = M('document')->where(array('id'=>$data['document_id']))->save($doc_data);
        if ($result) {
            $this->success('新增成功');
        }else{
            $this->error('发表失败');  
        }
    }
    /**
     * [discus_add 发表讨论区文章]
     * @return [type] [description]
     */
    public function discus_add(){
        if ( !is_login() ) {
            $this->error( '您还没有登陆',U('User/login') );
        }
        if (IS_POST) {
            $model = D("Doinfo");
            $data['title']       = I('title');
            $data['menu_id']     = I('menu_id');
            $data['username']    = $_SESSION['user']['username'];
            $data['display']     = 1;
            if(!C('WEB_VERIFY_CLOSE')){
                $data['status']  = 0;
            }else{
                $data['status']  = 1;
            }
            $content = I('content');
            if (empty($data['title'])||empty($content)) {
                $this->error( '标题或内容不能为空');
            }
            $data['create_time'] = time();
            $data['update_time'] = time();
            $data['document_article'] = array(
                    'content' => I('content')
                );
            $result = $model->relation(true)->add($data);
            if ($result) {
                if (!C('WEB_VERIFY_CLOSE')) {
                    $this->success('新增成功,请耐心等待管理员审核',U('index/discus'));
                }else{
                    $this->success('新增成功',U('index/discus'));
                }
            }else{
                $this->error('发表失败');  
            }
        }else{
            $this->dis_menu = M('menu')->where(array('pid'=>7,'status'=>1))->order('sort')->select();
            $this->display();   
        }
    }
}