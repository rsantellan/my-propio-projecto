<td>
  <ul class="sf_admin_td_actions">
    <?php //echo $helper->linkToEdit($md_temporada, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
    <li class="sf_admin_action_delete">
      <a href="<?php echo url_for('@temporada-delete?id=' . $md_locacion_temporada->getId()); ?>" onclick="if (confirm('¿Está seguro?')) { deleteTemporada(this); return false; }">Borrar</a>
    </li>  
  </ul>
</td>
