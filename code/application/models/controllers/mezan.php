<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mezan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->database();
		$this->load->helper('url');
		/* ------------------ */	
		
		$this->load->model('core');
		$this->load->model('du2alee');
	}

	
	public function index()
	{
		$this->load->view('gui/mezan');
	}
	
	
	public function generatepdf(){
	
		$html=$this->input->post('h');
		$this->load->helper(array('dompdf', 'file'));
		$data = pdf_create($html, '', false);
		$path='assets/pdfs/file.pdf';
		write_file($path, $data);
		echo json_encode(array('p'=>$path));    
		
	}
	
	public function generatehtml(){
		$this->load->helper(array('dompdf', 'file'));
		$html=$this->input->post('h');
		
		$path='assets/pdfs/file.html';
		write_file($path, $html);
		echo json_encode(array('p'=>$path));    
		
	}
	
	
	public function setContentForPrint(){
		
		$h='<!doctype html>
				<html class="no-js">

					<head>
						<meta charset="utf-8"/>
						<title>مشروع الفراهيدي - طباعة النتائج</title>
					</head>
					
					
					<body>';
		
		$h+=$this->input->post('h');;
		
		$h+='		</body>
				</html>';
		
		
	}
	
	public function printResultsTafeela(){
		
	}
	
	
	
	public function doFaraheedyAmoody()
	{
		$this->benchmark->mark('code_start'); // زمن بدء الطلب

		$poem=$this->input->post("poem"); // مصفوفة الأبيات
		// ضع شرطاً هنا لعدم تجاوز القصيدة 100 بيت لهدف تحسين الأداء
		
		if(count($poem)>100)
		{
			echo json_encode(array('error'=>'لا يمكن تقطيع قصيدة يتجاوز عدد أبياتها المائة بيت <br/>و ذلك بهدف الحفاظ على سرعة الأداء.'));
			return;
		}
		
		$results=array();
		
		$x=1;
		$i=0;
		foreach($poem as $bait) //من أجل كل بيت
		{
			$i++;
			$tmp=explode("&&&",$bait);
			$sader=$tmp[0]; //صدر البيت الحالي
			$ajez=$tmp[1];	//عجزر البيت الحالي
			
			if(strcmp($sader,'')!=0)
			{
				//إرسال الشطر إلى الموديل لمعالجته
				if($x==1)
				{
					$r=array('sader'=>$sader,'info'=>$this->core->doFaraheedyShater($sader,true));
				}
				else
				{
					$r=array('sader'=>$sader,'info'=>$this->core->doFaraheedyShater($sader,false));
				}
				$saderR=$r;
			}
			else
			{
				$saderR=array('error'=>'لم يتم إدخال صدر البيت');
			}
			if(strcmp($ajez,'')!=0)
			{
				$r=array('ajez'=>$ajez,'info'=>$this->core->doFaraheedyShater($ajez,true));
				$x++;
				$ajezR=$r;
			}
			else
			{
				$ajezR=array('error'=>'لم يتم إدخال عجز البيت');
			}
			array_push($results,array('sader'=>$saderR,'ajez'=>$ajezR));
		}
		$this->benchmark->mark('code_end'); // زمن نهاية التنفيذ
		$time=$this->benchmark->elapsed_time('code_start', 'code_end');
		array_push($results,array('time'=>$time));
		header('Content-Type: application/json; charset=utf-8;');
		echo json_encode($results);

	}
	
	public function doFaraheedyAmoodyMobile()
	{
		$this->benchmark->mark('code_start'); // زمن بدء الطلب

		$poem=$this->input->post("poem"); // مصفوفة الأبيات
		// ضع شرطاً هنا لعدم تجاوز القصيدة 100 بيت لهدف تحسين الأداء
		
		if(count($poem)>100)
		{
			echo json_encode(array('error'=>'لا يمكن تقطيع قصيدة يتجاوز عدد أبياتها المائة بيت <br/>و ذلك بهدف الحفاظ على سرعة الأداء.'));
			return;
		}
		
		$results=array();
		
		$x=1;
		$i=0;
		foreach($poem as $bait) //من أجل كل بيت
		{
			$i++;
			$tmp=explode("&&&",$bait);
			$sader=$tmp[0]; //صدر البيت الحالي
			$ajez=$tmp[1];	//عجزر البيت الحالي
			
			if(strcmp($sader,'')!=0)
			{
				//إرسال الشطر إلى الموديل لمعالجته
				if($x==1)
				{
					$r=array('sader'=>$sader,'info'=>$this->core->doFaraheedyShater($sader,true));
				}
				else
				{
					$r=array('sader'=>$sader,'info'=>$this->core->doFaraheedyShater($sader,false));
				}
				$saderR=$r;
			}
			else
			{
				$saderR=array('error'=>'لم يتم إدخال صدر البيت');
			}
			if(strcmp($ajez,'')!=0)
			{
				$r=array('ajez'=>$ajez,'info'=>$this->core->doFaraheedyShater($ajez,true));
				$x++;
				$ajezR=$r;
			}
			else
			{
				$ajezR=array('error'=>'لم يتم إدخال عجز البيت');
			}
			array_push($results,array('sader'=>$saderR,'ajez'=>$ajezR));
		}
		$this->benchmark->mark('code_end'); // زمن نهاية التنفيذ
		$time=$this->benchmark->elapsed_time('code_start', 'code_end');
		array_push($results,array('time'=>$time));
		header("Access-Control-Allow-Origin: *");
		header('Content-Type: application/json; charset=utf-8;');
		echo json_encode($results);

	}
	
	
	
	public function doFaraheedyTafeela()
	{
		$this->benchmark->mark('code_start'); // زمن بدء التنفيذ
	
		$poem=$this->input->post("t"); // القصيدة التفعيلية
		
		if(strcmp($poem,'')==0)
		{
			echo json_encode(array('error'=>'يرجى إدخال نصّ القصيدة أوّلاً !'));
			return;
		}
		if(strlen(preg_replace(array('/[ًٌٍَُِّْ]/'),array(''),$poem))<65)
		{
			echo json_encode(array('error'=>'نصّ القصيدة المدخل قصيرٌ جدّاً .. يرجى تصحيح النصّ'));
			return;
		}
		
		$results=$this->core->doFaraheedyTafeela($poem);
		$this->benchmark->mark('code_end'); // زمن نهاية التنفيذ
		$time=$this->benchmark->elapsed_time('code_start', 'code_end');
		$results['time']=$time;
		header('Content-Type: application/json; charset=utf-8;');
		echo json_encode($results);

	}
	
	public function doFaraheedyTafeelaMobile()
	{
		$this->benchmark->mark('code_start'); // زمن بدء التنفيذ
	
		$poem=$this->input->post("t"); // القصيدة التفعيلية
		
		if(strcmp($poem,'')==0)
		{
			echo json_encode(array('error'=>'يرجى إدخال نصّ القصيدة أوّلاً !'));
			return;
		}
		if(strlen(preg_replace(array('/[ًٌٍَُِّْ]/'),array(''),$poem))<65)
		{
			echo json_encode(array('error'=>'نصّ القصيدة المدخل قصيرٌ جدّاً .. يرجى تصحيح النصّ'));
			return;
		}
		
		$results=$this->core->doFaraheedyTafeela($poem);
		$this->benchmark->mark('code_end'); // زمن نهاية التنفيذ
		$time=$this->benchmark->elapsed_time('code_start', 'code_end');
		$results['time']=$time;
		header("Access-Control-Allow-Origin: *");
		header('Content-Type: application/json; charset=utf-8;');
		echo json_encode($results);

	}
	
	public function getDemoBait()
	{
		$q=$this->db->query("SELECT COUNT(`id`) as `max` FROM `goodbaits`")->row();
		$max=$q->max;

		$id=rand(1,$max);
		
		$b=$this->db->get_where('goodbaits',array('id'=>$id))->result_array();
		//var_dump($b);
		header('Content-Type: application/json; charset=utf-8;');
		echo json_encode($b);
	}
	
	public function getDemoBaitMobile()
	{
		$q=$this->db->query("SELECT COUNT(`id`) as `max` FROM `goodbaits`")->row();
		$max=$q->max;

		$id=rand(1,$max);
		
		$b=$this->db->get_where('goodbaits',array('id'=>$id))->result_array();
		//var_dump($b);
		header("Access-Control-Allow-Origin: *");
		header('Content-Type: application/json; charset=utf-8;');
		echo json_encode($b);
	}
	
	public function getDemoPoem()
	{
		$q=$this->db->query("SELECT COUNT(`id`) as `max` FROM `goodpoems`")->row();
		$max=$q->max;

		$id=rand(1,$max);
		
		$b=$this->db->get_where('goodpoems',array('id'=>$id))->result_array();
		//var_dump($b);
		header('Content-Type: application/json; charset=utf-8;');
		echo json_encode($b);
	}
	
	public function getDemoPoemMobile()
	{
		$q=$this->db->query("SELECT COUNT(`id`) as `max` FROM `goodpoems`")->row();
		$max=$q->max;

		$id=rand(1,$max);
		
		$b=$this->db->get_where('goodpoems',array('id'=>$id))->result_array();
		//var_dump($b);
		header("Access-Control-Allow-Origin: *");
		header('Content-Type: application/json; charset=utf-8;');
		echo json_encode($b);
	}
	
	
	public function doQawafeeAnalysis()
	{
		$this->benchmark->mark('code_start'); // زمن بدء التنفيذ

		$poem=$this->input->post("poem"); // مصفوفة الأبيات
		// ضع شرطاً هنا لعدم تجاوز القصيدة 100 بيت لهدف تحسين الأداء
		
		if(count($poem)>100)
		{
			echo json_encode(array('error'=>'لا يمكن تحليل قوافي قصيدة يتجاوز عدد أبياتها المائة بيت <br/>و ذلك بهدف الحفاظ على سرعة الأداء.'));
			return;
		}
		
		// clean input
		
		$newBaits=array(); 
		$results=array();

		foreach($poem as $bait) //من أجل كل بيت
		{
			if(strcmp($bait,'')!=0)
			{
				array_push($newBaits,$bait);
			}
			else
			{
				array_push($newBaits,'empty');
			}
		}
		
		//begin of analysis
		$results=$this->core->qawafeeAnalysis($newBaits);
		if(!is_array($results))
		{
			if(strcmp($results,'emptyAll')==0)
			{
				echo json_encode(array('error'=>'يرجى إدخال أعجاز الأبيات !!!'));
				return;
			}
		}
		$this->benchmark->mark('code_end'); // زمن نهاية التنفيذ
		$time=$this->benchmark->elapsed_time('code_start', 'code_end');
		array_push($results,array('time'=>$time));
		header('Content-Type: application/json; charset=utf-8;');
		echo json_encode($results);
		
	}
	
	public function doQawafeeAnalysisMobile()
	{
		$this->benchmark->mark('code_start'); // زمن بدء التنفيذ

		$poem=$this->input->post("poem"); // مصفوفة الأبيات
		// ضع شرطاً هنا لعدم تجاوز القصيدة 100 بيت لهدف تحسين الأداء
		
		if(count($poem)>100)
		{
			echo json_encode(array('error'=>'لا يمكن تحليل قوافي قصيدة يتجاوز عدد أبياتها المائة بيت <br/>و ذلك بهدف الحفاظ على سرعة الأداء.'));
			return;
		}
		
		// clean input
		
		$newBaits=array(); 
		$results=array();

		foreach($poem as $bait) //من أجل كل بيت
		{
			if(strcmp($bait,'')!=0)
			{
				array_push($newBaits,$bait);
			}
			else
			{
				array_push($newBaits,'empty');
			}
		}
		
		//begin of analysis
		$results=$this->core->qawafeeAnalysis($newBaits);
		if(!is_array($results))
		{
			if(strcmp($results,'emptyAll')==0)
			{
				echo json_encode(array('error'=>'يرجى إدخال أعجاز الأبيات !!!'));
				return;
			}
		}
		$this->benchmark->mark('code_end'); // زمن نهاية التنفيذ
		$time=$this->benchmark->elapsed_time('code_start', 'code_end');
		array_push($results,array('time'=>$time));
		header("Access-Control-Allow-Origin: *");
		header('Content-Type: application/json; charset=utf-8;');
		echo json_encode($results);
		
	}
	
	public function automatedTashkeel()
	{
		$this->benchmark->mark('code_start'); // زمن بدء التنفيذ

		$poem=$this->input->post("poem"); // مصفوفة الأبيات
		// ضع شرطاً هنا لعدم تجاوز القصيدة 100 بيت لهدف تحسين الأداء
		
		if(count($poem)>199)
		{
			return; // إلغاء طلب التشكيل التلقائي في حال كون الأبيات أكثر من 100 بيت .... و ذلك من أجل الحفاظ على موارد السيرفر
		}
		
		// clean input
		
		
		$results=array();

		//begin of analysis
		for($i=0;$i<count($poem);$i++)
		{
			array_push($results,array("forID"=>$poem[$i],"result"=>$this->du2alee->doTashkeel($poem[++$i],uniqid())));
		}
		$this->benchmark->mark('code_end'); // زمن نهاية التنفيذ
		$time=$this->benchmark->elapsed_time('code_start', 'code_end');
		array_push($results,array('time'=>$time));
		header("Access-Control-Allow-Origin: *");
		header('Content-Type: application/json; charset=utf-8;');
		echo json_encode($results);
	}
	
}