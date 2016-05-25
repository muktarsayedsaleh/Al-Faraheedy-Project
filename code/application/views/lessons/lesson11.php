<!doctype html>
<html class="no-js">

	<head>
		
		<title>الفراهيدي - العروض نظريَّاً - البَحرُ السَّريعُ</title>
		
	
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
	        	<h1 class="home-block-heading">البحرُ السَّريعُ</h1>
				
				<div class="pageContentFixed lessonsMukhtar">
					
					<h2>ضوابِطُهُ :
						<small class="goToMukhtar">1</small>
					</h2>
					
					<div id="tabs">
						<ul>
							<li><a href="#tabs-1">السَّريعُ التَّامُّ</a></li>
							<li><a href="#tabs-2">مجزوءُ السَّريعِ</a></li>
						</ul>
						<div id="tabs-1">
							<table id="rule1" class="tableMukhtar3">
								
								<tr>
									<td>مُسْتَفْعِلُنْ <small class="showMeAll">جوازاتُها</small>
										<div class="maybeCome">
											مُتَفْعِلُنْ <br/>
											مُسْتَعِلُنْ <br/>
											مُتَعِلُنْ
										</div>
									</td>
									<td>مُسْتَفْعِلُنْ <small class="showMeAll">جوازاتُها</small>
										<div class="maybeCome">
											مُتَفْعِلُنْ <br/>
											مُسْتَعِلُنْ <br/>
											مُتَعِلُنْ
										</div>
									</td>
									<td>فَاْعِلُنْ <small class="showMeAll">جوازاتُها</small>
										<div class="maybeCome">
											فَاْعِلَاْنْ
										</div>
									</td>
								</tr>
							</table>
						</div>
						<div id="tabs-2">
							<table id="rule1" class="tableMukhtar3">
								<tr>
									<td>مُسْتَفْعِلُنْ <small class="showMeAll">جوازاتُها</small>
										<div class="maybeCome">
											مُتَفْعِلُنْ <br/>
											مُسْتَعِلُنْ <br/>
											مُتَعِلُنْ
										</div>
									</td>
									<td>فَاْعِلُنْ <small class="showMeAll">جوازاتُها</small>
										<div class="maybeCome">
											فَاْعِلَاْنْ
										</div>
									</td>
								</tr>
							</table>
						</div>
					</div>
					
					<div style="clear:both;"></div>				
					
					<br/>
					<h2>إيقاعُهُ : <small class="goToMukhtar">2</small></h2>
					<div id="tabs2">
						<ul>
							<li><a href="#tabs2-1">إنشاد</a></li>
						</ul>
						<div id="tabs2-1">
							<audio preload="preload" style="direction:ltr;" controls="controls" > 
								<source src="<?php echo base_url('assets/mp3'); ?>/b-19.mp3" type="audio/mp3" />
								
								
								<object  type="application/x-shockwave-flash" <?php echo base_url('assets/mp3'); ?>/player.swf width="500" height="20"> <param name="movie" value="<?php echo base_url('assets/mp3'); ?>/player.swf" /> 
									<param name="bgcolor" value="#000000" />
									<param name="FlashVars" value="mp3=<?php echo base_url('assets/mp3'); ?>/b-19.mp3&amp;width=500&amp;volume=500&amp;showstop=1&amp;showvolume=1&amp;showloading=always&amp;bgcolor=C99E69"/>
								<p style="direction:rtl;">للأسف يبدو أن مستعرض الويب الذي تستخدمه حالياً لا يدعم تشغيل الملفّات الصوتيَّة , ننصحُكَ باستخدام نسخة حديثة من مستعرض Google Chrome أو مستعرض Mozilla Firefox<br/></p>
								</object>
								
							</audio>
						</div>
					</div>
					
					
					
					
					<br/><br/>
					<a style="clear:both;margin-right:60px;" class="a-btn" href="<?php echo base_url('lessons/lesson10'); ?>">
						<span class="a-btn-text">الدرس السابق</span> 
					</a>
					
					<a class="a-btn" href="<?php echo base_url('lessons'); ?>">
						<span class="a-btn-text">عودة إلى فهرس الدروس النظريَّة</span> 
					</a>
					
					<a class="a-btn" href="<?php echo base_url('lessons/lesson12'); ?>">
						<span class="a-btn-text">الدرس التالي</span> 
					</a>
				
					<div style="clear:both;"></div>
					
					<br/><br/>
					
					
					
					

					
					
					
					<h1 class="home-block-heading"></h1>
					<p id="hamesh1">1- الوافي في العروض و القوافي - الخطيب التبريزي.</p>
					<p id="hamesh2">2- الأداء الغنائي : الأستاذ المنشد أحمد رباح.</p>
					
					
	        	</div>
	        	
	      
				
				
			
			</div>
			<!-- ENDS content -->
			
			
			<script type="text/javascript">
				$(document).ready(function(){
				
					//jawazat
					$('.maybeCome').slideUp();
					
					
					// Tabs
					$('#tabs').tabs();
					$('#tabs2').tabs();
					
					

					$('.showMeAll').click(function(){
						$(this).parent().children('.maybeCome').slideToggle(500);
					});
					
					$('.goToMukhtar').click(function(e){
						var mukhtarSelector="#"+"hamesh"+$(this).html();
						$.scrollTo(mukhtarSelector,300);
						$(mukhtarSelector).animate({'background-color':'rgb(255,255,158)'},100).animate({'background-color':'rgb(245, 245, 245)'},4000);
					});
				});
			</script>
			
			
			<?php include( dirname(dirname(__FILE__)) .'/inc/foot.php'); ?>	