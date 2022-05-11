<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Traitement</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  
<?php
extract($_POST);

$imageEnregistree = false;

if(isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
  if($_FILES['avatar']['size'] <= 1000000) {
      $filename = pathinfo($_FILES['avatar']['name']);
      $extension = $filename["extension"];
      $allowedExtensions = array("png", "jpg", "jpeg", "gif");
      if(in_array($extension, $allowedExtensions)) {
          move_uploaded_file($_FILES['avatar']['tmp_name'], 'images/' . basename(time() . trim($_FILES['avatar']['name'])));
          $imageEnregistree = true;
      } else {
          echo "<h3>Votre fichier n'est pas pris en compte !</h3>";
      }
  } else {
      echo "<h3>Votre image est trop grande !</h3>";
  }
} else {
  echo "<h3>Nous rencontrons une erreur, veuillez réessayer plus tard !<h3>";
}
if ($imageEnregistree){

  if(!empty($nom) && !empty($email) && !empty($password)){
    file_put_contents(
      "user.txt","Nom : "
      . htmlspecialchars($nom) 
      . "\n" ."Email: "
      . htmlspecialchars($email) 
      . "\n"
      ."Mot de passe : " 
      . htmlspecialchars($password) 
      . "\n"
    );
  echo "<h2>Merci $nom. Votre enregistrement est effectué avec succes !<h2>";
  } else {
    echo "<h3>Merci de renseigner tous les champs !<h3>";
  }

  if (empty($newsLetter)){
    setcookie("newsLetter",0);
  }else{
    setcookie("newsLetter",1);
  }
}
?>
</body>
</html>