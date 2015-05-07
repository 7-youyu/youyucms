<?php 
	/**
	 * Admin配置
	 */
	return array(
	    'TMPL_PARSE_STRING' => array(
	        '__STATIC__' => __ROOT__ . '/Public/static',
	        '__IMG__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/img',
	        '__CSS__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/css',
	        '__JS__'     => __ROOT__ . '/Public/' . MODULE_NAME . '/js',
	        '__FONT__'   => __ROOT__ . '/Public/' . MODULE_NAME . '/font-awesome',
	    ),

    /* 图片上传相关配置 */
    'PICTURE_UPLOAD' => array(
		'mimes'    => '', //允许上传的文件MiMe类型
		'maxSize'  => 2*1024*1024, //上传的文件大小限制 (0-不做限制)
		'exts'     => 'jpg,gif,png,jpeg', //允许上传的文件后缀
		'autoSub'  => true, //自动子目录保存文件
		'subName'  => array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
		'rootPath' => './Uploads/Picture/', //保存根路径
		'savePath' => '', //保存路径
		'saveName' => array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
		'saveExt'  => '', //文件保存后缀，空则使用原后缀
		'replace'  => false, //存在同名是否覆盖
		'hash'     => true, //是否生成hash编码
		'callback' => false, //检测文件是否存在回调函数，如果存在返回文件信息数组
    ), //图片上传相关配置（文件上传类配置）

    /* SESSION 和 COOKIE 配置 */
    // 'SESSION_PREFIX' => 'onethink_admin', //session前缀
    // 'COOKIE_PREFIX'  => 'onethink_admin_', // Cookie前缀 避免冲突
    'VAR_SESSION_ID' => 'session_id',	//修复uploadify插件无法传递session_id的bug
	
	
	'BACK_MENU'	=> array(
		'system' => array(
			'title' => '系统',
			'target'=> 'system',
			'icon'	=> 'fa-wrench',
			'child' => array(
				'webset' =>array(
					'title' => '网站设置',
					'link'  => 'webset/index'
				),
				'menu' =>array(
					'title' => '菜单管理',
					'link'  => 'menu/index'
				),
				'category' =>array(
					'title' => '分类管理',
					'link'  => 'category/index'
				),
				'config' =>array(
					'title' => '配置管理',
					'link'  => 'config/index'
				)
			)
		),
		'content' => array(
			'title' => '内容',
			'target'=> 'content',
			'icon'	=> 'fa-file',
			'child' => array(
				'news' =>array(
					'title' => '新闻公告',
					'link'  => 'news/index'
				),
				'project' =>array(
					'title' => '项目成果',
					'link'  => 'project/index'
				),
				'award' =>array(
					'title' => '奖章奖项',
					'link'  => 'award/index'
				),
				'member' =>array(
					'title' => '历届成员',
					'link'  => 'member/index'
				),
				'lesson' =>array(
					'title' => '学习资料',
					'link'  => 'lesson/index'
				),
				'discus' =>array(
					'title' => '交流讨论',
					'link'  => 'discus/index'
				)
			)
		),
		'user' => array(
			'title' => '用户',
			'target'=> 'user',
			'icon'	=> 'fa-table',
			'child' => array(
				'user' =>array(
					'title' => '用户查看',
					'link'  => 'user/index'
				),
				'rule' =>array(
					'title' => '权限设置',
					'link'  => 'rule/index'
				)
			)
		),
		'btop' => array(
			'title' => '网站',
			'target'=> 'btop',
			'icon'	=> 'fa-desktop',
			'child' => array(
				'home_picture_list' =>array(
					'title' => '首页图片',
					'link'  => 'Webinfo/home_picture_list'
				),
				'home_people_list' =>array(
					'title' => '首页人物',
					'link'  => 'Webinfo/home_people_list'
				),
				'home_content_list' =>array(
					'title' => '首页内容',
					'link'  => 'Webinfo/home_content_list'
				)
			)
		),
		'approval' => array(
			'title' => '评审',
			'target'=> 'approval',
			'icon'	=> 'fa-comments',
			'child' => array(
				'comment' =>array(
					'title' => '评论列表',
					'link'  => 'comment/index'
				),
				'verify' =>array(
					'title' => '文章审核',
					'link'  => 'verify/index'
				),
				'recycle' =>array(
					'title' => '回收站',
					'link'  => 'recycle/index'
				)
			)
		),
		'check' => array(
			'title' => '备份',
			'target'=> 'check',
			'icon'	=> 'fa-edit',
			'child' => array(
				'export' =>array(
					'title' => '数据库备份',
					'link'  => 'database/index?type=export'
				),
				'import' =>array(
					'title' => '数据库还原',
					'link'  => 'database/index?type=import'
				)
			)
		),
	)

);

?>