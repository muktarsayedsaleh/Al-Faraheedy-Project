<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class f_printer extends CI_Controller {

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
		$this->load->view('gui/mezan');
	}
	
	
	public function tafeela($id)
	{
		$query = $this->db->get_where('html2print',array('id' => $id));
		$data['html']=$query->row()->html;
		$data['poem']=$query->row()->poem;
		$this->load->view('printTafeela',$data);
	}
	
	public function shater($id)
	{
		$query = $this->db->get_where('html2print',array('id' => $id));
		$data['html']=$query->row()->html;
		$this->load->view('printShater',$data);
	}
	
	public function save($id)
	{
		$query = $this->db->get_where('html2print',array('id' => $id));
		$data['html']=$query->row()->html;
		$this->load->view('saveShater',$data);
	}
	
	
	//get next ID
	public function nextID()
	{
		$query=$this->db->query("SELECT `id` FROM `html2print` order by `id` desc limit 1");
		$row=$query->row();
		
		if(!isset($row->id))
		{
			return 1;
		}
		else
		{
			return $row->id+1;
		}
	}
	
	public function printtafeela(){
		
		$html=$this->input->post('h');
		$poem=$this->input->post('p');
		$id=$this->nextID();
		
		$data=array('id' => $id,
					'html'=>$html,
					'poem'=>$poem,
					'type'=>'2'); // 2 is tafeela poem !);

		
        $query = $this->db->insert('html2print',$data);
		
		if($query)
		{
			echo json_encode(array('id'=>$id));
		}
		else
		{
			echo json_encode(array('id'=>-1));
		}
		
	}
	
	
	public function printshater(){
		
		$html=$this->input->post('h');
		$id=$this->nextID();
		
		$data=array('id' => $id,
					'html'=>$html,
					'type'=>'1'); // 1 is shater !

		
        $query = $this->db->insert('html2print',$data);
		
		if($query)
		{
			echo json_encode(array('id'=>$id));
		}
		else
		{
			echo json_encode(array('id'=>-1));
		}
		
	}
	
	
	public function share($id){
		
		$query = $this->db->get_where('html2print',array('id' => $id));
		$data['html']=$query->row()->html;
		$this->load->view('shareShater',$data);
		
	}
	
	public function shareQ($id){
		
		$query = $this->db->get_where('html2print',array('id' => $id));
		$data['html']=$query->row()->html;
		$this->load->view('shareShaterQ',$data);
		
	}
	
	
	
	
	
	
}