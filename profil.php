<?php
session_start();
echo  'hello'.$_SESSION['nom'];
        ?>

<?php
include('config.php');
$query = "SELECT * FROM student";
$stmt = $conn->query($query);
$query2 = "SELECT * FROM teachers";
$stmt2 = $conn->query($query2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRONOTE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        
        #wrapper {
            display: flex;
       }

        #sidebar-wrapper {
            width: 250px;
            background-color: #f8f9fa;
            padding-top: 50px; 
        }

        .sidebar-heading {
            padding: 10px 15px;
            font-weight: bold;
        }

        .list-group-item {
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }

        .list-group-item:hover {
            background-color: #e9ecef;
        }

        
        #page-content-wrapper {
            flex: 1;
        }

        .container {
            display: none;
            padding: 20px;
        }

        .container h2 {
            color: #6c757d; 
        }

        .container p {
            color: #343a40; 
        }
    </style>
</head>
<body>

<div id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Menu</div>
        <div class="list-group list-group-flush">
            <a href="#étudiants" class="list-group-item list-group-item-action">Liste des étudiants</a>
            <a href="#professeurs" class="list-group-item list-group-item-action">Liste des professeurs</a> 
            <a href="#logout" class="list-group-item list-group-item-action">log out</a>
        </div>
    </div>
    
        
        
   <div class="container mt-5" id="contenu-étudiants">
        <form method="post" action="./recherche-Student.php">
        <input type="text" id="search" name="search" placeholder="Entrez votre recherche ici" style="width: 800px;">
    <button type="submit">Rechercher</button>
    <button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target="#exampleModal">
                ADD </button>
       </form>
    
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="./create-Student.php" method="post">
                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrez votre nom">
                                </div>
                                <div class="form-group">
                                    <label for="prenom">Prénom</label>
                                    <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Entrez votre prénom">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Entrez votre email">
                                </div>
                                <div class="form-group">
                                    <label for="telephone">Téléphone</label>
                                    <input type="text" class="form-control" name="Téléphone" id="telephone" placeholder="Entrez votre téléphone">
                                </div>
                                <div class="form-group">
                                    <label for="classe">Classe</label>
                                    <select class="form-control" name="classe" id="classe">
                                        <option value="CP">CP</option>
                                        <option value="CE1">CE1</option>
                                        <option value="CE2">CE2</option>
                                        <option value="CM1">CM1</option>
                                        <option value="CM2">CM2</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="adresse">Adresse</label>
                                    <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Entrez votre adresse">
                                </div>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
	<table class="table table-bordered text-center"> 
	<tr class="bg-dark text-white">
			  <th> id </th> 
			  <th> nom </th> 
			  <th> prenom </th> 
			  <th> Téléphone </th> 
			  <th> adresse </th> 
			  <th> email </th> 
			  <th> classe </th> 
              <th> Edit </th> 
			  <th> Delete </th>
		</tr> 
		
		<?php while($rows= $stmt->fetch(PDO::FETCH_ASSOC)) 
		{ 
		?> 
		<tr>
    <td><?php echo $rows['id']; ?></td>
    <td><?php echo $rows['nom']; ?></td>
    <td><?php echo $rows['prenom']; ?></td>
    <td><?php echo $rows['Téléphone']; ?></td>
    <td><?php echo $rows['adresse']; ?></td>
    <td><?php echo $rows['email']; ?></td>
    <td><?php echo $rows['classe']; ?></td>
    <td><a href="Student-edit.php?id=<?php echo $rows['id']; ?>" class="btn btn-primary">EDIT</a></td>
    <td>
        <form action="delete.php" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer cet étudiant ?');">
            <input type="hidden" name="student_id" value="<?php echo $rows['id']; ?>">
            <button class="btn btn-danger" type="submit" name="delete_student_btn">DELETE</button>
            
         </form>
    </td>
</tr>

	<?php 
               } 
          ?> 

	</table> 
	 
        </div>

        <div class="container mt-5" id="contenu-professeurs">
        <form method="post" action="./recherche-Teacher.php">
        <input type="text" id="search" name="search" placeholder="Entrez votre recherche ici" style="width: 800px;">
    <button type="submit">Rechercher</button>
    <button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target="#exampleModalTeacher">
                ADD </button>
       </form>

        
                <div class="modal fade" id="exampleModalTeacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelTeach" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add teacher</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="./create-Teacher.php" method="post">
                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrez votre nom">
                                </div>
                                <div class="form-group">
                                    <label for="prenom">Prénom</label>
                                    <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Entrez votre prénom">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Entrez votre email">
                                </div>
                                <div class="form-group">
                                    <label for="telephone">Téléphone</label>
                                    <input type="text" class="form-control" name="Téléphone" id="telephone" placeholder="Entrez votre téléphone">
                                </div>
                                <div class="form-group">
                                    <label for="classe">Classe</label>
                                    <select class="form-control" name="classe" id="classe">
                                        <option value="CP">CP</option>
                                        <option value="CE1">CE1</option>
                                        <option value="CE2">CE2</option>
                                        <option value="CM1">CM1</option>
                                        <option value="CM2">CM2</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="adresse">Adresse</label>
                                    <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Entrez votre adresse">
                                </div>
                                <button type="submit" class="btn btn-primary">ADD</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
	
	<table class="table table-bordered text-center"> 
	<tr class="bg-dark text-white">
			  <th> id </th> 
			  <th> nom </th> 
			  <th> prenom </th> 
			  <th> Téléphone </th> 
			  <th> adresse </th> 
			  <th> email </th> 
			  <th> classe </th> 
              <th> Edit </th> 
			  <th> Delete </th>
		</tr> 
		
		<?php while($rows= $stmt2->fetch(PDO::FETCH_ASSOC)) 
		{ 
		?> 
		<tr>
    <td><?php echo $rows['id']; ?></td>
    <td><?php echo $rows['nom']; ?></td>
    <td><?php echo $rows['prenom']; ?></td>
    <td><?php echo $rows['Téléphone']; ?></td>
    <td><?php echo $rows['adresse']; ?></td>
    <td><?php echo $rows['email']; ?></td>
    <td><?php echo $rows['classe']; ?></td>
    <td><a href="Teacher-edit.php?id=<?php echo $rows['id']; ?>" class="btn btn-primary">EDIT</a></td>
    <td>
        <form action="delete-teacher.php" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer ce professeur ?');">
            <input type="hidden" name="student_id" value="<?php echo $rows['id']; ?>">
            <button class="btn btn-danger" type="submit" name="delete_teacher_btn">DELETE</button>
            
         </form>
    </td>
</tr>

	<?php 
               } 
          ?> 

	</table> 
	  </div>

      <div class="container mt-5" id="contenu-logout">
            
      <a href="./logout.php">
    <button type="button" class="btn btn-primary">Bouton avec lien</button>
</a>

    
              

            </div>


      
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $(".list-group-item").click(function() {
            var target = $(this).attr("href").substring(1); 
            $(".container").hide();
            $("#contenu-" + target).show();
        });
    });
</script>



</body>
</html>
