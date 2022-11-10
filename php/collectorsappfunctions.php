<?php

/**
 * This function connects to the plants database.
 *
 * @return PDO
 */
function connectToDatabase(): PDO
{
    $host = 'db';
    $db = 'plants';
    $user = 'root';
    $password = 'password';

    $dsn = "mysql:host=$host;dbname=$db";

    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    try {
        $pdo = new PDO($dsn, $user, $password, $options);
    } catch (\PDOException $exception) {
        throw new \PDOException($exception->getMessage(), (int)$exception->getCode());
    }
    return $pdo;
}

/**
 * This function gets an array of all columns of all rows in the plants database.
 *
 * @param PDO $pdo
 * @return array
 */
function getAllArray(PDO $pdo): array
{
    $query = $pdo->prepare('SELECT `id`,
       `pic_link`,
       `pic_alt`,
       `name/species`,
       `nickname`,
       `average_height` from `plants`;');
    $query->execute();
    return $query->fetchAll();
}

/**
 * This function takes an array and converts it to printable HTML.
 *
 * @param array $plants
 * @return string
 */
function addToHTML(array $plants): string
{
    if (count($plants) === 0) {
        throw new InvalidArgumentException('No data from database');
    }
    if (
        !isset($plants[0]['pic_alt']) ||
        !isset($plants[0]['name/species']) ||
        !isset($plants[0]['nickname']) ||
        !isset($plants[0]['average_height'])
    ) {
        throw new InvalidArgumentException('Values not set');
    }
    $card = '';
    foreach ($plants as $plant) {
        $card .=
            '<div class = "card">'
                 . '<div class = "plantImg">'
                     . '<img src = "' . $plant["pic_link"] . '" alt="' . $plant["pic_alt"] . '">'
                 . '</div>'
                     . '<h2>Nickname: ' . $plant['nickname'] . '</h2>'
                     . '<p>Species: ' . $plant['name/species'] . '</p>'
                     . '<p>Height: ' . $plant['average_height'] . '</p>'
            . '</div>';
    }
    return $card;
}

/**
 * This function takes in an array and a PDO and adds the array into the database.
 *
 * @param array $newArray
 * @param PDO $database
 * @return void
 */
function addNewItemToDatabase(array $newArray, PDO $database)
{
    if ($newArray === []) {
        throw new InvalidArgumentException('No data from database');
    }
    if (isset($newArray['pic_link'])) {
        $filepath = __DIR__ . '/../' . "${newArray['pic_link']}";
    }

    if (!isset($newArray['pic_link']) ||
        !file_exists($filepath) ||
        $newArray['pic_link'] == null ||
        $newArray['pic_link'] == '')
    {
        $newArray['pic_link'] = 'images/placeholder.jpg';
    }
    if (
        !isset($newArray['pic_alt']) ||
        !isset($newArray['species']) ||
        !isset($newArray['nickname']) ||
        !isset($newArray['height'])
    ) {
        throw new InvalidArgumentException('Values not set');
    }
    $query = $database->prepare('INSERT INTO `plants` (
        `pic_link`,
        `pic_alt`,
        `nickname`,
        `name/species`,
        `average_height`)
        VALUES (:pic_link, :pic_alt, :nickname, :species, :height);');
    $query->execute($newArray);
}

/**
 * This function takes an array and sanitises the data.
 *
 * @param array $formData
 * @return array
 */
function sanitiseFormData(array $formData): array
{
    $cleanFormData = [];
    foreach ($formData as $key => $value) {
        $cleanData = trim($value);
        $cleanData = htmlspecialchars($cleanData);
        $cleanFormData[$key] = $cleanData;
    }
    return $cleanFormData;
}