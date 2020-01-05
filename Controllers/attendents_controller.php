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


function view(&$data){
    $data['attendents_data'] = attends_get_data();
    $data['page'] = "attendents/view";
}
function setpermission(&$data){
    $data['class_data'] = get_class_data();
   $data['subject_data'] = get_subject_data();
    $data['page'] = "attendents/addpermission";
}

function permission(&$data) {
    $add_data =  attendents_add_permission($_POST);
    if($add_data) {
        $action = "view";
    }else {
        $action = "setpermission";
    }
    header("Location: index4.php?action=$action");
} 

//delete function
function delete(&$data) {
    //code here
    $result = m_delete_atttendents();
    if($result) {
        $action = "view";
    }else {
        echo "Cannot delete this record!!!";
    }
    header("Location: index4.php?action=$action");
}

// edit
function edit(&$data){
    $data['attendents_data'] = edit_attendant();
    $data['class_data'] = get_class_data();
    $data['subject_data'] = get_subject_data();

    $data['page'] = "attendents/edit";
}
function edit_form(&$data){
    $result = attendant_edit();
    if($result){
        $action = "view";
    }else{
        echo("cannot edit");
    }
    header("Location:index4.php?action= $action");
}



