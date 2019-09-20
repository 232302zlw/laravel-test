<?php /*a:4:{s:87:"E:\phpStudy\PHPTutorial\WWW\month4\1901b\myshop\application\admin\view\brand\index.html";i:1557977802;s:82:"E:\phpStudy\PHPTutorial\WWW\month4\1901b\myshop\application\admin\view\layout.html";i:1557798597;s:89:"E:\phpStudy\PHPTutorial\WWW\month4\1901b\myshop\application\admin\view\public\header.html";i:1558054745;s:87:"E:\phpStudy\PHPTutorial\WWW\month4\1901b\myshop\application\admin\view\public\left.html";i:1558323279;}*/ ?>
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
      <div style="padding: 15px;"><input type="text" id="brand_name" placeholder="品牌关键字">
<input type="text" id="brand_url" placeholder="网址关键字">
<input type="button" value="搜索" class="page" p="1">
<table class="layui-table">
    <colgroup>
        <col width="150">
        <col width="200">
        <col>
    </colgroup>
    <thead>
        <tr>
            <th>品牌id</th>
            <th>名称</th>
            <th>网址</th>
            <th>是否展示</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody id="show">
        <?php if(is_array($brandInfo) || $brandInfo instanceof \think\Collection || $brandInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $brandInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <tr brand_id="<?php echo htmlentities($v['brand_id']); ?>" >
            <td><?php echo htmlentities($v['brand_id']); ?></td>
            <td field="brand_name">
                <span><?php echo htmlentities($v['brand_name']); ?></span>
                <input type="text" value="<?php echo htmlentities($v['brand_name']); ?>" class="changeValue" style="display: none">
            </td>
            <td  field="brand_url">
                <span><?php echo htmlentities($v['brand_url']); ?></span>
                <input type="text" value="<?php echo htmlentities($v['brand_url']); ?>" class="changeValue"  style="display: none">
            </td>
            <td>
                <?php if($v['is_show']==1): ?>
                √
                <?php else: ?>
                ×
                <?php endif; ?>
            </td>
            <td><a href="">删除</a></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>

        <tr>
            <td colspan="5"> <?php echo $str; ?></td>
        </tr>

    </tbody>
</table>


<script>
    $(function(){
        //给类为page 增加一个点击事件 获取属性 p
        $(document).on("click",".page",function(){
            var _this=$(this);
            var p=_this.attr('p');//获取页码
            var brand_name=$("#brand_name").val();//获取条件
            var brand_url=$("#brand_url").val();//获取条件
            //把页码传给控制器
            $.post(
                "<?php echo url('getBrandInfo'); ?>",
                {p:p,brand_name:brand_name,brand_url:brand_url},
                function(res){
                    $("#show").html(res);
                }
            );
        })

        //即点即改
       $(document).on("click","span",function(){
           var _this=$(this);
           _this.hide();
           _this.next("input").show();
       })
        $(document).on("blur",".changeValue",function(){
            var _this=$(this);
            //获取 修改新值 字段     品牌id
            var _value=_this.val();
            var _field=_this.parent("td").attr("field");
            var brand_id=_this.parents("tr").attr('brand_id');

            $.post(
                "<?php echo url('changeValue'); ?>",
                {value:_value,field:_field,brand_id:brand_id},
                function(res){
                    if(res=='ok'){
                        _this.hide();
                        _this.prev("span").text(_value).show();
                    }
                }
            );

        })
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