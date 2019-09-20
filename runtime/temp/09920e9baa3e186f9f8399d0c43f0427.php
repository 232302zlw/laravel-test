<?php /*a:4:{s:88:"E:\phpStudy\PHPTutorial\WWW\month4\1901b\myshop\application\admin\view\brand\create.html";i:1557835162;s:82:"E:\phpStudy\PHPTutorial\WWW\month4\1901b\myshop\application\admin\view\layout.html";i:1557798597;s:89:"E:\phpStudy\PHPTutorial\WWW\month4\1901b\myshop\application\admin\view\public\header.html";i:1558054745;s:87:"E:\phpStudy\PHPTutorial\WWW\month4\1901b\myshop\application\admin\view\public\left.html";i:1558323279;}*/ ?>
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
        </ul>
    </div>
</div>

    
    <div class="layui-body">
      <div style="padding: 15px;"><div style="width: 600px">
<form class="layui-form" >
    <div class="layui-form-item">
        <label class="layui-form-label">品牌名称</label>
        <div class="layui-input-block">
            <input type="text" name="brand_name"    class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">网址</label>
        <div class="layui-input-block">
            <input type="text" name="brand_url"   class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">是否展示</label>
        <div class="layui-input-block">
            <input type="radio" name="is_show" value="1" title="是" checked>
            <input type="radio" name="is_show" value="2" title="否" >
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="*">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
</div>
<script>
    //页面加载
    $(function(){

        layui.use(['form'], function(){
            var form = layui.form;

            //各种基于事件的操作，下面会有进一步介绍
            form.on('submit(*)', function(data){
                //当前容器的全部表单字段，名值对形式：{name: value}
                $.post(
                    "<?php echo url('brandAdd'); ?>",
                    data.field,
                    function(res){
                        layer.msg(res.msg,{icon:res.code,time:2000},function(){
                            if(res.code==1){
                                location.href="<?php echo url('index'); ?>"
                            }
                        });

                    },
                    'json'
                );
                return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
            });
        });

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