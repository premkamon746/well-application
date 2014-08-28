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





<script type="text/javascript">
$(document).ready(function(){
	$(".modalc").click(function(){
		$("#myModal").modal('show');
	});
	App.init();
	$('.date-picker').datepicker({
		rtl: App.isRTL(),
		autoclose: true
	});
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>