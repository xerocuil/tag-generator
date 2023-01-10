<?php
$page_title = 'Home';
$sidebar = 'default';
require $_SERVER['DOCUMENT_ROOT'].'/config.php';
include $DOCROOT.'/templates/main_header.php';

// Check for Items table:
// - Redirect to Settings if missing
if (check_table("items") == "0"){
  echo 'No Tables found.';
  header("Location: /settings/");
  exit();
}

// Check for rows in Items table:
// - Load page if present
// - Redirect to Settings if missing
if (check_empty() == "0"){
  echo 'No Tables found.';
  header("Location: /settings/");
} else {
  load_recent("added");
  load_recent("updated");
}

function load_recent($name){
  global $DB, $DOCROOT;
  echo '<h2>Recently '.ucwords($name).'</h2>';
  // Items list header
  include $DOCROOT.'/templates/list_header.php';

  // Item query
  try {
    $items_q = $DB->query("SELECT * FROM items ORDER BY ".$name." DESC LIMIT 5");
    $items_r = $items_q->fetchAll(PDO::FETCH_ASSOC);

    // Items list
    include $DOCROOT.'/templates/list.php';
  }
  // Print errors
  catch(PDOException $e) {
    echo '<div class="notification is-danger is-light">Recently '.ucwords($name).' query exception: '.$e->getMessage().'</div>';
  }

  include $DOCROOT.'/templates/list_footer.php';
}

include $DOCROOT.'/templates/main_footer.php';
?>