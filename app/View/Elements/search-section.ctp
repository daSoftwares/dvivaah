<section class="wrapper-max advance-search-container">
    <div class="open-search-container">
      <div class="slide-search-btn">
        <h4><?php echo __('Search Perfect Match');?></h4>
        <span class="glyphicon glyphicon-menu-down"></span>
        <span class="glyphicon glyphicon-menu-up hide-element"></span>
      </div>
    </div>
    <div class="search-profile advance-search-profile hide-element">
      <div class="container">
        <form action="<?php echo PAGE_SEARCH_PROFILE;?>" method="get"> 
          <h2><?php echo __('Find Your Special Someone..!');?></h2>
          <div class="row select-bride-groom">
            <div class="six columns">            
              <label class="u-pull-right"><input type="radio"  checked="checked" name="user_type" value="0"> <?php echo __('Bride (Vadhu)');?></label>            
            </div>
            <div class="six columns">            
              <label><input type="radio" name="user_type" value="1"> <?php echo __('Groom (Var)');?></label>            
            </div>          
          </div>
          

          <div class="row">
            <div class="six columns">
              <label><?php echo __('Age From');?></label>
              <select class="u-full-width" type="select" name="age[]">
                <?php echo $this->element('age-options');?>
              </select>           
            </div>
            <div class="six columns">
              <label><?php echo __('Age To');?></label> 
              <select  class="u-full-width" type="select" name="age[]">
              	 <?php echo $this->element('age-options');?>
              </select>           
            </div>
          </div>

          <div class="row">
            <div class="six columns">
              <label><?php echo __('Subcaste');?></label>
              <select class="u-full-width" name="sub_cast">
              	<?php echo $this->element('subcaste-options');?>
              </select>
            </div>
            <div class="six columns">
              <label><?php echo __('Education');?></label>
              <select class="u-full-width"  name="education">
              	<?php echo $this->element('education-options');?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="six columns">
              <label><?php echo __('City');?></label>
              <input type="text" name="native_place">
            </div>
            <div class="six columns">
              <label><?php echo __('Residence');?></label>
              <input type="text" name="residence">
            </div>
          </div>

          <div class="row search-btn-container">
            <input type="submit" class="button button-primary" name="search" value="<?php echo __('SEARCH');?>">
          </div>

        </form>
      </div>
    </div>    
  </section>