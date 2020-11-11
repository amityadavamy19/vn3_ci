<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $pageTitle; ?></title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.4 -->
  <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- FontAwesome 4.3.0 -->
  <link href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Ionicons 2.0.0 -->
  <link href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
  <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
  <style>
    .error {
      color: red;
      font-weight: normal;
    }
  </style>
  <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript">
    var baseURL = "<?php echo base_url(); ?>";
  </script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo base_url(); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Vn24</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Vn24</b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown tasks-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <i class="fa fa-history"></i>
              </a>
              <ul class="dropdown-menu">
                <li class="header"> Last Login : <i class="fa fa-clock-o"></i> <?= empty($last_login) ? "First Time Login" : $last_login; ?></li>
              </ul>
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="user-image" alt="User Image" />
                <span class="hidden-xs"><?php echo $name; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">

                  <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image" />
                  <p>
                    <?php echo $name; ?>
                    <small><?php echo $role_text; ?></small>
                  </p>

                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo base_url('admin/'); ?>profile" class="btn btn-warning btn-flat"><i class="fa fa-user-circle"></i> Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo base_url('admin/'); ?>logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <?php if($this->session->userdata('role')== '1') :?>
          <li>
            <a href="<?php echo base_url(); ?>admin/dashboard">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('admin/contact/editContactus'); ?>">
              <i class="fa fa-address-book-o"></i>
              <span>Contact</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('admin/orders/'); ?>">
              <i class="fa fa-shopping-cart"></i>
              <span>Orders (Transfer Order)</span>
            </a>
          </li>
          
         <li>
            <a href="<?php echo base_url('admin/awb/track'); ?>">
              <i class="fa fa-file"></i>
              <span>Track Awb</span>
            </a>
          </li>
          
           <li>
            <a href="<?php echo base_url('admin/otype/view'); ?>">
              <i class="fa fa-file"></i>
              <span>Order Type</span>
            </a>
          </li>
          
          <li>
            <a href="<?php echo base_url('admin/vendors'); ?>">
              <i class="fa fa-file"></i>
              <span>Vendor</span>
            </a>
          </li>
             <li>
            <a href="<?php echo base_url('admin/userListing'); ?>">
              <i class="fa fa-users"></i>
              <span>Account Management</span>
            </a>
          </li>
          
          <li>
            <a href="<?php echo base_url('admin/userslist/view'); ?>">
              <i class="fa fa-users"></i>
              <span>User Management</span>
            </a>
          </li>
          <li>
          <a href="<?php echo base_url('admin/sales'); ?>">
              <i class="fa fa-credit-card"></i>
              <span>Subscription Package</span>
            </a>
          </li>
          <li>
          <a href="<?php echo base_url('admin/sales/salesCode'); ?>">
              <i class="fa fa-bullhorn"></i>
              <span>Sales Code Management</span>
            </a>
          </li>
          <li>
          <a href="<?php echo base_url('admin/pincode/view'); ?>">
              <i class="fa fa-motorcycle"></i>
              <span>Serviceable Pincodes</span>
            </a>
          </li>
          
           <li>
          <a href="<?php echo base_url('admin/courier/view'); ?>">
              <i class="fa fa-truck"></i>
              <span>Courier Management</span>
            </a>
          </li>
           <li>
          <a href="<?php echo base_url('admin/cargo/view'); ?>">
              <i class="fa fa-truck"></i>
              <span>Cargo Management</span>
            </a>
          </li>
          <li>
          <a href="<?php echo base_url('admin/api/view'); ?>">
              <i class="fa fa-key"></i>
              <span>Api Management</span>
            </a>
          </li>
<?php elseif($this->session->userdata('role')== 5):  ?>
           <li>
          <a href="<?php echo base_url('admin/sales/salesCode'); ?>">
              <i class="fa fa-bullhorn"></i>
              <span>Sales Code Management</span>
            </a>
          </li>
           <li>
          <a href="<?php echo base_url('admin/sales/clients'); ?>">
              <i class="fa fa-bullhorn"></i>
              <span>Clients</span>
            </a>
          </li>
          
 <?php elseif($this->session->userdata('role')== 6):  ?>
           <li>
          <a href="<?php echo base_url('admin/account/sale'); ?>">
              <i class="fa fa-user"></i>
              <span>Sales Account</span>
            </a>
          </li>
           
           <li>
          <a href="<?php echo base_url('admin/account/venPayment'); ?>">
              <i class="fa fa-user"></i>
              <span>Vendor Payments</span>
            </a>
          </li>

                   
          
          
          <?php endif; ?>
         
        </ul>

      </section>
      <!-- /.sidebar -->
    </aside>