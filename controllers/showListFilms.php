<?php

require_once("autoload.php");
$filmDAO = new FilmDAO;

if (isset($_REQUEST['title']))
    $title = $_REQUEST['title'];

if (isset($_REQUEST['orderBy']))
    $orderBy = $_REQUEST['orderBy'];

if ($title !== "") {
    $films = $filmDAO->getFilmsByTitle($title, $orderBy);
} else {
    $films = $filmDAO->populateFilms($orderBy);
}

if ($films !== null) {
    foreach ($films as $film) {
        $elements_json[] = [
            'title' => $film->getTitle(),
            'year' => $film->getYear()
        ];
    }
    echo json_encode($elements_json);
} else {
    echo json_encode([]);
}


