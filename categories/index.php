<?php
$page_title = 'Categories';
$sidebar = 'default';
require $_SERVER['DOCUMENT_ROOT'].'/config.php';
include $DOCROOT.'/templates/main_header.php';
?>

<h2>Categories</h2>

<!-- Categories table header -->
<table class="table">

  <!-- Categories query -->
  <?php
  try {
    $cats_q = $DB->query('SELECT * FROM categories WHERE id != 0 ORDER BY name ASC;');
    $cats_r = $cats_q->fetchAll(PDO::FETCH_ASSOC);

    // Query loop
    foreach($cats_r as $r){
      if (isset($r['description'])){
        $desc = '&nbsp;&nbsp;<em>'.$r['description'].'</em>';
      }

      echo '
        <tr>
          <td><a href="/categories/view.php?id='.$r['id'].'">'.$r['name'].' '.$desc.'</a></td>
          <td class="has-text-right"><a href="/categories/edit.php?id='.$r['id'].'">Edit</a></td>
        </tr>';
    }
  }
  // Print errors
  catch(PDOException $e) {
    print ("exception " . $e->getMessage());
    echo '<div class="notification is-danger is-light">Categories query exception: '.$e->getMessage().'</div>';
  }
  ?>
</table>

<?php include $DOCROOT.'/templates/main_footer.php'; ?>