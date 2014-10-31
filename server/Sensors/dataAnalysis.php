<?php

$max[];
$min[];
$name[];

$query = "SELECT * FROM extrema_table";  //retrieve max and min values
$results = mysqli_query($con, $query);

while($row2 = mysqli_fetch_array($results))
{
    
    $max[] = $row2['Max'];
    $min[] = $row2['Min'];
    $name[] = $row2['Sensor'];
    
}

$comments[];

air_humidity($measurements[0], $max[0], $min[0], $name[0]);                 // analyze all data
air_temperature($measurements[1], $max[1], $min[1], $name[1]);
dissolved_oxygen($measurements[2], $max[2], $min[2], $name[2]);
flow_rate($measurements[3], $max[3], $min[3], $name[3]);
illuminance($measurements[4], $max[4], $min[4], $name[4]);
ph($measurements[5], $max[5], $min[5], $name[5]);
water_level($measurements[6], $max[6], $min[6], $name[6]);
water_temperature($measurements[7], $max[7], $min[7], $name[7]);

if(!empty($comments))
    sendInfo();

?>

<?php

function air_humidity($value, $max, $min, $name)
{
    
    global $comments;
    $comments[0] = "";
    
    if($value > $max)
    {
        $comments[0] = $name . " reading is " . $value . ". The max recommended reading is " . $max . ".";
        return;
    }
    
    if($value < $min)
    {
        $comments[0] = $name . " reading is " . $value . ". The min recommended reading is " . $min . ".";
        return;
    }
           
}

function air_temperature($value, $max, $min, $name)
{
    
    global $comments;
    $comments[1] = "";
    
    if($value > $max)
    {
        $comments[0] = $name . " reading is " . $value . ". The max recommended reading is " . $max . ".";
        return;
    }
    
    if($value < $min)
    {
        $comments[0] = $name . " reading is " . $value . ". The min recommended reading is " . $min . ".";
        return;
    }
    
}

function dissolved_oxygen($value, $max, $min, $name)
{
    
    global $comments;
    $comments[2] = "";
    
    if($value > $max)
    {
        $comments[0] = $name . " reading is " . $value . ". The max recommended reading is " . $max . ".";
        return;
    }
    
    if($value < $min)
    {
        $comments[0] = $name . " reading is " . $value . ". The min recommended reading is " . $min . ".";
        return;
    }
    
}

function flow_rate($value, $max, $min, $name)
{
    
    global $comments;
    $comments[3] = "";
    
    if($value > $max)
    {
        $comments[0] = $name . " reading is " . $value . ". The max recommended reading is " . $max . ".";
        return;
    }
    
    if($value < $min)
    {
        $comments[0] = $name . " reading is " . $value . ". The min recommended reading is " . $min . ".";
        return;
    }
    
}

function illuminance($value, $max, $min, $name)
{
    
    global $comments;
    $comments[4] = "";
    
    if($value > $max)
    {
        $comments[0] = $name . " reading is " . $value . ". The max recommended reading is " . $max . ".";
        return;
    }
    
    if($value < $min)
    {
        $comments[0] = $name . " reading is " . $value . ". The min recommended reading is " . $min . ".";
        return;
    }
    
}

function ph($value, $max, $min, $name)
{
    
    global $comments;
    $comments[5] = "";
    
    if($value > $max)
    {
        $comments[0] = $name . " reading is " . $value . ". The max recommended reading is " . $max . ".";
        return;
    }
    
    if($value < $min)
    {
        $comments[0] = $name . " reading is " . $value . ". The min recommended reading is " . $min . ".";
        return;
    }
    
}

function water_level($value, $max, $min, $name)
{
    
    global $comments;
    $comments[6] = "";
    
    if($value > $max)
    {
        $comments[0] = $name . " reading is " . $value . ". The max recommended reading is " . $max . ".";
        return;
    }
    
    if($value < $min)
    {
        $comments[0] = $name . " reading is " . $value . ". The min recommended reading is " . $min . ".";
        return;
    }
    
}

function water_temperature($value, $max, $min, $name)
{
    
    global $comments;
    $comments[7] = "";
    
    if($value > $max)
    {
        $comments[0] = $name . " reading is " . $value . ". The max recommended reading is " . $max . ".";
        return;
    }
    
    if($value < $min)
    {
        $comments[0] = $name . " reading is " . $value . ". The min recommended reading is " . $min . ".";
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