<?php /*a:5:{s:79:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\index\view\order\index.html";i:1561101516;s:74:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\index\view\layout.html";i:1560932880;s:81:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\index\view\public\header.html";i:1560306274;s:82:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\index\view\public\leftnav.html";i:1560484138;s:81:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\index\view\public\footer.html";i:1559616188;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php $controller = Request::controller(); $action =Request::action();?>
	<link type="text/css" rel="stylesheet" href="/static/index/css/style.css" />
    <!--[if IE 6]>
    <script src="/static/index/js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->    
    <script type="text/javascript" src="/static/index/js/jquery-1.8.2.min.js"></script>
    
    <?php if(( $controller == 'Index') and  ($action == 'index')): ?> 
    <script type="text/javascript" src="/static/index/js/jquery-1.11.1.min_044d0927.js"></script>
    <script type="text/javascript" src="/static/index/js/jquery.bxslider_e88acd1b.js"></script>
    <script type="text/javascript" src="/static/index/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/static/index/js/menu.js"></script>       
    <script type="text/javascript" src="/static/index/js/select.js"></script>  
    <script type="text/javascript" src="/static/index/js/lrscroll.js"></script>
    
    <script type="text/javascript" src="/static/index/js/iban.js"></script>
    <script type="text/javascript" src="/static/index/js/fban.js"></script>
    <script type="text/javascript" src="/static/index/js/f_ban.js"></script>
    <script type="text/javascript" src="/static/index/js/mban.js"></script>
    <script type="text/javascript" src="/static/index/js/bban.js"></script>
    <script type="text/javascript" src="/static/index/js/hban.js"></script>
    <script type="text/javascript" src="/static/index/js/tban.js"></script>
      <script type="text/javascript" src="/static/index/js/lrscroll_1.js"></script>
    <?php endif; if(( $controller == 'Lists') and  ($action == 'index')): ?> 
        <script type="text/javascript" src="/static/index/js/jquery-1.11.1.min_044d0927.js"></script>
    <script type="text/javascript" src="/static/index/js/jquery.bxslider_e88acd1b.js"></script>
    
    <script type="text/javascript" src="/static/index/js/menu.js"></script>       
    <script type="text/javascript" src="/static/index/js/select.js"></script>  
    <script type="text/javascript" src="/static/index/js/lrscroll.js"></script>
    <script type="text/javascript" src="/static/index/js/n_nav.js"></script>
    <?php endif; if(( $controller == 'Goods') and  ($action == 'index')): ?> 
  
      
    <script type="text/javascript" src="/static/index/js/menu.js"></script>    
            
	<script type="text/javascript" src="/static/index/js/lrscroll_1.js"></script>   
    
	<script type="text/javascript" src="/static/index/js/n_nav.js"></script>
    
    <link rel="stylesheet" type="text/css" href="/static/index/css/ShopShow.css" />
    <link rel="stylesheet" type="text/css" href="/static/index/css/MagicZoom.css" />
    <script type="text/javascript" src="/static/index/js/MagicZoom.js"></script>
    
    <script type="text/javascript" src="/static/index/js/num.js?a=<?php echo rand(10000,99999);?>">
    	var jq = jQuery.noConflict();
    </script>
        
    <script type="text/javascript" src="/static/index/js/p_tab.js"></script>
    
    <script type="text/javascript" src="/static/index/js/shade.js"></script>

     <?php endif; if(( $controller == 'Cart' ||$controller == 'Order' )): ?> 
    
    <script type="text/javascript" src="/static/index/js/menu.js"></script>             
    <script type="text/javascript" src="/static/index/js/n_nav.js"></script>   
    <script type="text/javascript" src="/static/index/js/num.js?a=<?php echo rand(10000,99999);?>">
    	var jq = jQuery.noConflict();
    </script>     
    <script type="text/javascript" src="/static/index/js/shade.js"></script>
    <?php endif; ?>
<title>尤洪</title>
</head>
<body>  
   
<!--Begin Header Begin-->
<div class="soubg">
	<div class="sou">
    	<!--Begin 所在收货地区 Begin-->
    	<span class="s_city_b">
        	<span class="fl">送货至：</span>
            <span class="s_city">
            	<span>四川</span>
                <div class="s_city_bg">
                	<div class="s_city_t"></div>
                    <div class="s_city_c">
                    	<h2>请选择所在的收货地区</h2>
                        <table border="0" class="c_tab" style="width:235px; margin-top:10px;" cellspacing="0" cellpadding="0">
                          <tr>
                            <th>A</th>
                            <td class="c_h"><span>安徽</span><span>澳门</span></td>
                          </tr>
                          <tr>
                            <th>B</th>
                            <td class="c_h"><span>北京</span></td>
                          </tr>
                          <tr>
                            <th>C</th>
                            <td class="c_h"><span>重庆</span></td>
                          </tr>
                          <tr>
                            <th>F</th>
                            <td class="c_h"><span>福建</span></td>
                          </tr>
                          <tr>
                            <th>G</th>
                            <td class="c_h"><span>广东</span><span>广西</span><span>贵州</span><span>甘肃</span></td>
                          </tr>
                          <tr>
                            <th>H</th>
                            <td class="c_h"><span>河北</span><span>河南</span><span>黑龙江</span><span>海南</span><span>湖北</span><span>湖南</span></td>
                          </tr>
                          <tr>
                            <th>J</th>
                            <td class="c_h"><span>江苏</span><span>吉林</span><span>江西</span></td>
                          </tr>
                          <tr>
                            <th>L</th>
                            <td class="c_h"><span>辽宁</span></td>
                          </tr>
                          <tr>
                            <th>N</th>
                            <td class="c_h"><span>内蒙古</span><span>宁夏</span></td>
                          </tr>
                          <tr>
                            <th>Q</th>
                            <td class="c_h"><span>青海</span></td>
                          </tr>
                          <tr>
                            <th>S</th>
                            <td class="c_h"><span>上海</span><span>山东</span><span>山西</span><span class="c_check">四川</span><span>陕西</span></td>
                          </tr>
                          <tr>
                            <th>T</th>
                            <td class="c_h"><span>台湾</span><span>天津</span></td>
                          </tr>
                          <tr>
                            <th>X</th>
                            <td class="c_h"><span>西藏</span><span>香港</span><span>新疆</span></td>
                          </tr>
                          <tr>
                            <th>Y</th>
                            <td class="c_h"><span>云南</span></td>
                          </tr>
                          <tr>
                            <th>Z</th>
                            <td class="c_h"><span>浙江</span></td>
                          </tr>
                        </table>
                    </div>
                </div>
            </span>
        </span>
        <!--End 所在收货地区 End-->
        <span class="fr">
        	<span class="fl">你好，
                    <?php if(session('userInfo')): ?>
                    <b>欢迎您<?php echo session('userInfo')['account'] ?></b>
                    <a href="<?php echo url('Login/logout'); ?>">退出</a>&nbsp; 
                    <?php else: ?>
                    请
                    <a href="<?php echo url('Login/login'); ?>">登录</a>&nbsp; 
                    <a href="<?php echo url('Login/register'); ?>" style="color:#ff4e00;">免费注册</a>
                    <?php endif; ?>
                    &nbsp;|&nbsp;<a href="#">我的订单</a>&nbsp;|</span>
        	<span class="ss">
            	<div class="ss_list">
                	<a href="#">收藏夹</a>
                    <div class="ss_list_bg">
                    	<div class="s_city_t"></div>
                        <div class="ss_list_c">
                        	<ul>
                            	<li><a href="#">我的收藏夹</a></li>
                                <li><a href="#">我的收藏夹</a></li>
                            </ul>
                        </div>
                    </div>     
                </div>
                <div class="ss_list">
                	<a href="#">客户服务</a>
                    <div class="ss_list_bg">
                    	<div class="s_city_t"></div>
                        <div class="ss_list_c">
                        	<ul>
                            	<li><a href="#">客户服务</a></li>
                                <li><a href="#">客户服务</a></li>
                                <li><a href="#">客户服务</a></li>
                            </ul>
                        </div>
                    </div>    
                </div>
                <div class="ss_list">
                	<a href="#">网站导航</a>
                    <div class="ss_list_bg">
                    	<div class="s_city_t"></div>
                        <div class="ss_list_c">
                        	<ul>
                            	<li><a href="#">网站导航</a></li>
                                <li><a href="#">网站导航</a></li>
                            </ul>
                        </div>
                    </div>    
                </div>
            </span>
            <span class="fl">|&nbsp;关注我们：</span>
            <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span>
            <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="/static/index/images/s_tel.png" align="absmiddle" /></a></span>
        </span>
    </div>
</div>
 
   <div class="top">
    <div class="logo"><a href="Index.html"><img src="/static/index/images/logo.png" /></a></div>
    <div class="search">
    	<form>
        	<input type="text" value="" class="s_ipt" />
            <input type="submit" value="搜索" class="s_btn" />
        </form>                      
        <span class="fl"><a href="#">咖啡</a><a href="#">iphone 6S</a><a href="#">新鲜美食</a><a href="#">蛋糕</a><a href="#">日用品</a><a href="#">连衣裙</a></span>
    </div>
    <div class="i_car">
    	<div class="car_t">购物车 [ <span>3</span> ]</div>
        <div class="car_bg">
       		<!--Begin 购物车未登录 Begin-->
        	<div class="un_login">还未登录！<a href="Login.html" style="color:#ff4e00;">马上登录</a> 查看购物车！</div>
            <!--End 购物车未登录 End-->
            <!--Begin 购物车已登录 Begin-->
            <ul class="cars">
            	<li>
                	<div class="img"><a href="#"><img src="/static/index/images/car1.jpg" width="58" height="58" /></a></div>
                    <div class="name"><a href="#">法颂浪漫梦境50ML 香水女士持久清新淡香 送2ML小样3只</a></div>
                    <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                </li>
                <li>
                	<div class="img"><a href="#"><img src="/static/index/images/car2.jpg" width="58" height="58" /></a></div>
                    <div class="name"><a href="#">香奈儿（Chanel）邂逅活力淡香水50ml</a></div>
                    <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                </li>
                <li>
                	<div class="img"><a href="#"><img src="/static/index/images/car2.jpg" width="58" height="58" /></a></div>
                    <div class="name"><a href="#">香奈儿（Chanel）邂逅活力淡香水50ml</a></div>
                    <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                </li>
            </ul>
            <div class="price_sum">共计&nbsp; <font color="#ff4e00">￥</font><span>1058</span></div>
            <div class="price_a"><a href="#">去购物车结算</a></div>
            <!--End 购物车已登录 End-->
        </div>
    </div>
</div>
<!--End Header End--> 
<!--Begin Menu Begin-->
    <div class="menu_bg">
	<div class="menu">
    	<!--Begin 商品分类详情 Begin--> 	
         <div class="nav">
        	<div class="nav_t">全部商品分类</div>
            <div class="leftNav<?php if(( $controller != 'Index')): ?> none<?php endif; ?>" <?php if(( $controller != 'Index')): ?> style="display:none"<?php endif; ?> >
                    <ul> 
                    <?php if(($category)): foreach($category as $key=>$val): ?>
                    <li>
                    	<div class="fj">
                        	<span class="n_img"><span></span><img src="/static/index/images/nav2.png" /></span>
                            <span class="fl"><a href="<?php echo url('Lists/index',['cid'=>$val['cate_id']]); ?>"><?php echo htmlentities($val['cate_name']); ?></a></span>
                        </div>
                        <div class="zj" style="top:-<?php echo $key*40; ?>px;">
                            <div class="zj_l">
                                <?php if((isset($val['son']))): foreach($val['son'] as $vv): ?>
                                <div class="zj_l_c">
                                    <h2><a href="<?php echo url('Lists/index',['cid'=>$vv['cate_id']]); ?>"><?php echo htmlentities($vv['cate_name']); ?></a></h2>
                                    <?php if((isset($vv['son']))): foreach($vv['son'] as $v): ?>
                                   
                                    <a href="<?php echo url('Lists/index',['cid'=>$v['cate_id']]); ?>"><?php echo htmlentities($v['cate_name']); ?></a>|
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <div class="zj_r">
                                <a href="#"><img src="/static/index/images/n_img1.jpg" width="236" height="200" /></a>
                                <a href="#"><img src="/static/index/images/n_img2.jpg" width="236" height="200" /></a>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div> 
<!--End 商品分类详情 End-->                                                     
    	<ul class="menu_r">  
            
            <li><a href="/">首页</a></li>
            <?php if(is_array($nav) || $nav instanceof \think\Collection || $nav instanceof \think\Paginator): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <li><a href="<?php echo url('Lists/index',['cid'=>$v['cate_id']]); ?>"><?php echo htmlentities($v['cate_name']); ?></a></li>
           <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <div class="m_ad">中秋送好礼！</div>
    </div>
</div>
<!--End Menu End-->
<div class="i_bg">  
    <div class="content mar_20">
    	<img src="/static/index/images/img2.jpg" />        
    </div>
    
    <!--Begin 第二步：确认订单信息 Begin -->
    <div class="content mar_20">
        <form id='confirmOrder' action="<?php echo url('Order/confirmOrder'); ?>" method="post">
            <input type='hidden' name='goods_id' value="<?php echo htmlentities($goods_id); ?>">
    	<div class="two_bg">
        	<div class="two_t">
            	<span class="fr"><a href="<?php echo url('Cart/lists'); ?>">修改</a></span>商品列表
            </div>
            <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="car_th" width="550">商品名称</td>
                <td class="car_th" width="150">购买数量</td>
                <td class="car_th" width="130">小计</td> 
              </tr>
              <?php if(is_array($goods) || $goods instanceof \think\Collection || $goods instanceof \think\Paginator): $k = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
              <tr <?php if($k%2==0): ?> class="car_tr" <?php endif; ?>>
                  
                <td>
                    <div class="c_s_img"><img src="/upload/goods_img/<?php echo htmlentities($v['goods_img']); ?>" width="73" height="73" /></div>
                    <?php echo htmlentities($v['goods_name']); ?>
                </td>
                <td align="center"><?php echo htmlentities($v['buy_number']); ?></td>
                <td align="center" style="color:#ff4e00;">￥<?php echo htmlentities($v['goods_price']); ?> * <?php echo htmlentities($v['buy_number']); ?></td>
              </tr>
              <?php endforeach; endif; else: echo "" ;endif; ?>
              <tr>
                <td colspan="5" align="right" style="font-family:'Microsoft YaHei';">
                    商品总价：￥<?php echo htmlentities($total); ?>
                </td>
              </tr>
            </table>
            
            <div class="two_t">
                <span class="fr"><a href="<?php echo url('Member/address',['goods_id'=>$goods_id]); ?>">修改</a></span>收货人信息
            </div>
            <table border="0" class="peo_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <?php if(is_array($addresslist) || $addresslist instanceof \think\Collection || $addresslist instanceof \think\Paginator): $i = 0; $__LIST__ = $addresslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>  
              <tr>
                  <td colspan="4"><input type="radio" name="address" value="<?php echo htmlentities($v['address_id']); ?>" <?php if($v['is_default']==1): ?> checked <?php endif; ?> /><?php echo htmlentities($v['province']); ?> <?php echo htmlentities($v['city']); ?> <?php echo htmlentities($v['district']); ?><?php echo htmlentities($v['address']); ?> <?php echo htmlentities($v['consignee']); ?>(收) <?php echo htmlentities($v['mobile']); ?></td>
              </tr>
              <?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            
            <div class="two_t">
            	配送方式
            </div>
            <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="car_th" width="80"></td>
                <td class="car_th" width="200">名称</td>
                <td class="car_th" width="370">订购描述</td>
                <td class="car_th" width="150">费用</td>
                <td class="car_th" width="135">免费额度</td>
                <td class="car_th" width="175">保价费用</td>
              </tr>
              <tr>
              	<td align="center"><input type="radio" name="shipping_id" checked="checked" value="1" /></td>
                <td align="center" style="font-size:14px;"><b>申通快递</b></td>
                <td>江、浙、沪地区首重为15元/KG，其他地区18元/KG，续重均为5-6元/KG， 云南地区为8元</td>
                <td align="center">￥15.00</td>
                <td align="center">￥0.00</td>
                <td align="center">不支持保价</td>
              </tr>
              <tr>
              	<td align="center"><input type="radio" name="shipping_id" value="2" /></td>
                <td align="center" style="font-size:14px;"><b>城际快递</b></td>
                <td>运费固定</td>
                <td align="center">￥15.00</td>
                <td align="center">￥0.00</td>
                <td align="center">不支持保价</td>
              </tr>
              <tr>
              	<td align="center"><input type="radio" name="shipping_id"  value="3" /></td>
                <td align="center" style="font-size:14px;"><b>邮局平邮</b></td>
                <td>运费固定</td>
                <td align="center">￥15.00</td>
                <td align="center">￥0.00</td>
                <td align="center">不支持保价</td>
              </tr>
              <tr>
              	<td colspan="6">
                	<span class="fr"><label class="r_rad"><input type="checkbox" name="baojia" /></label><label class="r_txt">配送是否需要保价</label></span>
                </td>
              </tr>
            </table> 
            
            <div class="two_t">
            	支付方式
            </div>
            <ul class="pay">
                <input id="pay_id" type="hidden" value="4" name="pay_id">
                <li value="1">余额支付<div class="ch_img"></div></li>
                <li value="2">银行亏款/转账<div class="ch_img"></div></li>
                <li value="3">货到付款<div class="ch_img"></div></li>
                <li value="4" class="checked">支付宝<div class="ch_img"></div></li>
            </ul>
 
            <div class="two_t">
            	其他信息
            </div>
            <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
<!--              <tr>
                <td width="145" align="right" style="padding-right:0;"><b style="font-size:14px;">使用红包：</b></td>
                <td>
                	<span class="fl" style="margin-left:50px; margin-right:10px;">选择已有红包</span>
                    <select class="jj" name="city">
                      <option value="0" selected="selected">请选择</option>
                      <option value="1">50元</option>
                      <option value="2">30元</option>
                      <option value="3">20元</option>
                      <option value="4">10元</option>
                    </select>
                    <span class="fl" style="margin-left:50px; margin-right:10px;">或者输入红包序列号</span>
                    <span class="fl"><input type="text" value="" class="c_ipt" style="width:220px;" />
                    <span class="fr" style="margin-left:10px;"><input type="submit" value="验证红包" class="btn_tj" /></span>
                </td>
			  </tr>-->
              <tr valign="top">
                <td align="right" style="padding-right:0;"><b style="font-size:14px;">订单附言：</b></td>
                <td style="padding-left:0;"><textarea name="postscript" class="add_txt" style="width:860px; height:50px;"></textarea></td>
              </tr>
<!--              <tr>
              	<td align="right" style="padding-right:0;"><b style="font-size:14px;">缺货处理：</b></td>
                <td>
                	<label class="r_rad"><input type="checkbox" name="none" checked="checked" /></label><label class="r_txt" style="margin-right:50px;">等待所有商品备齐后再发</label>
                    <label class="r_rad"><input type="checkbox" name="none" /></label><label class="r_txt" style="margin-right:50px;">取下订单</label>
                    <label class="r_rad"><input type="checkbox" name="none" /></label><label class="r_txt" style="margin-right:50px;">与店主协商</label>
                </td>
              </tr>-->
            </table>
            
            <table border="0" style="width:900px; margin-top:20px;" cellspacing="0" cellpadding="0">
<!--              <tr>
                <td align="right">
                	该订单完成后，您将获得 <font color="#ff4e00">1815</font> 积分 ，以及价值 <font color="#ff4e00">￥0.00</font> 的红包 <br />
                    商品总价: <font color="#ff4e00">￥1815.00</font>  + 配送费用: <font color="#ff4e00">￥15.00</font>
                </td>
              </tr>-->
              <tr height="70">
                <td align="right">
                	<b style="font-size:14px;">应付款金额：<span style="font-size:22px; color:#ff4e00;">￥<?php echo htmlentities($total); ?></span></b>
                </td>
              </tr>
              <tr height="70">
                <td align="right"><a href="javascript:void(0)" class='confirmorder'><img src="/static/index/images/btn_sure.gif" /></a></td>
              </tr>
            </table>
        </div>
            </form>
    </div>
	<!--End 第二步：确认订单信息 End-->
        
        <script>
            jQuery('.pay li').click(function(){
                jQuery(this).addClass('checked').siblings().removeClass('checked');
                jQuery('#pay_id').val(jQuery(this).val());
            });
            
            jQuery('.confirmorder').click(function(){
                jQuery('#confirmOrder').submit();
            });
        </script>
   
       <!--Begin Footer Begin -->
    <div class="b_btm_bg b_btm_c">
        <div class="b_btm">
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/static/index/images/b1.png" width="62" height="62" /></td>
                <td><h2>正品保障</h2>正品行货  放心购买</td>
              </tr>
            </table>
			<table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/static/index/images/b2.png" width="62" height="62" /></td>
                <td><h2>满38包邮</h2>满38包邮 免运费</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/static/index/images/b3.png" width="62" height="62" /></td>
                <td><h2>天天低价</h2>天天低价 畅选无忧</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="/static/index/images/b4.png" width="62" height="62" /></td>
                <td><h2>准时送达</h2>收货时间由你做主</td>
              </tr>
            </table>
        </div>
    </div>
    <div class="b_nav">
    	<dl>                                                                                            
        	<dt><a href="#">新手上路</a></dt>
            <dd><a href="#">售后流程</a></dd>
            <dd><a href="#">购物流程</a></dd>
            <dd><a href="#">订购方式</a></dd>
            <dd><a href="#">隐私声明</a></dd>
            <dd><a href="#">推荐分享说明</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">配送与支付</a></dt>
            <dd><a href="#">货到付款区域</a></dd>
            <dd><a href="#">配送支付查询</a></dd>
            <dd><a href="#">支付方式说明</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">会员中心</a></dt>
            <dd><a href="#">资金管理</a></dd>
            <dd><a href="#">我的收藏</a></dd>
            <dd><a href="#">我的订单</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">服务保证</a></dt>
            <dd><a href="#">退换货原则</a></dd>
            <dd><a href="#">售后服务保证</a></dd>
            <dd><a href="#">产品质量保证</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">联系我们</a></dt>
            <dd><a href="#">网站故障报告</a></dd>
            <dd><a href="#">购物咨询</a></dd>
            <dd><a href="#">投诉与建议</a></dd>
        </dl>
        <div class="b_tel_bg">
        	<a href="#" class="b_sh1">新浪微博</a>            
        	<a href="#" class="b_sh2">腾讯微博</a>
            <p>
            服务热线：<br />
            <span>400-123-4567</span>
            </p>
        </div>
        <div class="b_er">
            <div class="b_er_c"><img src="/static/index/images/er.gif" width="118" height="118" /></div>
            <img src="/static/index/images/ss.png" />
        </div>
    </div>    
    <div class="btmbg">
		<div class="btm">
        	备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
            <img src="/static/index/images/b_1.gif" width="98" height="33" /><img src="/static/index/images/b_2.gif" width="98" height="33" /><img src="/static/index/images/b_3.gif" width="98" height="33" /><img src="/static/index/images/b_4.gif" width="98" height="33" /><img src="/static/index/images/b_5.gif" width="98" height="33" /><img src="/static/index/images/b_6.gif" width="98" height="33" />
        </div>    	
    </div>
    <!--End Footer End -->    
 
   
   </div>

</body>


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>
    

