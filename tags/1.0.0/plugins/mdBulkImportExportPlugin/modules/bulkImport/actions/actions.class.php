<?php

/**
 * default actions.
 *
 * @package    aeromarket
 * @subpackage default
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bulkImportActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        //$this->createFullBackUp('mdProduct', 5, true);
        $this->classes = BulkImportHandler::retrieveAvailableClasses();
    }

    public function executeRetrieveProfileOfClass(sfWebRequest $request) {
        $mdProfiles = Doctrine::getTable('mdProfile')->findBy('object_class_name', $request->getParameter("object_class"));
        $list = array();
        foreach($mdProfiles as $profile)
        {
            $list[$profile->getId()] = $profile->getName();
        }
        return $this->renderText(mdBasicFunction::basic_json_response(TRUE, array('list'=>$list)));
    }

    public function executeStartCreatingExport(sfWebRequest $request) {
        $object_class = $request->getParameter("object_class", NULL);
        $profile_id = $request->getParameter("profile_id", NULL);
        $not_variable = false;
        if($object_class == NULL || $profile_id == NULL)
        {
            $not_variable = true;
        }
        $this->forward404If($not_variable, "You should give a class");
        $object = new $object_class;
        $this->createFullBackUp($object_class, $profile_id, $object->bulkHasCategory(), $object->bulkHasImages());
        return $this->renderText("");
    }
    
    private function createFullBackUp($class_name, $md_profile_id = 1, $has_categories = true, $images = true) {

        $class = new $class_name;
        $class_fields = $class->retrieveBackUpFields();
        $mdAttributeList = mdProfileHandler::retrieveAllProfileAtributes($md_profile_id);
        $list = Doctrine::getTable($class_name)->retrieveBulkExportData($md_profile_id);
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()
                ->setCreator("Mastodonte")
                ->setLastModifiedBy("Mastodonte")
                ->setTitle("Office 2007 XLSX Document")
                ->setSubject("Office 2007 XLSX Document")
                ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");

        $objPHPExcel->setActiveSheetIndex(0);
        $letter = (string)(mdBasicFunction::retrieveLeters(0)."1");
        $objPHPExcel->getActiveSheet()
                ->setCellValue($letter, "Importante no tocar");
        $letter = (string)(mdBasicFunction::retrieveLeters(1)."1");
        $objPHPExcel->getActiveSheet()
                ->setCellValue($letter, $class_name);
        $letter = (string)(mdBasicFunction::retrieveLeters(2)."1");
        $objPHPExcel->getActiveSheet()
                ->setCellValue($letter, $md_profile_id);
        if($has_categories)
        {
            $letter = (string)(mdBasicFunction::retrieveLeters(3)."1");
            $objPHPExcel->getActiveSheet()
                ->setCellValue($letter, true);
        }
        if($images)
        {
            $letter = (string)(mdBasicFunction::retrieveLeters(4)."1");
            $objPHPExcel->getActiveSheet()
                ->setCellValue($letter, true);
        }
        $index = 0;
        $row = 2;
        foreach($class_fields as $field)
        {
            $letter = (string)(mdBasicFunction::retrieveLeters($index).$row);
            $name = (string) $field;
            $objPHPExcel->getActiveSheet()
                    ->setCellValue($letter, $name);
            $index++;
        }
        foreach($mdAttributeList as $field)
        {
            $letter = (string)(mdBasicFunction::retrieveLeters($index).$row);
            $name = (string) $field;
            $objPHPExcel->getActiveSheet()
                    ->setCellValue($letter, $name);
            $index++;
        }
        if($has_categories)
        {
            $letter = (string)(mdBasicFunction::retrieveLeters($index).$row);
            $name = "categoria";
            $objPHPExcel->getActiveSheet()
                    ->setCellValue($letter, $name);
            $index++;
        }
        if($images)
        {
            $letter = (string)(mdBasicFunction::retrieveLeters($index).$row);
            $name = "imagenes";
            $objPHPExcel->getActiveSheet()
                    ->setCellValue($letter, $name);
            $index++;
        }
        $row = 3;
        foreach($list as $object)
        {
            $new_index = 0;
            foreach($class_fields as $field)
            {
                $letter = (string)(mdBasicFunction::retrieveLeters($new_index).$row);
                $objPHPExcel->getActiveSheet()
                        ->setCellValue($letter, $object->get($field));
                $new_index++;
            }
            
            $mdProfile = Doctrine::getTable('mdProfile')->find($md_profile_id);
            $profile = profile::getInstance($object)->loadProfile($mdProfile->getName());
            foreach($mdAttributeList as $field)
            {
                $letter = (string)(mdBasicFunction::retrieveLeters($new_index).$row);

                $objPHPExcel->getActiveSheet()
                        ->setCellValue($letter, $profile->getValue($mdProfile->getName(), $field));
                $new_index++;
            }
            $profile->clean();
            if($has_categories)
            {
                $categoriesList = $object->getmdCategories();
                $catString = "";
                if (!count($categoriesList) == 0) {
                    if (count($categoriesList) == 1) {
                        $catString = $categoriesList[0]->getLabel();
                    } else {
                        foreach ($categoriesList as $cat) {
                            $catString .= $cat->getLabel() . "|";
                        }
                    }
                }
                $letter = (string)(mdBasicFunction::retrieveLeters($new_index).$row);
                $objPHPExcel->getActiveSheet()
                        ->setCellValue($letter, $catString);
                $new_index++;
            }
            if($images)
            {
                $imageString = "";
                try
                {
                    $itemsList = mdMediaManager::getInstance(mdMediaManager::IMAGES, $object)->load()->getItems();

                    if (!count($itemsList) == 0) {
                        if (count($itemsList) == 1) {
                            $imageString = $itemsList[0]->getFilename();
                        } else {
                            foreach ($itemsList as $item) {
                                $imageString .= $item->getFilename() . "|";
                            }
                        }
                    }
                }catch(Exception $e)
                {

                }
                $letter = (string)(mdBasicFunction::retrieveLeters($new_index).$row);
                $objPHPExcel->getActiveSheet()
                        ->setCellValue($letter, $imageString);
                $new_index++;

            }


            $row ++;
            
        }
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="bulk.xls"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

        $objWriter->save('php://output');
        //die('aca');
    }

    public function executeUploadXlsFiles(sfWebRequest $request){
        $this->setLayout(ProjectConfiguration::getActive()->getTemplateDir('bulkImport', 'clean.php').'/clean');
    }

    public function executeProccessUploadXlsFiles(sfWebRequest $request){
        try
        {
            $url = $this->doXlsUpload($_FILES, $request->getParameter('h', 70), $request->getParameter('w', 70));
            sfConfig::set('sf_web_debug', false);
            $this->setLayout ( false );
            return $this->renderText($url);
        } catch (Exception $e){

            echo $e->getMessage();

        }
    }

    private function doXlsUpload($FILES,  $h, $w)
    {
        try {
            $path = MdFileHandler::checkPathFormat(BulkImportHandler::retrieveXlsUploadPath());
            $file_name = MdFileHandler::upload($FILES, $path, true);
            $image = new mdImageFile($path . $file_name);
            return mdWebImage::getUrl($image, array('width' => $w, 'height' => $h));
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function executeUploadFiles(sfWebRequest $request){
        $this->object_class = $request->getParameter('object_class', "");
        $this->profile_id = $request->getParameter('profile_id', "");
        $this->setLayout(ProjectConfiguration::getActive()->getTemplateDir('bulkImport', 'clean.php').'/clean');
    }


    public function executeProccessUploadFiles(sfWebRequest $request){
        try
        {
            $object_class = $request->getParameter('object_class', "");
            $profile_id = $request->getParameter('profile_id', "");
            $append = "";
            if($object_class != "")
            {
                $append .= "/".$object_class;
            }
            if($profile_id != "")
            {
                $append .= "/".$profile_id;
            }
            $url = $this->doUpload($_FILES,$append, $request->getParameter('h', 70), $request->getParameter('w', 70));
            sfConfig::set('sf_web_debug', false);
            $this->setLayout ( false );
            return $this->renderText($url);

        } catch (Exception $e){

            echo $e->getMessage();

        }
    }

    private function doUpload($FILES, $append,  $h, $w)
    {
        try {
            $path = MdFileHandler::checkPathFormat(BulkImportHandler::retrieveImagesUploadPath().$append);
            $file_name = MdFileHandler::upload($FILES, $path, true);
            $image = new mdImageFile($path . $file_name);
            return mdWebImage::getUrl($image, array('width' => $w, 'height' => $h));
        } catch (Exception $e) {
            throw $e;
        }
    }


    public function executeProcessAllTest(sfWebRequest $request){
        BulkImportHandler::startBulkImport();
        die('termino...');
    }
    
    /*
        Esto es lo viejo
    */
    private function doFullBackUp() {
        $list = Doctrine::getTable('mdDynamicContent')->createQueryForAdmin('n')->execute();

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()
                ->setCreator("Mastodonte")
                ->setLastModifiedBy("Mastodonte")
                ->setTitle("Office 2007 XLSX Document")
                ->setSubject("Office 2007 XLSX Document")
                ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");

        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()
                ->setCellValue('A1', 'Id')
                ->setCellValue('B1', 'Titulo')
                ->setCellValue('C1', 'Destacado')
                ->setCellValue('D1', 'Duracion')
                ->setCellValue('E1', 'Salidas')
                ->setCellValue('F1', 'Vigencia')
                ->setCellValue('G1', 'Precio')
                ->setCellValue('H1', 'Detalle')
                ->setCellValue('I1', 'Imagenes')
                ->setCellValue('J1', 'Categorias')
                ->setCellValue('K1', 'Visible desde')
                ->setCellValue('L1', 'Visible hasta');

        $index = 2;

        foreach ($list as $obj) {

            $profile = profile::getInstance($obj)->loadProfile('excursion');
            $categoriesList = $obj->getmdCategories();
            $catString = "";
            if (!count($categoriesList) == 0) {
                if (count($categoriesList) == 1) {
                    $catString = $categoriesList[0]->getName();
                } else {
                    foreach ($categoriesList as $cat) {
                        $catString .= $cat->getName() . " | ";
                    }
                }
            }
            $itemsList = mdMediaManager::getInstance(mdMediaManager::IMAGES, $obj)->load()->getItems();
            $imageString = "";
            if (!count($itemsList) == 0) {
                if (count($itemsList) == 1) {
                    $imageString = $itemsList[0]->getFilename();
                } else {
                    foreach ($itemsList as $item) {
                        $imageString .= $item->getFilename() . " | ";
                    }
                }
            }
            $objPHPExcel->getActiveSheet()
                    ->setCellValue('A' . $index, $obj->getId())
                    ->setCellValue('B' . $index, $profile->getValue('excursion', 'titulo'))
                    ->setCellValue('C' . $index, $profile->getValue('excursion', 'destacado'))
                    ->setCellValue('D' . $index, $profile->getValue('excursion', 'duracion'))
                    ->setCellValue('E' . $index, $profile->getValue('excursion', 'salidas'))
                    ->setCellValue('F' . $index, $profile->getValue('excursion', 'vigencia'))
                    ->setCellValue('G' . $index, $profile->getValue('excursion', 'precio'))
                    ->setCellValue('H' . $index, $profile->getValue('excursion', 'detalle'))
                    ->setCellValue('I' . $index, $imageString)
                    ->setCellValue('J' . $index, $catString)
                    ->setCellValue('K' . $index, $obj->getPublishAt())
                    ->setCellValue('L' . $index, $obj->getPublishUpTo());
            $index++;
            $profile->clean();
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="bulk.xls"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

        $objWriter->save('php://output');
    }

    public function executeCreateReport(sfWebRequest $request) {
        $this->doFullBackUp();
    }

    public function executeProcessFile(sfWebRequest $request) {
        $lastId = $request->getParameter('id', 2);
        $file = sfConfig::get('sf_web_dir') . "/bulk/bulk.xls";
        $data = new Spreadsheet_Excel_Reader();
        $data->setOutputEncoding('CP1251'); // Set output Encoding.
        
        $data->read($file);
        $index = 0;
        for ($i = $lastId; $i <= $data->sheets[0]['numRows']; $i++) {

            $this->processRow($data->sheets[0]['cells'][$i], $data->sheets[0]['numCols']);
            if ($index == 20) {
                $this->redirect('bulkImport/processFile?id=' . $i);
            }
            $index++;
        }
        $this->getUser()->setFlash('import_ok', "import was ok");
        $this->redirect('bulkImport/index');
    }

    private function processRow($data, $colCount) {
        $colIndex = 0;
        //print_r($data);
        $mdDynamicContent = null;
        if (isset($data[1])) {
            $mdDynamicContent = Doctrine::getTable('mdDynamicContent')->find($data[1]);
        }
        if (!$mdDynamicContent) {
            $mdDynamicContent = new mdDynamicContent();
        }
        $mdDynamicContent->setPublishAt($data[11]);
        $mdDynamicContent->setPublishUpTo($data[12]);
        $mdUserId = $this->getUser()->getMdUserId();
        $mdDynamicContent->setMdUserIdTmp($mdUserId);
        $mdDynamicContent->save();
        $mdDynamicContent->executeAddProfile(1);

        $objects = Doctrine::getTable('mdAttribute')->findAttributes(1);
        mdAttributeObject::createAndSave($mdDynamicContent->getId(), $mdDynamicContent->getObjectClass(), $objects[0]['mdA_id'], 1, isset($data[2]) ? $data[2] : "");
        if (isset($data[3])) {
            mdAttributeObject::createAndSave($mdDynamicContent->getId(), $mdDynamicContent->getObjectClass(), $objects[1]['mdA_id'], 1, isset($data[3]) ? $data[3] : "");
        }
        mdAttributeObject::createAndSave($mdDynamicContent->getId(), $mdDynamicContent->getObjectClass(), $objects[2]['mdA_id'], 1, isset($data[4]) ? $data[4] : "");
        mdAttributeObject::createAndSave($mdDynamicContent->getId(), $mdDynamicContent->getObjectClass(), $objects[3]['mdA_id'], 1, isset($data[5]) ? $data[5] : "");
        mdAttributeObject::createAndSave($mdDynamicContent->getId(), $mdDynamicContent->getObjectClass(), $objects[4]['mdA_id'], 1, isset($data[6]) ? $data[6] : "");
        mdAttributeObject::createAndSave($mdDynamicContent->getId(), $mdDynamicContent->getObjectClass(), $objects[5]['mdA_id'], 1, isset($data[7]) ? $data[7] : "");
        mdAttributeObject::createAndSave($mdDynamicContent->getId(), $mdDynamicContent->getObjectClass(), $objects[6]['mdA_id'], 1, isset($data[8]) ? $data[8] : "");
        $categories = isset($data[10]) ? $data[10] : "";
        $categoriesList = explode("|", $categories);
        foreach ($categoriesList as $cat) {
            $mdCategory = Doctrine::getTable('mdCategory')->findOneBy('label', $cat);
            if ($mdCategory) {
                mdCategoryHandler::addCategoryToObject($mdDynamicContent, $mdCategory);
            }
        }

        $image = $data[9];

        $ext = substr(strrchr($image, '.'), 1);
        $serverPath = sfConfig::get('sf_web_dir') . "/bulk/images/" . $image;
        $path_info = pathinfo($serverPath);
        $file_extension = $path_info ["extension"];
        $path = $mdDynamicContent->getPath();
        $realPath = sfConfig::get('sf_upload_dir') . $path;
        $randName = md5(rand() * time());
        $file_name = $randName . "." . $file_extension;
        try {
            MdFileHandler::checkPathFormat($realPath);
            copy($serverPath, $realPath . $file_name);
        } catch (Exception $e) {
            print_r($e->getMessage());
        }

        $mdMedia = $mdDynamicContent->retrieveMdMedia();
        $mdMedia->upload($this->getUser()->getMdPassport()->getMdUser(), $mdDynamicContent, array('filename' => $file_name, 'name' => $image, 'type' => $ext));
    }

}
