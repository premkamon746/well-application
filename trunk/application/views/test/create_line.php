<?php $this->load->view("header");?>
<form id="sale_item_form" class="form-horizontal" role="form" method="post">
	<input type="text" name="desc">
	<input type="text" name="quantity">
	<input type="submit" value="test" />
</form>
<script>
$(document).ready(function() {
	    $('ใform-horizontal').bootstrapValidator({
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