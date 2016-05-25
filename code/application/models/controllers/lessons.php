<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lessons extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->database();
		$this->load->helper('url');
		/* ------------------ */	

	}

	
	public function index()
	{
		$this->load->view('lessons/main');
	}
	
	public function lesson1()
	{
		$this->load->view('lessons/lesson1');
	}
	
	public function lesson2()
	{
		$this->load->view('lessons/lesson2');
	}
	
	public function lesson3()
	{
		$this->load->view('lessons/lesson3');
	}
	
	public function lesson4()
	{
		$this->load->view('lessons/lesson4');
	}
	
	public function lesson5()
	{
		$this->load->view('lessons/lesson5');
	}
	public function lesson6()
	{
		$this->load->view('lessons/lesson6');
	}
	public function lesson7()
	{
		$this->load->view('lessons/lesson7');
	}
	public function lesson8()
	{
		$this->load->view('lessons/lesson8');
	}
	public function lesson9()
	{
		$this->load->view('lessons/lesson9');
	}
	public function lesson10()
	{
		$this->load->view('lessons/lesson10');
	}
	public function lesson11()
	{
		$this->load->view('lessons/lesson11');
	}
	public function lesson12()
	{
		$this->load->view('lessons/lesson12');
	}
	public function lesson13()
	{
		$this->load->view('lessons/lesson13');
	}
	public function lesson14()
	{
		$this->load->view('lessons/lesson14');
	}
	public function lesson15()
	{
		$this->load->view('lessons/lesson15');
	}
	public function lesson16()
	{
		$this->load->view('lessons/lesson16');
	}
	public function lesson17()
	{
		$this->load->view('lessons/lesson17');
	}
	public function lesson18()
	{
		$this->load->view('lessons/lesson18');
	}
	public function lesson19()
	{
		$this->load->view('lessons/lesson19');
	}
	public function lesson20()
	{
		$this->load->view('lessons/lesson20');
	}
}