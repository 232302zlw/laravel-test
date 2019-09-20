<?php /*a:1:{s:78:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\index\view\exam\index.html";i:1560755982;}*/ ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>商品列表</div><hr/>
        <?php if(is_array($goods) || $goods instanceof \think\Collection || $goods instanceof \think\Paginator): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <p>ID:<?php echo htmlentities($v['goods_id']); ?>  name:<?php echo htmlentities($v['goods_name']); ?>   图:<img src="/upload/goods_img/<?php echo htmlentities($v['goods_img']); ?>" width="100">    价格：<?php echo htmlentities($v['goods_price']); ?>  <button goods_id="<?php echo htmlentities($v['goods_id']); ?>">购买</button></p>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </body>
    <script type="text/javascript" src="/static/index/js/jquery-1.8.2.min.js"></script>
    <script>
        $('button').click(function(){
            var goods_id = $(this).attr('goods_id');
            
            $.post("<?php echo url('Exam/addCar'); ?>",{goods_id:goods_id},function(data){
                if(data.code=='00001'){
                    alert(data.msg);
                }
                if(data.code=='00002'){
                    location.href="<?php echo url('Login/login'); ?>";
                }
                if(data.code=='00000'){
                    if(confirm('添加成功！是否跳转到购物车列表')){
                        location.href="<?php echo url('Exam/carlist'); ?>";
                    }
                }
                
            },'json');
            
            
        });
        </script>
</html>
