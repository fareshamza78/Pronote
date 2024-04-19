<?php
require('./config.php');
$query = $conn->prepare("SELECT * FROM users WHERE email = ?");
$query->execute([$_POST['email']]);
$user = $query->fetch();
if ($user && ($_POST['password']==$user['password' ]))
{session_start();
    $_SESSION["nom"] = $user['nom'];
    $_SESSION["prenom"] = $user['prenom'];
    $_SESSION["email"] = $user['email'];
    $_SESSION["password"] = $user['password'] ;
   header('Location: profil.php');
 //echo "Identifiant valid ";
} else {
    echo '<script>alert("Welcome to Geeks for Geeks")</script>';
    header('Location: index.php');
}
?>