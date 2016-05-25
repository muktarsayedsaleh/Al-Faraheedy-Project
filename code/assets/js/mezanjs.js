/*
*
*	Poetry Mezan JavaScripts
*	Mukhtar Sayed Saleh
*	Syria - Al_Bokamal
*	15/8/2013 --------------- 7/10/2013
*	mokhtar_ss@hotmail.com	
*
*	Du2alee Functionality added in 13th of March 2014
*   
*	Share Functionality added in 18 of March 2014
*
*/



var bait=1;
var poem1=new Array();
var tipsStatus=new Array('f','f','f','f','f','f'); // qafeah chars are 6
var resultsJSON={};
var hash=''; // csrf hash
var autoTashkeelArr= new Array();
function getBa7er(t)
{
	if(t=='taweel') return 'البحر الطويل';
	if(t=='baseet') return 'البحر البسيط';
	if(t=='kamel') return 'البحر الكامل';
	if(t=='madeed') return 'البحر المديد';
	if(t=='rajaz') return 'بحر الرّجز';
	if(t=='ramal') return 'بحر الرّمل';
	if(t=='saree3') return 'البحر السّريع';
	if(t=='khafeef') return 'البحر الخفيف';
	if(t=='munsare7') return 'البحر المنسرح';
	if(t=='wafer') return 'البحر الوافر';
	if(t=='o7othKamel') return 'أحذّ الكامل';
	if(t=='mutakareb') return 'البحر المتقارب';
	if(t=='muktakareb') return 'البحر المتقارب';
	if(t=='mutadarak') return 'البحر المتدارك';
	if(t=='mu5alla3Baseet') return 'مخلّع البسيط';
	if(t=='majzoo2Baseet') return 'مجزوء البسيط';
	if(t=='majzoo2Kamel') return 'مجزوء الكامل';
	if(t=='majzoo2Ramal') return 'مجزوء الرّمل';
	if(t=='majzoo2Saree3') return 'مجزوء السّريع';
	if(t=='majzoo2khafeef') return 'مجزوء الخفيف';
	if(t=='majzoo2Munsare7') return 'مجزوء المنسرح';
	if(t=='majzoo2Mutakareb') return 'مجزوء المتقارب';
	if(t=='majzoo2Mutadarak') return 'مجزوء المتدارك';
	if(t=='hazaj') return 'بحر الهزج';
	if(t=='majzoo2Wafer') return 'مجزوء الوافر';
	if(t=='majzoo2Rajaz') return 'مجزوء الرّجز';
	if(t=='modare3') return 'البحر المضارع';
	if(t=='moktadab') return 'البحر المقتضب';
	if(t=='mojtath') return 'البحر المجتثّ';
	if(t=='manhookRajaz') return 'منهوك الرّجز';
	if(t=='unknown') return 'لم يتم تحديد البحر';

}

