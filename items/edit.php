<?php
$page_title = 'Edit Item';
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
  $category_id = $_POST['category_id'];
  $price = $_POST['price'];
  $tag = $_POST['tag'];
  $updated = $_POST['updated'];
  
  // Make query with POST data
  $update = "UPDATE items SET name = '$name', description = '$description', price = '$price', category_id = '$category_id', tag = '$tag', updated = '$updated' WHERE id = '$id'";
  
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
    echo '<div class="notification is-success is-light">Saved</div>';
  }
}

// ## Item query
$id = $_GET['id'];
try {
  $item_q = $DB->query("SELECT * FROM items WHERE id = $id;");
  $item_r = $item_q->fetch(PDO::FETCH_ASSOC);
}
// Print errors
catch(PDOException $e) {
  echo '<div class="notification is-danger">'.$exception.' query exception: '.$e->getMessage().'</div>';
}

//## Category Query
$cat_id = $item_r['category_id'];
try {
  $cat_q = $DB->query("SELECT name FROM categories WHERE id=$cat_id");
  $cat_r = $cat_q->fetch(PDO::FETCH_ASSOC);
}
// Print errors
catch(PDOException $e) {
  $error_message = $e->getMessage();
}

// ## Categories query
try {
  $cats_q = $DB->query("SELECT * FROM categories WHERE id != $cat_id ORDER BY name ASC");
  $cats_r = $cats_q->fetchAll(PDO::FETCH_ASSOC);
}
// Print errors
catch(PDOException $e) {
  print ("Categories query exception " . $e->getMessage());
}


?>

<!-- ## Form -->
<h1><?php echo $page_title; ?></h1>
<form action="" method="post">
  <!-- ID -->
  <input type="hidden" name="id" value="<?php echo $id; ?>">

  <!-- Date updated -->
  <input type="hidden" name="updated" value="<?php echo date("Y-m-d G:i:s") ?>">
  
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

	<!-- Category -->
	<div class="field">
	  <strong>Category:</strong><br>
	  <div class="select">
	    <select name="category_id">
	      <option value="<?php echo $item_r['category_id']; ?>" selected><?php echo $cat_r['name']; ?></option>
	      <?php
	      foreach($cats_r as $c){
	        echo '<option value="'.$c['id'].'">'.$c['name'].'</option>';
	      }
	      ?>
	    </select>
	  </div>
	</div>

	<!-- Price -->
	<div class="field" style="width: 72px">
	  <strong>Price:</strong><br>
	  <input class="input" type="text" name="price" value="<?php echo $item_r['price']; ?>" size="4">
	</div>

	<!-- Print batch -->
	<div class="field">
	  <span>Add to print batch? &nbsp;</span>
	  <input type="checkbox" name="tag" value="1" <?php if ($item_r['tag'] == 1){ echo 'checked';} ?>>
	</div>

  <!-- Save -->
  <div class="field">
    <input class="button is-link is-small" name="submit_data" type="submit" value="Save">
    <a class="button is-danger is-small" href="/">Back</a>
  </div>
</form>

<?php include $DOCROOT.'/templates/main_footer.php'; ?>
