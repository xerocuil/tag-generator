<?php
$page_title = 'Init Table';
$sidebar = 'default';
$mid = 'spacer';
require $_SERVER['DOCUMENT_ROOT'].'/config.php';
include $DOCROOT.'/templates/main_header.php';
$SAMPLE = isset($_GET['sample']);

// Create tables if missing
if (check_table("items") == "1") {
  echo "<p>Tables installed.</p>";
} else {
  foreach($TABLES as $t){
    create_table($t);
  }
  init_categories();
  init_default_settings();
}

// Add sample data if requested
if ( $SAMPLE == True ){
  // Check if items table has content
  $check_empty = $DB->query("SELECT COUNT(*) FROM items");
  $check_empty_r = $check_empty->fetch(PDO::FETCH_ASSOC);
  
  foreach($check_empty_r as $r){
    $check_empty_verify = $r;
  }
  
  if ( $check_empty_verify == "0"){
    $sample_tables = array("brands", "categories", "items");
    foreach($sample_tables as $t){
      sample_data($t);
    }
  } else {
    echo '<p>This table already has data.</p>';
  }
}

// ## Functions

// Create tables
function create_table($table){
  global $DB, $DOCROOT, $SAMPLE, $SCRIPTS, $TABLES;
  
  // ## Init table
  $create = file_get_contents($SCRIPTS.'/create_'.$table.'.sql');
  try {
    $DB->query($create);
  }
  // Print errors
  catch(PDOException $e) {
    print (ucwords($table).' query exception ' . $e->getMessage());
  }
  // Print success message
  if( empty($e) ){
    echo '<div class="notification is-success">'.ucwords($table).' table created.</div>';
  }
}

// Add 'None' to Categories
function init_categories(){
  global $DB;
  try {
    $DB->query("INSERT INTO categories (id, name) VALUES ('0', 'None')");
  }
  // Print errors
  catch(PDOException $e) {
    print ("Init categories exception " . $e->getMessage());
  }
}

// Insert sample data
function sample_data($table){
  global $DB, $SAMPLE, $SCRIPTS, $TABLES;
  $sample = file_get_contents($SCRIPTS.'/sample_'.$table.'.sql');
  try {
    $DB->query($sample);
  }
  // Print errors
  catch(PDOException $e) {
    print ("Sample '.ucwords($table).' exception " . $e->getMessage());
  }
  // Print success message
  if( empty($e) ){
    echo '<div class="notification is-success">'.ucwords($table).' sample data added.</div>';
  }
}

function init_default_settings(){
  global $DB, $SCRIPTS;
  $settings = file_get_contents($SCRIPTS.'/default_settings.sql');
  try {
    $DB->query($settings);
  }
  // Print errors
  catch(PDOException $e) {
    print ("Init settings exception " . $e->getMessage());
  }
}
?>

<?php include $DOCROOT.'/templates/main_footer.php'; ?>
