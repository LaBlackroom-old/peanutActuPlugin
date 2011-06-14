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
    $items = $this->_processing($request, $actus);
    $this->actus = $items;
    
    if('html' === $request->getRequestFormat())
    {
      $nbActus = peanutConfig::get('actu_per_page');
      $numPage = $request->getParameter('page', 1);

      $this->pager = new sfDoctrinePager('peanutActu', $nbActus);
      $this->pager->setQuery($actus);
      $this->pager->setPage($numPage);
      $this->pager->init();
    }
  }

  public function executeListByAuthor(sfWebRequest $request)
  {
    $actus = Doctrine_Core::getTable('peanutActu')->getActusByAuthor($request->getParameter('author'));
    $items = $this->_processing($request, $actus);
    $this->actus = $items;
    
    if('html' === $request->getRequestFormat())
    {
      $nbActus = peanutConfig::get('actu_per_page');
      $numPage = $request->getParameter('page', 1);

      $this->pager = new sfDoctrinePager('peanutActu', $nbActus);
      $this->pager->setQuery($actus);
      $this->pager->setPage($numPage);
      $this->pager->init();
    }
  }
  
  protected function _processing($request, $object)
  {
    $format = $request->getRequestFormat();
    
    if('json' === $format)
    {   
      $items = $object->execute();
        
      $fetch = array();
      $i = 0;
      foreach($items as $item)
      {
        $fetch[$i++] = $item->asArray();
      }

      $items = $fetch;
    }
    else
    {
      $items = $object->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
    }
    
    return $items;
  }

}
