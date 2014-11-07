<?php

require_once 'connection.php';  //SQL connection file

if(isset($_GET['check'])) // if ajax function calls
{

    $tables = array("air_humidity", "air_temperature", "dissolved_oxygen", "flow_rate", "illuminance", "ph", "water_level", "water_temperature"); // table names stored in array for ease of use

    $content = file_get_contents('measurements.txt');
    
    if($content != file_get_contents('previousMeasurement.txt'))  //proceed if measurements have changed
    {
        
        $measurements = explode(',', $content);                   //store individual measurements in array
    
        $query = "INSERT INTO timing_table (Time) VALUES (" . $measurements[8] . ");";
        mysqli_query($con, $query);

        $query = "SELECT MAX(ID) AS maxID FROM timing_table;";  
        $result = mysqli_query($con, $query);

        $maxID = 0;

        while ($row = mysqli_fetch_array($result)) {

            $maxID = $row['maxID'];                             //get id to insert into individual measurement tables (i.e. the one just inserted into the timing table)

        }

        $i = 0;

        foreach ($tables as $table)
        {

            $measurement = $measurements[$i];
            $i++;

            $query = "INSERT INTO " . $table . "_sensor VALUES (" . $maxID . ", " . $measurement . ");";    //insert measurement associated with each table
            echo $query;

            mysqli_query($con, $query);

        }

        $file = fopen('previousMeasurement.txt', 'w');        //update previous measurement file to store newest measurement
        fwrite($file, $content); 
        fclose($file);
    
        require_once 'dataAnalysis.php';                      //analyze measurements
        
    }
    
}

?>
