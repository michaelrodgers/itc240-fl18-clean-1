<?php
/*
	config.php
	
	Stores configuration data for our application
*/

ob_start();//prevents header errprs
include 'credentials.php';//database credentials
define('DEBUG',TRUE); #we want to see all errors

//echo basename($_SERVER['PHP_SELF']);
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));
//echo 'the constant is storing: ' . THIS_PAGE;
//die;
/*
 Below is an array of images to be used on contact.php in the function named 
 randomize()
*/
$heros[] = '<img src="images/coulson.png" />';
$heros[] = '<img src="images/fury.png" />';
$heros[] = '<img src="images/hulk.png" />';
$heros[] = '<img src="images/thor.png" />';
$heros[] = '<img src="images/black-widow.png" />';
$heros[] = '<img src="images/captain-america.png" />';
$heros[] = '<img src="images/machine.png" />';
$heros[] = '<img src="images/iron-man.png" />';
$heros[] = '<img src="images/loki.png" />';
$heros[] = '<img src="images/giant.png" />';
$heros[] = '<img src="images/hawkeye.png" />';
//default page values
$title = THIS_PAGE;
$siteName = 'Site Name';
$slogan = 'Whatever it is you do, we do it better.';
$pageHeader = 'The developer forgot to put a pageHeader!';
$subHeader = 'The developer forgot to put a subHeader!';
$sloganIcon = '';//will be replaced in contact.php by hero icons


switch(THIS_PAGE){
	
	case 'template.php':
		$title =  'My Template page';
        $pageHeader = 'Put PageID here';
        $subHeader = 'Put more info about page here';
	break;
        
    case 'db-test.php':
		$title =  'My Database Test page';
        $pageHeader = 'Database Test';
        $subHeader = 'Check this page to see if database credentials are correct';
	break;
        
    case 'about.php':
		$title =  'My About page';
        $pageHeader = 'About Me';
        $subHeader = 'This is what I do';
	break;
        
    case 'daily.php':
		$title =  'My Daily page';
        $pageHeader = 'Daily Coffee Specials';
        $subHeader = 'The special is...';
        //$sloganIcon = randomize($heros);
	break;    
	
	case 'contact.php':
		$title =  'My contact page';
        $pageHeader = 'Please contact us';
        $subHeader = 'We appreciate your feedback';
        //$sloganIcon = randomize($heros);
	break;
	
}
/**
 * returns a random item from an array sent to it.
 *
 * Uses count of array to determine highest legal random number.
 *
 * Used to show random HTML segments in sidebar, etc.
 *
 * <code>
 * $arr[] = '<img src="mypic1.jpg" />';
 * $arr[] = '<img src="mypic2.jpg" />';
 * $arr[] = '<img src="mypic3.jpg" />';  
 * echo randomize($arr); #will show one of three random images
 * </code>
 *
 * @param array array of HTML strings to display randomly
 * @return string HTML at random index of array
 * @see rotate() 
 * @todo none
 */

/* function randomize ($arr)
{//randomize function is called in the right sidebar - an example of random (on page reload)
	if(is_array($arr))
	{//Generate random item from array and return it
		return $arr[mt_rand(0, count($arr) - 1)];
	}else{
		return $arr;
	}
}#end randomize()

/**
 * returns a daily item from an array sent to it.
 *
 * Uses count of array to determine highest legal rotated item.
 *
 * Uses day of month and modulus to rotate through daily items in sidebar, etc.
 *
 * <code>
 * $arr[] = '<img src="mypic1.jpg" />';
 * $arr[] = '<img src="mypic2.jpg" />';
 * $arr[] = '<img src="mypic3.jpg" />';  
 * echo rotate($arr); #will return a different image each day for three days
 * </code>
 * 
 * @param array array of HTML strings to display on a daily rotation
 * @return string HTML at specific index of array based on day of month
 * @see rotate() 
 * @todo none
 */

/* function rotate ($arr)
{//rotate function is called in the right sidebar - an example of rotation (on day of month)
	if(is_array($arr))
	{//Generate item in array using date and modulus of count of the array
		return $arr[((int)date("j")) % count($arr)];
	}else{
		return $arr;
	}
}#end rotate
*/

function myerror($myFile, $myLine, $errorMsg)
{
    if(defined('DEBUG') && DEBUG)
    {
       echo "Error in file: <b>" . $myFile . "</b> on line: <b>" . $myLine . "</b><br />";
       echo "Error Message: <b>" . $errorMsg . "</b><br />";
       die();
    }else{
		echo "I'm sorry, we have encountered an error.  Would you like to buy some socks?";
		die();
    }
}
