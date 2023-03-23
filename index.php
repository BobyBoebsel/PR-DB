<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN"
       "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>PR-Nummer Test</title>
</head>

<body>

<h2 align="center">PR-Nummer-Suche</h2>

<form action="#" method="post">
 <p align="center">  <input type="text" name="suche" /></p>
 <p align="center">
<input type="radio" id="abf1" name="abf" value="PRNR" checked>
  <label for="abf1">PR-Nummer </label>
  <input type="radio" id="abf2" name="abf" value="FAM">
  <label for="abf2">Familie</label> 
</p>
 <p align="center"><input type="submit" value="SUCHEN" /></p>
</form>





</body>


</html>



<?php

   
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $db = "pr";
    $conn = mysqli_connect($servername, $username, $password,$db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if ($_POST['suche'] != ""){
        if ($_POST['abf'] === "FAM"){
            $query = "SELECT * FROM pr.PR WHERE FAM LIKE \"%".$_POST['suche']."%\"";


        }
        elseif ($_POST['abf'] === "PRNR")
        {
            $query = "SELECT * FROM pr.PR WHERE PRNR LIKE \"%".$_POST['suche']."%\"";

        }
    }
    
    if ($result = $conn->query($query))
    {   
        
        echo "<table align=\"center\" border=\"8\" cellspacing=\"10\" cellpadding=\"20\">";
        echo "<tr>";
        echo "<th> PR Nummer </th> <th> Familie </th> <th align=\"left\"> Beschreibung </th>";
        echo "</tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['PRNR']."</td>";
            echo "<td>".$row['FAM']."</td>";
            echo "<td>".$row['TEXT']."</td>";
            //var_dump($row);
            echo "</tr>";
            
        }
        echo "</table>";
    }
 

?>
   