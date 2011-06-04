<?php use_helper('Text') ?>

<section>

  <h1><?php echo __('Last actualities', null, 'peanutActu') ?></h1>
  
  <?php foreach($actus as $actu): ?>

  <article id="actu-<?php echo $actu['id'] ?>">

    <header>
      <h1>
        <a
          href="<?php echo url_for('actu_show', array('slug' => $actu['slug'], 'sf_format' => 'html')) ?>"
          rel=""
        >
          <?php echo htmlentities($actu['title']) ?>
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
  
</section>