<?php /*a:4:{s:89:"E:\phpStudy\PHPTutorial\WWW\month4\1901b\myshop\application\admin\view\category\edit.html";i:1558489251;s:82:"E:\phpStudy\PHPTutorial\WWW\month4\1901b\myshop\application\admin\view\layout.html";i:1557798597;s:89:"E:\phpStudy\PHPTutorial\WWW\month4\1901b\myshop\application\admin\view\public\header.html";i:1558054745;s:87:"E:\phpStudy\PHPTutorial\WWW\month4\1901b\myshop\application\admin\view\public\left.html";i:1558323279;}*/ ?>
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
      <div style="padding: 15px;"><div style="width: 600px;">
<form class="layui-form" action="" id="myform">
    <div class="layui-form-item">
        <label class="layui-form-label">分类名称</label>
        <div class="layui-input-block">
            <input type="text" name="cate_name" class="layui-input" value="<?php echo htmlentities($cateInfo['cate_name']); ?>">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">父分类</label>
        <div class="layui-input-block">
            <select name="pid">
                <option value="0">--请选择--</option>
                <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if($cateInfo['pid']==$v['cate_id']): ?>
                        <option value="<?php echo htmlentities($v['cate_id']); ?>" selected><?php echo str_repeat('&nbsp;&nbsp;',$v['level']*2); ?><?php echo htmlentities($v['cate_name']); ?></option>
                    <?php else: ?>
                        <option value="<?php echo htmlentities($v['cate_id']); ?>"><?php echo str_repeat('&nbsp;&nbsp;',$v['level']*2); ?><?php echo htmlentities($v['cate_name']); ?></option>
                    <?php endif; ?>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">是否展示</label>
        <div class="layui-input-block">
            <?php if($cateInfo['is_show']==1): ?>
            <input type="radio" name="is_show" value="1" title="是" checked>
            <input type="radio" name="is_show" value="2" title="否" >
            <?php else: ?>
            <input type="radio" name="is_show" value="1" title="是" >
            <input type="radio" name="is_show" value="2" title="否" checked>
            <?php endif; ?>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">是否在导航栏展示</label>
        <div class="layui-input-block">
            <?php if($cateInfo['is_nav_show']==1): ?>
            <input type="radio" name="is_nav_show" value="1" title="是" checked>
            <input type="radio" name="is_nav_show" value="2" title="否" >
            <?php else: ?>
            <input type="radio" name="is_nav_show" value="1" title="是" >
            <input type="radio" name="is_nav_show" value="2" title="否" checked>
            <?php endif; ?>
        </div>
    </div>

    <input type="hidden" name="cate_id" value="<?php echo htmlentities($cateInfo['cate_id']); ?>">

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
</div>
<script>
    $(function(){
        layui.use('form', function(){
            var form = layui.form;

            //点击表单提交
            $("#myform").submit(function(){
                var data=$("#myform").serialize();

                //把数据提交给控制器
                $.post(
                    "<?php echo url('update'); ?>",
                    data,
                    function(res){

                        alert(res.msg);
                        if(res.code==1){
                            location.href="<?php echo url('index'); ?>"
                        }
                    },'json'
                );

                return false;
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