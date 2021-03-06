<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Amaze UI Admin table Examples</title>
  <meta name="description" content="这是一个 table 页面">
  <meta name="keywords" content="table">
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
  <?php include 'admin-sidebar.php'; ?>

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">文章管理</strong> / <small>Blog</small></div>
    </div>

    <div class="am-g">
      <div class="am-u-sm-12 am-u-md-6">
        <div class="am-btn-toolbar">
          <div class="am-btn-group am-btn-group-xs">
            <button type="button" class="am-btn am-btn-default"><a href="blog/blog_save_form"><span class="am-icon-plus"></span> 新增</a></button>
            <button type="button" class="am-btn am-btn-default"><a href="#" style="color:#de6662"><span class="am-icon-trash-o"></span> 批量删除</a></button>
          </div>
        </div>
      </div>
    </div>

    <div class="am-g">
      <div class="am-u-sm-12">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th>
                <th class="table-id">ID</th>
                <th class="table-title">作者</th>
                <th>标题</th>
                <th class="table-type">内容</th>
                <th>添加时间</th>
                <th class="table-set">操作</th>
              </tr>
          </thead>
          <tbody>
          <?php
            foreach($blogs as $blog){
          ?>
              <tr>
                <td><input type="checkbox" /></td>
                <td><?php echo $blog -> blog_id; ?></td>
                <td><a href="#"><?php echo $blog -> admin_name; ?></a></td>
                <td><?php echo $blog -> title; ?></td>
                <td><?php echo mb_substr($blog -> content,0,15).'......'; ?></td>
                <td><?php echo $blog -> add_time; ?></td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <button data-id="<?php echo $blog -> blog_id; ?>" class="am-btn blog-btn-noadd am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
                    </div>
                  </div>
                </td>
              </tr>
          <?php
            }
          ?>
          </tbody>
        </table>
      </div>

    </div>
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
   $('.blog-btn-noadd').on('click', function(){
     var $that = $(this);
     var blogId =  $(this).data('id');
     if(confirm('请确定是否删除记录，将不可恢复!!')&&confirm('请再次确定是否删除记录，将不可恢复!!')){
       $.get(
         "blog/blog_delete",
         {blog_id: blogId},
         function(res){
           if(res == 'Success'){
             $that.parents('tr').remove();
             alert('已删除');
           }else{
             alert('未删除成功，请稍后再试');
           }
         }
       );
     }
   });
 });



</script>
</body>
</html>
