<?php

/**
 * actuSettings form.
 *
 * @package    peanut2
 * @subpackage form
 * @author     Alexandre 'pocky' Balmes
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class actuSettingsForm extends peanutSettingsForm
{
  public function configure()
  { 
    $this->widgetSchema['actu_max_last'] = new sfWidgetFormHtml5InputText();
    $this->widgetSchema['actu_max_last']->setDefault(peanutConfig::get('actu_max_last'));
    $this->widgetSchema['actu_max_last']->setLabel('Max last items');
    
    $this->widgetSchema['actu_per_page'] = new sfWidgetFormHtml5InputText();
    $this->widgetSchema['actu_per_page']->setDefault(peanutConfig::get('actu_per_page'));
    $this->widgetSchema['actu_per_page']->setLabel('Max actu per page');
  }
}
