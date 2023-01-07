<?php
$page_title = 'Edit Item';
require $_SERVER['DOCUMENT_ROOT'].'/settings.php';
include $DOCROOT.'/templates/header.php';

// ## Updating table row
if( isset($_POST['submit_data']) ){

  // Get data from POST
  $id = $_POST['id'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  if ($_POST['category_id'] > 0){
    $category_id = $_POST['category_id'];
  } else {
    $category_id = "";
  }
  $price = $_POST['price'];
  $tag = $_POST['tag'];
  
  // Make query with POST data
  $update = "UPDATE items SET name = '$name', description = '$description', price = '$price', category_id = '$category_id', tag = '$tag' WHERE id = '$id'";
  
  // Executes query
  try {
  	$DB->query($update);
  }
  // Print error
  catch(PDOException $e) {
  	  print ("Add query exception: " . $e->getMessage());
  }

  // Print success message
  if( $DB->query($update) ){
    echo '<div class="notification is-success">Saved</div>';
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
  print ("Item query exception: " . $e->getMessage());
}

//## Category Query
$cat_id = $item_r['category_id'];
try {
  $cat_q = $DB->query("SELECT name FROM categories WHERE id=$cat_id");
  $cat_r = $cat_q->fetch(PDO::FETCH_ASSOC);
}
// Print errors
catch(PDOException $e) {
  print ("Category query exception " . $e->getMessage());
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

echo '<h1>'.$page_title.'</h1>';
?>

<!-- ## Form -->
<div class="columns">
  <div class="column">
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
  </div>

  <div class="column">&nbsp;<div>
</div>

<?php include $DOCROOT.'/templates/footer.php'; ?>
