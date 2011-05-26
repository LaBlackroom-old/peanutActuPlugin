<nav <?php if($sf_context->getModuleName() == 'adminActu'):
        echo 'class="selected"'; endif; ?>>
  <h3>
    <a href="#" class="nav-top-item" title="<?php echo __('Link to', null, 'peanutCorporate'); ?>">
      <?php echo __('Manage news', null, 'peanutActu'); ?>
    </a>
  </h3>

  <ul>
    <li>
      <a href="<?php echo url_for('@peanut_actu'); ?>" title="<?php echo __('Link to', null, 'peanutCorporate') ?>"><?php echo __('Show news', null, 'peanutActu'); ?></a>
    </li>
    <li>
      <a href="<?php echo url_for('@peanut_actu_new') ?>" title="<?php echo __('Link to', null, 'peanutCorporate') ?>"><?php echo __('Add entry', null, 'peanutActu');; ?></a>
    </li>
  </ul>
</nav>