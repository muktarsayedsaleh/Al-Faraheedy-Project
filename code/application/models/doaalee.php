<?php
/*
 *         الدؤلي
 *		   كلاس التشكيل التلقائي لمحارف النص العربي
 *		   بدء كفكرة مستقلة عام 2008 ثمّ تمّ دمجه مع مشروع الفراهيدي
 *         www.faraheedy.com
 *         نواة لمشروع الشاعر الرقمي - المرحلة 2
 *         مهمة هذا الصف اقتراح تشكيلات تلقائية لمحارف النص العربي 
 *         بما يتلاءم و متطلبات الإدخال الخاصة بمشروع الفراهيدي
 *         فكرة و برمجة
 *         مُختار سيِّد صالح
 *         سوريا - دمشق
 *         00963944467547
 *         Mokhtar_ss@hotmail.com
 *         (C) جميع الحقوق محفوظة  2010 
 *         بدء العمل في تحليله 
 *         و وضع أفكاره عام 2008 
 *         و تم البدء في برمجته في
 *         13/4/2010
 *         و انتهت البرمجة في 
 *         17/4/2010
 *         ثمّ خضع للاختبارات و التدقيق و التنقيح حتّى تاريخ 1/5/2010
 *		   ثمّ بقي حبيس الأدراج إلى أن هيّأ الله أسباب إعادة كتابته
 *		   PHP بدء العمل في تحويله إلى لغة
 *		   يوم الاثنين 17/2/2014 في دمشق
 *		   تم الانتهاء من برمجته في دمشق يوم 25-2-2014
 *		   بقيت تضاف إليه تحسينات و أفكار حتّى تاريخ
 *		   16-3-2014
 */
 
 
class doaalee extends CI_Model  {
    
	function __construct(){
        parent::__construct();
		$this->load->database();
    }
	
	private static $alphabet=array('ا','أ','إ','آ','ء','ئ','ؤ','ى','ب','ت','ة','ث','ج','ح','خ','د','ذ','ر','ز','ش','س','ص','ض','ط','ظ','ع','غ','ف','ق','ك','ل','م','ن','ه','و','ي','#','@'); //مصفوفة الأحرف # هو الفراغ! و @ هو السطر الجديد
	private static $harakat=array('ّ','َ','ُ','ِ','ً','ٌ','ٍ','ْ'); //مصفوفة الحركات
	private static $acceptedHarakat=array('ْ','ّ','َّ','ُّ','ِّ','ٌ','ً','ٍ'); //مصفوفة الحركات التي نقبلها كتشكيل تلقائي .. في الفراهيدي هام أما في برنامج تشكيل نصوص مستقل تعتبر عيباً لذلك يجب الاستغناء عن شرط استخدامها في السطر رقم 887
	private static $chars_length=3; // طول المقطع المعتمد في التشكيل (ثلاثيات هي الحالة الافتراضية)
	
	// convert string 2 chars array
	// while # represents (begin) and (end) and (space)
	/*	----------------------------------------
	 *	نسخة مصححة أفضل من الموجودة في موديل الفراهيدي كور
	 *	لذلك يجب أن تنسخ هذه إلى الموديل المذكور بعد اختبارها مطوّلاً
	 *	----------------------------------------
	*/
	private function _str2chars($t){
		$result=array();
		//$t=preg_split('//',$t);
		$t=str_replace(' ','#',$t);
		$t=str_split($t);
		
		set_error_handler(function(){}); // هام لتفادي حدوث خطأ في حال وجود الإندكس خارج الأرراي
										// لا تنسَ نقل هذه الدالة كاملة إلى موديل الفراهيدي كور
		
		for($i=0;$i<=sizeof($t)-1;$i++) // كل حرفين يونيكود معاً هما حرف عربي واحد !!
		{
			if((strcmp($t[$i],'#')!=0 &&
			   strcmp($t[$i+1],'#')!=0) && 
			   (strcmp($t[$i],'@')!=0 &&
			   strcmp($t[$i+1],'@')!=0))
			{
				$char=$t[$i].$t[$i+1];
				array_push($result,$char);
				$i++;
			}
			else if(strcmp($t[$i],'#')==0 || strcmp($t[$i],'@')==0)
			{
				$char=$t[$i];
				array_push($result,$char);
			}
			
		}
		
	
		return $result;
		
	}
	
	// input will be cleaning also from non-alpha-harakat
	// and any addition space will be deleted
	private function _cleanStr($t){
		if(strcmp($t[0],'#')!=0)
		{
			$result=array('#');
		}
		else
		{
			$result=array();
		}
		$t = preg_replace("/[\r\n]+/", "@", $t);
		while(strstr($t,' '))
		{
			$t=str_replace(' ','#',$t);
		}
		while(strstr($t,'##'))
		{
			$t=str_replace('##','#',$t);
		}
		
		// إزالة علامات الترقيم
		$punctuations=array('؟','?','/','\\','!',':','-','"',')','(',',',',');
		foreach($punctuations as $p)
		{
			while(strstr($t,$p))
			{
				$t=str_replace($p,'',$t);
			}
		}
		
		$t=self::_str2chars($t);
		for($i=0;$i<sizeof($t);$i++) // كل حرفين مشفرات هن حرف عادي !
		{
			if(in_array($t[$i],self::$alphabet)===true ||
			   in_array($t[$i],self::$harakat)===true)
			{
				array_push($result,$t[$i]);
			}
		}
		
		if(strcmp($t[count($t)-1],'#')!=0)
		{
			array_push($result,'#');
		}
		//var_dump(implode($result));
		return implode($result);
	}
	
