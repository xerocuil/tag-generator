<?php
$page_title = 'Home';
$sidebar = 'default';
require $_SERVER['DOCUMENT_ROOT'].'/settings.php';
include $DOCROOT.'/templates/header.php';
?>

<div class="columns">
  <div class="column">
    <h2>Items</h2>
    
    <?php
    // Items list header
    include $DOCROOT.'/templates/list_header.php';

    // Items query
    try {
      $items_q = $DB->query("SELECT * FROM items ORDER BY name ASC");
      $items_r = $items_q->fetchAll(PDO::FETCH_ASSOC);

      // Items list
      include $DOCROOT.'/templates/list.php';
    }
    // Print errors
    catch(PDOException $e) {
      echo '<div class="notification is-danger is-light">Items query exception: '.$e->getMessage().'</div>';
    }

    include $DOCROOT.'/templates/list_footer.php';
    ?>
  </div>

  <?php
  if (isset($sidebar)){
    echo '<div class="column is-one-fifth">';
    include $DOCROOT.'/templates/sidebar_'.$sidebar.'.php';
    echo '</div>';
  }
  ?> 
</div>

<?php include $DOCROOT.'/templates/footer.php'; ?>