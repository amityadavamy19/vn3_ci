<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b><a target="_blank" href="https://www.insydin.com/">Insydin Technologies</a></b> Admin System | Version 1.5
  </div>
  <strong>Copyright &copy; 2020 <a href="<?php echo base_url(); ?>">Vn24</a>.</strong> All rights reserved.
</footer>
<?php if($this->uri->segment(3) != 'addVendor'): ?>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<?php endif;?>
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js" type="text/javascript"></script>
<!-- <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js" type="text/javascript"></script> -->
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/validation.js" type="text/javascript"></script>
<script type="text/javascript">
  var windowURL = window.location.href;
  pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
  var x = $('a[href="' + pageURL + '"]');
  x.addClass('active');
  x.parent().addClass('active');
  var y = $('a[href="' + windowURL + '"]');
  y.addClass('active');
  y.parent().addClass('active');
</script>
</body>

</html>