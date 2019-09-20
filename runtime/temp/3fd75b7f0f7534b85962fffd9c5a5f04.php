<?php /*a:4:{s:87:"E:\phpStudy\PHPTutorial\WWW\month4\1901b\myshop\application\admin\view\goods\index.html";i:1558684845;s:82:"E:\phpStudy\PHPTutorial\WWW\month4\1901b\myshop\application\admin\view\layout.html";i:1557798597;s:89:"E:\phpStudy\PHPTutorial\WWW\month4\1901b\myshop\application\admin\view\public\header.html";i:1558054745;s:87:"E:\phpStudy\PHPTutorial\WWW\month4\1901b\myshop\application\admin\view\public\left.html";i:1558323279;}*/ ?>
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
      <div style="padding: 15px;"><form action="" id="myform">
<input type="text" name="goods_name" />
价格 <input type="text" name="price1">-<input type="text" name="price2">
品牌 :
<select name="brand_id">
    <option value="">--请选择--</option>
    <?php if(is_array($brandInfo) || $brandInfo instanceof \think\Collection || $brandInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $brandInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
    <option value="<?php echo htmlentities($v['brand_id']); ?>"><?php echo htmlentities($v['brand_name']); ?></option>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</select>
<input type="button" value="搜索" class="page" p="1">
</form>

<table class="layui-table">
    <colgroup>
        <col width="150">
        <col width="200">
        <col>
    </colgroup>
    <thead>
    <tr>
        <th>商品id</th>
        <th>名称</th>
        <th>价格</th>
        <th>库存</th>
        <th>图片</th>
        <th>相册</th>
        <th>是否新品</th>
        <th>是否精品</th>
        <th>是否热卖</th>
        <th>是否上架</th>
        <th>描述</th>
        <th>分类</th>
        <th>品牌</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody id="show">
        <?php if(is_array($goodsInfo) || $goodsInfo instanceof \think\Collection || $goodsInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><?php echo htmlentities($v['goods_id']); ?></td>
            <td><?php echo htmlentities($v['goods_name']); ?></td>
            <td><?php echo htmlentities($v['goods_price']); ?></td>
            <td><?php echo htmlentities($v['goods_number']); ?></td>
            <td><img src="/upload/goods_img/<?php echo htmlentities($v['goods_img']); ?>" alt=""></td>
            <td>
                <?php if(is_array($v['goods_imgs']) || $v['goods_imgs'] instanceof \think\Collection || $v['goods_imgs'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['goods_imgs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>

                <img src="/upload/goods_imgs/<?php echo htmlentities($val); ?>" alt="">
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </td>
            <td>
                <?php if($v['is_new']==1): ?>√<?php else: ?>×<?php endif; ?>
            </td>
            <td><?php echo htmlentities($v['is_best']); ?></td>
            <td><?php echo htmlentities($v['is_hot']); ?></td>
            <td><?php echo htmlentities($v['is_up']); ?></td>
            <td><?php echo htmlentities($v['goods_describe']); ?></td>
            <td><?php echo htmlentities($v['cate_name']); ?></td>
            <td><?php echo htmlentities($v['brand_name']); ?></td>
            <td>
                <a href="">删除</a>
                <a href="<?php echo url('edit'); ?>?goods_id=<?php echo htmlentities($v['goods_id']); ?>">修改</a>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>

        <tr>
            <td colspan="14"> <?php echo $str; ?></td>
        </tr>

    </tbody>
</table>

<script>
    $(function(){
        //分页
        $(document).on("click",".page",function(){
            var _this=$(this);

            //获取条件
            var data=$("#myform").serialize();

            var p=_this.attr('p');//获取页码
            data=data+"&p="+p;//在原来条件上 拼接页码  并传给控制器

            $.post(
                "<?php echo url('getGoodsInfo'); ?>",
                data,
                function(res){
                    $("#show").html(res);
                }
            );
        })
    })
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