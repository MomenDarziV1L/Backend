<?php
/*
* file name:    searchform.php
* author:       Momen Darzi
* date:         29-03-2020
* back-end programeren
 */


//Make a Form to use POST method
echo "<form action=\"searchresult.php\" method=\"POST\" >";     
echo "<table>";

echo "<tr>";
echo "<td>ID:</td>";
echo "<td><input type=\"integer\" name=\"id\"></td>";     // input tags
echo "</tr>";

echo "<tr>";
echo "<td>Firstname:</td>";
echo "<td><input type=\"string\" name=\"firstname\"></td>";     
echo "</tr>";

echo "<tr>";
echo "<td>Lastname:</td>";
echo "<td><input type=\"string\" name=\"lastname\"></td>";     
echo "</tr>";

echo "<tr>";
echo "<td>Hobbies:</td>";
echo "<td><input type=\"integer\" name=\"totalHobbies\"></td>";     
echo "</tr>";

echo "<tr>";
echo "<td>Weight:</td>";
echo "<td><input type=\"integer\" name=\"weight\"></td>";
echo "</tr>";

echo "<tr>";
echo "<td>&nbsp;</td>";
echo "<td><input type=\"submit\" value=\"Continue\"></td>";
echo "</tr>";
echo "</table>";

echo "</form>";

echo"<button onclick=\"location.href='index.html'\">Home page</button>";     //Link to home page    
?>
