<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login (LoginController)
 * Login class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Login extends CI_Controller
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
        $data['title'] = 'User Login | Vn24';
        $data['layout'] = 'login';
        $this->load->view('layout', $data);
    }
    public function signup()
    {
        
		$data['title'] = 'Signup | Vn24';
        $data['layout'] = 'signup';
        $this->load->view('layout', $data);
    }
	
	 public function createAccount()
    {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">*', '</div>');
		$this->form_validation->set_rules('uname', 'Name', 'required|max_length[128]|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[128]|trim|is_unique[tbl_users.email]');
		$this->form_validation->set_rules('mobile', 'mobile', 'required|max_length[10]|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[12]');
		$this->form_validation->set_rules('cpassword','Password confirmation','required|min_length[6]|max_length[12]|matches[password]');
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
			'password' => password_hash($this->security->xss_clean($this->input->post('password')), PASSWORD_BCRYPT),
			'roleId'=>2,
			'createdDtm'=> date('Y-m-d H:i:s'),
			'updatedDtm'=> date('Y-m-d H:i:s')
			);
			
			$result = $this->general_model->register($data);
			$this->session->set_flashdata('success','Successfully Signed Up. Please Login');
			redirect(base_url('login'),'refresh');
			
			
			
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
			
            $result = $this->general_model->login($data);
		
		
            if(!empty($result))
            {
                

                $sessionArray = array('userId'=>$result['userId'],                    
                                        'urole'=>$result['roleId'],
                                        'roleText'=>'user',
										'uemail'=>$result['email'],
                                        'name'=>$result['name'],
                                        'lastLogin'=> $result['createdDtm'],
                                        'userLoggedIn' => TRUE
                                );

                $this->session->set_userdata($sessionArray);

                
                redirect('/dashboard');
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
