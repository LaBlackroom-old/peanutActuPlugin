<?php seo('title', $actu) ?>
<?php seo('description', $actu) ?>
<?php seo('keywords', $actu) ?>
<?php seo('index', $actu) ?>

<article id="actu-<?php echo $actu['id'] ?>">

  <header>
    <h1><?php echo htmlspecialchars_decode($actu['title']) ?></h1>
  </header>

  <section>
    <?php echo htmlspecialchars_decode($actu['content']) ?>
  </section>

  <footer>
    <?php include_partial('author', array('author' => $actu['sfGuardUser'])) ?>
    <?php include_partial('date', array('created' => $actu['created_at'], 'updated' => $actu['updated_at'])) ?>
  </footer>
  
</article>