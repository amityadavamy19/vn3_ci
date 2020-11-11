<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Conatct (UserController)
 * Conatct Class to control all Conatct related operations.
 * @author :Amit Yadav
 * @version : 1.1
 * @since : 15 November 2019-20
 */
class Partners extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Partners_model');

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
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;

            $this->load->library('pagination');

            $count = $this->Partners_model->reportListingCount($searchText);

            $returns = $this->paginationCompress("admin/userListing/", $count, 10);

            $data['reportRecords'] = $this->Partners_model->reportListing($searchText, $returns["page"], $returns["segment"]);

            $this->global['pageTitle'] = 'Techroutes | Reports';
            //$data['reportRecords'] = $this->reports_model->getReports();
            $this->loadViews("admin/partners/partners", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the Gallery list
     */
    function partnersListing()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;

            $this->load->library('pagination');

            $count = $this->Partners_model->reportListingCount($searchText);

            $returns = $this->paginationCompress("admin/reportListing/", $count, 10);

            $data['reportRecords'] = $this->Partners_model->reportListing($searchText, $returns["page"], $returns["segment"]);

            $this->global['pageTitle'] = 'Techroutes  : Report Listing';

            $this->loadViews("admin/reports/listReports", $this->global, $data, NULL);
        }
    }

    public function datatable_json()
    {
        $records = $this->Partners_model->reports_data();
        $data = array();
        foreach ($records['data']  as $row) {

            $data[] = array(
                $row['cmp_name'],
                $row['country'],
                $row['email'],
                $row['phn'],
                $row['skype'],
                $row['cmp_address'],
                $row['messg'],
                $row['date'],
            );
        }
        /*<a title="Delete" class="delete btn btn-danger" data-href="'.base_url('admin/delete_celebs/'.$row['id']).'" data-toggle="modal" data-target="#deletemodal"> <i class="fa fa-trash-o"></i></a> */
        $records['data'] = $data;
        echo json_encode($records);
    }
}
