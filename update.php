<?php
require 'core/class/contact.php';
$contact = false;

if (isset($_GET['idContact'])) {
    $contact = Contact::getContact($_GET['idContact']);
}

if(!$contact){
    header('Location: read.php');
    exit;
}

function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $idContact = isset($_GET['idContact']) ? valid_donnees($_GET['idContact']) : false;
    $name = isset($_POST['name']) ? valid_donnees($_POST['name']) : false;
    $number = isset($_POST['number']) ? valid_donnees($_POST['number']) : false;
    $mail = isset($_POST['mail']) ? valid_donnees($_POST['mail']) : false;
    $age = isset($_POST['age']) ? valid_donnees($_POST['age']) : false;
    $speciality = isset($_POST['speciality']) ? valid_donnees($_POST['speciality']) : false;
    $lastDiploma = isset($_POST['lastDiploma']) ? valid_donnees($_POST['lastDiploma']) : false;
    $urlPicture = isset($_POST['urlPicture']) ? valid_donnees($_POST['urlPicture']) : false;

    if ($name && $number && $mail && $age && $speciality && $lastDiploma) {
        Contact::updateContact($idContact, $name, $number, $mail , $age, $speciality, $lastDiploma, $urlPicture);
        $contact['name'] = $name;
        $contact['number'] = $number;
        $contact['mail'] = $mail;
        $contact['age'] = $age;
        $contact['speciality'] = $speciality;
        $contact['lastDiploma'] = $lastDiploma;
        $contact['urlPicture'] = $urlPicture;
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
            <div class="picture" id="picture">
                <input name="urlPicture" id="inputUrlPicture" hidden value="<?php echo ($contact ? $contact['urlPicture'] : '') ?>"></input>
                <i class="fa-regular fa-pen"></i>
                <?php echo "<img id='imgPicture' src='". (isset($contact['urlPicture']) && $contact['urlPicture'] !== "" ? $contact['urlPicture'] : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHnPmUvFLjjmoYWAbLTEmLLIRCPpV_OgxCVA&usqp=CAU') ."'>"; ?>
            </div>
            <div class="mainInfo">
                <div class="lastName">
                    <label>Nom Prenom</label>
                    <div class="containerInput">
                        <input name="name" value="<?php echo ($contact ? $contact['name'] : '') ?>">
                    </div>
                </div>
                <div class="number">
                    <label>Télephone</label>
                    <div class="containerInput">
                        <input name="number" value="<?php echo ($contact ? $contact['number'] : '') ?>">
                        
                    </div>
                </div>
                <div class="email">
                    <label>Email</label>
                    <div class="containerInput">
                        <input name="mail" value="<?php echo ($contact ? $contact['mail'] : '') ?>">
                        
                    </div>
                </div>
            </div>
            <div class="mainInfo">
                <div class="age">
                    <label>Age</label>
                    <div class="containerInput">
                        <input name="age" value="<?php echo ($contact ? $contact['age'] : '') ?>">
                        
                    </div>
                </div>
                <div class="specialité">
                    <label>Spécialité</label>
                    <div class="containerInput">
                        <input name="speciality" value="<?php echo ($contact ? $contact['speciality'] : '') ?>">
                        
                    </div>
                </div>
                <div class="diplome">
                    <label>Dernier diplome</label>
                    <div class="containerInput">
                        <input name="lastDiploma" value="<?php echo ($contact ? $contact['lastDiploma'] : '') ?>">    
                    </div>
                </div>
            </div>
        </div>
        <div class="btns">
            <button type='submit'>Enregistrer</button>
        </div>
    </form>

    <script src="js/edit.js"></script>
</body>
</html>