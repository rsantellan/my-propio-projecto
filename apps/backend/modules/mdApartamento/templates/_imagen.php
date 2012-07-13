<?php
if($md_apartamento->hasAvatar()){
	$src = $md_apartamento->retrieveAvatar(array(mdWebOptions::WIDTH =>50 , mdWebOptions::HEIGHT =>50 , mdWebOptions::CODE => mdWebCodes::CROPRESIZE ));
	echo '<img src="' . $src . '" />';
}