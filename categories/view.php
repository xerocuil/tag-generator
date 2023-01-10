<?php
$sidebar = 'default';
require $_SERVER['DOCUMENT_ROOT'].'/config.php';
$id=$_GET['id'];

// Category query
try {
  $cat_q = $DB->query("SELECT * FROM categories WHERE id = $id;");
  $cat_r = $cat_q->fetch(PDO::FETCH_ASSOC);

  // Get $page_title from query.
  $page_title = $cat_r['name'];
}
// Print errors
catch(PDOException $e) {
  print ("exception " . $e->getMessage());
  echo '<div class="notification is-danger is-light">Category query exception: '.$e->getMessage().'</div>';
}

// Load page header
include $DOCROOT.'/templates/main_header.php';
echo '<h1>'.$page_title.'</h1>';

// Load list header
include $DOCROOT.'/templates/list_header.php';

// Category->Items query
try {
  $items_q = $DB->query("SELECT * FROM items WHERE category_id = $id;");
  $items_r = $items_q->fetchAll(PDO::FETCH_ASSOC);
}
// Print errors
catch(PDOException $e) {
  print ("exception " . $e->getMessage());
  echo '<div class="notification is-danger is-light">Items query exception: '.$e->getMessage().'</div>';
}

// Load list
include $DOCROOT.'/templates/list.php';

// Load list footer
include $DOCROOT.'/templates/list_footer.php';

// Load page footer
include $DOCROOT.'/templates/main_footer.php';
?>