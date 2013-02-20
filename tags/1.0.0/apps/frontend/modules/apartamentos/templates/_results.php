<?php
if(isset($pager)):
  if($pager->count() > 0):
      foreach($pager->getResults() as $apartSearch): 
          if(get_class($apartSearch->getRawValue()) == 'mdApartamento')
              $apartamento = $apartSearch; 
          else
              $apartamento = $apartSearch->getMdApartamento();
          include_partial('list', array('apartamento'=>$apartamento));
      endforeach;         
    else:
      
  ?>  
    <div class="clear"></div>
    <?php echo __("search_sin resultados"); ?>
      
  <?php    
  endif;

endif;
?>