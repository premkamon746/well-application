<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quotation extends MY_Controller {
	public $pdf;
	function __construct(){
		parent::__construct();
		$this->load->model('quotation_model');
		$this->load->model('job_model');
		$this->load->model('customer_model');
		$this->load->model('employee_model');
		$this->load->helper('customer');
		$this->load->helper('formx');
	}
	
	public function index()
	{
		$this->load->view('index');
	}
	
	function create(){
		$data = array();
		//print_r($this->input->post());
		if($post = $this->input->post()){
			if($this->validateForm($post)){
				$id = $this->quotation_model->createQuotation($post,$this->user_id);
				redirect(base_url("quotation/line/$id"));
			}else{
				$data['warngin_msg'] ="Please fill all field.";
				$data = array_merge($data, $post);
			}
		}
		
		$data['sale_rep'] = $this->employee_model->getSaleRep();
		$data['customer'] = $this->customer_model->getCustomer();
		$data['term'] = $this->quotation_model->getCreditTerm();
		
		$this->load->view('quotation/create',$data);
	}
	
	function validateForm($post){
		extract($post);
		if($quote_date==""||$customer_id==""||$bill_to_id==""
			||$ship_to_id=="" /*||$contact_person==""||$attention==""
			||$cc_to==""||$subject==""||$email=="" ||$remarks=="" */
		    || $credit_term=="" || $default_sales==""){
			return false;
		}
		return true;	
	}
	
	public function search()
	{
		$data = array();
		
		if($post = $this->input->post()){
			$this->session->set_userdata("array_val",$post);
			$data['quot_search'] = $this->quotation_model->getSearch($post);
			$data = array_merge($data, $post);
		}if($post =$this->session->userdata("array_val")){
			$data['quot_search'] = $this->quotation_model->getSearch($post);
			$data = array_merge($data, $post);
		}
		
		$data['customer'] = $this->customer_model->getCustomer();
		
		$this->load->view('quotation/search',$data);
	}
	
	public function search_detail($id)
	{
		$data = array();
		$this->load->helper("job");
		$data['job'] = $this->job_model->getJobCustomerDetail($id);
		
		if($post = $this->input->post()){
			$this->job_model->createJobDetail($post,$id,$this->user_id);
		}
		$data['job_line'] = $this->job_model->getJobLine($id);
		$this->load->view('job/search_detail',$data);
	}
	
	public function detail($id)
	{
		$data = array();
		$data['job'] = $this->job_model->getJob($id);
		
		if($post = $this->input->post()){
			$quote_id = $post["quote_id"];
			$data["quote"] = $this->quotation_model->updateLineStatus($post,$quote_id);
		}
		
		$data["quote"] = $this->quotation_model->getQuotation($id);
		$data["quote_id"] = $id;
		
		$data["quote_line"] = $this->quotation_model->getLine($id);
		$data['job_line'] = $this->job_model->getJobLine($id);
		$this->load->view('quotation/detail',$data);
	}
	
	public function copy($quote_id){
		$new_id = $this->quotation_model->copy($quote_id);
		redirect(base_url()."quotation/detail/{$new_id}");
	}
	
	public function cancel($quote_id){
		$this->quotation_model->cancel($quote_id);
		redirect(base_url()."quotation/detail/{$quote_id}");
	}
	
	public function approve(){
		if($post = $this->input->post()){
			$this->quotation_model->approve($post);
			redirect(site_url('quotation/search'));
		}
	}
	
	public function line($id)
	{
		$data = array();
		if($post = $this->input->post()){
			$data['quot_search'] = $this->quotation_model->createLine($post,$id,$this->user_id);
		}
		$data['quote_id'] = $id;
		$data['line'] = $this->quotation_model->getLine($id);
		$data['item_cat'] = $this->quotation_model->getItemCatagory();
		
		$data['vat'] = $this->customer_model->getVat();
		$this->load->view('quotation/create_line',$data);
	}
	
	public function del_line($line_id,$quote_id){
		$this->quotation_model->delLine($line_id);
		redirect(base_url()."/quotation/line/{$quote_id}");
	}
	
	public function quote_job($quote_id){
		$data = array();
		$job_no = array();
		if($post = $this->input->post()){
			
			//echo "count job no :" .count($job_no);
			if($this->session->userdata("job_no")){
				$job_no = $this->session->userdata("job_no");
				//echo "count job no :" .count($job_no);
				if(count($job_no) <=0){
					$job_no[count($job_no)] = $post["job_no"];
				}
				$job_no[count($job_no)] = $post["job_no"];
			}else{
				$job_no[count($job_no)] = $post["job_no"];
				
			}
			$job_no = array_unique($job_no);
			$this->session->set_userdata("job_no",$job_no);
			
		}else{
			$job_no = $this->session->userdata("job_no");
		}
		
		$data['job_search'] = array();
		for ($i = 0; $i < count($job_no); $i++){
			$data['job_search'][$i] = $this->job_model->getJobTypeByJobNo($job_no[$i]);
		}
		//print_r($job_no);
		$data['job_no'] = $job_no;
		
		$data['job_cus'] = $this->job_model->getJobByCustomerId($quote_id);
		$data["quote_id"] = $quote_id;
		$this->load->view('quotation/qoute_job',$data);
	}
	
	function remove_qj($job_nox,$qid){
		if($this->session->userdata("job_no")){
			$job_no = $this->session->userdata("job_no");
			$njob_no = array();
			$i=0;
			foreach ($job_no as $j){
				if($j != $job_nox){
					$njob_no[$i]=$j;
					$i++;
				}
			}
			$this->session->set_userdata("job_no",$njob_no);
		}
		redirect(base_url()."quotation/quote_job/{$qid}");
	}
	
	public function save_quote_job(){
		if($post = $this->input->post()){
			$data['job_search'] = $this->job_model->saveQuoteJob($post,$this->user_id);
			//redirect(base_url().'quotation/quote_job/'.$post['quote_id']);
			$this->session->set_userdata("job_no",array());
			redirect(base_url().'quotation/search/');
		}
	}
	
	function sale_item_ajax($category){
		$item_cat = $this->quotation_model->getItemCatagoryName($category);
		//$total = $this->quotation_model->getItemCatagoryRecord($category);
		$data['sale_item'] = $item_cat;
		echo $this->load->view('quotation/sale_item',$data,false);
	}
	
	function qprint($quote_id){
		$this->load->library('Pdf');
		$this->load->model('quotation_model');
		
		$this->pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		
		$this->pdf->SetCreator(PDF_CREATOR);
		$this->pdf->SetTitle('My Title');
		$this->pdf->SetHeaderMargin(30);
		$this->pdf->SetTopMargin(20);
		$this->pdf->setFooterMargin(20);
		$this->pdf->SetAutoPageBreak(true);
		$this->pdf->SetAuthor('Author');
		$this->pdf->SetDisplayMode('real', 'default');
		
		$this->pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		
		
		$this->pdf->SetFont('cordiaupc', 'B', 16, '', true);
		$this->pdf->AddPage();
		//$this->pdf->Write(0, $txt);
		$this->pdf->ln(14);
		
		
		$quote = $this->quotation_model->getQuotation($quote_id);
		
		$html = $this->write_html_header($quote);
		// output the HTML content
		$this->pdf->writeHTML($html, true, 0, true, 0);
		
		$header = array('Item', 'Description', 'Quantity', '@', 'Total (Baht)');
		
		// data loading
		//$data = $this->LoadData($quote_id);
		
		// print colored table
		$this->ColoredTable($header, $quote_id,$quote);
		
		
		$this->pdf->Output('qouta.pdf', 'I');
	}
	
	
	// Colored table
	public function ColoredTable($header,$quote_id,$quote) {
		// Colors, line width and bold font
		$this->pdf->SetFillColor(255, 255, 255);
		$this->pdf->SetTextColor(0);
		//$this->pdf->SetDrawColor(128, 0, 0);
		$this->pdf->SetLineWidth(0.3);
		//$this->SetFont('', 'B');
		// Header
		$w = array(10, 100, 25, 25,30);
		//$num_headers = count($header);
		//$this->pdf->Write(1, 'Example of HTML tables', '', 0, 'L', true, 0, false, false, 0);
// 		for($i = 0; $i < $num_headers; ++$i) {
// 			$this->pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
// 		}
		//$header = array('Item', 'Description', 'Quantity', '@', 'Total (Baht)');
		
		//$data = array();
		//print_r($quote_line->result());
		
		
		$html = '<table  cellspacing="0" cellpadding="1" border="1">
					<tr>
						<td width="10">Item</td>
						<td width="100">Description</td>
						<td width="25">Quantity</td>
						<td width="25">@</td>
						<td width="30">Total (Baht)</td>
					</tr>';
		
		$html = '
<table cellspacing="0" cellpadding="1" border="1">
    <tr>
						<td width="30" align="center">Item</td>
						<td width="300" align="center">Description</td>
						<td width="75" align="center">Quantity</td>
						<td width="75" align="center">@</td>
						<td width="75" align="center">Total (Baht)</td>
					</tr>';
		
// 		$this->pdf->Ln();
// 		// Color and font restoration
// 		$this->pdf->SetFillColor(224, 235, 255);
// 		$this->pdf->SetTextColor(0);
// 		$this->pdf->SetFont('');
		// Data
// 		$fill = 0;

		

		$quote_line = $this->quotation_model->getLine($quote_id);
		$i = 1;
		$total = 0;
		$discount = 0;
		foreach($quote_line->result() as $l) {
			 $html .= '<tr>
						<td width="30" align="left">'.$i.'</td>
						<td width="300" align="left">'.$l->remarks.'</td>
						<td width="75" align="right">'.$l->quantity.'</td>
						<td width="75" align="right">'.number_format($l->unit_selling_price).'</td>
						<td width="75" align="right">'.number_format($l->line_amount).'</td>
					</tr>';
			 $total += $l->line_amount;
			//$fill=!$fill;
		}
		
		$total_discount = $total - $discount;
		$vat = $total_discount*0.07;
		$grand = $total_discount+$vat;
		
		$this->load->helper('currency');
		$currency = currency($grand);
			$html .= ' <tr>
					    <td colspan="5">Contact Person : '.$quote->contact_person.'</td>
					  </tr>
					  <tr>
					    <td colspan="2" rowspan="5">
							Delivery		:	Within	7	days  after  received  Purchase  Order<br/>			
							Payment		:	Credit	30	Days  after  date  of  delivery.	<br/>			
							Validity		:	30	days after quoted date.			<br/>		
							JOB		:	WM5704-441						
					    		
					    </td>
					    <td colspan="2">Total</td>
					    <td align="right">'.number_format($total,2).'</td>
					  </tr>
					  <tr>
					    <td colspan="2">Discount</td>
					    <td align="right">'.number_format($discount,2).'</td>
					  </tr>
					  <tr>
					    <td colspan="2">Total</td>
					    <td align="right">'.number_format($total_discount,2).'</td>
					  </tr>
					  <tr>
					    <td colspan="2">Vat 7%</td>
					    <td align="right">'.number_format($vat,2).'</td>
					  </tr>
					  <tr>
					    <td colspan="2">Grand Total</td>
					    <td align="right">'.number_format($grand,2).'</td>
					  </tr>
					    		<tr>
					    <td align="right" colspan="5">'.$currency.'</td>
					  </tr>';

		
		$html .= '</table>';
		
		$this->pdf->writeHTML($html, true, 0, true, 0);
		
		//$this->pdf->Cell(array_sum($w), 0, '', 'T');
	}
	
	
	private function write_html_header($quote){
		$address = getProvince($quote->bill_to_id)->province_name;
		$site = getSiteInfo($quote->bill_to_id);
		$phone = $site->phone_number;
		//$phone = $site->phone_number;
		$html = <<<EOD
		<table>
    		<tr>
    			<td width="80" >Quotation</td>
    			<td  width="200">: $quote->quote_number</td>
				<td width="80" ></td>
    			<td></td>
    		</tr>
			<tr>
    			<td>Customer</td>
    			<td>: $quote->customer_name</td>
				<td></td>
    			<td></td>
    		</tr>
			<tr>
    			<td>Location</td>
    			<td>: $address</td>
				<td align="right">Date </td>
    			<td>: $quote->quote_date </td>
    		</tr>
			<tr>
    			<td>Attention</td>
    			<td>: $quote->attention </td>
				<td align="right">Tell </td>
    			<td>: $phone </td>
    		</tr>
			<tr>
    			<td>CC.</td>
    			<td>: $quote->cc_to</td>
				<td align="right">Fax </td>
    			<td>:</td>
    		</tr>
			<tr>
    			<td>Subject</td>
    			<td>: $quote->subject </td>
				<td></td>
    			<td></td>
    		</tr>
			<tr>
    			<td>Refer</td>
    			<td>:</td>
				<td align="right">Email </td>
    			<td>:</td>
    		</tr>
    	</table>
EOD;
		
		return $html;
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */