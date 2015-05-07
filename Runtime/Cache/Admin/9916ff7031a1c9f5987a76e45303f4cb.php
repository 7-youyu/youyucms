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
                用户 <small>用户查看</small>
                <a href="<?php echo U('user/user_add');?>" class="btn btn-primary" title="add"  data-toggle="modal"  data-target="#myModal" data-target=".bs-example-modal-lg">新增</a>
            </eq>
            </h1>
            <div class="table-responsive back-main">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>呢称</th>
                            <th>邮箱</th>
                            <th>登陆次数</th>
                            <th>最后登陆时间</th>
                            <th>级别</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(is_array($result)): foreach($result as $key=>$list): ?><tr>
                            <td><?php echo ($list["uid"]); ?></td>
                            <td><?php echo ($list["username"]); ?></td>
                            <td><?php echo ($list["email"]); ?></td>
                            <td><?php echo ($list["login"]); ?></td>
                            <td><?php echo (date('Y-m-d',$list["last_login_time"])); ?></td>
                            <td><?php echo (get_admin($list["uid"])); ?></td>
                            <td><?php echo (get_status($list["status"])); ?></td>
                            <td>
                                <div class="dropdown">
                                  <button class="btn btn-primary btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                                    操作
                                    <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                    <li role="presentation"><a href="<?php echo U('user/user_edit',array('uid'=>$list['uid']));?>" data-toggle="modal" data-target="#myModal"><i class="icon-pencil" data-target=".bs-example-modal-lg"></i> 编辑</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo U('user/user_del',array('uid'=>$list['uid']));?>" onclick="winconfirm()"><i class="icon-trash"></i> 删除</a></li>
                                  </ul>
                                </div>
                            </td>
                        </tr><?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
            <div style="text-align:center"><?php echo ($_page); ?></div>
            
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