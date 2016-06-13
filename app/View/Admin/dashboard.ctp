<?php echo $this->element('admin-navbar');?>
<div id="page-wrapper">

		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						Dashboard <small>Statistics Overview</small>
					</h1>
					<ol class="breadcrumb">
						<li class="active">
							<i class="fa fa-dashboard"></i> Dashboard
						</li>
					</ol>
				</div>
			</div>
			<!-- /.row -->

			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-red">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-users fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge"><?php echo $totalUser;?></div>
									<div>Total Registered Users</div>
								</div>
							</div>
						</div>
						<a target="_blank" href="<?php echo HTTP_PATH;?>admin/users.html?user=users">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-user fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge"><?php echo $totalActiveUser;?></div>
									<div>Total Active Users</div>
								</div>
							</div>
						</div>
						<a target="_blank" href="<?php echo HTTP_PATH;?>admin/users.html?user=active_users">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-green">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3 text-left">
									<i class="fa fa-male fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge"><?php echo $totalActiveMUser;?></div>
									<div>Total Active Male Users</div>
								</div>
							</div>
						</div>
						<a target="_blank" href="<?php echo HTTP_PATH;?>admin/users.html?user=male_users">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-yellow">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-female fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge"><?php echo $totalActiveFUser;?></div>
									<div>Total Active Female Users</div>
								</div>
							</div>
						</div>
						<a target="_blank" href="<?php echo HTTP_PATH;?>admin/users.html?user=female_users">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
                
                <div class="col-lg-3 col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3 text-left">
									<i class="fa fa-rupee fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge"><?php echo $totalPaidUser;?></div>
									<div>Total Paid Users</div>
								</div>
							</div>
						</div>
						<a target="_blank" href="<?php echo HTTP_PATH;?>admin/users.html?user=paid_users">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-red">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-bullhorn fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge"><?php echo $less30VUser;?></div>
									<div>Users With Less than 30 Days validity</div>
								</div>
							</div>
						</div>
						<a target="_blank" href="<?php echo HTTP_PATH;?>admin/users.html?user=less30_users">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<!-- /.row -->

			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-green">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-cc-mastercard fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge"><?php echo $onlineUser;?></div>
									<div>User Registered Online</div>
								</div>
							</div>
						</div>
						<a target="_blank" href="<?php echo HTTP_PATH;?>admin/users.html?user=online_users">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-yellow">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-hand-o-up fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge"><?php echo $manualUser;?></div>
									<div>Manually Registered User</div>
								</div>
							</div>
						</div>
						<a target="_blank" href="<?php echo HTTP_PATH;?>admin/users.html?user=admins_users">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3 text-left">
									<i class="fa fa-rupee fa-5x">/M</i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge"><?php echo ($revenueMonthly[0]->monthly ? $revenueMonthly[0]->monthly : 0);?></div>
									<div>Total Revenue This Month</div>
								</div>
							</div>
						</div>
						<a target="_blank" href="<?php echo HTTP_PATH;?>admin/revenue.html">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-red">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-rupee fa-5x">/Y</i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge"><?php echo ($revenueYearly[0]->yearly ? $revenueYearly[0]->yearly : 0);?></div>
									<div>Total Revenue This Year</div>
								</div>
							</div>
						</div>
						<a target="_blank" href="<?php echo HTTP_PATH;?>admin/revenue.html">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<!-- /.row -->

		</div>
		<!-- /.container-fluid -->

	</div>
<!-- /#page-wrapper -->
