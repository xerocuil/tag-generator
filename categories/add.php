<?php
$page_title = 'Add Category';
$sidebar = 'default';
require $_SERVER['DOCUMENT_ROOT'].'/settings.php';
include $DOCROOT.'/templates/header.php';

// ## Updating table row
if( isset($_POST['submit_data']) ){
  // Get data from POST
  $name = $_POST['name'];
  $description = $_POST['description'];
  
  // Insert POST data
  $insert = "INSERT INTO categories (name, description) VALUES ('$name', '$description')";
  
  // Executes query
  try {
    $DB->query($insert);
  }
  // Catch error
  catch(PDOException $e){
    echo '<div class="notification is-danger is-light">Add Category query exception: '.$e->getMessage().'</div>';
  }
  // Print success message
  if( $$e == "" ){
    echo '<div class="notification is-success is-light">'.$name.' Added</div>';
  }
}


?>

<!-- ## Form -->
<div class="columns">
  <div class="column">
    <?php echo '<h1>'.$page_title.'</h1>'; ?>
    <form action="" method="post">

      <!-- Name -->
      <div class="field">
        <strong>Name:</strong><br>
        <input class="input" type="text" name="name" value="">
      </div>

      <!-- Description -->
      <div class="field">
        <strong>Description:</strong><br>
        <input class="input" type="text" name="description" value="" rows="2">
      </div>

      <!-- Save -->
      <div class="field">
        <input class="button is-link is-small" name="submit_data" type="submit" value="Save">
        <a class="button is-danger is-small" href="/">Back</a>
      </div>
    </form>
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
