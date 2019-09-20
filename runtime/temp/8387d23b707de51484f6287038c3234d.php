<?php /*a:2:{s:63:"D:\xampp\htdocs\myshop\application\admin\view\admin\create.html";i:1557713412;s:57:"D:\xampp\htdocs\myshop\application\admin\view\layout.html";i:1557490037;}*/ ?>
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
          贤心
        </a>
        <dl class="layui-nav-child">
          <dd><a href="">基本资料</a></dd>
          <dd><a href="">安全设置</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a href="">退了</a></li>
    </ul>
  </div>
  
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="javascript:;">用户管理</a>
          <dl class="layui-nav-child">
            <dd><a href="<?php echo url('admin/create'); ?>">添加用户</a></dd>
            <dd><a href="<?php echo url('admin/index'); ?>">用户列表</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">解决方案</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;">列表一</a></dd>
            <dd><a href="javascript:;">列表二</a></dd>
            <dd><a href="">超链接</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item"><a href="">云市场</a></li>
        <li class="layui-nav-item"><a href="">发布商品</a></li>
      </ul>
    </div>
  </div>
  
  <div class="layui-body">

    <!-- 内容主体区域 -->
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
<!-- <script>
  // alert($);
  $('button').eq(0).click(function(){
    var admin_name=$('input').eq(0).val();
    $.post(
      "<?php echo url('save'); ?>",
      {admin_name:admin_name,admin_pwd:$('input').eq(1).val(),admin_email:$('input').eq(2).val(),admin_tel:$('input').eq(3).val()},
      function(res){
        console.log(res);
        if(res==1)
        {
          alert('添加成功');
        }else{
          alert('添加失败');
        };
      },

    );
    return false;
  });
</script> -->
<!-- <script>
  $('button').eq(0).click(function(){
    var admin_name=$('input').eq(0).val();
    var admin_pwd=$('input').eq(1).val();
    var admin_email=$('input').eq(2).val();
    var admin_tel=$('input').eq(3).val();
    $.post(
      "<?php echo url('save'); ?>",
      {admin_name:admin_name,admin_pwd:admin_pwd,admin_email:admin_email,admin_tel:admin_tel},
      function(res){
        // console.log(res);
        if(res==1)
        {
          alert("添加成功");
        }else{
          alert("添加失败");
        }
      },
    );
    return false;
  });
</script> -->
<!-- <script>
  $('button').eq(0).click(function(){
    var admin_name=$('input').eq(0).val();
    var admin_pwd=$('input').eq(1).val();
    var admin_email=$('input').eq(2).val();
    var admin_tel=$('input').eq(3).val();
    $.post(
      "<?php echo url('save'); ?>",
      {admin_name:admin_name,admin_pwd:admin_pwd,admin_email:admin_email,admin_tel:admin_tel},
      function(res)
      {
        if(res==1)
        {
          alert("添加成功");
        }else{
          alert("添加失败");
        }
      },
      'json'
    );
    return false;
  });
</script> -->
<script>
  $(function(){
    $('#myform').submit(function(){
      var data=$('#myform').serialize();
      // console.log();
      $.post("<?php echo url('save'); ?>",data,function(res){
        alert(res.msg);
        if(res.code==1)
        {
          location.href="<?php echo url('index'); ?>";
        };
      },'json');

      return false;
    });
  });
</script>
</div>
  </div>
  
  <div class="layui-footer">
    <!-- 底部固定区域 -->
    © layui.com - 底部固定区域
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