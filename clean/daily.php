<?php include 'config.php'?>
<?php
    
    if(isset($_GET['day'])
    {
        $day = $_GET['day'];
    }else{
        $day = date('l');
    }
    
?>
<?php include 'header.php'?>

<p><?=$day?>'s special is ...</p> 
<p>Click below to find out our other specials: </p>
<p><a href="daily.php?day=Sunday">Sunday</a></p>
<p><a href="daily.php?day=Monday">Monday</a></p>
<p><a href="daily.php?day=Tuesday">Tuesday</a></p>
<p><a href="daily.php?day=Wednesday">Wednesday</a></p>
<p><a href="daily.php?day=Thursday">Thursday</a></p>
<p><a href="daily.php?day=Friday">Friday</a></p>
<p><a href="daily.php?day=Satday">Satday</a></p>

<?php include 'footer.php'?>