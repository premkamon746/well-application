<!DOCTYPE html>

<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.1.1
Version: 2.0.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Metronic | Form Stuff - Form Controls</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?=base_url()?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url()?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>


<link href="<?=base_url()?>assets/css/themes/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url()?>assets/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>


<link href="<?=base_url()?>assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url()?>assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url()?>assets/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url()?>assets/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url()?>assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"/>

	
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?=base_url()?>assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url()?>assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url()?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url()?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url()?>assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?=base_url()?>assets/css/custom.css" rel="stylesheet" type="text/css"/>


<!-- END THEME STYLES -->

<script src="<?=base_url()?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>

<link rel="shortcut icon" href="favicon.ico"/>
<script src="<?=base_url()?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>

<script src="<?=base_url()?>assets/scripts/core/app.js"></script>

<script src="<?=base_url()?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/scripts/core/app.js" type="text/javascript"></script>

<script src="<?=base_url()?>assets/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/scripts/custom/ui-extended-modals.js" type="text/javascript"></script>


<style>
	input[type=radio]{
		margin-left:0 !important;
	}
	
	.redbox{
		border:1px solid red;
	}
</style>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-fixed-top">
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div class="header-inner">
		<!-- BEGIN LOGO -->
		<a class="navbar-brand" href="index.html">
			<img src="<?=base_url()?>assets/img/well_logo.png" alt="logo" class="img-responsive"/>
		</a>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<img src="<?=base_url()?>assets/img/menu-toggler.png" alt=""/>
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<ul class="nav navbar-nav pull-right">
			<!-- BEGIN USER LOGIN DROPDOWN -->
			<li class="dropdown user">
			
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<span class="username">
						 Menu
					</span>
					<i class="fa fa-angle-down"></i>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="<?=base_url('index/logout');?>">
							<i class="fa fa-key"></i> Log Out
						</a>
					</li>
				</ul>
			</li>
			<!-- END USER LOGIN DROPDOWN -->
		</ul>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone">
					</div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<form class="sidebar-search" action="extra_search.html" method="POST">
						<div class="form-container">
							<div class="input-box">
								<a href="javascript:;" class="remove">
								</a>
								<input type="text" placeholder="Search..."/>
								<input type="button" class="submit" value=" "/>
							</div>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li class="open ">
					<a href="javascript:;">
						
						<span class="title">
							<a href="<?=base_url()?>" >
								<i class="fa fa-shopping-cart"></i>
								DashBoard
							</a>
						</span>
						<span class="open">
						</span>
					</a>
				</li>
					
				<? if(isset($this->role_id) && ($this->role_id == 2 || $this->role_id == 1 ) ) {?>
				<li class="open ">
					<a href="javascript:;">
						<i class="fa fa-shopping-cart"></i>
						<span class="title">
							Quotation
						</span>
						<span class="arrow open">
						</span>
					</a>
					<ul class="sub-menu always-open" style="display:block !important;">
						<? if(isset($this->dept_id) && ($this->dept_id == 4 || $this->role_id == 1 ) ) {?>
						<li>
							<a href="<?=base_url('quotation/create')?>">
								<i class="fa fa-bullhorn"></i>
								สร้างใบเสนอราคา
							</a>
						</li>
						<? }?>
						<li>
							<a href="<?=base_url('quotation/search')?>">
								<i class="fa fa-bullhorn"></i>
								ค้นหาใบเสนอราคา
							</a>
						</li>
					</ul>
				</li>
				
				<? } //endif role_id?>
				
				<? if(isset($this->role_id) && ($this->role_id == 3 || $this->role_id == 1) ) {?>
				<li class="open ">
					<a href="javascript:;">
						<i class="fa fa-shopping-cart"></i>
						<span class="title">
							Customer
						</span>
						<span class="arrow open">
						</span>
					</a>
					<ul class="sub-menu always-open" style="display:block !important;">
						<li>
							<a href="<?=base_url('customer/search')?>">
								<i class="fa fa-bullhorn"></i>
								ค้นหาข้อมูลลูกค้า
							</a>
						</li>
						<li>
							<a href="<?=base_url('customer/create')?>">
								<i class="fa fa-bullhorn"></i>
								สร้างข้อมูลลูกค้า
							</a>
						</li>
					</ul>
				</li>
				
				
				<li class="open ">
					<a href="javascript:;">
						<i class="fa fa-shopping-cart"></i>
						<span class="title">
							Job
						</span>
						<span class="arrow open">
						</span>
					</a>
					<ul class="sub-menu always-open" style="display:block !important;">
						<li>
							<a href="<?=base_url('job/create')?>">
								<i class="fa fa-bullhorn"></i>
								สร้างใบงาน
							</a>
						</li>
						<li>
							<a href="<?=base_url('job/search')?>">
								<i class="fa fa-bullhorn"></i>
								ค้นหาใบงาน
							</a>
						</li>
					</ul>
				</li>
				
				<? } //endif role_id?>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">