<!doctype html>
<html class="no-js">

	<head>
		
		<title>الفراهيدي موبايل</title>
		
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
	        	
	        	
	        	
	        	<h1 class="home-block-heading">الفراهيدي موبايل</h1>
									
				<div class="pageContentFixed lessonsMukhtar">
					
					
						
					
				
				
				
				
						<ul>
							<li>Android:
								<ul>
									<li><a target="_blank" href="<?php echo base_url(); ?>assets/mobile/faraheedymobile.apk">الفراهيدي موبايل لأجهزة آندرويد.</a><br/> <!-- <img src="<?php echo base_url('assets/img'); ?>/chart.png"/> --> </li>
								</ul>
							</li>
							<li>iPhone:
								<ul>
									<li> <a target="_blank" href="<?php echo base_url(); ?>assets/mobile/faraheedy.ipk">الفراهيدي موبايل لأجهزة الآي فون.</a>  </li>
								</ul>
							</li>
							<li>Symbian:
								<ul>
									<li> <a target="_blank" href="<?php echo base_url(); ?>assets/mobile/faraheedy.wgz">الفراهيدي موبايل لأجهزة سيمبيان.</a>  </li>
								</ul>
							</li>
							<li>Windows Phone:
								<ul>
									<li> <a target="_blank" href="<?php echo base_url(); ?>assets/mobile/faraheedy.xap">الفراهيدي موبايل لأجهزة الويندوز فون.</a>  </li>
								</ul>
							</li>
							<li>BlackBerry:
								<ul>
									<li> <a target="_blank" href="<?php echo base_url(); ?>assets/mobile/faaheedy.jad">الفراهيدي موبايل لأجهزة البلاك بيري.</a>  </li>
								</ul>
							</li>
							<li>تطبيقات مساعدة:
								<ul>
									<li><a target="_blank" href="https://play.google.com/store/apps/details?id=com.jb.gokeyboard">GO Keyboard <span class="redText">(لوحة مفاتيح بديلة لأجهزة Android تدعم محارف التشكيل).</span></a></li>
								</ul>
							</li>
						</ul>
						
					
				
					<div style="clear:both;"></div>				

	        	</div>
	        	
	      
				
				
		
		
			</div>
			<!-- ENDS content -->
			
			
			<script type="text/javascript">
		
			
			</script>
			
			
			<?php include('inc/foot.php'); ?>
