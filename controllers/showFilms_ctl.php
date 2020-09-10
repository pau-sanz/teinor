<?php
    
   $filmDAO = new FilmDAO();

    $films = $filmDAO->populateFilms();
    
    require_once 'views/header.php';
    require_once 'views/showFilms.php';
    require_once 'views/footer.php';

