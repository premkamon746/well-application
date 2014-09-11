<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('selected'))
{
    function selected($select,$select2)
    {
        return $select == $select2?"selected='selected'":"";
    }   
}