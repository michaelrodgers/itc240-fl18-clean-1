<?php
/*
	config.php
	
	Stores configuration data for our application



*/

//echo basename($_SERVER['PHP_SELF']);

define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//echo 'the constant is storing: ' . THIS_PAGE;

//die;

$title = THIS_PAGE;
$siteHeading = 'Site Name';
$slogan = 'Slogan';
$pageHeading = 'Page Header';
$subheading = 'Sub Header';

switch(THIS_PAGE){
	
	case 'template.php':
		$title =  'My template page';
	break;
	
	case 'contact.php':
		$title =  'My contact page';
	break;
	
	default:
		$title = THIS_PAGE;
	
	
}






















