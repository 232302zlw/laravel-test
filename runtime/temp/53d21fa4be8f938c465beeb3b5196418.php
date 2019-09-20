<?php /*a:1:{s:88:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\index\view\lists\getSearchGoods.html";i:1559790288;}*/ ?>
                <ul class="cate_list">
                    <?php if(is_array($goods) || $goods instanceof \think\Collection || $goods instanceof \think\Paginator): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <li>
                    	<div class="img"><a href="<?php echo url('Goods/index',['id'=>$v['goods_id']]); ?>"><img src="/upload/goods_img/<?php echo htmlentities($v['goods_img']); ?>" width="210" height="185" /></a></div>
                        <div class="price">
                            <font>￥<span><?php echo htmlentities($v['goods_price']); ?></span></font> 
                        </div>
                        <div class="name"><a href="<?php echo url('Goods/index',['id'=>$v['goods_id']]); ?>"><?php echo htmlentities($v['goods_name']); ?></a></div>
                        <div class="carbg">
                        	<a href="#" class="ss">收藏</a>
                            <a href="#" class="j_car">加入购物车</a>
                        </div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <div class="pages">
                <?php echo $goods; ?>
                </div>