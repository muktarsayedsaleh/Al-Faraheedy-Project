<!doctype html>
<html class="no-js">

	<head>
		
		<title>الفراهيدي - مشروع حوسبة عروض و قافية الشعر العربي على الويب - قالوا عن المشروع</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/admin'); ?>/simplePagination.css" />
		<style type="text/css">
			#pager
			{
				margin:10px auto;
			}
		</style>
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

						$('#lastNews').twittieInternal2({
							dateFormat: '%b. %d, %Y',
							template: '<li>{{tweet}} <span class="datetwitter">{{date}}</span></li> ',
							count: 10
						});
		
						
					});
				</script>
	        	<!-- ENDS masthead -->
	        	<br/><br/>
	        	
	        	
	        	<!-- featured -->
	        	<h1 class="home-block-heading">قالوا عن الفراهيدي</h1>
				
				<!-- mukhtar -->
				
				
				<div class="pageContentFixed">
					
					<?php 
						foreach($comments as $c)
						{
							echo '<blockquote class="comment depth-1"><img alt="" src="'.$c["link_of_pic"].'" class="avatar avatar-35 photo" /><div class="comment-author vcard"><a>'.$c["name"].'</a><br/><span class="author-position">('.$c["position"].')</span></div><div class="comment-itself">'.$c["say"].'</div></blockquote>';
						}
					?>
					
					
					<script type="text/javascript">
						
						$(document).ready(function(){
							var cnt = <?php echo $totals[0]['cnt'] ?>;
								
							if(cnt>10)
							{
								$('#pager').pagination({
									items: cnt,
									itemsOnPage: 10,
									cssStyle: 'light-theme',
									currentPage: <?php echo ++$pageID ?>,
									onPageClick: function(pageNumber, event) {
										window.location = "<?php echo base_url('info/says'); ?>/"+pageNumber;
									}
								});
							}
							
							
							
						});
						
						
					</script>
		
					<script type="text/javascript" src="<?php echo base_url('assets/js'); ?>/jquery.simplePagination.js"></script>
					
					<div id="pager">
					</div>
					
					<br/>
					
					
	        	</div>
	        	
	      
				
				
			
			</div>
			<!-- ENDS content -->
			
			
			<?php include('inc/foot.php'); ?>