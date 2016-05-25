<!doctype html>
<html class="no-js">

	<head>
		
		<title>الفراهيدي - مشروع حوسبة عروض و قافية الشعر العربي على الويب - نتائج تحليل قافية مشاركة عبر Facebook</title>
	
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
		
	        	
	        	<br/><br/>
	        	
	        	
	        	<!-- featured -->
	        	<h1 class="home-block-heading">نتائج تحليل القافية المشاركة عبر Facebook</h1>
				
				<div class="pageContentFixed">
					
					
					<?php 
						echo $html;
					?>
					
					<br/><br/>
					
					<center>
						<h2><a href="<?php echo base_url("/mezan")?>">قم بتجربة ميزان القصيدة بنفسك الآن !!</a></h2>
					</center>
					
					<script type="text/javascript">
						$(document).ready(function(){
							$('.commandsTR').hide();
							$('tr td[style$="color:red;"]').hide();
							$('#commandsTafeelaAll').hide();
							$('.execTime').hide();
							$('img[src="assets/img/success.png"]').attr('src','http://faraheedy.com/assets/img/success.png');
							$('img[src="assets/img/error.png"]').attr('src','http://faraheedy.com/assets/img/error.png');
						});
					</script>
	        	</div>
	        	
	      
				
				
			
			</div>
			<!-- ENDS content -->
			
			
			<?php include('inc/foot.php'); ?>