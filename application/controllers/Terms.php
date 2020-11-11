<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class : Contact (HomeController)
 * Contact Class to control Contact Page.
 * @author : Amit Yadav
 * @version : 1.5
 * @since : 15 November 2019-20
 */
class Terms extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
		
    }
    
    /**
     * This function used to load the first screen
     */
    public function index()
    {
		  
        $data['title'] = 'Terms & Conditions | Fiesttech';
	//	$data['layout'] = 'terms';
		$this->load->view('terms',$data);
      
       
    }
	
	
    

   
}

?>