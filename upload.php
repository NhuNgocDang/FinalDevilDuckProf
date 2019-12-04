<?php
    if (file_exists($_FILES["file"]["name"]))
    {
        $data=json_encode(array("filePath"=>$_FILES["file"]["name"]));
        header('content-type:application/json;charset=utf-8');
        echo $data;
    }else{
        move_uploaded_file($_FILES["file"]["tmp_name"],$_FILES["file"]["name"]);
        $data=json_encode(array("filePath"=>$_FILES["file"]["name"]));
        header('content-type:application/json;charset=utf-8');
        echo $data;
    }
?>
