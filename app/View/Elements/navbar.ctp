<header class="wrapper-max main-header  add-background">
    <div class="container">
      <div class="six columns logo">
       	 <h1><a href="<?php echo PAGE_HOME;?>"><img src="<?php echo SITE_LOGO;?>" title="<?php echo WEBSITE_NAME;?>" alt="<?php echo WEBSITE_NAME;?>"></a></h1>
      </div>
      <div class="six columns user-login">
      <?php if($this->Session->check('user_name')){?>
        <div class="actions">
          <a href="#."><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span><div class="reminder">2</div></a>
          <a href="<?php echo PAGE_USER_SLIST;?>"><span class="glyphicon glyphicon-star" aria-hidden="true"></span><div class="reminder" id="shortListCount"><?php echo isset($totalShortListCount) ? $totalShortListCount : 0;?></div></a>
          <a href="#." class="user">
            <span><?php echo __('My Profile');?></span>
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
          </a>
          <div class="actions-list user flyout">
            <span aria-hidden="true" class="glyphicon glyphicon-triangle-top"></span>
            <ul>
              <li><a href="<?php echo PAGE_VIEW_PROFILE.($this->Session->read('id'));?>"><?php echo __('My Profile');?></a></li>
              <li><a href="<?php echo PAGE_EDIT_PROFILE.($this->Session->read('id'));?>"><?php echo __('Edit Profile');?></a></li>
              <li><a href="<?php echo PAGE_CHANGE_PASSWD;?>"><?php echo __('Change Password');?></a></li>
              <li><a href="<?php echo PAGE_USER_HISTORY;?>"><?php echo __('Selected Profile History');?></a></li>
              <li><a href="<?php echo PAGE_USER_SUBS;?>"><?php echo __('Subscription');?></a></li>
              <li><a href="<?php echo PAGE_LOGOUT;?>"><?php echo __('Logout');?></a></li>
            </ul>
          </div>          
        </div>
        <?php }else{?>
        <a class="button button-primary" href="<?php echo PAGE_REGISTER;?>"><?php echo __('REGISTER');?></a>
        <a class="button button-primary" data-toggle="modal" data-target=".login-modal"><?php echo __('LOGIN');?></a>
        <?php }?>
        <div class="mobile-nav-container u-pull-right show-on-mobile">
          <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
          <div class="mobile-nav hide-element">
            <span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
            <ul>
              <li><a href="<?php echo PAGE_ABOUT_US;?>"><?php echo __('About Us');?></a></li>
              <li><a href="<?php echo PAGE_SUBSCRIPTION;?>"><?php echo __('Subscription');?></a></li>
              <li><a href="<?php echo PAGE_TERMS;?>"><?php echo __('Terms & Condition');?></a></li>
              <li><a href="<?php echo PAGE_CONTACT_US;?>"><?php echo __('Contact Us');?></a></li>
                <?php if($cookieHelper->check('Config.language') && $cookieHelper->read('Config.language') == 'mar'){?>
           <li><a class="language" href="<?php echo PAGE_TO_ENG;?>">For English</a></li>
          <?php }else{?>
         <li><a class="language" href="<?php echo PAGE_TO_MAR;?>">मराठी करीता</a></li>
          <?php }?>
            </ul>
          </div>
        </div>
      </div>
    </div>
	
	<?php echo $this->element('login-modal');?>
    
	<?php echo $this->element('forgot-modal');?>

    <nav class="navigation show-on-desktop">
      <div class="container">      
        <ul class="u-cf">
          <li><a href="<?php echo PAGE_ABOUT_US;?>"><?php echo __('About Us');?></a></li>
          <li><a href="<?php echo PAGE_SUBSCRIPTION;?>"><?php echo __('Subscription');?></a></li>
          <li><a href="<?php echo PAGE_TERMS;?>"><?php echo __('Terms & Condition');?></a></li>
          <li><a href="<?php echo PAGE_CONTACT_US;?>"><?php echo __('Contact Us');?></a></li>
          <?php if($cookieHelper->check('Config.language') && $cookieHelper->read('Config.language') == 'mar'){?>
           <li><a class="language" href="<?php echo PAGE_TO_ENG;?>">For English</a></li>
          <?php }else{?>
         <li><a class="language" href="<?php echo PAGE_TO_MAR;?>">मराठी करीता</a></li>
          <?php }?>
        </ul>        
      </div>
    </nav>
</header>