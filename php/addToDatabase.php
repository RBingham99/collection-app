<?php

require_once 'collectorsappfunctions.php';

$sanitisedPlant = sanitiseFormData($_POST);


if (isset($sanitisedPlant['nickname']) &&
    isset($sanitisedPlant['species']) &&
    isset($sanitisedPlant['height']) &&
    isset($sanitisedPlant['pic_alt'])
) {
    $db = connectToDatabase();
    addNewItemToDatabase($sanitisedPlant, $db);
    header('location: ../index.php');
}