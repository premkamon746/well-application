<?php $this->load->view("header");?>

            <div class="row">
            	<?php  if ($this->dept_id == 8 || $this->dept_id == 12 || $this->dept_id == 4) {
            	//QC, Mechanic , Marketing
            		?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat red">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                 4
                            </div>
                            <div class="desc">
                                 New
                            </div>
                        </div>
                        <a class="more" href="<?=base_url()?>index/job/NEW">
                             View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <? }?>
                <?php  if ($this->dept_id == 12||$this->dept_id == 4) {
                //Mechanic,Marketing
                	?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat blue">
                        <div class="visual">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                 9
                            </div>
                            <div class="desc">
                                 Check
                            </div>
                        </div>
                        <a class="more" href="<?=base_url()?>index/job/CHECK">
                             View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <? }?>
                 <?php  if ($this->dept_id == 4 ||$this->dept_id == 10) {
                 
                 	//Marketing, Planning?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat purple">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
								 3
							</div>
							<div class="desc">
								 Wait Confirm
							</div>
						</div>
                        <a class="more" href="<?=base_url()?>index/job/WAIT CONFIRM">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<?php }?>
            </div>
            <div class="row">
             <?php  if ($this->dept_id == 4 ||$this->dept_id == 10) {
             //Marketing, Planning
             	?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat purple">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
								 5
							</div>
							<div class="desc">
								 Confirm
							</div>
						</div>
                        <a class="more" href="<?=base_url()?>index/job/CONFIRM">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<?php }?>
				<?php  if ($this->dept_id == 8 || $this->dept_id == 4 ||$this->dept_id == 11) {
					///Marketing, QC, production
					?>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat yellow">
						<div class="visual">
							<i class="fa fa-bar-chart-o"></i>
						</div>
						<div class="details">
							<div class="number">
								 12
							</div>
							<div class="desc">
								 Processing
							</div>
						</div>
                        <a class="more" href="<?=base_url()?>index/job/PROCESSING">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<?php }?>
				
				<?php  if ($this->dept_id == 8 || $this->dept_id == 4 ||$this->dept_id == 11) {
				/////Marketing, QC, production
					?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green">
						<div class="visual">
							<i class="fa fa-bar-chart-o"></i>
						</div>
						<div class="details">
							<div class="number">
								 15
							</div>
							<div class="desc">
								 Closed
							</div>
						</div>
                        <a class="more" href="<?=base_url()?>index/job/CLOSE">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<?php }?>
            </div>
<?php $this->load->view("footer");?>