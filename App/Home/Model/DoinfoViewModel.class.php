<?php
// +----------------------------------------------------------------------
// | 游渔实验室内容管理系统 [ youyucms ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 All rights reserved.
// +----------------------------------------------------------------------
// | Author: 游渔 <shang.knight@qq.com> <http://aincrad.sinaapp.com/>
// +----------------------------------------------------------------------
namespace Home\Model;
use Think\Model\ViewModel;

/**
 * 文档列表视图
 */
class DoinfoViewModel extends ViewModel{

	protected $viewFields = array(
		'document' => array(
			'id','username','title','menu_id','display','view','create_time','update_time','description','cover_id','status','position'
		),
		'document_article' => array(
			'document_id','content','_on'=>'document.id=document_article.document_id'	
		),
		'menu' => array(
			'id'=>'mid','pid','_on'=>'document.menu_id=menu.id'	
		)

	);
}
