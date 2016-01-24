<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Amaze UI Admin form Examples</title>
  <meta name="description" content="这是一个form页面">
  <meta name="keywords" content="form">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <base href="<?php echo site_url();?>">
  <link rel="icon" type="image/png" href="assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<?php include 'admin-header.php'; ?>

<div class="am-cf admin-main">
  <!-- sidebar start -->
  <?php include 'admin-sidebar.php'; ?>
  <!-- sidebar end -->

<!-- content start -->
<div class="admin-content">

  <div class="am-cf am-padding">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">文章发布</strong> / <small>Blog</small></div>
  </div>

  <div class="am-tabs am-margin" data-am-tabs>
    <ul class="am-tabs-nav am-nav am-nav-tabs">
      <li class="am-active"><a href="#tab1">文章发布</a></li>
    </ul>

    <div class="am-tabs-bd">
      <div class="am-tab-panel am-fade am-in am-active" id="tab1">
        <form class="am-form" action="blog/blog_save" method="post" enctype="multipart/form-data">
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
              文章标题
            </div>
            <div class="am-u-sm-8 am-u-md-4">
              <input type="text" class="am-input-sm input" id="title" name="title" value="">
            </div>
            <div class="am-hide-sm-only am-u-md-6">*必填，不能超过10个字符</div>
          </div>

          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
              文章作者
            </div>
            <div class="am-u-sm-8 am-u-md-4 am-u-end col-end" name="author">
              <input type="text" class="am-input-sm input" name="author" value="">
            </div>
            <div class="am-hide-sm-only am-u-md-6">*必填，请输入管理员序号</div>
          </div>

          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
              图片上传
            </div>
            <div class="am-u-sm-8 am-u-md-4">
              <input type="file" class="am-input-sm">
            </div>
            <div class="am-hide-sm-only am-u-md-6">*选填，图片格式不大于3M</div>
          </div>

          <!-- <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
              内容摘要
            </div>
            <div class="am-u-sm-8 am-u-md-4">
              <input type="text" class="am-input-sm">
            </div>
            <div class="am-u-sm-12 am-u-md-6">不填写则自动截取内容前255字符</div>
          </div> -->

          <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
              文章内容
            </div>
            <div class="am-u-sm-12 am-u-md-10">
              <textarea rows="10" placeholder="" name="content" class="input"></textarea>
            </div>
          </div>

          <div class="am-margin">
            <button type="button" class="am-btn am-btn-primary am-btn-xs" id="save_blog">提交保存</button>
            <button type="button" class="am-btn am-btn-primary am-btn-xs">重置</button>
          </div>

        </form>
      </div>







<!-- content end -->

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer>
  <hr>
  <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/app.js"></script>
    <script>
      $(function(){
        $('#save_blog').on('click',function(){
          var $title = $('input[name="title"]'),
              $author = $('input[name="author"]'),
              $content = $('textarea[name="content"]');
//          $('.input').each(function(){
//              if(this.value == ""){
//                $(this).css("border","red 2px solid")
//                       .focus(function(){
//                         $(this).css("border","");
//                       });
//              }
//          });
          if($title.val() == ''||$author.val() == ''||$content.val() == ''){
              $('.input').each(function(){
                if(this.value == ""){
                  $(this).css("border","red 2px solid")
                        .focus(function(){
                          $(this).css("border","");
                        });
                }
              });
              alert('您有信息未填写！');
          }else{
            $.post(
                "blog/blog_save",
                {title:$title.val(),author:$author.val(),content:$content.val()},
                function(res){
                  if(res == 'Success'){
                    alert('已提交！！');
                    $title.val('');
                    $author.val('');
                    $content.val('');
                  }else if(res == 'Fail'){
                    alert('保存失败，请稍后再试！');
                  }else if(res == 'Not'){
                    alert('您有信息未填写！');
                  }
                }
            )
          }
        })
      })
    </script>
</body>
</html>