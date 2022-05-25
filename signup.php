<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/stylepopup.css">
    <title>Trouve-Moi</title>
</head>
<body>
        <div class="container">
            <?php
                require('config.php');
                if (isset($_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['phone'], $_REQUEST['genre'], $_REQUEST['email'], $_REQUEST['psw'])){
                    
                    $nom = stripslashes($_REQUEST['nom']);
                    $nom = mysqli_real_escape_string($connection, $nom); 

                    $prenom = stripslashes($_REQUEST['prenom']);
                    $prenom = mysqli_real_escape_string($connection, $prenom);
                    
                    $phone = stripslashes($_REQUEST['phone']);
                    $phone = mysqli_real_escape_string($connection, $phone); 

                    $genre = stripslashes($_REQUEST['genre']);
                    $genre = mysqli_real_escape_string($connection, $genre); 
                    
                    $email = stripslashes($_REQUEST['email']);
                    $email = mysqli_real_escape_string($connection, $email);
                    
                    $psw = stripslashes($_REQUEST['psw']);
                    $psw = mysqli_real_escape_string($connection, $psw);
                    //requéte SQL + mot de passe crypté
                    $query = "INSERT into `users` (nom, prenom, phone, genre, email, psw) VALUES ('$nom', '$prenom', '$phone', '$genre', '$email', '$psw')";
                    // Exécuter la requête sur la base de données
                    $res = mysqli_query($connection, $query);
                    if($res){
                        header("Location: index.php");
                    }
                }else{
            ?>
            <nav class="flex-container">
                <h1>ILO Projet</h1>
                <div class="menu">
                    <button onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-user"></i> S'inscrire</button>
                </div>
            </nav>    


            <!-- The Modal -->
				<div id="id01" class="modal">
					<span onclick="document.getElementById('id01').style.display='none'"class="close" title="Close Modal">&times;</span>

					<!-- Modal Content -->
					<form class="modal-content animate" action="" method="post">
						<div class="imgcontainer">
							<img src="" alt="INSCRIPTION" class="avatar">
						</div>

						<div class="container">
							<label for="nom"><b>Nom</b></label>
							<input type="text" placeholder="Votre nom" name="nom" required>

							<label for="prenom"><b>Prénom</b></label>
							<input type="text" placeholder="Votre prénom" name="prenom">

							<label for="phone"><b>Téléphone</b></label>
							<input class="form-control" type="text" placeholder="Votre numéro téléphone" name="phone">

						
							<br><label for="email"><b>Email</b></label>
							<input type="text" placeholder="Votre adresse email" name="email" required>

							<label for="psw"><b>Mot de passe</b></label>
							<input type="password" placeholder="Votre mot de passe" name="psw" required>

							<label for="genre"><b>Genre: </b></label>
							<label for="">Homme </label><input type="radio" name="genre" id="" value="homme" class="">
							<label for="">Femme </label><input type="radio" name="genre" id="" value="femme">


							<button type="submit">S'inscrire</button>
						</div>

						<div class="container" style="background-color:#f1f1f1">
							<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Annuler</button>
							<span class="psw">Mot de passe <a href="#">oublié?</a></span>
						</div>
					</form>
				</div>
        </div>
            <?php } ?>
    <script src="js/stylepopup.css"></script>
</body>
</html>