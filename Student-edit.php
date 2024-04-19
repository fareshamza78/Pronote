<?php
include('config.php');
$query = "SELECT * FROM student";
$stmt = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Edit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>


<button type="button" class="btn btn-primary mt-5" data-toggle="modal" data-target="#exampleModal">
  Edit Student
</button>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body"> 
      <?php
if(isset($_GET['id'])){
$student_id=$_GET['id'];
$query = "SELECT * FROM student WHERE id=:stud_id LIMIT 1 ";
$statement = $conn->prepare($query);
$data=[':stud_id'=>$student_id];
$statement->execute($data);

$result = $statement->fetch(PDO::FETCH_ASSOC);
}

?>   

        <form action="./code.php" method="post">
        <input type="hidden" class="form-control" name="student_id" value="<?php echo $result['id']; ?>" id="nom" placeholder="Entrez votre nom">

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" value="<?php echo $result['nom']; ?>" id="nom" placeholder="Entrez votre nom">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" name="prenom" value="<?php echo $result['prenom']; ?>" id="prenom" placeholder="Entrez votre prénom">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $result['email']; ?>" id="email" placeholder="Entrez votre email">
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="tel" class="form-control" name="Téléphone" value="<?php echo $result['Téléphone']; ?>" id="telephone" placeholder="Entrez votre téléphone">
            </div>
            <div class="form-group">
                <label for="classe">Classe</label>
                <select class="form-control" name="classe"  id="classe">
                    <option value="CP">CP</option>
                    <option value="CE1">CE1</option>
                    <option value="CE2">CE2</option>
                    <option value="CM1">CM1</option>
                    <option value="CM2">CM2</option>
               
                </select>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
           <input type="text" class="form-control" name="adresse" value="<?php echo $result['adresse']; ?>" id="adresse" placeholder="Entrez votre adresse">
            </div>
            <button type="submit" name="update_student_btn" class="btn btn-primary">MODIFIER</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
