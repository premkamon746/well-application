<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('currency'))
{
//     function currency($number)
//     {
//         $CI = & get_instance();
//         $CI->load->model('customer_model');
//         $addr =  $CI->customer_model->getAddress($site_id)->row();
        
//         $contact = $addr->contact_person;
//         $address = $addr->address1;
//         $province = getProvince($addr->province_code);
//         $t = "ผู้ติดต่อ : ".$contact." ที่อยู่ :".$address." ".$province->province_name;
//         return $t;
//     }

    function currency($amount_number)
    {
    	$amount_number = number_format($amount_number, 2, ".","");
    	//echo "<br/>amount = " . $amount_number . "<br/>";
    	$pt = strpos($amount_number , ".");
    	$number = $fraction = "";
    	if ($pt === false)
    		$number = $amount_number;
    	else
    	{
    		$number = substr($amount_number, 0, $pt);
    		$fraction = substr($amount_number, $pt + 1);
    	}
    
    	//list($number, $fraction) = explode(".", $number);
    	$ret = "";
    	$baht = ReadNumber ($number);
    	if ($baht != "")
    		$ret .= $baht . "บาท";
    
    	$satang = ReadNumber($fraction);
    	if ($satang != "")
    		$ret .=  $satang . "สตางค์";
    	else
    		$ret .= "ถ้วน";
    	//return iconv("UTF-8", "TIS-620", $ret);
    	return $ret;
    }
    
    function ReadNumber($number)
    {
    	$position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
    	$number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
    	$number = $number + 0;
    	$ret = "";
    	if ($number == 0) return $ret;
    	if ($number > 1000000)
    	{
    		$ret .= ReadNumber(intval($number / 1000000)) . "ล้าน";
    		$number = intval(fmod($number, 1000000));
    	}
    
    	$divider = 100000;
    	$pos = 0;
    	while($number > 0)
    	{
    		$d = intval($number / $divider);
    		$ret .= (($divider == 10) && ($d == 2)) ? "ยี่" :
    		((($divider == 10) && ($d == 1)) ? "" :
    				((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
    		$ret .= ($d ? $position_call[$pos] : "");
    		$number = $number % $divider;
    		$divider = $divider / 10;
    		$pos++;
    	}
    	return $ret;
    }
    
    
}