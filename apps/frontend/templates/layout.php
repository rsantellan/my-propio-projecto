<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $sf_user->getCulture() ?>" lang="<?php echo $sf_user->getCulture() ?>">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
		<?php include_partial('global/includeAssets') ?>
  </head>
  <body>
		<div class="conteiner">
			<?php include_partial('global/header') ?>
    	<div class="content">
    		<?php echo $sf_content ?>
				<div class="clear"></div>
			</div>
			<?php include_partial('global/footer') ?>
		</div>
<script>
$(function(){
	$('button.contact').click(function(){
		window.location.href=$(this).attr('href');
	})
})
</script>
  </body>
</html>
