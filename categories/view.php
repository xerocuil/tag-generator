<?php
require $_SERVER['DOCUMENT_ROOT'].'/settings.php';
include $DOCROOT.'/templates/header.php';
$id=$_GET['id'];

// Category query
try {
  $cat_q = $DB->query("SELECT * FROM categories WHERE id = $id;");
  $cat_r = $cat_q->fetch(PDO::FETCH_ASSOC);

  // Get $page_title from query.
  $page_title = $cat_r['name'];

  echo '<h1>'.$page_title.'</h1>';
}

// Print errors
catch(PDOException $e) {
  print ("exception " . $e->getMessage());
}

// Category list header
include $DOCROOT.'/templates/list_header.php';

// Category->Items query
try {
  $items_q = $DB->query("SELECT * FROM items WHERE category_id = $id;");
  $items_r = $items_q->fetchAll(PDO::FETCH_ASSOC);

  include $DOCROOT.'/templates/list.php';
}

// Print errors
catch(PDOException $e) {
  print ("exception " . $e->getMessage());
}

include $DOCROOT.'/templates/list_footer.php';

include $DOCROOT.'/templates/footer.php';
?>