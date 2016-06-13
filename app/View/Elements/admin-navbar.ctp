<?php //debug(HTTP_PATH);?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">DHANGAR VIVAAH ADMIN</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->Session->read('admin')->user_name;?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li class="divider"></li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-gear"></i> Reset Password</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="logout.html"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
 <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="<?php echo HTTP_PATH;?>admin/dashboard.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="<?php echo HTTP_PATH;?>admin/registerAUser.html"><i class="fa fa-fw fa-users"></i> New User Registration Form </a>
                    </li>
                    <li>
                        <a href="<?php echo HTTP_PATH;?>admin/users.html"><i class="fa fa-fw fa-user"></i> Users</a>
                    </li>
                    <li>
                        <a href="<?php echo HTTP_PATH;?>admin/revenue.html"><i class="fa fa-fw fa-rupee"></i>Revenue</a>
                    </li>
                    <li>
                        <a href="<?php echo HTTP_PATH;?>admin/approveProfileImage.html"><i class="fa fa-fw fa-rupee"></i>Profile Pic Approval</a>
                    </li>
                    <li>
                        <a href="send-contact-details.html"><i class="fa fa-fw fa-envelope"></i> Send Contact Details</a>
                    </li>
                    <li>
                        <a href="send-sms.html"><i class="fa fa-fw fa-mobile-phone"></i> Send Message Manually</a>
                    </li>
                </ul>
            </div>
    <!-- /.navbar-collapse -->
</nav>