<?php
if($_FILES) {
    $allowed = array('pdf');

    if(isset($_FILES['filesctl']) && $_FILES['filesctl']['error'] == 0){

        $extension = pathinfo($_FILES['filesctl']['name'], PATHINFO_EXTENSION);

        if(!in_array(strtolower($extension), $allowed)){
            echo json_encode(array('status'=>'error'));
            exit;
        }

        if(move_uploaded_file($_FILES['filesctl']['tmp_name'], "..".DIRECTORY_SEPARATOR."teses".DIRECTORY_SEPARATOR.$_FILES['filesctl']['name'])){
            echo json_encode(array('status'=>$_FILES['filesctl']['name']));
            exit;
        }
        echo json_encode(array('status'=>'error'));
    }
    exit();
}