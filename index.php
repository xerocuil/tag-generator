<?php
$page_title = 'Home';
$sidebar = 'default';
require $_SERVER['DOCUMENT_ROOT'].'/settings.php';
include $DOCROOT.'/templates/main_header.php';
?>


<h2>Recently Added</h2>
<?php
// Items list header
include $DOCROOT.'/templates/list_header.php';

// Items (added) query
try {
  $items_q = $DB->query("SELECT * FROM items ORDER BY added DESC LIMIT 5");
  $items_r = $items_q->fetchAll(PDO::FETCH_ASSOC);

  // Items list
  include $DOCROOT.'/templates/list.php';
}
// Print errors
catch(PDOException $e) {
  echo '<div class="notification is-danger is-light">Recently Added query exception: '.$e->getMessage().'</div>';
}

include $DOCROOT.'/templates/list_footer.php';
?>

<h2>Recently Updated</h2>
<?php
// Items (updated) list header
include $DOCROOT.'/templates/list_header.php';

// Items query
try {
  $items_q = $DB->query("SELECT * FROM items ORDER BY updated DESC LIMIT 5");
  $items_r = $items_q->fetchAll(PDO::FETCH_ASSOC);

  // Items list
  include $DOCROOT.'/templates/list.php';
}
// Print errors
catch(PDOException $e) {
  echo '<div class="notification is-danger is-light">Recently Updated query exception: '.$e->getMessage().'</div>';
}

include $DOCROOT.'/templates/list_footer.php';

include $DOCROOT.'/templates/main_footer.php';
?>