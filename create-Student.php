<?php
require('./config.php');

$Email = ($_POST['email']);
$Prenom = ($_POST['prenom']);
$Nom = $_POST['nom'];
$Téléphone = $_POST['Téléphone'];
$Adresse = $_POST['adresse'];
$Classe = $_POST['classe'];
$query = $conn->prepare("SELECT * FROM student WHERE email = ?");
$query->execute([$_POST['email']]);
$student = $query->fetch();
if(!$student){
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) &&!empty($_POST['Téléphone'])&&!empty($_POST['adresse']) &&!empty($_POST['email'])&&!empty($_POST['classe'])){

        $query = $conn->prepare("INSERT INTO student (nom, prenom , Téléphone , adresse , email , classe) VALUES (?, ?,?,?,?,?)");
        $query->execute([$Nom, $Prenom, $Téléphone , $Adresse ,$Email , $Classe ]);
        
        header('Location: profil.php');
        }
        
        else {
            echo '<script>alert("Aucun étudiant ne sera ajouté , veuillez remplir tous les champs ")</script>';
            
        }
}else{
    header('Location: nosuccess.html');
}
?> 

