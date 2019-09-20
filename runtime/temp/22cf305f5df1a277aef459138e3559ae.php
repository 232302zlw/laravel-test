<?php /*a:1:{s:83:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\index\view\index\ajaxfloor.html";i:1559699946;}*/ ?>
    <div class="i_t mar_10">
    	<span class="floor_num"><?php echo htmlentities($floor_num); ?>F</span>
    	<span class="fl"><b><?php echo htmlentities($first_cate['cate_name']); ?></b></span>                
        <span class="i_mores fr">
            <?php if(is_array($second_cate) || $second_cate instanceof \think\Collection || $second_cate instanceof \think\Paginator): $i = 0; $__LIST__ = $second_cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <a href="#"><?php echo htmlentities($v['cate_name']); ?></a>&nbsp; &nbsp; &nbsp; 
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </span>
    </div>
    <div class="content">
        <div class="fresh_mid">
        	<ul>
                 <?php if(is_array($goods) || $goods instanceof \think\Collection || $goods instanceof \think\Paginator): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>   
            	<li>
                	<div class="name"><a href="<?php echo url('Goods/index',['id'=>$v['goods_id']]); ?>"><?php echo htmlentities($v['goods_name']); ?></a></div>
                    <div class="price">
                    	<font>￥<span><?php echo htmlentities($v['goods_price']); ?></span></font> &nbsp; 
                    </div>
                    <div class="img"><a href="<?php echo url('Goods/index',['id'=>$v['goods_id']]); ?>"><img src="/upload/goods_img//<?php echo htmlentities($v['goods_img']); ?>" width="185" height="155" /></a></div>
                </li>
                 <?php endforeach; endif; else: echo "" ;endif; ?>                                                                   
            </ul>
        </div>
    </div>    
    <!--End 进口 生鲜 End-->
    <!-- Begin 广告 Begin -->
    <div class="content mar_20">
        <img width="1200" height="110" src="/static/index/images/mban_1.jpg">
    </div> 
    <p align='center' class='more' previd="<?php echo htmlentities($first_cate['cate_id']); ?>" floor_num="<?php echo htmlentities($floor_num); ?>">加载更多。。。</p>