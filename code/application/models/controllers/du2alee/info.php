<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class info extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->database();
		$this->load->helper('url');
		/* ------------------ */	

	}

	
	
	public function donate()
	{
		$this->load->view('du2alee/donate');
	}
	
	
	public function privacy()
	{
		$this->load->view('du2alee/privacy');
	}
	
	
	
	public function about()
	{
		$this->load->view('du2alee/about');
	}
	
	
	
}