<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title; ?></title>


<!-- Header-->

<body>
   <?php 
        include('header.php');
        $this->load->view($layout);
        include('footer.php');
     ?>
    <!--main content start-->


</body>

</html>