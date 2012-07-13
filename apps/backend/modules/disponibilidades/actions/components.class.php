<?php

require_once dirname(__FILE__).'/../lib/disponibilidadesGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/disponibilidadesGeneratorHelper.class.php';

class disponibilidadesComponents extends sfComponents
{
  public function executeDisponibilidad($request)
  {
    $this->mdApartamento = $this->md_apartamento;
    
    $this->configuration = new disponibilidadesGeneratorConfiguration();
    
    $this->helper = new disponibilidadesGeneratorHelper();
    
    $this->pager = $this->getPager();
    
    $this->sort = $this->getSort();
  }

  protected function getPager()
  {
    $pager = new sfDoctrinePager( 'mdDisponibilidad', 1000 );
    $pager->setQuery($this->buildQuery());
    $pager->setPage(1);
    $pager->init();

    return $pager;
  }
  
  protected function buildQuery()
  {
    $query = Doctrine::getTable ( 'mdDisponibilidad' )->createQuery('d')
           ->addWhere('d.md_apartamento_id = ?', $this->mdApartamento->getId())
					 ->orderBy('d.fecha_desde desc, d.fecha_hasta desc');

    return $query;
  }
  
  protected function getSort()
  {
    if (null !== $sort = $this->getUser()->getAttribute('disponibilidades.sort', null, 'admin_module'))
    {
      return $sort;
    }

    $this->setSort($this->configuration->getDefaultSort());

    return $this->getUser()->getAttribute('disponibilidades.sort', null, 'admin_module');
  }

  protected function setSort(array $sort)
  {
    if (null !== $sort[0] && null === $sort[1])
    {
      $sort[1] = 'asc';
    }

    $this->getUser()->setAttribute('disponibilidades.sort', $sort, 'admin_module');
  }  
}
