<?php /*a:4:{s:79:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\index\view\login\login.html";i:1560909612;s:74:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\index\view\layout.html";i:1560932880;s:81:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\index\view\public\header.html";i:1560306274;s:81:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\index\view\public\footer.html";i:1559616188;}*/ ?>
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
 
   <!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>登录</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />
		<link rel="stylesheet" href="/static/index/login/amazeui.css" />
		<link href="/static/index/login/dlstyle.css" rel="stylesheet" type="text/css">
		<script src="/static/jquery.js"></script>

	</head>

	<body>
            <input type="hidden" id="refer" value="<?php echo htmlentities($refer); ?>">
		<div class="login-boxtitle">
			<a href="home.html"><img alt="logo" src="/static/index/login/logobig.png" /></a>
		</div>

		<div class="login-banner">
			<div class="login-main">
				<div class="login-banner-bg"><span></span><img src="/static/index/login/big.jpg" /></div>
				<div class="login-box">

							<h3 class="title">登录商城</h3>

							<div class="clear"></div>

							<div class="login-form">
								<form id="myform">
									<div class="user-name">
										<label for="account"><i class="am-icon-user"></i></label>
										<input type="text" id="account" value="<?php echo htmlentities(app('cookie')->get('rememberInfo')['account']); ?>" placeholder="手机号/邮箱">
									</div>
									<div class="user-pass">
										<label for="user_pwd"><i class="am-icon-lock"></i></label>
										<input type="password" id="user_pwd" value="<?php echo htmlentities(app('cookie')->get('rememberInfo')['user_pwd']); ?>" placeholder="请输入密码">
									</div>
								</form>
							</div>
            
							<div class="login-links">
								<label for="remember">
									<input id="remember" type="checkbox" >账号密码记录10天
								</label>
								<a href="#" class="am-fr">忘记密码</a>
								<a href="<?php echo url('Login/register'); ?>" class="zcnext am-fr am-btn-default">注册</a>
								<br />
							</div>
							<div class="am-cf">
								<input type="button" name="" value="登 录" id="btn" class="am-btn am-btn-primary am-btn-sm">
							</div>
						</div>
					</div>
				</div>
				<div class="footer ">
						<div class="footer-hd ">
							<p>
								<a href="# ">恒望科技</a>
								<b>|</b>
								<a href="# ">商城首页</a>
								<b>|</b>
								<a href="# ">支付宝</a>
								<b>|</b>
								<a href="# ">物流</a>
							</p>
						</div>
						<div class="footer-bd ">
							<p>
								<a href="# ">关于恒望</a>
								<a href="# ">合作伙伴</a>
								<a href="# ">联系我们</a>
								<a href="# ">网站地图</a>
								<em>© 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="#" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em>
							</p>
						</div>
					</div>
	</body>

</html>
<script>
    
    $('#btn').click(function(){
        var name = $('#account').val();
        var pwd = $('#user_pwd').val();
        var refer = $('#refer').val();
        //alert(name);alert(pwd);
        
        $.post('<?php echo url("Login/doLogin"); ?>',{name:name,pwd:pwd},function(msg){
            if(msg.code=='00000'){
                alert(msg.msg);
                if( refer ){
                    location.href=refer;
                }else{
                    location.href="<?php echo url('index/index'); ?>";
                }
            }else{
                alert(msg.msg);
            }
            
        },'json');
        
        
    });
    
    
    
$(function(){
//    //点击登录按钮
//	$("#btn").click(function(){
//	    //获取账号 密码 记住
//		var account=$("#account").val()
//		var user_pwd=$("#user_pwd").val()
//		var remember=$("#remember").prop('checked');
//
//		$.post(
//		    "<?php echo url('loginDo'); ?>",
//			{account:account,user_pwd:user_pwd,remember:remember},
//			function(res){
//		       	alert(res.msg);
//		       	if(res.code==1){
//		       	    location.href="<?php echo url('Index/index'); ?>"
//				}
//			},
//			'json'
//		);
//
//	});
})
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
    

