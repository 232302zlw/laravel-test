<?php /*a:4:{s:82:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\admin\view\category\index.html";i:1558668420;s:74:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\admin\view\layout.html";i:1557798598;s:81:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\admin\view\public\header.html";i:1558054746;s:79:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\admin\view\public\left.html";i:1558323280;}*/ ?>
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
      <div style="padding: 15px;"><div style="width: 700px;">
<table class="layui-table">
    <thead>
        <tr>
            <th>分类id</th>
            <th>分类名称</th>
            <th>是否展示</th>
            <th>是否在导航栏展示</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody id="show">
        <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <tr cate_id="<?php echo htmlentities($v['cate_id']); ?>" pid="<?php echo htmlentities($v['pid']); ?>" style="display: none">
            <td>
                <?php echo str_repeat('&nbsp;&nbsp;',$v['level']*2); ?>
                <a href="javascript:;" class="show">+</a>
                <?php echo htmlentities($v['cate_id']); ?>
            </td>
            <td field="cate_name">
                <?php echo str_repeat('&nbsp;&nbsp;',$v['level']*2); ?>
                <span class="cate_name"><?php echo htmlentities($v['cate_name']); ?></span>
                <input type="text" value="<?php echo htmlentities($v['cate_name']); ?>" style="display: none;" class="change_value">
            </td>
            <td field="is_show" class="changeStatus"><?php if($v['is_show']==1): ?>√<?php else: ?>×<?php endif; ?></td>
            <td field="is_nav_show" class="changeStatus"><?php if($v['is_nav_show']==1): ?>√<?php else: ?>×<?php endif; ?></td>
            <td>
                <a href="<?php echo url('delete'); ?>?cate_id=<?php echo htmlentities($v['cate_id']); ?>">删除</a>
                <a href="<?php echo url('edit'); ?>?cate_id=<?php echo htmlentities($v['cate_id']); ?>">修改</a>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>
</div>
<script>
    $(function(){
        //页面一加载 只展示pid=0
        $("tr[pid=0]").show();

        //点击事件
        $(document).on("click",".cate_name",function(){
            //给span 隐藏 span下一个兄弟节点显示
            $(this).hide();
            $(this).next("input").show();
        })

        //失去焦点事件
        $(document).on("blur",".change_value",function(){
            var _this=$(this);
            //改数据库的值 获取要修改的字段 要修改的新值 要修改的id
            var field=$(this).parent("td").attr("field");
            var cate_id=$(this).parents("tr").attr("cate_id");
            var value=$(this).val();

            $.post(
                "<?php echo url('changeValue'); ?>",
                {field:field,cate_id:cate_id,value:value},
                function(res){
                    if(res.code==2){
                        alert(res.msg);
                    }else{
                        //给文本框隐藏 给input上一个兄弟节点显示
                        _this.hide();
                        _this.prev("span").text(value).show();
                    }
                },
                'json'
            );
        })

        $(document).on("click",".changeStatus",function(){
            var _this=$(this);
            var field=_this.attr('field');
            var cate_id=_this.parent("tr").attr('cate_id');
            var value=_this.text();

            if(value=='√'){
                value=2;
            }else{
                value=1;
            }
            $.post(
                "<?php echo url('changeValue'); ?>",
                {field:field,cate_id:cate_id,value:value},
                function(res){
                    if(res.code==2){
                        alert(res.msg);
                    }else{
                        if(value==1){
                            _this.text('√')
                        }else{
                            _this.text('×')
                        }
                    }
                },
                'json'
            );
        })

        //点击+ -
        $(document).on("click",".show",function(){
            var sign=$(this).text();//获取自己当前点击的符号
            var cate_id=$(this).parents("tr").attr('cate_id');
            if(sign=='+'){
                //判断是否有子类
                if($("tr[pid='"+cate_id+"']").length>0){
                    $("tr[pid='"+cate_id+"']").show();
                    $(this).text('-');
                }
            }else{
                $("tr[pid='"+cate_id+"']").hide();
                $(this).text('+');
            }
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