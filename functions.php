
<?php
echo ' <link rel="stylesheet" href="style.css" type="text/css">';
require_once 'connect.php';
function getinfo($subject,$date,$first,$last,$school){  
    //$results = array();
    if($subject==''){
       if($school==''){
       $query = "select publication.citation, faculty.last_name, faculty.first_name from publication inner join faculty_publication on publication.id=faculty_publication.publication_id
        inner join faculty on faculty_publication.faculty_id = faculty.id where publication.publication_date = $date AND
        faculty.last_name like '%$last%' AND faculty.first_name LIKE '%$first%' ORDER BY faculty.last_name ASC";
       }
       else{
           $query = "select publication.citation, faculty.last_name, faculty.first_name from publication inner join faculty_publication on publication.id=faculty_publication.publication_id
                    inner join faculty on faculty_publication.faculty_id = faculty.id inner join faculty_school on faculty.id=faculty_school.faculty_id inner join school on faculty_school.school_id = school.id where publication.publication_date = $date
                    AND school.id=$school AND faculty.last_name like '%$last%' AND faculty.first_name LIKE '%$first%' ORDER BY faculty.last_name ASC";
       }
    }else{
    if($school==''){
          $query = "select publication.citation, faculty.last_name, faculty.first_name from publication inner join faculty_publication on publication.id=faculty_publication.publication_id
        inner join faculty on faculty_publication.faculty_id = faculty.id where publication.publication_type_id = $subject AND publication.publication_date = $date AND
        faculty.last_name like '%$last%' AND faculty.first_name LIKE '%$first%' ORDER BY faculty.last_name ASC";  
        
    }
    else{
            $query = "select publication.citation, faculty.last_name, faculty.first_name from publication inner join faculty_publication on publication.id=faculty_publication.publication_id
            inner join faculty on faculty_publication.faculty_id = faculty.id inner join faculty_school on faculty.id=faculty_school.faculty_id inner join school on faculty_school.school_id = school.id where publication.publication_type_id = $subject AND publication.publication_date = $date
            AND school.id=$school AND faculty.last_name like '%$last%' AND faculty.first_name LIKE '%$first%' ORDER BY faculty.last_name ASC";
            
    }}
    $result = mysql_query($query);
    if (!$result) { // add this check.
    die('Invalid query: ' . mysql_error());
}

else{
    echo "<div id='display'>";
     $num = mysql_num_rows($result);
     if($num>0){
     while($row = mysql_fetch_array($result)){
        $name = $row['last_name'];
        $cit = $row['citation'];
        echo $name;
        echo $cit;
     }
    }
    
    else{
            echo "<b>NO RESULT!</b>";
        }echo "</div>"; 
}
}

?>
