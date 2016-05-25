<!doctype html>
<html class="no-js">

	<head>
		
		<title>الفراهيدي - مشروع حوسبة عروض الشعر العربي على الويب - حقوق الملكيَّة الفكريَّة</title>
		
		
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
			<?php include( dirname(dirname(__FILE__)) .'/views/inc/social.php'); ?>	
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
	        	<h1 class="home-block-heading">مشروع الفراهيدي - حقوق الملكيَّة الفكريَّة</h1>
				
				<div class="pageContentFixed">
					
					<ul>
						<li><p>البرمجة و التصميم : <a href="<?php echo base_url('info/mukhtar'); ?>">م.مختار سيّد صالح</a><br/><small style="font-size:18px;padding-right:140px;">ملحوظة : تصميم الموقع مبنى بالاعتماد على تصميم Modus المجَّانيِّ للُمصَمِّمِ <a href="http://www.luiszuno.com" target="_black"> Luis Zuno.</a></small></p></li>
						<li><p>أداء الأناشيد : المنشد الأستاذ أحمد رباح.<br/><small style="font-size:18px;padding-right:140px;">ملحوظة : الأبيات التي أنشدها الأستاذ أحمد رباح في القسم النظريّ من الموقع هي أبيات شهيرة من قصائد معروفة لشعراء كبار يعتبر نتاجهم الشِّعريِّ جزءاً من التراث الأدبيّ العربيّ و لأنّ "المعروف لا يُعرَّفُ" كما يُقال من جهة أولى و بسبب كثرة عدد الأبيات من جهةٍ أخرى رأينا عدم ذكر أسماء شعرائها.</small></p></li>
						<li><p>المَراجِعُ النَّظريَّةُ :</p>
							<ul>
								<li>الوافي في العروض و القوافي - الخطيب التبريزي.</li>
								<li>القسطاس في علم العروض - الزَّمخشريّ.</li>
								<li>علم العروض و محاولات التجديد - د.محمد توفيق أبو علي – طبعة بيروت 1982م.</li>
								<li>فنّ التقطيعِ الشِّعري و القافية - د.صفاء خلّوصي - طبعة بغداد 1962م.</li>
							</ul>
						</li>
						<br/>
						<li><p>شعراء أبيات و قصائد التجربة في ميزان القصيدة :</p>
							<ul>
								<li>محمود درويش - فلسطين.</li>
								<li>أمل دنقل - مصر.</li>
								<li>نزار قبّاني - سوريا.</li>
								<li>عمر أبو ريشة - سوريا.</li>
								<li>أحمد شوقي - مصر.</li>
								<li>بشارة الخوري (الأخطل الصغير) - لبنان.</li>
								<li>بدر شاكر السياب - العراق.</li>
								<li>محمّد مهدي الجواهري - العراق.</li>
								<li>عبدالرزاق عبدالواحد - العراق.</li>
								<li>عمر عنّاز - العراق.</li>
								<li>هزبر محمود - العراق.</li>
								<li>محمود الدليمي - العراق.</li>
								<li>محمد عبدالباري - السودان.</li>
								<li>مختار سيد صالح - سوريا.</li>
								<li><b>ملحوظة : هناك أبيات أيضاً لمجموعة من كبار شعراء العربية ممن لا حاجة لذكر أسمائهم كالمتنبي و امرئ القيس و غيرهما من الخناديد.</b></li>
							</ul>
						</li>
						
						<li>الترخيص: <p>
							<span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">مشروع الفراهيدي</span> لـ  <a xmlns:cc="http://creativecommons.org/ns#" href="mailto:mokhtar_ss@hotmail.com" property="cc:attributionName" rel="cc:attributionURL">م.مختار سيّد صالح</a> مرخّص تحت <a rel="license" target="_blank" href="http://creativecommons.org/licenses/by-nc-sa/4.0/deed.ar">رخصة المشاع الإبداعي العالميّة في إصدارها الرابع</a> وفق القواعد التالية :
							<ul>
								<li>يسمح بالاستفادة من هذا المشروع أو أي جزء منه بأيّ شكلٍ من الأشكال شرط الإشارة صراحةً لاسم مؤّلفه الأصليّ "م.مختار سيّد صالح" في العمل الجديد المستفيد و هذا لا يعني بالضرورة تأييد مالك العمل الأصلي للعمل الجديد بأي شكل من الأشكال.</li>
								<li>يجب أن تكون الاستفادة من هذا المشروع أو أي جزء منه استفادة غير ربحيّة.</li>
								<li>يجب أن يخضع أيّ عمل جديد يستفيد من هذا المشروع أو من أيّ جزء منه لرخصة المشاع الإبداعيّ ذاتها و بنفس الشروط الأصليّة لرخصته.</li>
							</ul>
						</p></li>
					</ul>
					<br/><br/>
	        	</div>
	        	
	      
				
				
			
			</div>
			<!-- ENDS content -->
			
			
			<?php include( dirname(dirname(__FILE__)) .'/views/inc/foot.php'); ?>	