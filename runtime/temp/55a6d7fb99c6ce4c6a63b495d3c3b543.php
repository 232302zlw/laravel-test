<?php /*a:1:{s:79:"D:\phpStudy\PHPTutorial\WWW\1901\myshop\application\admin\view\login\login.html";i:1558054216;}*/ ?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="/static/admin/login/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/login/css/demo.css" />
    <!--必要样式-->
    <link rel="stylesheet" type="text/css" href="/static/admin/login/css/component.css" />
    <link rel="stylesheet" href="/static/layui/css/layui.css">
    <script src="/static/layui/layui.js"></script>
    <!--[if IE]>
    <script src="/static/admin/login/js/html5.js"></script>
    <![endif]-->
    <style>
        input::-webkit-input-placeholder{
            color:rgba(0, 0, 0, 0.726);
        }
        input::-moz-placeholder{   /* Mozilla Firefox 19+ */
            color:rgba(0, 0, 0, 0.726);
        }
        input:-moz-placeholder{    /* Mozilla Firefox 4 to 18 */
            color:rgba(0, 0, 0, 0.726);
        }
        input:-ms-input-placeholder{  /* Internet Explorer 10-11 */
            color:rgba(0, 0, 0, 0.726);
        }
    </style>
</head>
<body>
<div class="container demo-1">
    <div class="content">
        <div id="large-header" class="large-header">
            <canvas id="demo-canvas"></canvas>
            <div class="logo_box">
                <h3>登录</h3>
                <form  method="post"  class="layui-form" id="myform">
                    <div class="input_outer">
                        <span class="u_user"></span>
                        <input  name="admin_name" class="text" lay-verify="required" style="color: #000000 !important" type="text" placeholder="请输入账户">
                    </div>
                    <div class="input_outer">
                        <span class="us_uer"></span>
                        <input  name="admin_pwd" class="text" lay-verify="required" style="color: #000000 !important; position:absolute; z-index:100;"value="" type="password" placeholder="请输入密码">
                    </div>
                    <div>
                        <input type="text" name="code" lay-verify="required" style="width: 120px;height: 50px;border-radius: 25px;border: 1px solid #ccc;">
                        <img src="<?php echo captcha_src(); ?>" alt="captcha"  width="150px" height="50px" id="changeCode"/>



                    </div>
                    <div id="login" class="mb2">
                        <input type="submit" value="登录" class="act-but submit"  style="color: #FFFFFF;width: 300px;">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- /container -->
<script src="/static/admin/login/js/TweenLite.min.js"></script>
<script src="/static/admin/login/js/EasePack.min.js"></script>
<script src="/static/jquery.js"></script>
<script src="/static/admin/login/js/rAF.js"></script>
<script src="/static/admin/login/js/demo-1.js"></script>
<script src="/static/admin/login/js/Longin.js"></script>
<div style="text-align:center;">
</div>


</body>
</html>
<script>
    $(function(){
        //点击提交
        $("#myform").submit(function(){
            //获取表单数据
            var data=$("#myform").serialize();

            $.post(
                "<?php echo url('loginDo'); ?>",
                data,
                function(res){
                    alert(res.msg);
                    if(res.code==1){
                        location.href="<?php echo url('Index/index'); ?>"
                    }
                },
                'json'
            );

            return false;
        });


        //点击切换验证码
        $("#changeCode").click(function(){
           var _this =$(this);//当前点击的图片
            _this.prop("src","<?php echo captcha_src(); ?>?num="+Math.random());
        });
    })
</script>
