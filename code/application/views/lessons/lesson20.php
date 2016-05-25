<!doctype html>
<html class="no-js">

	<head>
		
		<title>الفراهيدي - العروض نظريَّاً - علم القافية</title>
		
		<?php include( dirname(dirname(__FILE__)) .'/inc/head.php'); ?>	
		


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
	        	<h1 class="home-block-heading">علم القافية</h1>
				
				<div class="pageContentFixed lessonsMukhtar">
					<h2>تعريف :</h2>
					<p>يعرّف علماء العروض القافية بأنّها المقاطع الصوتيّة التي تكون في أواخر أبيات القصيدة , أي المقاطع التي يلزم تكرار نوعها في كل بيت.</p>
					<p>فالبيت الأوّل في القصيدة العموديّة يتحكم في قوافي بقية أبيات القصيدة من حيث نوعها , فإذا فرضنا أنّ الشَّاعر أنهى مطلع قصيدته (أي البيت الأوّل منها) بكلمة مثل الوطنْ بسكون النون فإنّه يتحتّم على الشّاعر أن يختم بقية الأبيات بكلمات تنتهي بنون ساكنة مثل الزمنْ و الشجنْ و الوسنْ .. إلخ , أمّا إذا أورد النون في كلمة "الوطن" محرّكة بالكسر في البيت الأوّل فإن عليه أن يلتزم بكسر النون في قوافي بقية الأبيات , و في هذه الحالة يكون الشاعر قد أوجب على نفسه أن يلتزم شيئين حيال القافية : <br/> أوّلاً - النون. <br/> ثانياً - حركة الكسرة.</p>
					<p>
					بالنسبة لهذا النظام البرمجيّ فإنّه يعتمد على القواعد التي أوردها الخطيب التبريزي في كتابة (الوافي في العروض و القوافي) بالنسبة لمعاملته مع القافية و هي كمايلي:
						<ul>
							<li>القافية : من آخر البيت إلى أوّل ساكن يليه مع المتحرك الذي قبل السّاكن.</li>
							<li>حروف القافية ستّة و هي :
								<ul>
									<li>الرّويّ : هو الحرف الذي تبنى عليه القصيدة و تنسب إليه , فيقال قصيدة رائيّة أو داليّة و يلتزم الشاعر بهذا الحرف و بحركته في نهاية كل بيت يكتبه.</li>
									<li>الوصل : الألف , و الواو , و الياء , و  الهاء , و الكاف , سواكن يتبعن ما قبلهنّ (الرّويّ).</li>
									<li>الخروج : يكون بثلاثة أحرف و هي الألف و الواو و الياء السواكن , يتبعن هاء الوصل.</li>
									<li>الرّدف : ألف أو واو أو ياء سواكن قبل حرف الروي و قبلهنّ حرف متحرك بحركة مجانسة.</li>
									<li>التأسيس : لا يكون إلا بحرف ألف قبل الحرف الذي يسبق الرّوي , شرط أن تكون ألف التأسيس و حرف الرّوي في كلمة واحدة.</li>
									<li>الدّخيل : الحرف الذي يقع بين ألف التأسيس و حرف الروي و هو غير مهم من ناحية ضرورة التزام الشاعر به كالردف و التأسيس و الوصل و الخروج و الروي.</li>
								</ul>
							</li>
						</ul>
					</p>
					
					<h2>عيوب القافية :</h2>
					<p>
						<ul>
							<li>اختلاف حرف الروي أو حركته.</li>
							<li>عدم التزام الشاعر بالوصل و الخروج.</li>
							<li>عدم التزام الشاعر بالردف.</li>
							<li>عدم التزام الشاعر بالتأسيس.</li>
							<li>إذا اجتمع ردف الياء مع ردف الألف أو إذا اجتمع ردف الواو مع ردف الألف , و أمّا اجتماع ردفي الألف و الياء فلا يعدّ عيباً.</li>
						</ul>
					</p>
					
					
					<br/><br/>
					
					
					

					
					
					<a style="clear:both;margin-right:60px;" class="a-btn" href="<?php echo base_url('lessons/lesson19'); ?>">
						<span class="a-btn-text">الدرس السابق</span> 
					</a>
					
					<a class="a-btn" href="<?php echo base_url('lessons'); ?>">
						<span class="a-btn-text">عودة إلى فهرس الدروس النظريَّة</span> 
					</a>
					
					
					
					
					
					<div style="clear:both;"></div>
					
					
					
	        	</div>
	        	
	      
				
				
			
			</div>
			<!-- ENDS content -->
			
			
			<script type="text/javascript">
				$(document).ready(function(){
					$('.goToMukhtar').click(function(e){
						var mukhtarSelector="#"+"hamesh"+$(this).html();
						$.scrollTo(mukhtarSelector,300);
						$(mukhtarSelector).animate({'background-color':'rgb(255,255,158)'},100).animate({'background-color':'rgb(245, 245, 245)'},4000);
					});
				});
			</script>
			
			
			<?php include( dirname(dirname(__FILE__)) .'/inc/foot.php'); ?>	