	// special cases 
	private function _specialCases($t){
		$t=self::_cleanStr($t);
		
		$patterns=array();
		$replacements=array();
		
		
		// بداية الفكرة الجديدة
		
		// محاولة تطبيق فكرة جديدة لتوليد المعجم و تعابيره النظامية بشكل ديناميكي
		// ألغيت لعدم كفاءتها بعد التجريب من حيث نتائج التشكيل
		// لا من حيث المنطق البرمجي
		// في حال تفعيلها يمكن الاستغناء عن كثير من أسطر هذا الملف البرمجي لاحقة الذكر
		
		
		// جزء يضاف إلى تعبير نظامي لتمثيل الضمائر المتصلة في آخر الكلمة
		// $suffixExpr = "(ه[ًٌٍَُِّْ]*|ه[ًٌٍَُِّْ]*ا[ًٌٍَُِّْ]*|ه[ًٌٍَُِّْ]*ن[ًٌٍَُِّْ]*|ه[ًٌٍَُِّْ]*م[ًٌٍَُِّْ]*|ه[ًٌٍَُِّْ]*م[ًٌٍَُِّْ]*ا[ًٌٍَُِّْ]*|ك[ًٌٍَُِّْ]*|ك[ًٌٍَُِّْ]*م[ًٌٍَُِّْ]*|ك[ًٌٍَُِّْ]*ن[ًٌٍَُِّْ]*|ك[ًٌٍَُِّْ]*م[ًٌٍَُِّْ]*ا[ًٌٍَُِّْ]*|ن[ًٌٍَُِّْ]*ا[ًٌٍَُِّْ]*)*";
		// المعجم لتمثيل الكلمات الشائعة
		// المصفوفة الأولى الكلمة
		// المصفوفة الثانية تشكيلها
		// $dictionary = array(array(),array());
		
		// أحرف الجر
		// array_push($dictionary[0],"في");array_push($dictionary[1],"فيْ");
		// array_push($dictionary[0],"من");array_push($dictionary[1],"منْ");
		// array_push($dictionary[0],"إلي");array_push($dictionary[1],"إليْ");
		// array_push($dictionary[0],"إلي");array_push($dictionary[1],"إليْ");
		
		// foreach($dictionary[0] as $key=>$wordOfDic)
		// {
			// $tArr=self::_str2chars($wordOfDic);
			// $currentWordExpr="/(#|@)(";
			// foreach($tArr as $_c)
			// {
				// $currentWordExpr.=$_c."[ًٌٍَُِّْ]*"; // إضافة احتمال تحريك الحرف باي حركة ممكنة
			// }
			// $currentWordExpr.=")";
			// $currentWordExpr.=$suffixExpr;
			// $currentWordExpr.="(#|@)/";
			
			// $currentReplacement= "\${1}";
			// $currentReplacement.=$dictionary[1][$key];
			// $currentReplacement.="\${3}\${4}";
			
			// array_push($patterns,$currentWordExpr);
			// array_push($replacements,$currentReplacement); 
		// }
		
		
		// نهاية الفكرة الجديدة
		
		
		$sunny_letters=array('ت','ث','د','ذ','ر','ز','س','ش','ص','ض','ط','ظ','ل','ن');
		
		
		$tArr=self::_str2chars($t);
		// ال الشمسية في بداية الشطر
		if(strcmp($tArr[0],'#')==0 &&
			    strcmp($tArr[1],'ا')==0 &&
			    strcmp($tArr[2],'ل')==0 && 
				in_array($tArr[3],$sunny_letters)===true)
		{
			$tArr[0]='#';
			$tArr[1]='ا';
			if(strcmp($tArr[4],'ّ')!=0)
			{
				$tmp=array();
				array_push($tmp,$tArr[3]);
				array_push($tmp,'ّ');
				$tArr[3]=implode($tmp);
			}
		}
		
		
		// تزبيط بداية السلسلة النصية
		if(strcmp($tArr[0],'#')!=0)
		{
			$tmp=array();
			array_push($tmp,'#');
			array_push($tmp,$tArr[0]);
			$tArr[0]=implode($tmp);
		}
		$xx=array_pop($tArr);
		if(strcmp($xx,'#')!=0)
		{
			array_push($tArr,$xx);
			array_push($tArr,'#');
		}
		else
		{
			array_push($tArr,'#');
		}
		$t=implode($tArr);
		
		
		 //var_dump($t);
		
		
		
		
		// الموازين الصرفية
		// بعض التكرار ضروري لتلافي بعض الأخطاء
		// مثلاً في حالة فعيل و فعيلة إذا لم يتكرر التعبير مرتين
		// فإن جملة مثل رشيد رشيد رشيد رشيد
		// ستشكل رشيد الأولى و الثالثة فقط دون الرابعة و الثانية !!!
		// أتصور أن المشكلة من التعبير النظامي نفسه
		// أو من طريقة استدعاء دالة 
		// preg_replace
		// تراجع لاحقاً ...
			//فعيل و فعيلة
		array_push($patterns,"/([#@])(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)ي(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(ة)*([#@])/"); 
		array_push($replacements,"\${1}\${2}\${3}يْ\${4}\${5}\${6}"); 

		
			//الفعيل و الفعيلة
		array_push($patterns,"/([#@])ال(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)ي(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(ة)*([#@])/"); 
		array_push($replacements,"\${1}ال\${2}\${3}يْ\${4}\${5}\${6}");  
		
			//فعيل و فعيلة
		array_push($patterns,"/([#@])(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)ي(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(ة)*([#@])/"); 
		array_push($replacements,"\${1}\${2}\${3}يْ\${4}\${5}\${6}"); 

		
			//الفعيل و الفعيلة
		array_push($patterns,"/([#@])ال(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)ي(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(ة)*([#@])/"); 
		array_push($replacements,"\${1}ال\${2}\${3}يْ\${4}\${5}\${6}");  
		
		
			// فعول فعولة
		array_push($patterns,"/([#@])(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)و(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(ة)*([#@])/"); 
		array_push($replacements,"\${1}\${2}\${3}وْ\${4}\${5}\${6}"); 

		
			// الفعول الفعولة
		array_push($patterns,"/([#@])ال(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)و(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(ة)*([#@])/"); 
		array_push($replacements,"\${1}ال\${2}\${3}وْ\${4}\${5}\${6}");  
		
			// استفعل
		array_push($patterns,"/([#@])اس(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)([#@])/"); 
		array_push($replacements,"\${1}اس\${2}\${3}ْ\${4}\${5}\${6}");  	

			// مفعول
		array_push($patterns,"/([#@])م(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)و(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)([#@])/"); 
		array_push($replacements,"\${1}م\${2}ْ\${3}وْ\${4}\${5}");  	
			// المفعول
		array_push($patterns,"/([#@])الم(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)و(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)([#@])/"); 
		array_push($replacements,"\${1}الم\${2}ْ\${3}وْ\${4}\${5}");  	
		
			// مفعال
		array_push($patterns,"/([#@])م(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)ا(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)([#@])/"); 
		array_push($replacements,"\${1}م\${2}ْ\${3}اْ\${4}\${5}");
			// المفعال
		array_push($patterns,"/([#@])الم(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)ا(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)([#@])/"); 
		array_push($replacements,"\${1}الم\${2}ْ\${3}اْ\${4}\${5}");  	
		
			// أفعل
		array_push($patterns,"/([#@])أ(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)([#@])/"); 
		array_push($replacements,"\${1}أ\${2}ْ\${3}\${4}\${5}");
			// الأفعل
		array_push($patterns,"/([#@])الأ(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)([#@])/"); 
		array_push($replacements,"\${1}الأ\${2}ْ\${3}\${4}\${5}");  	
		
			// فعلى
		array_push($patterns,"/([#@])(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)ى([#@])/"); 
		array_push($replacements,"\${1}\${2}\${3}ْ\${4}ى\${5}");
			// الفعلى
		array_push($patterns,"/([#@])ال(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)ى([#@])/"); 
		array_push($replacements,"\${1}ال\${2}\${3}ْ\${4}ى\${5}");

			// مفعل و مفعلة
		array_push($patterns,"/([#@])م(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(ة)*([#@])/"); 
		array_push($replacements,"\${1}م\${2}ْ\${3}\${4}\${5}\${6}");  
		
			//  فاعول و فاعولة
		array_push($patterns,"/([#@])(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)ا(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)و(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(ة)*([#@])/"); 
		array_push($replacements,"\${1}\${2}اْ\${3}وْ\${4}\${5}\${6}");
			//  الفاعول و الفاعولة
		array_push($patterns,"/([#@])ال(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)ا(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)و(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(ة)*([#@])/"); 
		array_push($replacements,"\${1}ال\${2}اْ\${3}وْ\${4}\${5}\${6}");  
		
			//  إفعال
		array_push($patterns,"/([#@])إ(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)ا(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)([#@])/"); 
		array_push($replacements,"\${1}إ\${2}ْ\${3}اْ\${4}\${5}");
			//  الإفعال
		array_push($patterns,"/([#@])الإ(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)ا(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)([#@])/"); 
		array_push($replacements,"\${1}الإ\${2}ْ\${3}اْ\${4}\${5}");

			//  أفعال
		array_push($patterns,"/([#@])أ(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)ا(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)([#@])/"); 
		array_push($replacements,"\${1}أ\${2}ْ\${3}اْ\${4}\${5}");
			//  الأفعال
		array_push($patterns,"/([#@])الأ(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)ا(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)([#@])/"); 
		array_push($replacements,"\${1}الأ\${2}ْ\${3}اْ\${4}\${5}");  
		
		
		
		
		
		
		
		
		
		
		
		//  الأحرف
		array_push($patterns,"/(#|@)من(ه|ك|ها)*(#|@)/"); // من , منه , منك , منها
		array_push($replacements,"\${1}مِنْ\${2}\${3}"); 
		
		array_push($patterns,"/(#|@)(م|ع)ني(#|@)/"); // مني و عني
		array_push($replacements,"\${1}\${2}نّيْ\${3}"); 
		
		array_push($patterns,"/(#|@)من(كم|هم)(#|@)/"); // منكم , منهم
		array_push($replacements,"\${1}منْ\${2}ْ\${3}"); 
		
		array_push($patterns,"/(#|@)منهن(#|@)/"); // منهن
		array_push($replacements,"\${1}منْهنّ\${2}"); 
		
		array_push($patterns,"/(#|@)(إ|ع)لي(ه|ها|نا|ك)(#|@)/"); // إليهم , إليها , إليك , إلينا 
		array_push($replacements,"\${1}\${2}ليْ\${3}\${4}");// عليهم , عليها , عليك , علينا
		
		
		array_push($patterns,"/(#|@)(إ|ع)ليهن(#|@)/"); // إليهن , عليهن
		array_push($replacements,"\${1}\${2}ليْهنّ\${3}");
		
		array_push($patterns,"/(#|@)(إ|ع)لي(كم|هم)(#|@)/"); // عليكم , عليهم , إليكم , إليهم
		array_push($replacements,"\${1}\${2}ليْ\${3}ْ\${4}"); 
		
		
		array_push($patterns,"/(#|@)في(ه|ك|ها)*(#|@)/"); // في, فيه , فيك , فيها
		array_push($replacements,"\${1}فِيْ\${2}\${3}"); 
		
		array_push($patterns,"/(#|@)في(كم|هم)(#|@)/"); //  فيكم , فيهم
		array_push($replacements,"\${1}فيْ\${2}ْ\#{3}"); 
		
		array_push($patterns,"/(#|@)فيهن(#|@)/"); // فيهن
		array_push($replacements,"\${1}فيْهنّ\${2}");  
		
		array_push($patterns,"/(#|@)لن(#|@)/"); // لن
		array_push($replacements,"\${1}لنْ\${2}");  
		
		array_push($patterns,"/(#|@)حتى(#|@)/"); // حتى
		array_push($replacements,"\${1}حتّى\${2}"); 
		
		array_push($patterns,"/(#|@)لولا(ك*|نا|ه|ها)*(#|@)/"); // لولا , لولاه , لولاك , لولانا , لولاها
		array_push($replacements,"\${1}لوْلا\${2}\${3}");  
		
		array_push($patterns,"/(#|@)لولاهن(#|@)/"); // لولاهن
		array_push($replacements,"\${1}لوْلاهنّ\${2}");  
		
		
		// إنّ و أخواتها
		array_push($patterns,"/(#|@)ليت(ك*|نا|ه|ها|هما)*(#|@)/"); // ليت , ليتك , ليتنا , ليته , ليتها , ليتهما
		array_push($replacements,"\${1}ليْت\${2}\${3}");
		
		array_push($patterns,"/(#|@)ليت(هم|كم|ني)*(#|@)/"); // ليتهم , ليتكم , ليتني
		array_push($replacements,"\${1}ليْت\${2}ْ\${3}");  
		
		array_push($patterns,"/(#|@)ليت(هن)*(#|@)/"); // ليتهنّ
		array_push($replacements,"\${1}ليْت\${2}ّ\${3}");
		
		
		array_push($patterns,"/(#|@)لعل(ك*|نا|ه|ها|هما|كما)*(#|@)/"); // لعلّ , لعلّك , لعلّنا , لعلّه , لعلّها , لعلّهما , لعلّكما
		array_push($replacements,"\${1}لعلّ\${2}\${3}");
		
		array_push($patterns,"/(#|@)لعل(هم|كم|ي)*(#|@)/"); //لعلّهم , لعلكم , لعلّي
		array_push($replacements,"\${1}لعلّ\${2}ْ\${3}");  
		
		array_push($patterns,"/(#|@)لعل(هن)*(#|@)/"); // لعلهنّ
		array_push($replacements,"\${1}لعلّ\${2}ّ\${3}");
		
		
		
		// كان و أخواتها

		array_push($patterns,"/(#|@)لس(ت|نا|ن)*(#|@)/"); // لست , لسنا , لسن
		array_push($replacements,"\${1}لسْ\${2}\${3}");
		
		array_push($patterns,"/(#|@)ليس(ت|وا)*(#|@)/"); //ليس و ليست و ليسوا
		array_push($replacements,"\${1}ليْس\${2}ْ\${3}");  
		
		
		
		
		
		//الصفات
		// جداً
		
		// الأسماء الحسنى
		
		//مفردات المعجم
		
		
		
		
		
		
		
		
		// الحرف الشمسي مشدد دائماً
		// اللام الشمسيَّة
		// تم دمج جميع التعابير النظامية الخاصة بدالة الفراهيدي بتعبير نظامي وحيد في مشروع الدّؤليّ و ذلك لتسريع الزمن
		array_push($patterns,"/(ا[َُِْ]*|ى[َُِْ]*|ي[ُِْ]*|وْ|ي[َّ]*|ة[َُِ]*|و)*(#|@)*([فكب]*)ال(ت|ث|د|ذ|ر|ز|س|ش|ص|ض|ط|ظ|ل|ن)/");
		array_push($replacements,"\${1}\${2}\${3}ال\${4}ّ");
		
		
		
		// الحرف قبل الألف مفتوح دائماً
		array_push($patterns,"/([ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ظ|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي])(ا|ى)/");
		array_push($replacements,"\${1}َ\${2}");
		
		// الحرف قبل الواو الساكنة مضموم دائماً -- معطل حالياً
		// array_push($patterns,"/([ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ظ|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي])(وْ)/");
		// array_push($replacements,"\${1}ُوْ");
		
		
		
		// الألف و الألف المقصورة ساكنة دائماً
		array_push($patterns,"/(ا|ى)ْ/"); //حذف المسكن من المستخدم لجعل الحالة الافتراضية غير متحرك
		array_push($replacements,"\${1}"); 
		
		array_push($patterns,"/(ا|ى)/"); //حذف المسكن من المستخدم لجعل الحالة الافتراضية غير متحرك
		array_push($replacements,"\${1}ْ"); //التسكين التلقائي
		
		array_push($patterns,"/(#|@)اْ/"); //حذف تسكين الألف في بداية الكلمة
		array_push($replacements,"\${1}ا"); 
		
		
		
		
		//حذف الشدة في حال تكررت مرتين على نفس الحرف
		array_push($patterns,"/(أ|ب|ت|ث|ج|ح|خ|د|ذ|ر|ز|س|ش|ص|ض|ط|ع|غ|ف|ق|ك|ل|م|ن|ه|و|ي)ّّ/"); 
		array_push($replacements,"\${1}ّ"); 
		
		//حذف السكون من لام أل التعريف -- هام من أجل الفراهيدي
		// نقلت هذه الأسطر إلى نهاية دالة التشكيل
		//array_push($patterns,"/(#|@)الْ(.*)(#|@)/"); 
		//array_push($replacements,"\${1}ال\${2}\${3}");
		
		
		//var_dump('before REGEX : ',$t);
		$t=preg_replace($patterns,$replacements,$t);
		$t=preg_replace($patterns,$replacements,$t); // التكرار الثاني ضروري لأن التطبيق الأول للدالة يشكل نصف الحالات فقط و الثاني يكمل
		//var_dump('after REGEX : ',$t);
		return $t;
		
	}
	
