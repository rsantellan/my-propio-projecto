<?php

require_once dirname(__FILE__).'/../lib/disponibilidadesGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/disponibilidadesGeneratorHelper.class.php';

/**
 * disponibilidades actions.
 *
 * @package    rentNchill
 * @subpackage disponibilidades
 * @author     maui
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class disponibilidadesActions extends autoDisponibilidadesActions
{
  public function executeCreateAjax(sfWebRequest $request)
  {    
    $form = new mdDisponibilidadForm(array(), array(), false);
    
    $parameters = $request->getParameter('md_disponibilidad');

    $form->bind($parameters);
    
    if ($form->isValid())
    {
      try {
        
        $md_disponibilidad = $form->save();
        
        $this->configuration = new disponibilidadesGeneratorConfiguration();

        $this->mdApartamentoId = $parameters['md_apartamento_id'];
          
        $helper = new disponibilidadesGeneratorHelper();

        $pager = $this->getMyPager();

        $sort = $this->getSort();        
        
        return $this->renderText(mdBasicFunction::basic_json_response(true, array('table' => $this->getPartial('disponibilidades/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)))));
              
      } catch (Doctrine_Validator_Exception $e) {
        
        return $this->renderText(mdBasicFunction::basic_json_response(false, array()));
        
      }
    }
    return $this->renderText(mdBasicFunction::basic_json_response(false, array()));
  }
  
  public function executeDeleteAjax(sfWebRequest $request)
  {    
    $id = $request->getParameter('id');
    $md_disponibilidad = Doctrine::getTable('mdDisponibilidad')->find($id);    
    $md_disponibilidad->delete();
    
    return $this->renderText(mdBasicFunction::basic_json_response(true, array()));
  }  
  
  protected function getMyPager()
  {
    $pager = new sfDoctrinePager( 'mdDisponibilidad', 1000 );
    $pager->setQuery(Doctrine::getTable ( 'mdDisponibilidad' )->createQuery('d')->addWhere('d.md_apartamento_id = ?', $this->mdApartamentoId)->orderBy('d.fecha_desde desc, d.fecha_hasta desc'));
    $pager->setPage(1);
    $pager->init();

    return $pager;
  }
 
}
