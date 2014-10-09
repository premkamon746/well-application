<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('job_model');
		$this->load->model('customer_model');
	}
	
	public function index()
	{
		//$result = $this->db->query("select * from ar_province");
		//print_r($result);
		$this->load->view('index');
	}
	
	public function job($status)
	{
		$data = array();
		
		
		$this->load->library('pagination');

		$config['base_url'] = base_url()."index/job/".$this->uri->segment(3);
		$config['total_rows'] = $this->job_model->getTotalSearchStatus($status);
		$config['per_page'] = 10; 
		$config['uri_segment'] = 4;
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
//		$config['full_tag_open'] = '<li>';
//		$config['full_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="disabled"><a>';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		
		$this->pagination->initialize($config); 
		$data['pagination'] =  $this->pagination->create_links();

		$data['job_search'] = $this->job_model->getSearchStatus($status,$config["per_page"],$page);
		
		
		$this->load->view('dashboard/job',$data);
	}
	
	public function pdf(){
		$this->load->library('Pdf');
		
		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		
		$this->pdf->SetCreator(PDF_CREATOR);
		$pdf->SetTitle('My Title');
		$pdf->SetHeaderMargin(30);
		$pdf->SetTopMargin(20);
		$pdf->setFooterMargin(20);
		$pdf->SetAutoPageBreak(true);
		$pdf->SetAuthor('Author');
		$pdf->SetDisplayMode('real', 'default');
		
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		
		
		$pdf->SetFont('cordiaupc', '', 18, '', true);
		$pdf->AddPage();
		//$pdf->Write(0, $txt);
		$pdf->Write(0, "", '', 0, 'C', true, 0, false, false, 0);
		$pdf->Output('qouta.pdf', 'I');
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */