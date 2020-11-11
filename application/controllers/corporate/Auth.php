<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login (LoginController)
 * Login class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Auth extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('general_model');
		$this->load->library('form_validation');
		$this->load->library('session');
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $data['title'] = 'Corporate User Login | Vn24';
        $data['layout'] = 'corporate/login';
        $this->load->view('corporate/layout', $data);
    }
    public function signup()
    {
        
		$data['title'] = 'Corporate User Signup | Vn24';
        $data['layout'] = 'corporate/signup';
        $this->load->view('corporate/layout', $data);
    }
	
	 function _VendorCheck($str)
        {
			
			    $code = $this->general_model->VendorCheck($str);
                if ($code == true )
                {
                        
						return TRUE;
                }
                else
                {
                        $this->form_validation->set_message('_VendorCheck', 'The {field} is not valid');
                        return FALSE;
                }
        }
		function _accept_terms() {
    if (isset($_POST['accept_terms'])) return true;
    $this->form_validation->set_message('_accept_terms', 'Please read and accept our terms and conditions.');
    return false;
}
	
	 public function createAccount()
    {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">*', '</div>');
		$this->form_validation->set_rules('uname', 'Name', 'required|max_length[128]|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[128]|trim|is_unique[tbl_users.email]');
		$this->form_validation->set_rules('mobile', 'mobile', 'required|max_length[10]|trim');
		$this->form_validation->set_rules('v_code', 'Vendor Code', 'required|trim|callback__VendorCheck');
		$this->form_validation->set_rules('gst', 'GST', 'required|min_length[15]|max_length[15]|trim');
		$this->form_validation->set_rules('pan', 'Pan Number', 'required|min_length[10]|max_length[10]|trim');
		$this->form_validation->set_rules('address', 'Address', 'required|trim');
		
		
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[12]');
		$this->form_validation->set_rules('cpassword','Password confirmation','required|min_length[6]|max_length[12]|matches[password]');
	//	$this->form_validation->set_rules('accept_terms', 'accept terms', 'required|trim|callback__accept_terms');
        if($this->form_validation->run() == FALSE)
        {
            
			$this->signup();
			
        }
		else
		{
			
			$data = array(
			'name' => $this->security->xss_clean($this->input->post('uname')),
			'email' => $this->security->xss_clean($this->input->post('email')),
			'mobile' => $this->security->xss_clean($this->input->post('mobile')),
			'vendor_code' => $this->security->xss_clean($this->input->post('v_code')),
			'gst' => $this->security->xss_clean($this->input->post('gst')),
			'pan' => $this->security->xss_clean($this->input->post('pan')),
			'address' => $this->security->xss_clean($this->input->post('address')),
			'password' => password_hash($this->security->xss_clean($this->input->post('password')), PASSWORD_BCRYPT),
			'roleId'=>3,
			'createdDtm'=> date('Y-m-d H:i:s'),
			'updatedDtm'=> date('Y-m-d H:i:s')
			);
			
			$result = $this->general_model->register($data);
			$this->session->set_flashdata('success','Successfully Signed Up. Please Login');
			redirect(base_url('corporate/login'),'refresh');
			
			
			
		}
		
		
    }
	
	
    
    
    /**
     * This function used to logged in user
     */
    public function loginMe()
    {
		
	
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">*', '</div>');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[128]|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[12]');
        
        if($this->form_validation->run() == FALSE)
        {
           $this->index();
        }
        else
        {
			
			$data = array(
			'email' => $this->security->xss_clean($this->input->post('email')),
			'password' => $this->input->post('password'),
			);
			
            $result = $this->general_model->login_corp($data);
		
		
            if(!empty($result))
            {
                

                $sessionArray = array('userId'=>$result['userId'],                    
                                        'crole'=>$result['roleId'],
                                        'roleText'=>'corporate',
										'cemail'=>$result['email'],
                                        'name'=>$result['name'],
                                        'lastLogin'=> $result['createdDtm'],
                                        'corpLoggedIn' => TRUE
                                );

                $this->session->set_userdata($sessionArray);

                
                redirect('corporate/dashboard');
            }
            else
            {
                $this->session->set_flashdata('error', 'Email or password mismatch');
                
                 $this->index();
            }
        }
    }

    /**
     * This function used to load forgot password view
     */
    public function forgotPassword()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('admin/forgotPassword');
        }
        else
        {
            redirect('/admin/dashboard');
        }
    }
    
    /**
     * This function used to generate reset password request link
     */
    function resetPasswordUser()
    {
        $status = '';
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('login_email','Email','trim|required|valid_email');
                
        if($this->form_validation->run() == FALSE)
        {
            $this->forgotPassword();
        }
        else 
        {
            $email = strtolower($this->security->xss_clean($this->input->post('login_email')));
            
            if($this->login_model->checkEmailExist($email))
            {
                $encoded_email = urlencode($email);
                
                $this->load->helper('string');
                $data['email'] = $email;
                $data['activation_id'] = random_string('alnum',15);
                $data['createdDtm'] = date('Y-m-d H:i:s');
                $data['agent'] = getBrowserAgent();
                $data['client_ip'] = $this->input->ip_address();
                
                $save = $this->login_model->resetPasswordUser($data);                
                
                if($save)
                {
                    $data1['reset_link'] = base_url() . "resetPasswordConfirmUser/" . $data['activation_id'] . "/" . $encoded_email;
                    $userInfo = $this->login_model->getCustomerInfoByEmail($email);

                    if(!empty($userInfo)){
                        $data1["name"] = $userInfo->name;
                        $data1["email"] = $userInfo->email;
                        $data1["message"] = "Reset Your Password";
                    }

                    $sendStatus = resetPasswordEmail($data1);
					

                    if($sendStatus){
                        $status = "send";
                        setFlashData($status, "Reset password link sent successfully, please check mails.");
                    } else {
                        $status = "notsend";
                        setFlashData($status, "Email has been failed, try again.");
                    }
                }
                else
                {
                    $status = 'unable';
                    setFlashData($status, "It seems an error while sending your details, try again.");
                }
            }
            else
            {
                $status = 'invalid';
                setFlashData($status, "This email is not registered with us.");
            }
            redirect('/admin/forgotPassword');
        }
    }

    /**
     * This function used to reset the password 
     * @param string $activation_id : This is unique id
     * @param string $email : This is user email
     */
    function resetPasswordConfirmUser($activation_id, $email)
    {
        // Get email and activation code from URL values at index 3-4
        $email = urldecode($email);
        
        // Check activation id in database
        $is_correct = $this->login_model->checkActivationDetails($email, $activation_id);
        
        $data['email'] = $email;
        $data['activation_code'] = $activation_id;
        
        if ($is_correct == 1)
        {
            $this->load->view('admin/newPassword', $data);
        }
        else
        {
            redirect('/login');
        }
    }
    
    /**
     * This function used to create new password for user
     */
    function createPasswordUser()
    {
        $status = '';
        $message = '';
        $email = strtolower($this->input->post("email"));
        $activation_id = $this->input->post("activation_code");
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('password','Password','required|max_length[20]');
        $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->resetPasswordConfirmUser($activation_id, urlencode($email));
        }
        else
        {
            $password = $this->input->post('password');
            $cpassword = $this->input->post('cpassword');
            
            // Check activation id in database
            $is_correct = $this->login_model->checkActivationDetails($email, $activation_id);
            
            if($is_correct == 1)
            {                
                $this->login_model->createPasswordUser($email, $password);
                
                $status = 'success';
                $message = 'Password reset successfully';
            }
            else
            {
                $status = 'error';
                $message = 'Password reset failed';
            }
            
            setFlashData($status, $message);

            redirect("/admin/login");
        }
    }
	
	
	function logout() {
		$this->session->sess_destroy ();
		
		redirect ( 'https://www.vn24.in/' );
	}

}