	// get chars only
	// included space (#) 
	// space is important in this model !
	private function _getCharsOnly($t){
		$t=self::_str2chars($t);
		$res=array();
		for($i=0;$i<count($t);$i++)
		{
			if(in_array($t[$i],self::$alphabet)===true)
		    {
			   array_push($res,$t[$i]);
		    }
		}
		return implode($res);
	}
	
	// get harakat only
	private function _getHarakatOnly($t){
		$t=self::_str2chars($t);
		$res=array();
		for($i=0;$i<count($t)-1;$i++)
		{
			if(in_array($t[$i],self::$harakat)===true)
		    {
			   array_push($res,$t[$i]);
		    }
			else if(strcmp($t[$i],'#')==0)
			{
			   array_push($res,'#');
			}
		}
		$res=implode($res);

		$res=str_replace('ِ','َ',$res);
		$res=str_replace('ُ','َ',$res);
		return $res;
	}
	
	
	



	

	
	
	
	
	
	
	
	/* public functions begin */
	// التدريب
	public function doTraining($t,$sessionID){
		
		// استخدام كامل موارد السيرفر المسموحة دون تقييد لمساحة الذاكرة المخصصة
		// خطير لكن ضروري للنصوص الكبيرة (القرآن الكريم مثلاً) ... إلخ
		ini_set('memory_limit', '-1');
		
		
	
		/* تهيئة النص */
		 $t=self::_specialCases($t); // clean text in embedded here !!
		 while(strstr('##',$t))
			{
				$t=str_replace('##','#',$t);
			}
		/* نهاية تهيئة النص */
		
		
		
		
		// الخطوة الأولى
		// تحويل النص إلى ثلاثيات مشكولة
		// ملحوظة : لتحويل العملية إلى رباعيات أو خماسيات
		// فقط قم بتغيير الرقم إلى الرقم المناسب في متغير 
		// $chars_length;
		$chars=self::_str2chars($t);
		$three_chars=array();
		$i=0;
		$currentThreeChars='';
		$last_key = end(array_keys($chars));
		
		
		// تصفير البروجرس بار للمرحلة الأولى
		$data = array(
		   'done' => 0,
		   'stageNo' => 1, //رقم المرحلة
		   'total' => count($chars)
		);
		$this->db->where('sessionID',$sessionID);
		$this->db->update('training_progress', $data);
		
		
		$iterateNo=0; //عداد إنجاز المرحلة الأولى
		foreach($chars as $key=>$c)
		{	
			if($i>=self::$chars_length)
			{
				if(in_array($c,self::$alphabet)===true)
				{
				   array_push($three_chars,$currentThreeChars);
				   $currentThreeChars='';
				   $i=0;
				}
			}
			
			$currentThreeChars.=$c;
			if(in_array($c,self::$alphabet)===true)
		    {
			   $i++;
		    }
			
			if( $key == $last_key){ 
				array_push($three_chars,$currentThreeChars);
				$currentThreeChars='';
				$i=0;
			}
			
			$iterateNo++;
			if($iterateNo%50==0) // تقليل عدد مرات الكتابة على قاعدة البيانات من أجل الأداء لأن الحلقة ستنفذ مئات آلاف المرات في حال كون النص طويل
			{
				$data = array(
				   'done' => $iterateNo
				);
				$this->db->where('sessionID',$sessionID);
				$this->db->update('training_progress', $data);
			}
		}
		
		
		
		
		// المرحلة الثانية
		// إذا كان هناك ثلاثيات حروفها أقل من الحروف المحددة
		// مثلاً ثلاثية بحرفين => زيادة حرف هاش
		
		// تصفير البروجرس بار للمرحلة الثانية
		$data = array(
		   'done' => 0,
		   'stageNo' => 2,
		   'total' => count($three_chars)
		);
		$this->db->where('sessionID',$sessionID);
		$this->db->update('training_progress', $data);
		
		
		$threeCharsCount=0; // عداد الثلاثيات الكلّي من أجل البروجرس بار
		foreach($three_chars as $key=>$cc)
		{
			if(count(self::_str2chars(self::_getCharsOnly($cc))<self::$chars_length))
			{
				$diff=self::$chars_length-count(self::_str2chars(self::_getCharsOnly($cc)));
				for($j=1;$j==$diff;$j++)
				{
					$three_chars[$key].='#';
				}
			}
			
			$threeCharsCount++;
			if($threeCharsCount%50==0)
			{
				$data = array(
				   'done' => $threeCharsCount
				);
				$this->db->where('sessionID',$sessionID);
				$this->db->update('training_progress', $data); 
			}
		}
		
		// نهاية تحويل النص إلى ثلاثيات مشكولة في مصفوفة 
		// $three_chars
		// نهاية
		
		
		// المرحلة الثالثة
		// التدريب
		
		
		// تصفير البروجرس بار للمرحلة الثالثة
		$data = array(
		   'done' => 0,
		   'stageNo' => 3,
		   'total' => count($three_chars)
		);
		$this->db->where('sessionID',$sessionID);
		$this->db->update('training_progress', $data);
		
		
		//تفريغ قاعدة البيانات قبل التدريب
		// ممكن في حال أجري التدريب أوف لاين
		// أما في حالة الأون لاين من الأفضل إلغاؤه
		//$this->db->query('TRUNCATE TABLE `tashkeel_3`');
		
		
		// التعبئة على قاعدة البيانات
		$done=0; // عداد عملية التدريب التامة من أجل البروجرس بار
		foreach($three_chars as $key=>$cc)
		{
			//var_dump($cc);
			$currentAlphas=array(); // حروف الثلاثية الحالة
			$currentHarakat=array(); // حركات الثلاثية الحالية
			$t=self::_str2chars($cc);
			for($i=count($t)-1;$i>=0;$i--)
			{
				if(in_array($t[$i],self::$alphabet)===true)
				{
					if(strcmp($t[$i],'#')!=0)
					{
						array_push($currentAlphas,$t[$i]);
						array_push($currentHarakat,'');
					}
					else
					{
						array_push($currentAlphas,$t[$i]);
						array_push($currentHarakat,$t[$i]);
					}
				}
				else if(in_array($t[$i],self::$harakat)===true)
				{
					if(array_key_exists($i-1,$t))
					{
						array_push($currentAlphas,$t[$i-1]);
					}
					else
					{
						array_push($currentAlphas,'');
					}
					array_push($currentHarakat,$t[$i]);
					$i--;
				}
			}
			
			$currentAlphas=array_reverse($currentAlphas,false);
			$currentHarakat=array_reverse($currentHarakat,false);
			//var_dump(implode($currentAlphas));
			//var_dump(implode($currentHarakat));
			
			$data = array(
               'chars' => implode($currentAlphas),
               'tashkeel' => implode($currentHarakat),
			   'charsWithTashkeel' => $cc,
			   'sessionID' => $sessionID
            );
			$this->db->insert('tashkeel_3', $data);
			
			
			$done++;
			if($done%50==0) 
			{
				$data = array(
				   'done' => $done
				);
				$this->db->where('sessionID',$sessionID);
				$this->db->update('training_progress', $data); 
			}
		}
		
		
		//تصفير العداد من أجل المرة القادمة
		// كي يعرض البروجرس بار بشكل صحيح !
		// تصفير البروجرس بار للمرحلة الأولى
		$data = array(
		   'done' => 0,
		   'stageNo' => 1, //رقم المرحلة
		   'total' => count($chars)
		);
		$this->db->where('sessionID',$sessionID);
		$this->db->update('training_progress', $data);
		// return $result;
	}
	
