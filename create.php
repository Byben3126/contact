<?php
require 'core/class/contact.php';

function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['name']) && isset($_POST['number']) && isset($_POST['mail']) && isset($_POST['age']) && isset($_POST['speciality']) && isset($_POST['lastDiploma'])) {
        $name = valid_donnees($_POST['name']);
        $number = valid_donnees($_POST['number']);
        $mail = valid_donnees($_POST['mail']);
        $age = valid_donnees($_POST['age']);
        $speciality = valid_donnees($_POST['speciality']);
        $lastDiploma = valid_donnees($_POST['lastDiploma']);
        $urlPicture = isset($_POST['urlPicture']) ? valid_donnees($_POST['urlPicture']) : "";
    
        Contact::createContact($name, $number, $mail , $age, $speciality, $lastDiploma, $urlPicture);
        header('Location: read.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css"/>

    <link href="css/font.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <link href="css/header.css" rel="stylesheet" />
    <link href="css/edit.css" rel="stylesheet" />
    
</head>
<body>
    <?php require 'components/header.php' ?>

    <form class="containerEditUser" method="post" action="#">
        <div class="editUser">
            <div class="picture"  id="picture">
                <input name="urlPicture" id="inputUrlPicture" hidden></input>
                <i class="fa-regular fa-pen"></i>
                <?php echo "<img id='imgPicture' src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHnPmUvFLjjmoYWAbLTEmLLIRCPpV_OgxCVA&usqp=CAU'>"; ?>
            </div>
            <div class="mainInfo">
                <div class="lastName">
                    <label>Nom Prenom</label>
                    <div class="containerInput">
                        <input name="name" value="">
                    </div>
                </div>
                <div class="number">
                    <label>Télephone</label>
                    <div class="containerInput">
                        <input name="number" value="">
                        
                    </div>
                </div>
                <div class="email">
                    <label>Email</label>
                    <div class="containerInput">
                        <input name="mail" value="">
                        
                    </div>
                </div>
            </div>
            <div class="mainInfo">
                <div class="age">
                    <label>Age</label>
                    <div class="containerInput">
                        <input name="age" value="" maxlength="3">
                        
                    </div>
                </div>
                <div class="specialité">
                    <label>Spécialité</label>
                    <div class="containerInput">
                        <input name="speciality" value="">
                        
                    </div>
                </div>
                <div class="diplome">
                    <label>Dernier diplome</label>
                    <div class="containerInput">
                        <input name="lastDiploma" value="">    
                    </div>
                </div>
            </div>
        </div>
        <div class="btns">
            <button type="submit">Ajouter</button>
        </div>
    </form>

    <script src="js/edit.js"></script>
</body>
</html>