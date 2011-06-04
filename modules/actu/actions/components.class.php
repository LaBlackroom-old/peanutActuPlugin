<?php

/**
 * actus components.
 *
 * @package    peanutActuPlugin
 * @subpackage actu
 * @author     Alexandre "pocky" Balmes <albalmes@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class actuComponents extends sfComponents
{
  public function executeLast(sfWebRequest $request)
  {
    $actus = Doctrine_Core::getTable('peanutActu')->getLastActus(peanutConfig::get('actu_max_last'));
    $this->actus = $actus->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
  }

}
