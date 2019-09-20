<?php /*a:4:{s:79:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\admin\view\admin\index.html";i:1557712196;s:74:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\admin\view\layout.html";i:1557798598;s:81:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\admin\view\public\header.html";i:1558054746;s:79:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\admin\view\public\left.html";i:1561706674;}*/ ?>
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
      <div style="padding: 15px;"><form action="">
<link rel="stylesheet" href="/static/page.css">
<table class="layui-table">

  <colgroup>
    <col width="150">
    <col width="200">
    <col>
  </colgroup>
  <caption>
    <h1>

      <a href="<?php echo url('create'); ?>" class="layui-btn"><i class="layui-icon"></i>添加</a>
    </h1>
    <h2>
      <input type="text" name="admin_name" value="<?php echo htmlentities($admin_name); ?>" id="">
      <button class="layui-btn layui-btn-warm layui-icon layui-icon-search">搜索</button>
    </h2>
  </caption>
  <thead>
    <tr>
      <th>编号</th>
      <th>用户名</th>
      <th>邮箱</th>
      <th>电话</th>
      <th>最后登录的时间</th>
      <th>最后登录的地址</th>
      <th>操作</th>
    </tr> 
  </thead>
  <tbody>
  <?php if(is_array($admins) || $admins instanceof \think\Collection || $admins instanceof \think\Paginator): $i = 0; $__LIST__ = $admins;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$admin): $mod = ($i % 2 );++$i;?>
    <tr>
      <td><?php echo htmlentities($admin['admin_id']); ?></td>
      <td><?php echo htmlentities($admin['admin_name']); ?></td>
      <td><?php echo htmlentities($admin['admin_email']); ?></td>
      <td><?php echo htmlentities($admin['admin_tel']); ?></td>
      <td><?php echo htmlentities($admin['last_login_time']); ?></td>
      <td><?php echo htmlentities($admin['last_login_ip']); ?></td>
      <td> 
        <a class="layui-btn" href="<?php echo url('edit',['admin_id'=>$admin['admin_id']]); ?>"><i class="layui-icon layui-icon-edit"></i>修改</a>
        |
       <a delid="<?php echo htmlentities($admin['admin_id']); ?>" class="layui-btn layui-btn-danger delete" href="<?php echo url('delete',['admin_id'=>$admin['admin_id']]); ?>"><i class="layui-icon layui-icon-delete"></i>删除</a>
      </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    <tr>
      <td colspan="7" align="center"><?php echo $admins; ?></td>
    </tr>
  </tbody>
</table>
</form>
<!-- <script>
  // alert($);
  // 待页面加载完毕再执行该代码
  $(function(){
    // ajax删除
    $('.delete').click(function(){
      console.log($(this));// 直到我点击的是哪一个删除的连接
      // alert($(this).attr('delid')); // 添加自定义属性,查找自定义属性值
      // alert($(this).parents('tr').children().first().text());// 根据节点关系查找id值
      // 获得要删除的主键id
      var admin_id=$(this).attr('delid');
     
      var data={admin_id:admin_id};
      // console.log(data);
      var tr=$(this).parents('tr'); 
      // ajax
      confirm('你确定要删除吗?');
      $.get("<?php echo url('delete'); ?>",data,function(datas){
        // alert(datas);
        if(datas==1)
        {
          tr.remove();
          alert('删除成功');
        }else{
          alert('删除失败');
        }
      }); 


      return false;
    });
  });
</script> -->
<!-- <script>
  $(function(){
    $('.delete').click(function(){
      console.log($(this));
      var admin_id=$(this).attr('delid');
      var data={admin_id:admin_id};
      var tr=$(this).parents('tr');
      $.get("<?php echo url('delete'); ?>",data,function(datas){
        if(datas==1)
        {
          tr.remove();
          alert("删除成功");
        }else{
          alert("删除失败");
        }
      });
      return false;
    });
  });
</script> -->
<script>
  $(function(){
    $('.delete').click(function(){
      var res=confirm('是否确认删除');
      if(res==false)
      {
        return false;
      }
      console.log($(this));
      var admin_id=$(this).attr('delid');
      var data={admin_id:admin_id};
      var tr=$(this).parents('tr');
      $.get("<?php echo url('delete'); ?>",data,function(datas){
        if(datas==1)
        {
          tr.remove();
          alert("删除成功");
        }else{
          alert("删除失败");
        }
      });
      return false;
    });
  });
</script>
<!-- <script>
  $(function(){
    $('.delete').click(function(){
      console.log($(this));
      var admin_id=$(this).attr('delid');
      var data={admin_id:admin_id};
      var tr=$(this).parents('tr');
      $.get("<?php echo url('delete'); ?>",data,function(datas){
          if(datas==1)
          {
            tr.remove();
            alert("删除成功");
          }else{
            alert("删除失败");
          }
      });
      return false;
    });
  });

  $('button').eq(0).click(function(){
    var admin_name=$('input').eq(0).val();
    var admin_pwd=$("input").eq(1).val();
    var admin_email=$('input').eq(2).val();
    var admin_tel=$('input').eq(3).val();
    $.post(
      "<?php echo url('save'); ?>",
      {admin_name:admin_name,admin_pwd:admin_pwd,admin_email:admin_email,admin_tel,admin_tel},
      function(res){
        if(res==1)
        {
          alert("添加成功");
        }else{
          alert("添加失败");
        };
      },
      
    );
    return false;
  });
</script> --></div>
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