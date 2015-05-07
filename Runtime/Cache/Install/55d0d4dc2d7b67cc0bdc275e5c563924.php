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
    <li><a href="javascript:;">安装</a></li>
    <li><a href="javascript:;">完成</a></li>

              </ul>
            </div>
          </div>
        </nav>
        <!-- <div class="container marketing">
            
    <li class="active"><a href="javascript:;">安装协议</a></li>
    <li class="active"><a href="javascript:;">环境检测</a></li>
    <li class="active"><a href="javascript:;">创建数据库</a></li>
    <li><a href="javascript:;">安装</a></li>
    <li><a href="javascript:;">完成</a></li>

        </div> -->
        <div class="container marketing" style="margin-top:80px;margin-bottom:80px">
            
    <?php
 defined('SAE_MYSQL_HOST_M') or define('SAE_MYSQL_HOST_M', '127.0.0.1'); defined('SAE_MYSQL_HOST_M') or define('SAE_MYSQL_PORT', '3306'); ?>
    <h1 class="page-header">创建数据库</h1>
    <form action="/my_project/lab_manage/youyulabmanage/3/install.php/Install/Install/step2.html" method="post" target="_self" class="form-horizontal" role="form">
        <div class="create-database">
            <h2 class="page-header">数据库连接信息</h2>
            <div class="form-group">
                <div class="col-sm-2">
                    <select name="db[]" class="form-control">
                        <option>mysqli</option>
                        <option>mysql</option>
                    </select>
                </div>
                <span class="help-inline">数据库连接类型，服务器支持的情况下建议使用mysqli</span>
            </div>
            <div class="form-group">
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="db[]" value="<?php if(defined("SAE_MYSQL_HOST_M")): echo (SAE_MYSQL_HOST_M); else: ?>127.0.0.1<?php endif; ?>">
                </div>
                <span>数据库服务器，数据库服务器IP，一般为127.0.0.1</span>
            </div>
            <div class="form-group">
                <div class="col-sm-2">
                <input type="text" name="db[]"  class="form-control" value="<?php if(defined("SAE_MYSQL_DB")): echo (SAE_MYSQL_DB); endif; ?>">
                </div>
                <span>数据库名</span>
            </div>
            <div class="form-group">
                <div class="col-sm-2">
                <input type="text" name="db[]" class="form-control" value="<?php if(defined("SAE_MYSQL_USER")): echo (SAE_MYSQL_USER); endif; ?>">
                </div>
                <span>数据库用户名</span>
            </div>
            <div class="form-group">
                <div class="col-sm-2">
                <input type="password" name="db[]" class="form-control" value="<?php if(defined("SAE_MYSQL_PASS")): echo (SAE_MYSQL_PASS); endif; ?>">
                </div>
                <span>数据库密码</span>
            </div>
            <div class="form-group">
                <div class="col-sm-2">
                <input type="text" name="db[]" class="form-control" value="<?php if(defined("SAE_MYSQL_PORT")): echo (SAE_MYSQL_PORT); else: ?>3306<?php endif; ?>">
                </div>
                <span>数据库端口，数据库服务连接端口，一般为3306</span>
            </div>

            <div class="form-group">
                <div class="col-sm-2">
                <input type="text" name="db[]" class="form-control" value="youyu_">
                </div>
                <span>数据表前缀，同一个数据库运行多个系统时请修改为不同的前缀</span>
            </div>
        </div>

        <div class="create-database">
            <h2 class="page-header">创始人帐号信息</h2>
            <div class="form-group">
                <div class="col-sm-3">
                <input type="text" name="admin[]" class="form-control" value="admin">
                </div>
                <span>用户名</span>
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                <input type="password" class="form-control" name="admin[]" value="">
                </div>
                <span>密码</span>
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                <input type="password" class="form-control" name="admin[]" value="">
                </div>
                <span>确认密码</span>
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                <input type="text" class="form-control" name="admin[]" value="">
                </div>
                <span>邮箱，用于登陆</span>
            </div>
        </div>
    </form>

        </div>



        <!-- Footer
        ================================================== -->
        <footer class="navbar navbar-default navbar-fixed-bottom navbar-inverse">
            <div class="container">
                
    <div class="navbar-left navbar-form">
        <a class="btn btn-success btn-large" href="<?php echo U('Install/step1');?>">上一步</a>
        <button id="submit" type="button" class="btn btn-primary btn-large" onclick="$('form').submit();return false;">下一步</button>
    </div>

            </div>
        </footer>
    </body>
</html>