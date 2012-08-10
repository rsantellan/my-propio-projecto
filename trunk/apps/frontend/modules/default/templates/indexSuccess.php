<?php use_stylesheet("home.css"); ?>
<?php use_stylesheet("datepicker.css"); ?>
<?php include_partial('global/includeJQueryUI') ?>
<div class="title">
    <li><img src="/images/folder.png" width="15" height="12" /></li>
    <li class="current"><?php echo __('Global_Home') ?></li>
</div> 
<div class="main-content-up">
    <div class="col-left">
        <div class="titulo green"><?php echo __('Home_find a place to stay') ?></div>
            <?php include_component('apartamentos','search',array('home'=>true)) ?>
            <div class="property">
                <li><a href="<?php echo url_for('@submit') ?>"><?php echo __('Global_submit your property') ?></a></li>
                <li><a href="<?php echo url_for('@submit') ?>"><img src="/images/property.png" width="41" height="39" /></a></li>
            </div> 
    </div>
    <?php $index = 0; ?>
    <?php foreach($images as $image): ?>
  
          <img class="promo" src="<?php echo mdWebImage::getUrl($image, array(mdWebOptions::WIDTH => 1020, mdWebOptions::HEIGHT => 510,  mdWebOptions::CODE => mdWebCodes::RESIZECROP))?>" width="1020" height="510" style="<?php if($index != 0) echo ' display:none;' ?>">
  
    <?php $index ++; ?>
    <?php endforeach;?>
          
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

#ui-datepicker-div { display: none; }

</style>
<script>
$(document).ready(function(){
	function changeImage(){
		var count = $('img.promo').length;
		var showItem = Math.floor(Math.random()*count);
		var i = 0;
		//console.info(showItem);
		$('img.promo').each(function(){
			if($(this).is(":visible")){
				$(this).fadeOut(500);
				//console.log(i);
				if(i == showItem){
					if(showItem == count-1){
						$('img.promo').first().fadeIn(500);
					}else showItem++;
				}
				//console.log(showItem);
			}else{
				if(i == showItem){
					$(this).fadeIn(500);
				}
			}
			i++;
		})
		timer = setTimeout(function(){changeImage()}, 5000);
	}
	var timer = setTimeout(function(){changeImage()}, 5000);
	$(document).keyup(function(e) {

	  if (e.keyCode == 27) { clearTimeout(timer) }   // esc
		if(e.keyCode == 39 ){ clearTimeout(timer); changeImage(); }
	});
});
</script>