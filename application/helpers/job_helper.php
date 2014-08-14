<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('getJobType'))
{
    function getJobType($id)
    {
       $CI = & get_instance();
       $CI->load->model('job_model');
       return $CI->job_model->getJobTypeById($id)->type_name;
    }   
}


if ( ! function_exists('getJobSubType'))
{
    function getJobSubType($id)
    {
        $CI = & get_instance();
        $CI->load->model('job_model');
        return $CI->job_model->getJobSubTypeById($id)->sub_type_name;
    }   
}