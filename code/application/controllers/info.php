<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class info extends CI_Controller {

	function __construct()
	{
		error_reporting(0);
		
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->database();
		$this->load->helper('url');
		/* ------------------ */	

	}

	
	public function index()
	{
		$this->load->view('info');
	}
	
	public function mukhtar()
	{
		$this->load->view('mukhtar');
	}
	
	public function donate()
	{
		$this->load->view('donate');
	}
	
	public function du2alee_donate()
	{
		$this->load->view('du2alee/donate');
	}
	
	public function privacy()
	{
		$this->load->view('privacy');
	}
	
	public function du2alee_privacy()
	{
		$this->load->view('du2alee/privacy');
	}
	
	public function about()
	{
		$this->load->view('about');
	}
	
	public function du2alee_about()
	{
		$this->load->view('du2alee/about');
	}
	
	public function inputhelp()
	{
		$this->load->view('gui/help');
	}
	
	public function help()
	{
		$this->load->view('help/main');
	}
	
	public function mobile()
	{
		$this->load->view('mobile');
	}
	
	public function media()
	{
		$this->load->view('media');
	}
	
	public function developers()
	{
		$this->load->view('developers');
	}
	
	public function says($pageID)
	{
		$sql="select * from says order by id desc limit " . --$pageID * 10 .",10";
		$data['comments']=$this->db->query($sql)->result_array();
		$data['totals']=$this->db->query('select count(*) as `cnt` from says')->result_array();
		$data['pageID']=$pageID;
		$this->load->view('says',$data);
	}	
	
}