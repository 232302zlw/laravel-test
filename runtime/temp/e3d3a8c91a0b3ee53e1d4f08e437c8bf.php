<?php /*a:4:{s:82:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\index\view\login\register.html";i:1559090534;s:74:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\index\view\layout.html";i:1560413080;s:81:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\index\view\public\header.html";i:1560306274;s:81:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\index\view\public\footer.html";i:1559616188;}*/ ?>
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
    <script type="text/javascript" src="/static/index/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/static/index/js/menu.js"></script>       
    <script type="text/javascript" src="/static/index/js/select.js"></script>  
    <script type="text/javascript" src="/static/index/js/lrscroll.js"></script>
    <script type="text/javascript" src="/static/index/js/n_nav.js"></script>
    <?php endif; if(( $controller == 'Goods') and  ($action == 'index')): ?> 
  
        <script type="text/javascript" src="/static/index/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/static/index/js/menu.js"></script>    
            
	<script type="text/javascript" src="/static/index/js/lrscroll_1.js"></script>   
    
	<script type="text/javascript" src="/static/index/js/n_nav.js"></script>
    
    <link rel="stylesheet" type="text/css" href="/static/index/css/ShopShow.css" />
    <link rel="stylesheet" type="text/css" href="/static/index/css/MagicZoom.css" />
    <script type="text/javascript" src="/static/index/js/MagicZoom.js"></script>
    
    <script type="text/javascript" src="/static/index/js/num.js">
    	var jq = jQuery.noConflict();
    </script>
        
    <script type="text/javascript" src="/static/index/js/p_tab.js"></script>
    
    <script type="text/javascript" src="/static/index/js/shade.js"></script>

     <?php endif; if(( $controller == 'Cart') and  ($action == 'lists')): ?> 
    <script type="text/javascript" src="/static/index/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/static/index/js/menu.js"></script>             
    <script type="text/javascript" src="/static/index/js/n_nav.js"></script>   
    <script type="text/javascript" src="/static/index/js/num.js">
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
		<title>注册</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="/static/index/login/amazeui.css" />
		<link href="/static/index/login/dlstyle.css" rel="stylesheet" type="text/css">
		<link href="/static/layui/css/layui.css" rel="stylesheet" type="text/css">

		<script src="/static/layui/layui.js"></script>
		<script src="/static/index/login/jquery-3.2.1.min.js"></script>
		<script src="/static/index/login/amazeui.min.js"></script>

	</head>

	<body>

		<div class="login-boxtitle">
			<a href="home/demo.html"><img alt="" src="/static/index/login/logobig.png" /></a>
		</div>

		<div class="res-banner">
			<div class="res-main">
				<div class="login-banner-bg"><span></span><img src="/static/index/login/big.jpg" /></div>
				<div class="login-box">

						<div class="am-tabs" id="doc-my-tabs">
							<ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
								<li class="am-active"><a href="">邮箱注册</a></li>
								<li><a href="">手机号注册</a></li>
							</ul>

							<div class="am-tabs-bd">
								<!--邮箱注册-->
								<div class="am-tab-panel am-active">
									<form method="post" class="layui-form" id="emailRegister">
										<div class="user-email">
											<label for="user_email"><i class="am-icon-envelope-o"></i></label>
											<input type="text" name="user_email"  id="user_email" placeholder="请输入邮箱账号">
										</div>
										<div class="verification">
											<label for="email_code"><i class="am-icon-code-fork"></i></label>
											<input type="text" name="user_code" id="email_code"   placeholder="请输入验证码">
											<a class="btn" href="javascript:void(0);"  id="sendEmailCode">
												<span class="dyButton" id="span_email" >获取</span>
											</a>
										</div>
										<div class="user-pass">
											<label for="email_pwd"><i class="am-icon-lock"></i></label>
											<input type="password" name="user_pwd" id="email_pwd"  placeholder="设置密码">
										</div>
										<div class="user-pass">
											<label for="email_pwd1"><i class="am-icon-lock"></i></label>
											<input type="password" name="user_pwd1" id="email_pwd1" lay-verify="checkpwd2"  placeholder="确认密码">
										</div>
										<div class="am-cf">
											<input type="submit" lay-submit  value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
										</div>
									</form>
								</div>


								<!--手机号注册-->
								<div class="am-tab-panel">
									<form method="post" class="layui-form">
										<div class="user-phone">
											<label for="tel"><i class="am-icon-mobile-phone am-icon-md"></i></label>
											<input type="tel" name="user_tel" lay-verify="required|phone"  id="tel" placeholder="请输入手机号">
										</div>
										<div class="verification">
											<label for="tel_code"><i class="am-icon-code-fork"></i></label>
											<input type="tel" name="user_code" lay-verify="required" id="tel_code" placeholder="请输入验证码">
											<a class="btn" href="javascript:void(0);" id="sendTelCode">
												<span class="dyButton" id="span_tel">获取</span>
											</a>
										</div>
										<div class="user-pass">
											<label for="tel_pwd"><i class="am-icon-lock"></i></label>
											<input type="password" name="user_pwd" lay-verify="checkpwd1" id="tel_pwd" placeholder="设置密码">
										</div>
										<div class="user-pass">
											<label for="tel_pwd1"><i class="am-icon-lock"></i></label>
											<input type="password" name="user_pwd1" lay-verify="checkpwd2" id="tel_pwd1" placeholder="确认密码">
										</div>
										<div class="am-cf">
											<input type="button" lay-submit lay-filter="telDemo" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
										</div>
									</form>

								</div>
								<script>
									$(function() {
									    $('#doc-my-tabs').tabs();
									  })
								</script>
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
						<em>© 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em>
					</p>
				</div>
			</div>
	</body>

</html>
<script>
	$(function(){
	    layui.use(['layer'],function(){
	        var layer=layui.layer;

            //点击获取
            $("#sendEmailCode").click(function(){
                //1、获取文本框(邮箱)的值
                var user_email=$("#user_email").val();

                //2、验证邮箱 是否为空  是否格式正确
                var reg=/^\w+@\w+\.com$/;
                if(user_email==''){
                    alert('邮箱必填');
                    return false;
                }else if(!reg.test(user_email)){
                    alert('邮箱格式有误');
                    return false;
                }
                //秒数倒计时
                var second=30;
                $("#span_email").text(second+'s');
                //定时器
                _time=setInterval(lessSecond,1000);//每**时间执行一次代码


                //4、把已经验证好的邮箱通过ajax技术 传给控制器
                $.post(
                    "<?php echo url('sendEmail'); ?>",
                    {user_email:user_email},
                    function(res){
                        layer.msg(res.msg,{icon:res.code});
                    },
                    'json'
                );
            });
            function lessSecond(){
                //获取秒数
                var num=$("#span_email").text();
                num=parseInt(num);

                if(num<=0){
                    $("#span_email").text('获取');
                    //清除定时器
                    clearInterval(_time)
                    //按钮生效
                    $('#span_email').css('pointer-events', 'auto');
                }else{
                    //把秒数-1
                    num=num-1;
                    $("#span_email").text(num+'s');
                    //按钮失效
                    $('#span_email').css('pointer-events', 'none');
                }
            }


            //点击注册
            $("#emailRegister").submit(function(){
                //获取表单的数据
                var data=$("#emailRegister").serialize();
                $.post(
                    "<?php echo url('registerDo'); ?>",
                    data,
                    function(res){
                        alert(res.msg);
                        if(res.code==1){
                            location.href="<?php echo url('login'); ?>"
                        }
                    },'json'
                );
                return false;
            });
        })


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
    

