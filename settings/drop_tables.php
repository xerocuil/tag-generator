<?php
$page_title = 'Settings';
$sidebar = 'default';
require $_SERVER['DOCUMENT_ROOT'].'/config.php';
include $DOCROOT.'/templates/main_header.php';

foreach($TABLES as $t){
  drop_table($t);
}

include $DOCROOT.'/templates/main_footer.php';
?>