<!doctype html>
<html class="no-js">

	<head>
		
		<title>الفراهيدي - العروض نظريَّاً - مقدِّمة في علم العَروض</title>
		
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
	        	<h1 class="home-block-heading">مقدِّمة في علم العَروض</h1>
				
				<div class="pageContentFixed lessonsMukhtar">
					<h2>قبل البدء :</h2>
					<p>
					لست هنا بصدد شرح علم العروض بالتَّفصيل بقدر ما أحاول التذكير بمعلومات نظريّة سريعة ستفيدنا في مشوارنا في هذا النظام البرمجيِّ و لأنَّ الهدف هو الاستفادة من هذه الأفكار في مشروع "حوسبة عروض الشِّعر" فلن أتطرّق لكلِّ المصطلحات العروضيَّة (الكثيرة جدَّاً) و إنَّما سأكتفي بما يفيدنا و يلزمنا لاستخدام هذه البرمجيّة.
					</p>
					
					
					
					
					
					
					<h2>تعريف :</h2>
					<p>
					(( علم العروض : علمٌ يُعرف به وزن الشِّعر العربي حسب الرّؤية الخليليّة , مؤسّس هذا العلم : الخليل بن أحمد بن تميم الفراهيدي الأزدي  ; وضع الخليل علم العروض و حصر أبحره فكانت خمسة عشر بحراً و كان هدفه إيجاد طريقة لحفظ الشِّعر العربي في مواجهة الاختلال الذي أخذ يطرأ على الأوزان مع دخول عناصر غير عربيّة في الدولة يومذاك . و بعد الخليل استدرك تلميذه الأخفش الأوسط بحراً سمّاه المتدارك))
					<small class="goToMukhtar">1</small>
					, سُمِّيَ هذا العلم بعلم العَروض ((لأن الشِّعر يعرض عليه))
					<small class="goToMukhtar">2</small>
					 و ((اعلم أنَّ العروض ميزان الشِّعر , بها يُعرف صحيحه من مكسوره))
					 <small class="goToMukhtar">3</small>
					 .
					</p>

					
					<h2>التفعيلات :</h2>
					<p>
					و يعتمد هذا العلم حسب رؤية الخليل على مبدأ بسيط هو أنَّ البيت الشِّعري مكوّن من أحرف منها ما هو متحرّك (مضموم أو مفتوح أو مكسور) و منها ما هو ساكن (غير متحرِّك !) , و يعتمد الخليل في معرفة الوزن الشِّعري على المنطوق و ليس على المكتوب
					<small class="goToMukhtar">4</small>
					 فيرمز للسَّاكن بدائرة صغيرة 0 و للمتحرّك بخط مائل /
					</p>
					<p>
						يعتمد العروض كلُّه على ثمان وحدات أساسيّة سمّاها الخليل (تفاعيل) أو (تفعيلات) هذه الوحدات مبنيّة من تتابع معيّن للحركات و السّكونات فمثلاً إن جاء التتابع التالي (متحرك + متحرك + ساكن + متحرك + ساكن) الذي يماثل الرموز  //0/ 0 , إن جاء هذا التتابع بالذّات فنحن أمام الوحدة (التفعيلة) "فَعُوْلُنْ" و هي إحدى التفعيلات الثمان الأساسيّة التي بني عليها علم العروض.
					</p>
					
					
					

					
					
					
					<p>
					بما أنَّ "فعولن" مكوّنة من خمسة حروف فقد اصطلح على تسميتها تفعيلة "خُمَاسِيَّة" و هناك تفعيلة خماسيَّة مثلها هي "فَاْعِلُنْ" أمَّا باقي التفعيلات فهي "سُبَاعيَّة" (مكوّنة من سبعة أحرف). 
					</p>
					<p>
						يبيّن الجدول التالي التفعيلات الأساسيّة و ما يقابلها من رموز و حركات :
					</p>
					
					<table class="tableMukhtar">
						
						<tr>
							<th>التفعيلة</th>
							<th>رمزها</th>
							<th>تُكافِئ</th>
						</tr>
						<tr>
							<td>فَعُوْلُنْ</td>
							<td>//0/0</td>
							<td>متحرك + متحرك + ساكن + متحرك + ساكن</td>
						</tr>
						<tr>
							<td>فَاْعِلُنْ</td>
							<td>/0//0</td>
							<td>متحرك + ساكن + متحرّك + متحرك + ساكن</td>
						</tr>
						<tr>
							<td>مُسْتَفْعِلُنْ</td>
							<td>/0/0//0</td>
							<td>متحرك + ساكن + متحرك + ساكن + متحرّك + متحرك + ساكن</td>
						</tr>
						<tr>
							<td>مُتَفَاْعِلُنْ</td>
							<td>///0//0</td>
							<td>متحرك + متحرك + متحرك + ساكن + متحرك + متحرك + ساكن</td>
						</tr>
						<tr>
							<td>مُفَاْعِلَتُنْ</td>
							<td>//0///0</td>
							<td>متحرك + متحرك + ساكن + متحرك + متحرك + متحرك + ساكن</td>
						</tr>
						<tr>
							<td>مَفَاْعَيْلُنْ</td>
							<td>//0/0/0</td>
							<td>متحرك + متحرك + ساكن + متحرك + ساكن + متحرك + ساكن</td>
						</tr>
						<tr>
							<td>فَاْعِلَاْتُنْ</td>
							<td>/0//0/0</td>
							<td>متحرك + ساكن + متحرك + متحرك + ساكن + متحرك + ساكن</td>
						</tr>
						<tr>
							<td>مَفْعُوْلَاْتُ</td>
							<td>/0/0/0/</td>
							<td>متحرك + ساكن + متحرك + ساكن + متحرك + ساكن + متحرك</td>
						</tr>
						
					</table>
					
					<br/><br/>
					
					
					<a style="clear:both;margin-right:160px;" class="a-btn" href="<?php echo base_url('lessons'); ?>">
						<span class="a-btn-text">عودة إلى فهرس الدروس النظريَّة</span> 
					</a>
					
					<a class="a-btn" href="<?php echo base_url('lessons/lesson2'); ?>">
						<span class="a-btn-text">الدرس التالي</span> 
					</a>
					
					<div style="clear:both;"></div>
					
					<br/><br/>
					<h1 class="home-block-heading"></h1>
					<p id="hamesh1">1- ص19 (علم العروض و محاولات التجديد لـ د.محمد توفيق أبو علي – الطبعة الثانية – دار النفائس).</p>
					<p id="hamesh2">2- لسان العرب لابن منظور.</p>
					<p id="hamesh3">3- ص29 (الوافي في العروض و القوافي للخطيب التبريزي – دار الفكر – طبعة 2002).</p>
					<p id="hamesh4">4- المقصود بالمنطوق ما يُلفظ , مثلاً "هاذا" هي ما يُلفظ عند قراءة "هذا" و "هاكذا" هي ما يُلفظ عند قراءة "هكذا" و "جميلُنْ" هو ما يلفظ عند قراءة "جميلٌ" و "أَدْدَوَاء" هو ما يلفظ عند قراءة "الدَّواء" .. و هكذا.</p>
					
					
					
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