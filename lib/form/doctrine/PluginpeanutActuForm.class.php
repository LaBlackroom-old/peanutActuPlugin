<?php

/**
 * PluginpeanutActu form.
 *
 * @package    peanutActu
 * @subpackage form
 * @author     Alexandre 'pocky' Balmes <albalmes@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginpeanutActuForm extends BasepeanutActuForm
{
  public function setup()
  {
    parent::setup();
    $user = self::getValidUser();
    
    $this->useFields(array(
      'title',
      'slug',
      'content',
      'excerpt',
      'status',
      'author',
      'created_at'
    ));
    
    $this->widgetSchema['title'] = new sfWidgetFormHtml5InputText($options = array(), $attributes = array(
        'required'    => true,
        'placeholder' => 'My Title'
    ));
    
    $this->widgetSchema['slug'] = new sfWidgetFormHtml5InputText($options = array(), $attributes = array(
        'placeholder' => 'my-title'
    ));
    
    $this->widgetSchema['content'] = new sfWidgetFormCKEditor(array('jsoptions'=>array(
    	'customConfig'				      => '/lib/ckeditor/config.js',
    	'filebrowserBrowseUrl'            => '/lib/elfinder-1.1/elfinder.php.html',
    	'filebrowserImageBrowseUrl'       => '/lib/elfinder-1.1/elfinder.php.html'
    )));
    
    $this->widgetSchema['excerpt'] = new sfWidgetFormTextarea($options = array(), $attributes = array(
        'placeholder' => 'Excerpt or aside for my content'
    ));
    
    if(!$this->isNew()) {
      $this->widgetSchema['created_at'] = new sfWidgetFormI18nDate(array(
        'culture' => $user->getCulture(),
      ));
    }
    else
    {
      unset($this['created_at']);
    }
    
    $this->validatorSchema['content'] = new sfValidatorString($options = array(
      'required'  => true
    ),$messages = array(
      'required'  => 'Fill this please'
    ));
    
    $this->widgetSchema->setHelps(array(
      'title'         => 'The item title (required)',
      'slug'          => 'Not required but maybe usefull for your SEO',
      'content'       => 'The item content (required)',
      'excerpt'       => 'The item excerpt (not required)',
      'status'        => 'If you want to hide this entry for visitors',
      'created_at'    => 'Useful is you want to modify the date of the entry publication'
    ));
    
    $this->embedRelation('peanutSeo');
    $this->widgetSchema['peanutSeo']->setLabel('SEO');
    
     $this->widgetSchema['author'] = new sfWidgetFormChoice(array(
        'choices' => $this->_getUsers()
    ));
        
    
  }
  
  protected function _getUsers()
  {
    $users = array();
    $choices = Doctrine::getTable('sfGuardUser')->getUsersWhereGroupIs('2')->execute();
    
    foreach($choices as $user)
    {
      $users[$user->getId()] = $user->getName();
    }
    
    return $users;
  }
}
