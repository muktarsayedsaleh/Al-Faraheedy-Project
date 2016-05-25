/*
*
*	Poetry Writter Wizard JavaScripts
*	Mukhtar Sayed Saleh
*	Syria - Al_Bokamal
*	8/10/2013 --------------- 17/10/2013
*	mokhtar_ss@hotmail.com	
*
*/
var t; // نوع القصيدة
var b; // البحر
var bn; // اسم البحر بالعربية
var bait=0; //عدد الأبيات الصحيحة
var parts=0; //عدد المقاطع الصحيحة
var hash; // csrf hash
$(document).ready(function(){
	
	hash=$('#hash').val();
	
	// initializing form //
	$('#tWritter').hide();
	
	$('#aWritter').hide();
	
	$('#tabs').tabs();
	
	// initializing form end //
	
	
	
	
	// settings Div Js begin //
	$('#type').change(function(){
		var t= $(this).val();
		$('#resultsContainter').html('<center><img src="assets/img/loading.gif"/></center>');
		$('#type').prop("disabled", true);
		$('#saveSettings').hide();
		$.post("wizard/getBo7or",{"t":t,"csrf":hash},function(d){
			if(typeof d.err != 'undefined')
			{
				jError(d.err, {HorizontalPosition : 'center',VerticalPosition : 'center'});
				return;	
			}
			var s='';
			for(var i in d)
			{
				s+='<option value="'+i+'">'+d[i]+'</option>';
			}
			$('#ba7er').html(s);
			$('#resultsContainter').html('');
			$('#type').prop("disabled", false);
			$('#ba7er').prop("disabled", false);
			$('#saveSettings').show();
		},"json");
	});
	
	$('#saveSettings').click(function(){
		t=$('#type').val();
		b=$('#ba7er').val();
		bn=$("option[value='"+b+"']").html();
		alertify.success("تم حفظ الإعدادات بنجاح");
		$('#resultsContainter').html('<center><img src="assets/img/loading.gif"/></center>');
		$('#type').prop("disabled", true);
		$('#ba7er').prop("disabled", true);
		$('#saveSettings').hide();
		
		$('#settingsDiv').fadeOut(600,function(){
			if(t=='t')
			{
				$('a[href="#tabs-1"]').html('معالج كتابة قصيدة تفعيلة');
				$('#aWritter').hide();
				$('#tafeelaRule').load('wizard/getRule',{"b":b,"t":t,"csrf":hash},function(){
					//jawazat
					$('#tWritter').fadeIn(300,function(){
						$('.maybeCome').slideUp();
					});
					$('.showMeAll').click(function(){
						$(this).parent().children('.maybeCome').slideToggle(500);
					});
				});
			}
			else if(t=='a')
			{
				$('a[href="#tabs-1"]').html('معالج كتابة قصيدة عموديّة');
				$('#tWritter').hide();
				$('#amoodyLabelMain').html('البحر المستهدف : '+bn+'  <br/>');
				$('#ba7erRule').load('wizard/getRule',{"b":b,"t":t,"csrf":hash},function(){
					//jawazat
					$('#aWritter').fadeIn(300,function(){
						$('.maybeCome').slideUp();
					});
					$('.showMeAll').click(function(){
						$(this).parent().children('.maybeCome').slideToggle(500);
					});
				});
			}
		});
	});
	
	$('#type').trigger('change');
	// settings Div Js End //
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	// Amoody Poem Begin //
	$('#addNewBait').click(function(){
		$('#amoodyErrors ul').html('');
		var sader=$('#sader1').val();
		var ajez=$('#ajez1').val();
		var checkQafeah=$('#isQawafeeCheck').is(':checked');
		if(sader=='' || ajez=='')
		{
			jError('يرجى إدخال صدر البيت و عجزه قبل المتابعة', {HorizontalPosition : 'center',VerticalPosition : 'center'});
			return;
		}
		if(sader.length<5 || ajez.length<5)
		{
			jError('يجب ألا يقول طول كل شطر عن خمسة أحرف !!', {HorizontalPosition : 'center',VerticalPosition : 'center'});
			return;
		}
		$.post("wizard/amoodyWizard",{"t":t,"b":b,"n":bait,"sader":sader,"ajez":ajez,'q':checkQafeah,"csrf":hash},function(d){
			if(typeof d.status != 'undefined')
			{
				if(d.status=='qafeahError')
				{
					var tables='<ol>';;
					for(var indexQ in d.errors)
					{
						tables+='<li class="redText">'+d.errors[indexQ]+'</il>';
					}
					tables+='</ol>';
					var str='<li><span class="redText">البيت سليم وزنيّاً و لكن هناك أخطاء في القافية كمايلي :<br/></span>'+tables+'</li>';
					$('#amoodyErrors ul').html(str);
					$.scrollTo('#amoodyErrors ul',500);
					$('#amoodyErrors li').height('1%').css('background','#f00').slideDown().animate({'background-color':'#FBE3E4;'},1500).animate({'background-color':'#eee;'},500);
					var execTime=d.time;
					$('#timeAmoody').html('<br/> زمن تنفيذ الطلب :'+execTime+' ثانية');
					return;
				}
				if(d.status=='ok')
				{
					//add bait effects
					bait++;
					if(bait==1)
					{
						$('#amoodyGoodBaits').html('');
					}
					var str='<li class="goodBait" id="bait'+bait+'"><span id="deleteBait"><img alt="حذف البيت" class="commandPic2 delpic" style="margin-top:8px;" src="assets/img/delete_icon.png" /></span>'+sader+' = '+ajez+'</li>';
					$('#amoodyGoodBaits').append(str);
					
					$('#sader1').val('');
					$('#ajez1').val('');
					$('#sader1').focus();
					alertify.success("لقد قمت بكتابية بيت سليم وزنيَّاً ... مبارك مبارك !!");
					
					
					str='<div id="commandsAmoodyAll"><center><br/>';
					str+='<a href="#" id="printCmd"><img class="commandPic2" src="assets/img/printer32.png" />طباعة النتائج</a>';
					str+=' | <a href="#" id="saveCmd"><img class="commandPic2" src="assets/img/save.png" />حفظ النتائج</a>';
					str+='</center></div>';	
					$('#buttonsContainer').html(str);
					$('#bait'+bait).width('1%').css('background','#E6EFC2').animate({'width':'91%'},1000).animate({'background-color':'#eeeeee;'},1500,function(){
						if(bait>1)
						{
							$('#amoodyGoodBaits').sortable({'update' : function(event, ui) {
								var tmpI=1;
								$('#amoodyGoodBaits li').each(function(){
									$(this).attr('id','bait'+tmpI);
									tmpI++;
								});
							}});
							$('#amoodyGoodBaits').sortable('enable');
							$('#amoodyGoodBaits li').css('cursor','move');
							
						}
					});
					var execTime=d.time;
					$('#timeAmoody').html('<br/> زمن تنفيذ الطلب :'+execTime+' ثانية');
					return;
				}
			}
			else
			{

				var tables='<table class="tableMukhtar4"><tr><th>الصدر</th></tr><tr>';
				//sader
				tables+='<td>';
				if(d.sader.is_ok)
				{
					tables+='<span class="greenText"> الصدر سليم وزنيّاً </span>';
				}
				else
				{
					//إنشاء جدول التقطيع التفصيلي
					tables+='<table class="tableMukhtar3"><tr>';
					for(var i in d.sader.details)
					{
						if(d.sader.details[i].status=="ok")
						{
							tables+='<td><span class="greenText">'+d.sader.details[i].chars+'</span></td>';
						}
						else
						{
							tables+='<td><span class="redText lettering">'+d.sader.details[i].chars+'</span></td>';
						}
					}
					tables+='</tr><tr>';
					for(var i in d.sader.details)
					{
						if(d.sader.details[i].status=="ok")
						{
							tables+='<td><span class="greenText">'+d.sader.details[i].taf3eela+'</span></td>';
						}
						else
						{
							tables+='<td><span class="redText">'+d.sader.details[i].taf3eela+'<br><ul class="errorsUl">';
							for(var j in d.sader.details[i].errs)
							{
								tables+='<li>'+d.sader.details[i].errs[j]+'</li>';
							}
							tables+='</ul></span></td>';
						}
					}
					tables+='</tr></table>';
					
				}
				tables+='</td>';
				tables+='</tr></table>';
				
				
				//ajez
				tables+='<br/><table class="tableMukhtar4"><tr><th>العجز</th></tr><tr>';
				tables+='<td>';
				if(d.ajez.is_ok)
				{
					tables+='<span class="greenText"> العجز سليم وزنيّاً </span>';
				}
				else
				{
					//tables+=' جدول التقطيع التفصيلي يجب أن يظهر هنا';
					//إنشاء جدول التقطيع التفصيلي
					tables+='<table class="tableMukhtar3"><tr>';
					for(var i in d.ajez.details)
					{
						if(d.ajez.details[i].status=="ok")
						{
							tables+='<td><span class="greenText">'+d.ajez.details[i].chars+'</span></td>';
						}
						else
						{
							tables+='<td><span class="redText lettering">'+d.ajez.details[i].chars+'</span></td>';
						}
					}
					tables+='</tr><tr>';
					for(var i in d.ajez.details)
					{
						if(d.ajez.details[i].status=="ok")
						{
							tables+='<td><span class="greenText">'+d.ajez.details[i].taf3eela+'</span></td>';
						}
						else
						{
							tables+='<td><span class="redText">'+d.ajez.details[i].taf3eela+'<br><ul>';
							for(var j in d.ajez.details[i].errs)
							{
								tables+='<li>'+d.ajez.details[i].errs[j]+'</li>';
							}
							tables+='</ul></span></td>';
						}
					}
					tables+='</tr></table>';
					
				}
				tables+='</td>';
				
				tables+='</tr></table>';
				// error effects
				var str='<li><span class="redText">هناك أخطاء وزنيّة في البيت يا صديقنا و إليك التفاصيل<br/></span><br/>'+tables+'</li>';
				$('#amoodyErrors ul').html(str);
				$.scrollTo('#amoodyErrors ul',500);
				$('#amoodyErrors').height('1%').css('background','#f00').slideDown().animate({'background-color':'#FBE3E4;'},1500).animate({'background-color':'#eee;'},500);
				
			}
			var execTime=d.time;
			$('#timeAmoody').html('<br/> زمن تنفيذ الطلب :'+execTime+' ثانية');
		},"json");
		
	});
	
	$('#isQawafeeCheck').change(function(){
		if($(this).is(':checked'))
		{
			alertify.alert('تذكّر : تتطلّب هذه الخاصيّة ضبط آخر ستّة أحرف من البيت بشكل دقيق');
		}
	});
	
	$('#deleteBait').live('click',function(){
		var x=this;
		alertify.confirm("سيتم حذف البيت من قصيدتك و لن يمكنك التراجع عن هذه العملية لاحقاً <br/> هل ما زلت ترغب بالاستمرار ؟", function (e) {
			if (e) {
				$(x).parent().text('حذف البيت ...').animate({'width':'1px'},500,function(){
					bait--;
					$(this).remove();
					
					var tmpI=1;
					$('#amoodyGoodBaits li').each(function(){
						$(this).attr('id','bait'+tmpI);
						tmpI++;
					});
					
					if(bait<=1)
					{
						$('#amoodyGoodBaits').sortable('disable');
						$('#amoodyGoodBaits li').css('cursor','default');
					}
					
					if(bait<1)
					{
						$('#amoodyGoodBaits').html('القصيدة فارغة !');
					}
				})
			}
		});
		
	});
	// Amoody Poem End //
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//  tafeela begin  //
	$('#addNewPartToPoem').click(function(){
		
		$('#tafeelaErrors ul').html('');
		var poem=$('#poem').val();
		if(poem=='')
		{
			jError('يرجى إدخال نصّ المقطع', {HorizontalPosition : 'center',VerticalPosition : 'center'});
			return;
		}
		if(poem.length<50)
		{
			jError('النصّ المدخل قصير جدّاً  !!', {HorizontalPosition : 'center',VerticalPosition : 'center'});
			return;
		}
		
		$.post("wizard/tafeelaWizard",{"t":t,"b":b,"n":parts,"poem":poem,"csrf":hash},function(d){
			if(typeof d.status != 'undefined')
			{
				if(d.status='ok')
				{
					//add bait effects
					parts++;
					if(parts==1)
					{
						$('#tafeelaGoodParts').html('');
					}
					var str='<li class="goodBait" id="part'+parts+'"><span id="deletePart"><img alt="حذف المقطع" class="commandPic2 delpic" style="margin-top:8px;" src="assets/img/delete_icon.png" /></span>'+poem+'</li>';
					$('#tafeelaGoodParts').append(str);
					
					$('#poem').val('');
					$('#poem').focus();
					alertify.success("لقد قمت للتوّ بكتابة مقطع تفعيلي سليم وزنيّاً .. مباركٌ مبارك !!");
					
					
					str='<div id="commandsTafeelaAll"><center><br/>';
					str+='<a href="#" id="printTfeelaCmd"><img class="commandPic2" src="assets/img/printer32.png" />طباعة النتائج</a>';
					str+=' | <a href="#" id="saveTfeelaCmd"><img class="commandPic2" src="assets/img/save.png" />حفظ النتائج</a>';
					str+='</center></div>';	
					$('#tafeelaButtonsContainer').html(str);
					$('#part'+parts).width('1%').css('background','#E6EFC2').animate({'width':'91%'},1000).animate({'background-color':'#eeeeee;'},1500,function(){
						if(parts>1)
						{
							$('#tafeelaGoodParts').sortable({'update' : function(event, ui) {
								var tmpI=1;
								$('#tafeelaGoodParts li').each(function(){
									$(this).attr('id','part'+tmpI);
									tmpI++;
								});
							}});
							$('#tafeelaGoodParts').sortable('enable');
							$('#tafeelaGoodParts li').css('cursor','move');
							
						}
					});
					var execTime=d.time;
					$('#timeTafeela').html('<br/> زمن تنفيذ الطلب : '+execTime+' ثانية');
					return;
				}
			}
			else
			{
				var tables='';
				for(var current in d.details)	
				{
					if(d.details[current].status!='ok')
					{
						tables+='<p class="partOfPoemErr"><span class="lettering">'+d.details[current].chars+'</span><span class="hiddenSpan"><br/>'+d.details[current].taf3eela;
						for(var indexErr in d.details[current].errs)
						{
							tables+='<br/>'+d.details[current].errs[indexErr];
						}
						tables+='</span></p>';
					}
					else
					{
						tables+='<p class="partOfPoem">'+d.details[current].chars+'<br/>'+d.details[current].taf3eela+'</p>';
					}
				}
				
				tables+='<div style="clear:both"></div>';
				// error effects
				var str='<li><span class="redText">هناك أخطاء وزنيّة في المقطع تظهر تفاصيلها في المربّعات الحمراء التالية<br/></span><br/>'+tables+'</li>';
				$('#tafeelaErrors ul').html(str);
				$.scrollTo('#tafeelaErrors ul',500);
				$('#tafeelaErrors').height('1%').css('background','#f00').slideDown().animate({'background-color':'#FBE3E4;'},1500).animate({'background-color':'#eee;'},500);
			}
			var execTime=d.time;
			$('#timeTafeela').html('<br/> زمن تنفيذ الطلب : '+execTime+' ثانية');
		},"json");
	});
	
	// expand error div
	$('.partOfPoemErr').live('click',function(e){
		e.preventDefault();
		$(this).children('.hiddenSpan').toggle(300);
	});
	
	$('#deletePart').live('click',function(){
		var x=this;
		x=$(x).parent().attr('id');
		alertify.confirm("سيتم حذف المقطع من قصيدتك و لن يمكنك التراجع عن هذه العملية لاحقاً <br/> هل ما زلت ترغب بالاستمرار ؟", function (e) {
			if (e) {
				$('#'+x).text('حذف المقطع ...').animate({'width':'1px'},500,function(){
					parts--;
					$('#'+x).remove();
					
					var tmpI=1;
					$('#tafeelaGoodParts li').each(function(){
						$(this).attr('id','part'+tmpI);
						tmpI++;
					});
					
					if(parts<=1)
					{
						$('#tafeelaGoodParts').sortable('disable');
						$('#tafeelaGoodParts li').css('cursor','default');
					}
					
					if(parts<1)
					{
						$('#tafeelaGoodParts').html('القصيدة فارغة !');
					}
				})
			}
		});
		
	});
	//  tafeela end   //
	
	
	
	
	
	
	
	
	
	
	
	// prevent non arabic letters begin!!
	// prevent non Arabic characters from being accepted as input !!
	$('input').live('keypress',function(event){
		var ew = event.which;
		if(ew == 0) // ctrl+f5
			return true;
		if(ew == 97) // ctrl+a
			return true;
		if(ew == 99) // ctrl+c
			return true;
		if(ew == 118) // ctrl+v
			return true;
		if(ew == 8) // back delete.
			return true;
		if(ew == 122) // ctrl+z
			return true;
		if(32 <= ew && ew <= 60) // punctuations
			return true;
		if(1500 <= ew && ew <= 1620) // arabic characters
			return true;
		//jError(ew);
		jError('يرجى إدخال المحارف العربية فقط !!', {HorizontalPosition : 'center',VerticalPosition : 'center'});
		return false;
	});
	$('#poem').live('keypress',function(event){
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
		if(ew == 13) // Enter.
			return true;
		if(ew == 8) // back delete.
			return true;
		if(32 <= ew && ew <= 60) // punctuations
			return true;
		if(1500 <= ew && ew <= 1620) // arabic characters
			return true;
		//jError(ew);
		jError('يرجى إدخال المحارف العربية فقط !!', {HorizontalPosition : 'center',VerticalPosition : 'center'});
		return false;
	});
	
	// prevent non arabic letters end!!
	
	
	
	
	
	
	//print & save amoodyResults
	
	//save
	$('#saveCmd').live('click',function(e){
		e.preventDefault();
		
		var h='<table class="tableMukhtar"><tr><td colspan="3"><b>قصيدة عمودية كتبت باستخدام معالج كتابة القصيدة <br/> البحر المستهدف : '+bn+'</b></td></tr><tr><td><b>رقم البيت</b></td><td>صدر البيت</td><td>عجز البيت</td></tr>';
		for(var i=1;i<=bait;i++)
		{
			var currentBait=$('#amoodyGoodBaits #bait'+i).text();
			h+='<tr><td>'+i+'</td><td>'+currentBait.split("=")[0]+'</td><td>'+currentBait.split("=")[1]+'</td></tr>';
		}
		h+='</table>';
		$.post('f_printer/printshater',{'h':h,"csrf":hash},function(data){
			if(data.id!="-1")
			{
				var lnk='f_printer/save/'+data.id;
				window.open(lnk);
			}
			else
			{
				jError('لا يمكن إتمام العملية بسبب حدوث خطأ غير معروف .. نعتذر !', {HorizontalPosition : 'center',VerticalPosition : 'center'});
				return;
			}
		},'json');
		
	});
	
	//print
	$('#printCmd').live('click',function(e){
		e.preventDefault();
		
		var h='<table class="tableMukhtar"><tr><td colspan="3"><b>قصيدة عمودية كتبت باستخدام معالج كتابة القصيدة <br/> البحر المستهدف : '+bn+'</b></td></tr><tr><td><b>رقم البيت</b></td><td>صدر البيت</td><td>عجز البيت</td></tr>';
		for(var i=1;i<=bait;i++)
		{
			var currentBait=$('#amoodyGoodBaits #bait'+i).text();
			h+='<tr><td>'+i+'</td><td>'+currentBait.split("=")[0]+'</td><td>'+currentBait.split("=")[1]+'</td></tr>';
		}
		h+='</table>';
		$.post('f_printer/printshater',{'h':h,"csrf":hash},function(data){
			if(data.id!="-1")
			{
				var lnk='f_printer/shater/'+data.id;
				$('#printCmd').printPage({
				  url: lnk,
				  message:"الرجاء الانتظار ..."
				});	
			}
			else
			{
				jError('لا يمكن إتمام العملية بسبب حدوث خطأ غير معروف .. نعتذر !', {HorizontalPosition : 'center',VerticalPosition : 'center'});
				return;
			}
		},'json');
		
	});
	
	//print and save amoodyResults End
	
	
	
	
	
	
	//print & save tafeela Results
	
	//save
	$('#saveTfeelaCmd').live('click',function(e){
		e.preventDefault();
		
		var h='<table class="tableMukhtar"><tr><td colspan="3"><b>قصيدة تفعيلة كتبت باستخدام معالج الكتابة الوزنيّة<br/> البحر المستهدف : '+bn+'</b></td></tr><tr><td><b>رقم المقطع</b></td><td>نصّ المقطع</td></tr>';
		for(var i=1;i<=parts;i++)
		{
			var currentBait=$('#tafeelaGoodParts #part'+i).text();
			h+='<tr><td>'+i+'</td><td>'+currentBait+'</td></tr>';
		}
		h+='</table>';
		$.post('f_printer/printshater',{'h':h,"csrf":hash},function(data){
			if(data.id!="-1")
			{
				var lnk='f_printer/save/'+data.id;
				window.open(lnk);
			}
			else
			{
				jError('لا يمكن إتمام العملية بسبب حدوث خطأ غير معروف .. نعتذر !', {HorizontalPosition : 'center',VerticalPosition : 'center'});
				return;
			}
		},'json');
		
	});
	
	//print
	$('#printTfeelaCmd').live('click',function(e){
		e.preventDefault();
		
		var h='<table class="tableMukhtar"><tr><td colspan="3"><b>قصيدة تفعيلة كتبت باستخدام معالج الكتابة الوزنيّة<br/> البحر المستهدف : '+bn+'</b></td></tr><tr><td><b>رقم المقطع</b></td><td>نصّ المقطع</td></tr>';
		for(var i=1;i<=parts;i++)
		{
			var currentBait=$('#tafeelaGoodParts #part'+i).text();
			h+='<tr><td>'+i+'</td><td>'+currentBait+'</td></tr>';
		}
		h+='</table>';
		$.post('f_printer/printshater',{'h':h,"csrf":hash},function(data){
			if(data.id!="-1")
			{
				var lnk='f_printer/shater/'+data.id;
				$('#printTfeelaCmd').printPage({
				  url: lnk,
				  message:"الرجاء الانتظار ..."
				});	
			}
			else
			{
				jError('لا يمكن إتمام العملية بسبب حدوث خطأ غير معروف .. نعتذر !', {HorizontalPosition : 'center',VerticalPosition : 'center'});
				return;
			}
		},'json');
		
	});
	
	//print and save tafeela Results End
});