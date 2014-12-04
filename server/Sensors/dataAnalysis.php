<?php

$numberOfSensors = 8;

$max = array();
$min = array();
$name = array();

$query = "SELECT * FROM extrema_table";  //retrieve max and min values
$results = mysqli_query($con, $query);

while($row2 = mysqli_fetch_array($results))
{
    
    $name[] = $row2['Sensor'];
    $max[] = $row2['Max'];
    $min[] = $row2['Min'];
        
}

$comments = array();

for($a=0; $a<$numberOfSensors; $a++)
    analyzeValue($measurements[$a], $max[$a], $min[$a], $name[$a], $a);
    

if(!empty($comments))
    sendInfo();


function analyzeValue($value, $max, $min, $name, $number)
{
    
    global $comments;
    $comments[$number] = "";
    
    if($value > $max)
    {
        $comments[$number] = $name . " reading is " . $value . ". The max recommended reading is " . $max . ".";
        return;
    }
    
    if($value < $min)
    {
        $comments[$number] = $name . " reading is " . $value . ". The min recommended reading is " . $min . ".";
        return;
    }
           
}


function sendInfo()
{
    
    global $comments;
    
    $msg = "The following problems were observed:\n\n";
    
    $i = 1;
    
    foreach($comments as $comment)
    {
        
        if($comment != 0)
        {
            $msg += $i . ". " . $comment . "\n\n";
            $i++;
        }

    }
    
    mail("uwaquaponics@gmail.com", "Danger: Problems with System", $msg);
    
}

?>