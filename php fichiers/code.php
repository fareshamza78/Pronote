<?php

require('./config.php');

if(isset($_POST['update_student_btn'])){
    $student_id = $_POST['student_id'];
    $Nom = $_POST['nom'];
    $Prenom = $_POST['prenom']; 
    $email = $_POST['email'];
    $Telephone = $_POST['Téléphone']; 
    $Adresse = $_POST['adresse'];
    $Classe = $_POST['classe'];

    try {
        $query = "UPDATE student SET nom=?,prenom=?,email=?,Téléphone=?,adresse=?,classe=? WHERE id= $student_id  LIMIT 1"; 
        $statement = $conn->prepare($query);

        $data = [$Nom,$Prenom,$email,$Telephone,$Adresse,$Classe,];

        $query_execute = $statement->execute($data);

        if ($query_execute) {
            header('Location: profil.php');
            echo "Les données de l'étudiant ont été mises à jour avec succès.";
        } else {
            echo "Échec de la mise à jour des données de l'étudiant.";
        }

    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour des données de l'étudiant : " . $e->getMessage();
    }
}
?>
