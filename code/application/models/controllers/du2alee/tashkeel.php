<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tashkeel extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->database();
		$this->load->helper('url');
		/* ------------------ */	
		
		$this->load->model('du2alee');
		
	}

	public function index()
	{
		$this->load->view('du2alee/index');
	}
	
	public function alphaGUI()
	{
		$this->load->view('du2alee/testGUI');
	}
	
	public function doTraining()
	{
		$this->benchmark->mark('code_start'); // زمن بدء الطلب
		
		//قراءة الدخل و الجلسة
		$input=$this->input->post("input");
		$session=$this->input->post("session");
		
		// إنشاء سجل لجلسة التشكيل
		// تصفير البروجرس بار للمرحلة الأولى
		$data = array(
		   'done' => 0,
		   'stageNo' => 1, //رقم المرحلة
		   'total' => 100,
		   'sessionID' => $session
		);
	    $this->db->insert('training_progress', $data);
		
		
		// تخزين النص الأصلي في جدول للموافقة عليه لاحقاً
		// 
		$data = array(
		   'plain_text' => $input,
		   'sessionID' => $session
		);
	    $this->db->insert('`user_tashkeel_training_requests` ', $data);
		
		
		//إجراء التدريب
		$this->du2alee->doTraining($input,$session);
		
		$this->benchmark->mark('code_end'); // زمن نهاية التنفيذ
		$time=$this->benchmark->elapsed_time('code_start', 'code_end');
		
		echo json_encode(array("time"=>$time));
	}
	
	public function getTrainingStatus()
	{
		$session=$this->input->post("session");
		$query = $this->db->query("select * from training_progress where sessionID='".$session."'");
		
		echo json_encode(array("status"=>$query->result_array()[0]));
		//$this->du2alee->doTraining($input);
		//$this->load->view('du2alee/testGUI');
	}
	
	public function doTashkeel()
	{
		
		$this->benchmark->mark('code_start'); // زمن بدء الطلب
		
		//قراءة الدخل و الجلسة
		$input=$this->input->post("input");
		$session=$this->input->post("session");
		
		// إنشاء سجل لجلسة التشكيل
		// تصفير البروجرس بار للمرحلة الأولى
		$data = array(
		   'done' => 0,
		   'stageNo' => 1, //رقم المرحلة
		   'total' => 100,
		   'sessionID' => $session
		);
	    $this->db->insert('tashkeel_progress', $data);
		
		
		
		//إجراء التشكيل التلقائي
		$result = $this->du2alee->doTashkeel($input,$session);
		
		$this->benchmark->mark('code_end'); // زمن نهاية التنفيذ
		$time=$this->benchmark->elapsed_time('code_start', 'code_end');
		
		echo json_encode(array("time"=>$time,'result'=>$result));
	}
	
	public function getUsageStatus()
	{
		$session=$this->input->post("session");
		$query = $this->db->query("select * from tashkeel_progress where sessionID='".$session."'");
		
		echo json_encode(array("status"=>$query->result_array()[0]));
		//$this->du2alee->doTraining($input);
		//$this->load->view('du2alee/testGUI');
	}
	
	
	public function saveGoodResult()
	{
		// قراءة الدخل
		$goodResult=$this->input->post("goodResult");
		
		// إنشاء سجل لجلسة التشكيل
		// تصفير البروجرس بار للمرحلة الأولى
		$data = array(
		   'goodResult' => $goodResult
		);
	    $this->db->insert('good_tashkeel_results', $data);
		
		echo json_encode(array('status'=>'ok'));
	}
	
	
	
	public function publishTraining()
	{
		// قراءة الدخل
		$sessionID=$this->input->post("sessionID");
		$recID=$this->input->post("recID");
		
		
		foreach($this->db->query("SELECT * FROM `tashkeel_3` where `sessionID` = '".$sessionID."'")->result_array() as $current)
		{

			$data = array(
			   'chars' => $current["chars"],
			   'tashkeel' => $current["tashkeel"],
			   'charsWithTashkeel' => $current["charsWithTashkeel"]
			);
			$this->db->insert('tashkeel_3_real', $data);
			
			$data = array(
			   'isPublished' => "1"
			);
			$this->db->where("id",$recID);
			$this->db->update('user_tashkeel_training_requests', $data);
		}
		
		echo json_encode(array('status'=>'ok'));
	}
}