$(document).ready(function(){

	hash=$('#hash').val();
	
	$('#tabs').tabs();
	
	
	
	// send ajax post for amoody poem
	$('#doFaraheedy1').click(function(e){
		e.preventDefault();
	

		
		//checks if all inputs are empty
		var flag=false;
		for(var i=1;i<=bait;i++)
		{
			if($('#sader'+i).val()!='' || $('#ajez'+i).val()!='')
			{
				flag=true;
			}
		}
		if(!flag)
		{
			jError('لم تقم بإدخال أيّة أشطر !!', {HorizontalPosition : 'center',VerticalPosition : 'center'});
			return;
		}
		
		//prepare parameters
		var tmpBait='';
		for(var i=1;i<=bait;i++)
		{
			tmpBait=$('#sader'+i).val()+"&&&"+$('#ajez'+i).val();
			poem1[i-1]=tmpBait;
		}
		var execTime=-1;
		//send request here
		$('#resultsContainter').html('<center><img src="assets/img/loading.gif"/></center>');
		$('#mezan1 input').prop("disabled", true);
		$.post("mezan/doFaraheedyAmoody",{"poem":poem1,"csrf":hash},function(results){
			// handle results which is json array !!
			
			if(typeof results.error != 'undefined')
			{
				jError(results.error, {HorizontalPosition : 'center',VerticalPosition : 'center'});
				$('#resultsContainter').html('');
				$('#mezan1 input').prop("disabled", false);
				return;	
			}
			var str='<tr><td colspan="2"><h2 class="resultsHead">-- النتائج --</h2></td></tr>';
			for(var i in results)
			{	
				if(typeof results[i].time != 'undefined')
				{
					execTime=results[i].time;
					continue;
				}
				str+='<tr colspan="2"><td>البيت رقم '+ (parseInt(i)+1) +':</td></tr>';
				str+='<tr>';
				
				if(results[i].sader!=null)
				{
					if(typeof results[i].sader.info != 'undefined')
					{
						var lenlen=results[i].sader.info.tafa3eel.length/2;
						str+='<td><table class="tableMukhtar"><tr><td colspan="'+lenlen+'">'+results[i].sader.sader+'</td></tr><tr class="hiddenTr">';
						for(var c=1;c<=results[i].sader.info.tafa3eel.length-1;c=c+2)
						{
							str+='<td>'+results[i].sader.info.tafa3eel[c]+'</td>';
						}
						str+='</tr><tr class="hiddenTr">';
						for(var c=0;c<results[i].sader.info.tafa3eel.length-1;c=c+2)
						{
							str+='<td>'+results[i].sader.info.tafa3eel[c]+'</td>';
						}
						str+='</tr>';
						str+='<tr><td colspan="'+lenlen+'">'+getBa7er(results[i].sader.info.ba7erName)+'</td></tr>';
						if(results[i].sader.info.ba7erName != 'unknown')
						{
							str+='<tr class="commandsTR"><td colspan="'+(parseInt(lenlen))+'" class="moreDetailsTd"><a href="#" class="moreDetails"><img class="iconDetails" style="margin-bottom:-15px;width:40px;height:40px;" src="assets/img/zoom_in.png"></a></td></tr></table></td>';
						}
						else
						{
							str+='</table></td>';
						}
					}
					else
					{
						str+='<td><table class="tableMukhtar"><tr><td>'+results[i].sader.error+'</td></tr><tr class="hiddenTr"></tr></table></td>';
					}
				}
				
				if(results[i].ajez!=null)
				{
					if(typeof results[i].ajez.info != 'undefined')
					{
						var lenlen=results[i].ajez.info.tafa3eel.length/2;
						str+='<td><table class="tableMukhtar"><tr><td colspan="'+lenlen+'">'+results[i].ajez.ajez+'</td></tr><tr class="hiddenTr">';
						for(var c=1;c<=results[i].ajez.info.tafa3eel.length-1;c=c+2)
						{
							str+='<td>'+results[i].ajez.info.tafa3eel[c]+'</td>';
						}
						str+='</tr><tr class="hiddenTr">';
						for(var c=0;c<results[i].ajez.info.tafa3eel.length-1;c=c+2)
						{
							str+='<td>'+results[i].ajez.info.tafa3eel[c]+'</td>';
						}
						str+='</tr>';
						str+='<tr><td colspan="'+lenlen+'">'+getBa7er(results[i].ajez.info.ba7erName)+'</td></tr>';
						if(results[i].ajez.info.ba7erName != 'unknown')
						{
							str+='<tr class="commandsTR"><td colspan="'+(parseInt(lenlen))+'" class="moreDetailsTd"><a href="#" class="moreDetails"><img class="iconDetails" style="margin-bottom:-15px;width:40px;height:40px;" src="assets/img/zoom_in.png"></a></td></tr></table></td>';
						}
						else
						{
							str+='</table></td>';
						}
					}
					else
					{
						str+='<td><table class="tableMukhtar"><tr><td>'+results[i].ajez.error+'</td></tr><tr class="hiddenTr"></tr></table></td>';
					}
				}
				
				
				str+='</tr><tr><td><br/></td><td><br/></td></tr>';

			}

			str+='<tr class="commandsTR"><td colspan="2" style="text-align:center;">';
			str+='<a href="#" id="printAmoodyPoem"><img class="commandPic" src="assets/img/printer32.png" />طباعة النتائج</a> | ';
			str+='<a href="#" id="SaveAmoodyPoemAsWordCmd"><img class="commandPic" src="assets/img/save.png" />حفظ النتائج </a> | ';
			str+='<a href="#" id="shareOnFaceBook"><img class="commandPic" src="assets/img/facebook-icon.jpg" />شارك النتائج </a>';
			str+='</td></tr>';
			str+='<tr class="execTime"><td style="text-align:center;font-size:12px;color:red;" colspan="2"><br/>زمن تنفيذ الطلب : '+execTime+' ثانية</td></tr>';
			
			$('#resultsContainter').html(str);
			$('#mezan1 input').prop("disabled", false);
			$('.hiddenTr').hide();
			$.scrollTo('.resultsHead',300);
		},"json");
		
		//zero poem array
		poem1=new Array();
	});
	
	// more details row
	$('.moreDetailsTd').live('click',function(e){
		e.preventDefault();
		if($(this).children('.moreDetails').html()=='<img class="iconDetails" style="margin-bottom:-15px;width:40px;height:40px;" src="assets/img/zoom_in.png">')
		{
			$(this).children('.moreDetails').html('<img class="iconDetails" style="margin-bottom:-15px;width:40px;height:40px;" src="assets/img/zoom_out.png">');
		}
		else if($(this).children('.moreDetails').html()=='<img class="iconDetails" style="margin-bottom:-15px;width:40px;height:40px;" src="assets/img/zoom_out.png">')
		{
			$(this).children('.moreDetails').html('<img class="iconDetails" style="margin-bottom:-15px;width:40px;height:40px;" src="assets/img/zoom_in.png">');
		}
		$(this).parent().parent().children('.hiddenTr').toggle(250);
	});
	
	// send ajax post for tafeela poem
	$('#doFaraheedy2').click(function(e){
		e.preventDefault();
		//prepare parameters
		var poem=$('#poem').val();
		if(poem=='')
		{
			jError('يرجى إدخال نصّ القصيدة !', {HorizontalPosition : 'center',VerticalPosition : 'center'});
			return;
		}
		
		//send request
		$('#tafeelaResults').html('<center><img src="assets/img/loading.gif"/></center>');
		$('#poem').prop("disabled", true);
		$.post('mezan/doFaraheedyTafeela',{'t':poem,"csrf":hash},function(data){
			
			if(typeof data.error != 'undefined')
			{
				jError(data.error, {HorizontalPosition : 'center',VerticalPosition : 'center'});
				$('#tafeelaResults').html('');
				$('#poem').prop("disabled", false);
				return;	
			}
			
			if(typeof data.poemErr != 'undefined')
			{
				jError(data.poemErr, {HorizontalPosition : 'center',VerticalPosition : 'center'});
				$('#tafeelaResults').html('');
				$('#poem').prop("disabled", false);
				return;	
			}
			var execTime = data.time;
			resultsJSON=data;
			var str='<h2 class="resultsHead"> النتائج :  ';
			str+=getBa7er(data.ba7er);
			str+='</h2>';
			for(var current in data.tafa3eel)	
			{
				if(data.names[current]=='????')
				{
					str+='<p class="partOfPoemErr">'+data.words[current]+'<span class="hiddenSpan"><br/>'+data.tafa3eel[current]+'</span><br/>'+data.names[current]+'</p>';
				}
				else
				{
					str+='<p class="partOfPoem">'+data.words[current]+'<br/>'+data.names[current]+'</p>';
				}
			}
			str+='<div style="clear:both;"></div>';
			str+='<div id="commandsTafeelaAll"><center><br/>';
			str+='<a href="#" id="printCmd"><img class="commandPic2" src="assets/img/printer32.png" />طباعة النتائج</a>';
			str+=' | <a href="#" id="saveAsWord"><img class="commandPic2" src="assets/img/save.png" />حفظ النتائج</a> | ';
			str+='<a href="#" id="shareTafeelaOnFaceBook"><img class="commandPic" src="assets/img/facebook-icon.jpg" />شارك النتائج </a>';
			str+='</center></div>';	
			str+='<div class="execTime" style="text-align:center;font-size:12px;color:red;"><br/>زمن تنفيذ الطلب : '+execTime+' ثانية</div>';
			$('#tafeelaResults').html(str);
			$.scrollTo('.resultsHead',300);
			$('#poem').prop("disabled", false);
		},'json');
		
	});
	
	// expand error div
	$('.partOfPoemErr').live('click',function(e){
		e.preventDefault();
		$(this).children('.hiddenSpan').toggle(300);
	});
	
	// do Qawafee Analysis
	// send ajax post for amoody poem
	$('#doQawafee').click(function(e){
		e.preventDefault();
		//checks if all inputs are empty
		var flag=false;
		for(var i=1;i<=bait;i++)
		{
			if($('#ajez'+i).val()!='')
			{
				flag=true;
			}
		}
		if(!flag)
		{
			jError('لم تقم بإدخال أي عجز !!', {HorizontalPosition : 'center',VerticalPosition : 'center'});
			return;
		}
		
		//prepare parameters
		var tmpBait='';
		for(var i=1;i<=bait;i++)
		{
			tmpBait=$('#ajez'+i).val();
			poem1[i-1]=tmpBait;
		}
		
		//send request here
		$('#resultsContainter').html('<center><img src="assets/img/loading.gif"/></center>');
		$('#mezan1 input').prop("disabled", true);
		var execTime=-1;
		$.post("mezan/doQawafeeAnalysis",{'poem':poem1,"csrf":hash},function(results){
			
			// handle results which is json array !!
			if(typeof results.error != 'undefined')
			{
				jError(results.error, {HorizontalPosition : 'center',VerticalPosition : 'center'});
				$('#resultsContainter').html('');
				$('#mezan1 input').prop("disabled", false);
				return;	
			}
			
		
			var str='<tr><td><h2 class="resultsHead">-- النتائج --</h2></td></tr>';
			
			var noOfQLetters=0;
			if(results[0].ta2ses!=''){noOfQLetters++;noOfQLetters++;} // ta2ses + dakheel
			if(results[0].redf!=''){noOfQLetters++;} // redf
			if(results[0].rawee!=''){noOfQLetters++;} // rawee
			if(results[0].wasel!=''){noOfQLetters++;} // wasel
			if(results[0].kharoog!=''){noOfQLetters++;} // kharoog
			
			
			str+='<tr><td>قافية القصيدة :</td></tr>';
			str+='<tr>';
			str+='<td><table class="tableMukhtar"><tr><td colspan="'+noOfQLetters+'">'+results[0].text+'</td></tr>';
			str+='<tr><td colspan="'+noOfQLetters+'">'+results[0].type+'</td></tr><tr>';
			if(results[0].ta2ses!='')
			{
				str+='<td>'+results[0].ta2ses+'<br/><small tip="0" class="tip" tipContent="التأسيس : ألفٌ تأتي قبل الحرف السَّابق لحرف الرَّويِّ , و يجب أن يلتزم الشاعر بألف التأسيس في جميع قوافي القصيدة إن كانت قافية البيت الأوَّل مؤسَّسة.">(ألف التأسيس)</small></td>';
			}
			if(results[0].dakheel!='')
			{
				str+='<td>'+results[0].dakheel+'<br/><small tip="1" class="tip" tipContent="الدَّخيل : حرفٌ يأتي بين ألف التأسيس و حرف الرَّويِّ و لا يجب على الشاعر الالتزام به في القافية و لهذا سمّي دخيلاً لأنّه وقع بين حرفين يجب الالتزام بهما.">(الدخيل)</small></td>';
			}
			if(results[0].redf!='')
			{
				str+='<td>'+results[0].redf+'<br/><small tip="2" class="tip" tipContent="الرَّدف : ألف أو واو أو ياء ساكنة قبل الرَّويِّ بحرف و قبلها حرف متحرّكٌ بحركة مجانسة , يجب الالتزام به في جميع القوافي إذا كانت قافية القصيدة مردفة , و يمكن أن يجتمع ردف الياء مع ردف الواو في قصيدة واحدة , أمّا ردف الألف فلا يجتمع مع ردف آخر.">(الردف)</small></td>';
			}
			if(results[0].rawee!='')
			{
				str+='<td class="greenText">'+results[0].rawee+'<br/><small tip="3" class="tip" tipContent="هو الحرف الذي يختاره الشاعر من الحروف الصالحة، فيبني عليه قصيدته، ويلتزمه في جميع أبياتها، وإليه تنسب القصيدة؛ فيقال: قصيدة همزية إن كانت الهمزة هي الرَّوِيّ كهمزية شوقي، أو لامية إن كانت اللام هي الرَّوِيّ كلامية العرب , وسمي رويا؛ لأن أصل (رَوَى) في كلام العرب للجمع والاتصال والضمّ، ومنه الرِّوَاء وهو الحبل الذي يشد على الأحمال والمتاع ليضمها، وكذلك حرف الرَّوِيّ ينضم ويجتمع إليه جميع حروف البيت؛ فلذلك سمي رويا."><b>(الرَّوي)</b></small></td>';
			}
			if(results[0].wasel!='')
			{
				str+='<td>'+results[0].wasel+'<br/><small tip="4" class="tip" tipContent="سمي الْوَصْل بهذا الاسم لوصله بالرَّوِيّ ومجيئه بعده مباشرة، وحروف الْوَصْل هي الألف والواو والياء و الهاء و الكاف في بعض الحالات.">(الوصل)</small></td>';
			}
			if(results[0].kharoog!='')
			{
				str+='<td>'+results[0].kharoog+'<br/><small tip="5" class="tip" tipContent="سمي بهذا الاسم لخروجه وتجاوزه الْوَصْل التابع للروي، فهو موضع الْخُرُوْج من بيت القصيدة حيث لا يأتي بعده حرف، والْخُرُوْج يكون بالألف أو بالواو أو بالياء يتبعنَ هاء الْوَصْل.">(الخروج)</small></td>';
			}
			str+='</tr></table></td></tr>';
			
			
			if(results.length>2)
			{
				str+='<tr><td>تحليل قوافي الأبيات :</td></tr>';
			}
			str+='<tr><td><ul class="quafeeAnalysisResultsLists">';
			for(var i=1;i<results.length;i++)
			{
				if(typeof results[i].time != 'undefined')
				{
					execTime=results[i].time;
					continue;
				}
				
				if(results[i]=='empty')
				{
					str+='<li  qafeahID="'+(parseInt(i)+1)+'" class="qafeahError">قافية البيت رقم '+ (parseInt(i)+1) +' : <span class="redText"><img src="assets/img/error.png"/>&nbsp;&nbsp;لم يتم إدخال عجز البيت.</span></li>';
					continue;
				}
				if(typeof results[i].errors[0] != 'undefined')
				{
					
					str+='<li>قافية البيت رقم '+ (parseInt(i)+1) +':<ol>';
					for(var j in results[i].errors)
					{
						str+='<li qafeahID="'+(parseInt(i)+1)+'" class="redText qafeahError"><img src="assets/img/error.png"/>&nbsp;&nbsp;'+results[i].errors[j]+'</li>';
					}
					str+='</ol></li>';
				}
				else
				{
					str+='<li>قافية البيت رقم '+ (parseInt(i)+1) +' : <span class="greenText"><img src="assets/img/success.png"/>&nbsp;&nbsp;القافية صحيحة.</span></li>';
				}
			}
			str+='</ul></td></tr>';
			
			str+='<tr id="commandsTafeelaAll"><td>';
			str+='<center><br/>';
			str+='<a href="#" id="printAmoodyPoem"><img class="commandPic2" src="assets/img/printer32.png" />طباعة النتائج</a>';
			str+=' | <a href="#" id="SaveAmoodyPoemAsWordCmd"><img class="commandPic2" src="assets/img/save.png" />حفظ النتائج</a>';
			str+=' | <a href="#" id="shareQafeah"><img class="commandPic2" src="assets/img/facebook-icon.jpg" />مشاركة النتائج</a>';
			str+='</center></td></tr>';	
			str+='<tr class="execTime" style="text-align:center;font-size:12px;color:red;"><td><br/>زمن تنفيذ الطلب : '+execTime+' ثانية</td></tr>';
			$('#resultsContainter').html(str);
			$('.hiddenTr').hide();
			$('#mezan1 input').prop("disabled", false);
			$.scrollTo('.resultsHead',300);
		},"json");
		
		//zero poem array
		poem1=new Array();
	});
	
	//save amoody results
	$('#SaveAmoodyPoemAsWordCmd').live('click',function(e){
		e.preventDefault();
		$('.hiddenTr').show();
		var h='<table class="tableMukhtar"><tr><td colspan="3"><b>-- القصيدة --</b></td></tr><tr><td><b>رقم البيت</b></td><td>صدر البيت</td><td>عجز البيت</td></tr>';
		for(var i=1;i<=bait;i++)
		{
			h+='<tr><td>'+i+'</td><td>'+$('#sader'+i).val()+'</td><td>'+$('#ajez'+i).val()+'</td></tr>';
		}
		h+='</table><br/><hr/><br/>';
		h+='<table class="tableMukhtar">'+$('#resultsContainter').html()+'</table>';
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
	
	//save tafeela results
	$('#saveAsWord').live('click',function(e){
		e.preventDefault();
		
		var h='<table class="tableMukhtar"><tr><td><b>نصّ القصيدة</b></td></tr><tr><td>'+$('#poem').val()+'</td></tr></table><br/><hr/><br/>'+$('#tafeelaResults').html();
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
	
	//print tafeela results
	$('#printCmd').live('click',function(e){
		e.preventDefault();
		
		var h='<table class="tableMukhtar"><tr><td><b>نصّ القصيدة</b></td></tr><tr><td>'+$('#poem').val()+'</td></tr></table><br/><hr/><br/>'+$('#tafeelaResults').html();
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
	
	//print amoody results
	$('#printAmoodyPoem').live('click',function(e){
		e.preventDefault();
		$('.hiddenTr').show();
		var h='<table class="tableMukhtar"><tr><td colspan="3"><b>-- القصيدة --</b></td></tr><tr><td><b>رقم البيت</b></td><td>صدر البيت</td><td>عجز البيت</td></tr>';
		for(var i=1;i<=bait;i++)
		{
			h+='<tr><td>'+i+'</td><td>'+$('#sader'+i).val()+'</td><td>'+$('#ajez'+i).val()+'</td></tr>';
		}
		h+='</table><br/><hr/><br/>';
		h+='<table class="tableMukhtar">'+$('#resultsContainter').html()+'</table>';
		$.post('f_printer/printshater',{'h':h,"csrf":hash},function(data){
			if(data.id!="-1")
			{
				var lnk='f_printer/shater/'+data.id;
				$('#printAmoodyPoem').printPage({
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
	
	
	//share amoody results
	$('#shareOnFaceBook').live('click',function(e){
		e.preventDefault();
		$('.hiddenTr').show();
		var h='<table class="tableMukhtar"><tr><td colspan="3"><b>-- القصيدة --</b></td></tr><tr><td><b>رقم البيت</b></td><td>صدر البيت</td><td>عجز البيت</td></tr>';
		for(var i=1;i<=bait;i++)
		{
			h+='<tr><td>'+i+'</td><td>'+$('#sader'+i).val()+'</td><td>'+$('#ajez'+i).val()+'</td></tr>';
		}
		h+='</table><br/><hr/><br/>';
		h+='<table class="tableMukhtar">'+$('#resultsContainter').html()+'</table>';
		$.post('f_printer/printshater',{'h':h,"csrf":hash},function(data){
			if(data.id!="-1")
			{
				var lnk='http://faraheedy.com/f_printer/share/'+data.id;
				
				// share here
				FB.ui(
				{
				   method: 'feed',
				   name: 'الفراهيدي (مشروع حوسبة عروض و قافية الشعر العربيّ)',
				   description: ('بشراكم يا أصدقائي , لقد نجحت بتقطيع نصّ شعريّ باستخدام الفراهيدي !'),
				   caption: 
					  'يمكنكم التحقق من ذلك عبر الرابط'
				   ,
				   link: lnk,
				   picture: 'http://www.faraheedy.com/assets/img/logo.png'
				  },
				  function(response) {
					if (response && response.post_id) {
					  alertify.success("تمت مشاركة الحالة بنجاح .. شكراً لك");
					} else {
					   alertify.error("لم تتم مشاركة الحالة مع الأسف");
					}
				  }
				);
			}
			else
			{
				jError('لا يمكن إتمام العملية بسبب حدوث خطأ غير معروف .. نعتذر !', {HorizontalPosition : 'center',VerticalPosition : 'center'});
				return;
			}
		},'json');
		
	});
	
	//share Qafeah Analysis Results
	$('#shareQafeah').live('click',function(e){
		e.preventDefault();
		$('.hiddenTr').show();
		var h='<table class="tableMukhtar"><tr><td colspan="3"><b>-- القصيدة --</b></td></tr><tr><td><b>رقم البيت</b></td><td>صدر البيت</td><td>عجز البيت</td></tr>';
		for(var i=1;i<=bait;i++)
		{
			h+='<tr><td>'+i+'</td><td>'+$('#sader'+i).val()+'</td><td>'+$('#ajez'+i).val()+'</td></tr>';
		}
		h+='</table><br/><hr/><br/>';
		h+='<table class="tableMukhtar">'+$('#resultsContainter').html()+'</table>';
		$.post('f_printer/printshater',{'h':h,"csrf":hash},function(data){
			if(data.id!="-1")
			{
				var lnk='http://faraheedy.com/f_printer/shareQ/'+data.id;
				
				// share here
				FB.ui(
				{
				   method: 'feed',
				   name: 'الفراهيدي (مشروع حوسبة عروض و قافية الشعر العربيّ)',
				   description: ('بشراكم يا أصدقائي , لقد نجحت بتحليل قوافي قصيدتي باستخدام مشروع الفراهيدي , اطلعوا معي على النتيجة عبر الرابط.'),
				   caption: 
					  'يمكنكم التحقق من ذلك عبر الرابط'
				   ,
				   link: lnk,
				   picture: 'http://www.faraheedy.com/assets/img/logo.png'
				  },
				  function(response) {
					if (response && response.post_id) {
					  alertify.success("تمت مشاركة الحالة بنجاح .. شكراً لك");
					} else {
					   alertify.error("لم تتم مشاركة الحالة مع الأسف");
					}
				  }
				);
			}
			else
			{
				jError('لا يمكن إتمام العملية بسبب حدوث خطأ غير معروف .. نعتذر !', {HorizontalPosition : 'center',VerticalPosition : 'center'});
				return;
			}
		},'json');
		
	});
	
	
	//share tafeela results
	$('#shareTafeelaOnFaceBook').live('click',function(e){
		e.preventDefault();
		
		var h='<table class="tableMukhtar"><tr><td><b>نصّ القصيدة</b></td></tr><tr><td>'+$('#poem').val()+'</td></tr></table><br/><hr/><br/>'+$('#tafeelaResults').html();
		$.post('f_printer/printshater',{'h':h,"csrf":hash},function(data){
			if(data.id!="-1")
			{
				var lnk='http://faraheedy.com/f_printer/share/'+data.id;
				// share here
				FB.ui(
				{
				   method: 'feed',
				   name: 'الفراهيدي (مشروع حوسبة عروض و قافية الشعر العربيّ)',
				   caption: 'بشراكم يا أصدقائي , لقد نجحت بتقطيع نصّ شعريّ باستخدام الفراهيدي !',
				   description: (
					  'يمكنكم التحقق من ذلك عبر الرابط'
				   ),
				   link: lnk,
				   picture: 'http://www.faraheedy.com/assets/img/logo.png'
				  },
				  function(response) {
					if (response && response.post_id) {
					  alertify.success("تمت مشاركة الحالة بنجاح .. شكراً لك");
					} else {
					   alertify.error("لم تتم مشاركة الحالة مع الأسف");
					}
				  }
				);	
			}
			else
			{
				jError('لا يمكن إتمام العملية بسبب حدوث خطأ غير معروف .. نعتذر !', {HorizontalPosition : 'center',VerticalPosition : 'center'});
				return;
			}
		},'json');
		
		
		
	});
	
	// (+) and (-) and (clear) and (?) and (demo)
	$('.inputHelp').click(function(e){
		e.preventDefault();
		$.fancybox.open({
			href : 'info/inputhelp',
			type : 'iframe',
			padding : 5,
			openEffect : 'elastic',
			openSpeed  : 150,

			closeEffect : 'elastic',
			closeSpeed  : 150,
			width : '50%'
		});
	});
	
	$('#demoBait').click(function(e){
		e.preventDefault();
		if($('#sader1').val()!='' || $('#ajez1').val()!='')
		{
			alertify.confirm("سيتم حذف محتويات البيت الأول و استبدالها ببيت التجربة<br/>هل أنت متأكّد أنّك ترغب بالاستمرار ؟", function (e) {
				if (e) {
					$.post('mezan/getDemoBait',{"csrf":hash},function(data){
						$('#sader1').val(data[0].sader);
						$('#ajez1').val(data[0].ajez);
						alertify.success("تم جلب البيت بنجاح");
					},'json');
					
				}
			});
		}
		else
		{
			$.post('mezan/getDemoBait',{"csrf":hash},function(data){
				$('#sader1').val(data[0].sader);
				$('#ajez1').val(data[0].ajez);
			},'json');
		}
	});
	
	$('#demoPoem').click(function(e){
		e.preventDefault();
		if($('#poem').val()!='')
		{
			alertify.confirm("سيتم استبدال نص القصيدة الحالي بنص قصيدة التجربة , هل أنت متأكّد أنّك ترغب في الاستمرار ؟", function (e) {
				if (e) {
					$.post('mezan/getDemoPoem',{"csrf":hash},function(data){
						$('#poem').val(data[0].poem);
						alertify.success("تم جلب النص بنجاح");
					},'json');
				}
			});
		}
		else
		{
			$.post('mezan/getDemoPoem',{"csrf":hash},function(data){
				$('#poem').val(data[0].poem);
			},'json');
		}
	});
	
	$('#anotherBait').click(function(e){
		e.preventDefault();
		bait++;
		$('#poemCountainer').append('<label class="poemTafeelaLabel" for="sader'+bait+'">البيت رقم '+bait+':</label> <br id="br'+bait+'" /><input class="shaterInput sader" placeholder="صدر البيت" id="sader'+bait+'" name="sader'+bait+'" /> <input class="shaterInput ajez" placeholder="عجز البيت" id="ajez'+bait+'" name="ajez'+bait+'" /><div id="clear'+bait+'" style="clear:both;"></div>')
		if(bait==2)
		{
			$('#buttonsContainer').append('<a id="deleteBait" class="a-btnIn"><span class="a-btn-text">-</span> </a>');
			$('#buttonsContainer2').append('<a id="clearBaits" class="a-btnIn"><span class="a-btn-text">مسح الأبيات</span> </a>');
		}
		$('#sader'+bait).focus();
	});
	
	$('#deleteBait').live('click',function(e){
		e.preventDefault();
		if(bait<=1)
		{
			return;
		}
		
		alertify.confirm("هل أنت متأكِّد ؟", function (e) {
			if (e) {
				$('.poemTafeelaLabel[for="sader'+bait+'"]').remove();
				$('#sader'+bait).remove();
				$('#ajez'+bait).remove();
				$('#clear'+bait).remove();
				$('#br'+bait).remove();
				bait--;
				if(bait<=1)
				{
					$('#deleteBait').remove();
					$('#clearBaits').remove();
				}
			}
			else
			{
				return;
			}
		});
	});
	
	$('#clearBaits').live('click',function(e){
		e.preventDefault();
		alertify.confirm("سيتم تفريغ جميع حقول الإدخال <br/> هل أنت متأكّد أنّك ترغب بالاستمرار ؟", function (e) {
			if (e) {
				for(var i=bait;i>1;i--)
				{
					$('.poemTafeelaLabel[for="sader'+i+'"]').remove();
					$('#sader'+i).remove();
					$('#ajez'+i).remove();
					$('#clear'+i).remove();
					$('#br'+i).remove();
				}
				bait--;
				$('#sader1').val('');
				$('#ajez1').val('');
				$('#deleteBait').remove();
				$('#clearBaits').remove();
				bait=1;
				alertify.success("تم مسح المدخلات بنجاح !");
			}
			else
			{
				return;
			}
		});
	});
	
	$('#automaticTashkeel').click(function(e){
		e.preventDefault();
		
		var s='<center><table class="automatedTashkeelTable"><tr><th colspan="5"><br/><h3>يرجى تحديد الأشطر التي ترغب بتشكيلها آليَّاً</h3><br/></th>';
		for(i=1;i<=bait;i++)
			s+='</tr><tr><td><h4><b>البيت رقم '+i+':</b></h4></td><td><h4>صدر البيت</h4></td><td><div class="roundedOne"><input type="checkbox" value="None" data-for="sader'+i+'" id="sader'+i+'check" name="check" /><label for="sader'+i+'check"></label></div></td><td><h4>عجز البيت</h4></td><td><div class="roundedOne"><input type="checkbox" data-for="ajez'+i+'" value="None" id="ajez'+i+'check" name="check"  /><label for="ajez'+i+'check"></label></div></td></tr>';
		s+='</table><br/><a class="a-btnIn" id="doAutoTashkeel"><span class="a-btn-text">تشكيل الأشطر</span></a>&nbsp;&nbsp;&nbsp;<a class="a-btnIn" id="cancelAutoTashkeel"><span class="a-btn-text">إلغاء الأمر</span></a>	</center>';
		var height=200+(86*bait);
		$('#automaticTashkeelDialog').html(s).dialog({ awidth: "500",
			 height: height,
			 width: "400",
			 modal: true,
			 close: function(event, ui) {
					 $(this).dialog("destroy");
		}});
		
	});
	
	$('#cancelAutoTashkeel').live('click',function(){
		$('.ui-dialog-titlebar-close').trigger('click');
		return false;
	});
	
	$('#doAutoTashkeel').live('click',function(){
	
		alertify.confirm("تنبيه هام : التشكيل الآليّ يحتاج أن تقوم بمراجعة النتائج يدويّاً و تصحيح الأخطاء المحتملة ... هل ما تزال ترغب بالاستمرار ؟", function (e) {
			if (e) {
				autoTashkeelArr=new Array();
				$('input[type=checkbox]').each(function(){
					if($(this).is(':checked'))
					{
						var x = $(this).data('for');
						if($('#'+x).val() != '')
						{
							autoTashkeelArr.push(x);
							autoTashkeelArr.push($('#'+x).val());
						}
					}
				});
				
				if(autoTashkeelArr.length<=0)
				{
					jError('لم تقم بتحديد أيّ شطر !!', {HorizontalPosition : 'center',VerticalPosition : 'center'});
					return;
				}
				
				$('#automaticTashkeelDialog').dialog("destroy").html('<center><br/><h4>يرجى الانتظار ... </h4><br/><br/><img style="width:100px;height:100px;" src="assets/img/loading_2.gif"/></center>').dialog({ awidth: "500",
					 width: "400",
					 modal: true,
					 close: function(event, ui) {
							 $(this).dialog("destroy");
				}});
				
				$.post('mezan/automatedTashkeel',{'poem':autoTashkeelArr,"csrf":hash},function(results){
					$('#automaticTashkeelDialog').dialog("destroy");
					for(var i=0;i<results.length-1;i++)
					{
						$('#'+results[i].forID).val(results[i].result).animate({'background-color':'rgb(255,255,158)'},100).animate({'background-color':'rgb(255, 255, 255)'},1500);
					}
					alertify.success("تمّت عمليّة تشكيل الأشطر بنجاح خلال "+ results[results.length-1].time.toString() +" ثانية.");
				},"json");
			}
			else
			{
				return;
			}
		});
	});
	
	
	
	
	
	// prevent non Arabic characters from being accepted as input !!
	$('#mezan1 input').live('keypress',function(event){
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
	$('#poem').keypress(function(event){
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
	
	
	
	//tips
	$('.tip').live('click',function(){
		var tipID=$(this).attr('tip');
		var t='.tip[tip="'+tipID+'"]';
		if(tipsStatus[tipID]=='t')
		{
			$(t).poshytip('destroy');
			tipsStatus[tipID]='f';
		}
		else
		{
			$('.tip[tip="'+tipID+'"]').poshytip({content:$(this).attr('tipContent'),
						className: 'tip-yellowsimple',
						showOn: 'none',
						alignTo: 'target',
						alignX: 'center',
						alignY: 'bottom',
						offsetY: 5
						});
			$(t).poshytip('show');
			tipsStatus[tipID]='t';
		}		
	});
	
	//go to ajez with error qafeah
	$('li.qafeahError').live('click',function(){
		var q=$(this).attr('qafeahID');
		$.scrollTo('#ajez'+q,300);
		$('#ajez'+q).animate({'background-color':'rgb(255,255,158)'},100).animate({'background-color':'rgb(255, 255, 255)'},2000);
		$('#ajez'+q).focus();
	});

});
