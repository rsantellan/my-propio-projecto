<?php

/**
 * default actions.
 *
 * @package    default
 * @subpackage default
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class defaultActions extends sfActions
{
      private $metaDebug = true;
      
      public function postExecute() {
        parent::postExecute();
        mdMetaTagsHandler::addGenericMetas($this, null, array('debug'=>$this->metaDebug));
      }
    
	  public function executeIndex(sfWebRequest $request)
	  {
        $this->images = mdImageFileGallery::getImagesByDate(array('path'=>"home", 'order'=>'desc', 'absolute'=>false));
        $params = array();
        mdMetaTagsHandler::addMetas($this,'Home', array('params'=>$params, 'debug'=>$this->metaDebug));
      }      

	  public function executeFuncionamiento(sfWebRequest $request)
	  {
        $params = array();
        mdMetaTagsHandler::addMetas($this,'Funcionamiento', array('params'=>$params, 'debug'=>$this->metaDebug));
      }      

	  public function executeTerminos(sfWebRequest $request)
	  {
        $params = array();
        mdMetaTagsHandler::addMetas($this,'Terminos', array('params'=>$params, 'debug'=>$this->metaDebug));
      }      

	  public function executeAbout(sfWebRequest $request)
	  {
        $params = array();
        mdMetaTagsHandler::addMetas($this,'Acerca', array('params'=>$params, 'debug'=>$this->metaDebug));
      }


    public function executeError404(sfWebRequest $request)
    {
        
    }
    
    public function executeDummy(sfWebRequest $request)
    {
      throw new Exception("Error");
      //var_dump($this->getUser()->getCulture());
      $mdGenericSale = Doctrine::getTable('mdGenericSale')->find(35);
      //mdGenericSaleMailingHandler::sendConfirmAdminMail($mdGenericSale);
      //mdGenericSaleMailingHandler::sendSaleFinishMail($mdGenericSale);
      rentMailHandler::sendComissionMail($mdGenericSale);
      die('aca....');
      // 35
    }
}
