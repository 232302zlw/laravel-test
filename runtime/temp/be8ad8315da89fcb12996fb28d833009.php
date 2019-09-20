<?php /*a:4:{s:80:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\admin\view\comment\show.html";i:1561711192;s:74:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\admin\view\layout.html";i:1557798598;s:81:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\admin\view\public\header.html";i:1558054746;s:79:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\admin\view\public\left.html";i:1561706674;}*/ ?>
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
      <div style="padding: 15px;"><div style="width: 600px">
    <form class="layui-form" >
    <div class="layui-form-item">
        <p><?php echo htmlentities($data['user_name']); ?>于<?php echo date('Y-m-d H:i:s',$data['add_time']); ?> 时间对 <?php echo htmlentities($data['goods_name']); ?> 发表评论</p>
        <p> <?php echo htmlentities($data['content']); ?></p>
    </div>
    <div class="layui-form-item">
        
        <div class="layui-input-block">
            <input class="btn" type="button" id="<?php echo htmlentities($data['c_id']); ?>" status="<?php echo htmlentities($data['status']); ?>" name="brand_url" <?php if($data['status']==0): ?> value='允许显示' <?php else: ?> value='禁止显示'<?php endif; ?> >
        </div>
    </div>
   </form> 
    
    <form class="layui-form" action="<?php echo url('Comment/replay',['id'=>$data['c_id']]); ?>" method="post" >
    <div class="layui-form-item">
        <label class="layui-form-label">用户名：</label>
        <div class="layui-input-block">
            <input type="text" name="admin_name"  class="layui-input" value="<?php echo htmlentities($user['admin_name']); ?>" disabled="">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">email：</label>
        <div class="layui-input-block">
            <input type="text" name="email"   class="layui-input" value="<?php echo htmlentities($user['admin_email']); ?>"  disabled="">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">回复内容</label>
        <div class="layui-input-block">
             <textarea type="text" name="content" ></textarea>
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="*">立即回复</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
</div>
<script>
  $('.btn').click(function(){
      var id = $(this).attr('id');
      var status = $(this).attr('status');
      var obj = $(this);
       $.post(
                "<?php echo url('Comment/changeStatus'); ?>",
                {c_id:id,status:status},
                function(res){
                   var new_status = status==0?1:0;
                   obj.attr('status',new_status);
                   var value = new_status==0?'允许显示':'禁止显示';
                   obj.val(value);
                }
            );
  })
</script></div>
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