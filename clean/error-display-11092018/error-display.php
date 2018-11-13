<?php
 /**
 * error-display.php allows a page to be entered to view PHP errors
 *
 * When the php.ini setting display_errors is turned off, the only way to view 
 * syntax errors is via a log file or to reference the broken page as an include
 *
 * This page is setup to include a file in the current folder (or relative sub folder) 
 * and shows the errors, if any.  This page also parses querystring data, but not post date
 *
 * This file is for emergency checking of errors do NOT leave this file on a production 
 * server!
 * 
 * @package DISPLAY-ERRORS
 * @author Bill Newman
 * @version 0.2 2018/11/09
 * @link https://newmanix.com/ 
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see none
 * @todo Add POST support
 * @todo Place HTML outside of if block
 * @todo Add info about URL of page being tested
 */

//here we set display errors for the page
ini_set('display_errors','on');

if(isset($_POST['pg']) && $_POST['pg'] !='')
{//pg is the assumed file 
    $pg = strip_tags($_POST['pg']);//clean up a bit
    
    if(strpos($pg,'?')!==false)
    {//querystring loaded
        
        //split up and process querystring
        $arr = explode('?',$pg);
        $query_string = $arr[1];
        $amp_arr = explode('&',$query_string);
        foreach($amp_arr as $param)
        {//build querystring parameters as $_GET vars
            $q_arr = explode('=',$param);
            $_GET[$q_arr[0]] = $q_arr[1];  
        }
    }
    
    //remove query string for file load
    $pg = strtok($pg, '?');
    
    echo '<p><a href="">BACK TO ERROR DISPLAY PAGE</a></p>';
    if(file_exists($pg))
    {//load file
        include $pg;
    }else{
        echo '<p>No such file found: <b>' . $pg . '</b></p>';   
    }
}else{
    echo '
    <html>
        <head>
            <title>error-display.php</title>
            <meta name="robots" content="no index, no follow">
        </head>
    <body>
    <h1>error-display.php</h1>
    <p>This page is designed for a quick look at an error in lieu of error logging being setup.</p>
    <form action="" method="POST">
    <p>Place the <em><b>relative path *</b></em> to a PHP page that has errors below:</p>
    <p>Page <input type="text" name="pg" size="60" /></p>
    <p><input type="submit" value="Display Page Errors" /></p>
    <p><em><b>*</b></em> In this case <em><b>relative path</b></em> means the current folder or a sub folder in your web space, e.g., <em><b>page.php</b></em> or <em><b>sub-folder/page.php</b></em>.</p>
    <p><b style="color:red">WARNING:</b><em> Do <b>NOT</b> leave this file on your server as that would be insecure.</em></p>
    <p><em>Contact your hosting company and have them help you setup a log file and view errors there for a long term troubleshooting solution.</p>
    <p><em>Servers that are viewable by the public should be considered production servers, and 
    hosting companies are more frequently setting PHP errors to be <a href="http://php.net/manual/en/errorfunc.configuration.php#ini.display-errors" target="_blank">hidden by default</a.></em></p>
    
    </form>
    </body>
    </html>
    ';
}

?>

