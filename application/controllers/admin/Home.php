<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Home extends BaseController
{
	/**
	 * This is default constructor of the class
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');

		$this->load->helper('form');
		$this->isLoggedIn();
	}

	/**
	 * This function used to load the first screen of the user
	 */
	public function index()
	{


		if ($this->isAdmin() == TRUE) {
			$this->loadThis();
		} else {

			$this->global['pageTitle'] = 'vn24 | Homepage Listing';
			$this->loadViews("admin/gallery/listGallery", $this->global, NULL, NULL);
		}
	}



	/**
	 * This function is used load user edit information
	 * @param number About
	 */
	function edit($id = NULL)
	{

		if ($this->isAdmin() == TRUE || $id == 1) {
			$this->loadThis();
		} else {



			$data['allData'] = $this->home_model->getHome();

			$this->global['pageTitle'] = 'vn24 : Edit Home Page';

			$this->loadViews("admin/home/editHome", $this->global, $data, NULL);
		}
	}





	/**
	 * This function is used to edit the user information
	 */
	function editHome()
	{

		if ($this->input->post('submit') !== NULL) {
			// upload support_img 

			$homeInfo =
				array(
					'sec1_title' => $this->input->post('sec1_title'),
					'sec1_des' => $this->input->post('sec1_des'),
					'sec2_title' => $this->input->post('sec2_title'),
					'sec2_des' => $this->input->post('sec2_des'),
					'sec3_title' => $this->input->post('sec3_title'),
					'sec3_des' => $this->input->post('sec3_des'),
					'sec4_title' => $this->input->post('sec4_title'),
					'sec4_des' => $this->input->post('sec4_des'),
						'sec5_title' => $this->input->post('sec5_title'),
					'sec5_des' => $this->input->post('sec5_des'),
							'sec6_title' => $this->input->post('sec6_title'),
					'sec6_des' => $this->input->post('sec6_des'),
				
				

				);

			$result = $this->home_model->editHome($homeInfo, 1);

			if ($result == true) {
				$this->session->set_flashdata('success', 'Services updated successfully');
			} else {
				$this->session->set_flashdata('error', 'Services updation failed');
			}

			redirect('admin/home/edit');
		}
		redirect('admin/home/edit');
	}
}
