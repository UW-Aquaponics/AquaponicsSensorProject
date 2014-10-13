<?php

require_once 'connection.php';
    
    $tables = array("air_humidity", "air_temperature", "dissolved_oxygen", "flow_rate", "illuminance", "ph", "water_level", "water_temperature"); 

    $content = file_get_contents('measurements.txt');
    
    echo file_get_contents('previousMeasurement.txt') . 'done';
    
    if($content != file_get_contents('previousMeasurement.txt'))
    {
        
        $measurements = explode(',', $content);
    
        $query = "INSERT INTO timing_table (Time) VALUES (NOW());";
        mysqli_query($con, $query);

        $query = "SELECT MAX(ID) AS maxID FROM timing_table;";
        $result = mysqli_query($con, $query);

        $maxID = 0;

        while ($row = mysqli_fetch_array($result)) {

            $maxID = $row['maxID'];

        }

        $i = 0;

        foreach ($tables as $table)
        {

            $measurement = $measurements[$i];
            $i++;

            $query = "INSERT INTO " . $table . "_sensor VALUES (" . $maxID . ", " . $measurement . ");";
            echo $query;

            mysqli_query($con, $query);

        }

        $file = fopen('previousMeasurement.txt', 'w');    
        fwrite($file, $content); 
        fclose($file);
    
    }
    


?>
