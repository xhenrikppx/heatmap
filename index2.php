<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	
  	
<?php
function dateafter ( $a )
{
    $hours = $a * 24;
    $added = ($hours * 3600)+time();
    $days = date("l", $added);
    $month = date("F", $added);
    $day = date("j", $added);
    $year = date("Y", $added);
    $result = "$day $month $year - $days";
    return ($result);
}
	echo dateafter("614"); 

?>

</body>
</html>