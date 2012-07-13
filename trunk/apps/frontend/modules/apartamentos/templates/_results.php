<?php
if(isset($pager)):
	foreach($pager->getResults() as $apartSearch): 
		if(get_class($apartSearch->getRawValue()) == 'mdApartamento')
			$apartamento = $apartSearch; 
		else
			$apartamento = $apartSearch->getMdApartamento();
			
		include_partial('list', array('apartamento'=>$apartamento));
	endforeach; 
endif;
?>