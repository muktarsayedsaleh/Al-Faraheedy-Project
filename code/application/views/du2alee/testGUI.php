<!doctype html>
<html class="no-js">

	<head>
		
		<title>مشروع الفراهيدي - مشروع الدؤلي - صفحة الاختبارات</title>
		<link rel="stylesheet" media="all" href="<?php echo base_url('assets'); ?>/css/css3progressbar.css"/>
		<?php include( dirname(dirname(__FILE__)) .'/inc/head.php'); ?>		
		


		<!-- mobile-nav -->
		<div id="mobile-nav-holder">
			<div class="wrapper">
				<ul id="mobile-nav">
					<li class="current-menu-item"><a href="<?php echo base_url('du2alee/tashkeel/alphaGUI'); ?>">اختبارات مشروع الدؤلي</a>
					<li><a href="<?php echo base_url('du2alee/tashkeel'); ?>">مشروع الدؤلي</a>
				</ul>
				<div id="nav-open"><a href="#">ابدأ</a></div>
			</div>
		</div>
		<!-- ENDS mobile-nav -->
			
		<header>
			
				
			<div class="wrapper">
					
				<a href="<?php echo base_url('du2alee/tashkeel'); ?>" id="logo"><img src="<?php echo base_url('assets'); ?>/img/du2alee-logo.png" alt="الدؤلي - مشروع التشكيل الآلي للنص العربي"></a>
				
				<nav>
					<ul id="nav" class="sf-menu">
						<li class="current-menu-item"><a href="<?php echo base_url('du2alee/tashkeel/alphaGUI'); ?>">اختبارات مشروع الدؤلي<span class="subheader">اختبارات الإصدار ألفا قبل دمجه مع مشروع الفراهيدي</span></a>
						<li><a href="<?php echo base_url('du2alee/tashkeel'); ?>">مشروع الدؤلي<span class="subheader">التشكيل الآلي للنص العربي</span></a>
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
	        	<br/><br/>
				
				<div class="pageContentFixed lessonsMukhtar">
					<div id="tabs">
						<ul>
							<li><a href="#tabs-1">التدريب</a></li>
							<li><a href="#tabs-2">الاستخدام</a></li>
						</ul>
						<div id="tabs-1">
							<form id="training">
								<label class="poemTafeelaLabel" for="poem">النصّ المشكول بشكل دقيق:</label>
								<textarea placeholder="النصّ المشكول للتدريب" rows="4" class="poemTafeelaInput" id="trainingInput" name="trainingInput"></textarea>
								<center>
									<a id="doTraining" class="a-btnIn">
										<span class="a-btn-text">أجرِ التدريب</span> 
									</a>
									
								</center>
							</form>
							<div id="trainingResult">
								
							</div>
							
						</div>
						<div id="tabs-2">
							<form id="usage">
								<label id="mainLabel" class="poemTafeelaLabel" for="poem">النص غير المشكول:</label>
								<textarea placeholder="النص غير المشكول" rows="4" class="poemTafeelaInput" id="usageInput" name="usageInput"></textarea>
								<center>
									<a id="doUsage" class="a-btnIn">
										<span class="a-btn-text">شكّل النصّ</span> 
									</a>
									
								</center>
							</form>
							<div id="usageResult">
							
							</div>
						</div>
					</div>
					<input id="hash" type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>" />
					<div style="clear:both;"></div>			
	        	</div>
			</div>
			<!-- ENDS content -->
			
			<!-- Du2alee Test GUI js -->
			<script src="<?php echo base_url('assets/js/du2aleeTestGUIjs.js'); ?>" type="text/javascript"></script>
			
			
			<?php include( dirname(dirname(__FILE__)) .'/inc/du2aleeFoot.php'); ?>	