<?php
// +----------------------------------------------------------------------
// | 游渔实验室内容管理系统 [ youyucms ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 All rights reserved.
// +----------------------------------------------------------------------
// | Author: 游渔 <shang.knight@qq.com> <http://aincrad.sinaapp.com/>
// +----------------------------------------------------------------------
function get_status($status){
    if ($status == 0) {
        return '<span class="label label-danger">禁用</span>';
    }else if($status == 1){
        return '<span class="label label-success">启用</span>';
    }
}

function get_display($status){
    if ($status == 0) {
        return '<span class="label label-danger">仅后台可见</span>';
    }else if($status == 1){
        return '<span class="label label-success">总是可见</span>';
    }
}

function get_position($id){
    if ($id == 0) {
        return '<span class="label label-default">普通</span>';
    }else if($id == 1){
        return '<span class="label label-danger">精品</span>';
    }else if ($id == 2) {
        return '<span class="label label-primary">置顶</span>';
    }
}
function get_document($id){
    return M('document')->where(array('id'=>$id))->getField('title');
}
function check_user_rule($c_name,$uid){
    if (strtolower($c_name)!='index') {
        $id = M('user_rule')->where(array('uid'=>$_SESSION['user']['uid']))->getField('id');
        $allow_menu = M('rule')->where(array('id'=>$id))->getField('allow_menu');
        $allow_menu = unserialize($allow_menu); 

        $all_menu['system']  = array('webset','menu','category','config');
        $all_menu['content'] = array('news','project','award','member','lesson','discus');
        $all_menu['user']    = array('user','rule');
        $all_menu['btop']    = array('webinfo');
        $all_menu['approval']= array('comment','verify','recycle');
        $all_menu['check']   = array('database');
        // echo $c_name;
        // var_dump($allow_menu);
        foreach ($all_menu as $key => $value) {
            if (in_array(strtolower($c_name), $value)) {
                // var_dump($value);
                // echo $key;
                if (in_array($key,$allow_menu)) {
                    return 1;
                }else{
                    return 0;
                }
            }
        }
        return 0;
    }else{
        return 1;
    }
}
