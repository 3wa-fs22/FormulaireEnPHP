
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire d'inscription</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <form action="traitement.php" method="POST" enctype="multipart/form-data">
    <div class="avatar-container">
      <input type="file" name="avatar" id="avatar" class="file-upload" onchange="changeAvatar()">
      <label for="avatar" class="avatar-label" title="Changer votre avatar">
        <img class="avatar" src="images/image-placeholder.jpg">
      </label>
    </div>
    <input type="text" placeholder="Nom et prénom" name="nom">
    <input type="email" placeholder="E-mail" name="email">
    <input type="password" placeholder="Mot de passe" name="password">
    <div class="checkbox-container">
      <input type="checkbox" name="newsLetter" id="newsLetter" checked>
      <label for="newsLetter">S'inscrire à la newsletter</label>
    </div >
    <button type="submit">Envoyer</button>
  </form>
  <script>
    function changeAvatar(){
      const input = document.querySelector(".file-upload");
      let fileReader = new FileReader();
      let file = input.files[0];
      fileReader.readAsDataURL(file);
      fileReader.onloadend = (e) => {
        console.log(e.target.result);
        document.querySelector(".avatar").src = e.target.result;
      }
    }
  </script>
</body>
</html>

