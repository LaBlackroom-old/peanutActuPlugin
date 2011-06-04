<?php

require_once dirname(__FILE__).'/../lib/adminActuGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/adminActuGeneratorHelper.class.php';

/**
 * adminActu actions.
 *
 * @package    peanut2
 * @subpackage adminActu
 * @author     AlexandrepockyBalmes
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adminActuActions extends autoAdminActuActions
{
  protected function addSortQuery($query)
  {
    $query->addOrderBy('updated_at desc');
  }
  
  public function executeChangestatus()
  {
    $object = Doctrine_Core::getTable('peanutActu')->findOneById($this->getRequestParameter('id'));
    $object->changeStatus();
    
    $this->getUser()->setFlash('notice', 'Status was modified successfully');
    $this->redirect('@peanut_actu');
  }
  
  public function executeBatchStatus()
  {
    $ids = $this->getRequestParameter('ids');
    
    $q = Doctrine_Core::getTable('peanutActu')->getItem();
    $q->whereIn('p.id', $ids);
    
    foreach($q->execute() as $item)
    {
      $item->changeStatus();
    }
    
    $this->getUser()->setFlash('notice', 'Status was modified successfully');
    $this->redirect('@peanut_actu');
  }
}
