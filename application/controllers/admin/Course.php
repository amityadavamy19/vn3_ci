<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Course (CourseController)
 * Course Class to control all Course related operations.
 * @author : Amit Yadav
 * @version : 1.1
 * @since : 15 November 2019-20
 */
class Course extends BaseController
{
	/**
	 * This is default constructor of the class
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('course_model');

		$this->load->helper('form');
		$this->isLoggedIn();
	}

	/**
	 * This function used to load the first screen Course
	 */
	public function index()
	{
	}

	/**
	 * This function is used to load the Gallery list
	 */
	function courseListing()
	{
		if ($this->isAdmin() == TRUE) {
			$this->loadThis();
		} else {



			$this->global['pageTitle'] = 'vn24 | Courses Listing';

			$this->loadViews("admin/course/listCourse", $this->global, NULL, NULL);
		}
	}

	/**
	 * This function is used to load the add new form
	 */
	function addNew()
	{
		if ($this->isAdmin() == TRUE) {
			$this->loadThis();
		} else {
			$data['c_cat'] = $this->course_model->getCourseCat();

			$this->global['pageTitle'] = 'vn24 | Add New Course';
			$this->loadViews("admin/course/addCourse", $this->global, $data, NULL);
		}
	}

	public function uploadfilesamenames($file, $tem)
	{
		$file = $file;
		$tmp = $tem;
		$test = strpos($file, '.');
		$ext = substr($file, $test);
		//$file=substr(self::uuid(), 1, 7);
		$attach = $file . $ext;
		$destN = "./uploads/course/" . $file;
		move_uploaded_file($tmp, $destN);
		return $file;
	}





	/**
	 * This function is used to add course to the system
	 */
	function addNewCourse()
	{
		if ($this->isAdmin() == TRUE) {
			$this->loadThis();
		} else {
			$this->load->library('form_validation');


			$this->form_validation->set_rules('c_cate', 'category', 'trim|required|numeric');

			if ($this->form_validation->run() == FALSE) {
				$this->addNew();
			} else {
				$c_icon_image = $this->uploadfilesamenames($_FILES["c_icon_image"]['name'], $_FILES["c_icon_image"]['tmp_name']);
				$c_image = $this->uploadfilesamenames($_FILES["c_image"]['name'], $_FILES["c_image"]['tmp_name']);
				$c_video = $this->uploadfilesamenames($_FILES["c_video"]['name'], $_FILES["c_video"]['tmp_name']);
				$c_overvideo = $this->uploadfilesamenames($_FILES["c_overvideo"]['name'], $_FILES["c_overvideo"]['tmp_name']);
				$c_desimage = $this->uploadfilesamenames($_FILES["c_desimage"]['name'], $_FILES["c_desimage"]['tmp_name']);
				$c_cert_img = $this->uploadfilesamenames($_FILES["c_cert_img"]['name'], $_FILES["c_cert_img"]['tmp_name']);



				$cInfo =
					array(

						'cat_id' => $this->input->post('c_cate'),
						'subcat_id' => $this->input->post('c_subcate'),
						'subcat2_id' => $this->input->post('c_subcate2'),
						'c_title' => $this->input->post('c_title'),
						'c_short_desc' => $this->input->post('c_short_desc'),
						'c_points' => $this->input->post('c_points'),
						'c_image' => $c_image,
						'c_video' => $c_video,
						'c_overview' => $this->input->post('c_overview'),
						'c_keyfeature' => $this->input->post('c_keyfeature'),
						'c_benifit_des' => $this->input->post('c_keyfeature'),
						'c_overvideo' => $c_overvideo,
						'c_description' => $this->input->post('c_description'),
						'c_desimage' => $c_desimage,
						'c_icon_image' => $c_icon_image,
						'c_syllabus' => $this->input->post('c_syllabus'),
						'c_faqs' => $this->input->post('c_faqs'),
						'c_cert_img' => $c_cert_img,
						'status' => 'Active',
						'isDeleted' => 0,
						'date_created' => date('Y-m-d H:i:s'),
						'date_modified' => date('Y-m-d H:i:s'),

					);
				$result = $this->course_model->addNewCourse($cInfo);

				if ($result > 0) {
					$this->session->set_flashdata('success', 'Course Inserted successfully');
				} else {
					$this->session->set_flashdata('error', 'Course Insertion failed');
				}

				redirect('admin/course/courseListing');
			}
		}
	}




