<!doctype html>
<html class="no-js">

	<head>
		
		<title>الفراهيدي - مشروع حوسبة عروض الشعر العربي على الويب - ادعم المشروع</title>
		
		
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
	        	<h1 class="home-block-heading">ادعم الفراهيدي</h1>
				
				<div class="pageContentFixed">
					
					<p><b>الفراهيدي</b> مشروع علميّ فتيّ يحتاج للدّعم حتّى يستمر و يتطوّر إلى المستوى الذي نطمح له و نعمل على أن يصل إليه , و لذا فنحن نرحّب بكل دعم يمكن أن يُقدَّم لهذا المشروع.
						<br/> يمكنكم دعم الفراهيدي :</p>
					<ol>
						<li><b>إعلاميّاً :</b>
							<p>إنّ أيّة مادة إعلاميّة تكتب و تنشر عن المشروع عبر أيّة وسيلة إعلاميّة سيكون لها الدور الأكبر في استمراره و نجاحه و ستكون بكل تأكيد إضافة معنويّة كبيرة له.</p>
						</li>
						<li><b>تقنيَّاً :</b>
							<p>مع أنّ العمل الأكبر في هذا المشروع يعتمد على الخوارزميّات الجديدة و المبتكرة التي اجتهدنا على إيجادها و تحسينها و اختبارها لسنوات طويلة إلّا أنّنا على يقين من وجود مبدعين و مختصّين آخرين على علم بطرائق و أساليب حوسبة اللغة العربيّة و التقنيّات و المشاريع المتّصلة بها و نحن إذ نذكر هذا و نؤكّد عليه فإنّنا نرحّب بأيّ تواصل أو اقتراح أو دعم تقنيّ أو معرفيّ يدفع بعجلة هذا المشروع إلى الأمام و ذلك من خلال البريد الإلكترونيّ : <a href="mailto:mokhtar_ss@hotmail.com">mokhtar_ss@hotmail.com</a>.</p>
						</li>
						<li><b>ماديّاً :</b>
							<p>بالطبع , نحن نرحّب بأيّ دعمٍ ماديّ يقدّم لهذا المشروع من خلال حساب باي بال التالي:
								<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
									<input type="hidden" name="cmd" value="_s-xclick">
									<input type="hidden" name="hosted_button_id" value="EF6KDG5PV5GKJ">
									<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
									<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
								</form>

							</p>
							
						</li>
					</ol>
					
					<br/>
					
				
					
	        	</div>
	        	
	      
				
				
			
			</div>
			<!-- ENDS content -->
			
			
			<?php include('inc/foot.php'); ?>
