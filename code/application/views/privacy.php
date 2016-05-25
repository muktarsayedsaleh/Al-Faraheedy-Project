<!doctype html>
<html class="no-js">

	<head>
		
		<title>الفراهيدي - مشروع حوسبة عروض الشعر العربي على الويب - سياسة الخصوصيّة</title>
		
		
		<?php include( dirname(dirname(__FILE__)) .'/views/inc/head.php'); ?>	
		


		<!-- mobile-nav -->
		<div id="mobile-nav-holder">
			<div class="wrapper">
				<ul id="mobile-nav">
					<li><a href="<?php echo base_url('mezan'); ?>">ميزان القصيدة</a></li>
					<li><a href="<?php echo base_url('wizard'); ?>">معالج كتابة قصيدة موزونة</a></li>
					<li><a href="<?php echo base_url('lessons'); ?>">العَروض نظريَّاً</a></li>
					<li><a href="<?php echo base_url('info'); ?>">عن المشروع</a></li>
				</ul>
				<div id="nav-open"><a href="#">ابدأ</a></div>
			</div>
		</div>
		<!-- ENDS mobile-nav -->
			
		<header>
			
				
			<div class="wrapper">
					
				<a href="<?php echo base_url(''); ?>" id="logo"><img  src="<?php echo base_url('assets'); ?>/img/logo.png" alt="الفراهيدي - مشروع حوسبة عروض الشعر العربي على الويب"></a>
				
				<nav>
					<ul id="nav" class="sf-menu">
						<li><a href="<?php echo base_url('mezan'); ?>">ميزان القصيدة<span class="subheader">التقطيع العروضي الآلي</span></a>
						<li><a href="<?php echo base_url('wizard'); ?>">معالج كتابة قصيدة<span class="subheader">اكتب قصيدتك الموزونة</span></a></li>
						<li><a href="<?php echo base_url('lessons'); ?>">العَروض نظريَّاً<span class="subheader">ضوابط البحور و موسيقاها</span></a></li>
						<li><a href="<?php echo base_url('info'); ?>">عن المشروع<span class="subheader">معلومات و سياسات</span></a></li>
						
					</ul>
				</nav>
				
				<div class="clearfix"></div>
				
			</div>
		</header>
	
	
	
	
		<!-- MAIN -->
		<div id="main">
				
			<!-- social -->
			<?php include('inc/social.php'); ?>
			<!-- ENDS social -->
			
			
			
			<!-- Content -->
			<div id="content">
		
	        	
	        	<br/>
	        	<!-- masthead -->
		        <div id="masthead">
					<span class="head"><img style="margin:0 20px 0 0;width:60px;height:60px;" src="<?php echo base_url("assets/img"); ?>/twitter.png" /></span>
					<div id="lastNews">
					  <ul>
						<li>يجري تحميل الأخبار حاليَّاً ...</li>
					  </ul>
					</div>
				</div>
				<script type="text/javascript">
					$(document).ready(function(){

						$('#lastNews').twittieInternal({
							dateFormat: '%b. %d, %Y',
							template: '<li>{{tweet}} <span class="datetwitter">{{date}}</span></li> ',
							count: 10
						});
		
						
					});
				</script>
	        	<!-- ENDS masthead -->
	        	<br/><br/>
	        	
	        	
	        	
	        	
	        	<!-- featured -->
	        	<h1 class="home-block-heading">سياسة الخصوصيّة</h1>
				
				<div class="pageContentFixed">
					
					<p><b>الفراهيدي</b> يهدف أساساً لوضع نفسه في أيدي الشعراء الشباب كإحدى الأدوات التي تسهّل عليهم الطريق نحو امتلاك ناصية الكتابة الوزنيّة و لهذا فإنّ البيانات المقدّمة إليه من قبل مستخدميه تُعالَج عروضيَّاً و تُعاد إليهم على شكل نتائج لعمليات التقطيع الوزنيّ أو تحليل القوافي التي طلبوها هم. <br/> <br/>فيما عدا ذلك فإنّ <b>مشروع الفراهيدي</b> (على وضعه الحاليّ) يتعهّد <span style="color:rgb(187, 0, 0) !important;">بعدم تخزين هذه البيانات</span> لاستخدامها  في أيّ إطارٍ إبداعيّ غير متّصل بتطوير هذا المشروع و زيادة كفاءته في المراحل اللاحقة التي نتصوّرها و نعمل بإخلاص على بلوغها.</p>
					
					
					<br/>
					
					
					
					
	        	</div>
	        	
	      
				
				
			
			</div>
			<!-- ENDS content -->
			
			
			<?php include('inc/foot.php'); ?>