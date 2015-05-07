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
                备份 <small>数据还原</small>
            </h1>
            <div class="table-responsive back-main">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th width="200">备份名称</th>
                            <th width="80">卷数</th>
                            <th width="80">压缩</th>
                            <th width="80">数据大小</th>
                            <th width="200">备份时间</th>
                            <th>状态</th>
                            <th width="120">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                                <td><?php echo (date('Ymd-His',$data["time"])); ?></td>
                                <td><?php echo ($data["part"]); ?></td>
                                <td><?php echo ($data["compress"]); ?></td>
                                <td><?php echo (format_bytes($data["size"])); ?></td>
                                <td><?php echo ($key); ?></td>
                                <td>-</td>
                                <td class="action">
                                    <a class="db-import" href="<?php echo U('import?time='.$data['time']);?>">还原</a>&nbsp;
                                    <a class="ajax-get confirm" href="<?php echo U('del?time='.$data['time']);?>">删除</a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
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
    
    
    <script type="text/javascript">
        $(".db-import").click(function(){
            var self = this, status = ".";
            $.get(self.href, success, "json");
            window.onbeforeunload = function(){ return "正在还原数据库，请不要关闭！" }
            return false;
        
            function success(data){
                if(data.status){
                    if(data.gz){
                        data.info += status;
                        if(status.length === 5){
                            status = ".";
                        } else {
                            status += ".";
                        }
                    }
                    $(self).parent().prev().text(data.info);
                    if(data.part){
                        $.get(self.href, 
                            {"part" : data.part, "start" : data.start}, 
                            success, 
                            "json"
                        );
                    }  else {
                        window.onbeforeunload = function(){ return null; }
                    }
                } else {
                    updateAlert(data.info,'alert-error');
                }
            }
        });
    </script>

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