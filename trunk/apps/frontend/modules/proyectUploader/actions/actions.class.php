<?php

/**
 */
class proyectUploaderActions extends sfActions
{
  
  public function executeUploaderImages(sfWebRequest $request)
  {
    $this->objectId = $request->getParameter('a', 0);
    $this->objectClass = $request->getParameter('c', '');
		if($request->getParameter('p', false))
			$this->planos = true;

    try
    {
      $mdObject = Doctrine::getTable($this->objectClass)->find($this->objectId);
      mdMediaManager::$LOAD_ON_DEMAND_CONTENT = true;
      $this->manager =  mdMediaManager::getInstance(mdMediaManager::IMAGES, $mdObject)->load();
    } catch(Exception $e){
      print_r($e->getMessage());
    }

    $this->setLayout(ProjectConfiguration::getActive()->getTemplateDir('mdMediaContentAdmin', 'clean.php').'/clean');
  }
  
  public function executeUploaderVideos(sfWebRequest $request)
  {
    $this->objectId = $request->getParameter('a', 0);
    $this->objectClass = $request->getParameter('c', '');

    try
    {
      $mdObject = Doctrine::getTable($this->objectClass)->find($this->objectId);
      mdMediaManager::$LOAD_ON_DEMAND_CONTENT = true;
      $this->manager =  mdMediaManager::getInstance(mdMediaManager::VIDEOS, $mdObject)->load();
    } catch(Exception $e){
      print_r($e->getMessage());
    }

    $this->setLayout(ProjectConfiguration::getActive()->getTemplateDir('mdMediaContentAdmin', 'clean.php').'/clean');
  }
  
  public function executeUploadImages(sfWebRequest $request)
  {
    try
    {
      if(!$this->getUser()->isAuthenticated())
      {
        throw new Exception('No esta autentificado', 100);
      }
      
      $object_id = $request->getParameter('objId');
      $object_class = $request->getParameter('objClass');
      
      $mdObject = Doctrine::getTable($object_class)->find($object_id);
      
      mdMediaManager::$LOAD_ON_DEMAND_CONTENT = true;
			if($request->getParameter('p',false))
      	$manager = mdMediaManager::getInstance(mdMediaManager::IMAGES, $mdObject)->load('planos');
			else
      	$manager = mdMediaManager::getInstance(mdMediaManager::IMAGES, $mdObject)->load(mdMedia::$default);
      
      // Chequeo que pueda subir una nueva imagen
//      if(($manager->getCount() < $aviso->getFotos()) || $aviso->getFotos() == -1)
 //     {
        $album_id = $manager->getAlbums()->id;
        
        $mdMediaContentConcrete = $this->upload($_FILES, $object_class, $object_id, $album_id, $request->getParameter('filename'));
        $this->setLayout ( false );
        $url = $mdMediaContentConcrete->getObjectUrl(array('width'=>$request->getParameter('w'), 'height'=>$request->getParameter('h')));

        sfConfig::set('sf_web_debug', false);
        $this->setLayout ( false );

        return $this->renderText( 'OK|' . $url . '|' . $mdMediaContentConcrete->retrieveMdMediaContent()->getId());
   //   }
  /*    else
      {
        return $this->renderText('NOK|No puedes subir mas imagenes');        
      }
    */  
    } catch (Exception $e) {
        sfContext::getInstance()->getLogger()->log('>>>>>>> ' . $e->getMessage());
        echo $e->getMessage();
        return $this->renderText('NOK| ' . $e->getMessage());
    }
  }
  
  public function executeUploadVideos(sfWebRequest $request)
  {
    try
    {
      if(!$this->getUser()->isAuthenticated())
      {
        throw new Exception('No esta autentificado', 100);
      }
      
      $object_id = $request->getParameter('objId');
      $object_class = $request->getParameter('objClass');
      
      $mdObject = Doctrine::getTable($object_class)->find($object_id);


      mdMediaManager::$LOAD_ON_DEMAND_CONTENT = true;
      $manager = mdMediaManager::getInstance(mdMediaManager::IMAGES, $mdObject)->load('videos');      
      
      // Chequeo que pueda subir una nueva imagen
//      if($aviso->getVideos())
 //     {
        $album_id = $manager->getAlbums()->id;
        
        $mdMediaContentConcrete = $this->upload($_FILES, $object_class, $object_id, $album_id, $request->getParameter('filename'));
        $this->setLayout ( false );
        $url = $mdMediaContentConcrete->getObjectUrl(array('width'=>$request->getParameter('w'), 'height'=>$request->getParameter('h')));

        sfConfig::set('sf_web_debug', false);
        $this->setLayout ( false );

        return $this->renderText( 'OK|' . $url . '|' . $mdMediaContentConcrete->retrieveMdMediaContent()->getId());
//      }
      
    } catch (Exception $e) {
        sfContext::getInstance()->getLogger()->log('>>>>>>> ' . $e->getMessage());
        echo $e->getMessage();
        return $this->renderText('NOK| ' . $e->getMessage());
    }
  }  

  public function executeUploadBasicContent(sfWebRequest $request)
  {
    if(!$this->getUser()->isAuthenticated())
    {
      throw new Exception('No esta autentificado', 100);
    }

    try
    {

      $this->upload($_FILES, $request->getParameter('objClass'), $request->getParameter('objId'), $request->getParameter('album_id', ''), $request->getParameter('filename'));

      return $this->renderText( "<script>parent.endUpload(" . $request->getParameter('objId') . ",'" . $request->getParameter('objClass') . "');</script>");

    }catch(Exception $e){

      return $this->renderText( "<script>parent.endUpload(" . $request->getParameter('objId') . ",'" . $request->getParameter('objClass') . "');</script>" . $e->getMessage());

    }
  }

  private function upload($FILES, $object_class, $object_id, $album_id, $filename)
  {
    try
    {
      sfContext::getInstance()->getLogger()->log('>>>>>>upload ' . $object_class . ' ' . $object_id);
      $mdObject = Doctrine::getTable ( $object_class )->find($object_id);

      $path = $mdObject->getPath();

      $file_name = MdFileHandler::upload($FILES, sfConfig::get('sf_upload_dir') . $path);

      //Obtenemos el usuario logueado
      $mdUser = $this->getUser()->getMdPassport()->getMdUser();
      $upload_name = "upload";

      $path_info = pathinfo ( $FILES [$upload_name] ['name'] );
      $file_extension = $path_info ["extension"];
      $name = $filename;
      $album_id = (int)$album_id;
      
      sfContext::getInstance()->getLogger()->log('>>>>>>>upload ' . $album_id . ' extension ' . $file_extension);
      
      $options = array('name' => $name,'filename' => $file_name, 'type' => strtolower($file_extension), 'album' => $album_id);

      //Damos de alta las imagenes del usuario $mdUser al contenido $mdObject salvado anteriormente
      $mdMedia = $mdObject->retrieveMdMedia();
      
      sfContext::getInstance()->getLogger()->log('>>>>>>>upload mdMedia ' . $mdMedia->getId());
      
      $mdMediaContentConcrete = $mdMedia->upload($mdUser, $mdObject , $options);

      return $mdMediaContentConcrete;

    }catch(Exception $e){
      throw $e;
    }
  }
}
