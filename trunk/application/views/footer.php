</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer">
	<div class="footer-inner">
		 2014 &copy; Metronic by keenthemes.
	</div>
	<div class="footer-tools">
		<span class="go-top">
			<i class="fa fa-angle-up"></i>
		</span>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?=base_url()?>assets/plugins/respond.min.js"></script>
<script src="<?=base_url()?>assets/plugins/excanvas.min.js"></script> 
<![endif]-->

<script src="<?=base_url()?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="<?=base_url()?>assets/scripts/core/app.js"></script>

<script src="<?=base_url()?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/scripts/core/app.js" type="text/javascript"></script>

<script>
	jQuery(document).ready(function() {    
		App.init();
		$('.date-picker').datepicker({
			rtl: App.isRTL(),
			autoclose: true
		});
	});

	function createJobLine(){
		window.location = "job_create_line.html";
	}
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>