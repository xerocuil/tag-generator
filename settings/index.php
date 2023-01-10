<?php
$page_title = 'Settings';
$sidebar = 'default';
require $_SERVER['DOCUMENT_ROOT'].'/config.php';
include $DOCROOT.'/templates/main_header.php';


// Check for Items table:
if (check_table("items") == "0"){
  echo 'No Tables found.
  <p><a href="/init_tables.php">Initalize empty table.</a></p>
  <p><a href="/init_tables.php?sample=True">Initalize table with sample data.</a></p>';
}

// Check for rows in Items table:
if (check_empty() == "0"){
  echo '<p>No rows found in table.</p>
  <p>Would you like to <a href="/items/add.php">add one now</a>, or get started on <a href="/categories/add.php">Categories</a> or <a href="/brands/add.php">Brands?</a></p>';
} 

load_settings();

function load_settings(){
  global $DB, $DOCROOT;
  echo '<h1>Settings</h1>
  <table class="table is-bordered is-hoverable is-striped">';

  // Item query
  try {
    $settings_q = $DB->query("SELECT * FROM settings");
    $settings_r = $settings_q->fetchAll(PDO::FETCH_ASSOC);
  }
  // Print errors
  catch(PDOException $e) {
    echo '<div class="notification is-danger is-light">Settings query exception: '.$e->getMessage().'</div>';
  }

  foreach($settings_r as $s){
    echo '<tr><td>'.$s['key_field'].'</td><td>'.$s['key_value'].'</td></tr>';
  }

  echo '</table>';
}

include $DOCROOT.'/templates/main_footer.php';
?>