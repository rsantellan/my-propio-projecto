<?php
slot('backend_genericSaleAdmin');

use_helper('mdAsset');

use_plugin_javascript('mdGenericSaleDoctrinePlugin', 'mdGenericSale.js', 'last');
use_plugin_stylesheet('mdGenericSaleDoctrinePlugin','mdGenericSaleBackend.css');

//    'formFilter' => $formFilter,

include_component('backendBasic', 'backendTemplate', array(
    'module' => 'saleAdmin',
    'objects' => $pager,
    'hasAdd' => false
));

?>
