<div class="container-fluid top">
	<div class="row">
		<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url('dashboard'); ?>">
				<img src="<?php echo base_url('uploads/logo/'); ?><?=$contact['logo']?>">
			</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
			<ul class="nav navbar-nav navbar-right">
              <!--<li>
                 <a href="#" class="icon-info">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                         <span class="label label-primary">3</span>
                      </a>
                 </li>-->
				<li class="dropdown ">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						<?php if($this->session->userdata('vrole') == 4) {echo $this->session->userdata('name'); }?>
						<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li class="dropdown-header"><a href="<?php echo base_url('vendor/dashboard');  ?>"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a></li>
							<li class=""><a href="<?php echo base_url('vendor/account');  ?>"><i class="fa fa-money" aria-hidden="true"></i>Bank Account</a></li>
							<li class=""><a href="<?php echo base_url('vendor/earning');  ?>"><i class="fa fa-handshake-o" aria-hidden="true"></i>My Earnings</a></li>
							<li class=""><a href="<?php echo base_url('vendor/riders');  ?>"><i class="fa fa-motorcycle" aria-hidden="true"></i>Riders</a></li>
                            <li class=""><a href="<?php echo base_url('vendor/clients');  ?>"><i class="fa fa-users" aria-hidden="true"></i>Clients</a></li>
                            <li class=""><a href="<?php echo base_url('vendor/invoices');  ?>"><i class="fa fa-file-o" aria-hidden="true"></i>Invoices</a></li>
                            <li class=""><a href="<?php echo base_url('vendor/profile');  ?>"><i class="fa fa-user" aria-hidden="true"></i>Update profile</a></li>
							<li class=""><a href="<?php echo base_url('vendor/pincodes');  ?>"><i class="fa fa-truck" aria-hidden="true"></i>Serviceable Pincodes</a></li>
							
							<!--<li class=""><a href="<?php echo base_url('vendor/couriers');  ?>"><i class="fa fa-truck" aria-hidden="true"></i>Courier Assignment</a></li>-->
                            <li class=""><a href="<?php echo base_url('vendor/terms');  ?>"><i class="fa fa-check-circle" aria-hidden="true"></i>Term</a></li>
                            <li class=""><a href="<?php echo base_url('vendor/about');  ?>"><i class="fa fa-blind" aria-hidden="true"></i>About us</a></li>
							<li><a href="<?php echo base_url('vendor/auth/logout');  ?>"> <i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>  
	</div>    
</div>


