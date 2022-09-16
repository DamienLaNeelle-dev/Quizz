<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/Quizz/View/css/border.css">
    <link rel="stylesheet" href="/Quizz/View/css/color.css">
    <link rel="stylesheet" href="/Quizz/View/css/flexbox.css">
    <link rel="stylesheet" href="/Quizz/View/css/margin_padding.css">
    <link rel="stylesheet" href="/Quizz/View/css/width_height.css">
    <link rel="stylesheet" href="/Quizz/View/css/all.css">
    <link rel="stylesheet" href="/Quizz/View/css/fonts.css">
    <link rel="stylesheet" href="/Quizz/View/css/button.css">
    <link rel="shortcut icon" type="image/x-icon" href="../View/svg/question-solid.svg" />
    <title>Quizz - Niveau 1 - Débutant</title>
</head>
<body class="">

<?php

$path = $_SERVER["DOCUMENT_ROOT"];
$path_new = $path . "/Quizz/View/script/result_quizz_lv1.php";
include($path_new);

$result_questions_lv1 = get_quizz_lv1("questions_lv1");

if($result_questions_lv1 != []){
    echo $result_questions_lv1[$i]["questions_lv1"];
}

?>




<a href="/Quizz/Controller/controller_main.php">menu</a>
    
</body>
</html>