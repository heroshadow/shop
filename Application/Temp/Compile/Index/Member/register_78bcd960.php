<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>注册</title>
	<link rel="stylesheet" type="text/css" href="http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Index/css/common.css"/>
	<link rel="stylesheet" type="text/css" href="http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Index/css/register.css"/>
</head>
<body>
	<div class="secondHeader">
		<div class="secondHeaderCenter clearfix">
			<div class="sheaderLeft fl">
				<img src="http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Index/images/logo.png" alt="" />
			</div>
			<div class="sheaderRight fr">
				<a href="">寺库首页</a>
			</div>
		</div>
	</div>
	<div class="bgcolor">
		<div class="reg_box clearfix">
			<div class="reg_center">
				<form action="" method="post">
				<div class="tab_phone">
					<ul class="clearfix">
						<li class="clearfix">
							<div class="regTips clearfix">
								<span class="t_right">用户名</span>
								<!--<div class="regName_tips fr reg_userName blur">此手机号已经被注册</div>-->
							</div>
							<div class="login_tips fl zindex">
								<input type="text" class="fl reg_int reg_in reg_error" name="email"/>
							</div>
						</li>
						<li class="clearfix">
							<div class="regTips clearfix">
								<span class="t_right">验证码</span>
								<!--<div class="regName_tips fr reg_userName blur">验证码错误</div>-->
							</div>
							<input type="text" class="fl reg_ins reg_in" name="code"/>
							<a href= "" class="yz fl"><img style=" margin-top:-6px;" src="<?php echo U('Member/code');?>" alt="" width="70" height="30" /></a>
							<a href="" class="change fl">换一换</a>
						</li>
						<li class="clearfix">
							<div class="regTips clearfix">
								<span class="t_right">密码</span>
								<!--<div class="regName_tips fr reg_userName blur" name="password1">请输入密码</div>-->
							</div>
							<div class="login_tips fl zindex">
								<input type="password" class="fl reg_int reg_in reg_error" name="password1"/>
							</div>
						</li>
							<li class="clearfix">
							<div class="regTips clearfix">
								<span class="t_right">请确认密码</span>
								<!--<div class="regName_tips fr reg_userName blur" name="password2">请确认密码</div>-->
							</div>
							<div class="login_tips fl zindex">
								<input type="password" class="fl reg_int reg_in reg_error" name="password2"/>
							</div>
						</li>
					</ul>
					<div class="btn_reg_submit">
						<input class="input_sub login_btn" value="立即注册" type="submit">
						<div class="msg clearfix padTop30">
							<span class="fl">
								已经是寺库会员？<a href="<?php echo U('Member/login');?>" class="active">立即登录</a>
							</span>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!--底部-->
	<div class="n-footer">
		<div class="service clearfix" >
			<dl class="first">
				<dt>
					<strong>新手指南</strong>
					<dd>
						<div><a href="">注册新用户</a></div>
						<div><a href="">网上订购流程</a></div>
						<div><a href="">海外站购买说明</a></div>
						<div><a href="">优惠券使用说明</a></div>
						<div><a href="">美国站购买说明</a></div>
					</dd>
				</dt>
			</dl>
			<dl class="">
				<dt>
					<strong>新手指南</strong>
					<dd>
						<div><a href="">注册新用户</a></div>
						<div><a href="">网上订购流程</a></div>
						<div><a href="">海外站购买说明</a></div>
						<div><a href="">优惠券使用说明</a></div>
						<div><a href="">美国站购买说明</a></div>
					</dd>
				</dt>
			</dl>
			<dl class="">
				<dt>
					<strong>新手指南</strong>
					<dd>
						<div><a href="">注册新用户</a></div>
						<div><a href="">网上订购流程</a></div>
						<div><a href="">海外站购买说明</a></div>
						<div><a href="">优惠券使用说明</a></div>
						<div><a href="">美国站购买说明</a></div>
					</dd>
				</dt>
			</dl>
			<dl class="">
				<dt>
					<strong>新手指南</strong>
					<dd>
						<div><a href="">注册新用户</a></div>
						<div><a href="">网上订购流程</a></div>
						<div><a href="">海外站购买说明</a></div>
						<div><a href="">优惠券使用说明</a></div>
						<div><a href="">美国站购买说明</a></div>
					</dd>
				</dt>
			</dl>
			<dl class="last">
				<dt><strong>境外体验店</strong></dt>
				<dd>
					<div class="txt">
						寺库通过在全球多地设立体验店和办事机构的方式，为高端消费者提供最贴心的全球奢侈品一站式服务
					</div>
					<div>
						<span class="pr65 "><a href="">北京</a></span>
						<span><a href="">香港</a></span>
					</div>
					<div>
						<span class="pr65 "><a href="">上海</a></span>
						<span><a href="">米兰</a></span>
					</div>
					<div>
						<span class="pr65 "><a href="">成都</a></span>
					</div>
				</dd>
			</dl>
		</div>
		<div class="footer-nav">
			<div class="bd">
				<ul class="clearfix">
					<li class="nf-1">
						<i></i>100%正品保证
					</li>
					<li class="nf-2">
						<i></i>7天退换货
					</li>
					<li class="nf-3">
						<i></i>专业维修保养
					</li>
					<li class="nf-4">
						<i></i>权威奢侈品鉴定
					</li>
					<li class="nf-5">
						<i></i>贴心管家物流
					</li>
				</ul>
			</div>
		</div>
		<div class="footer-aboat">
			<div class="aboat-bd">
				<div class="links">
					<p class="clearfix">
						<a href="">寺库网</a>
						<a href="">寺库金融</a>
						<a href="">寺库奢侈品养护</a>
					</p>
				</div>
				<div class="copyright">
					<p class="clearfix">
						<span>营业执照注册号110102011888762</span>
						<span>京公安备11010102001392</span>
						<span>京ICP证110119号 京ICP备09084709号-3</span>
						<span>ISO9001中国质量管理体系认证</span>
					</p>
				</div>
				<div class="links">
					<p class="clearfix">
						<a href="">加入寺库</a>
						<a href="">联系我们</a>
						<a href="">关于寺库</a>
						<a href="">帮助中心</a>
						<a href="">寺库微博</a>
						<a href="">友情链接</a>
						<a href="">奢侈品热词</a>
						<a href="">奢侈品资讯</a>
					</p>
				</div>
				<div class="copyright">
					<p class="clearfix">
						<span>COPYRIGHT © 2010-2015 北京寺库商贸有限公司 版权所有</span>
					</p>
				</div>
				<div class="authentication clearfix">
					<a href=""><img src="images/f_01.jpg" alt="" /></a>
					<a href=""><img src="images/f_04.jpg" alt="" /></a>
					<a href=""><img src="images/kx_02.jpg" alt="" /></a>
					<a href=""><img src="images/kexin.jpg" alt="" /></a>
					<a href=""><img src="images/f_03.jpg" alt="" /></a>
				</div>
				<div class="authentication clearfix">
					<ul class="ewm clearfix">
						<li>
							<img src="images/app_ewm0827.jpg" alt="" />
							<p>手机客户端</p>
						</li>
						<li>
							<img src="images/sk_ewm0827.jpg" alt="" />
							<p>官方微信</p>
						</li>
					</ul>
				</div>
			</div>	
		</div>
	</div>
	<!--底部end-->
</body>
</html>
