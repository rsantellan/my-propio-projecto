<?php
class mdMagick_resize
{
    public function resize(mdMagick $p , $width, $height = 0, $exactDimentions = false){
        $modifier = $exactDimentions ? '!' : '>';

        //if $width or $height == 0 then we want to resize to fit one measure
        //if any of them is sent as 0 resize will fail because we are trying to resize to 0 px
        $width  = $width  == 0 ? '' : $width ;
        $height = $height == 0 ? '' : $height ;

        $cmd = $p->getBinary('convert');
        $cmd .=  ' -scale "'. $width .'x'. $height . $modifier ;
        $cmd .= '" -quality '. $p->getImageQuality().'%' ;
        $cmd .=  ' -strip ';
        
        $cmd .= ' "' . $p->getSource() .'" "'. $p->getDestination().'"';
        if( sfConfig::get( 'sf_plugin_mdMedia_imagick_debug', false ) )
        {
            sfContext::getInstance()->getLogger()->err($cmd);
        }
        $p->execute($cmd);
        $p->setSource($p->getDestination());
        $p->setHistory($p->getDestination());
        return  $p ;
    }

    /**
    * tries to resize an image to the exact size wile mantaining aspect ratio,
    * the image will be croped to fit the measures
    * @param $width
    * @param $height
    */
    public function resizeExactly(mdMagick $p , $width, $height)
    {
        $p->requirePlugin('crop');
        $p->requirePlugin('info');

        list($w,$h) = $p->getInfo($p->getSource());

        if($w > $h){
            $h = $height;
            $w = 0;
        }else{
            $h = 0;
            $w = $width;
        }

        $p->resize($w, $h)->crop($width, $height);
    }

    /**
    * Creates a thumbnail of an image, if it doesn't exits
    *
    *
    * @param String $imageUrl - The image Url
    * @param Mixed $width - String / Integer
    * @param Mixed $height - String / Integer
    * @param boolean: False: resizes the image to the exact porportions (aspect ratio not preserved). True: preserves aspect ratio, only resises if image is bigger than specified measures
    *
    * @return String - the thumbnail URL
    */
    public function onTheFly(mdMagick $p,$imageUrl, $width, $height, $exactDimentions = false, $webPath = '', $physicalPath=''){
        //convert web path to physical
        $basePath = str_replace($webPath,$physicalPath, dirname($imageUrl) );
        $sourceFile = $basePath .DIRECTORY_SEPARATOR. basename($imageUrl); ;

        //naming the new thumbnail
        $thumbnailFile = $basePath . DIRECTORY_SEPARATOR.$width . '_' . $height . '_' . basename($imageUrl) ;

        $P->setSource($sourceFile);
        $p->setDestination($thumbnailFile);

        if (! file_exists($thumbnailFile)){
            $p->resize($p,$width, $height, $exactDimentions);
        }

        if (! file_exists($thumbnailFile)){
            //if there was an error, just use original file
            $thumbnailFile = $sourceFile;
        }

        //returning the thumbnail url
        return str_replace($physicalPath, $webPath, $thumbnailFile );

    }
}
?>