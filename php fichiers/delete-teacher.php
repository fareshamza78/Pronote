<?php
require('./config.php');

if(isset($_POST['delete_teacher_btn'])) {
    $student_id = $_POST['student_id'];
    header('Location: profil.php');
    try {
        $query = "DELETE FROM teachers WHERE id=:stud_id";
        $statement = $conn->prepare($query);
        $statement->bindParam(':stud_id', $student_id);
        
        $query_execute = $statement->execute();

        

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
