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
 * 后台公共控制器
 */
class AdminController extends Controller {
    /**
     * [_initialize 初始化]
     * @return [type] [description]
     */
    protected function _initialize($controller_name=CONTROLLER_NAME){
        
        $config = api('Config/lists');
        C($config); //添加配置
        is_login() || $this->redirect('Public/login');
        if (C('SUPER_ADMINI') != $_SESSION['user']['email']) {
            if (is_administrator()) {
                $ret = check_user_rule($controller_name,$_SESSION['user']['uid']);
                if (!$ret) {
                    $this->error('没有权限',U('index/index'));
                }
            }else{
                $this->error('没有权限',U('index/index'));
            }
        }
        $this->assign('__MENU__',$this->getMenus());
    }
    protected function getMenus($controller_name=CONTROLLER_NAME,$action_name=ACTION_NAME){
    	$menu = C('BACK_MENU');
        
        foreach ($menu as $key => $value) {
            foreach ($value['child'] as $k => $v) {
            	if (strtolower($k) == strtolower($controller_name)||strtolower($k) == strtolower($action_name)) {
            		$menu[$key]['active'] = 1;
            		$menu[$key]['child'][$k]['active'] = 1;
            	}
            }
        }
        if (C('SUPER_ADMINI') != $_SESSION['user']['email']) {
            $id = M('user_rule')->where(array('uid'=>$_SESSION['user']['uid']))->getField('id');
            $allow_menu = M('rule')->where(array('id'=>$id))->getField('allow_menu');
            $allow_menu = unserialize($allow_menu);
            $new_menu =array();
            foreach ($menu as $key => $value) {
                foreach ($allow_menu as $v) {
                    if ($value['target'] == $v) {
                        $new_menu[] = $menu[$key];
                    }
                }
            }
            $menu = $new_menu;
        }
        return $menu;
    }
    protected function lists($model,$where=array(),$order='',$field=true,$type='M',$relation=false){
        $REQUEST    =   (array)I('request.');
        
        if(is_string($model)){
            if ($type=='M') {
                $model  =   M($model);
            }else{
                $model  =   D($model);
            }
        }

        $total      =   $model->where($where)->count();
        // dump($where);
        if( isset($REQUEST['r']) ){
            $listRows = (int)$REQUEST['r'];
        }else{
            $listRows = C('LIST_ROWS') > 0 ? C('LIST_ROWS') : 10;
        }
        $page = new \Think\Page($total, $listRows, $REQUEST);
        if($total>$listRows){
            $page->setConfig('theme','<nav><ul class="pagination">%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%</ul></nav>');
        }
        $p =$page->show();
        $this->assign('_page', $p? $p: '');
        $this->assign('_total',$total);
        $limit = $page->firstRow.','.$page->listRows;

        // $model->setProperty('options',$options);
        if (!$relation) {           
            return $model->field($field)->where($where)->order($order)->limit($limit)->select();
        }else{
            return $model->field($field)->where($where)->relation(true)->order($order)->limit($limit)->select();
        }
    }
}