	/**
	 * This function is used load user edit information
	 * @param number Course
	 */
	function editOld($cId = NULL)
	{


		if ($cId == null) {
			redirect('admin/course/courseListing');
		}
		// $this->uri->segment();
		$data['ccat'] = $this->course_model->getCourseCat();

		$data['allData'] = $this->course_model->getCourseById($cId);

		$this->global['pageTitle'] = 'vn24 | Edit Course';

		$this->loadViews("admin/course/editCourse", $this->global, $data, NULL);
	}





	/**
	 * This function is used to edit the user information
	 */
	function editCourse()
	{
		$cId = $this->input->post('cid');
		$this->load->helper('cias_helper');
		if ($this->isAdmin() == TRUE) {
			$this->loadThis();
		} else {
			$this->load->library('form_validation');



			$this->form_validation->set_rules('c_cate', 'Category', 'trim|required|numeric');


			if ($this->form_validation->run() == FALSE) {
				$this->editOld($cId);
			} else {



				// upload c_image 
				if (!empty($_FILES["c_image"]['name'])) {
					$config = array(
						'upload_path' => "./uploads/course/",
						'allowed_types' => "jpg|PNG|png|gif|jpeg",
						'overwrite' => FALSE,
						'max_size' => "9000000", // Can be set to particular file size , here it is 0.5 MB(548 Kb)
					);

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('c_image')) {
						$this->session->set_flashdata('error', $this->upload->display_errors());
					} else {
						$c_image = $_FILES["c_image"]['name'];
					}
				} else {

					$c_image = $this->db->get_where('tbl_courses', array('id' => $cId))->row_array()['c_image'];
				}




				// upload c_video 
				if (!empty($_FILES["c_video"]['name'])) {
					$config = array(
						'upload_path' => "./uploads/course/",
						'allowed_types' => "mpeg|mpg|mp4|mpe|mov|avi",
						'overwrite' => FALSE,
						'max_size' => "9000000", // Can be set to particular file size , here it is 0.5 MB(548 Kb)
					);

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('c_video')) {
						$this->session->set_flashdata('error', $this->upload->display_errors());
					} else {
						$c_video = $_FILES["c_video"]['name'];
					}
				} else {

					$c_video = $this->db->get_where('tbl_courses', array('id' => $cId))->row_array()['c_video'];
				}




				// upload c_overvideo 
				if (!empty($_FILES["c_overvideo"]['name'])) {
					$config = array(
						'upload_path' => "./uploads/course/",
						'allowed_types' =>  "mpeg|mpg|mp4|mpe|mov|avi",
						'overwrite' => FALSE,
						'max_size' => "9000000", // Can be set to particular file size , here it is 0.5 MB(548 Kb)
					);

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('c_overvideo')) {
						$this->session->set_flashdata('error', $this->upload->display_errors());
					} else {
						$c_overvideo = $_FILES["c_overvideo"]['name'];
					}
				} else {

					$c_overvideo = $this->db->get_where('tbl_courses', array('id' => $cId))->row_array()['c_overvideo'];
				}

