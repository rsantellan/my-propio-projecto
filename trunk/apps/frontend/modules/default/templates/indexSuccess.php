<?php use_stylesheet("home.css"); ?>
<?php use_stylesheet("datepicker.css"); ?>
<?php include_partial('global/includeJQueryUI') ?>
<div class="title">
    <li><img src="/images/folder.png" width="15" height="12" /></li>
    <li class="current"><?php echo __('Global_Home') ?></li>
</div> 
<div class="main-content-up">
	  <div class="col-right">
				<?php include_component('locaciones','imagen') ?>
	  </div>

    <div class="col-left">
        <div class="titulo green"><?php echo __('Home_find a place to stay') ?></div>
            <?php include_component('apartamentos','search',array('home'=>true)) ?>
            <div class="property">
                <li><a href="<?php echo url_for('@submit') ?>"><?php echo __('Global_submit your property') ?></a></li>
                <li><a href="<?php echo url_for('@submit') ?>"><img src="/images/property.png" width="41" height="39" /></a></li>
            </div> 
    </div>
</div>
<div class="main-content-down">
    <div class="titulo-down"><img src="/images/hand-black.png" width="14" height="13" />RENT N' CHILL</div>
    <ul>
    <li><?php echo __('Home_Texto1') ?></li>
    <li><?php echo __('Home_Texto2') ?></li>
    </ul>
</div>


