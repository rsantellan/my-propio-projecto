<?php
/**
 * Recibe en:
 * $object: Este objecto debe tener los metodos getObjectClass y getId
 * $options un arreglo de opciones.
 * Las opciones validas y soportadas al momento son:
 *  $width: ancho del contenedor del mapa
 *  $height: alto del contenedor del mapa
 *  $zoom: zoom en el mapa
 */
?>

<?php
    $options = $options->getRawValue();
    $mdGoogleMapObject = mdGoogleMapManager::find($object->getObjectClass(), $object->getId());
    if($mdGoogleMapObject):
        $latitude = $mdGoogleMapObject->getLatitude();
        $longitude = $mdGoogleMapObject->getLongitude();

?>
<div id="map_canvas" style="width:<?php echo (array_key_exists('width', $options) ? $options['width'] : "538"); ?>px; height:<?php echo (array_key_exists('height', $options) ? $options['height'] : "200"); ?>px"></div><br />
<script type="text/javascript">
    $(function() {
        mdGoogleMap.init({
          zoom: <?php echo (array_key_exists('zoom', $options) ? $options['zoom'] : 15); ?>,
          latitude: <?php echo $latitude; ?>,
          longitude: <?php echo $longitude; ?>,
          markers: [ { 
                       latitude:  <?php echo $latitude; ?>,
                       longitude: <?php echo $longitude; ?>,
                       object_class_name: "<?php echo $object->getObjectClass() ?>",
                       object_id: <?php echo $object->getId(); ?>,
                       draggable: false } ]
        });
    });
</script>

<?php
		endif;
?>