<?php
//require $_SERVER['DOCUMENT_ROOT'].'/incl/session.php';
require $_SERVER['DOCUMENT_ROOT'].'/incl/settings.php';
$pageTitle = "Preview Price Tags";
include $appdir.'/incl/header-default.php';

$query = "SELECT * FROM price_list WHERE tag = '1' ORDER BY part ASC";
$query_group = "SELECT * FROM groups WHERE tag = '1' ORDER BY name ASC";

$results = $db->query($query);
$result_group = $db->query($query_group);

include $appdir.'/helpers/list_view.php';
include $appdir.'/incl/footer-default.php';
?>