				// upload c_desimage 
				if (!empty($_FILES["c_desimage"]['name'])) {
					$config = array(
						'upload_path' => "./uploads/course/",
						'allowed_types' => "jpg|PNG|png|gif|jpeg",
						'overwrite' => FALSE,
						'max_size' => "9000000", // Can be set to particular file size , here it is 0.5 MB(548 Kb)
					);

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('c_desimage')) {
						$this->session->set_flashdata('error', $this->upload->display_errors());
						//redirect('admin/gallery/addNew');
					} else {
						$c_desimage = $_FILES["c_desimage"]['name'];
					}
				} else {

					$c_desimage = $this->db->get_where('tbl_courses', array('id' => $cId))->row_array()['c_desimage'];
				}

				// upload c_icon_image 
				if (!empty($_FILES["c_icon_image"]['name'])) {
					$config = array(
						'upload_path' => "./uploads/course/",
						'allowed_types' => "jpg|PNG|png|gif|jpeg",
						'overwrite' => FALSE,
						'max_size' => "9000000", // Can be set to particular file size , here it is 0.5 MB(548 Kb)
					);

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('c_icon_image')) {
						$this->session->set_flashdata('error', $this->upload->display_errors());
					} else {
						$c_icon_image = $_FILES["c_icon_image"]['name'];
					}
				} else {

					$c_icon_image = $this->db->get_where('tbl_courses', array('id' => $cId))->row_array()['c_icon_image'];
				}

				// upload c_cert_img 
				if (!empty($_FILES["c_cert_img"]['name'])) {
					$config = array(
						'upload_path' => "./uploads/course/",
						'allowed_types' => "jpg|PNG|png|gif|jpeg",
						'overwrite' => FALSE,
						'max_size' => "9000000", // Can be set to particular file size , here it is 0.5 MB(548 Kb)
					);

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('c_cert_img')) {
						$this->session->set_flashdata('error', $this->upload->display_errors());
					} else {
						$c_cert_img = $_FILES["c_cert_img"]['name'];
					}
				} else {

					$c_cert_img = $this->db->get_where('tbl_courses', array('id' => $cId))->row_array()['c_cert_img'];
				}



				$courseInfo =
					array(

						'cat_id' => $this->input->post('c_cate'),
						'subcat_id' => $this->input->post('c_subcate'),
						'subcat2_id' => $this->input->post('c_subcate2'),
						'c_title' => $this->input->post('c_title'),
						'c_short_desc' => $this->input->post('c_short_desc'),
						'c_points' => $this->input->post('c_points'),
						'c_image' => $c_image,
						'c_video' => $c_video,
						'c_overview' => $this->input->post('c_overview'),
						'c_keyfeature' => $this->input->post('c_keyfeature'),
						'c_benifit_des' => $this->input->post('c_benifit_des'),
						'c_overvideo' => $c_overvideo,
						'c_description' => $this->input->post('c_description'),
						'c_desimage' => $c_desimage,
						'c_icon_image' => $c_icon_image,
						'c_syllabus' => $this->input->post('c_syllabus'),
						'c_faqs' => $this->input->post('c_faqs'),
						'c_cert_img' => $c_cert_img,
						'date_modified' => date('Y-m-d H:i:s'),

					);




				$result = $this->course_model->editCourse($courseInfo, $cId);

				if ($result == true) {
					$this->session->set_flashdata('success', 'Course updated successfully');
				} else {
					$this->session->set_flashdata('error', 'Course updation failed');
				}

				redirect('admin/course/courseListing');
			}
		}
	}


	/**
	 * This function is used to delete the user using courseId
	 * @return boolean $result : TRUE / FALSE
	 */
	function deleteCourse()
	{
		if ($this->isAdmin() == TRUE) {
			echo (json_encode(array('status' => 'access')));
		} else {
			$cId = $this->input->post('cId');
			$courseInfo = array('isDeleted' => 1, 'date_modified' => date('Y-m-d H:i:s'), 'status' => 'Inactive');

			$result = $this->course_model->deleteCourse($cId, $courseInfo);

			if ($result > 0) {
				echo (json_encode(array('status' => TRUE)));
			} else {
				echo (json_encode(array('status' => FALSE)));
			}
		}
	}

	/**
	 * Page not found : error 404
	 */
	function pageNotFound()
	{
		$this->global['pageTitle'] = 'vn24 : 404 - Page Not Found';

		$this->loadViews("admin/404", $this->global, NULL, NULL);
	}
	//category Ajax



	public function coursescat()
	{
		$id = $this->input->post('catid');
		$res = $this->course_model->coursesubcateById($id);
		echo "<option>--select--</option>";
		foreach ($res as $r) {
			echo "<option value='" . $r['id'] . "'> " . $r['subcat_name'] . "</option>";
		}
	}



	public function coursescat2()
	{
		$id = $this->input->post('catid');
		$res = $this->course_model->coursesubcate2ById($id);
		echo "<option>--select--</option>";
		foreach ($res as $r) {
			echo "<option value='" . $r['id'] . "'> " . $r['subcat2_name'] . "</option>";
		}
	}




	public function datatable_json()
	{
		$records = $this->course_model->course_data();
		$data = array();
		foreach ($records['data']  as $row) {
			$image = '<img src="' . base_url() . 'uploads/course/' . $row['c_icon_image'] . '" width="100" height="80">';
			$data[] = array(
				$username = $row['c_title'],
				$image,
				$row['status'],
				$row['date_created'],

				'<a title="Edit/View" class="update btn btn-primary" href="' . base_url() . 'admin/course/editOld/' . $row['id'] . '"> <i class="fa fa-pencil-square-o"></i></a>|<a class="btn btn-sm btn-danger deleteCourse" href="#" data-cid="' . $row['id'] . '" title="Delete"><i class="fa fa-trash"></i></a>',


			);
		}

		$records['data'] = $data;
		echo json_encode($records);
	}
}
