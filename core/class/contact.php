<?php

require 'database.php';

Class Contact {

    public static function createContact($name, $number, $mail, $age, $speciality, $lastDiploma, $urlPicture) {
        try {
            $pdo = Database::connect(); 
            $request = $pdo->prepare("INSERT INTO `listcontact` (name, number, mail, age, speciality, lastDiploma, urlPicture) VALUES ('$name', '$number', '$mail', '$age', '$speciality', '$lastDiploma', '$urlPicture')");
            echo "INSERT INTO `listcontact` (name, number, mail, age, speciality, lastDiploma, urlPicture) VALUES ('$name', '$number', '$mail', '$age', '$speciality', '$lastDiploma', '$urlPicture')";
            $request->execute();
            Database::disconnect();
    
            return true; // Retournez l'ID du nouveau contact inséré
        } catch (\Throwable $th) {
            return false;
        }
    }


    public static function getContact($id) {
        $pdo= Database::connect(); 
        $request = $pdo->prepare("SELECT * FROM `listcontact` WHERE `id` = $id LIMIT 1");
        $request->execute();
        $contacts = $request->fetchAll(PDO::FETCH_ASSOC);
        Database::disconnect();

        if (count($contacts) == 1) {
            return $contacts[0];
        }
        return false;
    }

    public static function getContacts($sort, $valueSearch, $selectSearch) {
        $pdo= Database::connect(); 
        $request = $pdo->prepare("SELECT * FROM `listcontact` WHERE $selectSearch LIKE '%$valueSearch%' ORDER BY $sort");
        $request->execute();
        $contacts = $request->fetchAll(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $contacts;
    }

    public static function deleteContact($id) {
        try {
            $pdo= Database::connect(); 
            $request = $pdo->prepare("DELETE FROM `listcontact` WHERE id = $id");
            $request->execute();
            Database::disconnect();
        } catch (\Throwable $th) {
            return false;
        }
        return true;
    }
    

    public static function updateContact($id, $name, $number, $mail, $age, $speciality, $lastDiploma, $urlPicture) {
        try {
            $pdo = Database::connect(); 
            $request = $pdo->prepare("UPDATE `listcontact` SET name = '$name', number = '$number', mail = '$mail', age = '$age', speciality = '$speciality', lastDiploma = '$lastDiploma', urlPicture = '$urlPicture' WHERE id = '$id'");

            $request->execute();
            Database::disconnect();
        } catch (\Throwable $th) {
            return false;
        }
        return true;
    }
}