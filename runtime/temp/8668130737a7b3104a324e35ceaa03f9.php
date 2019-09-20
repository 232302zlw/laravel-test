<?php /*a:1:{s:87:"E:\phpStudy\PHPTutorial\WWW\month4\1901b\myshop\application\admin\view\goods\goods.html";i:1558582108;}*/ ?>
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
    <td><a href="">删除</a></td>
</tr>
<?php endforeach; endif; else: echo "" ;endif; ?>

<tr>
    <td colspan="14"> <?php echo $str; ?></td>
</tr>