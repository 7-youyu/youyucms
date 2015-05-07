<?php
// +----------------------------------------------------------------------
// | 游渔实验室内容管理系统 [ youyucms ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 All rights reserved.
// +----------------------------------------------------------------------
// | Author: 游渔 <shang.knight@qq.com> <http://aincrad.sinaapp.com/>
// +----------------------------------------------------------------------
namespace Home\Model;
use Think\Model\RelationModel;

/**
 * 文档关联模型
 */
class DoinfoModel extends RelationModel{

		
		//定义主表名称
		protected $tableName='document';

		//定义关联关系
		protected $_link=array(
				'document_article'	=>array(
					'mapping_type'			=>	self::HAS_ONE,
					'class_name'            =>  'document_article',
					'foreign_key'			=>	'document_id',
					'as_fields' 			=>  'content',
				)
		);
	
}
