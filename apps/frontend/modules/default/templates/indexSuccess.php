<?php use_stylesheet("home.css"); ?>
<?php use_stylesheet("datepicker.css"); ?>
<?php include_partial('global/includeJQueryUI') ?>
<?php //use_plugin_javascript("mastodontePlugin", "easySlider1.5.js", "last") ?>
<?php use_javascript('easySlider1.7.js', 'last');?>
<?php //use_javascript('easySlider.js', 'last');?>


<div class="title">
    <li><img src="/images/folder.png" width="15" height="12" /></li>
    <li class="current"><?php echo __('Global_Home') ?></li>
</div> 

<div class="property">
                <li><a href="<?php echo url_for('@submit') ?>"><?php echo __('Global_submit your property') ?></a></li>
                <li><a href="<?php echo url_for('@submit') ?>"><img src="/images/property.png" width="41" height="39" /></a></li>
            </div> 

<div class="main-content-up">
    <div class="col-left">
        <div class="titulo green"><?php echo __('Home_find a place to stay') ?></div>
            <?php include_component('apartamentos','search',array('home'=>true)) ?>
            
    </div>
    <?php $index = 0; ?>
   	<div id="slider">
 		<ul>
          <?php foreach($images as $image): ?>
          <li>
            <a href="javascript:void(0)">
              <img class="promo" src="<?php echo mdWebImage::getUrl($image, array(mdWebOptions::WIDTH => 1020, mdWebOptions::HEIGHT => 510,  mdWebOptions::CODE => mdWebCodes::RESIZECROP))?>" width="1020" height="510" >
            </a>
          </li>
          <?php $index ++; ?>
          <?php endforeach;?>
 		</ul>
 	</div>
    
    
          
</div>
<div class="main-content-down">
    <div class="titulo-down"><img src="/images/hand-black.png" width="14" height="13" /><?php echo __('Home_Texto1') ?></div>
    <ul>
    <li><?php echo __('Home_Texto2') ?></li>
    </ul>
</div>


<style>
.col-right img {
  bottom: 75px;
  position: absolute;
  right: 0;
}
.col-right {
  float: right;
  height: 421px;
  margin-right: 30px;
  position: relative;
  width: 480px;
}

#ui-datepicker-div { 
  display: none; 
}
</style>
<script>
$(document).ready(function(){
  
    $("#slider").easySlider({
		auto: true,
		continuous: true ,
        myHeight: 510,
        controlsShow: false,
        pause: 4000,
	});
    
});
</script>