<div class="header">
        <div class="left">
            <p><a href="index.php" >List contact</a></p>
            <h4>Contact</h4>
        </div>
        
        <div class="right">
            <form class="containerSearchBar show" method="get" action="index.php">
                <div class="searchBar">
                    <button type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
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
                        <option <?php echo (!isset($_GET['sort']) || $_GET['sort'] == 'id') ? 'selected' : ''; ?> value="id">trier date de creation</option>
                        <option <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'name') ? 'selected' : ''; ?> value="name">trier par Nom</option>
                        <option <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'number') ? 'selected' : ''; ?> value="number">trier par Télephone</option>
                        <option <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'mail') ? 'selected' : ''; ?> value="mail">trier par Mail</option>
                        <option <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'age') ? 'selected' : ''; ?> value="age">trier par Age</option>
                        <option <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'lastDiploma') ? 'selected' : ''; ?> value="lastDiploma">trier par Dernier Diplome</option>
                    </select>

                </div>
               
            </form>
            <div class="add">
                <a href="add.php"><i class="fa-solid fa-plus"></i></a>
            </div>
            
        </div>
    </div>