<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>مشروع الفراهيدي - لوحة التحكّم الإداريّة</title>


<link href="<?php echo base_url('assets/css/admin/login.css'); ?>" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>

<!-- jNotify -->
<link rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/jNotify.jquery.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url('assets'); ?>/js/jNotify.jquery.js"></script>


<script type="text/javascript">
$(document).ready(function() {
	$(".username").focus(function() {
		$(".user-icon").css("right","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").css("right","0px");
	});
	
	$(".password").focus(function() {
		$(".pass-icon").css("right","-48px");
	});
	$(".password").blur(function() {
		$(".pass-icon").css("right","0px");
	});
	
	$('#login').click(function(){
		var u=$('#username').val();
		var p=$('#password').val();
		if(p=="" || u=="")
		{
			jError("يرجى ادخال اسم المستخدم و كلمة المرور", {HorizontalPosition : 'center',VerticalPosition : 'center'});
			return;
		}
		
		$.post("<?php echo base_url('admin/index/checkLogin'); ?>",{"u":u,"p":p},function(d){
			if(d.status=="fail")
			{
				jError("اسم المستخدم أو كلمة المرور غير صحيح .. يرجى المحاولة من جديد", {HorizontalPosition : 'center',VerticalPosition : 'center'});
				return;
			return;
			}
			else
			{
				window.location=window.location;
			}
		},"json");
	});
	
	
});
</script>

</head>
<body>

<div id="wrapper">

    <div class="user-icon"></div>
    <div class="pass-icon"></div>

		<div id="login-form" class="login-form">


			<div class="header">
				<h1>يرجى تسجيل الدخول</h1>
			</div>

			<div class="content">
				<input id="username" type="text" class="input username" placeholder="اسم المستخدم" />
				<input id="password" type="password" class="input password" placeholder="كلمة المرور" />
			</div>

			<div class="footer">
			
				<a id="login" class="button">تسجيل الدخول</a>
				
			</div>


		</div>


</div>


<div class="gradient"></div>

</body>
</html>