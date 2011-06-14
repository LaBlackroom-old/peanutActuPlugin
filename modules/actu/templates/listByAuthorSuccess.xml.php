<rss version="2.0">
  <channel>
    <title>Last actualities for <?php echo $actus[0]['sfGuardUser']['username'] ?></title>
    <link><?php echo peanutConfig::get('url', 'http://www.example.com/') ?></link>
    <description>Our last actualities</description>
    <language><?php echo peanutConfig::get('meta_language', 'en_US') ?></language>
    <pubDate><?php echo $actus[0]['created_at'] ?></pubDate>
    <lastBuildDate><?php echo $actus[0]['created_at'] ?></lastBuildDate>
    <docs><?php echo url_for('actu_list', array('sf_format' => 'xml'), true) ?></docs>
    <generator>peanut</generator>
    <webMaster><?php echo sfConfig::get('app_site_adminMail', 'me@example.com') ?></webMaster>

    <?php foreach($actus as $actu): ?>

    <item>
      <title><?php echo htmlentities($actu['title']) ?></title>
      <link><?php echo url_for('actu_show', array('slug' => $actu['slug'], 'sf_format' => 'html')) ?></link>
      <description><![CDATA[<?php echo htmlspecialchars_decode($actu['content']) ?>]]></description>
      <pubdate><?php echo $actu['created_at'] ?></pubdate>
      <guid>item-<?php echo $actu['id'] ?></guid>
    </item>
    
    <?php endforeach; ?>
  </channel>
</rss>