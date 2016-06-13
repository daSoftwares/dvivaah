<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Basic Page Needs-->
        <meta charset="utf-8">
        <title><?php echo $pageTitle;?></title>
        <meta name="description" content="<?php echo $pageDesc;?>">
        <meta name="keywords" content="<?php echo $pageKeyword;?>">

        <!-- Mobile Specific Metas-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- FONT -->
		<?php echo $this->Html->css(array('http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800')); ?>


        <!-- CSS -->
		<?php echo $this->Html->css(array('bootstrap','datepicker','timepicker','normalize','skeleton', 'noty-animate',  'default', 'media-query', 'jquery.Jcrop','common')); ?>

        <!-- Favicon -->
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $this->webroot;?>img/dhangar-vivaah-favicon-32x32.png">
	<?php echo $this->Html->Script(array('jquery-2.1.3.min', 'default'));?>
     
        <?php echo $this->element('google-analytics');?>
    </head>
    <body>

        <!-- Primary Page Layout -->
  <?php echo $this->element('navbar');?>

  <?php echo $this->fetch('content'); ?>

  <?php echo $this->element('footer');?>
        <!-- End Document -->
    </body>
    <!-- JS -->
  <?php echo $this->Html->script(array('bootstrap.min','bootstrap-datepicker','bootstrap-timepicker', 'jquery.validation', 'jquery.blockUI', 'jquery.noty.packaged.min', 'noty-notification_html', 'jquery.Jcrop', 'common')); ?>

  <?php echo $this->element('validation-rules');?>
  <?php echo $this->element('notify');?>
  <?php echo $this->element('sql_dump'); ?>
</html>