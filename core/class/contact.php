<?php

require 'database.php';

Class Contact {

    public static function createContact($name, $number, $mail, $age, $speciality, $lastDiploma) {

    }

    public static function getContact($id) {

    }

    public static function getContacts($sort, $valueSearch, $selectSearch) {
        $pdo= Database::connect(); 
        $request = $pdo->prepare("SELECT * FROM `listcontact` WHERE $selectSearch LIKE '%$valueSearch%' ORDER BY $sort");
        $request->execute();
        $contacts = $request->fetchAll(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $contacts;
    }

    public static function deleteContacts($id) {

    }

    public static function updateContact($id, $name, $number, $mail, $age, $speciality, $lastDiploma) {

    }
}