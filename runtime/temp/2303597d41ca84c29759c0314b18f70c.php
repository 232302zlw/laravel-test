<?php /*a:4:{s:80:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\admin\view\goods\create.html";i:1559185082;s:74:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\admin\view\layout.html";i:1557798598;s:81:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\admin\view\public\header.html";i:1558054746;s:79:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\admin\view\public\left.html";i:1561706674;}*/ ?>
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
      <div style="padding: 15px;"><div style="width: 600px;">
    <script src="/static/admin/ueditor/ueditor.all.min.js"></script>
    <script src="/static/admin/ueditor/ueditor.config.js"></script>
    <script src="/static/admin/ueditor/ueditor.parse.js"></script>
    <script src="/static/admin/ueditor/lang/zh-cn/zh-cn.js"></script>

    <form id="myform" enctype='multipart/form-data'>
        <div class="layui-form-item">
            <label class="layui-form-label">商品名称</label>
            <div class="layui-input-block">
                <input type="text" name="goods_name"  autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">价格</label>
            <div class="layui-input-block">
                <input type="text" name="goods_price"  autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">库存</label>
            <div class="layui-input-block">
                <input type="text" name="goods_number"  autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">图片</label>
            <div class="layui-input-block">
                <input type="file" name="img" >
                <input type="hidden" name="goods_img" id="goods_img">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">相册</label>
            <div class="layui-input-block">
                <input type="file" name="imgs[]" multiple="multiple">
                <input type="hidden" name="goods_imgs" id="goods_imgs">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">新品</label>
            <div class="layui-input-block">
                <input type="radio" name="is_new" value="1" checked>是
                <input type="radio" name="is_new" value="2"  >否
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">精品</label>
            <div class="layui-input-block">
                <input type="radio" name="is_best" value="1" checked>是
                <input type="radio" name="is_best" value="2" >否
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">热卖</label>
            <div class="layui-input-block">
                <input type="radio" name="is_hot" value="1"  checked>是
                <input type="radio" name="is_hot" value="2" >否
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">是否上架</label>
            <div class="layui-input-block">
                <input type="radio" name="is_up" value="1"  checked>是
                <input type="radio" name="is_up" value="2"  >否
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">描述</label>
            <div class="layui-input-block">
                <textarea  name="goods_describe" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">分类</label>
            <div class="layui-input-block">
                <select name="cate_id">
                    <?php if(is_array($cateInfo) || $cateInfo instanceof \think\Collection || $cateInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $cateInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo htmlentities($v['cate_id']); ?>"><?php echo str_repeat('&nbsp;&nbsp;',$v['level']*2); ?><?php echo htmlentities($v['cate_name']); ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">品牌</label>
            <div class="layui-input-block">
                <select name="brand_id" >
                    <?php if(is_array($brandInfo) || $brandInfo instanceof \think\Collection || $brandInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $brandInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo htmlentities($v['brand_id']); ?>"><?php echo htmlentities($v['brand_name']); ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>



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
            //var ue = UE.getEditor('editor');//加载富文本编辑器
            //表单提交
            $("#myform").submit(function(){
                //文件上传
                var formData=new FormData($("#myform")[0]);
               $.ajax({
                   url:"<?php echo url('upload'); ?>",
                   data:formData,
                   type:'post',
                   cache:false,
                   processData: false,
                   contentType: false,
                   dataType:'json',
                   async:false,
                   success:function(res){
                       if(res.code==2){
                           alert(res.msg);
                       }else{
                           $("#goods_img").val(res.path.goods_img);//把单图回来的路径 赋值到隐藏域中
                           $("#goods_imgs").val(res.path.goods_imgs);//把多图回来的路径 赋值到隐藏域中
                       }
                   }
               });

               //把数据入库--获取表单信息
                var data=$("#myform").serialize();
                $.post(
                    "<?php echo url('add'); ?>",
                    data,
                    function(res){
                        alert(res.msg);
                        if(res.code==1){
                            location.href="<?php echo url('index'); ?>"
                        }
                    },'json'
                );
                return false;
            })
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