<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DHANGAR VIVAAH ADMIN</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $this->webroot;?>adm/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <?php if($this->action == 'revenue'){?>
    <link href="<?php echo $this->webroot;?>adm/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <?php }elseif(in_array($this->action, array('users', 'registerAUser'))){?>
    <?php echo $this->Html->css(array('datepicker','timepicker', 'common')); ?>
	<?php }?>
	<link href="<?php echo $this->webroot;?>adm/css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo $this->webroot;?>adm/css/default.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $this->webroot;?>adm/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   
   <!-- Favicon -->
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $this->webroot;?>img/dhangar-vivaah-favicon-32x32.png">
    
     <!-- jQuery -->
    <script src="<?php echo $this->webroot;?>adm/js/jquery.js"></script>
</head>
<body>

    <div class="<?php echo !($this->Session->check('admin')) ? 'admin-login-wrapper' : '';?>" id="wrapper">
		<?php if(!$this->Session->check('admin')){?>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">DHANGAR VIVAAH ADMIN</a>
            </div>
        </nav>
		<?php }?>
		<?php echo $this->fetch('content'); ?>

        <!-- End Document -->
    </div>
    <!-- /#wrapper -->

   

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $this->webroot;?>adm/js/bootstrap.min.js"></script>
     <script src="<?php echo $this->webroot;?>adm/js/bootstrap-datepicker.js"></script>
    <?php echo $this->Html->script(array('jquery.validation','bootstrap-timepicker', 'jquery.blockUI', 'common')); ?>
    <script src="<?php echo $this->webroot;?>adm/js/default.js"></script>

</body>
	 <?php echo $this->element('sql_dump'); ?>
</html>
