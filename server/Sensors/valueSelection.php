<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title></title>
    </head>
    <body>
        
        <?php
        
        require_once 'connection.php';
        
        $tableNames = array("air_humidity" => "Air Humidity", 
            "air_temperature" => "Air Temperature", "dissolved_oxygen" => "Dissolved Oxygen", 
            "flow_rate" => "Flow Rate", "illuminance" => "Illuminance", "ph" => "ph", 
            "water_level" => "Water Level", "water_temperature" => "Water Temperature");
        
        echo '<form action="valueSelection.php" method="POST">';
        
        echo '<table class="valueTable"><th>Sensor Name</th><th>Max Value</th><th>Min Value</th>';
        
        $query = "SELECT * FROM extrema_table";
        
        $results = mysqli_query($con, $query);
        
        $i = 0;
        
        while($row = mysqli_fetch_array($results))
        {
            
            echo '<tr><td>' . $tableNames[$row['Sensor']] . '</td><td><input name="Max' . $i . '" type="text" value=' . $row['Max'] . '></td><td><input name="Min' . $i . '" type="text" value=' . $row['Min'] . '></td></tr>';
            echo '<input type="hidden" name="' . $i . '" value="' . $row['Sensor'] . '">';
            $i++;
            
        }
        
        echo '</table><center><input type="submit" class="submitButton" name="ChangeValues" value="Click to Update Values"></center></form>';
        
        $numberOfSensors = mysqli_num_rows($results);
        
        if(isset($_POST['ChangeValues']))
        {
            
            for($i = 0; $i < $numberOfSensors; $i++)
            {
                
                $sensor = $_POST[$i];
                $max = $_POST['Max' . $i];
                $min = $_POST['Min' . $i];
                
                $query = "UPDATE extrema_table SET Max=" . $max . ", Min=" . $min . " WHERE Sensor = '" . $sensor . "';";
                mysqli_query($con, $query);
                
            }
            
            header('Location: valueSelection.php');
            
        }
        
        ?>
        
    </body>
</html>
