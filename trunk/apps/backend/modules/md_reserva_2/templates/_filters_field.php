<div class="filter_field_div">
  <?php if ($field->isPartial()): ?>
    <?php include_partial('md_reserva/'.$name, array('type' => 'filter', 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
  <?php elseif ($field->isComponent()): ?>
    <?php include_component('md_reserva', $name, array('type' => 'filter', 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
  <?php else: ?>
    <tr class="<?php echo $class ?>">
      <td>
        <?php echo $form[$name]->renderLabel($label) ?>
      </td>
      <td>
        <?php echo $form[$name]->renderError() ?>

        <?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?>

        <?php if ($help || $help = $form[$name]->renderHelp()): ?>
          <div class="help"><?php echo __($help, array(), 'messages') ?></div>
        <?php endif; ?>
      </td>
    </tr>
  <?php endif; ?>
</div>