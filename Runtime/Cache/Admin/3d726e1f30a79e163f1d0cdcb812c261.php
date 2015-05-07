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
              系统 <small>网站设置</small>
          </eq>
          </h1>
          <form class="form-horizontal" role="form" id="form" action="<?php echo U('Webset/webset_sub');?>" method="post" name="form">
            <div class="form-group">
              <label for="WEB_SITE_TITLE" class="col-sm-3 control-label">网站标题</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="WEB_SITE_TITLE" id="WEB_SITE_TITLE" value="<?php echo ((isset($list['WEB_SITE_TITLE']) && ($list['WEB_SITE_TITLE'] !== ""))?($list['WEB_SITE_TITLE']):''); ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="WEB_SITE_DESCRIPTION" class="col-sm-3 control-label">网站描述</label>
              <div class="col-sm-3">
                <textarea class="form-control" rows="2" name="WEB_SITE_DESCRIPTION" id="WEB_SITE_DESCRIPTION"><?php echo ((isset($list['WEB_SITE_DESCRIPTION']) && ($list['WEB_SITE_DESCRIPTION'] !== ""))?($list['WEB_SITE_DESCRIPTION']):''); ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="WEB_SITE_KEYWORD" class="col-sm-3 control-label">网站关键字</label>
              <div class="col-sm-3">
                <textarea class="form-control" rows="2" name="WEB_SITE_KEYWORD" id="WEB_SITE_KEYWORD"><?php echo ((isset($list['WEB_SITE_KEYWORD']) && ($list['WEB_SITE_KEYWORD'] !== ""))?($list['WEB_SITE_KEYWORD']):''); ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="WEB_SITE_ICP" class="col-sm-3 control-label">网站备案号</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="WEB_SITE_ICP" id="WEB_SITE_ICP" value="<?php echo ((isset($list['WEB_SITE_ICP']) && ($list['WEB_SITE_ICP'] !== ""))?($list['WEB_SITE_ICP']):''); ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="NEWS_SIDEBAR" class="col-sm-3 control-label">新闻侧边栏</label>
              <div class="col-sm-3">
                <textarea class="form-control" rows="3" name="NEWS_SIDEBAR" id="NEWS_SIDEBAR"><?php echo ((isset($list['NEWS_SIDEBAR']) && ($list['NEWS_SIDEBAR'] !== ""))?($list['NEWS_SIDEBAR']):''); ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="DOC_SIDEBAR" class="col-sm-3 control-label">文章侧边栏</label>
              <div class="col-sm-3">
                <textarea class="form-control" rows="3" name="DOC_SIDEBAR" id="DOC_SIDEBAR"><?php echo ((isset($list['DOC_SIDEBAR']) && ($list['DOC_SIDEBAR'] !== ""))?($list['DOC_SIDEBAR']):''); ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="WEB_SITE_CLOSE" class="col-sm-3 control-label">站点</label>
              <div class="col-sm-3">
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="WEB_SITE_CLOSE" value="1" <?php if(($list['WEB_SITE_CLOSE']) == "1"): ?>checked="checked"<?php endif; ?>>开启
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="WEB_SITE_CLOSE" value="0" <?php if(($list['WEB_SITE_CLOSE']) == "0"): ?>checked="checked"<?php endif; ?>>关闭
                    </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="WEB_REGISTER_CLOSE" class="col-sm-3 control-label">注册</label>
              <div class="col-sm-3">
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="WEB_REGISTER_CLOSE" value="1" <?php if(($list['WEB_REGISTER_CLOSE']) == "1"): ?>checked="checked"<?php endif; ?>>开启
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="WEB_REGISTER_CLOSE" value="0" <?php if(($list['WEB_REGISTER_CLOSE']) == "0"): ?>checked="checked"<?php endif; ?>>关闭
                    </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="WEB_COMMENT_CLOSE" class="col-sm-3 control-label">评论</label>
              <div class="col-sm-3">
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="WEB_COMMENT_CLOSE" value="1" <?php if(($list['WEB_COMMENT_CLOSE']) == "1"): ?>checked="checked"<?php endif; ?>>开启
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="WEB_COMMENT_CLOSE" value="0" <?php if(($list['WEB_COMMENT_CLOSE']) == "0"): ?>checked="checked"<?php endif; ?>>关闭
                    </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="WEB_VERIFY_CLOSE" class="col-sm-3 control-label">审核</label>
              <div class="col-sm-3">
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="WEB_VERIFY_CLOSE" value="1" <?php if(($list['WEB_VERIFY_CLOSE']) == "1"): ?>checked="checked"<?php endif; ?>>开启
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="WEB_VERIFY_CLOSE" value="0" <?php if(($list['WEB_VERIFY_CLOSE']) == "0"): ?>checked="checked"<?php endif; ?>>关闭
                    </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-1">
                <button type="submit" class="btn btn-primary">确认</button>
              </div>
              <div class="check-tips col-sm-3 text-danger control-label" style="text-align:left"></div>
            </div>
          </form>
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
      $("form[name=form]").submit(function(){
        var self = $(this);
        $.post(self.attr("action"), self.serialize(), success, "json");
        return false;

        function success(data){
          if(data.status){
            window.location.href = data.url;
          } else {
            self.find(".check-tips").text(data.info);
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