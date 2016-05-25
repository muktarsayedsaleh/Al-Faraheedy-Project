<!doctype html>
<html class="no-js">

	<head>
		
		<title>الفراهيدي - العروض نظريَّاً</title>
		
		<?php include( dirname(dirname(__FILE__)) .'/inc/head.php'); ?>	
		


		<!-- mobile-nav -->
		<div id="mobile-nav-holder">
			<div class="wrapper">
				<ul id="mobile-nav">
					
					<li><a href="<?php echo base_url('mezan'); ?>">ميزان القصيدة</a></li>
					<li><a href="<?php echo base_url('wizard'); ?>">معالج كتابة قصيدة موزونة</a></li>
					<li class="current-menu-item"><a href="<?php echo base_url('lessons'); ?>">العَروض نظريَّاً</a></li>
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
						<li class="current-menu-item"><a href="<?php echo base_url('lessons'); ?>">العَروض نظريَّاً<span class="subheader">ضوابط البحور و موسيقاها</span></a></li>
						<li><a href="<?php echo base_url('info'); ?>">عن المشروع<span class="subheader">معلومات و سياسات</span></a></li>
						
					</ul>
				</nav>
				
				<div class="clearfix"></div>
				
			</div>
		</header>
	
	
	
	
		<!-- MAIN -->
		<div id="main">
				
			<!-- social -->
			<?php include( dirname(dirname(__FILE__)) .'/inc/social.php'); ?>	
			
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

						$('#lastNews').twittie({
							dateFormat: '%b. %d, %Y',
							template: '<li>{{tweet}} <span class="datetwitter">{{date}}</span></li> ',
							count: 10
						});
		
						
					});
				</script>
	        	<!-- ENDS masthead -->
	        	<br/><br/>
	        	
	        	
	        	<!-- featured -->
	        	<h1 class="home-block-heading">العَروضُ نَظَريَّاً</h1>
				
				<div class="pageContentFixed lessonsMukhtar">
					
					<h2>الأساسيَّات :</h2>
					<a class="a-btn" href="<?php echo base_url("lessons/lesson1") ?>">
						<span class="a-btn-text">مقدمة في علم العروض</span> 
					</a>
					<a class="a-btn" href="<?php echo base_url("lessons/lesson2") ?>">
						<span class="a-btn-text">طريقتا التقطيع العروضي</span> 
					</a>
					
					<div style="clear:both;"></div>
						
					<br/>

					<h2>بحور الشعر :</h2>

					<a class="a-btn" href="<?php echo base_url("lessons/lesson3") ?>">
						<span class="a-btn-text">البحر الطويل</span> 
					</a>
					<a class="a-btn" href="<?php echo base_url("lessons/lesson4") ?>">
						<span class="a-btn-text">البحر البسيط</span> 
					</a>
					<a class="a-btn" href="<?php echo base_url("lessons/lesson5") ?>">
						<span class="a-btn-text">البحر المديد</span> 
					</a>

					<a class="a-btn" href="<?php echo base_url("lessons/lesson6") ?>">
						<span class="a-btn-text">البحر الكامل</span> 
					</a>
					<a class="a-btn" href="<?php echo base_url("lessons/lesson7") ?>">
						<span class="a-btn-text">البحر الوافر</span> 
					</a>

					<a class="a-btn" href="<?php echo base_url("lessons/lesson8") ?>">
						<span class="a-btn-text">بحر الهزج</span> 
					</a>
					<a class="a-btn" href="<?php echo base_url("lessons/lesson9") ?>">
						<span class="a-btn-text">بحر الرجز</span> 
					</a>
					<a class="a-btn" href="<?php echo base_url("lessons/lesson10") ?>">
						<span class="a-btn-text">بحر الرمل</span> 
					</a>

					<a class="a-btn" href="<?php echo base_url("lessons/lesson11") ?>">
						<span class="a-btn-text">البحر السريع</span> 
					</a>
					<a class="a-btn" href="<?php echo base_url("lessons/lesson12") ?>">
						<span class="a-btn-text">البحر الخفيف</span> 
					</a>
					<a class="a-btn" href="<?php echo base_url("lessons/lesson13") ?>">
						<span class="a-btn-text">البحر المنسرح</span> 
					</a>
					<a class="a-btn" href="<?php echo base_url("lessons/lesson14") ?>">
						<span class="a-btn-text">البحر المضارع</span> 
					</a>
					<a class="a-btn" href="<?php echo base_url("lessons/lesson15") ?>">
						<span class="a-btn-text">البحر المقتضب</span> 
					</a>
					<a class="a-btn" href="<?php echo base_url("lessons/lesson16") ?>">
						<span class="a-btn-text">البحر المجتث</span> 
					</a>

					<a class="a-btn" href="<?php echo base_url("lessons/lesson17") ?>">
						<span class="a-btn-text">البحر المتقارب</span> 
					</a>
					<a class="a-btn" href="<?php echo base_url("lessons/lesson18") ?>">
						<span class="a-btn-text">البحر المتدارك</span> 
					</a>

					
					<div style="clear:both;"></div>
					<br/>
					<h2>مواضيع أخرى :</h2>
					
					<a class="a-btn" href="<?php echo base_url("lessons/lesson19") ?>">
						<span class="a-btn-text">قصيدة التفعيلة</span> 
					</a>
					
					<a class="a-btn" href="<?php echo base_url("lessons/lesson20") ?>">
						<span class="a-btn-text">علم القافية</span> 
					</a>
					
					<div style="clear:both;"></div>
					
					
					

					
					
					
					
	        	</div>
	        	
	      
				
				
			
			</div>
			<!-- ENDS content -->
			
			
			<?php include( dirname(dirname(__FILE__)) .'/inc/foot.php'); ?>	