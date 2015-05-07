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
            <h1 class="page-header main-title">
                备份 <small>数据备份</small>
            </h1>
            <div class="cf">
                <a id="export" class="btn btn-primary" href="javascript:;" autocomplete="off">立即备份</a>
                <a id="optimize" class="btn btn-primary" href="<?php echo U('database/optimize');?>">优化表</a>
                <a id="repair" class="btn btn-primary" href="<?php echo U('database/repair');?>">修复表</a>
            </div>
            <hr>
            <div class="table-responsive back-main">
            <form id="export-form" method="post" action="<?php echo U('export');?>">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th width="48"><input class="check-all" checked="chedked" type="checkbox" value=""></th>
                            <th>表名</th>
                            <th width="120">数据量</th>
                            <th width="120">数据大小</th>
                            <th width="160">创建时间</th>
                            <th width="160">备份状态</th>
                            <th width="120">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$table): $mod = ($i % 2 );++$i;?><tr>
                                <td class="num">
                                    <input class="ids" checked="chedked" type="checkbox" name="tables[]" value="<?php echo ($table["name"]); ?>">
                                </td>
                                <td><?php echo ($table["name"]); ?></td>
                                <td><?php echo ($table["rows"]); ?></td>
                                <td><?php echo (format_bytes($table["data_length"])); ?></td>
                                <td><?php echo ($table["create_time"]); ?></td>
                                <td class="info">未备份</td>
                                <td class="action">
                                    <a class="ajax-get no-refresh" href="<?php echo U('optimize?tables='.$table['name']);?>">优化表</a>&nbsp;
                                    <a class="ajax-get no-refresh" href="<?php echo U('repair?tables='.$table['name']);?>">修复表</a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </form>
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
    (function($){
        var $form = $("#export-form"), $export = $("#export"), tables
            $optimize = $("#optimize"), $repair = $("#repair");

        $optimize.add($repair).click(function(){
            $.post(this.href, $form.serialize(), function(data){
                if(data.status){
                    updateAlert(data.info,'alert-success');
                } else {
                    updateAlert(data.info,'alert-error');
                }
                setTimeout(function(){
	                $('#top-alert').find('button').click();
	                $(that).removeClass('disabled').prop('disabled',false);
	            },1500);
            }, "json");
            return false;
        });

        $export.click(function(){
            $export.parent().children().addClass("disabled");
            $export.html("正在发送备份请求...");
            $.post(
                $form.attr("action"),
                $form.serialize(),
                function(data){
                    if(data.status){
                        tables = data.tables;
                        $export.html(data.info + "开始备份，请不要关闭本页面！");
                        backup(data.tab);
                        window.onbeforeunload = function(){ return "正在备份数据库，请不要关闭！" }
                    } else {
                        updateAlert(data.info,'alert-error');
                        $export.parent().children().removeClass("disabled");
                        $export.html("立即备份");
                        setTimeout(function(){
        	                $('#top-alert').find('button').click();
        	                // $(that).removeClass('disabled').prop('disabled',false);
        	            },1500);
                    }
                },
                "json"
            );
            return false;
        });

        function backup(tab, status){
            status && showmsg(tab.id, "开始备份...(0%)");
            $.get($form.attr("action"), tab, function(data){
                if(data.status){
                    showmsg(tab.id, data.info);

                    if(!$.isPlainObject(data.tab)){
                        $export.parent().children().removeClass("disabled");
                        $export.html("备份完成，点击重新备份");
                        window.onbeforeunload = function(){ return null }
                        return;
                    }
                    backup(data.tab, tab.id != data.tab.id);
                } else {
                    updateAlert(data.info,'alert-error');
                    $export.parent().children().removeClass("disabled");
                    $export.html("立即备份");
                    setTimeout(function(){
    	                $('#top-alert').find('button').click();
    	                // $(that).removeClass('disabled').prop('disabled',false);
    	            },1500);
                }
            }, "json");

        }

        function showmsg(id, msg){
            $form.find("input[value=" + tables[id] + "]").closest("tr").find(".info").html(msg);
        }
    })(jQuery);

    $(".check-all").click(function(){
        $(".ids").prop("checked", this.checked);
    });
    $(".ids").click(function(){
        var option = $(".ids");
        option.each(function(i){
            if(!this.checked){
                $(".check-all").prop("checked", false);
                return false;
            }else{
                $(".check-all").prop("checked", true);
            }
        });
    });
    /**顶部警告栏*/
    var content = $('#main');
    var top_alert = $('#top-alert');
    top_alert.find('.close').on('click', function () {
        top_alert.removeClass('block').slideUp(200);
        // content.animate({paddingTop:'-=55'},200);
    });
     window.updateAlert = function (text,c) {
        text = text||'default';
        c = c||false;
        if ( text!='default' ) {
            top_alert.find('.alert-content').text(text);
            if (top_alert.hasClass('block')) {
            } else {
                top_alert.addClass('block').slideDown(200);
                // content.animate({paddingTop:'+=55'},200);
            }
        } else {
            if (top_alert.hasClass('block')) {
                top_alert.removeClass('block').slideUp(200);
                // content.animate({paddingTop:'-=55'},200);
            }
        }
        if ( c!=false ) {
            top_alert.removeClass('alert-error alert-warn alert-info alert-success').addClass(c);
        }
    };
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