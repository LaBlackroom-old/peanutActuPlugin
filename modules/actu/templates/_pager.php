<?php if($pager->haveToPaginate()): ?>
<section>
  
  <?php if($pager->getFirstPage() != $pager->getPage()): ?>
    
    <a href="<?php echo url_for($route, $params->getRawValue()) ?>?page=<?php echo $pager->getFirstPage() ?>">
      <?php echo __('First page', null, 'peanutActu') ?>
    </a>&nbsp;
    
    <a href="<?php echo url_for($route, $params->getRawValue()) ?>?page=<?php echo $pager->getPreviousPage() ?>">
      <?php echo __('Previous page', null, 'peanutActu') ?>
    </a>&nbsp;
  
  <?php endif; ?>
  
  <?php foreach ($pager->getLinks() as $page): ?>
    <?php if ($page == $pager->getPage()): ?>
      <?php echo $page ?>
    <?php else: ?>
      <a href="<?php echo url_for($route, $params->getRawValue()) ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
    <?php endif; ?>
  <?php endforeach; ?>
  
  <?php if($pager->getLastPage() != $pager->getPage()): ?>
    &nbsp;
    <a href="<?php echo url_for($route, $params->getRawValue()) ?>?page=<?php echo $pager->getNextPage() ?>">
      <?php echo __('Next page', null, 'peanutActu') ?>
    </a>
    
    &nbsp;
    <a href="<?php echo url_for($route, $params->getRawValue()) ?>?page=<?php echo $pager->getLastPage() ?>">
      <?php echo __('Last page', null, 'peanutActu') ?>
    </a>
  <?php endif; ?>
      
</section>
<?php endif; ?>
