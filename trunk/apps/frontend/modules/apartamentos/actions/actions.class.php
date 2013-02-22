<?php

/**
 * apartamentos actions.
 *
 * @package    rentNchill
 * @subpackage apartamentos
 * @author     maui
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class apartamentosActions extends sfActions {


    private $metaDebug = true;
    
    
    public function postExecute() {
        parent::postExecute();
        if(!$this->getRequest()->isXmlHttpRequest())
        {
          mdMetaTagsHandler::addGenericMetas($this, null, array('debug'=>$this->metaDebug));
        }
        
    }
    
  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function executeIndex(sfWebRequest $request) {
    $filter = new mdApartamentoFindFormFilter();
    if(!$request->isXmlHttpRequest())
    {
        $params = array();
        mdMetaTagsHandler::addMetas($this,'Busqueda', array('params'=>$params, 'debug'=>$this->metaDebug));
    }
    
    if ($request->hasParameter($filter->getName())) {
      $this->filter = $filter;
      $parameters = $request->getParameter($filter->getName());


      $this->filter->bind($parameters);
      if ($this->filter->isValid()) {

        $this->getUser()->setAttribute('search_values', $this->filter->getValues());
        $query = $this->filter->buildQuery($this->filter->getValues());
      } else {
        foreach ($this->filter->getFormattedErrors() as $error) {
          echo $error;
        }
      }
    } else {
      $mdLocacion = Doctrine::getTable('mdLocacion')->find(1);
      $query = $mdLocacion->getApartamentos(array('returnQuery' => true));
    }
    $pager = new sfDoctrinePager('mdApartamento', sfConfig::get('app_max_shown_search', 100));


    $pager->setQuery($query);

    $pager->setPage((int) $request->getParameter('page', 1));

    $pager->init();


    if ($request->isXmlHttpRequest())
      return $this->renderText($this->getPartial('results', array('pager' => $pager)));

    $this->pager = $pager;
  }

  /**
   * detalle de apartamento
   *
   * @return void
   * @author maui .-
   * */
  public function executeDetalle(sfWebRequest $request) {
    $this->depto = $this->getRoute()->getObject();
    $this->comodidades = Doctrine::getTable('mdComodidad')->findAll();
    $params = array();
    mdMetaTagsHandler::addMetas($this,'Apartamento', array('params'=>$params, 'debug'=>$this->metaDebug));
  }

  public function executeEdit(sfWebRequest $request) {
    $this->depto = $this->getRoute()->getObject();
    if ($this->getUser()->isAuthenticated() and $this->getUser()->getMdUserId() == $this->depto->getMdUserId()) {
      $this->form = new apartamentaPublicar($this->depto);
      if ($request->hasParameter($this->form->getName())) {
        $parameters = $request->getParameter($this->form->getName());

        $this->form->bind($parameters);

        if ($this->form->isValid()) {
          $this->form->save();
          //$this->redirect('user_edit');
        }
      }
    }else
      $this->redirect('apartamento', $this->depto);
  }

  public function executeSubmit(sfWebRequest $request) {
    $this->form = new apartamentaPublicar();
    $params = array();
    mdMetaTagsHandler::addMetas($this,'Publicar', array('params'=>$params, 'debug'=>$this->metaDebug));
    if ($request->getParameter('type', false)) {
      $this->type = $request->getParameter('type');
    } else {
      $this->type = "fullservice";
    }

    if ($request->hasParameter($this->form->getName())) {
      $parameters = $request->getParameter($this->form->getName());

      $this->form->bind($parameters);

      if ($this->form->isValid()) {
        $mdApartamento = $this->form->save();
        //var_dump($parameters);die;
        
        $nombre = $parameters['es']['titulo']; //$mdApartamento->getTitle();
        $lugar = $mdApartamento->getMdLocacion()->getNombre();
        $email = $mdApartamento->getMdUser()->getEmail();
        
        rentMailHandler::sendNewPropertySubmitedMail($email, $nombre, $lugar);
        if ($mdApartamento->getTipo() == 'fullservice')
          $this->redirect('fullService', $mdApartamento);
        else {
          $this->redirect('apartamento_edit', $mdApartamento);
        }
      }
    } else {
      $mdApartamento = new mdApartamento();
      $mdApartamento->setTipo($this->type);
      if ($this->getUser()->isAuthenticated())
      {
        $mdApartamento->setMdUserId($this->getUser()->getMdUserId());
      }
      $mdApartamento->setmdCurrencyId(mdCurrencyHandler::getCurrent()->getId());
      $mdApartamento->setActivo(false);
      $this->form = new apartamentaPublicar($mdApartamento);
    }
  }

  public function executeFullService(sfWebRequest $request) {
    $this->depto = $this->getRoute()->getObject();
  }

  public function executeImages(sfWebRequest $request) {
    $id = $request->getParameter('id');
    $class = $request->getParameter('class');

    $mdObject = Doctrine::getTable($class)->find($id);
    $avatar = $mdObject->retrieveAvatar(array(mdWebOptions::WIDTH => 100, mdWebOptions::HEIGHT => 100, mdWebOptions::CODE => mdWebCodes::CROPRESIZE));
    $thumbs = '';
    $media = mdMediaManager::getInstance(mdMediaManager::IMAGES, $mdObject)->load(mdMedia::$default);
    foreach ($media->getItems() as $pic) {
      $thumbs .= '		                 <li><img src="' . $pic->getUrl(array(mdWebOptions::WIDTH => 40, mdWebOptions::HEIGHT => 40, mdWebOptions::CODE => mdWebCodes::CROPRESIZE)) . '" width="48" height="40" /></li>
';
    }
    return $this->renderText(mdBasicFunction::basic_json_response(true, array('avatar' => $avatar, 'content' => $thumbs)));
  }

}
