
 <?php
function attends_get_data() {

    $query = "SELECT att.id,firstname,lastname,sex,permission,description,cl.title 
                FROM attendents att 
                LEFT JOIN class cl ON cl.id = att.class_id ";
    include "connection.php";   
  
    $result = mysqli_query($connection,$query);
 
    $rows = [];
   
    if($result && mysqli_num_rows($result) > 0 ){
        foreach ($result as $record) {
           
            $rec = [];
            $subject = [];
            $querySubject = "SELECT sub_title FROM subjects su
                                INNER JOIN attendents_subjects ats ON su.id = ats.subjects_id
                                INNER JOIN attendents att ON att.id = ats.attendents_id
                                WHERE att.id=".$record['id'];
      
            $res = mysqli_query($connection,$querySubject);
       
            foreach($res as $sub){
               array_push($subject,$sub['sub_title']);               
            }
           
            $rec = $record;
            $rec['sub_title'] = $subject;      
            array_push($rows,$rec);
        }
        
    }
  
    return $rows;
}

function attendents_add_permission($data)
{
    include "connection.php";
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $sex = $_POST['sex'];
    $class_id = $_POST['class'];
    $subjects= $_POST['subjects'];
    $permissions= $_POST['permissions'];
    $description= $_POST['description'];

    $query = "INSERT INTO attendents(firstname,lastname,sex,permission,description, class_id)
              VALUES('$firstname','$lastname','$sex','$permissions','$description','$class_id')";
    mysqli_query($connection, $query);

    foreach ($subjects as $subject) {
        $last_attendents = "SELECT id FROM attendents ORDER BY id DESC LIMIT 1";
        $last_attendents = mysqli_query($connection, $last_attendents);
       
        foreach($last_attendents  as $student_id ){
            $id = $student_id['id'];
            $query_subject = "INSERT INTO  attendents_subjects(attendents_id, subjects_id) VALUES($id,$subject)";
        }
        $result = mysqli_query($connection, $query_subject);
    } 
    return $result;
}





function get_class_data()
{
    $query = "select * from class";
    include "connection.php";
    $result = mysqli_query($connection, $query);
    $rows = [];
    if ($result && mysqli_num_rows($result) > 0) {
        foreach ($result as $record) {
            $rows[] = $record;
        }
    }
    return $rows;
}

function get_subject_data()
{
    $query = "select * from subjects";
    include "connection.php";
    $result = mysqli_query($connection, $query);
    $rows = [];
    if ($result && mysqli_num_rows($result) > 0) {
        foreach ($result as $record) {
            $rows[] = $record;
           
        }
    }
    return $rows;
}

