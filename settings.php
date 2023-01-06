<?php
$DOCROOT = $_SERVER['DOCUMENT_ROOT'];
$URLROOT = $_SERVER['REMOTE_ADDR'];
$APPTITLE = 'Tag Generator';
$DB = new PDO('sqlite:'.$DOCROOT.'/db/test.db');
$DB -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>