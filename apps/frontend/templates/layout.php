<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $sf_user->getCulture() ?>" lang="<?php echo $sf_user->getCulture() ?>">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
		<?php include_partial('global/includeAssets') ?>
        
<!--<meta name="description" content="">

<meta name="keywords" content="">

<meta name="copyright" content="Copyright 2013">

<meta name="Distribution" content="Global">

<meta name="Robots" content="INDEX,FOLLOW">

<meta name="Revisit-after" content="7 Days"> -->

  <meta name="google-site-verification" content="8GhvcYJz4oWG07H7EN_--v_phvnEGwwjpO_p-nmTElQ" />
        
        
		<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34008925-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
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
