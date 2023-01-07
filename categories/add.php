<?php
//require $_SERVER['DOCUMENT_ROOT'].'/incl/session.php';
$pageTitle = "New Category";
$message = "";
require $_SERVER['DOCUMENT_ROOT'].'/incl/settings.php';
include $appdir.'/incl/header-default.php';

if( isset($_POST['submit_data']) ){

	// Gets the data from post
	$name = $_POST['name'];

	// Makes query with post data
	$query = "INSERT INTO categories (name) VALUES ('$name')";
	
	// Execute query, set success message,  otherwise set error message
	if( $db->exec($query) ){
		$message = '<div class="notification is-success">Data is updated successfully.</div>';
		header( "refresh:0.5;url=/" );
	}else{
		$message = '<div class="notification is-danger">Sorry, Data is not updated.</div>';
	}
}
?>

<h1><?php echo $pageTitle; ?></h1>
<div class="columns">
	<div class="column is-half">
		<?php echo $message; ?>
		<form action="" method="post">
			<div class="field">
				<strong>Name:</strong><br>
				<input class="input" type="text" name="name">
			</div>
		</form>
	</div>
</div>

<?php include $appdir.'/incl/footer-default.php'; ?>
