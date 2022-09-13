<?php

class Database{

//------------------------------------------------------------------ connection database function

private $connection;

private function set_connection(){
    $database_name = "mysql:host=localhost;dbname=quizz";
    $database_username = "root";
    $database_password = "root";

    try {
        $pdo = new PDO($database_name, $database_username, $database_password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        if ($pdo != null){
            return $pdo;
        }
    } catch (PDOException $e) {
        echo 'Error : ' . $e->getMessage();
    }
    return null;
}

private function del_connection(){
    return null;
}

//------------------------------------------------------------------ questions function

public function get_questions_lv1($select){

    $this->connection = $this->set_connection();

    if($this->connection != null){
        $stmt = $this->connection->prepare("select " . $select . " from questions_lv1");
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    $this->connection = $this->del_connection();
}

//------------------------------------------------------------------ answers function

public function get_answers_lv1($select, $id_questions_lv1){

    $this->connection = $this->set_connection();

    if ($this != null) {
        $stmt = $this->connection->prepare("select " . $select . " from answers_lv1 where idquestions_lv1 = :id_question_lv1");
        $stmt->bindValue(":id_question_lv1", $id_questions_lv1);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    $this->connection = $this->del_connection();
}


}

?>