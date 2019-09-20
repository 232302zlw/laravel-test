<?php /*a:4:{s:80:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\admin\view\admin\create.html";i:1557728594;s:74:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\admin\view\layout.html";i:1557798598;s:81:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\admin\view\public\header.html";i:1558054746;s:79:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\admin\view\public\left.html";i:1561706674;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <script src="/static/jquery.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>layout 后台大布局 - Layui</title>
  <link rel="stylesheet" href="/static/layui/css/layui.css">
  <script src="/static/layui/layui.js"></script>
</head>
<body class="layui-layout-body">
  <div class="layui-layout layui-layout-admin">
    
    <div class="layui-header">
    <div class="layui-logo">唐老板的后台</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-left">
        <li class="layui-nav-item"><a href="">控制台</a></li>
        <li class="layui-nav-item"><a href="">商品管理</a></li>
        <li class="layui-nav-item"><a href="">用户</a></li>
        <li class="layui-nav-item">
            <a href="javascript:;">其它系统</a>
            <dl class="layui-nav-child">
                <dd><a href="">邮件管理</a></dd>
                <dd><a href="">消息管理</a></dd>
                <dd><a href="">授权管理</a></dd>
            </dl>
        </li>
    </ul>
    <ul class="layui-nav layui-layout-right">
        <li class="layui-nav-item">
            <a href="javascript:;">
                <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                <?php echo htmlentities(app('session')->get('adminInfo.admin_name')); ?>
            </a>
            <dl class="layui-nav-child">
                <dd><a href="">基本资料</a></dd>
                <dd><a href="">安全设置</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item"><a href="<?php echo url('Login/quit'); ?>">退了</a></li>
    </ul>
</div>

    
    <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
        <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
        <ul class="layui-nav layui-nav-tree"  lay-filter="test">
            <li class="layui-nav-item layui-nav-itemed">
                <a class="" href="javascript:;">管理员管理</a>
                <dl class="layui-nav-child">
                    <dd><a href="<?php echo url('admin/create'); ?>">管理员添加</a></dd>
                    <dd><a href="<?php echo url('admin/index'); ?>">管理员列表</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a class="" href="javascript:;">品牌管理</a>
                <dl class="layui-nav-child">
                    <dd><a href="<?php echo url('Brand/create'); ?>">品牌添加</a></dd>
                    <dd><a href="<?php echo url('Brand/index'); ?>">品牌列表</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a class="" href="javascript:;">分类管理</a>
                <dl class="layui-nav-child">
                    <dd><a href="<?php echo url('Category/create'); ?>">分类添加</a></dd>
                    <dd><a href="<?php echo url('Category/index'); ?>">分类列表</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a class="" href="javascript:;">商品管理</a>
                <dl class="layui-nav-child">
                    <dd><a href="<?php echo url('Goods/create'); ?>">商品添加</a></dd>
                    <dd><a href="<?php echo url('Goods/index'); ?>">商品列表</a></dd>
                </dl>
            </li>
             <li class="layui-nav-item">
                <a class="" href="javascript:;">评论管理</a>
                <dl class="layui-nav-child">
      
                    <dd><a href="<?php echo url('Comment/index'); ?>">评论列表</a></dd>
                </dl>
            </li>
        </ul>
    </div>
</div>

    
    <div class="layui-body">
      <div style="padding: 15px;"><form class="layui-form" action="<?php echo url('save'); ?>" method="post" id="myform">
  <div class="layui-form-item layui-col-md5">
    <label class="layui-form-label layui-icon layui-icon-username">用户名</label>
    <div class="layui-input-block">
      <input type="text" name="admin_name"   lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item layui-col-md5">
    <label class="layui-form-label layui-icon layui-icon-password">密码</label>
    <div class="layui-input-block">
      <input type="password" name="admin_pwd"  lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
    </div>
    </div>
  <div class="layui-form-item layui-col-md5">
    <label class="layui-form-label layui-icon  layui-icon-picture-fine">邮箱</label>
    <div class="layui-input-block">
      <input type="text" name="admin_email"   lay-verify="required" placeholder="请输入邮箱" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item layui-col-md5">
    <label class="layui-form-label layui-icon layui-icon-cellphone">电话</label>
    <div class="layui-input-block">
      <input type="text" name="admin_tel"   lay-verify="required" placeholder="请输入电话" autocomplete="off" class="layui-input">
    </div>
  </div>
  
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
       <button  type="reset" class="layui-btn layui-btn-radius layui-btn-normal">重置</button>
    </div>
  </div>
</form>

<script>
  $(function(){
    $('#myform').submit(function(){ // 绑定表单的提交事件
      var data=$('#myform').serialize();// 就是你要提交表单所有的数据

      $.post(
          "<?php echo url('save'); ?>",
          data,function(res){
            alert(res.msg); // 查看你的错误信息
            if(res.code==1)
            {
              location.href="<?php echo url('index'); ?>";
            }
          },
          'json'
      );

      return false;
    });
  });
</script>
</div>
    </div>

  </div>

<script>
//JavaScript代码区域
layui.use('element', function(){
  var element = layui.element;
  
});
</script>
</body>
</html>