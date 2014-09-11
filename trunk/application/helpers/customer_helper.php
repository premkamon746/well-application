<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('getAddress'))
{
    function getAddress($id)
    {
        $CI = & get_instance();
        $CI->load->model('customer_model');
        return $CI->customer_model->getAddress($id)->row()->address1;
    }   
}