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
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">表单</strong> / <small>form</small></div>
  </div>

  <div class="am-tabs am-margin" data-am-tabs>
    <ul class="am-tabs-nav am-nav am-nav-tabs">
      <li class="am-active"><a href="#tab1">文章发布</a></li>
      <li><a href="#tab2">用户新增</a></li>
      <li><a href="#tab3">信息变更</a></li>
    </ul>

    <div class="am-tabs-bd">
      <div class="am-tab-panel am-fade am-in am-active" id="tab1">
        <form class="am-form" action="blog/blog_save" method="post">
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
              文章标题
            </div>
            <div class="am-u-sm-8 am-u-md-4">
              <input type="text" class="am-input-sm" name="title">
            </div>
            <div class="am-hide-sm-only am-u-md-6">*必填，不可重复</div>
          </div>

          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
              文章作者
            </div>
            <div class="am-u-sm-8 am-u-md-4 am-u-end col-end" name="author">
              <input type="text" class="am-input-sm" name="author">
            </div>
          </div>

          <!-- <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
              信息来源
            </div>
            <div class="am-u-sm-8 am-u-md-4">
              <input type="text" class="am-input-sm">
            </div>
            <div class="am-hide-sm-only am-u-md-6">选填</div>
          </div> -->

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
              <textarea rows="10" placeholder="" name="content"></textarea>
            </div>
          </div>

          <div class="am-margin">
            <input type="submit" value="提交保存" class="am-btn am-btn-primary am-btn-xs" />
            <button type="button" class="am-btn am-btn-primary am-btn-xs">重置</button>
          </div>

        </form>
      </div>



      <div class="am-tab-panel am-fade" id="tab2">
        <form class="am-form" action="admin/save_admin" method="post">
          <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
              用户名
            </div>
            <div class="am-u-sm-8 am-u-md-4 am-u-end">
              <input type="text" class="am-input-sm" name="admin_name">
            </div>
          </div>

          <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
             密码
            </div>
            <div class="am-u-sm-8 am-u-md-4 am-u-end">
              <input type="password" class="am-input-sm" name="admin_pwd">
            </div>
          </div>

          <div class="am-margin">
            <input type="submit" value="提交保存" class="am-btn am-btn-primary am-btn-xs" />
            <button type="button" class="am-btn am-btn-primary am-btn-xs">重置</button>
          </div>

        </form>
      </div>




      <div class="am-tab-panel am-fade" id="tab3">

        <form class="am-form" action="admin/update_admin" method="post">
          <input name="admin_id" type="hidden" value="<?php echo $this->input -> get('admin_id');?>">
          <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
              旧用户名
            </div>
            <div class="am-u-sm-8 am-u-md-4 am-u-end">
              <input type="text" class="am-input-sm" name="admin_old_name" value="<?php echo $admins -> admin_name; ?>">
            </div>
          </div>

          <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
              旧密码
            </div>
            <div class="am-u-sm-8 am-u-md-4 am-u-end">
              <input type="password" class="am-input-sm" name="admin_old_pwd" value="<?php echo $admins -> admin_pwd; ?>">
            </div>
          </div>
          <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
              新用户名
            </div>
            <div class="am-u-sm-8 am-u-md-4 am-u-end">
              <input type="text" class="am-input-sm" name="admin_new_name">
            </div>
          </div>

          <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
              新密码
            </div>
            <div class="am-u-sm-8 am-u-md-4 am-u-end">
              <input type="password" class="am-input-sm" name="admin_new_pwd">
            </div>
          </div>

          <div class="am-margin">
            <input type="submit" value="提交保存" class="am-btn am-btn-primary am-btn-xs" />
            <button type="button" class="am-btn am-btn-primary am-btn-xs">重置</button>
          </div>

        </form>
      </div>

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
</body>
</html>