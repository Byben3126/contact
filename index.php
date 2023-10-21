
<?php
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
    <link href="css/index.css" rel="stylesheet" />
    
</head>
<body>

    <div class="header">
        <div class="left">
            <p>Administration</p>
            <h4>List Users</h4>
        </div>
        
        <div class="right">
            <form class="containerSearchBar show" method="get" action="#">
                <div class="searchBar">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <?php
                        if(isset($_GET['valueSearch'])) {
                            echo "<input placeholder='Search' name='valueSearch' value='".$_GET['valueSearch']."'>";
                        }else{
                            echo "<input placeholder='Search' name='valueSearch' value=''>";
                        }
                    ?>
                    <select name="selectSearch">
                        <option <?php echo (!isset($_GET['selectSearch']) || $_GET['selectSearch'] == 'name') ? 'selected' : ''; ?> value="name">trier par Nom</option>
                        <option <?php echo (isset($_GET['selectSearch']) && $_GET['selectSearch'] == 'number') ? 'selected' : ''; ?> value="number">trier par Télephone</option>
                        <option <?php echo (isset($_GET['selectSearch']) && $_GET['selectSearch'] == 'mail') ? 'selected' : ''; ?> value="mail">trier par Mail</option>
                        <option <?php echo (isset($_GET['selectSearch']) && $_GET['selectSearch'] == 'age') ? 'selected' : ''; ?> value="age">trier par Age</option>
                        <option <?php echo (isset($_GET['selectSearch']) && $_GET['selectSearch'] == 'lastDiploma') ? 'selected' : ''; ?> value="lastDiploma">trier par Dernier Diplome</option>
                    </select>
                </div>

                <div class="sort">
                    <select name="sort">
                        <option <?php echo (!isset($_GET['sort']) || $_GET['sort'] == 'name') ? 'selected' : ''; ?> value="name">trier par Nom</option>
                        <option <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'number') ? 'selected' : ''; ?> value="number">trier par Télephone</option>
                        <option <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'mail') ? 'selected' : ''; ?> value="mail">trier par Mail</option>
                        <option <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'age') ? 'selected' : ''; ?> value="age">trier par Age</option>
                        <option <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'lastDiploma') ? 'selected' : ''; ?> value="lastDiploma">trier par Dernier Diplome</option>
                    </select>

                </div>
               
            </form>
            <div class="add">
                <i class="fa-solid fa-plus"></i>
            </div>
            
        </div>
    </div>

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
                    isset($_GET['sort']) ? $_GET['sort'] : "id",
                    isset($_GET['valueSearch']) ? $_GET['valueSearch'] : "",
                    isset($_GET['selectSearch']) ? $_GET['selectSearch'] : "name"
                );
                for ($i=0; $i < count($contacts); $i++) { 
                    $contact = $contacts[$i];
                    echo "<div class='item'><div class='picture'><img src='https://www.gtanf.com/forums/uploads/monthly_2018_12/avatar-artwork.thumb.jpg.52347ce581c909bdd8487ce4fc53fc95.jpg'></div><div class='name'>Clement Guilloux</div><div class='number'>12 45 78 89 56</div><div class='mail'>john24@gmail.com</div><div class='age'>17</div><div class='speciality'>Developpeur</div><div class='lastDiploma'>Bac general</div><div class='btns'><button class='fa-regular fa-pen'></button><button class='fa-regular fa-trash'></button></div></div>";
                }
             
            ?>  
            
                
            </div>
        </div>
    </div>
</body>
</html>