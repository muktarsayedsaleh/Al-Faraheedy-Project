<!doctype html>
<html class="no-js">

	<head>
		
		<title>الفراهيدي - معالج كتابة قصيدة</title>
		
		<?php include( dirname(dirname(__FILE__)) .'/inc/head.php'); ?>	
		


		<!-- mobile-nav -->
		<div id="mobile-nav-holder">
			<div class="wrapper">
				<ul id="mobile-nav">
					<li ><a href="<?php echo base_url('mezan'); ?>">ميزان القصيدة</a></li>
					<li class="current-menu-item"><a href="<?php echo base_url('wizard'); ?>">معالج كتابة قصيدة موزونة</a></li>
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
						<li ><a href="<?php echo base_url('mezan'); ?>">ميزان القصيدة<span class="subheader">التقطيع العروضي الآلي</span></a>
						<li class="current-menu-item"><a href="<?php echo base_url('wizard'); ?>">معالج كتابة قصيدة<span class="subheader">اكتب قصيدتك الموزونة</span></a></li>
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
							<li><a href="#tabs-1">إعدادات المعالج</a></li>
						</ul>
						<div style="text-align:center;" id="tabs-1">
								
								<div id="settingsDiv">
									<br/>
									<label class="wizardlabel" for="#type">نوع القصيدة :</label>&nbsp;&nbsp;
									<select class="wizardlabel" id="type">
										<option selected="selected" value="a">قصيدة عموديّة</option>
										<option value="t">قصيدة تفعيلة</option>
									</select><br/>
									<span style="clear:both;"></span>
									<label class="wizardlabel" for="#ba7er">البحر المستهدف :</label>&nbsp;&nbsp;
									<select class="wizardlabel" id="ba7er" disabled="disabled">
									</select>
									<br/><br/>
									<a id="saveSettings" class="a-btnIn navigation_button">
										<span class="a-btn-text">احفظ الإعدادات</span> 
									</a>
								</div>
								
								
								<div id="aWritter">
									<div id="poemCountainer">
										<label id="amoodyLabelMain">ضابط البحر المستهدف :</label> <br/>
										<div id="ba7erRule">
										
										</div>
										<hr class="seperator"/>
										<label class="poemTafeelaLabel">البيت الحالي:</label> <br/>
										<input lang="fa" placeholder="صدر البيت" class="shaterInput sader" id="sader1" name="sader1" /> &nbsp;&nbsp;
										<input placeholder="عجز البيت" class="shaterInput ajez" id="ajez1" name="ajez1" /> 
										
										<div style="clear:both;"></div>
										
										<input checked="checked" style="float:right;margin:20px 25px 0 0;" type="checkbox" id="isQawafeeCheck" />
										<label style="font-size:85%;float:right;margin:12px 8px 0 0;" for="isQawafeeCheck">التأكّد من سلامة القافية</label>
										
										<div style="clear:both;"></div>
										<a id="addNewBait" class="a-btnIn navigation_button">
											<span class="a-btn-text">أضف البيت للقصيدة</span> 
										</a>
										
										<div id="amoodyErrors">
											<ul class="wizardErrorLi">
											</ul>
										</div>
										
										<hr class="seperator"/>
										<h2 class="cardTitle">القصيدة</h2>
										<ol id="amoodyGoodBaits">
											القصيدة فارغة !
										</ol>
										<div id="buttonsContainer"></div>
										<div id="timeAmoody" style="text-align:center;font-size:12px;color:red;"></div>
										<div style="clear:both;"></div>
									</div>
								</div>
								
								
								
								
								
								<div id="tWritter">
									<div id="tpoemCountainer">
										<label id="tafeelaLabelMain">التفعيلة المستهدفة :</label> <br/>
										<div id="tafeelaRule">
										
										</div>
										<hr class="seperator"/>
										<label class="poemTafeelaLabel">المقطع الحالي :</label> <br/>
										<textarea placeholder="نصّ القصيدة" rows="2" class="poemTafeelaInput" id="poem" name="poem"></textarea>
										
										<div style="clear:both;"></div>
										<br/>
										<a id="addNewPartToPoem" class="a-btnIn navigation_button">
											<span class="a-btn-text">أضف المقطع للقصيدة</span> 
										</a>
										
										<div id="tafeelaErrors">
											<ul class="wizardErrorLi">
											</ul>
										</div>
										
										<hr class="seperator"/>
										<h2 class="cardTitle">القصيدة</h2>
										<ol id="tafeelaGoodParts">
											القصيدة فارغة !
										</ol>
										<div id="tafeelaButtonsContainer"></div>
										<div id="timeTafeela" style="text-align:center;font-size:12px;color:red;"></div>
										<div style="clear:both;"></div>
									</div>
								</div>
								
							
						</div>
					</div>
					<div style="clear:both;"></div>				
	        	</div>
	        	
	      
				
				
		
		
			</div>
			<!-- ENDS content -->
			<input id="hash" type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>" />
			
			<!-- Wizard js -->
			<script src="<?php echo base_url('assets/js'); ?>/jquery.ui.core.js"></script>
			<script src="<?php echo base_url('assets/js'); ?>/jquery.ui.widget.js"></script>
			<script src="<?php echo base_url('assets/js'); ?>/jquery.ui.mouse.js"></script>
			<script src="<?php echo base_url('assets/js'); ?>/jquery.ui.sortable.js"></script>
			
			
			<script src="<?php echo base_url('assets/js/wizardjs.js'); ?>" type="text/javascript"></script>
			
			
			<?php include( dirname(dirname(__FILE__)) .'/inc/foot.php'); ?>	