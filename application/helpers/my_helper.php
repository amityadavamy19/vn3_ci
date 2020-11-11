<?php if(!defined('BASEPATH')) exit('No direct script access allowed');



/**
 * This function used to get the CI instance
 */
if(!function_exists('get_instance'))
{
    function get_instance()
    {
        $CI = &get_instance();
    }
}







function isUserLogin(){	
	$CI = & get_instance();	
	if($CI->session->userdata('roleText') == 'user' && $CI->session->userdata('urole') == 2 && $CI->session->userdata('uemail')){
		return true;
	}	
	return false;
}

function isCorLogin(){	
	$CI = & get_instance();	
	if($CI->session->userdata('roleText') == 'corporate' && $CI->session->userdata('crole') == 3 && $CI->session->userdata('cemail')){
		return true;
	}	
	return false;
}

function isVenLogin(){	
	$CI = & get_instance();	
	if($CI->session->userdata('roleText') == 'vendor' && $CI->session->userdata('vrole') == 4 && $CI->session->userdata('vemail')){
		return true;
	}	
	return false;
}

function filter_value($field_name, $empty_title = ''){
	$CI = & get_instance();
	if($CI->input->post($field_name)){
		return 	$CI->security->xss_clean( $CI->input->post($field_name));
	}
	return $empty_title;
}


function lastId()
{
    $CI = &get_instance();
	
	     $CI->db->order_by('id','desc');
	     $CI->db->limit(1);
     
 return    $res = $CI->db->get('tbl_order')->row_array()['id'];
}

function lastSId()
{
    $CI = &get_instance();
	
	     $CI->db->order_by('id','desc');
	     $CI->db->limit(1);
     
 return    $res = $CI->db->get('tbl_sales_code')->row_array()['id'];
}


function lastUId()
{
    $CI = &get_instance();
	
	     $CI->db->order_by('userId','desc');
	     $CI->db->limit(1);
     
 return    $res = $CI->db->get('tbl_users')->row_array()['userId'];
}

function get_curier($id){
	$CI = & get_instance();
	
	
		return $res = $CI->db->get_where('tbl_couriers',array('id'=>$id))->row_array()['name'];
	
}

function get_cargo($id){
	$CI = & get_instance();
	
	
		return $res = $CI->db->get_where('tbl_cargo',array('id'=>$id))->row_array()['name'];
	
}


function vendor_code(){
	$CI = & get_instance();
	
	
		return  $CI->db->get_where('tbl_users',array('userId'=>$CI->session->userdata('userId')))->row_array()['vendor_code'];
	
}

function vendor_codeByid($id){
	$CI = & get_instance();
	
	
		return  $CI->db->get_where('tbl_users',array('userId'=>$id))->row_array()['code'];
	
}

function vendor_Commission($plan){
	$CI = & get_instance();
	
	
		return  $CI->db->get_where('tbl_subscription_plan',array('name'=>$plan))->row_array()['cash_user_per'];
	
}



if(!function_exists('inv_code'))
{
    function inv_code()
    {
         $CI = get_instance();
	
	     $CI->db->order_by('id','desc');
	     $CI->db->limit(1);
     
        return    $res = $CI->db->get('tbl_billing')->row_array()['id'];
    }
}


if(!function_exists('calcVolw'))
{
    function calcVolw($l,$h,$w,$cour,$qty)
    {
         $vol_w = ($l*$h*$w)/$cour;
     
        return    @round($vol_w*$qty,3);
    }
}





if(!function_exists('sendMail'))
{
    function sendMail($to,$from,$fromName,$subject,$msg)
    {
        $CI = &get_instance();
        $config['mailtype'] = 'html';
        $CI->load->library('email',$config);
        $CI->email->from($from,$fromName);
        $CI->email->subject($subject);
        $CI->email->message($msg);
        $CI->email->to($to);
        $status = $CI->email->send();
        
        return $status;
    }
}



  function allowed_riders(){
	$CI = & get_instance();
	$ven_id = $CI->session->userdata('userId');
	$sales_code = $CI->general_model->getSingleRecord($ven_id,'userId','tbl_users');
	//pack Id
	$pack_id = $CI->general_model->getSingleRecord($sales_code['sales_code'],'code','tbl_sales_code');
	
	if($pack_id){
		//Plan Info
		 $subs_plan = $CI->general_model->getSingleRecord($pack_id['package_id'],'id','tbl_subscription_plan');
		 return $subs_plan['rider'];
	}
}


function isSuperAdmin(){
	
	$CI = & get_instance();
	
	if($CI->session->userdata('role') == 1){
		return true;
	}
	
	return false;
}




?>