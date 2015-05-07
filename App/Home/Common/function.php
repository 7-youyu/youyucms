<?php

/**
 * 检测验证码
 * @param  [type]  $code [description]
 * @param  integer $id   [description]
 * @return [type]        [description]
 */
function check_verify($code, $id = 1){
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}

function get_user_field_info($uid,$field){
	return M('user')->where(array('uid'=>$uid))->getField($field);
}
function get_username_field_info($username,$field){
    return M('user')->where(array('username'=>$username))->getField($field);
}
function get_user_head($id){
	$path = M('picture')->where(array('id'=>$id))->getField('path');
	return  $path?$path:'/Public/static/img/head.jpg';
}
function get_user_doc_status($id){
    if ($id == 1) {
        return '';
    }else if ($id == 0){
        return '<span class="text-danger">[ 待审核 ]</span>';
    }else if ($id == -1) {
        return '<span class="text-muted">[ 已删除 ]</span>';
    }else if ($id == -2){
        return '<span class="text-danger">[ 审核未通过 ]</span>';
    }
}
function get_comment($id){
	return M('comment')->where(array('document_id'=>$id))->count();
}
function get_menu_doc($id){
	if ($id == 0) {
		return '';
	}
	return M('document')->where(array('menu_id'=>$id,'status'=>1,'display'=>1))->count();
}

function get_dis_position($id){
    if ($id == 0) {
        return '';
    }else if($id == 1){
        return '<span class="text-danger">[ 精品 ]</span>';
    }else if ($id == 2) {
        return '<span class="text-warning">[ 置顶 ]</span>';
    }
}
function comment_format($list){
	$str = '';
	foreach ($list as $key => $value) {
		$str .= '<div class="media"><a class="media-left" href="#"><img src="'.__ROOT__.get_user_head(get_user_field_info($value['user_id'],'cover_id')).'" alt="..." class="img-thumbnail"></a>';
        $str .= '<div class="media-body">';
        $str .= '<span class="related-info"><a href="#">'.$value['author'].'</a></span>';
        $str .= '<span class="related-info">'.time_format($value['comment_date']).'</span>';
        $str .= '<div class="comment-main">'.$value['comment_content'].'</div>';
        $str .= '</div>';
        $str .= '</div>';
	}
	return $str;
} 
?>