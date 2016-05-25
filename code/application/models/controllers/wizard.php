<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class wizard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->database();
		$this->load->helper('url');
		/* ------------------ */	
		
		$this->load->model('core');
		//session library
		$this->load->library('session');
	}

	
	public function index()
	{
		$this->load->view('gui/wizard');
	}
	
	public function getBo7or()
	{
		$bo7or=array();
		$t=$this->input->post('t');
		if(strcmp($t,'t')==0)
		{
			$bo7or['kamel'] = 'البحر الكامل';
			$bo7or['rajaz'] = 'بحر الرّجز';
			$bo7or['hazaj'] = 'بحر الهزج';
			$bo7or['ramal'] = 'بحر الرّمل';
			$bo7or['wafer'] = 'البحر الوافر';
			$bo7or['mutakareb'] = 'البحر المتقارب';
			$bo7or['mutadarak'] = 'البحر المتدارك';
		}
		else if(strcmp($t,'a')==0)
		{
			$bo7or['taweel'] = 'البحر الطويل';
			$bo7or['baseet'] = 'البحر البسيط';
			$bo7or['kamel'] = 'البحر الكامل';
			$bo7or['madeed'] = 'البحر المديد';
			$bo7or['rajaz'] = 'بحر الرّجز';
			$bo7or['ramal'] = 'بحر الرّمل';
			$bo7or['saree3'] = 'البحر السّريع';
			$bo7or['khafeef'] = 'البحر الخفيف';
			$bo7or['munsare7'] = 'البحر المنسرح';
			$bo7or['wafer'] = 'البحر الوافر';
			$bo7or['o7othKamel'] = 'أحذّ الكامل';
			$bo7or['mutakareb'] = 'البحر المتقارب';
			$bo7or['mutadarak'] = 'البحر المتدارك';
			$bo7or['mu5alla3Baseet'] = 'مخلّع البسيط';
			$bo7or['majzoo2Baseet'] = 'مجزوء البسيط';
			$bo7or['majzoo2Kamel'] = 'مجزوء الكامل';
			$bo7or['majzoo2Ramal'] = 'مجزوء الرّمل';
			$bo7or['majzoo2Saree3'] = 'مجزوء السّريع';
			$bo7or['majzoo2khafeef'] = 'مجزوء الخفيف';
			$bo7or['majzoo2Munsare7'] = 'مجزوء المنسرح';
			$bo7or['majzoo2Mutakareb'] = 'مجزوء المتقارب';
			$bo7or['majzoo2Mutadarak'] = 'مجزوء المتدارك';
			$bo7or['hazaj'] = 'بحر الهزج';
			$bo7or['majzoo2Wafer'] = 'مجزوء الوافر';
			$bo7or['majzoo2Rajaz'] = 'مجزوء الرّجز';
			$bo7or['modare3'] = 'البحر المضارع';
			$bo7or['moktadab'] = 'البحر المقتضب';
			$bo7or['mojtath'] = 'البحر المجتثّ';
			$bo7or['manhookRajaz'] = 'منهوك الرّجز';
		}
		else
		{
			$bo7or['err']='لا يمكن إتمام العملية .. يرجى التأكّد من البيانات المدخلة !!';
		}
		echo json_encode($bo7or);
	}
	
	
	public function getRule()
	{
		$t=$this->input->post('t');
		$b=$this->input->post('b');
		if(strcmp($t,'a')==0)
		{
			if(strcmp($b,'taweel')==0){$this->load->view('rules/taweel');}
			if(strcmp($b,'baseet')==0){$this->load->view('rules/baseet');}
			if(strcmp($b,'kamel')==0){$this->load->view('rules/kamel');}
			if(strcmp($b,'madeed')==0){$this->load->view('rules/madeed');}
			if(strcmp($b,'rajaz')==0){$this->load->view('rules/rajaz');}
			if(strcmp($b,'ramal')==0){$this->load->view('rules/ramal');}
			if(strcmp($b,'saree3')==0){$this->load->view('rules/saree3');}
			if(strcmp($b,'khafeef')==0){$this->load->view('rules/khafeef');}
			if(strcmp($b,'munsare7')==0){$this->load->view('rules/munsare7');}
			if(strcmp($b,'wafer')==0){$this->load->view('rules/wafer');}
			if(strcmp($b,'o7othKamel')==0){$this->load->view('rules/o7othKamel');}
			if(strcmp($b,'mutakareb')==0){$this->load->view('rules/mutakareb');}
			if(strcmp($b,'mutadarak')==0){$this->load->view('rules/mutadarak');}
			if(strcmp($b,'mu5alla3Baseet')==0){$this->load->view('rules/mu5alla3Baseet');}
			if(strcmp($b,'majzoo2Baseet')==0){$this->load->view('rules/majzoo2Baseet');}
			if(strcmp($b,'majzoo2Kamel')==0){$this->load->view('rules/majzoo2Kamel');}
			if(strcmp($b,'majzoo2Ramal')==0){$this->load->view('rules/majzoo2Ramal');}
			if(strcmp($b,'majzoo2Saree3')==0){$this->load->view('rules/majzoo2Saree3');}
			if(strcmp($b,'majzoo2khafeef')==0){$this->load->view('rules/majzoo2khafeef');}
			if(strcmp($b,'majzoo2Munsare7')==0){$this->load->view('rules/majzoo2Munsare7');}
			if(strcmp($b,'majzoo2Mutakareb')==0){$this->load->view('rules/majzoo2Mutakareb');}
			if(strcmp($b,'majzoo2Mutadarak')==0){$this->load->view('rules/majzoo2Mutadarak');}    
			if(strcmp($b,'hazaj')==0){$this->load->view('rules/hazaj');} 
			if(strcmp($b,'majzoo2Wafer')==0){$this->load->view('rules/majzoo2Wafer');}
			if(strcmp($b,'majzoo2Rajaz')==0){$this->load->view('rules/majzoo2Rajaz');}
			if(strcmp($b,'modare3')==0){$this->load->view('rules/modare3');}
			if(strcmp($b,'moktadab')==0){$this->load->view('rules/moktadab');}
			if(strcmp($b,'mojtath')==0){$this->load->view('rules/mojtath');}
			if(strcmp($b,'manhookRajaz')==0){$this->load->view('rules/manhookRajaz');}
		}
		else if(strcmp($t,'t')==0)
		{
			if(strcmp($b,'kamel')==0){$this->load->view('rules/motafa3elon');};
			if(strcmp($b,'rajaz')==0){$this->load->view('rules/mostaf3elon');};
			if(strcmp($b,'hazaj')==0){$this->load->view('rules/mafa3eelon');};
			if(strcmp($b,'ramal')==0){$this->load->view('rules/fa3eelaton');};
			if(strcmp($b,'wafer')==0){$this->load->view('rules/mofa3elaton');};
			if(strcmp($b,'mutakareb')==0){$this->load->view('rules/fa3oolon');};
			if(strcmp($b,'mutadarak')==0){$this->load->view('rules/fa3eloon');};
		}
	}
	
	private function _getBa7erRuleArray($t,$b)
	{
		$arr=array('taweel'=>array(array('U--','U-U'),array('U---'),array('U--','U-U'),array('U---','U-U-','U--')),
				   'baseet'=>array(array('--U-','U-U-','-UU-'),array('-U-','UU-'),array('--U-'),array('-U-','UU-','--')),
				   'kamel'=>array(array('UU-U-','--U-'),array('UU-U-','--U-'),array('UU-U-','--U-','UU--','---')),
				   'madeed'=>array(array('-U--','UU--'),array('-U-','UU-'),array('-U--','-U-U','-U-','UU-')),
				   'rajaz'=>array(array('--U-','U-U-','-UU-','UUU-'),array('--U-','U-U-','-UU-','UUU-'),array('--U-','U-U-','-UU-','UUU-','---')),
				   'ramal'=>array(array('-U--','UU--','UU-U','-U-U'),array('-U--','UU--','UU-U','-U-U'),array('-U--','-U-','UU-','-U-U')),
				   'saree3'=>array(array('--U-','U-U-','-UU-','UUU-'),array('--U-','U-U-','-UU-','UUU-'),array('-U-','-U-U')),
				   'khafeef'=>array(array('-U--','UU--'),array('--U-','U-U-'),array('-U--','UU--','---','UU-')),
				   'munsare7'=>array(array('--U-','U-U-','-UU-','UUU-'),array('---U','-U-U','UU-U'),array('--U-','-UU-','---')),
				   'wafer'=>array(array('U-UU-','U---'),array('U-UU-','U---'),array('U--')),
				   'o7othKamel'=>array(array('UU-U-','--U-'),array('UU-U-','--U-'),array('UU-')),
				   'mutakareb'=>array(array('U--','U-U'),array('U--','U-U'),array('U--','U-U'),array('U--','U-U','U-')),
				   'mutadarak'=>array(array('-U-','UU-','--'),array('-U-','UU-','--'),array('-U-','UU-','--'),array('-U-','UU-','--')),
				   'mu5alla3Baseet'=>array(array('--U-','U-U-','-UU-'),array('-U-'),array('U--')),
				   'majzoo2Baseet'=>array(array('--U-','U-U-','-UU-','UUU-'),array('-U-','UU-'),array('--U-','---','--U-U')),
				   'majzoo2Kamel'=>array(array('UU-U-','--U-'),array('UU-U-','UU--','UU-U-U','UU-U--')),
				   'majzoo2Ramal'=>array(array('-U--','UU--'),array('-U--','UU--','-U--U','-U-')),
				   'majzoo2Saree3'=>array(array('--U-','U-U-','-UU-','UUU-'),array('-U-','-U-U')),
				   'majzoo2khafeef'=>array(array('-U--','UU--'),array('--U-','U-U-')),
				   'majzoo2Munsare7'=>array(array('--U-','U-U-','-UU-','UUU-'),array('---U','---')),
				   'majzoo2Mutakareb'=>array(array('U--','U-U'),array('U--','U-U'),array('U--','U-U','U-','-')),
				   'majzoo2Mutadarak'=>array(array('-U-','UU-','--'),array('-U-','UU-','--'),array('-U-','-U-U','UU--')),
				   'hazaj'=>array(array('U---','U--U'),array('U---','U--')),
				   'majzoo2Wafer'=>array(array('U-UU-','U---'),array('U-UU-','U---')),
				   'majzoo2Rajaz'=>array(array('--U-','U-U-','-UU-','UUU-'),array('--U-','U-U-','-UU-','UUU-','---')),
				   'modare3'=>array(array('U--U','U-U-'),array('-U--')),
				   'moktadab'=>array(array('-U-U'),array('-UU-')),
				   'mojtath'=>array(array('--U-','U-U-'),array('-U--','UU--','---')),
				   'manhookRajaz'=>array(array('--U-','U-U-','-UU-','UUU-','---')),
				   'kamelTafeela'=>array(array('UU-U-','--U-')),
				   'rajazTafeela'=>array(array('--U-','U-U-','-UU-','UUU-')),
				   'hazajTafeela'=>array(array('U---','U--U')),
				   'ramalTafeela'=>array(array('-U--','UU--','UU-U','-U-U')),
				   'waferTafeela'=>array(array('U-UU-','U---')),
				   'mutakarebTafeela'=>array(array('U--','U-U')),
				   'mutadarakTafeela'=>array(array('-U-','UU-')));
				   
	    $arrNames=array('taweel'=>array(array('فَعُوْلُنْ','فَعُوْلُ'),array('مَفَاْعِيْلُنْ'),array('فَعُوْلُنْ','فَعُوْلُ'),array('مَفَاْعِيْلُنْ','مَفَاْعِلُنْ','فَعُوْلُنْ')),
				   'baseet'=>array(array('مُسْتَفْعِلُنْ','مُتَفْعِلُنْ','مُسْتَعِلُنْ'),array('فَاْعِلُنْ','فَعِلُنْ'),array('مُسْتَفْعِلُنْ'),array('فَاْعِلُنْ','فَعِلُنْ','فَاْلُنْ')),
				   'kamel'=>array(array('مُتَفَاْعِلُنْ','مُسْتَفْعِلُنْ'),array('مُتَفَاْعِلُنْ','مُسْتَفْعِلُنْ'),array('مُتَفَاْعِلُنْ','مُسْتَفْعِلُنْ','مُتَفَاْعِلْ','مُسْتَفْعِلْ')),
				   'madeed'=>array(array('فَاْعِلَاْتُنْ','فَعِلَاْتُنْ'),array('فَاْعِلُنْ','فَعِلُنْ'),array('فَاْعِلَاْتُنْ','فَاْعِلَاْت','فَاْعِلُنْ','فَعِلُنْ')),
				   'rajaz'=>array(array('مُسْتَفْعِلُنْ','مُتَفْعِلُنْ','مُسْتَعِلُنْ','مُتَعِلُنْ'),array('مُسْتَفْعِلُنْ','مُتَفْعِلُنْ','مُسْتَعِلُنْ','مُتَعِلُنْ'),array('مُسْتَفْعِلُنْ','مُتَفْعِلُنْ','مُسْتَعِلُنْ','مُتَعِلُنْ','مُسْتَفْعِلْ')),
				   'ramal'=>array(array('فَاْعِلَاْتُنْ','فَعِلَاْتُنْ','فَعِلَاْتُ','فَاْعِلَاْتُ'),array('فَاْعِلَاْتُنْ','فَعِلَاْتُنْ','فَعِلَاْتُ','فَاْعِلَاْتُ'),array('فَاْعِلَاْتُنْ','فَاْعِلُنْ','فَعِلُنْ','فَاْعِلَاْت')),
				   'saree3'=>array(array('مُسْتَفْعِلُنْ','مُتَفْعِلُنْ','مُسْتَعِلُنْ','مُتَعِلُنْ'),array('مُسْتَفْعِلُنْ','مُتَفْعِلُنْ','مُسْتَعِلُنْ','مُتَعِلُنْ'),array('فَاْعِلُنْ','فَاْعِلَاْنْ')),
				   'khafeef'=>array(array('فَاْعِلَاْتُنْ','فَعِلَاْتُنْ'),array('مُسْتَفْعِلُنْ','مُتَفْعِلُنْ'),array('فَاْعِلَاْتُنْ','فَعِلَاْتُنْ','فَاْلَاْتُنْ','فَعِلُنْ')),
				   'munsare7'=>array(array('مُسْتَفْعِلُنْ','مُتَفْعِلُنْ','مُسْتَعِلُنْ','مُتَعِلُنْ'),array('مَفْعُوْلَاْتُ','مَفْعِلَاْتُ','مَعِلَاْتُ'),array('مُسْتَفْعِلُنْ','مُسْتَعِلُنْ','مُسْتَفْعِلْ')),
				   'wafer'=>array(array('مُفَاْعِلَتُنْ','مَفَاْعِيْلُنْ'),array('مُفَاْعِلَتُنْ','مَفَاْعِيْلُنْ'),array('فَعُوْلُنْ')),
				   'o7othKamel'=>array(array('مُتَفَاْعِلُنْ','مُسْتَفْعِلُنْ'),array('مُتَفَاْعِلُنْ','مُسْتَفْعِلُنْ'),array('فَعِلُنْ')),
				   'mutakareb'=>array(array('فَعُوْلُنْ','فَعُوْل'),array('فَعُوْلُنْ','فَعُوْل'),array('فَعُوْلُنْ','فَعُوْل'),array('فَعُوْلُنْ','فَعُوْل','فَعُوْ')),
				   'mutadarak'=>array(array('فَاْعِلُنْ','فَعِلُنْ','فَاْلُنْ'),array('فَاْعِلُنْ','فَعِلُنْ','فَاْلُنْ'),array('فَاْعِلُنْ','فَعِلُنْ','فَاْلُنْ'),array('فَاْعِلُنْ','فَعِلُنْ','فَاْلُنْ')),
				   'mu5alla3Baseet'=>array(array('مُسْتَفْعِلُنْ','مُتَفْعِلُنْ','مُسْتَعِلُنْ'),array('فَاْعِلُنْ'),array('فَعُوْلُنْ')),
				   'majzoo2Baseet'=>array(array('مُسْتَفْعِلُنْ','مُتَفْعِلُنْ','مُسْتَعِلُنْ','مُتَعِلُنْ'),array('فَاْعِلُنْ','فَعِلُنْ'),array('مُسْتَفْعِلُنْ','مُسْتَفْعِلْ','مُسْتَفْعِلَاْن')),
				   'majzoo2Kamel'=>array(array('مُتَفَاْعِلُنْ','مُسْتَفْعِلُنْ'),array('مُتَفَاْعِلُنْ','مُتَفَاْعِلْ','مُتَفَاْعِلَاْن','مُتَفَاْعِلَاْتُنْ')),
				   'majzoo2Ramal'=>array(array('فَاْعِلَاْتُنْ','فَعِلَاْتُنْ'),array('فَاْعِلَاْتُنْ','فَعِلَاْتُنْ','فَاْعِلَاْتَاْن','فَاْعِلُنْ')),
				   'majzoo2Saree3'=>array(array('مُسْتَفْعِلُنْ','مُتَفْعِلُنْ','مُسْتَعِلُنْ','مُتَعِلُنْ'),array('فَاْعِلُنْ','فَاْعِلَاْن')),
				   'majzoo2khafeef'=>array(array('فَاْعِلَاْتُنْ','فَعِلَاْتُنْ'),array('مُسْتَفْعِلُنْ','مُتَفْعِلُنْ')),
				   'majzoo2Munsare7'=>array(array('مُسْتَفْعِلُنْ','مُتَفْعِلُنْ','مُسْتَعِلُنْ','مُتَعِلُنْ'),array('مَفْعُوْلَاْت','مَفْعُوْلُنْ')),
				   'majzoo2Mutakareb'=>array(array('فَعُوْلُنْ','فَعُوْل'),array('فَعُوْلُنْ','فَعُوْل'),array('فَعُوْلُنْ','فَعُوْل','فَعُوْ','فَعْ')),
				   'majzoo2Mutadarak'=>array(array('فَاْعِلُنْ','فَعِلُنْ','فَاْلُنْ'),array('فَاْعِلُنْ','فَعِلُنْ','فَاْلُنْ'),array('فَاْعِلُنْ','فَاْعِلَاْنْ','فَعِلَاْتُنْ')),
				   'hazaj'=>array(array('مَفَاْعِيْلُنْ','مَفَاْعِيْلُ'),array('مَفَاْعِيْلُنْ','فَعُوْلُنْ')),
				   'majzoo2Wafer'=>array(array('مُفَاْعِلَتُنْ','مَفَاْعِيْلُنْ'),array('مُفَاْعِلَتُنْ','مَفَاْعِيْلُنْ')),
				   'majzoo2Rajaz'=>array(array('مُسْتَفْعِلُنْ','مُتَفْعِلُنْ','مُسْتَعِلُنْ','مُتَعِلُنْ'),array('مُسْتَفْعِلُنْ','مُتَفْعِلُنْ','مُسْتَعِلُنْ','مُتَعِلُنْ','مُسْتَفْعِلْ')),
				   'modare3'=>array(array('مَفَاْعِيْلُ','مَفَاْعِلُنْ'),array('فَاْعِلَاْتُنْ')),
				   'moktadab'=>array(array('فَاْعِلَاْتُ'),array('مُسْتَعِلُنْ')),
				   'mojtath'=>array(array('مُسْتَفْعِلُنْ','مُتَفْعِلُنْ'),array('فَاْعِلَاْتُنْ','فَعِلَاْتُنْ','فَاْلَاْتُنْ')),
				   'manhookRajaz'=>array(array('مُسْتَفْعِلُنْ','مُتَفْعِلُنْ','مُسْتَعِلُنْ','مُتَعِلُنْ','مُسْتَفْعِلْ')),
				   'kamelTafeela'=>array(array('مُتَفَاْعِلُنْ','مُسْتَفْعِلُنْ')),
				   'rajazTafeela'=>array(array('مُسْتَفْعِلُنْ','مُتَفْعِلُنْ','مُسْتَعِلُنْ','مُتَعِلُنْ')),
				   'hazajTafeela'=>array(array('مَفَاْعِيْلُنْ','مَفَاْعِيْلُ')),
				   'ramalTafeela'=>array(array('فَاْعِلَاْتُنْ','فَعِلَاْتُنْ','فَعِلَاْت','فَاْعِلَاْت')),
				   'waferTafeela'=>array(array('مُفَاْعِلَتُنْ','مَفَاْعِيْلُنْ')),
				   'mutakarebTafeela'=>array(array('فَعُوْلُنْ','فَعُوْل')),
				   'mutadarakTafeela'=>array(array('فَاْعِلُنْ','فَعِلُنْ')));
	
		if(strcmp($t,'a')==0)
		{
			$result=$arr[$b];
			$resultNames=$arrNames[$b];
			$baseBa7erName='';
		}
		else if(strcmp($t,'t')==0)
		{
			$oldB=$b;
			if(strcmp($b,'kamel')==0){$b='kamelTafeela';}
			if(strcmp($b,'rajaz')==0){$b='rajazTafeela';}
			if(strcmp($b,'hazaj')==0){$b='hazajTafeela';}
			if(strcmp($b,'ramal')==0){$b='ramalTafeela';}
			if(strcmp($b,'wafer')==0){$b='waferTafeela';}
			if(strcmp($b,'mutakareb')==0){$b='mutakarebTafeela';}
			if(strcmp($b,'mutadarak')==0){$b='mutadarakTafeela';}
			
			$result=$arr[$b];
			$resultNames=$arrNames[$b];
			$baseBa7erName=$oldB;
		}
		else
		{
			$result=array(array());
			$resultNames=array(array());
			$baseBa7erName='';
		}
		
		return array($result,$resultNames,$baseBa7erName);
	}
	
	
	public function amoodyWizard()
	{
		$this->benchmark->mark('code_start'); // زمن بدء التنفيذ

		$t=$this->input->post('t'); //نوع القصيدة
		$b=$this->input->post('b'); //البحر المستهدف
		$n=$this->input->post('n'); //رقم البيت
		$q=$this->input->post('q'); //تحليل القافية أم لا ؟
		$sader=$this->input->post('sader'); 
		$ajez=$this->input->post('ajez');
		$isAjez=($n==0)?true:false; // البيت الأول صدره يعتبر عجز هام في حالة التصريع
		
		$tempVar=self::_getBa7erRuleArray($t,$b);
		
		$currentRuleArray=$tempVar[0]; // ضابط البحر المستهدف
		$currentRuleNamesArray=$tempVar[1]; // أسماء تفعيلات ضابط البحر المستهدف
		//var_dump($currentRuleNamesArray);
		$saderStatus=false; //حالة الصدر = موزون أم لا
		$ajezStatus=false; // حالة العجز = موزون أم لا
		
		$x=$this->core->doFaraheedyShater($sader,$isAjez);
		if(strcmp($x['ba7erName'],$b)==0)
		{
			$saderStatus=true;
			$saderRes=array();
		}
		$x=$this->core->doFaraheedyShater($ajez,true);
		if(strcmp($x['ba7erName'],$b)==0)
		{
			$ajezStatus=true;
			$ajezRes=array();
		}
		if($saderStatus && $ajezStatus) // الحالة المثالية الشطرين تمام
		{
			if($n==0)
			{
				//إضافة خاصيّة تحليل آخر تفعيلة من أجل العلل التي يجب التزامها
				// هام لا تنْسه
				
				$this->session->set_userdata(array('firstAjez'=>$ajez));
				
				$this->benchmark->mark('code_end'); // زمن نهاية التنفيذ
				$time=$this->benchmark->elapsed_time('code_start', 'code_end');
				echo json_encode (array('status'=>'ok','time'=>$time));
				return;
			}
			else
			{
				if(strcmp($q,'true')==0)
				{
					$ajizes=array($this->session->userdata('firstAjez'),$ajez);
					$resQawafee=$this->core->qawafeeAnalysis($ajizes);
					
					
					//var_dump($resQawafee);
					foreach($resQawafee as $currentQafeah)
					{
						if(array_key_exists('errors',$currentQafeah))
						{
							if(count($currentQafeah['errors'])>0)
							{
								$this->benchmark->mark('code_end'); // زمن نهاية التنفيذ
								$time=$this->benchmark->elapsed_time('code_start', 'code_end');
								header('Content-Type: application/json; charset=utf-8;');
								echo json_encode (array('status'=>'qafeahError','errors'=>$currentQafeah['errors'],'time'=>$time));
								return;
							}
						}
					}
				}
				$this->benchmark->mark('code_end'); // زمن نهاية التنفيذ
				$time=$this->benchmark->elapsed_time('code_start', 'code_end');
				header('Content-Type: application/json; charset=utf-8;');
				echo json_encode (array('status'=>'ok','time'=>$time));
				return;
			}
		}
		else
		{
			if(!$saderStatus)//تحليل أخطاء الصدر
			{
				$saderRes=$this->core->doAmoodyWizard($sader,$isAjez,$currentRuleArray,$currentRuleNamesArray);
			}

			if(!$ajezStatus)// تحليل أخطاء العجز
			{
				$ajezRes=$this->core->doAmoodyWizard($ajez,true,$currentRuleArray,$currentRuleNamesArray);
			}
			
			
			$this->benchmark->mark('code_end'); // زمن نهاية التنفيذ
			$time=$this->benchmark->elapsed_time('code_start', 'code_end');
			
			header('Content-Type: application/json; charset=utf-8;');
			echo json_encode (array('sader'=>array('is_ok'=>$saderStatus,'details'=>$saderRes),'ajez'=>array('is_ok'=>$ajezStatus,'details'=>$ajezRes),'time'=>$time));
		}
		
	}
	
	public function tafeelaWizard()
	{
		$this->benchmark->mark('code_start'); // زمن بدء التنفيذ

		$t=$this->input->post('t'); //نوع القصيدة
		$b=$this->input->post('b'); //البحر المستهدف
		$n=$this->input->post('n'); //رقم المقطع
		$poem=$this->input->post('poem'); // نص المقطع
		
		$tempVar=self::_getBa7erRuleArray($t,$b);
		
		$currentRuleArray=$tempVar[0]; // ضابط البحر المستهدف
		$currentRuleNamesArray=$tempVar[1]; // أسماء تفعيلات ضابط البحر المستهدف
		$baseBa7er=$tempVar[2]; // اسم البحر الأصلي
		$poemStatus=false; //حالة المقطع موزون أم لا
		
		$x=$this->core->doFaraheedyTafeela($poem);
		
		//var_dump($baseBa7er);
		//var_dump($x);
		
		if(array_key_exists('ba7er',$x))
		{
			if(strcmp($x['ba7er'],$baseBa7er)==0)
			{
				$poemStatus=true;
				foreach($x['names'] as $nameTmp)
				{
					if(strcmp($nameTmp,'????')==0)
					{
						$poemStatus=false;
						break;
					}
				}
				
				if($poemStatus) // القصيدة موزونة
				{
					$this->benchmark->mark('code_end'); // زمن نهاية التنفيذ
					$time=$this->benchmark->elapsed_time('code_start', 'code_end');
					header('Content-Type: application/json; charset=utf-8;');
					echo json_encode (array('status'=>'ok','time'=>$time));
				}
			}
			else
			{
				$poemStatus=false;
			}
		}
		
		if(!array_key_exists('ba7er',$x) || $poemStatus==false)
		{
			
			
			$poemRes=$this->core->doTafeelaWizard($poem,$currentRuleArray,$currentRuleNamesArray);
			
			//echo 'تحليل الأخطاء هنا';
			$this->benchmark->mark('code_end'); // زمن نهاية التنفيذ
			$time=$this->benchmark->elapsed_time('code_start', 'code_end');
			header('Content-Type: application/json; charset=utf-8;');
			echo json_encode (array('is_ok'=>$poemStatus,'details'=>$poemRes,'time'=>$time));
		}
	}
}