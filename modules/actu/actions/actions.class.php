<?php

/**
 * items actions.
 *
 * @package    peanutActuPlugin
 * @subpackage actu
 * @author     Alexandre "pocky" Balmes <albalmes@gmail.com>
 */
class actuActions extends sfActions
{
  public function executeShow(sfWebRequest $request)
  {
    $actu = Doctrine_Core::getTable('peanutActu')->showActu($request->getParameter('slug'));
    $this->actu = $actu->fetchOne();
    
    $this->forward404Unless($this->actu);
  }

  public function executeList(sfWebRequest $request)
  {
    $actus = Doctrine_Core::getTable('peanutActu')->getActus();
    $this->actus = $actus->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
    
    $nbActus = peanutConfig::get('actu_per_page');
    $numPage = $request->getParameter('page', 1);
    
    $this->pager = new sfDoctrinePager('peanutActu', $nbActus);
    $this->pager->setQuery($actus);
    $this->pager->setPage($numPage);
    $this->pager->init();
  }

  public function executeListByAuthor(sfWebRequest $request)
  {
    $actus = Doctrine_Core::getTable('peanutActu')->getActusByAuthor($request->getParameter('author'));
    $this->actus = $actus->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
    
    $nbActus = peanutConfig::get('actu_per_page');
    $numPage = $request->getParameter('page', 1);
    
    $this->pager = new sfDoctrinePager('peanutActu', $nbActus);
    $this->pager->setQuery($actus);
    $this->pager->setPage($numPage);
    $this->pager->init();
  }

}
