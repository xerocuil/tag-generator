<?php
if (isset($page_title)) {
  $header_title =  $page_title. ' | '. $APPTITLE;
} else {
  $header_title = 'Tag Generator | '.$APP_DESC;
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php echo $header_title ?></title>
  <meta name="description" content="A simple PHP-based price tag generator.">

  <link rel="stylesheet" href="/assets/css/main.min.css">

  <script src="/assets/js/font-awesome.js"></script>
</head>

<body>

<div id="header">
  <div class="container">
    <nav>
      <div class="columns">
        <div class="column">
          <span id="site-title"><a href="/"><img src="/assets/img/logo.svg" style="height: 32px; width: auto;"></a></span>
        </div>

        <div class="column has-text-right">
          <ul id="navbar">
            <li><a class="button" href="/items/add.php">Add Item</a></li>
            <li><a class="button" href="/categories/">Categories</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</div>

<div id="content" class="container">
<article>

<div class="columns">
  <div class="column">