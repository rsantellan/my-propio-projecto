<?php

require_once dirname(__FILE__).'/../lib/temporadasGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/temporadasGeneratorHelper.class.php';

/**
 * temporadas actions.
 *
 * @package    rentNchill
 * @subpackage temporadas
 * @author     maui
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class temporadasActions extends autoTemporadasActions
{
	
	public function executeCreateAjax(sfWebRequest $request)
  {    
    $form = new mdLocacionTemporadaForm(array(), array(), false);
    //$form = new mdLocacionTemporadaForm();
    
    $parameters = $request->getParameter('md_locacion_temporada');
	//var_dump($parameters);
    $form->bind($parameters);
    //return $this->renderText(mdBasicFunction::basic_json_response(false, ""));
    if ($form->isValid())
    {
      try {
        
        $md_temporada = $form->save();
        
        $this->configuration = new temporadasGeneratorConfiguration();

        $this->mdLocacionId = $parameters['md_locacion_id'];
          
        $helper = new temporadasGeneratorHelper();

        $pager = $this->getMyPager();

        $sort = $this->getSort();        
        
        TemporadasDatesHandler::generateSeasons($this->mdLocacionId);
        
        return $this->renderText(mdBasicFunction::basic_json_response(true, array('table' => $this->getPartial('temporadas/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)))));
              
      } catch (Doctrine_Validator_Exception $e) {
        
        return $this->renderText(mdBasicFunction::basic_json_response(false, array('error'=>$e->getMessage())));
        
      }
    }
    $errores = $form->getFormattedErrors();
    $html = "";
    foreach($errores as $error)
    {
      $html .= $error;
    }
    return $this->renderText(mdBasicFunction::basic_json_response(false, $html));
  }
  
  public function executeDeleteAjax(sfWebRequest $request)
  {    
    $id = $request->getParameter('id');
    $md_temporada = Doctrine::getTable('mdLocacionTemporada')->find($id);    
    $md_temporada->delete();
    
    return $this->renderText(mdBasicFunction::basic_json_response(true, array()));
  }  
  
  protected function getMyPager()
  {
    $pager = new sfDoctrinePager( 'mdLocacionTemporada', 1000 );
    $pager->setQuery(Doctrine::getTable ( 'mdLocacionTemporada' )->createQuery('d')->addWhere('d.md_locacion_id = ?', $this->mdLocacionId)->orderBy('d.date_from desc'));
    $pager->setPage(1);
    $pager->init();

    return $pager;
  }
}
