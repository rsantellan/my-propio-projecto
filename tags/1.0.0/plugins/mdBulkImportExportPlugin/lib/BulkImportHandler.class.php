<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BulkImportHandler
 *
 * @author rodrigo
 */
class BulkImportHandler {

    //const UPLOAD_PATH = sfConfig::get('sf_upload_dir') . "/bulk";

    public static function retrieveAvailableClasses() {
        $list = array();
        $list["mdDynamicContent"] = "contenidos";
        $list["mdProduct"] = "productos";
        return $list;
    }

    public static function retrieveImagesUploadPath() {
        return sfConfig::get('sf_upload_dir') . "/bulk/images";
    }

    public static function retrieveXlsUploadPath() {
        return sfConfig::get('sf_upload_dir') . "/bulk/xls";
    }

    public static function startBulkImport($quantity_of_processing = 20) {
        $list = self::retrieveXMLFileList();
        
        foreach ($list as $file) {
            $index = 3;
            $file_options = self::retrieveObjectClassProfileIdHasCategoryHasImages(self::retrieveXlsUploadPath()."/".$file);
            while($index > 0)
            {
                $index = self::proccessBulkImport(self::retrieveXlsUploadPath()."/".$file, $index, $file_options['class'], $file_options['md_profile_id'], $file_options['category'], $file_options['images'], $quantity_of_processing);
            }
        }
    }

    public static function retrieveObjectClassProfileIdHasCategoryHasImages($file)
    {
        $data = new Spreadsheet_Excel_Reader();
        $data->setOutputEncoding('CP1251'); // Set output Encoding.

        $data->read($file);
        $options = array();
        if($data->sheets[0]['numRows'] > 0)
        {
            $first_row = $data->sheets[0]['cells'][1];
            $options['class'] = $first_row[2];
            $options['md_profile_id'] = $first_row[3];
            if(isset($first_row[4]))
            {
                $options['category'] = true;
            }
            else
            {
                $options['category'] = false;
            }
            if(isset($first_row[5]))
            {
                $options['images'] = true;
            }
            else
            {
                $options['images'] = false;
            }
        }
        return $options;
    }

    private static function proccessBulkImport($file, $row, $object_class, $profile_id, $has_category, $has_images, $quantity_of_processing = 20) {
        $data = new Spreadsheet_Excel_Reader();
        $data->setOutputEncoding('CP1251'); // Set output Encoding.

        $data->read($file);
        $index = 0;
        for ($i = $row; $i < $data->sheets[0]['numRows']; $i++) {
            self::processRow($data->sheets[0]['cells'][$i], $object_class, $profile_id, $has_category, $has_images);
            //$this->processRow($data->sheets[0]['cells'][$i], $data->sheets[0]['numCols']);
            if ($index == $quantity_of_processing) {
                return $row + $quantity_of_processing;
            }
            $index++;
        }
        return -1;
    }

