<?php
header("Content-type:text/html");
header("Content-Disposition:attachment;filename=results.html");

?>
<!doctype html>
<html class="no-js">

	<head>
		<meta charset="utf-8"/>
		<title>مشروع الفراهيدي - النتائج</title>
		<link rel="stylesheet" media="all" href="<?php echo base_url('assets'); ?>/css/printer2.css"/>
		<link rel="stylesheet" media="all" href="<?php echo base_url('assets'); ?>/css/printer.css"/>
	</head>
	
	
	<body>
		
		<hr/>

		<?php echo $html; ?>

		<center><h6><hr style="width:60%;"/>مشروع الفراهيدي (مشروع حوسبة عروض و قافية الشعر العربي)<br/>www.faraheedy.com</h6></center>
	</body>
</html>