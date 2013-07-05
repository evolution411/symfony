
<?php
 require_once 'connect.php';
 include_once 'functions.php';
ini_set('memory_limit', '256M');
/*
if (count($argv) < 4) {
  exit("Not enough arguments\n");
}

$ils_dumpname = $argv[1];
$control_filename = $argv[2];
$output_marcname = $argv[3];

if (!is_readable($ils_dumpname) || !is_readable($control_filename)) {
  exit("Could not open files\n");
}*/
$f1 = "output.txt";
$f2 = "output2.txt";
if(!is_readable($f1)||!is_readable($f2)){
    echo "cannot read the file";
}
/*
$ff1 = fopen($f1, 'r');
$ff2 = fopen($f2,'w');
$unword = " <p>";

while(!feof($ff1)){
$line = fgets($ff1);
fwrite($ff2, $line);
}

*/


?>

<?php
//$submit = isset($_POST['submit']);
/*if(isset($_POST['submit'])){
    $type = $_POST['pub_type'];
    $year = $_POST['pub_date'];
    $fn = $_POST['firstname'];
    $ln = $_POST['lastname'];
    $school = $_POST['school'];
    $result = getinfo($type, $year,$fn,$ln,$school);
    echo $result[1];
    
}*/
?>
<div id="search">
<form action='result.php' method='post'>
    <table><tr>
<td>Publication Type:</td>
<td>
<select name='pub_type'>
     <?php 
    $query = "select * from publication_type";
    $result = mysql_query($query) or die(mysql_error());
       echo "<option value=''>All Publication Type </option>";
        while($row = mysql_fetch_assoc($result)){
            echo "<option value = '".$row['id']."'>" . $row['name'] . "</option>";
        }
        ?>
        
    </select>
</td>
</tr>
<tr>
<?php
$current = date("Y");
$years = range($current,1950);
echo"<td>Year:</td>";
echo"<td>";
echo "<select name='pub_date'>";
    foreach($years as $year){
        echo "<option value= \"$year\">$year</option>";
        
    }
echo "</select>";

?>
    </td>
</tr>
<br>
<tr><td>
School: </td><td>
<select name="school">
   
<?php 
    
    $query_school = "select * from school";
    
        $result_s = mysql_query($query_school) or die(mysql_error());
       echo"<option value=''>All Schools</option>";
        while($row = mysql_fetch_assoc($result_s)){
            echo "<option value = '".$row['id']."'>" . $row['name'] . "</option>";
        }  
?>
</select></td>
<br>
<tr><td>
Author:</td><td></td></tr><tr><td>
First Name:</td><td> <input type="text" name="firstname"></td></tr>
<tr><td>Last Name:</td><td> <input type ="text" name ="lastname"></td></tr><br>
<tr><td>
<input type='submit' value='Search' name='submit'>
    </td><td></td></tr>    </table>
</form>
</div>