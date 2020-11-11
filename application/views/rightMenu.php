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
						<?php echo $this->session->userdata('name');?>
						<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li class="dropdown-header"><a href="<?php echo base_url('/dashboard');  ?>"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a></li>
							<li class=""><a href="<?php echo base_url('/profile');  ?>"> <i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
							<li class=""><a href="<?php echo base_url('/newOrder');  ?>"> <i class="fa fa-bar-chart" aria-hidden="true"></i> Order Now</a></li>
							<li class=""><a href="<?php echo base_url('/orders');  ?>"> <i class="fa fa-list"></i> List Of Order </a></li>
							<li class=""><a href="<?php echo base_url('/track');  ?>"><i class="fa fa-map-marker"></i>  Track</a></li>
							<li><a href="<?php echo base_url('login/logout');  ?>"> <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>  
	</div>    
</div>


