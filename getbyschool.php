<?php

$query = "select publication.citation, faculty.last_name, faculty.first_name, school.name from publication
    inner join faculty_publication on publication.id=faculty_publication.publication_id
    inner join faculty on faculty_publication.faculty_id = faculty.id
    inner join faculty_school on faculty.id = faculty_school.faculty_id
    inner join school on faculty_school.school_id = school.id 
    where publication.publication_date = $date AND
        faculty.last_name like '%$last%' AND faculty.first_name LIKE '%$first%' ORDER BY faculty.last_name ASC";


?>
