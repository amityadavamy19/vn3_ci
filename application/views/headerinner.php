<head>

    <link href="<?php echo base_url() ?>assets/frontend/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/style.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/style-2.css" />
    <script src="<?php echo base_url() ?>assets/frontend/js/jquery.min.js"></script>
    <link href="<?php echo base_url() ?>assets/frontend/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/owl.carousel.min.css">
    <script src="<?php echo base_url() ?>assets/frontend/js/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/owl.theme.default.min.css">
    <script src="<?php echo base_url() ?>assets/frontend/js/owl.carousel.js"></script>
    <script src="<?php echo base_url() ?>assets/frontend/js/bootstrap.min.js"></script>
    <style>
        .dropbtn {

            font-weight: 600;
            font-size: 16px;
            text-transform: uppercase;
            background: none;
            border: none;
            padding-top: 8px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: none;
        }

        #menu-main>li>a:after {
            display: block;
            height: 3px;
            background: #da251d;
            position: absolute;
            left: 10%;
            bottom: 35%;
            transition: all .4s;
            opacity: 0;
            transform: scale(0, 1);
        }

        #menu-main ul.sub-menu a:after,
        #menu-main>li>a:after {
            content: "";
            width: 80%;
            border-radius: 2rem;
        }
    </style>
</head>

<body>
    <div class="container-fluid search">
        <div class="row">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-body">
                            <input type="text" class="form-control" placeholder="Search keywords,like Konjac Gum, Xanthan Gum,MSG,Carrageenan..." aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid top">
        <div class="row">
            <div class="col-lg-12">
                <ul>
                    <li><a href="#"> <i class="fa fa-envelope"></i> <?= $contact['email'] ?></a></li>
                    <li><a href="#"> <i class="fa fa-phone"></i> <?= $contact['phone'] ?> </a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid navigation">
        <div class="row">
            <div class="navbar navbar-inverse">
                <div class="navbar-header">
                    <div class="navbar-brand"><a href="<?php echo base_url('home'); ?>"><img src="<?php echo base_url() ?>uploads/logo/<?= $contact['logo'] ?>" width="50px" /></a></div>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo base_url('home'); ?>">Home</a></li>
                        <li><a href="<?php echo base_url('about'); ?>">About Us </a></li>
                        <li>
                            <div class="dropdown">
                                <button class="dropbtn">Product</button>
                                <div class="dropdown-content">
                                    <a href="<?php echo base_url('pro_cat/food'); ?>">FOOD</a>
                                    <a href="<?php echo base_url('pro_cat/feed'); ?>">FEED</a>

                                </div>

                            </div>
                        </li>
                        <li><a href="<?php echo base_url('contact'); ?>">Contact Us</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-search"></i> </a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>