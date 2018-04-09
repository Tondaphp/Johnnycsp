<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  


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

<!-- this thingy sends you to the right page-->
<a href="run.php">Go</a>


<div     style="float: centre; height: 60px;  padding: 20px 0;
width: 100%; background-color: #87aeed;  font-weight: bold;">
<h2>Result:</h2>
</div>

<br>
</div>

</body>
</html>