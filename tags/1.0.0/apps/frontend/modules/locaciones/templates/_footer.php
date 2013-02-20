<ul>
  <?php foreach($locaciones as $locacion): ?>
  <li><a href="<?php echo url_for('locacion',$locacion); ?>"><?php echo strtoupper($locacion->getNombre());?></a></li>
  <li>|</li>  
  <?php endforeach; ?>
  <li class="green"><a href="<?php echo url_for('@locaciones');?>"><?php echo strtoupper(__('locacion_footer more'));?></a></li>
</ul>