<?php

function m_get_data() {

    $query = "SELECT st.id,firstname,lastname,sex,cl.title 
                FROM student st 
                LEFT JOIN class cl ON cl.id = st.class_id ";
    include "connection.php";   
  
    $result = mysqli_query($connection,$query);
 
    $rows = [];
   
    if($result && mysqli_num_rows($result) > 0 ){
        foreach ($result as $record) {
           
            $rec = [];
            $subject = [];
            $querySubject = "SELECT sub_title FROM subjects su
                                INNER JOIN student_has_subjects ss ON su.id = ss.subjects_id
                                INNER JOIN student st ON st.id = ss.student_id
                                WHERE st.id=".$record['id'];
      
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

//delet add_student
function student_add_data($data) {
    include "connection.php";
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $sex = $_POST['sex'];
    $class_id = $_POST['class'];
    $subjects= $_POST['subjects'];

    $query = "INSERT INTO student(firstname,lastname,sex,class_id)
              VALUES('$firstname','$lastname','$sex','$class_id')";
    mysqli_query($connection, $query);

    foreach ($subjects as $subject) {
        $last_attendents = "SELECT id FROM student ORDER BY id DESC LIMIT 1";
        $last_attendents = mysqli_query($connection, $last_attendents);
       
        foreach($last_attendents  as $student_id ){
            $id = $student_id['id'];
            $query_subject = "INSERT INTO student_has_subjects(student_id, subjects_id) VALUES($id,$subject)";
        }
        $result = mysqli_query($connection, $query_subject);
    } 
    return $result;
}

function student_detail() {
    include "connection.php";
    $id = $_GET['id'];
    $query = "SELECT st.id,firstname,lastname,sex,cl.title 
                FROM student st 
                LEFT JOIN class cl ON cl.id = st.class_id WHERE st.id = $id";

  
    $result = mysqli_query($connection,$query);
    return $result;
}

function get_class_data() {
    $query = "select * from class";
    include "connection.php";
    $result = mysqli_query($connection,$query);
    $rows = [];
    if($result && mysqli_num_rows($result) > 0 ){
        foreach ($result as $record) {
            $rows[] = $record;
        }
    }
    return $rows;
}

function get_subject_data() {
    $query = "select * from subjects";
    include "connection.php";
    $result = mysqli_query($connection,$query);
    $rows = [];
    if($result && mysqli_num_rows($result) > 0 ){
        foreach ($result as $record) {
            $rows[] = $record;
        }
    }
    return $rows;
}

/// delete student
function m_delete() {
    include "connection.php";
    $id = $_GET['id'];
    $result = mysqli_query($connection, "DELETE FROM student WHERE id= $id");
    return $result;
}

//// edit student 

function student_edit(&$data){
    include_once "connection.php";
    $id = $_GET['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $sex = $_POST['sex'];
    $class = $_POST['class'];
    $query = "UPDATE student SET firstname='$fname',lastname='$lname',sex='$sex',class_id='$class'  WHERE id = $id";
    $update = mysqli_query($connection,$query);
    return $update;
}



