<?php
$data = array();
get_action($data);

function get_action(&$data){
    $function = 'view';
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        $function = $action;
    }
    $function($data);
}
function view(&$data) {
    $data['student_data'] = m_get_data();
    $data['page'] = "students/view";
}
//add functioin
function add(&$data) {
    $data['class_data'] = get_class_data();
    $data['subject_data'] = get_subject_data();
    $data['page'] = "students/add";
}
//form_data function
function form_data(&$data) {
    $add_data = student_add_data($_POST);
    if($add_data) {
        $action = "view";
    }else {
        $action = "add";
    }
    header("Location: index1.php?action=$action");
}

// edit student

function edit(&$data) {
    $data['student'] = student_detail();
    $data['class'] = get_class_data();
    $data['page'] = "students/edit";
}

function edit_data(&$data) {
    $edit = student_edit($_POST);
    if($edit) {
        $action = "view";
    }else {
        echo "Error";
    }
    header("Location: index1.php?action=$action");
}

//delete function
function delete(&$data) {
    //code here
    $result = m_delete();
    if($result) {
        $action = "view";
    }else {
        echo "Cannot delete this record!!!";
    }
    header("Location: index1.php?action=$action");
}