    private static function processRow($data, $object_class, $md_profile_id, $has_category, $has_images) {
        $object = new $object_class;
        if (isset($data[1]))
        {
            //$object = Doctrine::getTable($object_class)->find($data[1]);
            if(!$object)
            {
                $object = new $object_class;
            }
        }
        $class_fields = $object->retrieveBackUpFields();
        $mdAttributeList = mdProfileHandler::retrieveAllProfileAtributes($md_profile_id);
        $started = false;
        $index = 2;
        foreach($class_fields as $field)
        {
            if($started)
            {
                $object->set($field, $data[$index]);
                $index ++;
            }
            else
            {
                $started = true;
            }
        }
        $mdUserId = 1;
        try
        {
            $mdUserId = sfContext::getInstance()->getUser()->getMdUserId();
        }catch(Exception $e)
        {
            
        }
        $object->setMdUserIdTmp($mdUserId);
        $object->save();
        $object->executeAddProfile($md_profile_id);
        foreach($mdAttributeList as $key => $field)
        {
            mdAttributeObject::createAndSave($object->getId(), $object->getObjectClass(), $key, $md_profile_id, isset($data[$index]) ? $data[$index] : "");
            $index ++;
        }

        if($has_category)
        {
            $categories = isset($data[$index]) ? $data[$index] : "";
            $categoriesList = explode("|", $categories);
            foreach ($categoriesList as $cat) {
                $mdCategory = Doctrine::getTable('mdCategory')->findOneBy('label', $cat);
                if ($mdCategory) {
                    mdCategoryHandler::addCategoryToObject($object, $mdCategory);
                }
            }
            $index ++;
        }
        if($has_images)
        {
            $image_string = $data[$index];
            $imageList = explode("|", $image_string);
            foreach($imageList as $image)
            {
                $ext = substr(strrchr($image, '.'), 1);
                $append = "";
                if($object_class != "")
                {
                    $append .= "/".$object_class;
                }
                if($md_profile_id != "")
                {
                    $append .= "/".$md_profile_id;
                }
                $serverPath = self::retrieveImagesUploadPath().$append.'/'. $image;
                $path_info = pathinfo($serverPath);
                $file_extension = $path_info ["extension"];
                $path = $object->getPath();
                $realPath = sfConfig::get('sf_upload_dir') . $path;
                $randName = md5(rand() * time());
                $file_name = $randName . "." . $file_extension;
                try {
                    MdFileHandler::checkPathFormat($realPath);
                    copy($serverPath, $realPath . $file_name);
                } catch (Exception $e) {
                    print_r($e->getMessage());
                }
                try {
                    $mdMedia = $object->retrieveMdMedia();
                    $mdMedia->upload(sfContext::getInstance()->getUser()->getMdPassport()->getMdUser(), $object, array('filename' => $file_name, 'name' => $image, 'type' => $ext));
                } catch (Exception $e) {
                    print_r($image);
                    print_r($e->getMessage());
                }

            }
        }
//
//        $colIndex = 0;
//        //print_r($data);
//        $mdDynamicContent = null;
//        if (isset($data[1])) {
//            $mdDynamicContent = Doctrine::getTable('mdDynamicContent')->find($data[1]);
//        }
//        if (!$mdDynamicContent) {
//            $mdDynamicContent = new mdDynamicContent();
//        }
//        $mdDynamicContent->setPublishAt($data[11]);
//        $mdDynamicContent->setPublishUpTo($data[12]);
//        $mdUserId = $this->getUser()->getMdUserId();
//        $mdDynamicContent->setMdUserIdTmp($mdUserId);
//        $mdDynamicContent->save();
//        $mdDynamicContent->executeAddProfile(1);
//
//        $objects = Doctrine::getTable('mdAttribute')->findAttributes(1);
//        mdAttributeObject::createAndSave($mdDynamicContent->getId(), $mdDynamicContent->getObjectClass(), $objects[0]['mdA_id'], 1, isset($data[2]) ? $data[2] : "");
//        if (isset($data[3])) {
//            mdAttributeObject::createAndSave($mdDynamicContent->getId(), $mdDynamicContent->getObjectClass(), $objects[1]['mdA_id'], 1, isset($data[3]) ? $data[3] : "");
//        }
//        mdAttributeObject::createAndSave($mdDynamicContent->getId(), $mdDynamicContent->getObjectClass(), $objects[2]['mdA_id'], 1, isset($data[4]) ? $data[4] : "");
//        mdAttributeObject::createAndSave($mdDynamicContent->getId(), $mdDynamicContent->getObjectClass(), $objects[3]['mdA_id'], 1, isset($data[5]) ? $data[5] : "");
//        mdAttributeObject::createAndSave($mdDynamicContent->getId(), $mdDynamicContent->getObjectClass(), $objects[4]['mdA_id'], 1, isset($data[6]) ? $data[6] : "");
//        mdAttributeObject::createAndSave($mdDynamicContent->getId(), $mdDynamicContent->getObjectClass(), $objects[5]['mdA_id'], 1, isset($data[7]) ? $data[7] : "");
//        mdAttributeObject::createAndSave($mdDynamicContent->getId(), $mdDynamicContent->getObjectClass(), $objects[6]['mdA_id'], 1, isset($data[8]) ? $data[8] : "");
//        $categories = isset($data[10]) ? $data[10] : "";
//        $categoriesList = explode("|", $categories);
//        foreach ($categoriesList as $cat) {
//            $mdCategory = Doctrine::getTable('mdCategory')->findOneBy('label', $cat);
//            if ($mdCategory) {
//                mdCategoryHandler::addCategoryToObject($mdDynamicContent, $mdCategory);
//            }
//        }
//
//        $image = $data[9];
//
//        $ext = substr(strrchr($image, '.'), 1);
//        $serverPath = sfConfig::get('sf_web_dir') . "/bulk/images/" . $image;
//        $path_info = pathinfo($serverPath);
//        $file_extension = $path_info ["extension"];
//        $path = $mdDynamicContent->getPath();
//        $realPath = sfConfig::get('sf_upload_dir') . $path;
//        $randName = md5(rand() * time());
//        $file_name = $randName . "." . $file_extension;
//        try {
//            MdFileHandler::checkPathFormat($realPath);
//            copy($serverPath, $realPath . $file_name);
//        } catch (Exception $e) {
//            print_r($e->getMessage());
//        }
//
//        $mdMedia = $mdDynamicContent->retrieveMdMedia();
//        $mdMedia->upload($this->getUser()->getMdPassport()->getMdUser(), $mdDynamicContent, array('filename' => $file_name, 'name' => $image, 'type' => $ext));
    }

    public static function retrieveXMLFileList() {
        $array = array();
        $path = self::retrieveXlsUploadPath();
        $path = MdFileHandler::checkPathFormat($path);
        if (is_dir($path)) {
            if ($dh = opendir($path)) {
                while (($file = readdir($dh)) !== false) {

                    //echo '<br>Nombre de archivo:' . $file . ' : Es un: ' . filetype($path . $file);

                    if (is_dir($path . $file) AND $file != '.' AND $file != '..' AND $file != '.svn') {

                        //echo '<br>Directorio:' . $path . $file;
                        self::getList($path . $file . "/");
                    } else {

                        if ($file != '.' AND $file != '..' AND $file != '.svn') {
                            array_push($array, $file);
                        }
                    }
                }
                closedir($dh);
            }
        } else {

            throw new Exception('invalid source');
        }
        return $array;
    }

}