	// التشكيل الآليّ
	public function doTashkeel($t,$sessionID){
		
		// استخدام كامل موارد السيرفر المسموحة دون تقييد لمساحة الذاكرة المخصصة
		// خطير لكن ضروري للنصوص الكبيرة 
		ini_set('memory_limit', '-1');
		
		//var_dump('beforeCleaning <br/>',$t);
		/* تهيئة النص */
		 $t=self::_specialCases($t); // clean text in embedded here !!
		 while(strstr('##',$t))
			{
				$t=str_replace('##','#',$t);
			}
		/* نهاية تهيئة النص */
		
		//var_dump('afterCleaning <br/>',$t);
		
		
		// الخطوة الأولى
		// تحويل النص إلى ثلاثيات مشكولة
		// ملحوظة : لتحويل العملية إلى رباعيات أو خماسيات
		// فقط قم بتغيير الرقم إلى الرقم المناسب في متغير 
		// $chars_length;
		$chars=self::_str2chars($t);
		$three_chars=array();
		$i=0;
		$currentThreeChars='';
		
		$last_key = end(array_keys($chars));
		
		
		// تصفير البروجرس بار للمرحلة الأولى
		$data = array(
		   'done' => 0,
		   'stageNo' => 1, //رقم المرحلة
		   'total' => count($chars)
		);
		$this->db->where('sessionID',$sessionID);
	    $this->db->update('tashkeel_progress', $data);
		
		
		$iterateNo=0; //عداد إنجاز المرحلة الأولى
		foreach($chars as $key=>$c)
		{	
			if($i>=self::$chars_length)
			{
				if(in_array($c,self::$alphabet)===true)
				{
				   array_push($three_chars,$currentThreeChars);
				   $currentThreeChars='';
				   $i=0;
				}
			}
			
			$currentThreeChars.=$c;
			if(in_array($c,self::$alphabet)===true)
		    {
			   $i++;
		    }
			
			if( $key == $last_key){ 
				array_push($three_chars,$currentThreeChars);
				$currentThreeChars='';
				$i=0;
			}
			
			$iterateNo++;
			if($iterateNo%50==0) // تقليل عدد مرات الكتابة على قاعدة البيانات من أجل الأداء لأن الحلقة ستنفذ مئات آلاف المرات في حال كون النص طويل
			{
				$data = array(
				   'done' => $iterateNo
				);
				$this->db->where('sessionID',$sessionID);
				$this->db->update('tashkeel_progress', $data);
			}
		}
		
		
		
		
		// المرحلة الثانية
		// إذا كان هناك ثلاثيات حروفها أقل من الحروف المحددة
		// مثلاً ثلاثية بحرفين => زيادة حرف هاش
		
		// تصفير البروجرس بار للمرحلة الثانية
		$data = array(
		   'done' => 0,
		   'stageNo' => 2,
		   'total' => count($three_chars)
		);
		$this->db->where('sessionID',$sessionID);
		$this->db->update('tashkeel_progress', $data);
		
		
		$threeCharsCount=0; // عداد الثلاثيات الكلّي من أجل البروجرس بار
		foreach($three_chars as $key=>$cc)
		{
			if(count(self::_str2chars(self::_getCharsOnly($cc))<self::$chars_length))
			{
				$diff=self::$chars_length-count(self::_str2chars(self::_getCharsOnly($cc)));
				for($j=1;$j==$diff;$j++)
				{
					$three_chars[$key].='#';
				}
			}
			
			$threeCharsCount++;
			if($threeCharsCount%50==0)
			{
				$data = array(
				   'done' => $threeCharsCount
				);
				$this->db->where('sessionID',$sessionID);
				$this->db->update('tashkeel_progress', $data); 
			}
		}
		
		// نهاية تحويل النص إلى ثلاثيات مشكولة في مصفوفة 
		// $three_chars
		// نهاية
		
		
		// المرحلة الثالثة
		// التدريب
		
		
		// تصفير البروجرس بار للمرحلة الثالثة
		$data = array(
		   'done' => 0,
		   'stageNo' => 3,
		   'total' => count($three_chars)
		);
		$this->db->where('sessionID',$sessionID);
		$this->db->update('tashkeel_progress', $data);
		
		
	
		
		// إجراء التشكيل الفعلي
		$done=0; // عداد عملية التدريب التامة من أجل البروجرس بار
		$finalResult= array();
		foreach($three_chars as $key=>$cc)
		{
			//var_dump($cc);
			$currentAlphas=array(); // حروف الثلاثية الحالية
			$currentHarakat=array(); // حركات الثلاثية الحالية
			$t=self::_str2chars($cc);
			for($i=count($t)-1;$i>=0;$i--)
			{
				if(in_array($t[$i],self::$alphabet)===true)
				{
					if(strcmp($t[$i],'#')!=0 && strcmp($t[$i],'@')!=0)
					{
						array_push($currentAlphas,$t[$i]);
						array_push($currentHarakat,'');
					}
					else
					{
						array_push($currentAlphas,$t[$i]);
						array_push($currentHarakat,$t[$i]);
					}
				}
				else if(in_array($t[$i],self::$harakat)===true)
				{
					if(array_key_exists($i-1,$t))
					{
						array_push($currentAlphas,$t[$i-1]);
					}
					else
					{
						array_push($currentAlphas,'');
					}
					array_push($currentHarakat,$t[$i]);
					$i--;
				}
			}
			
			$currentAlphas=implode(array_reverse($currentAlphas,false));
			$currentHarakat=implode(array_reverse($currentHarakat,false));
			
			// جلب التشكيل الاكثر تكراراً و الموافق لهذه الثلاثية من قاعدة البيانات
			// هنا قد يظهر نسبة خطأ لأن تكراره أكثر شيء لا يجعله صحيحاً بالضرورة
			// و هذا السطر هو عيب الخوارزميّة الإحصائيّة
			//هاااااااااااااااااااام هنا يتم الجلب من الجدول الفعلي و ليس من جدول تدريبات المستخدمين
			$suggesstedResult = $this->db->query("select * from (SELECT Count(id) as `RepeatingNO`,`chars`,`charsWithTashkeel` as `result` FROM `tashkeel_3_real` group by `chars`,`tashkeel` having `chars` = '".$currentAlphas."') as l order by `l`.`RepeatingNO` desc")->result()[0]->result;
			
			
			// تحويل الثلاثية إلى الحالية إلى مصفوفة أحرف فقط
			// و مصفوفة حركات كل حرف منها من النص الأصلي
			// إذا كان أحد الأحرف غير متحرك من دخل المستخدم نضع عنصر فارغ موافق له في مصفوفة الحركات
			$currentResult=array();
			$currentThreeAlphas=array(); // حروف الثلاثية الحالية
			$currentThreeHarakat=array(); // حركات الثلاثية الحالية
			$t=self::_str2chars($cc);
			for($i=0;$i<=count($t)-1;$i++)
			{
				if(in_array($t[$i],self::$alphabet)===true)
				{
					array_push($currentThreeAlphas,$t[$i]);
					$h='';
					for($j=$i+1,$flag=true;$j<count($t);$j++)
					{
						if($flag)
						{
							if(in_array($t[$j],self::$alphabet)===true)
							{
								$flag=false;
								break;
							}
							else if(in_array($t[$j],self::$harakat)===true)
							{
								$h.=$t[$j];
							}
						}
					}
					array_push($currentThreeHarakat,$h);
				}
			}
			
			
			//بعد جلب التشكيل المقترح
			//تحويل المقترح إلى مصفوفة حركات مناسبة لترتيب الأحرف و عددها
			$suggestedThreeHarakatArr=array(); // حركات الثلاثية الحالية
			$t=self::_str2chars($suggesstedResult);
			for($i=0;$i<=count($t)-1;$i++)
			{
				if(in_array($t[$i],self::$alphabet)===true)
				{
					$h='';
					for($j=$i+1,$flag=true;$j<count($t);$j++)
					{
						if($flag)
						{
							if(in_array($t[$j],self::$alphabet)===true)
							{
								$flag=false;
								break;
							}
							else if(in_array($t[$j],self::$harakat)===true)
							{
								$h.=$t[$j];
							}
						}
					}
					array_push($suggestedThreeHarakatArr,$h);
				}
			}
			
			
			//var_dump($currentThreeAlphas); // الثلاثية أحرف مدخلة من المستخدم
			//var_dump($currentThreeHarakat); // الثلاثية حركات مدخلة من المستخدم
			//var_dump($suggestedThreeHarakatArr); // الثلاثية حركت مقترحة للاحرف من البرمجية

			//التشكيل التلقائي
			// إذا كان الحرف مشكل من قبل المستخدم يعتبر تشكيل المستخدم هو الصحيح و الأساس
			// إذا كان الحرف غير مشكل من المستخدم نضع التشكيل المقترح شرط أن يكون
			// شدة أو سكون أو تنوين
			// من الممكن الاستغناء عن هذا الشرط في برنامج تشكيل كامل
			// لكن للفراهيدي الشرط ضرورة و ليس ترفاً
			$currentResultWithSuggestedTashkeel=array();
			for($i=0;$i<count($currentThreeAlphas);$i++)
			{
				array_push($currentResultWithSuggestedTashkeel,$currentThreeAlphas[$i]);
				if(strcmp($currentThreeHarakat[$i],'')!=0) // الحفظ على حركات المستخدم و اعتبارها صحيحة
				{
					array_push($currentResultWithSuggestedTashkeel,$currentThreeHarakat[$i]);
				}
				else
				{
					// تعطيل الشرط التالي يشكل جميع الأحرف
					// تفعيل الشرط يشكل فقط الأحرف الساكنة و المنونة و المشددة و هو ما
					// يحتاجه مشروع الفراهيدي فقط و لهذا تم تفعيل الشرط افتراضياً
					// بغية دمع الدؤلي مع الفراهيدي
					if(in_array($suggestedThreeHarakatArr[$i],self::$acceptedHarakat)===true)
					{
						array_push($currentResultWithSuggestedTashkeel,$suggestedThreeHarakatArr[$i]);
					}
				}
			}
			
			
			array_push($finalResult,implode($currentResultWithSuggestedTashkeel));
			
			
			
			$done++;
			if($done%50==0) 
			{
				$data = array(
				   'done' => $done
				);
				$this->db->where('sessionID',$sessionID);
				$this->db->update('tashkeel_progress', $data); 
			}
		}
		
		
		//تصفير العداد من أجل المرة القادمة
		// كي يعرض البروجرس بار بشكل صحيح !
		// تصفير البروجرس بار للمرحلة الأولى
		$data = array(
		   'done' => 0,
		   'stageNo' => 1, //رقم المرحلة
		   'total' => count($chars)
		);
		$this->db->where('sessionID',$sessionID);
		$this->db->update('tashkeel_progress', $data);
		
		

		/* حذف التشكيل من ال الشمسية أو القمرية */
		//حذف السكون من لام أل التعريف -- هام من أجل الفراهيدي
		$patterns=array();
		$replacements=array();
		array_push($patterns,"/(#|@)الْ/"); 
		array_push($replacements,"\${1}ال");
		$finalResult=preg_replace($patterns,$replacements,$finalResult);
		$finalResult=preg_replace($patterns,$replacements,$finalResult); // التكرار هام أيضاً
		/* نهاية حذف التشكيل من لام ال الشمية أو القمرية */
		
		
		
		$finalResult = implode($finalResult);
		while(strstr('##',$finalResult))
		{
			$finalResult=str_replace('##','#',$finalResult);
		}
		$finalResult=str_replace('#',' ',$finalResult);
$finalResult=str_replace('@','
',$finalResult); // السطر هذا ضروري للنزول سطراً جديدة بدلاً من \n أو \r
		
		
		return $finalResult;
	}
	
	/* public functions end */
}