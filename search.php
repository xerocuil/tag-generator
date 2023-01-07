<?php
$pageTitle = "Search Results";
require $_SERVER['DOCUMENT_ROOT'].'/incl/settings.php';
include $appdir.'/incl/header-default.php';

// Get search data
if( isset($_POST['search']) ){
	$search_query = $_POST['search_query'];
}
// Database Query
$query = "SELECT * FROM price_list WHERE part LIKE '%$search_query%' OR description LIKE '%$search_query%' ORDER BY part ASC;";
$results = $db->query($query);

// Get List View
include $appdir.'/helpers/list_view.php';
include $appdir.'/incl/footer-default.php';
?>