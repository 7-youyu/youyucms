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
 * 文章视图
 */
class ArticleViewModel extends ViewModel{

	protected $viewFields = array(
		'document' => array(
			'id','username','title','menu_id','display','view','create_time','update_time','status'
		),
		'document_article' => array(
			'document_id','content','_on'=>'document.id=document_article.document_id'	
		)

	);
}
