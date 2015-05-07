<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo C('WEB_SITE_DESCRIPTION');?>">
    <meta name="keywords" content="<?php echo C('WEB_SITE_KEYWORD');?>">
    <meta name="author" content="游渔 <shang.knight@qq.com> <http://aincrad.sinaapp.com/>">
    <meta name="copyright" content="<?php echo C('WEB_SITE_ICP');?>">
    <title><?php echo C('WEB_SITE_TITLE');?></title>

    <!-- Bootstrap core CSS -->
    <link href="/my_project/lab_manage/youyulabmanage/3/Public/static/css/bootstrap.min.css" rel="stylesheet">
	
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="/my_project/lab_manage/youyulabmanage/3/Public/static/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/my_project/lab_manage/youyulabmanage/3/Public/static/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 
    <!-- Custom styles for this template -->
    <link href="/my_project/lab_manage/youyulabmanage/3/Public/static/css/carousel.css" rel="stylesheet">

    

  </head>
  <body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo C('WEB_SITE_TITLE');?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <?php if(is_array($__MENU__)): $i = 0; $__LIST__ = $__MENU__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li <?php if(($menu['active']) == "1"): ?>class="active"<?php endif; ?>><a href="<?php echo (U($menu["url"])); ?>"><?php echo ($menu["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
          
          <?php if($_SESSION['user']['uid'] > 0 ): ?><ul class="nav navbar-nav navbar-right">
              <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                  Hello ! <?php echo ($_SESSION['user']['username']); ?> <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo U('user/user_center');?>">个人中心</a></li>
                  <li><a href="<?php echo U('user/user_profile');?>">修改密码</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo U('user/logout');?>">登出</a></li>
                </ul>
              </li>
              <li><a href="#"> <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a></li>
            </ul>
          <?php else: ?>
            <div class="navbar-right navbar-form">
              <button class="btn btn-success" title="login"  data-toggle="modal" data-target="#myModal">登陆</button>
              &nbsp;
              <a href="<?php echo U('user/register');?>" class="btn btn-link">注册</a>
            </div><?php endif; ?>
          
        </div>
      </div>
    </nav>

  	<!-- login -->
  	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">登陆</h4>
            </div>
            <div class="modal-body">
               <form class="form-horizontal" role="form" id="head_login" action="<?php echo U('User/login');?>" method="post" name="head_form">
                  <br>
                  <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">邮箱</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="email" placeholder="请输入邮箱地址">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">密码</label>
                    <div class="col-sm-6">
                      <input type="password" class="form-control" name="password" placeholder="请输入密码">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="remember"> 记住我
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-3">
                      <button type="submit" class="btn btn-success">登陆</button>
                      <a href="<?php echo U('user/register');?>" class="btn btn-link">注册</a>
                    </div>
                    <div class="head_check-tips col-sm-3 text-danger control-label" style="text-align:left"></div>
                  </div>
                </form>
            </div>
          </div>
    	</div>
  	</div>
    
    <!-- carousel -->
	

   
	<!-- web main -->
    <div class="container marketing">
		  
  <div class="main-full">
    <div class="page-header">
      <h3>交流讨论 <small>Discussion</small></h3>
    </div>
    <div class="row">
      <div class="col-xs-6 col-sm-3">
        <div class="list-group">
          <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><a href="<?php echo (U($menu['url'])); ?>" class="list-group-item <?php if(($menu['active']) == "1"): ?>active<?php endif; ?>"><?php echo ($menu["name"]); ?><span class="badge"><?php echo (get_menu_doc($menu["id"])); ?></span></a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
      </div>
      <div class="col-xs-12 col-sm-9">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="discus-head">
            
              <div class="pull-left" style="width:80%">
                <ul class="nav nav-tabs">
                  <li role="presentation" <?php if(($order) == "comment"): ?>class="active"<?php endif; ?>><a href="?order=comment">最新回复</a></li>
                  <li role="presentation" <?php if(($order) == "update_time"): ?>class="active"<?php endif; ?>><a href="?order=update_time">最新发表</a></li>
                  <li role="presentation" <?php if(($order) == "position"): ?>class="active"<?php endif; ?>><a href="?order=position">精品</a></li>
                </ul> 
              </div>  
              <div class="pull-right">
                <a href="<?php echo U('index/discus_add');?>" class="btn btn-danger">发表新文章</a>
              </div>
              <div class="clear"></div>
            </div>
            <div class="discus-main">

              <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="media">
                  <a class="media-left" href="#">
                    <img src="/my_project/lab_manage/youyulabmanage/3<?php echo (get_user_head(get_username_field_info($list["username"],'cover_id'))); ?>" alt="..." class="img-thumbnail">
                  </a>
                  <div class="media-body">
                    <h5 class="media-heading"><a href="<?php echo U('index/discus',array('id'=>$list['menu_id']));?>">[ <?php echo (get_menu($list["menu_id"])); ?> ]</a>  <a href="<?php echo U('index/document',array('id'=>$list['id']));?>"><?php echo ($list["title"]); ?></a><span><?php echo (get_dis_position($list["position"])); ?></span></h5>
                    <div class="ft">
                      <span class="pull-right"><?php echo (time_format($list["update_time"])); ?></span>
                      <span class="related-info"><small><?php echo ($list["username"]); ?></small></span>
                      <span class="related-info"><small>浏览：<?php echo ($list["view"]); ?> </small></span>
                      <span class="related-info"><small>评论：<?php echo (get_comment($list["id"])); ?></small></span>
                    </div>
                  </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="discus-foot">
              <?php echo ($_page); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

	  	<!-- footer -->
	  	<footer>
	    	<p class="pull-right"><a href="#">Back to top</a></p>
	    	<p><?php echo C('WEB_SITE_ICP');?></p>
	  	</footer>

    </div><!-- /.container -->

    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/my_project/lab_manage/youyulabmanage/3/Public/static/js/jquery-1.11.2.min.js"></script>
    <script src="/my_project/lab_manage/youyulabmanage/3/Public/static/js/bootstrap.min.js"></script>
    <script src="/my_project/lab_manage/youyulabmanage/3/Public/static/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/my_project/lab_manage/youyulabmanage/3/Public/static/js/ie10-viewport-bug-workaround.js"></script>
 	  <script type="text/javascript">

      $("form[name=head_form]").submit(function(){
        var self = $(this);
        $.post(self.attr("action"), self.serialize(), success, "json");
        return false;

        function success(data){
          if(data.status){
              manhuaTip('succ',data.info);
              window.location.href = data.url;
          } else {
              manhuaTip('error',data.info);
          }
        }
      });

    $(function(){
      $("#head_login").find("input[name=email]").focus();
    });
    function manhuaTip(type,msg){
        var tipHtml = '';
        if (type =='loading'){
          tipHtml = '<img alt="" src="images/loading.gif">'+(msg ? msg : '正在提交您的请求，请稍候...');
        } else if (type =='notice'){
          tipHtml = '<span class="gtl_ico_hits"></span>'+msg
        } else if (type =='error'){
          tipHtml = '<span class="gtl_ico_fail"></span>'+msg
        } else if (type =='succ'){
          tipHtml = '<span class="gtl_ico_succ"></span>'+msg
        }
        if ($('.msgbox_layer_wrap')) {
          $('.msgbox_layer_wrap').remove();
        }
        if (st){
          clearTimeout(st);
        }
        $("body").prepend("<div class='msgbox_layer_wrap'><span id='mode_tips_v2' style='z-index: 10000;' class='msgbox_layer'><span class='gtl_ico_clear'></span>"+tipHtml+"<span class='gtl_end'></span></span></div>");
        $(".msgbox_layer_wrap").show();
        var st = setTimeout(function (){
          $(".msgbox_layer_wrap").hide();
          clearTimeout(st);
        },2000);
    }
    function location_herf(url){
        window.location.href = url;
    }

    function winconfirm(){
      question = confirm("确认删除？")
      if (question == "0"){
        window.event.returnValue = false;
      }
    }

  </script>
    
  </body>
</html>