<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class index extends CI_Controller {

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
		if($this->session->userdata('MUKHTAR_LOGIN_OK')=="MUKHTAR_LOGIN_OK")
		{
			$this->load->view('admin/index');
		}
		else
		{
			$this->load->view('admin/login');
		}
	}
	
	public function checkLogin()
	{
		$u=$this->input->post('u');
		$p=$this->input->post('p');
		header('Content-Type: application/json; charset=utf-8;');

		if(strcmp($u,"mukhtar")==0 && strcmp($p,"faraheedyadmin27111988")==0)
		{
			$this->session->set_userdata('MUKHTAR_LOGIN_OK','MUKHTAR_LOGIN_OK');
			echo json_encode(array("status"=>"ok"));
		}
		else
		{
			$this->session->set_userdata('MUKHTAR_LOGIN_OK','FAIL');
			echo json_encode(array("status"=>"fail"));
		}
	}
	
	public function logout()
	{
		$this->session->set_userdata('MUKHTAR_LOGIN_OK','FAIL');
		header('Location: '. base_url('admin/'));
	}
	
	public function getStats()
	{
		if($this->session->userdata('MUKHTAR_LOGIN_OK')!="MUKHTAR_LOGIN_OK")
		{
			header('Location: '. base_url('admin/'));
		}
		
		
		$query = $this->db->query('SELECT COUNT(id) AS count ,CONCAT(`request_type`,`poem_type`) as type FROM `requests` Group by `request_type`,`poem_type`')->result_array(); 
		$query = array_merge($query,$this->db->query('SELECT COUNT(id) AS count ,\'totalall\' as type FROM `requests`')->result_array());
		$query = array_merge($query,$this->db->query('SELECT COUNT(id) AS count ,CONCAT(`request_type`,`poem_type`,\'err\') as type FROM `requests` where `result` like \'%ba7er%know%\' Group by `request_type`,`poem_type`')->result_array());
		$query = array_merge($query,$this->db->query('SELECT COUNT(id) AS count ,\'totalerr\' as type FROM `requests` where `result` like \'%ba7er%know%\'')->result_array());
		$query = array_merge($query,$this->db->query('SELECT COUNT(id) AS count ,CONCAT(`request_type`,`poem_type`,\'good\') as type FROM `requests` where `result` not like \'%ba7er%know%\' Group by `request_type`,`poem_type`')->result_array());
		$query = array_merge($query,$this->db->query('SELECT COUNT(id) AS count ,\'totalgood\' as type FROM `requests` where `result` not like \'%ba7er%know%\'')->result_array());
		echo json_encode($query);
	}
	
	public function amoodyMezan($pageNo)
	{
		if($this->session->userdata('MUKHTAR_LOGIN_OK')!="MUKHTAR_LOGIN_OK")
		{
			header('Location: '. base_url('admin/'));
		}
		
		$data['requests']= self::getAmoodyMezanRequestsNextPage($pageNo);
		$data['pageNo']=$pageNo;
		$data['totals'] = json_encode($this->db->query('SELECT COUNT(*) as \'cnt\' FROM `requests` WHERE `request_type`=\'mezan\' and `poem_type` = \'a\' order by `id`')->result_array());
		$this->load->view('admin/amoodyMezan',$data);

	}
	
	public function getAmoodyMezanRequestsNextPage($pageNo)
	{
		$query = $this->db->query('SELECT * FROM `requests` WHERE `request_type`=\'mezan\' and `poem_type` = \'a\' order by `id` LIMIT '.$pageNo.' , 30')->result_array(); 
		return json_encode($query);
	}
	
	public function tafeelaMezan($pageNo)
	{
		if($this->session->userdata('MUKHTAR_LOGIN_OK')!="MUKHTAR_LOGIN_OK")
		{
			header('Location: '. base_url('admin/'));
		}
		
		$data['requests']= self::getTafeelaMezanRequestsNextPage($pageNo);
		$data['pageNo']=$pageNo;
		$data['totals'] = json_encode($this->db->query('SELECT COUNT(*) as \'cnt\' FROM `requests` WHERE `request_type`=\'mezan\' and `poem_type` = \'t\' order by `id`')->result_array());
		$this->load->view('admin/tafeelaMezan',$data);

	}
	
	public function getTafeelaMezanRequestsNextPage($pageNo)
	{
		$query = $this->db->query('SELECT * FROM `requests` WHERE `request_type`=\'mezan\' and `poem_type` = \'t\' order by `id` LIMIT '.$pageNo.' , 30')->result_array(); 
		return json_encode($query);
	}
	
	public function amoodyWizard($pageNo)
	{
		if($this->session->userdata('MUKHTAR_LOGIN_OK')!="MUKHTAR_LOGIN_OK")
		{
			header('Location: '. base_url('admin/'));
		}
		
		$data['requests']= self::getAmoodyWizardRequestsNextPage($pageNo);
		$data['pageNo']=$pageNo;
		$data['totals'] = json_encode($this->db->query('SELECT COUNT(*) as \'cnt\' FROM `requests` WHERE `request_type`=\'wizard\' and `poem_type` = \'a\' order by `id`')->result_array());
		$this->load->view('admin/amoodyWizard',$data);

	}
	
	public function getAmoodyWizardRequestsNextPage($pageNo)
	{
		$query = $this->db->query('SELECT * FROM `requests` WHERE `request_type`=\'wizard\' and `poem_type` = \'a\' order by `id` LIMIT '.$pageNo.' , 30')->result_array(); 
		return json_encode($query);
	}
	
	public function tafeelaWizard($pageNo)
	{
		if($this->session->userdata('MUKHTAR_LOGIN_OK')!="MUKHTAR_LOGIN_OK")
		{
			header('Location: '. base_url('admin/'));
		}
		
		$data['requests']= self::getTafeelaWizardRequestsNextPage($pageNo);
		$data['pageNo']=$pageNo;
		$data['totals'] = json_encode($this->db->query('SELECT COUNT(*) as \'cnt\' FROM `requests` WHERE `request_type`=\'wizard\' and `poem_type` = \'t\' order by `id`')->result_array());
		$this->load->view('admin/tafeelaWizard',$data);

	}
	
	public function getTafeelaWizardRequestsNextPage($pageNo)
	{
		$query = $this->db->query('SELECT * FROM `requests` WHERE `request_type`=\'wizard\' and `poem_type` = \'t\' order by `id` LIMIT '.$pageNo.' , 30')->result_array(); 
		return json_encode($query);
	}
	
	
	public function qafeahAnalyzer($pageNo)
	{
		if($this->session->userdata('MUKHTAR_LOGIN_OK')!="MUKHTAR_LOGIN_OK")
		{
			header('Location: '. base_url('admin/'));
		}
		
		$data['requests']= self::getQafeahAnalyzer($pageNo);
		$data['pageNo']=$pageNo;
		$data['totals'] = json_encode($this->db->query('SELECT COUNT(*) as \'cnt\' FROM `requests` WHERE `request_type`=\'aQafeah\' order by `id`')->result_array());
		$this->load->view('admin/qafeahAnalyzer',$data);

	}
	
	public function getQafeahAnalyzer($pageNo)
	{
		$query = $this->db->query('SELECT * FROM `requests` WHERE `request_type`=\'aQafeah\' order by `id` LIMIT '.$pageNo.' , 30')->result_array(); 
		return json_encode($query);
	}
	
	public function du2aleeTrainings($pageNo)
	{
		if($this->session->userdata('MUKHTAR_LOGIN_OK')!="MUKHTAR_LOGIN_OK")
		{
			header('Location: '. base_url('admin/'));
		}
		
		$data['requests']= self::getDu2aleeTrainings($pageNo);
		$data['pageNo']=$pageNo;
		$data['totals'] = json_encode($this->db->query('SELECT COUNT(*) as \'cnt\' FROM `user_tashkeel_training_requests` where `isPublished`=\'0\' order by `id`')->result_array());
		$this->load->view('admin/du2aleeTrainings',$data);

	}
	
	public function getDu2aleeTrainings($pageNo)
	{
		$query = $this->db->query('SELECT * FROM `user_tashkeel_training_requests` where `isPublished`=\'0\' order by `id` LIMIT '.$pageNo.' , 30')->result_array(); 
		return json_encode($query);
	}
	
	public function du2aleeGoodResults($pageNo)
	{
		if($this->session->userdata('MUKHTAR_LOGIN_OK')!="MUKHTAR_LOGIN_OK")
		{
			header('Location: '. base_url('admin/'));
		}
		
		$data['requests']= self::getDu2aleeGoodResults($pageNo);
		$data['pageNo']=$pageNo;
		$data['totals'] = json_encode($this->db->query('SELECT COUNT(*) as \'cnt\' FROM `good_tashkeel_results` order by `id`')->result_array());
		$this->load->view('admin/du2aleeGoodResults',$data);

	}
	
	public function getDu2aleeGoodResults($pageNo)
	{
		$query = $this->db->query('SELECT * FROM `good_tashkeel_results` order by `id` LIMIT '.$pageNo.' , 30')->result_array(); 
		return json_encode($query);
	}
	
}