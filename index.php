<?php
$page_title = 'Home';
require $_SERVER['DOCUMENT_ROOT'].'/settings.php';
include $DOCROOT.'/templates/header.php';

// Items table header
echo '
<h2>Items</h2>';

// Items list header
include $DOCROOT.'/templates/list_header.php';

// Items query
try {
  $items_q = $DB->query("SELECT * FROM items LIMIT 10;");
  $items_r = $items_q->fetchAll(PDO::FETCH_ASSOC);

  // Items list
  include $DOCROOT.'/templates/list.php';
}

// Print errors
catch(PDOException $e) {
  print ("exception " . $e->getMessage());
}

include $DOCROOT.'/templates/list_footer.php';

include $DOCROOT.'/templates/footer.php';
?>