<?php use_helper('Date'); ?>

<?php $mdUserProfile = $object->getMdUser()->getMdUserProfile(); ?>
<div class="sale_status_<?php echo $object->getStatus();?>" style="height: 51px; margin: 4px;" ajax-url="<?php echo url_for('saleAdmin/openBox') . '?id=' . $object->getId(); ?>">
    <ul class="md_closed_object">
        <li class="md_object_name">
          <div class="md_object_owner">
            <?php echo format_datetime($object->getCreatedAt(), 'd') ?> - <?php echo __('venta_' . $object->getStatus()); ?>
            <?php echo __("venta_precio:");?> <?php echo $object->getPrice()?>
          </div>
          <div class="md_object_categories">
            <?php echo __("venta_usuario:"); ?> <?php echo $mdUserProfile->getName() . ' ' . $mdUserProfile->getLastName(); ?>
            <div class="clear"></div>
            <?php echo __("venta_forma de pago:"); ?> <?php echo __('venta_' . $object->getMdGenericPayment()->getObjectClass()); ?>
          </div>
        </li>
    </ul>
</div>
