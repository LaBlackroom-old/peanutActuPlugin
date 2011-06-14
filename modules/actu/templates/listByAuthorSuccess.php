<?php use_helper('Text') ?>

<section>

  <h1><?php echo __('Last actualities for', null, 'peanutActu') . ' ' . $actus[0]['sfGuardUser']['username'] ?></h1>
  
  <?php if(!count($pager->getResults())): ?>
  
  <p><?php echo __('There is no entries for your request!', null, 'peanutActu') ?></p>
  
  <?php else: ?>
  <?php foreach($pager->getResults() as $actu): ?>

  <article id="actu-<?php echo $actu['id'] ?>">

    <header>
      <h1>
        <a
          href="<?php echo url_for('actu_show', array('slug' => $actu['slug'], 'sf_format' => 'html')) ?>"
          rel=""
        >
          <?php echo htmlspecialchars_decode($actu['title']) ?>
        </a>
      </h1>
    </header>

    <section>
      <?php
        if($actu['excerpt']):
          echo htmlspecialchars_decode($actu['excerpt']);
        else:
          echo truncate_text(htmlspecialchars_decode($actu['content']), 340);
        endif;
      ?>
    </section>

    <footer>
      <?php include_partial('author', array('author' => $actu['sfGuardUser'])) ?>
      <?php include_partial('date', array('created' => $actu['created_at'], 'updated' => $actu['updated_at'])) ?>
    </footer>

  </article>

  <?php endforeach; ?>
  <?php endif; ?>
</section>

<?php include_partial('pager', array('pager' => $pager, 'route' => 'actu_author',
    'params' => array('author' => $actu['sfGuardUser']['username'], 'sf_format' => 'html')
)) ?>