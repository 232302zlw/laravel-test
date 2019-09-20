<?php /*a:1:{s:87:"E:\phpStudy\PHPTutorial\WWW\month4\1901b\myshop\application\admin\view\brand\table.html";i:1557977357;}*/ ?>
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
