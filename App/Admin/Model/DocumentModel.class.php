<?php
// +----------------------------------------------------------------------
// | 游渔实验室内容管理系统 [ youyucms ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 All rights reserved.
// +----------------------------------------------------------------------
// | Author: 游渔 <shang.knight@qq.com> <http://aincrad.sinaapp.com/>
// +----------------------------------------------------------------------
namespace Admin\Model;
use Think\Model;

/**
 * 文档模型
 */
class DocumentModel extends Model{

	protected $_validate = array(
	
		array('title', 'require', '标题不能为空！'), 
		array('username', 'require', '作者不能为空！')
	);
	protected $_auto = array(
		array('status','1'), 
		array('create_time','time',1,'function'), 
		array('update_time','time',3,'function')

	);
}
