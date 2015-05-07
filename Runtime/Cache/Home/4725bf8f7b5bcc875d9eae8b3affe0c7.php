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
    <div class="row">
      <div class="col-xs-12 col-sm-9">
        <div class="panel panel-default document">
          <div class="panel-body">
            <div class="document-head">
              <div class="page-header">
                <h2 style="color:#323232"><?php echo ($list["title"]); ?></h2>
              </div>
              <div class="document-head-bottom">
                <span class="related-info">浏览：<?php echo ($list["view"]); ?></span>
                <span class="related-info">发布日期：<?php echo (time_format($list["create_time"])); ?></span>
                <span class="related-info">分类：<?php echo (get_up_menu($list["menu_id"])); ?></span>
                <span class="related-info">作者：<?php echo ($list["username"]); ?></span>
                <?php if(($list['username']) == $_SESSION['user']['username']): ?><span class="related-info"><a href="<?php echo U('index/document_del',array('id'=>$list['id']));?>" onclick="winconfirm()">删除</a></span><?php endif; ?>
              </div>
            </div> 
            <div class="document-main" style="color:#323232">
              <br>
              <?php echo (htmlspecialchars_decode($list["content"])); ?>
            </div> 
            <div class="document-foot">
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><span class="text-info glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;&nbsp;评论</h3>
          </div>
          <div class="panel-body">
            <div class="comment" id="comment_content">

            </div>
            
            <div style="text-align: center"><?php echo ($_page); ?></div>
            <div class="comment-sub">
              <form class="form-horizontal" role="form" id="form" action="<?php echo U('index/comment_sub');?>" method="post" name="form">
                <div class="media">
                  <a class="media-left" href="#">
                    <img src="/my_project/lab_manage/youyulabmanage/3<?php echo (get_user_head(get_user_field_info($_SESSION['user']['uid'],'cover_id'))); ?>" alt="..." class="img-thumbnail">
                  </a>
                  <div class="media-body">
                    <input type="hidden" name="document_id" id="document_id" value="<?php echo ($list["id"]); ?>">
                    <input type="hidden" name="p" id="p" value="<?php echo ($p); ?>">
                    <textarea name="comment_content" class="form-control" placeholder="我也来说两句.."></textarea>
                    
                    <div class="col-sm-1">
                      <button type="submit" class="btn btn-sm btn-primary" style="margin-left:-15px">评论</button>
                    </div>
                    <div class="check-tips col-sm-3 text-danger control-label" style="text-align:left"></div> 
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-sm-3">
        <div class="panel panel-default document">
          <div class="panel-body">
            <?php echo ($sidebar); ?>
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
    
  <script type="text/javascript">
      $("form[name=form]").submit(function(){
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
      $(document).ready(function(){
        var id = $('#document_id').val();
        var p = $('#p').val();

        $.get("<?php echo U('index/comment');?>" ,{id:id,p:p}, function(data){
            $('#comment_content').html(data);
        });

      });

  </script>

  </body>
</html>