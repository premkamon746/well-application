<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
    
    public function Header() {
    	// Logo
    	$image_file = base_url().'assets/img/well_logo.png';
    	$this->Image($image_file, 10, 5, 36, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    	
    	$image_file = base_url().'assets/img/logo_head.png';
    	$this->Image($image_file, 155, 5, 50, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    	
    	// Set font
    	$this->SetFont('cordiaupc', 'B', 18);
//     	// Title
//     	$this->Cell(0, 0, "   บริษัท  เวลเอ็นจิเนียริ่งเซอร์วิส  จำกัด", 0, false, 'L', 0, '', 0, false, 'M', 'M');
//     	$this->Cell(0, 0, "   Well Engineering Service Co.,Ltd.", 0, false, 'L', 0, '', 0, false, 'M', 'M');
//     	$this->Cell(0, 0, 'บริษัท  เวลเอ็นจิเนียริ่งเซอร์วิส  จำกัด', 0, 0, 'L', 0, '', 0);
//      	$this->Cell(0, 0, 'Well Engineering Service Co.,Ltd.', 0, 0, 'L', 0, '', 0);

    	$this->ln(1);
    	
     	$this->Cell(0, 0, '                            บริษัท  เวลเอ็นจิเนียริ่งเซอร์วิส  จำกัด', 0, 1, 'L', 0, '', 0);
     	$this->Cell(0, 0, '                            Well Engineering Service Co.,Ltd.', 0, 1, 'L', 0, '', 0);
     	
     	$this->SetFont('cordiaupc', '', 12);
     	$this->Cell(0, 0, '98  หมู่11  ถ.บางนา-ตราด กม.23  ต.บางเสาธง  อ.บางเสาธง  จ.สมุทรปราการ   10540                          Tel : (662) 397 9324-29', 0, 1, 'L', 0, '', 0);
     	$this->Cell(0, 0, '98 Moo 11  BangNa-Trad Road Km.23, T.Bangsaothong, Bangsaothong, SamutPrakarn  10540   Fax : (662) 397 9330        http://www.well-engineering.com', 0, 1, 'L', 0, '', 0);
     	
     	$this->Line(10, 34, 200, 34,'');
    }
    
    // Page footer
    public function Footer() {
    	// Position at 15 mm from bottom
    	$this->SetY(-70);
    	// Set font
    	
    	// Page number
    	//$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    	
    	// Set some content to print
    	$html = <<<EOD
		<table>
    			<tr>
    			<td></td>
    			<td style="padding:10px;">Yours faithfully</td>	
    		</tr>	
    		<tr>
    			<td style="border:1px solid #000000;text-align:center;padding:10px;">
    				<u>Customer Only</u>
    				<div style="font-size:0.8em;">Accepted for Term and Conditions by Authorized Signature</div>
    				<br/><br/><br/>
    				<div style="font-size:0.8em;">Authorized by …...……………….....   Date ……..…………….	</div>
    				<div style="font-weight:bold;">Please return by Fax to. 662-397-9330</div>				
    			
    			</td>
    			<td style="">
    			<br/><br/><br/><br/><br/><br/>
    			<span style="margin-left:10px;font-size:0.8em;">
    				------------------------------
    					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    				------------------------------
    			</span><br/>
    			
    			<span style="margin-left:10px;font-size:0.8em;">
    				Patchareeya  Hongsinee
    					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    				Chutikarn  OuyNong
    			</span><br/>
    			<span style="margin-left:10px;font-size:0.8em;">
    				Assistant Sale Manager
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    				Marketing Director
    			</span><br/>
    			<span style="margin-left:10px;font-size:0.8em;">
    				Mobile: 081 628 7405
    					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    				Mobile: 081-811-7266
    			</span><br/>
    			<span style="margin-left:10px;font-size:0.8em;">
    				E mail : patchareeya@well-engineering.com
    			</span>
    			</td>	
    		</tr>		
    	</table>
EOD;
		
		// output the HTML content
		$this->writeHTML($html, true, 0, true, 0);
		
    }
}
