<?php
$page_title = 'Categories';
$sidebar = 'default';
require $_SERVER['DOCUMENT_ROOT'].'/settings.php';
include $DOCROOT.'/templates/header.php';
?>

<div class="columns">
  <div class="column">
    <h2>Categories</h2>

    <!-- Categories table header -->
    <table class="table">
      <tr>
        <th>Name</th>
      </tr>

      <!-- Categories query -->
      <?php
      try {
        $cats_q = $DB->query('SELECT * FROM categories;');
        $cats_r = $cats_q->fetchAll(PDO::FETCH_ASSOC);

        // Query loop
        foreach($cats_r as $r){
          if (isset($r['description'])){
            $desc = '&nbsp;&nbsp;<em>'.$r['description'].'</em>';
          }

          echo '
            <tr>
              <td><a href="/categories/view.php?id='.$r['id'].'">'.$r['name'].' '.$desc.'</a></td>
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
  </div>

  <div class="column">&nbsp;</div>

  <?php
  if (isset($sidebar)){
    echo '<div class="column is-one-fifth">';
    include $DOCROOT.'/templates/sidebar_'.$sidebar.'.php';
    echo '</div>';
  }
  ?> 
</div>

<?php include $DOCROOT.'/templates/footer.php'; ?>