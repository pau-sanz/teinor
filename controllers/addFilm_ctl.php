<?php

if (isset($_REQUEST['sendFilm'])) {

    if (isset($_REQUEST['titleFilm'])) {
        $title = $_REQUEST['titleFilm'];
    }
    if (isset($_REQUEST['yearFilm'])) {
        $year = $_REQUEST['yearFilm']."-01-01";
    }

    $film = new Film($title, $year);

    $film->addFilm($film);

    require_once 'views/header.php';
    require_once 'views/addFilm.php';
    require_once 'views/footer.php';
}



