<?php
$DOCROOT = $_SERVER['DOCUMENT_ROOT'];
$URLROOT = $_SERVER['REMOTE_ADDR'];
$SCRIPTS = $DOCROOT.'/scripts';

$APPTITLE = 'Tag Generator';
$APP_DESC = 'Create SKUs for your inventory.';

$DB = new PDO('sqlite:'.$DOCROOT.'/db/test2.db');
$DB -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$TABLES = array("brands", "categories", "items", "settings");
$DEBUG = True;

function pre_r( $array ){
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}

// Check for Items table
function check_table($table){
  global $DB;
  $check_table_q = $DB->query("SELECT EXISTS (SELECT name FROM sqlite_schema WHERE type='table' AND name='".$table."')");
  $check_table_r = $check_table_q->fetch(PDO::FETCH_ASSOC);
  foreach($check_table_r as $r){
    $check_table = $r;
  }
  return $check_table;
}

// // Check for Items table
// function check_items(){
//   global $DB;
//   $check_items_q = $DB->query("SELECT EXISTS (SELECT name FROM sqlite_schema WHERE type='table' AND name='items')");
//   $check_items_r = $check_items_q->fetch(PDO::FETCH_ASSOC);
//   foreach($check_items_r as $r){
//     $check_items = $r;
//   }
//   return $check_items;
// }

// Check for rows in Items table
function check_empty(){
  global $DB;
  $check_empty_q = $DB->query("SELECT COUNT(*) FROM items");
  $check_empty_r = $check_empty_q->fetch(PDO::FETCH_ASSOC);
  foreach($check_empty_r as $r){
    $check_empty = $r;
  }
  return $check_empty;
}

// Drop tables
function drop_table($table){
  global $DB, $DOCROOT, $SCRIPTS;
  
  // ## Init table
  $drop = "DROP TABLE ".$table;
  try {
    $DB->query($drop);
  }
  // Print errors
  catch(PDOException $e) {
    print('Drop query exception ' . $e->getMessage());
  }
  // Print success message
  if( empty($e) ){
    echo '<div class="notification is-success">'.$table.' dropped.</div>';
  }
}
?>
