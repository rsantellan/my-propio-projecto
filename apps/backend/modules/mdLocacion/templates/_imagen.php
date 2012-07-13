<?php
if($md_locacion->hasAvatar()){
	$src = $md_locacion->retrieveAvatar(array(mdWebOptions::WIDTH =>50 , mdWebOptions::HEIGHT =>50 , mdWebOptions::CODE => mdWebCodes::CROPRESIZE ));
	echo '<img src="' . $src . '" />';
}