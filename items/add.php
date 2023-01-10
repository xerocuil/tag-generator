<?php
$page_title = 'Add Item';
$sidebar = 'default';
$mid = 'spacer';
require $_SERVER['DOCUMENT_ROOT'].'/config.php';
include $DOCROOT.'/templates/main_header.php';

// ## Updating table row
if( isset($_POST['submit_data']) ){
  // Get data from POST
  $name = $_POST['name'];
  $description = $_POST['description'];
  $category_id = $_POST['category_id'];
  $price = $_POST['price'];
  $tag = $_POST['tag'];
  $added = $_POST['added'];
  
  // Insert POST data
  $insert = "INSERT INTO items (name, description, price, category_id, tag, added) VALUES ('$name', '$description', '$price', '$category_id', '$tag', '$added')";
  
  // Executes query
  try {
    $DB->query($insert);
  }
  // Catch error
  catch(PDOException $e){
    echo '<div class="notification is-danger is-light">Add Item query exception: '.$e->getMessage().'</div>';
  }
  // Print success message
  if( $$e == "" ){
    echo '<div class="notification is-success is-light">Item Added</div>';
  }
}
?>

<!-- ## Form -->
<h1><?php echo $page_title ?></h1>
<form action="" method="post">

  <!-- Date added -->
  <input type="hidden" name="added" value="<?php echo date("Y-m-d G:i:s")  ?>">
  
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

  <!-- Category -->

  <?php
  // ## Categories query
  try {
    $cats_q = $DB->query("SELECT * FROM categories WHERE id !=0 ORDER BY name ASC;");
    $cats_r = $cats_q->fetchAll(PDO::FETCH_ASSOC);
  }
  // Print errors
  catch(PDOException $e) {
    print ("Categories query exception " . $e->getMessage());
  }
  ?>

  <div class="field">
    <strong>Category:</strong><br>
    <div class="select">
      <select name="category_id">
        <option value="0">None</option>
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
    <input class="input" type="text" name="price" value="" size="4">
  </div>

  <!-- Print batch -->
  <div class="field">
    <span>Add to print batch? &nbsp;</span>
    <input type="checkbox" name="tag" value="1" checked>
  </div>

  <!-- Save -->
  <div class="field">
    <input class="button is-link is-small" name="submit_data" type="submit" value="Save">
    <a class="button is-danger is-small" href="/">Back</a>
  </div>
</form>

<?php include $DOCROOT.'/templates/main_footer.php'; ?>
