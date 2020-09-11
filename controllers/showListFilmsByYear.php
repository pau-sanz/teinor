<?php

require_once("autoload.php");
$filmDAO = new FilmDAO;

if (isset($_REQUEST['year']))
    $year = $_REQUEST['year'];
   
if ($year !== "") {
    $films = $filmDAO->getFilmsByYear($year);
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


