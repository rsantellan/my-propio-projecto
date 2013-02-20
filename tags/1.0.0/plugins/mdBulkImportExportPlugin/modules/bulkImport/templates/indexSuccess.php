<?php use_helper('mdAsset'); ?>
<?php use_plugin_javascript('mdBulkImportExportPlugin','bulkimport.js');?>
<?php use_plugin_javascript('mdMediaDoctrinePlugin', 'AvatarAdmin.js'); ?>
<?php //use_javascript('bulkimport.js');?>
<div id="md_center_container">
    <div class="md_shadow">
        <div class="md_center">
            <div class="md_content_center">
                <h1>Respaldo y recuperacion de datos</h1>
                <div id="md_content_actions">
                    
                </div>
                <div class="clear"></div>
                <div id="md_objects_container" class="md_objects">
                    Clases
                    <select id="selector_clases" onchange="retrieveProfiles('<?php echo url_for("bulkImport/retrieveProfileOfClass");?>')">
                        <option value="0"></option>
                        <?php foreach($classes as $key => $class):?>
                        <option value="<?php echo $key;?>"><?php echo $class;?></option>
                        <?php endforeach; ?>
                    </select>
                    Perfiles
                    <select id="selector_profiles" onchange="reformUrl();">
                        <option value="0"></option>
                    </select>

                    <br/>
                    <br/>
                    <a href="javascript:void(0)" id="link_descarga">Descargar</a>
                    <br/>
                    <br/>

                    <hr/>

                    <a id="link_upload" class="open-modal iframe" href="<?php echo url_for('bulkImport/uploadFiles') ?>"><?php echo plugin_image_tag('mdImageFileGalleryPlugin','agregar.jpg');?>Agregar imagenes</a>
                    <br/>
                    <br/>

                    <a id="link_upload_xls" class="open-modal iframe" href="<?php echo url_for('bulkImport/uploadXlsFiles') ?>"><?php echo plugin_image_tag('mdImageFileGalleryPlugin','agregar.jpg');?>Agregar archivos para importar</a>
                    <br/>
                    <br/>
                    

                    <a href="<?php echo url_for('bulkImport/createReport')?>"> Descarga archivo excel de las excursiones ingresadas. </a>
                    
                    <br/>
                    
                    <a href="<?php echo url_for('bulkImport/processFile')?>"> Ingresar excursiones desde archivo excel. </a>
                    
                    <?php if($sf_user->hasFlash('import_ok')): ?>
                      <h2>La importacion fue correcta.</h2>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>
 
<div class="md_right_container">
    <div class="md_right_shadow">
        <div class="md_center_right">
            <div class="md_content_right">
                
            </div>
        </div>
    </div>
</div>
<?php use_helper("JavascriptBase"); ?>
<?php echo javascript_tag("
    startBulk('".url_for('bulkImport/startCreatingExport')."','".url_for('bulkImport/uploadFiles')."','".url_for('bulkImport/uploadXlsFiles')."');

");?>

<div id="mdLightboxContent"></div>
<script type="text/javascript">

    $(document).ready(function(){
        $('a.open-modal').fancybox({ autoScale: false });

        //mdImageFileGallery.getInstance().mdImageFileGallery_iniRemove();
    });

</script>