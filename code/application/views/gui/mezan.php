<!doctype html>
<html class="no-js">

	<head>
		
		<title>الفراهيديّ - ميزان القصيدةِ</title>
		
		<?php include( dirname(dirname(__FILE__)) .'/inc/head.php'); ?>	
		
		<div id="fb-root"></div>
		<script>
		  window.fbAsyncInit = function() {
			FB.init({
			  appId      : '1456902007876385',
			  status     : true,
			  xfbml      : true
			});
		  };

		  (function(d, s, id){
			 var js, fjs = d.getElementsByTagName(s)[0];
			 if (d.getElementById(id)) {return;}
			 js = d.createElement(s); js.id = id;
			 js.src = "http://connect.facebook.net/en_US/all.js";
			 fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));
		</script>

		<!-- mobile-nav -->
		<div id="mobile-nav-holder">
			<div class="wrapper">
				<ul id="mobile-nav">
					<li class="current-menu-item"><a href="<?php echo base_url('mezan'); ?>">ميزان القصيدة</a></li>
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
						<li class="current-menu-item"><a href="<?php echo base_url('mezan'); ?>">ميزان القصيدة<span class="subheader">التقطيع العروضي الآلي</span></a>
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
			<?php include( dirname(dirname(__FILE__)) .'/inc/social.php'); ?>	
			<!-- ENDS social -->

			<!-- Content -->
			<div id="content">
	        	
				<br/>
	        	
				
				
				<div class="pageContentFixed lessonsMukhtar">
					<div id="tabs">
						<ul>
							<li><a href="#tabs-1">ميزان القصيدة العموديّة</a></li>
							<li><a href="#tabs-2">ميزان قصيدة التفعيلة</a></li>
						</ul>
						<div id="tabs-1">
							<form id="mezan1">
								<div id="poemCountainer">
									<label class="poemTafeelaLabel">البيت رقم 1:</label> <br/>
									<input lang="fa" placeholder="صدر البيت" class="shaterInput sader" id="sader1" name="sader1" /> &nbsp;&nbsp;
									<input placeholder="عجز البيت" class="shaterInput ajez" id="ajez1" name="ajez1" /> 
									
									
									<div style="clear:both;"></div>
								</div>
								<br/>
								<a id="anotherBait" class="a-btnIn">
									<span class="a-btn-text">+</span> 
								</a>
								
								<span id="buttonsContainer"></span>
								
								<a class="a-btnIn inputHelp">
									<span class="a-btn-text">؟</span> 
								</a>
								
								<a id="demoBait" class="a-btnIn">
									<span class="a-btn-text">بيت للتجربة</span> 
								</a>
								
								<a id="automaticTashkeel" class="a-btnIn">
									<span class="a-btn-text">شكّل ليَ الأبيات <span style="font-size:8px;" class="redText">(جديد)</span></span> 
								</a>
								
								<span id="buttonsContainer2"></span>
								
								<br/>
								<h2 class="resultsHead"></h2>
								
								<center>
									<a class="a-btnIn" id="doFaraheedy1">
										<span style="padding:0 40px;font-size:.7em;" class="a-btn-text"> شرِّح الأبياتَ عروضيَّاً </span> 
									</a>
									&nbsp;&nbsp;
									<a class="a-btnIn" id="doQawafee">
										<span style="padding:0 40px;font-size:.7em;" class="a-btn-text"> حلِّلْ قوافي الأبيات </span> 
									</a>
									<br/>
									
								</center>

								<!-- to support old browsers without ajax -->
								<input value="notAjax" id="posttype" name="posttype" type="hidden" />
							</form>
							
							<div>
								<table id="resultsContainter" class="resultsTable">
									
								</table>
							</div>
							
						</div>
						<div id="tabs-2">
							<form id="mezan2">
								<label class="poemTafeelaLabel" for="poem">نصُّ القصيدةِ :</label>
								<textarea placeholder="نصّ القصيدة" rows="4" class="poemTafeelaInput" id="poem" name="poem"></textarea>
								<center>
									<a id="doFaraheedy2" class="a-btnIn">
										<span class="a-btn-text">شرِّح النصَّ عروضيَّاً</span> 
									</a>
									
									<span id="buttonsContainer"></span>
									
									<a id="demoPoem" class="a-btnIn">
										<span class="a-btn-text">نصّ للتجربة</span> 
									</a>
									
									<a class="a-btnIn inputHelp">
										<span class="a-btn-text">؟</span> 
									</a>	
								</center>
								<!-- to support old browsers without ajax -->
								<input value="notAjax" id="posttype" name="posttype" type="hidden" />
							</form>
							<div id="tafeelaResults">
							</div>
						</div>
					</div>
					<input id="hash" type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>" />
					<div style="clear:both;"></div>			
	        	</div>
			</div>
			<!-- ENDS content -->
			
			<div title="إعدادت معالج التشكيل التلقائي" id="automaticTashkeelDialog">
				
			</div>
			
			<!-- Mezan js -->
			<script src="<?php echo base_url('assets/js/mezanjs.js'); ?>" type="text/javascript"></script>
			
			
			<?php include( dirname(dirname(__FILE__)) .'/inc/foot.php'); ?>	