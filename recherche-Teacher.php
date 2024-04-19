<?php
include('config.php');


if(isset($_POST['search'])) {
    
    $search = htmlspecialchars($_POST['search']);
    $query = $conn->prepare("SELECT * FROM teachers WHERE nom LIKE ?");
    $query->execute(array("%$search%")); 
    $students = $query->fetchAll(); 
}
?>

<?php

if(isset($students)) {
    if(count($students) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Nom</th><th>Prénom</th><th>Email</th><th>Téléphone</th><th>Adresse</th><th>Classe</th></tr>";
        foreach($students as $student) {
            echo "<tr>";
            echo "<td>" . $student['nom'] . "</td>";
            echo "<td>" . $student['prenom'] . "</td>";
            echo "<td>" . $student['email'] . "</td>";
            echo "<td>" . $student['Téléphone'] . "</td>";
            echo "<td>" . $student['adresse'] . "</td>";
            echo "<td>" . $student['classe'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Aucun résultat trouvé pour la recherche : $search";
    }
}
?>

