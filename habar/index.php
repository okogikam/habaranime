<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	if(isset($_GET['habar_id'])){
	    $id = $_GET['habar_id'];
	    $uri .= $_SERVER['HTTP_HOST'];
    	header('Location: '.$uri.'?page=Habar&&id='.$id);
    	exit;
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'?page=Habar');
	exit;
?>
Something is wrong with the XAMPP installation :-(
