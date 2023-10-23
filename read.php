
<?php
    session_start();
    require 'core/class/contact.php';
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
    <link href="css/index.css" rel="stylesheet" />
    
</head>
<body>

   <?php require 'components/header.php' ?>

    <div class="containerListUser">
        <div class="listUser">
            <div class="legende">
                <p class="picture">Photo</p>
                <p class="name">Nom Prenom</p>
                <p class="number">Télephone</p>
                <p class="mail">Email</p>
                <p class="age">Age</p>
                <p class="speciality">Spécialité</p>
                <p class="lastDiploma">Dernier diplome</p>
            </div>
            <div class="list">

            <?php

                $contacts = Contact::getContacts(
                    isset($_GET['sort']) ? ($_GET['sort'] == 'id' ? 'id DESC' : $_GET['sort']) : "id DESC",
                    isset($_GET['valueSearch']) ? $_GET['valueSearch'] : "",
                    isset($_GET['selectSearch']) ? $_GET['selectSearch'] : "name"
                );
                for ($i=0; $i < count($contacts); $i++) { 
                    $contact = $contacts[$i];
                    echo "<div class='item'>
                            <div class='picture'>
                                <img src='". (isset($contact['urlPicture']) && $contact['urlPicture'] !== "" ? $contact['urlPicture'] : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHnPmUvFLjjmoYWAbLTEmLLIRCPpV_OgxCVA&usqp=CAU') ."'>
                                </div>
                                <div class='name'>".$contact['name']."</div>
                                <div class='number'>".$contact['number']."</div>
                                <div class='mail'>".$contact['mail']."</div>
                                <div class='age'>".$contact['age']."</div>
                                <div class='speciality'>".$contact['speciality']."</div>
                                <div class='lastDiploma'>".$contact['lastDiploma']."</div>
                                <div class='btns'>
                                    <a class='fa-regular fa-pen' href='update.php?idContact=".$contact['id']."&valueSearch=". (isset($_GET['valueSearch']) ? $_GET['valueSearch'] : '') ."&selectSearch=". (isset($_GET['selectSearch']) ? $_GET['selectSearch'] : 'name') ."&sort=". (isset($_GET['sort']) ? $_GET['sort'] : 'id') ."'</a>
                                    <a class='fa-regular fa-trash' href='delete.php?idContact=".$contact['id']."'></a>
                                   
                            </div>
                        </div>";
                }
             
            ?>  
            </div>
        </div>
    </div>
</body>
</html>