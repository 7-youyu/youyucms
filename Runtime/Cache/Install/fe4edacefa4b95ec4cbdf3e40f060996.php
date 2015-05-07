<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>游渔实验室内容管理系统 安装</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="/my_project/lab_manage/youyulabmanage/3/Public/static/css/bootstrap.min.css" rel="stylesheet">
        <!-- <link href="/my_project/lab_manage/youyulabmanage/3/Public/Install/css/install.css" rel="stylesheet"> -->

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.js"></script>
        <![endif]-->
        <script src="/my_project/lab_manage/youyulabmanage/3/Public/static/js/jquery-1.11.2.min.js"></script>
        <script src="/my_project/lab_manage/youyulabmanage/3/Public/static/js/bootstrap.min.js"></script>
    </head>

    <body data-spy="scroll" data-target=".bs-docs-sidebar">
        <!-- Navbar
        ================================================== -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">游渔实验室内容管理系统</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                  
    <li class="active"><a href="javascript:;">安装协议</a></li>
    <li class="active"><a href="javascript:;">环境检测</a></li>
    <li class="active"><a href="javascript:;">创建数据库</a></li>
    <li class="active"><a href="javascript:;">安装</a></li>
    <li class="active"><a href="javascript:;">完成</a></li>

              </ul>
            </div>
          </div>
        </nav>
        <!-- <div class="container marketing">
            
    <li class="active"><a href="javascript:;">安装协议</a></li>
    <li class="active"><a href="javascript:;">环境检测</a></li>
    <li class="active"><a href="javascript:;">创建数据库</a></li>
    <li class="active"><a href="javascript:;">安装</a></li>
    <li class="active"><a href="javascript:;">完成</a></li>

        </div> -->
        <div class="container marketing" style="margin-top:80px;margin-bottom:80px">
            
    <h1>完成</h1>
    <p>安装完成！</p>
	<?php if(isset($info)): echo ($info); endif; ?>

        </div>



        <!-- Footer
        ================================================== -->
        <footer class="navbar navbar-default navbar-fixed-bottom navbar-inverse">
            <div class="container">
                
    <div class="navbar-left navbar-form">
        <a class="btn btn-primary btn-large" href="/my_project/lab_manage/youyulabmanage/3/index.php/Admin">登录后台</a>
        <a class="btn btn-success btn-large" href="/my_project/lab_manage/youyulabmanage/3/index.php">访问首页</a>
    </div>

            </div>
        </footer>
    </body>
</html>