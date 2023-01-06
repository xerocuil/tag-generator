<?php
if (isset($page_title)) {
	$header_title =  $page_title. ' | '. $APPTITLE;
} else {
	$header_title = 'Tag Generator | '.$APP_DESC;
}

echo '
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>'.$header_title.'</title>
  <meta name="description" content="A simple PHP-based price tag generator.">

  <link rel="stylesheet" href="/assets/css/main.css">
</head>

<body>

<div id="header">
	<nav class="container">
		<div class="columns">
			<div class="column">
				<span id="site-title"><a href="/">Tag Generator</a></span>
			</div>

			<div class="column has-text-right">
				<ul>
					<li><a href="/categories/">Categories</a></li>
				</ul>
			</div>
		</div>
	</nav>
</div>

<div id="content" class="container">
<article>
';
?>