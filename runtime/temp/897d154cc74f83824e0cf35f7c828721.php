<?php /*a:1:{s:80:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\index\view\exam\carlist.html";i:1560756474;}*/ ?>
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
        <div>购物车列表</div>
        <?php if(is_array($car) || $car instanceof \think\Collection || $car instanceof \think\Paginator): $i = 0; $__LIST__ = $car;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <p>ID:<?php echo htmlentities($v['goods_id']); ?>  name:<?php echo htmlentities($v['goods_name']); ?>   图:<img src="/upload/goods_img/<?php echo htmlentities($v['goods_img']); ?>" width="100">    价格：<?php echo htmlentities($v['goods_price']); ?>  数量：<?php echo htmlentities($v['buy_number']); ?> </p>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </body>
</html>
