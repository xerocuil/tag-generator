<?php
$page_title = 'Add Item';
require $_SERVER['DOCUMENT_ROOT'].'/settings.php';
include $DOCROOT.'/templates/header.php';

// ## Updating table row
if( isset($_POST['submit_data']) ){
  pre_r($_POST);

  // Get data from POST
  $name = $_POST['name'];
  $description = $_POST['description'];
  if ($_POST['category_id'] > 0){
    $category_id = $_POST['category_id'];
  } else {
    $category_id = "";
  }
  $price = $_POST['price'];
  $tag = $_POST['tag'];
  
  // Insert POST data
  $insert = "INSERT INTO items (name, description, price, category_id, tag) VALUES ($name, $description, $price, $category_id, $tag);";
  
  // Executes query
  try {
    $DB->query($insert);
  }
  // Catch error
  catch(PDOException $e){
    print('Insert query exception: '.$e->getMessage());
  }
}

echo '<h1>'.$page_title.'</h1>';
?>

<!-- ## Form -->
<div class="columns">
  <div class="column">
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

      <!-- Category -->

      <?php
      // ## Categories query
      try {
        $cats_q = $DB->query("SELECT * FROM categories ORDER BY name ASC;");
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
        <input type="checkbox" name="tag" value="1">
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
