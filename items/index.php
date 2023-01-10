<?php
$page_title = 'Home';
$sidebar = 'default';
require $_SERVER['DOCUMENT_ROOT'].'/config.php';
include $DOCROOT.'/templates/main_header.php';
?>

<h1>Items</h1>

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

<?php include $DOCROOT.'/templates/main_footer.php'; ?>