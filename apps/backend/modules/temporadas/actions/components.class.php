<?php

require_once dirname(__FILE__).'/../lib/temporadasGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/temporadasGeneratorHelper.class.php';

class temporadasComponents extends sfComponents
{
  public function executeTemporada($request)
  {
    $this->mdLocacion = $this->md_locacion;
    
    $this->configuration = new temporadasGeneratorConfiguration();
    
    $this->helper = new temporadasGeneratorHelper();
    
    $this->pager = $this->getPager();
    
    $this->sort = $this->getSort();
  }

  protected function getPager()
  {
    $pager = new sfDoctrinePager( 'mdLocacionTemporada', 1000 );
    $pager->setQuery($this->buildQuery());
    $pager->setPage(1);
    $pager->init();

    return $pager;
  }
  
  protected function buildQuery()
  {
    $query = Doctrine::getTable ( 'mdLocacionTemporada' )->createQuery('d')
           ->addWhere('d.md_locacion_id = ?', $this->mdLocacion->getId())
					 ->orderBy('d.mes_desde desc, d.dia_desde desc');

    return $query;
  }
  
  protected function getSort()
  {
    if (null !== $sort = $this->getUser()->getAttribute('temporadas.sort', null, 'admin_module'))
    {
      return $sort;
    }

    $this->setSort($this->configuration->getDefaultSort());

    return $this->getUser()->getAttribute('temporadas.sort', null, 'admin_module');
  }

  protected function setSort(array $sort)
  {
    if (null !== $sort[0] && null === $sort[1])
    {
      $sort[1] = 'asc';
    }

    $this->getUser()->setAttribute('temporadas.sort', $sort, 'admin_module');
  }  
}
