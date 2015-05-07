<?php
// +----------------------------------------------------------------------
// | 游渔实验室内容管理系统 [ youyucms ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 All rights reserved.
// +----------------------------------------------------------------------
// | Author: 游渔 <shang.knight@qq.com> <http://aincrad.sinaapp.com/>
// +----------------------------------------------------------------------
define ( 'APP_DEBUG', true );

define ( 'APP_PATH', './App/' );

if(!is_file(APP_PATH . 'Common/Conf/config.php')){
	header('Location: ./install.php');
	exit;
}

define ( 'RUNTIME_PATH', './Runtime/' );

require './ThinkPHP/ThinkPHP.php';