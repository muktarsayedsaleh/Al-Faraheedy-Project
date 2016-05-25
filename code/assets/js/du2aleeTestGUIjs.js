/*
*
*	Automated Arabic Diacritizer Test GUI JavaScripts
*	Mukhtar Sayed Saleh
*	Syria - Damascus
*	17/2/2014 --------------- 17/2/2014
*	mokhtar_ss@hotmail.com	
*
*/

var hash=''; // csrf hash
var trainingInProgress=false;
var statusFunction,usageStatusFuntion;
var sessionID = new Date().getUTCMilliseconds();
$(document).ready(function(){
	
	hash=$('#hash').val();
	
	$('#tabs').tabs();
	
	//training functions begin
	// send ajax post for training method !!
	$('#doTraining').click(function(e){
		e.preventDefault();
		
		var date = new Date();
		var components = [
			date.getYear(),
			date.getMonth(),
			date.getDate(),
			date.getHours(),
			date.getMinutes(),
			date.getSeconds(),
			date.getMilliseconds()
		];
		sessionID = components.join("");
		
		//checks if all inputs are empty
		var input = $('#trainingInput').val();
		if(input=='')
		{
			jError('يرجى إدخال نصّ التدريب المشكول بشكل صحيح يا عزيزي', {HorizontalPosition : 'center',VerticalPosition : 'center'});
			return;
		}
		
		var execTime=-1;
		//send request here
		$('#trainingInput').prop("disabled", true);
		$('#doTraining').hide();
		$('#trainingResult').html("<center><span id=\"stageName\">يرجى الانتظار ...</span><br/><ul id=\"stagesList\"><li stageID=\"1\"><img stageID=\"1\" src=\"../../assets/img/queue.png\"/><span class=\"redText\">&nbsp;&nbsp;المرحلة الأولى : تهيئة النصّ.</span></li><li stageID=\"2\"><img stageID=\"2\" src=\"../../assets/img/queue.png\"/><span class=\"redText\">&nbsp;&nbsp;المرحلة الثانية: التحقق من نتائج التهيئة.</span></li><li stageID=\"3\"><img stageID=\"3\" src=\"../../assets/img/queue.png\"/><span class=\"redText\">&nbsp;&nbsp;المرحلة الثالثة: التدريب الفعليّ.</span></li></ul><br/></center><div class=\"meter\"><span id=\"progress\" style=\"width: 0%\"></span></div>");
		trainingInProgress=true;
		statusFunction = setInterval(function(){
				if(trainingInProgress)
				{
					$.post("../tashkeel/getTrainingStatus",{"session":sessionID,"csrf":hash},function(res2){
						if(res2.status.stageNo == "1")
						{
							$('#trainingResult #stageName').html("المرحلة الأولى : تهيئة النصّ <br/> يرجى الانتظار ...");
						}
						else if(res2.status.stageNo == "2")
						{
							$('#trainingResult #stageName').html("المرحلة الثانية: التحقق من نتائج التهيئة<br/> يرجى الانتظار ...");
						}
						else if(res2.status.stageNo == "3")
						{
							$('#trainingResult #stageName').html("المرحلة الثالثة : التدريب <br/> يرجى الانتظار ...");
						}
						
						
						$('#trainingResult img[stageID="'+res2.status.stageNo+'"]').attr("src","../../assets/img/loading_2.gif");
						$('#trainingResult img[stageID="'+(Number(res2.status.stageNo)-1).toString()+'"]').attr("src","../../assets/img/success.png");
						if(Number(res2.status.stageNo) != 1)
						{
							$('#trainingResult img[stageID="1"]').attr("src","../../assets/img/success.png");
						}
						
						var newWidth=(Number(res2.status.done)/Number(res2.status.total))*100;
						var widthTxt=newWidth.toString()+'%';
						//alert(newWidth.toString()+'%');
						$('#progress').animate({
							width: widthTxt
						}, 1200);
						
					},"json");
				}
				return;
			},5000);
			
		$.post("../tashkeel/doTraining",{"input":input,"session":sessionID,"csrf":hash},function(results){
			trainingInProgress=false;
			clearInterval(statusFunction);
			alertify.success("تمّت عمليّة التدريب بنجاح");
			$('#trainingResult').html("");
			$('#trainingInput').prop("disabled", false);
			$('#doTraining').show();
			$('#training').hide();
			$('#trainingResult').html("<center>شكراً لكَ <br/> لمساهمتك في تطوير خبرة مشروع الدّؤليّ <br/> <span style=\"font-size:18px;\" class=\"redText\">استغرق تنفيذ عملية التدريب زمناً قدره: "+results.time+" ثانية</span><br/><br/><a id=\"doTrainingAgain\" class=\"a-btnIn\"><span class=\"a-btn-text\">أجرِ تدريباً آخر</span> </a></center>");
		},"json");
	});
	
	$('#doTrainingAgain').live('click',function(){
		window.location=window.location;
	});
	//training functions end
	
	
	
	
	
	
	//usage functions begin
	$('#doUsage').click(function(e){
		e.preventDefault();
		
		var date = new Date();
		var components = [
			date.getYear(),
			date.getMonth(),
			date.getDate(),
			date.getHours(),
			date.getMinutes(),
			date.getSeconds(),
			date.getMilliseconds()
		];
		sessionID = components.join("");
		
		//checks if all inputs are empty
		var input = $('#usageInput').val();
		if(input=='')
		{
			jError('يرجى إدخال النصّ غير المشكول', {HorizontalPosition : 'center',VerticalPosition : 'center'});
			return;
		}
		
		//send request here
		$('#usageInput').prop("disabled", true);
		$('#doUsage').hide();
		$('#usageResult').html("<center><span id=\"stageName\">يرجى الانتظار ...</span><br/><ul id=\"stagesList\"><li stageID=\"1\"><img stageID=\"1\" src=\"../../assets/img/queue.png\"/><span class=\"redText\">&nbsp;&nbsp;المرحلة الأولى : تهيئة النصّ.</span></li><li stageID=\"2\"><img stageID=\"2\" src=\"../../assets/img/queue.png\"/><span class=\"redText\">&nbsp;&nbsp;المرحلة الثانية: التحقق من نتائج التهيئة.</span></li><li stageID=\"3\"><img stageID=\"3\" src=\"../../assets/img/queue.png\"/><span class=\"redText\">&nbsp;&nbsp;المرحلة الثالثة: التشكيل التلقائي.</span></li></ul><br/></center><div class=\"meter\"><span id=\"usageProgress\" style=\"width: 0%\"></span></div>");
		trainingInProgress=true;
		usageStatusFuntion = setInterval(function(){
				if(trainingInProgress)
				{
					$.post("../tashkeel/getUsageStatus",{"session":sessionID,"csrf":hash},function(res2){
						if(res2.status.stageNo == "1")
						{
							$('#usageResult #stageName').html("المرحلة الأولى : إعداد النصّ <br/> يرجى الانتظار ...");
						}
						else if(res2.status.stageNo == "2")
						{
							$('#usageResult #stageName').html("المرحلة الثانية: تدقيق نتائج الإعداد <br/> يرجى الانتظار ...");
						}
						else if(res2.status.stageNo == "3")
						{
							$('#usageResult #stageName').html("المرحلة الثالثة : التدريب <br/> يرجى الانتظار ...");
						}
						
						
						$('#usageResult img[stageID="'+res2.status.stageNo+'"]').attr("src","../../assets/img/loading_2.gif");
						$('#usageResult img[stageID="'+(Number(res2.status.stageNo)-1).toString()+'"]').attr("src","../../assets/img/success.png");
						if(Number(res2.status.stageNo) != 1)
						{
							$('#usageResult img[stageID="1"]').attr("src","../../assets/img/success.png");
						}
						
						var newWidth=(Number(res2.status.done)/Number(res2.status.total))*100;
						var widthTxt=newWidth.toString()+'%';
						//alert(newWidth.toString()+'%');
						$('#usageProgress').animate({
							width: widthTxt
						}, 1200);
						
					},"json");
				}
				return;
			},5000);
		
		$.post("../tashkeel/doTashkeel",{"input":input,"session":sessionID,"csrf":hash},function(results){
			trainingInProgress=false;
			clearInterval(usageStatusFuntion);
			alertify.success("تمّت عمليّة التشكيل الآليّ للنصّ المدخل بنجاح");
			$('#usageResult').html("");
			$('#usageInput').prop("disabled", false);
			$('#doUsage').show();
			$('#usageResult').html('<label class="poemTafeelaLabel">النص المشكّل تلقائيّاً:</label><textarea rows="4" class="poemTafeelaInput" id="resultInput" name="resultInput">'+results.result+'</textarea><center><a id="du2aleeGoodResults" class="a-btnIn"><span class="a-btn-text">نجحَ الدّؤليّ بالتشكيل بشكل صحيح</span></a><a id="userCorrectBadResults" class="a-btnIn"><span class="a-btn-text">تصحيح النتائج</span></a></center>');
			$.scrollTo('#usageResult',300);
		},"json");
	});
	
	$('#doTrainingAgain').live('click',function(){
		window.location=window.location;
	});
	//usage funtions end
	
	
	//after usage functions begin
	$('#du2aleeGoodResults').live('click',function(e){
		e.preventDefault();
		var goodResult=$('#resultInput').val();
		if(goodResult!='')
		{
			$('#usageResult').html('<center><img src="../../assets/img/loading.gif"/></center>');
			$('#du2aleeGoodResults').prop("disabled", true);
			$.post('../tashkeel/saveGoodResult',{"goodResult":goodResult,"csrf":hash},function(){
				$('#usage').hide();
				$('#du2aleeGoodResults').prop("disabled", false);
				$('#usageResult').html("<center>شكراً لكَ <br/> لمساهمتك في تطوير خبرة مشروع الدّؤليّ <br/><br/><a id=\"doUsageAgain\" class=\"a-btnIn\"><span class=\"a-btn-text\">أجرِ تجربةً أخرى</span> </a></center>");
			},"json");
		}
		else
		{
			// he is trying to cheat on us 
			// .. so we also will cheat on hin :)
			$('#usage').hide();
			$('#usageResult').html("<center>شكراً لكَ <br/> لمساهمتك في تطوير خبرة مشروع الدّؤليّ <br/><br/><a id=\"doUsageAgain\" class=\"a-btnIn\"><span class=\"a-btn-text\">أجرِ تجربةً أخرى</span> </a></center>");
		}
	});
	
	$('#doUsageAgain').live('click',function(e){
		e.preventDefault();
		
		$('#usage').show();
		$('#usageInput').val("");
		$('#usageResult').html("");
		$('#doUsage').show();
		$('#mainLabel').text("النص غير المشكول: ");
				

	});
	
	
	$('#userCorrectBadResults').live('click',function(e){
		e.preventDefault();
		alertify.confirm("اختيارك لهذا الخيار يعني أنّك ترغب طواعيةً بالمساهمة في تشكيل النصّ بشكل صحيح و من ثمّ تقديمه لمشروع الدؤليّ بغية تحسينه<br/>أليس كذلك ؟", function (e) {
			if (e) {
				var goodResult=$('#resultInput').val();
				$('#doUsage').hide();
				$('#usageInput').val(goodResult);
				$('#usageResult').html('<center><a id="du2aleeGoodResults" class="a-btnIn"><span class="a-btn-text">إرسال التصحيح</span></a></center>');
				$('#mainLabel').text("النصّ المشكول يدويّاً بشكل صحيح: ");
				$.scrollTo('#usageInput',300);
			}
		});
		
		
	});
	//after usage functions end
	
	
	
	
	
	
	// prevent non Arabic characters from being accepted as input begin !!
	$('.poemTafeelaInput').keypress(function(event){
		var ew = event.which;
		if(ew == 0) // ctrl+f5
			return true;
		if(ew == 97) // ctrl+a
			return true;
		if(ew == 99) // ctrl+c
			return true;
		if(ew == 118) // ctrl+v
			return true;
		if(ew == 122) // ctrl+z
			return true;
		if(ew == 8) // back delete.
			return true;
		if(ew == 13) // Enter.
			return true;
		if(32 <= ew && ew <= 60) // punctuations
			return true;
		if(1500 <= ew && ew <= 1620) // arabic characters
			return true;
		//jError(ew);
		jError('يرجى إدخال المحارف العربية فقط !!', {HorizontalPosition : 'center',VerticalPosition : 'center'});
		return false;
	});
	// prevent non Arabic characters from being accepted as input end !!

});