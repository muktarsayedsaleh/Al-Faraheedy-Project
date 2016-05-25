<!doctype html>
<html class="no-js">

	<head>
		
		<title>مشروع الفراهيدي - الشيفرة المصدريّة للمطوّرين</title>
		
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
	        	
	        	
	        	<h1 class="home-block-heading">الشيفرة المصدريّة لمشروع الفراهيدي</h1>
									
				<div class="pageContentFixed lessonsMukhtar">
					
					<p>عزيزي المطوِّر  مرحباً بك في صفحة تحميل الشيفرة المصدريّة لمشروع الفراهيدي , أرجو أن تتكرّم بقراءة الأسطر التالية بعناية قبل تحميل الشيفرة المصدريّة</p>
					<h2>ماهي مبررات كتابة مشروع الفراهيدي أصلاً ؟</h2>
					<p>لأنَّ النجاح في تقديم بحث علميّ عن "حوسبة العَروض و القافية" مع تطبيق عملي له سيساهم يقيناً في تقديم أبحاث جديدة في المستقبل بتطبيقات أوسع و أبعد من التطبيقات الأدبيّة المباشرة نذكر منها على سبيل المثال لا الحصر (تطبيقات القارئ الآلي للنصوص العربيّة – تطبيقات تمييز الأصوات باللغة العربيّة – تطبيقات التحكّم الآلي باستخدام الأوامر الصوتيّة باللغة العربيّة - تطبيقات التشكيل التلقائي للنص العربي – تطبيقات المحللات الصرفية ... و غير ذلك من التطبيقات المعتمدة في عملها على قواعد تحويل النص المكتوب إلى الصوت المنطوق المقابل له و العكس).</p>
					
					<h2>حسناً , و كيف أساهم في ذلك كمطوِّر عربيّ ؟</h2>
					<p>مشروع الفراهيدي و عملي الطويل فيه هو اجتهاد شخصيّ أضعه بين يديك لتستفيد منه أو لتبني عليه أو لتستلهم منه , لا فرق , المهم أن يكون هذا العمل الذي أنشره بشكلّ مجانيّ تطوّعيّ بذرة لشيء قادم يخدم حوسبة لغتنا العربيّة الخالدة و هذه مسؤوليّتك أنت و مسؤوليّتي أنا و مسؤوليّة كلّ من يمتلك المعرفة التقنيّة و اللغويّة تجاه لغة القرآن الكريم.</p>
					
					<h2>كيف يعمل الفراهيدي داخليّاً ؟</h2>
					<p>يعمل الفراهيدي وفق خوارزميّات ثلاث جديدة و مبتكرة أضع مخطّطاتها التدفّقيّة بين يديك:
					<br/>
					<h3>أوّلاً - خوارزميّة التقطيع الوزنيّ (ميزان القصيدة):</h3><img style="width:100%;height:100%;" src="<?php echo base_url("assets/developers"); ?>/img/flowchart1.png"></p>
					<br/>
					<h3>ثانياً - خوارزميّة الإشباع الجديدة:</h3><img style="width:95%;height:95%;" src="<?php echo base_url("assets/developers"); ?>/img/flowchart2.png"></p>
					<br/>
					<h3>ثالثاً - خوارزميّة تحليل القافية:</h3><img style="width:95%;height:95%;" src="<?php echo base_url("assets/developers"); ?>/img/flowchart3.png"></p>
					
					
					<h2>خطوات تشغيل الفراهيدي على السيرفر الشخصي بعد تحميله</h2>
					<p>بعد تحميل الشيفرة المصدريّة لمشروع الفراهيدي نقوم بعمل الخطوات التالية:
						<ol>
							<li>تثبيت سيرفر php و mysql , و عن نفسي أنصح بسيرفر WAMP.</li>
							<li>عمل import لقاعدة البيانات الخاصة بالمشروع و الموجودة في الملف localhost.sql في مجلّد database بعد فك ضغط المشروع.</li>
							<li>تغيير إعدادات الاتصال بقاعدة البيانات في الملف application\config\database.php في الأسطر 51 و 52 و 53 و 54.</li>
							<li>نسخ المجلّد faraheedy إلى مسار الـ www في سيرفر wamp.</li>
							<li>البدء بالعمل.</li>
						</ol>
					</p>
					
					
					<h2>بنية الملفات البرمجية</h2>
					<p>الفراهيدي مكتوب بالاعتماد على إطار عمل Codeigniter مفتوح المصدر و لذا فإنّ معظم الملفات الموجودة في الشيفرة المصدريّة قد تبدو غريبة و كثيرة لمن لا يعرف CodeIgniter و لتلافي حصول هذا اللبس سأسرد هنا قائمة بأهمّ الملفات البرمجيّة الخاصة بالفراهيدي.
						<ol>
							<li>application/models/core.php (كلاس التقطيع الوزنيّ).</li>
							<li>application/models/du2alee.php (كلاس التشكيل التلقائي).</li>
							<li>application/controllers/*.php (كلاسات المتحكّمات الخاصة بالمشروع) - من لم تتّضح له الفكرة فالأفضل أن يقرأ عن مفهوم MVC.</li>
							<li>application/views/*.php (صفحات الـ HTML التي تمثّل واجهة استخدام المشروع) - من لم تتّضح له الفكرة فالأفضل أن يقرأ عن مفهوم MVC.</li>
							<li>assets/js/mezanjs.js - جافا سكربت ميزان القصيدة.</li>
							<li>assets/js/wizardjs.js - جافا سكربت معالج كتابة قصيدة.</li>
						</ol>
					</p>
					
					
					<h2>تحميل شيفرة الفراهيدي</h2>
					<center>
						<table>
							<tr>
								<td>الشيفرة المصدرية</td>
								<td>أطروحة الماجستير</td>
							</tr>
							<tr>
								<td><a href="<?php echo base_url("assets/developers/code/"); ?>/faraheedy_sc.zip"><img src="<?php echo base_url("assets/img/download.png"); ?>"/><br/>&nbsp;</a></td>
								<td><a href="<?php echo base_url("assets/mukhtar_books/"); ?>/master_thesis.zip"><img src="<?php echo base_url("assets/img/download.png"); ?>"/><br/>&nbsp;</a></td>
							</tr>
						</table>
					</center>
					
					
					<div style="clear:both;"></div>				

	        	</div>
	        	
	      
				
				
		
		
			</div>
			<!-- ENDS content -->
			
			
			<script type="text/javascript">
		
			
			</script>
			
			
			<?php include('inc/foot.php'); ?>