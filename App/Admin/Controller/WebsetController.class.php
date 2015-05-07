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
 * 网站设置控制器
 */
class WebsetController extends AdminController {
    public function index(){
        $result = M('config')->select();
        foreach ($result as $key => $value) {
            $list[$value['name']] = $value['value'];
        }
        // var_dump($list);
        $this->list = $list;
        $this->display('webset_list');
    }
    public function webset_sub(){
        $data = I();
        $data['NEWS_SIDEBAR'] = I('NEWS_SIDEBAR','','');
        $data['DOC_SIDEBAR']  = I('DOC_SIDEBAR','','');
        $model = M('config');
        foreach ($data as $key => $value) {
            $result = $model->where(array('name'=>$key))->setField('value',$value);
        }
        $this->success('更新成功',U('index'));
    
    }
}