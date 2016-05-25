<!doctype html>
<html class="no-js">

	<head>
		
		<title>الفراهيدي - دليل الاستخدام</title>
		
		<style type="text/css">
			.video-container {
			    position: relative;
			    padding-bottom: 56.25%;
			    padding-top: 30px; height: 0; overflow: hidden;
			}
			 
			.video-container iframe,
			.video-container object,
			.video-container embed {
			    position: absolute;
			    top: 0;
			    left: 0;
			    width: 100%;
			    height: 100%;
			}
		</style>

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
	        	<h1 class="home-block-heading">دليل الاستخدام</h1>
				
				<div class="pageContentFixed lessonsMukhtar">
					
					<ol id="index">
						<li><a class="navigator" href="#part1">أوّلاً - ميزان القصيدة</a>
							<ul>
								<li><a class="navigator" href="#mezanTitle">ميزان القصيدة العمودية</a></li>
								<li><a class="navigator" href="#inputMethod">تعليمات إدخال الأشطر الشعريّة</a></li>
								<li><a class="navigator" href="#ammodyPoem">التشريح الوزني للقصيدة العموديّة</a></li>
								<li><a class="navigator" href="#saveResults">الاحتفاظ بالنتائج</a></li>
								<li><a class="navigator" href="#analysisOfQageah">تحليل القافية</a></li>
								<li><a class="navigator" href="#freePoem">ميزان قصيدة التفعيلة</a></li>
								<li><a class="navigator" href="#freePoemResults">نتائج تحليل قصيدة تفعيلة</a></li>
								<li><a class="navigator" href="#freePoemErrs">الأخطاء الوزنيّة في قصيدة التفعيلة</a></li>
								<li><a class="navigator redText" href="#mezanVid">نموذج لاستخدام الميزان (فيديو)</a></li>
							</ul>
						</li>
						<li><a class="navigator" href="#part2">ثانياً - معالج كتابة قصيدة</a>
							<ul>
								<li><a class="navigator" href="#wizardSettings">إعداد المعالج</a></li>
								<li><a class="navigator" href="#wizardAmoody">معالج كتابة القصيدة العمودية</a></li>
								<li><a class="navigator" href="#wizardAmoodyErrors">تصحيح أخطاء القصيدة العمودية بمساعدة معالج الكتابة</a></li>
								<li><a class="navigator" href="#saveResults2">الاحتفاظ بالنتائج</a></li>
								<li><a class="navigator" href="#wizardTafeela">معالج كتابة قصيدة تفعيلة</a></li>
								<li><a class="navigator redText" href="#wizardVid">نموذج فيديو لاستخدام المعالج</a></li>
							</ul>
						</li>
						
					</ol>
				
					
					<br/><br/>
					<h2 id="part1">أوَّلاً - ميزان القصيدة:</h2>
					<p> يساعدُ <b>ميزانُ القصيدةِ</b> الدَّارسَ على القيامِ بتشريحِ أيِّ نصٍّ شعريٍّ تشريحاً عروضيَّاً و على تحديدِ تفعيلاتِ كُلِّ بيتٍ على حِدَةٍ بشكلٍ تفصيليٍّ , كما يساعد الدَّارس في تحليل قوافي القصيدة و معرفة كل الأخطاء الشائعة التي قد يرتكبها الشعراء الشباب في قوافي بعض الأبيات مثل أخطاء سناد الردف و سناد التأسيس ... إلخ.</p>
					  <img alt="طريقة إدخال الأبيات في ميزان القصيدة العمودية" class="helpcenter" src="<?php echo base_url('assets'); ?>/help_images/mezan1.png">
					<p>يمتلك هذا المعالج القدرة على معالجة نوعي القصيدة (من ناحية التصنيف الشكلي الوزني) و هما القصيدة العموديّة و القصيدة التفعيلّة و الفقرات التالية توضح طريقة استخدامه.</p>
					<br/><p><h3 id="mezanTitle">ميزان القصيدة العموديّة :</h3> يقوم المستخدم بإدخال أشطر أبيات القصيدة شطراً شطراً في مربعات الإدخال المخصصة و ذلك قبل أن يطلب من البرنامج أيّ أمرٍ من أوامره مع الالتزام بمايلي:</p>
					<p><h4 id="inputMethod">تعليمات إدخال الأشطر الشعرية :</h4>يجب مراعاة مايلي عند تقديم المدخلات للفراهيدي : <br/>
						<ul class="helpright">
							<li>لا يتطلب الفراهيدي ضبط كامل البيت بالشّكل و إنّما ما يجب ضبطه بالشّكل هو الآتي:
								<ol>
									<li>الحرف السّاكن.</li>
									<li>الحرف المنوّن.</li>
									<li>الحرف المشدّد.</li>
									<li>الهاء و الميم في أواخر الكلمات المنتهية بهاء أو ميم.</li>
									<li>آخر حرف في نهاية كل شطر.  <img alt="شطر شعري مدخل بشكل سليم" class="helpcenter" src="<?php echo base_url('assets'); ?>/help_images/mezan3.png"></li>
									<li>في حال الرغبة باستخدام خاصية تحليل القوافي يجب ضبط <u>آخر ستَّة حروف من البيت بشكل كامل</u> كما يتّضح في الصورة أعلاه.</li>
								</ol>
							</li>
							<li>لضبط الحرف بالشكل يتمّ كتابة الحرف أوّلاً ثمّ كتابة الحركة بعده مباشرةً دون أيّ فواصل.</li>
							<li>يجب ترك مسافة بين واو العطف و الكلمة التي تليها.</li>
							<li>إذا لم يتم وضع حركة السكون في نهاية البيت ذي القافية المقيّدة سيتم اعتباره بيتاً ذا قافية مطلقة.</li>
							<li>يمكن تجاهل وضع حركة السكون على الألف الطويلة (ا) و الألف المقصورة (ى).</li>
							<li>يمكن تجاهل وضع حركة الشدّة على الحرف الذي يلي اللام الشمسيّة مباشرةً , مثال : حرف الدال في كلمة "الدّهر".  <img alt="أزرار المساعدة في إدخال الأشطر الشعريّة" class="helpcenter" src="<?php echo base_url('assets'); ?>/help_images/mezan2.png"></li>
							<li>لإدخال أكثر من بيت بإمكان المستخدم الضغط على أوامر + و - المعروضة أسفل مربعات الإدخال.</li>
							<li>لاستذكار تعليمات الإدخال هذه في نفس واجهة الميزان يمكن النقر على أمر ؟ الموجود بجوار زرّي الـ + و الـ -.</li>
							<li>لمسح جميع المدخلات و العودة بالنموذج إلى حالته الأولى يمكنك ضغط أمر "مسح الأبيات" في أي وقت.</li>
							<li>يمكن أن يضغط المستخدم الجديد للبرمجية على أمر "بيت للتجربة" و ذلك لرؤية مثال عملي على طريقة الإدخال السليمة للأبيات.</li>
							<li><b>ملحوظة هامّة:</b> يمكن الاستعانة بزر "شكّل ليَ الأبيات" ليقوم البرنامج بشكل آليّ بتقديم تشكيل مقترح للأبيات الشعريّة المدخلة و لكن يجب على المستخدم أن يقوم بمراجعة نتائج التشكيل الآليّ و تصحيح الأخطاء التي قد تحدث في عمليّة التشكيل.</li>
						</ul>
						
					</p>
					<div style="clear:both;"><br/><br/></div>
					<p><h4 id="ammodyPoem">التشريح الوزني للقصيدة العموديّة :</h4> بعد إدخال الأبيات الشعريّة المطلوبة نستطيع البدء في تشريحها عروضيّاً من خلال الضغط على أمر "شرّح الأبيات عروضيّاً" , كما نستطيع تحليل قوافي القصيدة من خلال الضغط على أمر "حلّل قوافي الأبيات". <img alt="نتائج التشريح الوزني للنص" class="helpcenter" src="<?php echo base_url('assets'); ?>/help_images/mezan4.png"><br/><img alt="النتائج التفصيلية للتشريح الوزني" class="helpcenter" src="<?php echo base_url('assets'); ?>/help_images/mezan5.png"> في حالة اختيار أمر تشريح القصيدة عروضيّاً فستظهر النتائج بشكل مشابه للصورة أعلاه بعد انتظارنا لفترة وجيزة يجري خلالها تشريح الأبيات وزنيّاً, و يمكن عرض تفاصيل أوفى عن بنية الشطر الوزنيّة بالضغط على زر المكبّرة <img src="<?php echo base_url('assets'); ?>/img/zoom_in.png" style="margin-bottom:-10px;width:40px;height:35px;"> الظاهر أسفل اسم البحر الذي ينتمي إليه الشطر الشعري.</p>
					<div style="clear:both;"><br/></div>
					<p><h4 id="saveResults">الاحتفاظ بالنتائج :</h4>يمكننا بالطبع في أي وقت طباعة القصيدة و نتائج تشريحها وزنيّاً بالضغط على زر الطباعة الظاهر أسفل النتيجة , كما يمكننا الاحتفاظ بصفحة تضم القصيدة و تشريحها الوزني بالضغط على زر الحفظ الظاهر جوار زر الطباعة أيضاً.</p>
					<div style="clear:both;"><br/></div>
					<p><h4 id="analysisOfQageah">تحليل قافية قصيدة :</h4> <img alt="نتائج تشريح القافية" class="helpleft" src="<?php echo base_url('assets'); ?>/help_images/mezan6.png"> بعد إدخال أبيات القصيدة العموديّة يمكننا تحليل قوافي القصيدة بالضغط على أمر حلل قوافي الأبيات , حيث سيقوم النظام بتحليل قافية البيت الأول و اعتباره قافية القصيدة الأساسيّة و من ثمّ مقارنة قوافي بقيّة الأبيات معه و عرض العيوب التي قد يقع بها الشاعر في أبياته المختلفة التي تلي البيت الأوّل , و في الصورة المعروضة جانباً تعمّدت إدخال بيتٍ ثانٍ بعد بيت المتنبّي بقافية بها عيب لعرض نموذج من العيوب التي يستطيع النظام تحليلها.</p>
					<p>بإمكان المستخدم في أي وقت النقر على اسم أحد أحرف القافية لاستذكار القاعدة النظرية التي حددت موقع الحرف في القافية. <img alt="تفصيل نظري لحرف القافية" class="helpcenter" src="<?php echo base_url('assets'); ?>/help_images/mezan7.png"> </p>
					<p>كما يمكنه العودة إلى عجز البيت معيب القافية و تصحيحه بشكل سريع من خلال النقر على شرح العيب الذي وقع في قافية ذلك البيت.</p>
					<p>و يستطيع المستخدم الاحتفاظ بأبيات قصيدته و نتائج تحليل قوافيها من خلال أمري الطباعة و الحفظ الذين سبق ذكرهما.</p>

					
					
					<div style="clear:both;"><br/><br/></div>
					<p><h3 id="freePoem">ميزان قصيدة التفعيلة :</h3><img alt="ميزان قصيدة التفعيلة" class="helpcenter" src="<?php echo base_url('assets'); ?>/help_images/mezan8.png"> يتم الانتقال إلى ميزان قصيدة التفعيلة بالنقر على تبويب "قصيدة التفعيلة" في صفحة "ميزان القصيدة" , بعد ذلك و لتشريح قصيدة تفعيلة وزنيّاً يقوم المستخدم بإدخال نصّ القصيدة ملتزماً بقواعد الإدخال التي سبق ذكرها و من ثمّ يختار أمر "شرّح النصّ عروضيَّاً".</p>
					<br/><br/><p><h4 id="freePoemResults">نتائج تحليل قصيدة تفعيلة :</h4><img alt="نتائج قصيدة تفعيلة" class="helpcenter" src="<?php echo base_url('assets'); ?>/help_images/mezan9.png">ستظهر نتائج تحليل قصيدة التفعيلة وزنيّاً على شكل قسمين , القسم الأوّل هو اسم البحر الشعري الذي تنتمي إليه القصيدة , و القسم الثاني يعرض تفعيلات القصيدة واحدةً واحدةً مع عرض جزء النص المدخل الذي حددته هذه التفعيلة.</p>
					<br/><p><h4 id="freePoemErrs">الأخطاء الوزنيّة في قصيدة التفعيلة:</h4><img alt="أخطاء التفعيلة" class="helpcenter" src="<?php echo base_url('assets'); ?>/help_images/mezan10.png">في حال ارتكاب الشاعر لخطأ في إحدى تفعيلات القصيدة ستظهر تلك التفعيلة بلون أحمر مع النص المقابل لها و عندما يضغط المستخدم على ذلك المربع الأحمر سيتم عرض وزن المقطع الخاطئ على شكل رُكَزٍ و خُطَيْطَاتٍ كتلك التي سبق شرحها في القسم النظري و ذلك لإتاحة المجال للشاعر كي يقوم بتصحيح الوزن.</p>
					<div style="clear:both;"></div>
					
					<p><h4 id="mezanVid">نموذج فيديو لاستخدام ميزان القصيدة:</h4>
						
						<div class="video-container">
							<iframe width="640" height="480" src="https://www.youtube.com/embed/bSxzpxEL06w?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
						</div>

						<!-- <video height="450" width="800" src="<?php echo base_url('assets'); ?>/help_images/mezan.mp4" width="320" height="240" controls="controls">
							<p style="direction:rtl;">للأسف يبدو أن مستعرض الويب الذي تستخدمه حالياً لا يدعم تشغيل ملفات الفيديو , ننصحُكَ باستخدام نسخة حديثة من مستعرض Google Chrome أو مستعرض Mozilla Firefox<br/></p>
						</video> -->
					</p>
					
					<div style="clear:both;"></div>
					<br/><br/>
					<h2 id="part2">ثانياً - معالج كتابة قصيدة:</h2>
					<p>يساعدُ <b>معالِجُ كتابةِ القصيدةِ</b> الشَّاعرَ الشَّابَّ على كتابةِ قصيدَتِهِ الشِّعريَّةِ الموزونةِ (بيتاً فبيتاً إن كانتْ عموديَّةً أو مقطعاً مقطعاً إنْ كانتْ تفعيليَّةً) و ذلك باستهدافِ الشَّاعرِ الشَّابِّ بحراً شعريَّاً معيَّناً منَ البدايةِ مما يتيحُ للبرمجيَّةِ مساعدَتَهُ في معرفةِ أماكنِ النجاحِ و أماكنِ الإخفاقِ و تقديمِ النصائحِ بشأنِ الأخيرةِ بسهولةٍ و يسرٍ كَبيرينِ , و هو يستخدم كمايلي :</p>
					<br/><p><h3 id="wizardSettings">إعداد المعالج :</h3>يقوم المستخدم في البداية و قبل استخدام المعالج بتحديد نوع القصيدة التي يرغب بكتابتها و البحر الشعري الذي سيستهدفه , ثمّ يقوم بالضغط على أمر "حفظ الإعدادات".<img alt="إعدادات معالج كتابة قصيدة" class="helpcenter" src="<?php echo base_url('assets'); ?>/help_images/wizard1.png"></p>
					<br/><p><h3 id="wizardAmoody">معالج كتابة قصيدة عموديّة :</h3>يعرض معالج كتابة القصيدة العموديّة ضابط البحر المستهدف في رأس تبويب المعالج و ذلك لتذكير الشاعر الشابّ بضابط البحر الذي يحاول أن يكتب عليه , ثمّ يعرض له مربّعي إدخال لشطري البيت الذي يحاول كتابته.<img alt="معالج كتابة قصيدة عموديّة" class="helpcenter" src="<?php echo base_url('assets'); ?>/help_images/wizard2.png"></p>
					<p>بعد أن يقوم الشاعر بالانتهاء من كتابة شطري البيت الشعري مع الالتزام بتعليمات إدخال الأبيات الشعريّة التي سبق شرحها و يضغط على أمر "أضف البيت للقصيدة" سيقوم المعالج بتشريح البيت وزنيّاً فإن كان كلا شطري البيت صحيحين وزنيّاً سيتم إضافة البيت إلى القصيدة العموديّة على اعتباره البيت الأوّل فيها.<img alt="معالج الكتابة عند كتابة بيت صحيح" class="helpcenter" src="<?php echo base_url('assets'); ?>/help_images/wizard3.png"></p>
					<p><h3 id="wizardAmoodyErrors">تصحيح الأخطاء الوزنيّة :</h3>أمّا في حال وجود أخطاء وزنيّة في البيت فسيقوم المعالج بعرض تحليل تفصيلي لكل شطر من شطري البيت مع تحديد الجزء الصحيح من كل شطر وزنيّاً و اقتراح تعديلات على الأجزاء غير الصحيحة وزنيّاً.<img alt="وجود أخطاء في البيت المدخل لمعالج الكتابة" class="helpcenter" src="<?php echo base_url('assets'); ?>/help_images/wizard4.png"></p>
					<div class="noteMukhtar"><p><span class="redText">ملحوظة هامّة : </span>أحياناً يكون للتفعيلة الواحدة أكثر من صورة فتفعيلة (مستفعلن) الأولى في البحر البسيط مثلاً لها ثلاثة صور هي (مستفعلن) و (متفعلن) و (مستعلن) و لهذا فإنّ معالج كتابة القصيدة العموديّة يعرض اقتراحات لتصحيح النصّ المدخل وزنيّاً بحيث يغطّي احتمالات تطابقه مع كل الصّور و هذا يعني أنّ المستخدم يمكن أن يكتفي بقراءة اقتراحات صورة واحدة فقط و بناء النص عليها إن رغب بذلك تسهيلاً.</p></div>
					<p><h3 id="saveResults2">الاحتفاظ بالنتائج :</h3>بعد النجاح في كتابة بيت واحد أو عدد من الأبيات بشكل صحيح بمساعدة معالج الكتابة يتيح لنا المعالج حفظ القصيدة أو طباعتها من خلال أمرين بسيطين يظهران أسفل مربّع القصيدة , كما يمكننا إعادة ترتيب أبيات القصيدة من خلال السحب و الإفلات بشكل بسيط و فعّال.<img alt="حفظ النتائج" class="helpcenter" src="<?php echo base_url('assets'); ?>/help_images/wizard5.png"></p>
					<br/><p><h3 id="wizardTafeela">معالج كتابة قصيدة تفعيلة :</h3>بالنسبة لمعالج كتابة القصيدة التفعيليّة فهو مشابه بنسبة كبيرة لمعالج كتابة القصيدة العموديّة باستثناء أنّه بُرْمِجَ خصّيصاً لمساعدة الشاعر الشاب في كتابة قصيدته التفعيلية مقطعاً مقطعاً.<img alt="معالج كتابة قصيدة تفعيلة" class="helpcenter" src="<?php echo base_url('assets'); ?>/help_images/wizard6.png"></p>
					
					<div style="clear:both;"></div>
					
					<p><h4 id="wizardVid">نموذج فيديو لاستخدام معالج كتابة القصيدة:</h4>
						<div class="video-container">
							<iframe width="640" height="480" src="https://www.youtube.com/embed/0Cp4pHNQ9HU?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
						</div>
						<!-- <video height="450" width="800" src="<?php echo base_url('assets'); ?>/help_images/wizard.mp4" width="320" height="240" controls="controls">
							<p style="direction:rtl;">للأسف يبدو أن مستعرض الويب الذي تستخدمه حالياً لا يدعم تشغيل ملفات الفيديو , ننصحُكَ باستخدام نسخة حديثة من مستعرض Google Chrome أو مستعرض Mozilla Firefox<br/></p>
						</video> -->
					</p>
					
					
					<div style="clear:both;"></div>
					
					<center>
						<a class="navigator" href="#index">عودة إلى الفهرس</a>
					</center>
					
	        	</div>
	        	
	      
				
				
			
			</div>
			<!-- ENDS content -->
			
		
			<script type="text/javascript">
				$(document).ready(function(){
					
					$('.navigator').click(function(e){
						e.preventDefault();
						var mukhtarSelector=$(this).attr('href');
						$.scrollTo(mukhtarSelector,800);
						$(mukhtarSelector).animate({'background-color':'rgb(255,255,158)'},800).animate({'background-color':'rgb(245, 245, 245)'},1500);
					});
				});
			</script>
			
			
			<?php include( dirname(dirname(__FILE__)) .'/inc/foot.php'); ?>	
