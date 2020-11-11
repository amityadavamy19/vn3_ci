<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class : Contact (HomeController)
 * Contact Class to control Contact Page.
 * @author : Amit Yadav
 * @version : 1.5
 * @since : 15 November 2019-20
 */
class Contact extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/contact_model');
        $this->load->library('email');
    }

    /**
     * This function used to load the first screen
     */
    public function index()
    {
        $this->load->helper('form');

        $data['contact'] = $this->contact_model->getAllContact();
        ///		$data['product'] =  $this->contact_model->getproduct();
        $data['title'] = 'Contact Us';
        $data['layout'] = 'contact';
        $this->load->view('layout', $data);
    }


    public function message()
    {




        $forminput = array(

            "company" => $this->input->post('company'),
            "fname" =>  $this->input->post('fname'),
            "email" =>  $this->input->post('email'),
            "mobile" =>  $this->input->post('phone'),
            "message" => $this->input->post('message'),
            "status" => 'Active',
            "date" => date('Y-m-d H:i:s'),

        );

        $forminput1 = $this->security->xss_clean($forminput);
        $this->contact_model->messagedata($forminput1);
        echo "Success";
    }



  /*  public function request()
    {






        $Customer = $this->input->post('Customer');
        $Contact =  $this->input->post('Contact');
        $tel =  $this->input->post('tel');
        $ModNo =  $this->input->post('ModNo');
        $sn = $this->input->post('sn');
        $Shipping = $this->input->post('Shipping');
        $Invoice = $this->input->post('Invoice');
        $email = $this->input->post('email');
        $Filled = $this->input->post('Filled');
        $Quantity = $this->input->post('Quantity');
        $Agreement = $this->input->post('Agreement');
        $Title = $this->input->post('Title');
        $tele = $this->input->post('tele');
        $RMA = $this->input->post('RMA');
        $SM = $this->input->post('SM');
        $RR = $this->input->post('RR');
        $Cust = $this->input->post('Cust');
        $Opened = $this->input->post('Opened');
        $Shipped = $this->input->post('Shipped');
        $Charge = $this->input->post('Charge');
        $AWB = $this->input->post('AWB');
        $Product = $this->input->post('Product');
        $Ticket = $this->input->post('Ticket');
        $Physical = $this->input->post('Physical');
        $Power = $this->input->post('Power');
        $Console = $this->input->post('Console');
        $Serial = $this->input->post('Serial');
        $Ethernet = $this->input->post('Ethernet');
        $Operating = $this->input->post('Operating');
        $Problems = $this->input->post('Problems');



        $htmlContent =   '<div class="modal-body">
        <div class="container-fluid form" style= border-radius: 0px;
        background-color: #FFFFFF;
        border-radius: 0px;
        background-color: #FFFFFF;
        border: 1px solid #999;
        padding: 6px 11px;
        margin-bottom: 0px;
        font-size: 21px;
        margin-top: 0px;
        text-align: justify;
        border: 1px solid#999;
        font-size: 13px;
        margin-left: -31px;
        padding: 9px; >
          <div class="row">
            <div class="col-lg-12" style="padding: 10px 33px;
            border: none;
            border-radius: inherit;
            padding: 10px 29px;
            border: none;
            border-radius: inherit;
            color: #fff;
            background-color: #000;
            border-radius: 0px;
            background-color: #FFFFFF;">

              <div class="col-lg-8">
                <h2 style= border: 1px solid #999;
                padding: 6px 11px;
                margin-bottom: 0px;
                font-size: 21px;
                margin-top: 0px;><u>ADDMISTRATION:</u></h2>
                <h2 style=" border: 1px solid #999;
                padding: 6px 11px;
                margin-bottom: 0px;
                font-size: 21px;
                margin-top: 0px;">custumer informatiom</h2>


                <div class="input-group">
                  <span class="input-group-addon" style=   border-radius: 0px;
                  background-color: #FFFFFF;>Customer:</span>
                  <input id="customer" type="text" class="form-control" value= "' . $Customer . '"  style="border-radius: inherit;">
                </div>

                <div class="input-group">
                  <span class="input-group-addon" style=   border-radius: 0px;
                  background-color: #FFFFFF;>Contact Person:</span>
                  <input id="Contact Person" type="tel" class="form-control"  value= "' . $Contact . '" style="border-radius: inherit;">
                </div>

                <div class="input-group">
                  <span class="input-group-addon" style=   border-radius: 0px;
                  background-color: #FFFFFF;>Tel.:</span>
                  <input id="Tel." type="text" class="form-control" value= "' . $tel . '" style="border-radius: inherit;">
                </div>

                <div class="input-group">
                  <span class="input-group-addon" style=   border-radius: 0px;
                  background-color: #FFFFFF;>ModNo:</span>
                  <input id="ModNo" type="text" class="form-control" value= "' . $ModNo . '"  style="border-radius: inherit;">
                </div>
                <div class="input-group">
                  <span class="input-group-addon" style=   border-radius: 0px;
                  background-color: #FFFFFF;>S/N:</span>
                  <input id="S/N" type="text" class="form-control" value= "' . $sn . '"  style="border-radius: inherit;">
                </div>

                <div class="input-group">
                  <span class="input-group-addon" style=   border-radius: 0px;
                  background-color: #FFFFFF;>Shipping Address:</span>
                  <input id="Shipping Address" type="text" class="form-control" value= "' . $Shipping . '" style="border-radius: inherit;">
                </div>

                <div class="input-group">
                  <span class="input-group-addon" style=   border-radius: 0px;
                  background-color: #FFFFFF;>Invoice #</span>
                  <input id="Invoice" type="text" class="form-control" value= "' . $Invoice . '" style="border-radius: inherit;">
                </div>

                <div class="input-group">
                  <span class="input-group-addon" style=   border-radius: 0px;
                  background-color: #FFFFFF;>E-Mail:</span>
                  <input id="E-Mail" type="email" class="form-control" value= "' . $email . '" style="border-radius: inherit;">
                </div>
                <div class="input-group">
                  <span class="input-group-addon" style=   border-radius: 0px;
                  background-color: #FFFFFF;>Filled by:</span>
                  <input id="Filled by" type="text" class="form-control" value= "' . $Filled . '" style="border-radius: inherit;">
                </div>
                <div class="input-group">
                  <span class="input-group-addon" style=   border-radius: 0px;
                  background-color: #FFFFFF;>Quantity:</span>
                  <input id="Quantity" type="text" class="form-control" value= "' . $Quantity . '" style="border-radius: inherit;">
                </div>
                <div class="input-group">
                  <span class="input-group-addon" style=   border-radius: 0px;
                  background-color: #FFFFFF;>Agreement #</span>
                  <input id="Agreement " type="text" class="form-control" value= "' . $Agreement . '" style="border-radius: inherit;">
                </div>
                <div class="input-group">
                  <span class="input-group-addon" style=   border-radius: 0px;
                  background-color: #FFFFFF;>Title:</span>
                  <input id="Title" type="text" class="form-control" value= "' . $Title . '"  style="border-radius: inherit;">
                </div>
                <div class="input-group">
                  <span class="input-group-addon" style=   border-radius: 0px;
                  background-color: #FFFFFF;>Tel.</span>
                  <input id="Titl" type="tel" class="form-control" value= "' . $tele . '" style="border-radius: inherit;">
                </div>

              </div>
              <div class="col-lg-4" style=text-align: justify;
              border: 1px solid#999;
              font-size: 13px;
              margin-left: -31px;
              padding: 9px;>


                <table class="table table-bordered" style= margin-left: -31px;>
                  <thead>
                    <tr>
                      <td colspan="4">This area to be filled by Techroutes</td>
                    </tr>
                    <tr>
                      <td scope="col">RMA #:</td>
                      <td colspan="3"> <input id="RMA " type="text" class="form-control" value= "' . $RMA . '" style="border: none;box-shadow: none;"> </td>
                    </tr>
                    <tr>
                      <th scope="col">Priority:</th>
                      <th scope="col">3wd</th>
                      <th scope="col">7wd</th>
                      <th scope="col">14wd</th>
                    </tr>
                    <tr>
                      <td scope="col">Acc. Mngr./SM:</td>
                      <td colspan="3"> <input id="Acc. Mngr." type="text" class="form-control" value= "' . $SM . '" style="border: none;box-shadow: none;"> </td>
                    </tr>
                    <tr>
                      <td scope="col">RR. No.:</td>
                      <td colspan="3"> <input id="RR. No." type="text" class="form-control"  value= "' . $RR . '"  style="border: none;box-shadow: none;"> </td>
                    </tr>
                    <tr>
                      <td scope="col">Cust. P.O.:</td>
                      <td colspan="3"> <input id="Cust. P.O." type="text" class="form-control"  value= "' . $Cust . '" style="border: none;box-shadow: none;"> </td>
                    </tr>
                    <tr>
                      <td scope="col">Date RMA Opened:</td>
                      <td colspan="3"> <input id="Date RMA Opened" type="date" class="form-control"  value= "' . $Opened . '" style="border: none;box-shadow: none;"> </td>
                    </tr>
                    <tr>
                      <td scope="col">Date RMA Shipped:</td>
                      <td colspan="3"> <input id="Date RMA Shipped" type="date" class="form-control"  value= "' . $Shipped . '" style="border: none;box-shadow: none;"> </td>
                    </tr>
                    <tr>
                      <td scope="col">Eng, in Charge:</td>
                      <td colspan="3"> <input id="Eng, in Charge" type="text" class="form-control"  value= "' . $Charge . '" style="border: none;box-shadow: none;"></td>
                    </tr>
                    <tr>
                      <td scope="col">AWB #:</td>
                      <td colspan="3"> <input id="AWB #" type="text" class="form-control" value= "' . $AWB . '" style="border: none;box-shadow: none;"> </td>
                    </tr>
                    <tr>
                      <td scope="col">Product Cat. #:</td>
                      <td colspan="3"> <input id="Product Cat. #" type="text" class="form-control"  value= "' . $Product . '" style="border: none;box-shadow: none;"></td>
                    </tr>
                  </thead>
                </table>

              </div>
            </div>
            <div class="col-lg-12">
              <h4><b>If a problem is reported to Techroutes Support Centre about this product </b></h4>
              <div class="input-group">
                <span class="input-group-addon" style=   border-radius: 0px;
                background-color: #FFFFFF;>Trouble Ticket Number </span>
                <input id="TTN" type="text" class="form-control"  value= "' . $Ticket . '" style="border-radius: inherit;" required>
              </div>
              <h5>Please describe the failure and mark the applicable mode box/boxes. Wherever applicable, please detail test/use conditions, environmental conditions, etc.</h5>
              <div class="input-group">
                <span class="input-group-addon" style=   border-radius: 0px;
                background-color: #FFFFFF;>Physical Damage </span>
                <input id="Physical Damage " type="text" class="form-control"  value= "' . $Physical . '" style="border-radius: inherit;" required>
              </div>

              <div class="input-group">
                <span class="input-group-addon" style=   border-radius: 0px;
                background-color: #FFFFFF;>Power Status</span>
                <input id="Power Status" type="text" class="form-control"  value= "' . $Power . '" style="border-radius: inherit;" required>
              </div>

              <div class="input-group">
                <span class="input-group-addon" style=   border-radius: 0px;
                background-color: #FFFFFF;>Console </span>
                <input id="Console " type="text" class="form-control"  value= "' . $Console . '" style="border-radius: inherit;" required>
              </div>

              <div class="input-group">
                <span class="input-group-addon" style=   border-radius: 0px;
                background-color: #FFFFFF;>Serial port (if any)</span>
                <input id="Serial port" type="text" class="form-control"  value= "' . $Serial . '" style="border-radius: inherit;" required>
              </div>
              <div class="input-group">
                <span class="input-group-addon" style=   border-radius: 0px;
                background-color: #FFFFFF;>Ethernet Port (if any)</span>
                <input id="Ethernet Port" type="text" class="form-control" value= "' . $Ethernet . '" style="border-radius: inherit;" required>
              </div>
              <div class="input-group">
                <span class="input-group-addon" style=   border-radius: 0px;
                background-color: #FFFFFF;>Operating System (F/w)</span>
                <input id="Operating System" type="text" class="form-control"  value= "' . $Operating . '" style="border-radius: inherit;" required>
              </div>
              <div class="input-group">
                <span class="input-group-addon" style=   border-radius: 0px;
                background-color: #FFFFFF;>Other Problems if any </span>
                <input id="Other Problems if any " type="text" class="form-control"  value= "' . $Problems . '" style="border-radius: inherit;" required>
              </div>
              <p>Please note:</p>
              <ol>
                <li> Only RMAs authorized in writing by Techroutes Technical Support/FAE shall be accepted and addressed.</li>
                <li> One copy of the RMA report should be inserted into the Shipping doccument envelope, and one should be inserted into the packing box.</li>
                <li> Ship back the RMA item together with all associated sub-systems.</li>

              </ol>
           
            </div>
    </form>
  </div>
</div>
</div>';

        echo $htmlContent;
        exit;
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->from('admin@birjuflower.com', 'Birjuflower Store Admin');
        $this->email->to('amityadavamy19@gmail.com');


        $this->email->subject('Contact Query');
        $this->email->message($htmlContent);
        $this->email->send();

        echo "Success";
    }*/
    
    public function request()
    {
        
        
            $company = $this->input->post('company');
            $fname =  $this->input->post('fname');
            $address =  $this->input->post('address');
            $mobile =  $this->input->post('phone');
             $website =  $this->input->post('website');
              $country =  $this->input->post('country');
            $message = $this->input->post('message');

$htmlContent = '<h3>country: ' . $company . ' </h3>';
$htmlContent .= '<h3>Name: ' . $fname . ' </h3>';
$htmlContent .= '<h3>Address: ' . $address . ' </h3>';
$htmlContent .= '<h3>mobile: ' . $mobile . ' </h3>';
$htmlContent .= '<h3>website: ' . $website . ' </h3>';
$htmlContent .= '<h3>country: ' . $country . ' </h3>';
$htmlContent .= '<h3>message: ' . $message . ' </h3>';

$config['mailtype'] = 'html';
$this->email->initialize($config);
$this->email->from('sales@techroutes.com', 'ASK ME');
$this->email->to('sales@techroutes.com');
$this->email->subject('Contact Query');
$this->email->message($htmlContent);
$this->email->send();
 echo "Success";
}}
