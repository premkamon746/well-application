<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('convDate'))
{
	function convDate($date){
		list($d ,$m ,$y) = explode("/",$date);
		return $y."-".$m."-".$d;
	}
    
}