<?php

if (isset($_REQUEST['sendFilm'])) {

    if (isset($_REQUEST['titlefilm'])) {
        $title = $_REQUEST['titlefilm'];
    }
    if (isset($_REQUEST['yearfilm'])) {
        $year = $_REQUEST['yearfilm']."-01-01";
    }

    $film = new Film($title, $year);

    $film->addFilm($film);

    require_once 'views/header.php';
    require_once 'views/addFilm.php';
    require_once 'views/footer.php';
}



