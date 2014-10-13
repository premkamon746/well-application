<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('getAddress'))
{
    function getAddress($site_id)
    {
        $CI = & get_instance();
        $CI->load->model('customer_model');
        $addr =  $CI->customer_model->getAddress($site_id)->row();
        
        $contact = $addr->contact_person;
        $address = $addr->address1;
        $province = getProvince($addr->province_code);
        $t = "ผู้ติดต่อ : ".$contact." ที่อยู่ :".$address." ".$province->province_name;
        return $t;
    }  

    
    function getProvince($id)
    {
    	$CI = & get_instance();
    	$CI->load->model('customer_model');
    	return  $CI->customer_model->getProvinceById($id)->row();
    	 
    }
    
    function getSiteInfo($id){
    	$CI = & get_instance();
    	$CI->load->model('customer_model');
    	return  $CI->customer_model->getSiteInfo($id)->row();
    }
    
    
}