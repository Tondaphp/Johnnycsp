<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$num = $i = $average = $lengthaverage = $lengthtotal = $spd = $lngavrg = $previous = 0;
$it = "";
$search = $result = $answer = $change = "";
$connection = mysqli_connect("localhost", "roott", "roott", "apcspjohnny");



// do stuff
if (isset($_POST["submit"])) {
        //get input
        $lng = $_POST["lng"];
        $tm = $_POST["tm"];
        //calculate rounded speed
        $speed = $lng / $tm;
        $spd = round($speed, 2);
        //insert this run into the database
        $sql =  mysqli_query($connection, "INSERT INTO runs (lengthrun, timerun, speed) VALUES ($lng, $tm, $speed) ");
                
        //get all the runs from the database
        $result = mysqli_query($connection, "SELECT * FROM runs");
        $rows=$result->fetch_all(MYSQLI_ASSOC);
        
                //if there are any runs in the database
                if ($result->num_rows > 0) {
                        //index of the previous run & get its speed
                        $previous = $result->num_rows - 2;
                        $previousspeed = $rows[$previous]['speed'];
                        //get data from all of the runs
                        foreach($rows as $row) {
                                //get the total distance run until now
                                $lengthtotal = $lengthtotal + $row['lengthrun'];
                                
                        }
                        //calculate the average distance run until now
                        $lengthaverage = $lengthtotal / $result->num_rows;
                        $lngavrg = intval($lengthaverage);
                } 

      
        }

?>
<div  style="float: centre;     text-align: center;
    width: 100%; font-family: 'Arial', sans-serif;">
<div     style="float: centre; height: 80px;     padding: 40px 0;
    width: 100%; background-color: #87aeed;  font-weight: bold;">
<h1>Johhnny running app</h1>
</div>
<div style="width: 100%; background-color: #9bbbef;"
<br>
<form method="post" action="">  
 
Distance [m]: <br> <input type="number" name="lng" min=1 autofocus/> 
<br>
<br>
 Time [s]: <br> <input type="number" name="tm" min=1 value="yes" >
<br>
<br>
  <input type="submit" style="background-color: #667184;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;" name="submit" value="Submit">  
</form>
<br>


<div     style="float: centre; height: 60px;  padding: 20px 0;
width: 100%; background-color: #87aeed;  font-weight: bold;">
<h2>Result:</h2>
</div>
<?php
if (isset($_POST["submit"])) {
echo "<br>";
echo "you ran $lng meter in $tm seconds, which means you had an average speed of $spd meters per second";
echo "<br>";
//output how did the user ran in average
echo "your average run is $lngavrg meters long";
//
if ($lng > $lngavrg) {
        echo "<br>";

        echo "You ran longer than in average, congrats";
}
if ($speed > $previousspeed) {
        echo "<br>";
        echo "you also ran faster than last time :*";
}
}

echo "<br>";

?>
<br>
</div>

</body>
</html>