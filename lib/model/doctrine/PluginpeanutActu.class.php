<?php

/**
 * PluginpeanutActu
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    peanutActu
 * @subpackage model
 * @author     Alexandre 'pocky' Balmes <albalmes@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class PluginpeanutActu extends BasepeanutActu
{
  public function changeStatus()
  {
    if('draft' == $this->getStatus())
    {
      $this->setStatus('publish');
    }
    elseif('publish' == $this->getStatus())
    {
      $this->setStatus('draft');
    }
    
    $this->save();
  }
  
  public function asArray()
  {
    return array(
        'id'          => $this->getId(),
        'slug'        => $this->getSlug(),
        'title'       => $this->getTitle(),
        'excerpt'     => $this->getExcerpt(),
        'content'     => $this->getContent(),
        'author'      => $this->getSfGuardUser()->getName(),
        'created_at'  => $this->getCreatedAt(),
        'updated_at'  => $this->getUpdatedAt()
    );
  }
}