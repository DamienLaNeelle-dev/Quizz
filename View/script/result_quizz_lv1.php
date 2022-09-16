<?php

function get_quizz_lv1($questions){
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path_new = $path . "/Quizz/Models/Database.php";
    require_once($path_new);
    $database = new Database();

    if($questions == "questions_lv1"){
        $result_questions_lv1 = $database->get_questions_lv1_db('questions_lv1');
        return $result_questions_lv1;
    }
}

?>