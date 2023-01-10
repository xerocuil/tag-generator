<?php
$page_title = 'Edit Category';
$sidebar = 'default';
$mid = 'spacer';
require $_SERVER['DOCUMENT_ROOT'].'/config.php';
include $DOCROOT.'/templates/main_header.php';

// ## Updating table row
if( isset($_POST['submit_data']) ){

  // Get data from POST
  $id = $_POST['id'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  
  // Make query with POST data
  $update = "UPDATE categories SET name = '$name', description = '$description' WHERE id = '$id'";
  
  // Executes query
  try {
  	$DB->query($update);
  }
  // Print error
  catch(PDOException $e) {
      echo '<div class="notification is-danger is-light">Categories query exception: '.$e->getMessage().'</div>';
  }
  // Print success message
  if( $$e == "" ){
    echo '<div class="notification is-success is-light">Category saved.</div>';
  }
}

// ## Category query
$id = $_GET['id'];
try {
  $item_q = $DB->query("SELECT * FROM categories WHERE id = $id;");
  $item_r = $item_q->fetch(PDO::FETCH_ASSOC);
}
// Print errors
catch(PDOException $e) {
  echo '<div class="notification is-danger">'.$exception.' query exception: '.$e->getMessage().'</div>';
}
?>

<!-- ## Form -->
<h1><?php echo $page_title; ?></h1>
<form action="" method="post">
  <!-- ID -->
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  
  <!-- Name -->
	<div class="field">
	  <strong>Name:</strong><br>
	  <input class="input" type="text" name="name" value="<?php echo $item_r['name']; ?>">
	</div>

	<!-- Description -->
	<div class="field">
	  <strong>Description:</strong><br>
	  <input class="input" type="text" name="description" value="<?php echo $item_r['description']; ?>" rows="2">
	</div>

  <!-- Save -->
  <div class="field">
    <input class="button is-link is-small" name="submit_data" type="submit" value="Save">
    <a class="button is-danger is-small" href="/">Back</a>
  </div>
</form>

<?php include $DOCROOT.'/templates/main_footer.php'; ?>
