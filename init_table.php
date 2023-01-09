<?php
$page_title = 'Init Table';
require $_SERVER['DOCUMENT_ROOT'].'/settings.php';
$SQL = $DOCROOT.'/db/sql';
$SAMPLE = isset($_GET['sample']);

// ## Check for tables

// Check for Items table
$check_items = $DB->query("SELECT EXISTS (SELECT name FROM sqlite_schema WHERE type='table' AND name='items')");
$check_items_r = $check_items->fetch(PDO::FETCH_ASSOC);
foreach($check_items_r as $r){
  $item_verify = $r;
}

// Check for Categories table
$check_categories = $DB->query("SELECT EXISTS (SELECT name FROM sqlite_schema WHERE type='table' AND name='categories')");
$check_categories_r = $check_categories->fetch(PDO::FETCH_ASSOC);
foreach($check_categories_r as $r){
  $categories_verify = $r;
}

// Create Items table if missing
if ($item_verify == "1") {
  echo "<p>Items table found.</p>";
} else {
  init_items();
}

// Create Items table if missing
if ($categories_verify == "1") {
  echo "<p>Categories table found.</p>";
} else {
  init_categories();
}

// ## Functions

function init_categories(){
  global $DB;
  global $DOCROOT;
  
  // ## Init Categories table
  $create_categories = file_get_contents($DOCROOT.'/sql/create_categories.sql');
  try {
    $DB->query($create_categories);
  }
  // Print errors
  catch(PDOException $e) {
    print ("Categories query exception " . $e->getMessage());
  }
  // Print success message
  if( $e == "" ){
    echo '<div class="notification is-success">Categories table created.</div>';
  }

  try {
    $DB->query("INSERT INTO categories (id, name) VALUES ('0', 'None')");
  }
  // Print errors
  catch(PDOException $e) {
    print ("Init categories exception " . $e->getMessage());
  }
}

function init_items(){
  global $DB;
  global $DOCROOT;

  // ## Init Items table
  $create_items = file_get_contents($DOCROOT.'/db/sql/create_items.sql');
  try {
    $DB->query($create_items);
  }
  // Print errors
  catch(PDOException $e) {
    print ("Items query exception " . $e->getMessage());
  }

  // Print success message
  if( $e == "" ){
    echo '<div class="notification is-success">Items table created.</div>';
  }
}
?>