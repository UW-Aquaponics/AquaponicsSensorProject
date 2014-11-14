<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>

    <?php

        require_once 'connection.php';

        $tables = array("air_humidity", "air_temperature", "dissolved_oxygen", "flow_rate", "illuminance", "ph", "water_level", "water_temperature"); // table names stored in array for ease of use

        $timings = array();

        $query = "SELECT Time FROM timing_table";
        $results = mysqli_query($con, $query);

        while($row = mysqli_fetch_array($results))
        {
            $timings[] = $row['Time'];
        }

        $measurements = array(array());

        $i = 0;

        foreach($tables as $table)
        {

            $query = "SELECT Measurement FROM " . $table . "_sensor;";
            $results = mysqli_query($con, $query);

            while($row = mysqli_fetch_array($results))
            {

                $measurements[$i][] = $row['Measurement'];

            }

            $i++;

        }

        $finalArray = array("times" => $timings, 
                            "air humidity" => $measurements[0],
                            "air temperature" => $measurements[1],
                            "dissolved oxygen" => $measurements[2],
                            "flow rate" => $measurements[3],
                            "illuminance" => $measurements[4],
                            "ph" => $measurements[5],
                            "water level" => $measurements[6],
                            "water temperature" => $measurements[7]
                            ); // array to turn into JSON object

        $json = json_encode($finalArray);
        
        echo($json);
        
    ?>     
       
        
    </body>
</html>


