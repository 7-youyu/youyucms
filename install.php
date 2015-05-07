<?php
// +----------------------------------------------------------------------
// | 游渔实验室内容管理系统 [ youyucms ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 All rights reserved.
// +----------------------------------------------------------------------
// | Author: 游渔 <shang.knight@qq.com> <http://aincrad.sinaapp.com/>
// +----------------------------------------------------------------------
// 
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

$_GET['m'] = 'Install';

define ( 'APP_DEBUG', true );

define ( 'APP_PATH', './App/' );

define ( 'RUNTIME_PATH', './Runtime/' );

require './ThinkPHP/ThinkPHP.php';