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
    
	  public function executeIndex(sfWebRequest $request)
	  {
        $this->images = mdImageFileGallery::getImagesByDate(array('path'=>"home", 'order'=>'desc', 'absolute'=>false));
      }      

	  public function executeFuncionamiento(sfWebRequest $request)
	  {

		}      

	  public function executeTerminos(sfWebRequest $request)
	  {

		}      

	  public function executeAbout(sfWebRequest $request)
	  {

		}


    public function executeError404(sfWebRequest $request)
    {
        
    }
    
    public function executeDummy(sfWebRequest $request)
    {
      //var_dump($this->getUser()->getCulture());
      $mdGenericSale = Doctrine::getTable('mdGenericSale')->find(35);
      //mdGenericSaleMailingHandler::sendConfirmAdminMail($mdGenericSale);
      //mdGenericSaleMailingHandler::sendSaleFinishMail($mdGenericSale);
      rentMailHandler::sendComissionMail($mdGenericSale);
      die('aca....');
      // 35
    }
}
