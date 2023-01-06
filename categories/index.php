<?php
$page_title = 'Categories';
require $_SERVER['DOCUMENT_ROOT'].'/settings.php';
include $DOCROOT.'/templates/header.php';

echo '
<h1>'.$page_title.'</h1>';

// Categories table header
echo '
  <table class="table">
    <tr>
      <th>Name</td>
      <th>Description</td>
    </tr>';

// Categories query
try {
  $cats_q = $DB->query('SELECT * FROM categories;');
  $cats_r = $cats_q->fetchAll(PDO::FETCH_ASSOC);

  // Query loop
  foreach($cats_r as $r){
    echo '
      <tr>
        <td><a href="/categories/view.php?id='.$r['id'].'">'.$r['name'].'</a></td>
        <td>'.$r['description'].'</td>
      </tr>';
  }
}

// Print errors
catch(PDOException $e) {
  print ("exception " . $e->getMessage());
}

echo '
  </table><hr>';

include $DOCROOT.'/templates/footer.php';
?>