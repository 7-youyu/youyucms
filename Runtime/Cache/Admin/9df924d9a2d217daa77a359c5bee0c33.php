<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>实验室管理系统后台</title>

    <!-- Bootstrap Core CSS -->
    <link href="/my_project/lab_manage/youyulabmanage/3/Public/static/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/my_project/lab_manage/youyulabmanage/3/Public/Admin/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/my_project/lab_manage/youyulabmanage/3/Public/Admin/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/my_project/lab_manage/youyulabmanage/3/Public/Admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">实验室管理系统后台</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo ($_SESSION['user']['username']); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo U('public/logout');?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?php echo U('index/index');?>"><i class="fa fa-fw fa-dashboard"></i> 首页</a>
                    </li>

                    <?php if(is_array($__MENU__)): $i = 0; $__LIST__ = $__MENU__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$MUEU): $mod = ($i % 2 );++$i;?><li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#<?php echo ($MUEU["target"]); ?>"><i class="fa fa-fw <?php echo ($MUEU["icon"]); ?>"></i> <?php echo ($MUEU["title"]); ?> <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="<?php echo ($MUEU["target"]); ?>" class="collapse <?php if(($MUEU['active']) == "1"): ?>in<?php endif; ?>">
                                <?php if(is_array($MUEU["child"])): $i = 0; $__LIST__ = $MUEU["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?><li <?php if(($child['active']) == "1"): ?>style="background-color:#fff"<?php endif; ?>>
                                        <a href="<?php echo (U($child["link"])); ?>"><?php echo ($child["title"]); ?></a>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
                  
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                首页 <small>基本信息</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> 首页
                </li>
            </ol>
            <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-newspaper-o fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo ($list["news"]); ?></div>
                                        <div>新闻</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo U('news/index');?>">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo ($list["discus"]); ?></div>
                                        <div>讨论</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo U('discus/index');?>">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo ($list["comment"]); ?></div>
                                        <div>评论</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo U('user/index');?>">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo ($list["user"]); ?></div>
                                        <div>用户</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo U('comment/index');?>">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
            </div>
            <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> 系统信息</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <span class="pull-right">http://<?php echo ($_SERVER["SERVER_NAME"]); ?>/my_project/lab_manage/youyulabmanage/3/</span>
                                        访问地址
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="pull-right"><?php echo ($_SERVER["SERVER_ADDR"]); ?>:<?php echo ($_SERVER["SERVER_PORT"]); ?></span>
                                        服务器IP
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="pull-right"><?=THINK_VERSION?></span>
                                        ThinkPHP版本
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="pull-right"><?=dirname($_SERVER['SCRIPT_FILENAME'])?></span>
                                        物理路径
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="pull-right"><?php echo get_cfg_var( "max_execution_time") ; ?>秒</span>
                                        脚本超时
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="pull-right"><?php echo get_cfg_var( "upload_max_filesize")?get_cfg_var( "upload_max_filesize"): "不允许上传文件" ; ?></span>
                                        上传限制
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> 版本信息</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <span class="pull-right">1.0</span>
                                        版本
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="pull-right">游渔</span>
                                        作者
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="pull-right">shang.knight@qq.com</span>
                                        邮箱
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="pull-right">540346095</span>
                                        QQ
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="pull-right">http://aincrad.sinaapp.com/</span>
                                        主页
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="pull-right">http://weibo.com/u/1681195485</span>
                                        微博
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="/my_project/lab_manage/youyulabmanage/3/Public/static/js/jquery-1.11.2.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/my_project/lab_manage/youyulabmanage/3/Public/static/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="/my_project/lab_manage/youyulabmanage/3/Public/Admin/js/plugins/morris/raphael.min.js"></script>
    <script src="/my_project/lab_manage/youyulabmanage/3/Public/Admin/js/plugins/morris/morris.min.js"></script>
    <script src="/my_project/lab_manage/youyulabmanage/3/Public/Admin/js/plugins/morris/morris-data.js"></script>
    
    
    <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">title</h4>
            </div>
            <div class="modal-body" id="modal-body">
               
            </div>
          </div>
        </div>
    </div>
    <script>

        $("#myModal").on("hide.bs.modal", function() {
            $(this).removeData("bs.modal");
        });

        function winconfirm(){
          question = confirm("确认删除？")
          if (question == "0"){
            window.event.returnValue = false;
          }
        }
    </script>
</body>

</html>