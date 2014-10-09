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
    	$this->SetY(-100);
    	// Set font
    	
    	// Page number
    	//$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    	
    	// Set some content to print
    	$html = <<<EOD
<table border="0" cellpadding="0" cellspacing="0" style='border-collapse:
 collapse;table-layout:fixed;width:653pt'>
  <tr class="xl89" height="27">
    <td height="27" class="xl89" style='height:20.25pt'></td>
    <td class="xl89"></td>
    <td class="xl89"></td>
    <td class="xl89"></td>
    <td class="xl89"></td>
    <td class="xl89"></td>
    <td class="xl89"></td>
    <td class="xl89"></td>
    <td class="xl89"></td>
    <td class="xl89"></td>
    <td class="xl89"></td>
    <td class="xl144" colspan="4" align="left" style='mso-ignore:colspan'>Yours
      faithfully</td>
    <td class="xl137"></td>
    <td class="xl137"></td>
    <td class="xl137"></td>
  </tr>
   <tr class="xl89" height="27" style='mso-height-source:userset;height:20.25pt'>
    <td height="27" class="xl89" style='height:20.25pt'></td>
    <td class="xl89"></td>
    <td class="xl89"></td>
    <td class="xl89"></td>
    <td class="xl89"></td>
    <td class="xl89"></td>
    <td class="xl89"></td>
    <td class="xl89"></td>
    <td class="xl89"></td>
    <td class="xl150">&nbsp;</td>
    <td class="xl152"></td>
    <td colspan="4" rowspan="4" height="105" class="xl89" width="142" style='mso-ignore:
  colspan-rowspan;height:78.75pt;width:106pt'></td>
    <td class="xl137"></td>
  </tr>
<tr class="xl89" height="26" style='mso-height-source:userset;height:19.5pt'>
    <td height="26" class="xl89" style='height:19.5pt'></td>
    <td colspan="9" class="xl193" style='border-right:1.0pt solid black'>Customer
      Only</td>
    <td class="xl145" style='border-left:none'>&nbsp;</td>
    <td class="xl91"></td>
    <td class="xl91"></td>
    <td class="xl94"></td>
  </tr>
    			
    			<tr class="xl89" height="26" style='mso-height-source:userset;height:19.5pt'>
    <td height="26" class="xl89" style='height:19.5pt'></td>
    <td colspan="9" class="xl178" style='border-right:1.0pt solid black'>Accepted for
      Term and Conditions by Authorized Signature</td>
    <td class="xl146" style='border-left:none'>&nbsp;</td>
    <td class="xl91"></td>
    <td class="xl91"></td>
    <td class="xl94"></td>
  </tr>
<tr class="xl89" height="26" style='mso-height-source:userset;height:19.5pt'>
    <td height="26" class="xl89" style='height:19.5pt'></td>
    <td class="xl146">&nbsp;</td>
    <td class="xl148"></td>
    <td class="xl148"></td>
    <td class="xl148"></td>
    <td class="xl148"></td>
    <td class="xl148"></td>
    <td class="xl148"></td>
    <td class="xl148"></td>
    <td class="xl149">&nbsp;</td>
    <td class="xl146" style='border-left:none'>&nbsp;</td>
    <td class="xl91"></td>
    <td class="xl91"></td>
    <td class="xl137"></td>
  </tr>
  <tr class="xl91" height="29" style='mso-height-source:userset;height:21.75pt'>
    <td height="29" class="xl91" style='height:21.75pt'></td>
    <td colspan="9" class="xl183" style='border-right:1.0pt solid black'>Please
      return by Fax to. 662-397-9330</td>
    <td class="xl91"></td>
    <td class="xl91" colspan="7" align="left" style='mso-ignore:colspan'>E mail :
      patchareeya@well-engineering.com</td>
  </tr>
</table>
EOD;
		
		// output the HTML content
		$this->writeHTML($html, true, 0, true, 0);
		
    }
}
