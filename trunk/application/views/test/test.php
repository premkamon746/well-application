<?php $this->load->view("header");?>
<form id="sale_item_form" class="form-horizontal" role="form" method="post">
	<div class="form-group"><label class="col-lg-3 control-label">Username</label>
		<div class="col-lg-5"><input type="text" name="desc"></div>
	</div>
	
	<div class="form-group"><label class="col-lg-3 control-label">Username</label>
		<div class="col-lg-5"><input type="text" name="quantity"></div>
	</div>
<input type="submit" value="test" />
</form>
<script>
$(document).ready(function() {
	    $('#sale_item_form').bootstrapValidator({
	        message: 'This value is not valid',
	        feedbackIcons: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        },
	        fields: {
	        	desc: {
	                message: 'กรอกรายละเอียด',
	                validators: {
	                    notEmpty: {
	                        message: 'กรอกรายละเอียด'
	                    },
	                }
	            },
	            quantity: {
	                validators: {
	                    notEmpty: {
	                        message: 'จำนวน'
	                    },
	                }
	            }
	        }
	    });
	});
</script>
<?php $this->load->view("footer");?>