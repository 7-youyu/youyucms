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
 * 菜单模型
 */
class MenuModel extends Model{

	protected $_validate = array(
	
		array('name', 'require', '菜单名称不能为空'), 
		array('name', '', '已有该菜单', 0, 'unique'),

		array('title', 'require', '英文标题不能为空')
	);

}
